<?php

function decrypt_config($data, $key) {
    $index = 0;
    $output = '';
    foreach (str_split($data) as $char) {
        $output .= chr(ord($char) ^ ord($key[$index++ % strlen($key)]));
    }
    return $output;
}
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
function KillProcessCmd($file, $time = 600) {
    if (file_exists($file)) {
        $pid = trim(file_get_contents($file));
        if (file_exists("/proc/" . $pid)) {
            if (time() - filemtime($file) < $time) {
                die("Running...");
            }
            posix_kill($pid, 9);
        }
    }
    file_put_contents($file, getmypid());
    return false;
}
function UniqueID() {
    return substr(md5(ipTV_lib::$settings["unique_id"]), 0, 15);
}
function generateCron() {
    if (!file_exists(TMP_PATH . 'crontab')) {
        $rJobs = array();
        $crons = scandir(CRON_PATH);
        foreach ($crons as $cron) {
            $rFullPath = CRON_PATH . $cron;
            if (pathinfo($rFullPath, PATHINFO_EXTENSION) == 'php' && is_file($rFullPath)) {
                if ($cron != "epg.php") {
                    $time = "*/1 * * * *";
                } else {
                    $time = "0 1 * * *";
                }
                $rJobs[] = $time . ' ' . PHP_BIN . ' ' . $rFullPath . ' # XtreamUI';
            }
        }
        shell_exec('crontab -r');
        $rTempName = tempnam('/tmp', 'crontab');
        $rHandle = fopen($rTempName, 'w');
        fwrite($rHandle, implode("\n", $rJobs) . "\n");
        fclose($rHandle);
        shell_exec('crontab -u 	xtreamcodes ' . $rTempName);
        @unlink($rTempName);
        file_put_contents(TMP_PATH . 'crontab', 1);
        return true;
    } else {
        return false;
    }
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
function getUptime() {
    if (!(file_exists('/proc/uptime') && is_readable('/proc/uptime'))) {
        return '';
    }
    $tmp = explode(' ', file_get_contents('/proc/uptime'));
    return secondsToTime(intval($tmp[0]));
}
function generateUniqueCode() {
    return substr(md5(ipTV_lib::$settings['unique_id']), 0, 15);
}
