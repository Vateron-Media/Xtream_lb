<?php
class ipTV_stream {
    public static $ipTV_db;
    /**
     * Deletes files based on the provided sources.
     *
     * This function takes an array of file sources and deletes the corresponding files from the STREAMS_PATH directory if they exist.
     *
     * @param array $sources An array of file sources to be deleted.
     * @return void
     */
    static function deleteCache($sources) {
        if (!empty($sources)) {
            foreach ($sources as $source) {
                ipTV_lib::unlink_file(STREAMS_PATH . md5($source));
            }
        } else {
            return null;
        }
    }
    public static function probeStream($rSourceURL, $rFetchArguments = array(), $rPrepend = '', $rParse = true) {
        $rAnalyseDuration = abs(intval(ipTV_lib::$settings['stream_max_analyze']));
        $rProbesize = abs(intval(ipTV_lib::$settings['probesize']));
        $rTimeout = intval($rAnalyseDuration / 1000000) + ipTV_lib::$settings['probe_extra_wait'];
        $rCommand = $rPrepend . 'timeout ' . $rTimeout . ' ' . FFPROBE_PATH . ' -probesize ' . $rProbesize . ' -analyzeduration ' . $rAnalyseDuration . ' ' . implode(' ', $rFetchArguments) . ' -i "' . $rSourceURL . '" -v quiet -print_format json -show_streams -show_format';
        exec($rCommand, $rReturn);
        $result = implode("\n", $rReturn);
        if ($rParse) {
            return self::parseFFProbe(json_decode($result, true));
        }
        return json_decode($result, true);
    }
    public static function stopStream($streamID, $stop = false) {
        if (file_exists(STREAMS_PATH . $streamID . '_.monitor')) {
            $monitor = intval(file_get_contents(STREAMS_PATH . $streamID . '_.monitor'));
        } else {
            self::$ipTV_db->query('SELECT `monitor_pid` FROM `streams_servers` WHERE `server_id` = \'%d\' AND `stream_id` = \'%d\' LIMIT 1;', SERVER_ID, $streamID);
            $monitor = intval(self::$ipTV_db->get_row()['monitor_pid']);
        }
        if ($monitor > 0) {
            if (self::checkPID($monitor, "XtreamCodes[{$streamID}]") && is_numeric($monitor) && 0 < $monitor) {
                posix_kill($monitor, 9);
            }
        }
        if (file_exists(STREAMS_PATH . $streamID . '_.pid')) {
            $PID = intval(file_get_contents(STREAMS_PATH . $streamID . '_.pid'));
        } else {
            self::$ipTV_db->query('SELECT `pid` FROM `streams_servers` WHERE `server_id` = \'%d\' AND `stream_id` = \'%d\' LIMIT 1;', SERVER_ID, $streamID);
            $PID = intval(self::$ipTV_db->get_row()['pid']);
        }
        if ($PID > 0) {
            if (self::checkPID($PID, "XtreamCodes[{$streamID}]") && is_numeric($PID) && 0 < $PID) {
                posix_kill($PID, 9);
            }
        }
        if (file_exists(SIGNALS_TMP_PATH . 'queue_' . intval($streamID))) {
            unlink(SIGNALS_TMP_PATH . 'queue_' . intval($streamID));
        }
        ipTV_streaming::streamLog($streamID, SERVER_ID, 'STREAM_STOP');
        shell_exec('rm -f ' . STREAMS_PATH . intval($streamID) . '_*');
        if ($stop) {
            shell_exec('rm -f ' . DELAY_PATH . intval($streamID) . '_*');
            self::$ipTV_db->query('UPDATE `streams_servers` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0,`monitor_pid` = NULL WHERE `stream_id` = \'%d\' AND `server_id` = \'%d\'', $streamID, SERVER_ID);
            ipTV_streaming::updateStream($streamID);
        }
    }
    static function checkPID($pid, $search) {
        if (file_exists('/proc/' . $pid)) {
            $value = trim(file_get_contents("/proc/{$pid}/cmdline"));
            if (stristr($value, $search)) {
                return true;
            }
        }
        return false;
    }
    public static function startMonitor($streamID, $rRestart = 0) {
        shell_exec(PHP_BIN . ' ' . TOOLS_PATH . 'monitor.php ' . intval($streamID) . ' ' . intval($rRestart) . ' >/dev/null 2>/dev/null &');
        return true;
    }
    public static function parseFFProbe($data) {
        if (!empty($data)) {
            if (!empty($data['codecs'])) {
                return $data;
            }
            $output = array();
            $output['codecs']['video'] = '';
            $output['codecs']['audio'] = '';
            $output['container'] = $data['format']['format_name'];
            $output['filename'] = $data['format']['filename'];
            $output['bitrate'] = !empty($data['format']['bit_rate']) ? $data['format']['bit_rate'] : null;
            $output['of_duration'] = !empty($data['format']['duration']) ? $data['format']['duration'] : 'N/A';
            $output['duration'] = !empty($data['format']['duration']) ? gmdate('H:i:s', intval($data['format']['duration'])) : 'N/A';
            foreach ($data['streams'] as $streamData) {
                if (!isset($streamData['codec_type'])) {
                    continue;
                }
                if ($streamData['codec_type'] != 'audio' && $streamData['codec_type'] != 'video') {
                    continue;
                }
                $output['codecs'][$streamData['codec_type']] = $streamData;
            }
            return $output;
        }
        return false;
    }
    static function stopVODstream($streamID) {
        if (file_exists(VOD_PATH . $streamID . '_.pid')) {
            $pid = (int) file_get_contents(VOD_PATH . $streamID . '_.pid');
            posix_kill($pid, 9);
        }
        shell_exec('rm -f ' . VOD_PATH . $streamID . '.*');
        self::$ipTV_db->query('UPDATE `streams_sys` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0 WHERE `stream_id` = \'%d\' AND `server_id` = \'%d\'', $streamID, SERVER_ID);
    }
    static function startVODstream($streamID) {
        $stream = array();
        self::$ipTV_db->query('SELECT * FROM `streams` t1 INNER JOIN `streams_types` t2 ON t2.type_id = t1.type AND t2.live = 0 LEFT JOIN `transcoding_profiles` t4 ON t1.transcode_profile_id = t4.profile_id WHERE t1.direct_source = 0 AND t1.id = \'%d\'', $streamID);
        if (self::$ipTV_db->num_rows() > 0) {
            $stream['stream_info'] = self::$ipTV_db->get_row();
            $target_container = json_decode($stream['stream_info']['target_container'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $stream['stream_info']['target_container'] = $target_container;
            } else {
                $stream['stream_info']['target_container'] = array($stream['stream_info']['target_container']);
            }
            self::$ipTV_db->query('SELECT * FROM `streams_sys` WHERE stream_id  = \'%d\' AND `server_id` = \'%d\'', $streamID, SERVER_ID);
            if (self::$ipTV_db->num_rows() > 0) {
                $stream['server_info'] = self::$ipTV_db->get_row();
                self::$ipTV_db->query('SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = \'%d\' AND t1.argument_id = t2.id', $streamID);
                $stream['stream_arguments'] = self::$ipTV_db->get_rows();
                list($streamSource) = json_decode($stream['stream_info']['stream_source'], true);
                if (substr($streamSource, 0, 2) == 's:') {
                    $movieSource = explode(':', $streamSource, 3);
                    $movieServerID = $movieSource[1];
                    if ($movieServerID != SERVER_ID) {
                        $moviePath = ipTV_lib::$StreamingServers[$movieServerID]['api_url'] . '&action=getFile&filename=' . urlencode($movieSource[2]);
                    } else {
                        $moviePath = $movieSource[2];
                    }
                    $rProtocol = null;
                } else {
                    if (substr($streamSource, 0, 1) == '/') {
                        $movieServerID = SERVER_ID;
                        $moviePath = $streamSource;
                        $rProtocol = null;
                    } else {
                        $rProtocol = substr($streamSource, 0, strpos($streamSource, '://'));
                        $moviePath = str_replace(' ', '%20', $streamSource);
                        $rFetchOptions = implode(' ', self::getFormattedStreamArguments($stream['stream_arguments'], $rProtocol, 'fetch'));
                    }
                }
                if ((isset($movieServerID) && $movieServerID == SERVER_ID || file_exists($moviePath)) && $stream['stream_info']['movie_symlink'] == 1) {
                    $rFFMPEG = 'ln -sfn ' . escapeshellarg($moviePath) . ' ' . VOD_PATH . intval($streamID) . '.' . escapeshellcmd(pathinfo($moviePath)['extension']) . ' >/dev/null 2>/dev/null & echo $! > ' . VOD_PATH . intval($streamID) . '_.pid';
                } else {
                    $rSubtitles = json_decode($stream['stream_info']['movie_subtitles'], true);
                    $rSubtitlesImport = '';
                    $rSubtitlesMetadata = '';
                    if (!empty($rSubtitles)) {
                        for ($i = 0; $i < count($rSubtitles['files']); $i++) {
                            $rSubtitleFile = escapeshellarg($rSubtitles['files'][$i]);
                            $rInputCharset = escapeshellarg($rSubtitles['charset'][$i]);
                            if ($rSubtitles['location'] == SERVER_ID) {
                                $rSubtitlesImport .= '-sub_charenc ' . $rInputCharset . ' -i ' . $rSubtitleFile . ' ';
                            } else {
                                $rSubtitlesImport .= '-sub_charenc ' . $rInputCharset . ' -i "' . ipTV_lib::$StreamingServers[$rSubtitles['location']]['api_url'] . '&action=getFile&filename=' . urlencode($rSubtitleFile) . '" ';
                            }
                        }
                        for ($i = 0; $i < count($rSubtitles['files']); $i++) {
                            $rSubtitlesMetadata .= '-map ' . ($i + 1) . ' -metadata:s:s:' . $i . ' title=' . escapeshellcmd($rSubtitles['names'][$i]) . ' -metadata:s:s:' . $i . ' language=' . escapeshellcmd($rSubtitles['names'][$i]) . ' ';
                        }
                    }
                    if ($stream['stream_info']['read_native'] == 1) {
                        $rReadNative = '-re';
                    } else {
                        $rReadNative = '';
                    }
                    if ($stream['stream_info']['enable_transcode'] == 1) {
                        if ($stream['stream_info']['transcode_profile_id'] == -1) {
                            $stream['stream_info']['transcode_attributes'] = array_merge(self::getFormattedStreamArguments($stream['stream_arguments'], $rProtocol, 'transcode'), json_decode($stream['stream_info']['transcode_attributes'], true));
                        } else {
                            $stream['stream_info']['transcode_attributes'] = json_decode($stream['stream_info']['profile_options'], true);
                        }
                    } else {
                        $stream['stream_info']['transcode_attributes'] = array();
                    }
                    $rLogoOptions = (isset($stream['stream_info']['transcode_attributes'][16]) ? $stream['stream_info']['transcode_attributes'][16]['cmd'] : '');
                    $rInputCodec = '';
                    $rFFMPEG = FFMPEG_PATH . ' -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err {FETCH_OPTIONS} -fflags +genpts -async 1 {READ_NATIVE} -i {STREAM_SOURCE} {LOGO} ' . $rSubtitlesImport;
                    $map = '-map 0 -copy_unknown ';
                    if (!empty($stream['stream_info']['custom_map'])) {
                        $map = escapeshellcmd($stream['stream_info']['custom_map']) . ' -copy_unknown ';
                    } else {
                        if ($stream['stream_info']['remove_subtitles'] == 1) {
                            $map = '-map 0:a -map 0:v';
                        }
                    }
                    if (!array_key_exists('-acodec', $stream['stream_info']['transcode_attributes'])) {
                        $stream['stream_info']['transcode_attributes']['-acodec'] = 'copy';
                    }
                    if (!array_key_exists('-vcodec', $stream['stream_info']['transcode_attributes'])) {
                        $stream['stream_info']['transcode_attributes']['-vcodec'] = 'copy';
                    }

                    $fileExtensions = array();
                    foreach ($stream['stream_info']['target_container'] as $extension) {
                        $fileExtensions[$extension] = "-movflags +faststart -dn {$map} -ignore_unknown {$rSubtitlesMetadata} " . VOD_PATH . intval($streamID) . "." . $extension . " ";
                    }

                    foreach ($fileExtensions as $extension => $codec) {
                        if ($extension == 'mp4') {
                            $stream['stream_info']['transcode_attributes']['-scodec'] = 'mov_text';
                        } elseif ($extension == 'mkv') {
                            $stream['stream_info']['transcode_attributes']['-scodec'] = 'srt';
                        } else {
                            $stream['stream_info']['transcode_attributes']['-scodec'] = 'copy';
                        }
                        $rFFMPEG .= implode(' ', self::parseTranscode($stream['stream_info']['transcode_attributes'])) . ' ';
                        $rFFMPEG .= $codec;
                    }
                    $rFFMPEG .= ' >/dev/null 2>' . VOD_PATH . intval($streamID) . '.errors & echo $! > ' . VOD_PATH . intval($streamID) . '_.pid';
                    $rFFMPEG = str_replace(array('{INPUT_CODEC}', '{LOGO}', '{FETCH_OPTIONS}', '{STREAM_SOURCE}', '{READ_NATIVE}'), array($rInputCodec, $rLogoOptions, (empty($rFetchOptions) ? '' : $rFetchOptions), escapeshellarg($moviePath), (empty($stream['stream_info']['custom_ffmpeg']) ? $rReadNative : '')), $rFFMPEG);
                }
                shell_exec($rFFMPEG);
                file_put_contents(VOD_PATH . $streamID . '_.ffmpeg', $rFFMPEG);
                $rPID = intval(file_get_contents(VOD_PATH . $streamID . '_.pid'));
                self::$ipTV_db->query('UPDATE `streams_sys` SET `to_analyze` = 1,`stream_started` = \'%d\',`stream_status` = 0,`pid` = \'%d\' WHERE `stream_id` = \'%d\' AND `server_id` = \'%d\'', time(), $rPID, $streamID, SERVER_ID);
                ipTV_streaming::updateStream($streamID);
                return $rPID;
            }
            return false;
        }
        return false;
    }
    public static function startStream($streamID, $rFromCache = false, $rForceSource = null, $rLLOD = false, $startPos = 0) {
        ipTV_lib::unlink_file(STREAMS_PATH . $streamID . '_.pid');

        $stream = array();
        self::$ipTV_db->query('SELECT * FROM `streams` t1 INNER JOIN `streams_types` t2 ON t2.type_id = t1.type AND t2.live = 1 LEFT JOIN `transcoding_profiles` t4 ON t1.transcode_profile_id = t4.profile_id WHERE t1.direct_source = 0 AND t1.id = \'%d\'', $streamID);
        if (self::$ipTV_db->num_rows() <= 0) {
            return false;
        }
        $stream['stream_info'] = self::$ipTV_db->get_row();
        self::$ipTV_db->query('SELECT * FROM `streams_servers` WHERE stream_id  = \'%d\' AND `server_id` = \'%d\'', $streamID, SERVER_ID);
        if (self::$ipTV_db->num_rows() <= 0) {
            return false;
        }
        $stream['server_info'] = self::$ipTV_db->get_row();
        self::$ipTV_db->query('SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = \'%d\' AND t1.argument_id = t2.id', $streamID);
        $stream['stream_arguments'] = self::$ipTV_db->get_rows();
        if ($stream['server_info']['on_demand'] == 1) {
            $probesize = intval($stream['stream_info']['probesize_ondemand']);
            $analyseDuration = '10000000';
        } else {
            $analyseDuration = abs(intval(ipTV_lib::$settings['stream_max_analyze']));
            $probesize = abs(intval(ipTV_lib::$settings['probesize']));
        }
        $streamTimeout = intval($analyseDuration / 1000000) + ipTV_lib::$settings["probe_extra_wait"];
        $rFFProbee = "/usr/bin/timeout {$streamTimeout}s " . FFPROBE_PATH . " {FETCH_OPTIONS} -probesize {$probesize} -analyzeduration {$analyseDuration} {CONCAT} -i {STREAM_SOURCE} -v quiet -print_format json -show_streams -show_format";
        $rFetchOptions = array();
        $rLoopback = false;
        $rOffset = 0;
        if (!$stream['server_info']['parent_id']) {
            if ($stream['stream_info']['type_key'] == 'created_live') {
                $sources = array(CREATED_PATH . $streamID . '_.list');
                if ($startPos > 0) {
                    $rCCOutput = array();
                    $rCCDuration = array();
                    $rCCInfo = json_decode($stream['server_info']['cc_info'], true);
                    foreach ($rCCInfo as $rItem) {
                        $rCCDuration[$rItem['path']] = intval(explode('.', $rItem['seconds'])[0]);
                    }
                    $rTimer = 0;
                    $rValid = true;
                    foreach (explode("\n", file_get_contents(CREATED_PATH . $streamID . '_.list')) as $rItem) {
                        list($path) = explode("'", explode("file '", $rItem)[1]);
                        if ($path) {
                            if ($rCCDuration[$path]) {
                                $rDuration = $rCCDuration[$path];
                                if ($rTimer <= $startPos && $startPos < $rTimer + $rDuration) {
                                    $rOffset = $rTimer;
                                    $rCCOutput[] = $path;
                                } else {
                                    if ($rTimer + $rDuration < $startPos) {
                                        $rCCOutput[] = $path;
                                    }
                                }
                                $rTimer += $rDuration;
                            } else {
                                $rValid = false;
                            }
                        }
                    }
                    if ($rValid) {
                        $sources = array(CREATED_PATH . $streamID . '_.tlist');
                        $rTList = '';
                        foreach ($rCCOutput as $rItem) {
                            $rTList .= "file '" . $rItem . "'" . "\n";
                        }
                        file_put_contents(CREATED_PATH . $streamID . '_.tlist', $rTList);
                    }
                }
            } else {
                $sources = json_decode($stream['stream_info']['stream_source'], true);
            }
            if (count($sources) > 0) {
                if (!empty($rForceSource)) {
                    $sources = array($rForceSource);
                } else {
                    if (ipTV_lib::$settings['priority_backup'] != 1) {
                        if (!empty($stream['server_info']['current_source'])) {
                            $k = array_search($stream['server_info']['current_source'], $sources);
                            if ($k !== false) {
                                $i = 0;
                                while ($i <= $k) {
                                    $rTemp = $sources[$i];
                                    unset($sources[$i]);
                                    array_push($sources, $rTemp);
                                    $i++;
                                }
                                $sources = array_values($sources);
                            }
                        }
                    }
                }
            }
        } else {
            $rLoopback = true;
            if ($stream['server_info']['on_demand']) {
                $rLLOD = true;
            }
            $rLoopURL = (!is_null(ipTV_lib::$StreamingServers[SERVER_ID]['private_url_ip']) && !is_null(ipTV_lib::$StreamingServers[$stream['server_info']['parent_id']]['private_url_ip']) ? ipTV_lib::$StreamingServers[$stream['server_info']['parent_id']]['private_url_ip'] : ipTV_lib::$StreamingServers[$stream['server_info']['parent_id']]['public_url_ip']);
            $sources = array($rLoopURL . 'admin/live?stream=' . intval($streamID) . '&password=' . urlencode(ipTV_lib::$settings['live_streaming_pass']) . '&extension=ts');
        }
        if ($stream['server_info']['on_demand']) {
            ipTV_lib::$SegmentsSettings['seg_type'] = 1;
        }
        if ($stream['stream_info']['type_key'] == 'created_live' && file_exists(CREATED_PATH . $streamID . '_.info')) {
            self::$ipTV_db->query('UPDATE `streams_servers` SET `cc_info` = \'%d\' WHERE `server_id` = \'%d\' AND `stream_id` = \'%d\';', file_get_contents(CREATED_PATH . $streamID . '_.info'), SERVER_ID, $streamID);
        }
        if (!$rFromCache) {
            self::deleteCache($sources);
        }
        foreach ($sources as $source) {
            $processed = false;
            $rRealSource = $source;
            $streamSource = self::parseStreamURL($source);
            echo 'Checking source: ' . $source . "\n";
            $probeArguments = $stream['stream_arguments'];
            foreach (array_keys($probeArguments) as $rID) {
                if ($probeArguments[$rID]['argument_key'] == 'headers') {
                    $probeArguments[$rID]['value'] .= "\r\n" . 'X-XUI-Prebuffer:1';
                    $processed = true;
                }
            }
            if (!$processed) {
                $probeArguments[] = array('value' => 'X-XUI-Prebuffer:1', 'argument_key' => 'headers', 'argument_cat' => 'fetch', 'argument_wprotocol' => 'http', 'argument_type' => 'text', 'argument_cmd' => "-headers '%s" . "\r\n" . "'");
            }

            $protocol = strtolower(substr($streamSource, 0, strpos($streamSource, '://')));
            $probeOptions = implode(' ', self::getFormattedStreamArguments($probeArguments, $protocol, 'fetch'));
            $rFetchOptions = implode(' ', self::getFormattedStreamArguments($stream['stream_arguments'], $protocol, 'fetch'));
            if ($rFromCache && file_exists(CACHE_TMP_PATH . md5($source)) && time() - filemtime(CACHE_TMP_PATH . md5($source)) <= 300) {
                $rFFProbeOutput = unserialize(file_get_contents(CACHE_TMP_PATH . md5($streamSource)));
                if ($rFFProbeOutput && (isset($rFFProbeOutput['streams']) || isset($rFFProbeOutput['codecs']))) {
                    echo 'Got stream information via cache' . "\n";
                    break;
                }
            } else {
                if ($rFromCache && file_exists(CACHE_TMP_PATH . md5($source))) {
                    $rFromCache = false;
                }
            }
            if (!($stream['server_info']['on_demand'] && $rLLOD)) {
                $rFFProbeOutput = json_decode(shell_exec(str_replace(array('{FETCH_OPTIONS}', '{CONCAT}', '{STREAM_SOURCE}'), array($probeOptions, ($stream['stream_info']['type_key'] == 'created_live' && !$stream['server_info']['parent_id'] ? '-safe 0 -f concat' : ''), escapeshellarg($streamSource)), $rFFProbee)), true);
                if ($rFFProbeOutput && isset($rFFProbeOutput['streams'])) {
                    echo 'Got stream information via ffprobe' . "\n";
                    break;
                }
            }
        }
        if (!($stream['server_info']['on_demand'] && $rLLOD)) {
            if (!isset($rFFProbeOutput['codecs'])) {
                $rFFProbeOutput = self::parseFFProbe($rFFProbeOutput);
            }
            if (empty($rFFProbeOutput)) {
                self::$ipTV_db->query("UPDATE `streams_servers` SET `progress_info` = '',`to_analyze` = 0,`pid` = -1,`stream_status` = 1 WHERE `server_id` = '%d' AND `stream_id` = '%d'", SERVER_ID, $streamID);
                return 0;
            }
            if (!$rFromCache) {
                file_put_contents(CACHE_TMP_PATH . md5($source), serialize($rFFProbeOutput));
            }
        }
        $rExternalPush = json_decode($stream['stream_info']['external_push'], true);
        $progressURL = 'http://127.0.0.1:' . intval(ipTV_lib::$StreamingServers[SERVER_ID]['http_broadcast_port']) . '/progress.php?stream_id=' . intval($streamID);

        if (empty($stream['stream_info']['custom_ffmpeg'])) {

            // set map option ffmpeg
            if ($stream['stream_info']['stream_all'] == 1) {
                $rMap = '-map 0 -copy_unknown ';
            } elseif (!empty($stream['stream_info']['custom_map'])) {
                $rMap = escapeshellcmd($stream['stream_info']['custom_map']) . ' -copy_unknown ';
            } elseif ($stream['stream_info']['type_key'] == 'radio_streams') {
                $rMap = '-map 0:a? ';
            } else {
                $rMap = '';
            }

            // set timestamps options ffmpeg
            if (($stream['stream_info']['gen_timestamps'] == 1 || empty($protocol)) && $stream['stream_info']['type_key'] != 'created_live') {
                $rGenPTS = '-fflags +genpts -async 1';
            } else {
                $rGenPTS = '-nofix_dts -start_at_zero -copyts -vsync 0 -correct_ts_overflow 0 -avoid_negative_ts disabled -max_interleave_delta 0';
            }

            if (!$stream['server_info']['parent_id'] && ($stream['stream_info']['read_native'] == 1 || stristr($rFFProbeOutput['container'], 'hls') || empty($protocol) || stristr($rFFProbeOutput['container'], 'mp4') || stristr($rFFProbeOutput['container'], 'matroska'))) {
                $rReadNative = '-re';
            } else {
                $rReadNative = '';
            }

            if (!$stream['server_info']['parent_id'] && $stream['stream_info']['enable_transcode'] == 1 && $stream['stream_info']['type_key'] != 'created_live') {
                if ($stream['stream_info']['transcode_profile_id'] == -1) {
                    $stream['stream_info']['transcode_attributes'] = array_merge(self::getFormattedStreamArguments($stream['stream_arguments'], $protocol, 'transcode'), json_decode($stream['stream_info']['transcode_attributes'], true));
                } else {
                    $stream['stream_info']['transcode_attributes'] = json_decode($stream['stream_info']['profile_options'], true);
                }
            } else {
                $stream['stream_info']['transcode_attributes'] = array();
            }
            $rFFMPEG = FFMPEG_PATH . ' -y -nostdin -hide_banner -loglevel ' . ((ipTV_lib::$settings['ffmpeg_warnings'] ? 'warning' : 'error')) . ' -err_detect ignore_err {FETCH_OPTIONS} {GEN_PTS} {READ_NATIVE} -probesize ' . $probesize . ' -analyzeduration ' . $analyseDuration . ' -progress "' . $progressURL . '" {CONCAT} -i {STREAM_SOURCE} {LOGO} ';
            if (!array_key_exists('-acodec', $stream['stream_info']['transcode_attributes'])) {
                $stream['stream_info']['transcode_attributes']['-acodec'] = 'copy';
            }
            if (!array_key_exists('-vcodec', $stream['stream_info']['transcode_attributes'])) {
                $stream['stream_info']['transcode_attributes']['-vcodec'] = 'copy';
            }
            if (!array_key_exists('-scodec', $stream['stream_info']['transcode_attributes'])) {
                if (ipTV_lib::$SegmentsSettings['seg_type'] == 0) {
                    $stream['stream_info']['transcode_attributes']['-sn'] = '';
                } else {
                    $stream['stream_info']['transcode_attributes']['-scodec'] = 'copy';
                }
            }
        } else {
            $stream['stream_info']['transcode_attributes'] = array();
            $rFFMPEG = FFMPEG_PATH . ' -y -nostdin -hide_banner -loglevel ' . ((ipTV_lib::$settings['ffmpeg_warnings']  ? 'warning' : 'error')) . ' -progress "' . $progressURL . '" ' . $stream['stream_info']['custom_ffmpeg'];
        }
        $rLLODOptions = ($rLLOD && !$rLoopback ? '-fflags nobuffer -flags low_delay -strict experimental' : '');
        $rOutputs = array();

        if (ipTV_lib::$SegmentsSettings['seg_type'] == 0) {
            $rKeyFrames = (ipTV_lib::$settings["ignore_keyframes"] ? '+split_by_time' : '');
            $rOutputs['mpegts'][] = '{MAP} -individual_header_trailer 0 -f hls -hls_time ' . intval(ipTV_lib::$SegmentsSettings["seg_time"]) . ' -hls_list_size ' . intval(ipTV_lib::$SegmentsSettings["seg_list_size"]) . ' -hls_delete_threshold ' . intval(ipTV_lib::$settings["seg_delete_threshold"]) . ' -hls_flags delete_segments+discont_start+omit_endlist' . $rKeyFrames . ' -hls_segment_type mpegts -hls_segment_filename "' . STREAMS_PATH . intval($streamID) . '_%d.ts" "' . STREAMS_PATH . intval($streamID) . '_.m3u8" ';
        } else {
            $rKeyFrames = (ipTV_lib::$settings["ignore_keyframes"] ? ' -break_non_keyframes 1' : '');
            $rOutputs['mpegts'][] = '{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time ' . intval(ipTV_lib::$SegmentsSettings["seg_time"]) . ' -segment_list_size ' . intval(ipTV_lib::$SegmentsSettings["seg_list_size"]) . ' -segment_format_options "mpegts_flags=+initial_discontinuity:mpegts_copyts=1" -segment_list_type m3u8 -segment_list_flags +live+delete' . $rKeyFrames . ' -segment_list "' . STREAMS_PATH . intval($streamID) . '_.m3u8" "' . STREAMS_PATH . intval($streamID) . '_%d.ts" ';
        }
        if ($stream['stream_info']['rtmp_output'] == 1) {
            $rOutputs['flv'][] = '{MAP} -f flv -flvflags no_duration_filesize rtmp://127.0.0.1:' . intval(ipTV_lib::$StreamingServers[$stream['server_info']['server_id']]['rtmp_port']) . '/live/' . intval($streamID) . '?password=' . urlencode(ipTV_lib::$settings['live_streaming_pass']) . ' ';
        }
        if (!empty($rExternalPush[SERVER_ID])) {
            foreach ($rExternalPush[SERVER_ID] as $pushURL) {
                $rOutputs['flv'][] = '{MAP} -f flv -flvflags no_duration_filesize ' . escapeshellarg($pushURL) . ' ';
            }
        }
        $rLogoOptions = (isset($stream['stream_info']['transcode_attributes'][16]) && !$rLoopback ? $stream['stream_info']['transcode_attributes'][16]['cmd'] : '');
        $rInputCodec = '';
        if (0 >= $stream['stream_info']['delay_minutes'] || $stream['server_info']['parent_id']) {
            foreach ($rOutputs as $rOutputKey => $rOutputCommands) {
                foreach ($rOutputCommands as $rOutputCommand) {
                    $rFFMPEG .= implode(' ', self::parseTranscode($stream['stream_info']['transcode_attributes'])) . ' ';
                    $rFFMPEG .= $rOutputCommand;
                }
            }
        } else {
            $segmentStart = 0;
            if (file_exists(DELAY_PATH . $streamID . '_.m3u8')) {
                $rFile = file(DELAY_PATH . $streamID . '_.m3u8');
                if (stristr($rFile[count($rFile) - 1], $streamID . '_')) {
                    if (!preg_match('/\\_(.*?)\\.ts/', $rFile[count($rFile) - 1], $rMatches)) {
                    } else {
                        $segmentStart = intval($rMatches[1]) + 1;
                    }
                } else {
                    if (preg_match('/\\_(.*?)\\.ts/', $rFile[count($rFile) - 2], $rMatches)) {
                        $segmentStart = intval($rMatches[1]) + 1;
                    }
                }
                if (file_exists(DELAY_PATH . $streamID . '_.m3u8_old')) {
                    file_put_contents(DELAY_PATH . $streamID . '_.m3u8_old', file_get_contents(DELAY_PATH . $streamID . '_.m3u8_old') . file_get_contents(DELAY_PATH . $streamID . '_.m3u8'));
                    shell_exec("sed -i '/EXTINF\\|.ts/!d' " . DELAY_PATH . intval($streamID) . '_.m3u8_old');
                } else {
                    copy(DELAY_PATH . $streamID . '_.m3u8', DELAY_PATH . intval($streamID) . '_.m3u8_old');
                }
            }
            $rFFMPEG .= implode(' ', self::parseTranscode($stream['stream_info']['transcode_attributes'])) . ' ';
            if (ipTV_lib::$SegmentsSettings['seg_type'] == 0) {
                $rFFMPEG .= '{MAP} -individual_header_trailer 0 -f hls -hls_time ' . intval(ipTV_lib::$SegmentsSettings["seg_time"]) . ' -hls_list_size ' . intval($stream['stream_info']['delay_minutes']) * 6 . ' -hls_delete_threshold 4 -start_number ' . $segmentStart . ' -hls_flags delete_segments+discont_start+omit_endlist -hls_segment_type mpegts -hls_segment_filename "' . DELAY_PATH . intval($streamID) . '_%d.ts" "' . DELAY_PATH . intval($streamID) . '_.m3u8" ';
            } else {
                $rFFMPEG .= '{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time ' . intval(ipTV_lib::$SegmentsSettings["seg_time"]) . ' -segment_list_size ' . intval($stream['stream_info']['delay_minutes']) * 6 . ' -segment_start_number ' . $segmentStart . ' -segment_format_options "mpegts_flags=+initial_discontinuity:mpegts_copyts=1" -segment_list_type m3u8 -segment_list_flags +live+delete -segment_list "' . DELAY_PATH . intval($streamID) . '_.m3u8" "' . DELAY_PATH . intval($streamID) . '_%d.ts" ';
            }
            $sleepTime = $stream['stream_info']['delay_minutes'] * 60;
            if ($segmentStart > 0) {
                $sleepTime -= ($segmentStart - 1) * 10;
                if ($sleepTime > 0) {
                } else {
                    $sleepTime = 0;
                }
            }
        }
        $rFFMPEG .= ' >/dev/null 2>>' . STREAMS_PATH . intval($streamID) . '.errors & echo $! > ' . STREAMS_PATH . intval($streamID) . '_.pid';
        $rFFMPEG = str_replace(array('{FETCH_OPTIONS}', '{GEN_PTS}', '{STREAM_SOURCE}', '{MAP}', '{READ_NATIVE}', '{CONCAT}', '{AAC_FILTER}', '{INPUT_CODEC}', '{LOGO}', '{LLOD}'), array((empty($stream['stream_info']['custom_ffmpeg']) ? $rFetchOptions : ''), (empty($stream['stream_info']['custom_ffmpeg']) ? $rGenPTS : ''), escapeshellarg($streamSource), (empty($stream['stream_info']['custom_ffmpeg']) ? $rMap : ''), (empty($stream['stream_info']['custom_ffmpeg']) ? $rReadNative : ''), ($stream['stream_info']['type_key'] == 'created_live' && !$stream['server_info']['parent_id'] ? '-safe 0 -f concat' : ''), (!stristr($rFFProbeOutput['container'], 'flv') && $rFFProbeOutput['codecs']['audio']['codec_name'] == 'aac' && $stream['stream_info']['transcode_attributes']['-acodec'] == 'copy' ? '-bsf:a aac_adtstoasc' : ''), $rInputCodec, $rLogoOptions, $rLLODOptions), $rFFMPEG);

        shell_exec($rFFMPEG);
        file_put_contents(STREAMS_PATH . $streamID . '_.ffmpeg', $rFFMPEG);
        $rKey = openssl_random_pseudo_bytes(16);
        file_put_contents(STREAMS_PATH . $streamID . '_.key', $rKey);
        $rIVSize = openssl_cipher_iv_length('AES-128-CBC');
        $rIV = openssl_random_pseudo_bytes($rIVSize);
        file_put_contents(STREAMS_PATH . $streamID . '_.iv', $rIV);
        $pID = intval(file_get_contents(STREAMS_PATH . $streamID . '_.pid'));
        if ($stream['stream_info']['tv_archive_server_id'] == SERVER_ID) {
            shell_exec(PHP_BIN . ' ' . TOOLS_PATH . 'archive.php ' . intval($streamID) . ' >/dev/null 2>/dev/null & echo $!');
        }
        $rDelayEnabled = 0 < $stream['stream_info']['delay_minutes'] && !$stream['server_info']['parent_id'];
        $rDelayStartAt = ($rDelayEnabled ? time() + $sleepTime : 0);
        if ($stream['stream_info']['enable_transcode']) {
            $rFFProbeOutput = array();
        }
        self::$ipTV_db->query('UPDATE `streams_servers` SET `delay_available_at` = \'%d\',`to_analyze` = 0,`stream_started` = \'%d\',`stream_info` = \'%d\', `stream_status` = 2,`pid` = \'%d\',`progress_info` = \'%d\',`current_source` = \'%d\' WHERE `stream_id` = \'%d\' AND `server_id` = \'%d\'', $rDelayStartAt, time(), json_encode($rFFProbeOutput), $pID, json_encode(array()), $source, $streamID, SERVER_ID);
        ipTV_streaming::updateStream($streamID);
        $playlist = (!$rDelayEnabled ? STREAMS_PATH . $streamID . '_.m3u8' : DELAY_PATH . $streamID . '_.m3u8');
        return array('main_pid' => $pID, 'stream_source' => $rRealSource, 'delay_enabled' => $rDelayEnabled, 'parent_id' => $stream['server_info']['parent_id'], 'delay_start_at' => $rDelayStartAt, 'playlist' => $playlist, 'transcode' => $stream['stream_info']['enable_transcode'], 'offset' => $rOffset);
    }
    /**
     * Generates an array of stream arguments based on the provided stream arguments and server protocol.
     *
     * This method processes the input `$stream_arguments` array, filtering the arguments based on the
     * specified `$type` and `$server_protocol`. It then constructs an array of formatted arguments
     * that can be used in FFmpeg commands or other stream-related operations.
     *
     * @param array $stream_arguments An array of stream arguments, where each element is an associative
     *                                array with keys such as 'argument_cat', 'argument_wprotocol',
     *                                'argument_type', 'argument_cmd', and 'value'.
     * @param string $server_protocol The server protocol to be used for filtering the stream arguments.
     * @param string $type The type of stream arguments to be included in the output.
     * @return array An array of formatted stream arguments, ready for use in FFmpeg commands or other
     *               stream-related operations.
     */
    public static function getFormattedStreamArguments(array $stream_arguments, string $server_protocol, string $type) {
        $formattedArguments = [];

        if (!empty($stream_arguments)) {
            foreach ($stream_arguments as $argument) {
                if ($argument['argument_cat'] != $type) {
                    if (!is_null($argument['argument_wprotocol']) && !stristr($server_protocol, $argument['argument_wprotocol']) && !is_null($server_protocol)) {
                        if ($argument['argument_type'] == 'text') {
                            $formattedArguments[] = sprintf($argument['argument_cmd'], $argument['value']);
                        } else {
                            $formattedArguments[] = $argument['argument_cmd'];
                        }
                    }
                }
            }
        }

        return $formattedArguments;
    }
    /**
     * Parses the stream URL and modifies it based on the server protocol.
     *
     * This function takes a stream URL as input, checks the server protocol, and processes the URL accordingly.
     * For RTMP protocol, it appends ' live=1 timeout=10' to the URL.
     * For HTTP protocol, it extracts the host from the URL and processes specific hosts to get the best stream URL.
     *
     * @param string $url The stream URL to be parsed.
     * @return string The modified stream URL after parsing.
     */
    public static function parseStreamURL($URL) {
        $protocol = strtolower(substr($URL, 0, 4));
        if ($protocol == 'rtmp') {
            if (stristr($URL, '$OPT')) {
                $Pattern = 'rtmp://$OPT:rtmp-raw=';
                $URL = trim(substr($URL, stripos($URL, $Pattern) + strlen($Pattern)));
            }
            $URL .= ' live=1 timeout=10';
        } else {
            if ($protocol == 'http') {
                $Platforms = array('livestream.com', 'ustream.tv', 'twitch.tv', 'vimeo.com', 'facebook.com', 'dailymotion.com', 'cnn.com', 'edition.cnn.com', 'youtube.com', 'youtu.be');
                $Host = str_ireplace('www.', '', parse_url($URL, PHP_URL_HOST));
                if (in_array($Host, $Platforms)) {
                    $URLs = trim(shell_exec(YOUTUBE_PATH . ' ' . escapeshellarg($URL) . ' -q --get-url --skip-download -f best'));
                    $URL = explode("\n", $URLs)[0];
                }
            }
        }
        return $URL;
    }
    /**
     * Transcodes and builds a stream based on the provided stream ID.
     *
     * This function retrieves stream data from the database, transcodes the stream using FFmpeg with specified attributes, creates a new MPEG-TS file, and updates the stream information in the database accordingly.
     *
     * @param int $streamID The ID of the stream to transcode and build.
     * @return int Returns 1 if the stream is successfully transcoded and built, 2 if there are no PIDs for the channel, or 2 if there are no differences in stream sources.
     */
    static function TranscodeBuild($streamID) {
        self::$ipTV_db->query('SELECT * FROM `streams` t1 LEFT JOIN `transcoding_profiles` t3 ON t1.transcode_profile_id = t3.profile_id WHERE t1.`id` = \'%d\'', $streamID);
        $stream = self::$ipTV_db->get_row();
        $stream['cchannel_rsources'] = json_decode($stream['cchannel_rsources'], true);
        $stream['stream_source'] = json_decode($stream['stream_source'], true);
        $stream['pids_create_channel'] = json_decode($stream['pids_create_channel'], true);
        $stream['transcode_attributes'] = json_decode($stream['profile_options'], true);

        // Set default audio and video codecs if not present
        if (!array_key_exists('-acodec', $stream['transcode_attributes'])) {
            $stream['transcode_attributes']['-acodec'] = 'copy';
        }
        if (!array_key_exists('-vcodec', $stream['transcode_attributes'])) {
            $stream['transcode_attributes']['-vcodec'] = 'copy';
        }

        // Construct FFmpeg command
        $ffmpegCommand = FFMPEG_PATH . ' -fflags +genpts -async 1 -y -nostdin -hide_banner -loglevel quiet -i "{INPUT}" ';
        $ffmpegCommand .= implode(' ', self::parseTranscode($stream['transcode_attributes'])) . ' ';
        $ffmpegCommand .= '-strict -2 -mpegts_flags +initial_discontinuity -f mpegts "' . CREATED_CHANNELS . $streamID . '_{INPUT_MD5}.ts" >/dev/null 2>/dev/null & jobs -p';

        $result = array_diff($stream['stream_source'], $stream['cchannel_rsources']);
        $json_string_data = '';

        // Generate JSON string data for stream sources
        foreach ($stream['stream_source'] as $source) {
            $json_string_data .= 'file \'' . CREATED_CHANNELS . $streamID . '_' . md5($source) . '.ts\'';
        }
        $json_string_data = base64_encode($json_string_data);

        if ((!empty($result) || $stream['stream_source'] !== $stream['cchannel_rsources'])) {
            foreach ($result as $source) {
                $stream['pids_create_channel'][] = ipTV_servers::RunCommandServer($stream['created_channel_location'], str_ireplace(array('{INPUT}', '{INPUT_MD5}'), array($source, md5($source)), $ffmpegCommand), 'raw')[$stream['created_channel_location']];
            }
            self::$ipTV_db->query('UPDATE `streams` SET pids_create_channel = \'%s\',`cchannel_rsources` = \'%s\' WHERE `id` = \'%d\'', json_encode($stream['pids_create_channel']), json_encode($stream['stream_source']), $streamID);
            ipTV_servers::RunCommandServer($stream['created_channel_location'], "echo {$json_string_data} | base64 --decode > \"" . CREATED_CHANNELS . $streamID . '_.list"', 'raw');
            return 1;
        } else if (!empty($stream['pids_create_channel'])) {
            foreach ($stream['pids_create_channel'] as $key => $pid) {
                if (!ipTV_servers::PidsChannels($stream['created_channel_location'], $pid, FFMPEG_PATH)) {
                    unset($stream['pids_create_channel'][$key]);
                }
            }
            self::$ipTV_db->query('UPDATE `streams` SET pids_create_channel = \'%s\' WHERE `id` = \'%d\'', json_encode($stream['pids_create_channel']), $streamID);
            return empty($stream['pids_create_channel']) ? 2 : 1;
        }

        return 2;
    }
    /**
     * Formats the transcode attributes for use in FFmpeg commands.
     *
     * This method processes the input `$transcode_attributes` array, which may contain
     * both individual attributes and complex filter expressions. It extracts the
     * filter expressions, formats the attributes, and returns an array of formatted
     * attributes ready for use in FFmpeg commands.
     *
     * @param array $transcode_attributes An array of transcode attributes, which may
     *                                   include individual attributes and/or complex
     *                                   filter expressions.
     * @return array An array of formatted transcode attributes, ready for use in
     *               FFmpeg commands.
     */
    public static function parseTranscode(array $transcode_attributes) {
        $filter_complex = array();
        foreach ($transcode_attributes as $k => $attribute) {
            if (isset($attribute['cmd'])) {
                $transcode_attributes[$k] = $attribute = $attribute['cmd'];
            }
            if (preg_match('/-filter_complex "(.*?)"/', $attribute, $matches)) {
                $transcode_attributes[$k] = trim(str_replace($matches[0], '', $transcode_attributes[$k]));
                $filter_complex[] = $matches[1];
            }
        }
        if (!empty($filter_complex)) {
            $transcode_attributes[] = '-filter_complex "' . implode(',', $filter_complex) . '"';
        }
        $formatted_attributes = array();
        foreach ($transcode_attributes as $k => $attribute) {
            if (is_numeric($k)) {
                $formatted_attributes[] = $attribute;
            } else {
                $formatted_attributes[] = $k . ' ' . $attribute;
            }
        }
        $formatted_attributes = array_filter($formatted_attributes);
        uasort($formatted_attributes, array(__CLASS__, 'customOrder'));
        return array_map('trim', array_values(array_filter($formatted_attributes)));
    }
    public static function customOrder($a, $b) {
        if (substr($a, 0, 3) == '-i ') {
            return -1;
        }
        return 1;
    }
}
