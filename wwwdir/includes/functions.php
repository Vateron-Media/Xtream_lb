<?php

function getStats() {
    $rJSON = array();
    $rJSON['cpu'] = round(getTotalCPU(), 2);
    $rJSON['cpu_cores'] = intval(shell_exec('cat /proc/cpuinfo | grep "^processor" | wc -l'));
    $rJSON['cpu_avg'] = round((sys_getloadavg()[0] * 100) / (($rJSON['cpu_cores'] ?: 1)), 2);
    $rJSON['cpu_name'] = trim(shell_exec("cat /proc/cpuinfo | grep 'model name' | uniq | awk -F: '{print \$2}'"));
    if ($rJSON['cpu_avg'] > 100) {
        $rJSON['cpu_avg'] = 100;
    }
    $rFree = explode("\n", trim(shell_exec('free')));
    $rMemory = preg_split('/[\\s]+/', $rFree[1]);
    $rTotalUsed = intval($rMemory[2]);
    $rTotalRAM = intval($rMemory[1]);
    $rJSON['total_mem'] = $rTotalRAM;
    $rJSON['total_mem_free'] = $rTotalRAM - $rTotalUsed;
    $rJSON['total_mem_used'] = $rTotalUsed + getTotalTmpfs();
    $rJSON['total_mem_used_percent'] = round($rJSON['total_mem_used'] / $rJSON['total_mem'] * 100, 2);
    $rJSON['total_disk_space'] = disk_total_space(IPTV_ROOT_PATH);
    $rJSON['free_disk_space'] = disk_free_space(IPTV_ROOT_PATH);
    $rJSON['kernel'] = trim(shell_exec('uname -r'));
    $rJSON['uptime'] = getUptime();
    $rJSON['total_running_streams'] = (int) trim(shell_exec('ps ax | grep -v grep | grep -c ffmpeg'));
    $rJSON['bytes_sent'] = 0;
    $rJSON['bytes_sent_total'] = 0;
    $rJSON['bytes_received'] = 0;
    $rJSON['bytes_received_total'] = 0;
    $rJSON['network_speed'] = 0;
    $rJSON['interfaces'] = getNetworkInterfaces();
    $rJSON['network_speed'] = 0;
    if ($rJSON['cpu'] > 100) {
        $rJSON['cpu'] = 100;
    }
    if ($rJSON['total_mem'] < $rJSON['total_mem_used']) {
        $rJSON['total_mem_used'] = $rJSON['total_mem'];
    }
    if ($rJSON['total_mem_used_percent'] > 100) {
        $rJSON['total_mem_used_percent'] = 100;
    }

    $rJSON['network_info'] = getNetwork((ipTV_lib::$StreamingServers[SERVER_ID]['network_interface'] == 'auto' ? null : ipTV_lib::$StreamingServers[SERVER_ID]['network_interface']));
    foreach ($rJSON['network_info'] as $rInterface => $rData) {
        $rJSON['bytes_sent_total'] = (intval(trim(file_get_contents('/sys/class/net/' . $rInterface . '/statistics/tx_bytes'))) ?: 0);
        $rJSON['bytes_received_total'] = (intval(trim(file_get_contents('/sys/class/net/' . $rInterface . '/statistics/tx_bytes'))) ?: 0);
        $rJSON['bytes_sent'] += $rData['bytes_sent'];
        $rJSON['bytes_received'] += $rData['bytes_received'];
    }

    list($rJSON['cpu_load_average']) = sys_getloadavg();
    return $rJSON;
}

/** 
 * Checks for flood attempts based on IP address. 
 * 
 * This function checks for flood attempts based on the provided IP address. 
 * It handles the restriction of flood attempts based on settings and time intervals. 
 * If the IP is not provided, it retrieves the user's IP address. 
 * It excludes certain IPs from flood checking based on settings. 
 * It tracks and limits flood attempts within a specified time interval. 
 * If the number of requests exceeds the limit, it blocks the IP and logs the attack. 
 * 
 * @param string|null $rIP (Optional) The IP address to check for flood attempts. 
 * @return null|null Returns null if no flood attempt is detected, or a string indicating the block status if the IP is blocked. 
 */
function checkFlood($rIP = null) {
    global $ipTV_db;
    if (ipTV_lib::$settings['flood_limit'] != 0) {
        if (!$rIP) {
            $rIP = ipTV_streaming::getUserIP();
        }
        if (!(empty($rIP) || in_array($rIP, ipTV_lib::$allowedIPs))) {
            $rFloodExclude = array_filter(array_unique(explode(',', ipTV_lib::$settings['flood_ips_exclude'])));
            if (!in_array($rIP, $rFloodExclude)) {
                $rIPFile = FLOOD_TMP_PATH . $rIP;
                if (file_exists($rIPFile)) {
                    $rFloodRow = json_decode(file_get_contents($rIPFile), true);
                    $rFloodSeconds = ipTV_lib::$settings['flood_seconds'];
                    $rFloodLimit = ipTV_lib::$settings['flood_limit'];
                    if (time() - $rFloodRow['last_request'] <= $rFloodSeconds) {
                        $rFloodRow['requests']++;
                        if ($rFloodLimit > $rFloodRow['requests']) {
                            $rFloodRow['last_request'] = time();
                            file_put_contents($rIPFile, json_encode($rFloodRow), LOCK_EX);
                        } else {
                            if (!in_array($rIP, ipTV_lib::$blockedISP)) {
                                if (ipTV_lib::$cached) {
                                    ipTV_lib::setSignal('flood_attack/' . $rIP, 1);
                                } else {
                                    $ipTV_db->query('INSERT INTO `blocked_ips` (`ip`,`notes`,`date`) VALUES(\'%s\',\'%s\',\'%d\')', $rIP, 'FLOOD ATTACK', time());
                                }
                                touch(FLOOD_TMP_PATH . 'block_' . $rIP);
                            }
                            ipTV_lib::unlink_file($rIPFile);
                            return null;
                        }
                    } else {
                        $rFloodRow['requests'] = 0;
                        $rFloodRow['last_request'] = time();
                        file_put_contents($rIPFile, json_encode($rFloodRow), LOCK_EX);
                    }
                } else {
                    file_put_contents($rIPFile, json_encode(array('requests' => 0, 'last_request' => time())), LOCK_EX);
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}
/** 
 * Checks for authentication flood attempts for a user and IP address. 
 * 
 * This function checks for authentication flood attempts for a user and optional IP address. 
 * It verifies if the user is not a restreamer and checks the IP address against allowed IPs and exclusions. 
 * It tracks and limits authentication flood attempts based on settings and time intervals. 
 * If the number of attempts exceeds the limit, it blocks further attempts until a specified time. 
 * 
 * @param array $rUser The user information containing the ID and restreamer status. 
 * @param string|null $rIP (Optional) The IP address of the user. 
 * @return null|null Returns null if no authentication flood attempt is detected, or a string indicating the block status if the user is blocked. 
 */
function checkAuthFlood($rUser, $rIP = null) {
    if (ipTV_lib::$settings['auth_flood_limit'] != 0) {
        if (!$rUser['is_restreamer']) {
            if (!$rIP) {
                $rIP = ipTV_streaming::getUserIP();
            }
            if (!(empty($rIP) || in_array($rIP, ipTV_lib::$allowedIPs))) {
                $rFloodExclude = array_filter(array_unique(explode(',', ipTV_lib::$settings['flood_ips_exclude'])));
                if (!in_array($rIP, $rFloodExclude)) {
                    $rUserFile = FLOOD_TMP_PATH . intval($rUser['id']) . '_' . $rIP;
                    if (file_exists($rUserFile)) {
                        $rFloodRow = json_decode(file_get_contents($rUserFile), true);
                        $rFloodSeconds = ipTV_lib::$settings['auth_flood_seconds'];
                        $rFloodLimit = ipTV_lib::$settings['auth_flood_limit'];
                        $rFloodRow['attempts'] = truncateAttempts($rFloodRow['attempts'], $rFloodSeconds, true);
                        if ($rFloodLimit < count($rFloodRow['attempts'])) {
                            $rFloodRow['block_until'] = time() + intval(ipTV_lib::$settings['auth_flood_seconds']);
                        }
                        $rFloodRow['attempts'][] = time();
                        file_put_contents($rUserFile, json_encode($rFloodRow), LOCK_EX);
                    } else {
                        file_put_contents($rUserFile, json_encode(array('attempts' => array(time()))), LOCK_EX);
                    }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}
/** 
 * Checks for brute force attempts based on IP, MAC address, and username. 
 * 
 * This function checks for brute force attempts based on the provided IP, MAC address, and username. 
 * It handles the restriction of brute force attempts based on settings and frequency. 
 * If the IP is not provided, it retrieves the user's IP address. 
 * It excludes certain IPs from flood checking based on settings. 
 * It tracks and limits brute force attempts for MAC and username separately. 
 * If the number of attempts exceeds the limit, it blocks the IP and logs the attack. 
 * 
 * @param string|null $rIP (Optional) The IP address of the user. 
 * @param string|null $rMAC (Optional) The MAC address of the device. 
 * @param string|null $rUsername (Optional) The username of the user. 
 * @return null|null|string Returns null if no brute force attempt is detected, or a string indicating the type of attack if the IP is blocked. 
 */
function checkBruteforce($rIP = null, $rMAC = null, $rUsername = null) {
    global $ipTV_db;
    if ($rMAC || $rUsername) {
        if (!($rMAC && ipTV_lib::$settings['bruteforce_mac_attempts'] == 0)) {
            if (!($rUsername && ipTV_lib::$settings['bruteforce_username_attempts'] == 0)) {
                if (!$rIP) {
                    $rIP = ipTV_streaming::getUserIP();
                }
                if (!(empty($rIP) || in_array($rIP, ipTV_lib::$allowedIPs))) {
                    $rFloodExclude = array_filter(array_unique(explode(',', ipTV_lib::$settings['flood_ips_exclude'])));
                    if (!in_array($rIP, $rFloodExclude)) {
                        $rFloodType = (!is_null($rMAC) ? 'mac' : 'user');
                        $rTerm = (!is_null($rMAC) ? $rMAC : $rUsername);
                        $rIPFile = FLOOD_TMP_PATH . $rIP . '_' . $rFloodType;
                        if (file_exists($rIPFile)) {
                            $rFloodRow = json_decode(file_get_contents($rIPFile), true);
                            $rFloodSeconds = intval(ipTV_lib::$settings['bruteforce_frequency']);
                            $rFloodLimit = intval(ipTV_lib::$settings[array('mac' => 'bruteforce_mac_attempts', 'user' => 'bruteforce_username_attempts')[$rFloodType]]);
                            $rFloodRow['attempts'] = truncateAttempts($rFloodRow['attempts'], $rFloodSeconds);
                            if (!in_array($rTerm, array_keys($rFloodRow['attempts']))) {
                                $rFloodRow['attempts'][$rTerm] = time();
                                if ($rFloodLimit > count($rFloodRow['attempts'])) {
                                    file_put_contents($rIPFile, json_encode($rFloodRow), LOCK_EX);
                                } else {
                                    if (!in_array($rIP, ipTV_lib::$blockedIPs)) {
                                        if (ipTV_lib::$cached) {
                                            ipTV_lib::setSignal('bruteforce_attack/' . $rIP, 1);
                                        } else {
                                            $ipTV_db->query('INSERT INTO `blocked_ips` (`ip`,`notes`,`date`) VALUES(\'%s\',\'%s\',\'%s\')', $rIP, 'BRUTEFORCE ' . strtoupper($rFloodType) . ' ATTACK', time());
                                        }
                                        touch(FLOOD_TMP_PATH . 'block_' . $rIP);
                                    }
                                    ipTV_lib::unlink_file($rIPFile);
                                    return null;
                                }
                            }
                        } else {
                            $rFloodRow = array('attempts' => array($rTerm => time()));
                            file_put_contents($rIPFile, json_encode($rFloodRow), LOCK_EX);
                        }
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    } else {
        return null;
    }
}
/** 
 * Truncates the attempts based on a given frequency. 
 * 
 * This function takes an array of attempts and a frequency value as input. 
 * It checks if the time difference between the current time and each attempt time is less than the given frequency. 
 * If the $rList parameter is true, it iterates through the attempt times directly. 
 * If $rList is false, it iterates through the attempts as key-value pairs. 
 * It returns an array of allowed attempts that meet the frequency criteria. 
 * 
 * @param array $rAttempts An array of attempt times or key-value pairs. 
 * @param int $rFrequency The time frequency in seconds to compare against. 
 * @param bool $rList (Optional) If true, iterates through attempts directly; otherwise, iterates through key-value pairs. 
 * @return array An array containing the allowed attempts based on the frequency criteria. 
 */
function truncateAttempts($rAttempts, $rFrequency, $rList = false) {
    $rAllowedAttempts = array();
    $rTime = time();
    if ($rList) {
        foreach ($rAttempts as $rAttemptTime) {
            if ($rTime - $rAttemptTime < $rFrequency) {
                $rAllowedAttempts[] = $rAttemptTime;
            }
        }
    } else {
        foreach ($rAttempts as $rAttempt => $rAttemptTime) {
            if ($rTime - $rAttemptTime < $rFrequency) {
                $rAllowedAttempts[$rAttempt] = $rAttemptTime;
            }
        }
    }
    return $rAllowedAttempts;
}

function getTotalCPU() {
    $rTotalLoad = 0;
    exec('ps -Ao pid,pcpu', $processes);
    foreach ($processes as $process) {
        $cols = explode(' ', preg_replace('!\\s+!', ' ', trim($process)));
        $rTotalLoad += floatval($cols[1]);
    }
    return $rTotalLoad / intval(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
}
function getTotalTmpfs() {
    $rTotal = 0;
    exec('df | grep tmpfs', $rOutput);
    foreach ($rOutput as $rLine) {
        $rSplit = explode(' ', preg_replace('!\\s+!', ' ', $rLine));
        if ($rSplit[0] = 'tmpfs') {
            $rTotal += intval($rSplit[2]);
        }
    }
    return $rTotal;
}
function generateUniqueCode() {
    return substr(md5(ipTV_lib::$settings['unique_id']), 0, 15);
}
function getUptime() {
    if (!(file_exists('/proc/uptime') && is_readable('/proc/uptime'))) {
        return '';
    }
    $tmp = explode(' ', file_get_contents('/proc/uptime'));
    return secondsToTime(intval($tmp[0]));
}
function getNetworkInterfaces() {
    $rReturn = array();
    exec('ls /sys/class/net/', $rOutput, $rReturnVar);
    foreach ($rOutput as $rInterface) {
        $rInterface = trim(rtrim($rInterface, ':'));
        if ($rInterface != 'lo' && substr($rInterface, 0, 4) != 'bond') {
            $rReturn[] = $rInterface;
        }
    }
    return $rReturn;
}
function getNetwork($Interface = null) {
    $Return = array();
    if (file_exists(LOGS_TMP_PATH . 'network')) {
        $Network = json_decode(file_get_contents(LOGS_TMP_PATH . 'network'), true);
        foreach ($Network as $Key => $Line) {
            if (!($Interface && $Key != $Interface) && !($Key == 'lo' || !$Interface && substr($Key, 0, 4) == 'bond')) {
                $Return[$Key] = $Line;
            }
        }
    }
    return $Return;
}
function secondsToTime($inputSeconds) {
    $secondsInAMinute = 60;
    $secondsInAnHour = 60 * $secondsInAMinute;
    $secondsInADay = 24 * $secondsInAnHour;
    $days = (int) floor($inputSeconds / $secondsInADay);
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = (int) floor($hourSeconds / $secondsInAnHour);
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = (int) floor($minuteSeconds / $secondsInAMinute);
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = (int) ceil($remainingSeconds);
    $final = '';
    if ($days != 0) {
        $final .= "{$days}d ";
    }
    if ($hours != 0) {
        $final .= "{$hours}h ";
    }
    if ($minutes != 0) {
        $final .= "{$minutes}m ";
    }
    $final .= "{$seconds}s";
    return $final;
}
/** 
 * Encrypts the provided data using AES-256-CBC encryption with a given decryption key and device ID. 
 *  
 * @param string $rData The data to be encrypted. 
 * @param string $decryptionKey The decryption key used to encrypt the data. 
 * @param string $rDeviceID The device ID used in the encryption process. 
 * @return string The encrypted data in base64url encoding. 
 */
function encryptData($rData, $decryptionKey, $rDeviceID) {
    return base64url_encode(openssl_encrypt($rData, 'aes-256-cbc', md5(sha1($rDeviceID) . $decryptionKey), OPENSSL_RAW_DATA, substr(md5(sha1($decryptionKey)), 0, 16)));
}
/** 
 * Decrypts the provided data using AES-256-CBC decryption with a given decryption key and device ID. 
 *  
 * @param string $rData The data to be decrypted. 
 * @param string $decryptionKey The decryption key used to decrypt the data. 
 * @param string $rDeviceID The device ID used in the decryption process. 
 * @return string The decrypted data. 
 */
function decryptData($rData, $decryptionKey, $rDeviceID) {
    return openssl_decrypt(base64url_decode($rData), 'aes-256-cbc', md5(sha1($rDeviceID) . $decryptionKey), OPENSSL_RAW_DATA, substr(md5(sha1($decryptionKey)), 0, 16));
}
/** 
 * Encodes the input data using base64url encoding. 
 * 
 * This function takes the input data and encodes it using base64 encoding. It then replaces the characters '+' and '/' with '-' and '_', respectively, to make the encoding URL-safe. Finally, it removes any padding '=' characters at the end of the encoded string. 
 * 
 * @param string $rData The input data to be encoded. 
 * @return string The base64url encoded string. 
 */
function base64url_encode($rData) {
    return rtrim(strtr(base64_encode($rData), '+/', '-_'), '=');
}
/** 
 * Decodes the input data encoded using base64url encoding. 
 * 
 * This function takes the input data encoded using base64url encoding and decodes it. It first replaces the characters '-' and '_' back to '+' and '/' respectively, to revert the URL-safe encoding. Then, it decodes the base64 encoded string to retrieve the original data. 
 * 
 * @param string $rData The base64url encoded data to be decoded. 
 * @return string|false The decoded original data, or false if decoding fails. 
 */
function base64url_decode($rData) {
    return base64_decode(strtr($rData, '-_', '+/'));
}
