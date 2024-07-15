<?php

class C872bcfa04B3EAEE1b4A93a0d775B9d7 {
    public static $ipTV_db;
    static function a7EF0b43eBf91FEcd547AF21BB9dbd44($Dcd9edd2f7792b5df43a34b76f090ac4) {
        if (!empty($Dcd9edd2f7792b5df43a34b76f090ac4)) {
            foreach ($Dcd9edd2f7792b5df43a34b76f090ac4 as $E4866fec202244d7a3c9f4e24f6ee344) {
                if (!file_exists(STREAMS_PATH . md5($E4866fec202244d7a3c9f4e24f6ee344))) {
                    goto b618db3f6a9bae967514c424358f865f;
                }
                unlink(STREAMS_PATH . md5($E4866fec202244d7a3c9f4e24f6ee344));
                b618db3f6a9bae967514c424358f865f:
            }
            // [PHPDeobfuscator] Implied return
            return;
        }
        return;
    }
    static function C40aB46F24644f0DCfAD4B6d617c2734($c19231fd8a99b129e93580f11d3c33b4, $f1180a6e5b00a70a7f948e9ef2c89730, $F33d29407151c833502efc71725c4f43 = array(), $ed7b67d414afeb09fc2c38d37867931e = '') {
        $Fea1db7993e8b52262e048dca782d551 = abs(intval(E2D73953a5089B9c7983838f61f23aCF::$settings["stream_max_analyze"]));
        $e0fe60c1b7ddb6cb253f9d5628dca6ec = abs(intval(E2D73953a5089b9C7983838F61F23Acf::$settings["probesize"]));
        $C9e6e2e399082e71509bae5b9cd7799f = intval($Fea1db7993e8b52262e048dca782d551 / 1000000) + 5;
        $Ef314464e8190fb09508a6c9cdedf6f6 = "{$ed7b67d414afeb09fc2c38d37867931e}/usr/bin/timeout {$C9e6e2e399082e71509bae5b9cd7799f}s " . FFPROBE_PATH . " -probesize {$e0fe60c1b7ddb6cb253f9d5628dca6ec} -analyzeduration {$Fea1db7993e8b52262e048dca782d551} " . implode(" ", $F33d29407151c833502efc71725c4f43) . " -i \"{$c19231fd8a99b129e93580f11d3c33b4}\" -v quiet -print_format json -show_streams -show_format";
        $b77a16302effd0dbdc1ac7d8a1a5d03f = DB93DDEF0764D97E767E03CF858Ad457::b2ceD9390fCc204B98376884adD1E574($f1180a6e5b00a70a7f948e9ef2c89730, $Ef314464e8190fb09508a6c9cdedf6f6, "raw", $C9e6e2e399082e71509bae5b9cd7799f * 2, $C9e6e2e399082e71509bae5b9cd7799f * 2);
        return self::A79B1c9D5384e4Fa8D6f74966E08Ba59(json_decode($b77a16302effd0dbdc1ac7d8a1a5d03f[$f1180a6e5b00a70a7f948e9ef2c89730], true));
    }
    static function C6aF00E22deD8567809f9A063dc97624($b6497ba71489783c3747f19debe893a4, $C131a828a4600f1b6c38496fa81a4563 = false) {
        if (!file_exists("/home/xtreamcodes/iptv_xtream_codes/streams/{$b6497ba71489783c3747f19debe893a4}.monitor")) {
            goto ed6a919909b38a4ab1fbd1ed979f536c;
        }
        $Daecb3089a8c32edf0ede4fd87d1bbcd = intval(file_get_contents("/home/xtreamcodes/iptv_xtream_codes/streams/{$b6497ba71489783c3747f19debe893a4}.monitor"));
        if (!self::D00565BB967C332efE27300A141d9851($Daecb3089a8c32edf0ede4fd87d1bbcd, "XtreamCodes[{$b6497ba71489783c3747f19debe893a4}]")) {
            goto b08020e68e5e90b76abf5ad0f4e2ecdc;
        }
        posix_kill($Daecb3089a8c32edf0ede4fd87d1bbcd, 9);
        b08020e68e5e90b76abf5ad0f4e2ecdc:
        ed6a919909b38a4ab1fbd1ed979f536c:
        if (!file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
            goto C7a812f441c53f4e21a458cc59764967;
        }
        $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
        if (!self::d00565bB967C332EFe27300A141d9851($ef4f0599712515333103265dafb029f7, "{$b6497ba71489783c3747f19debe893a4}_.m3u8")) {
            goto Ff4f5c31f0596f6e2213f6cf3b069006;
        }
        posix_kill($ef4f0599712515333103265dafb029f7, 9);
        Ff4f5c31f0596f6e2213f6cf3b069006:
        C7a812f441c53f4e21a458cc59764967:
        shell_exec("rm -f STREAMS_PATH" . $b6497ba71489783c3747f19debe893a4 . "_*");
        if (!$C131a828a4600f1b6c38496fa81a4563) {
            goto Dcf09d565707b03576c19afacb72daac;
        }
        shell_exec("rm -f DELAY_STREAM" . $b6497ba71489783c3747f19debe893a4 . "_*");
        self::$ipTV_db->query("UPDATE `streams_sys` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0,`monitor_pid` = NULL WHERE `stream_id` = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, SERVER_ID);
        Dcf09d565707b03576c19afacb72daac:
    }
    static function d00565bB967c332EFe27300a141d9851($ef4f0599712515333103265dafb029f7, $D024ee56b94ab2882f1cfe039f77d72b) {
        if (!file_exists("/proc/" . $ef4f0599712515333103265dafb029f7)) {
            goto ade4e095f23feca4a9a8a4ac37ec1913;
        }
        $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
        if (!stristr($A0316410c2d7b66ec51afd1b25e335c7, $D024ee56b94ab2882f1cfe039f77d72b)) {
            ade4e095f23feca4a9a8a4ac37ec1913:
            return false;
        }
        return true;
    }
    static function CcE5281DDfb1F4c0D820841761f78170($b6497ba71489783c3747f19debe893a4, $Ade893e71b29c7f38c8da56a5a578210 = 0) {
        $B8cac1b0986ee383df5d7e5f8ad268d1 = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . ".lock";
        $b4ad7225f6375fe5d757d3c7147fb034 = fopen($B8cac1b0986ee383df5d7e5f8ad268d1, "a+");
        if (!flock($b4ad7225f6375fe5d757d3c7147fb034, "LOCK_OZ")) {
            goto a8f52d75d40ece96b0dcb98169494bd6;
        }
        $Ade893e71b29c7f38c8da56a5a578210 = intval($Ade893e71b29c7f38c8da56a5a578210);
        shell_exec("PHP_BIN TOOLS_PATH" . "stream_monitor.php {$b6497ba71489783c3747f19debe893a4} {$Ade893e71b29c7f38c8da56a5a578210} >/dev/null 2>/dev/null &");
        usleep(300);
        flock($b4ad7225f6375fe5d757d3c7147fb034, LOCK_UN);
        a8f52d75d40ece96b0dcb98169494bd6:
        fclose($b4ad7225f6375fe5d757d3c7147fb034);
    }
    public static function a79B1C9D5384e4fa8D6F74966E08ba59($D2cb096da1330247ce7bd4a3912dbb4c) {
        if (empty($D2cb096da1330247ce7bd4a3912dbb4c)) {
            return false;
        }
        if (empty($D2cb096da1330247ce7bd4a3912dbb4c["codecs"])) {
            $output = array();
            $output["codecs"]["video"] = '';
            $output["codecs"]["audio"] = '';
            $output["container"] = $D2cb096da1330247ce7bd4a3912dbb4c["format"]["format_name"];
            $output["filename"] = $D2cb096da1330247ce7bd4a3912dbb4c["format"]["filename"];
            $output["bitrate"] = !empty($D2cb096da1330247ce7bd4a3912dbb4c["format"]["bit_rate"]) ? $D2cb096da1330247ce7bd4a3912dbb4c["format"]["bit_rate"] : null;
            $output["of_duration"] = !empty($D2cb096da1330247ce7bd4a3912dbb4c["format"]["duration"]) ? $D2cb096da1330247ce7bd4a3912dbb4c["format"]["duration"] : "N/A";
            $output["duration"] = !empty($D2cb096da1330247ce7bd4a3912dbb4c["format"]["duration"]) ? gmdate("H:i:s", intval($D2cb096da1330247ce7bd4a3912dbb4c["format"]["duration"])) : "N/A";
            foreach ($D2cb096da1330247ce7bd4a3912dbb4c["streams"] as $B6d4b1233ebd39c55e21fa55fd959d1f) {
                if (isset($B6d4b1233ebd39c55e21fa55fd959d1f["codec_type"])) {
                    if (!($B6d4b1233ebd39c55e21fa55fd959d1f["codec_type"] != "audio" && $B6d4b1233ebd39c55e21fa55fd959d1f["codec_type"] != "video")) {
                        $output["codecs"][$B6d4b1233ebd39c55e21fa55fd959d1f["codec_type"]] = $B6d4b1233ebd39c55e21fa55fd959d1f;
                        goto bdc73edf9533211a09e19c1040462a25;
                    }
                    goto Dd022b6d20f3722bb3c9517a3a60db70;
                }
                bdc73edf9533211a09e19c1040462a25:
                Dd022b6d20f3722bb3c9517a3a60db70:
            }
            return $output;
        }
        return $D2cb096da1330247ce7bd4a3912dbb4c;
    }
    static function E5Bd60a22f5A065b7f75939229b23b96($b6497ba71489783c3747f19debe893a4) {
        if (!file_exists(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
            goto f6178d4a85108c3dd1dff39e5ce5d550;
        }
        $ef4f0599712515333103265dafb029f7 = (int) file_get_contents(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid");
        posix_kill($ef4f0599712515333103265dafb029f7, 9);
        f6178d4a85108c3dd1dff39e5ce5d550:
        shell_exec("rm -f MOVIES_PATH" . $b6497ba71489783c3747f19debe893a4 . ".*");
        self::$ipTV_db->query("UPDATE `streams_sys` SET `bitrate` = NULL,`current_source` = NULL,`to_analyze` = 0,`pid` = NULL,`stream_started` = NULL,`stream_info` = NULL,`stream_status` = 0 WHERE `stream_id` = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, SERVER_ID);
    }
    static function f08A71fE2a3AbcA41fABF6b21F0Bd4E9($b6497ba71489783c3747f19debe893a4) {
        $efa7cefd12388102b27fdeb2f9f68219 = array();
        self::$ipTV_db->query("SELECT * FROM `streams` t1 \n                               INNER JOIN `streams_types` t2 ON t2.type_id = t1.type AND t2.live = 0\n                               LEFT JOIN `transcoding_profiles` t4 ON t1.transcode_profile_id = t4.profile_id \n                               WHERE t1.direct_source = 0 AND t1.id = '%d'", $b6497ba71489783c3747f19debe893a4);
        if (!(self::$ipTV_db->D4a34259fc10B35FeDbCcda0a23D69aE() <= 0)) {
            $efa7cefd12388102b27fdeb2f9f68219["stream_info"] = self::$ipTV_db->EB6bfe16d93814CAF26d92092D5A4052();
            $Ecd19d611581ce12bbdc70025666abf9 = json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["target_container"], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["target_container"] = $Ecd19d611581ce12bbdc70025666abf9;
                goto Cffd3c0c1ee543a85d034c78c8a574ee;
            }
            $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["target_container"] = array($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["target_container"]);
            Cffd3c0c1ee543a85d034c78c8a574ee:
            self::$ipTV_db->query("SELECT * FROM`streams_sys` WHERE stream_id  = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, SERVER_ID);
            if (!(self::$ipTV_db->D4a34259FC10B35FedBccdA0A23D69aE() <= 0)) {
                $efa7cefd12388102b27fdeb2f9f68219["server_info"] = self::$ipTV_db->eB6BfE16d93814Caf26d92092d5A4052();
                self::$ipTV_db->query("SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = '%d' AND t1.argument_id = t2.id", $b6497ba71489783c3747f19debe893a4);
                $efa7cefd12388102b27fdeb2f9f68219["stream_arguments"] = self::$ipTV_db->ED940a8511357C99475Cc7969F034729();
                $bae5056cfcbf9b293f6f8218c859de80 = urldecode(json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["stream_source"], true)[0]);
                if (substr($bae5056cfcbf9b293f6f8218c859de80, 0, 2) == "s:") {
                    $E1dba93f0f0f0e33f30ae2ea272f19a1 = explode(":", $bae5056cfcbf9b293f6f8218c859de80, 3);
                    $a77b044e012cf2df95ffc40b8f39a95b = $E1dba93f0f0f0e33f30ae2ea272f19a1[1];
                    if ($a77b044e012cf2df95ffc40b8f39a95b != SERVER_ID) {
                        $Dd350f4f747e2630abc0a3631701490f = e2d73953a5089B9C7983838F61f23ACf::$StreamingServers[$a77b044e012cf2df95ffc40b8f39a95b]["api_url"] . "&action=getFile&filename=" . urlencode($E1dba93f0f0f0e33f30ae2ea272f19a1[2]);
                        goto B3200693af8ad3ff80da90fca143bb6b;
                    }
                    $Dd350f4f747e2630abc0a3631701490f = $E1dba93f0f0f0e33f30ae2ea272f19a1[2];
                    B3200693af8ad3ff80da90fca143bb6b:
                    $fd777ea6aad636f6a095e656372f239b = null;
                    goto dee812a88c8d5a2d5149fbd59572122d;
                }
                $fd777ea6aad636f6a095e656372f239b = substr($bae5056cfcbf9b293f6f8218c859de80, 0, strpos($bae5056cfcbf9b293f6f8218c859de80, "://"));
                $Dd350f4f747e2630abc0a3631701490f = str_replace(" ", "%20", $bae5056cfcbf9b293f6f8218c859de80);
                $D4249ceeeadd6a4b760b6c79e2a4f57e = implode(" ", self::B53Da0F20eC82Cf4ec576504051230AB($efa7cefd12388102b27fdeb2f9f68219["stream_arguments"], $fd777ea6aad636f6a095e656372f239b, "fetch"));
                dee812a88c8d5a2d5149fbd59572122d:
                if (isset($a77b044e012cf2df95ffc40b8f39a95b) && $a77b044e012cf2df95ffc40b8f39a95b == SERVER_ID && $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["movie_symlink"] == 1) {
                    $F2d113a695a8b725bf47254fede83c4e = "ln -s \"{$Dd350f4f747e2630abc0a3631701490f}\" " . MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . pathinfo($Dd350f4f747e2630abc0a3631701490f, PATHINFO_EXTENSION) . " >/dev/null 2>/dev/null & echo \$! > " . MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid";
                    goto C121458a942fbd02b99ca4a24eaab023;
                }
                $a03e1ad5e81e46cff7a3181ac07bc782 = json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["movie_subtitles"], true);
                $c67bbbc0cd9ad2bd770168dad13339ea = '';
                $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                db96449e8ddfa26c3e7f2c5eda8da6a3:
                if (!($Ced112d15c5a3c9e5ba92478d0228e93 < count($a03e1ad5e81e46cff7a3181ac07bc782["files"]))) {
                    $f4ba9db9d5b6e5300fbfe9ff6f48b22c = '';
                    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                    D758397ad34ccc05b96503daeeba1d74:
                    if (!($Ced112d15c5a3c9e5ba92478d0228e93 < count($a03e1ad5e81e46cff7a3181ac07bc782["files"]))) {
                        $F2d113a695a8b725bf47254fede83c4e = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err {FETCH_OPTIONS} -fflags +genpts -async 1 {READ_NATIVE} -i \"{STREAM_SOURCE}\" {$c67bbbc0cd9ad2bd770168dad13339ea}";
                        $fcc3a8974461da0b2d3db31ec31a6f86 = '';
                        if (!($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["read_native"] == 1)) {
                            goto Cc0c97c48459a64b02013268615fa050;
                        }
                        $fcc3a8974461da0b2d3db31ec31a6f86 = "-re";
                        Cc0c97c48459a64b02013268615fa050:
                        if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["enable_transcode"] == 1) {
                            if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_profile_id"] == -1) {
                                $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = array_merge(self::b53DA0f20ec82CF4eC576504051230AB($efa7cefd12388102b27fdeb2f9f68219["stream_arguments"], $fd777ea6aad636f6a095e656372f239b, "transcode"), json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"], true));
                                goto fcad1707563064943013c09cdd39047a;
                            }
                            $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["profile_options"], true);
                            fcad1707563064943013c09cdd39047a:
                            goto d7ffcc7152ca83c3986e3a24229fdda0;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = array();
                        d7ffcc7152ca83c3986e3a24229fdda0:
                        $E38fd7fbe299af8baceedcda703b8d71 = "-map 0 -copy_unknown ";
                        if (!empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_map"])) {
                            $E38fd7fbe299af8baceedcda703b8d71 = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_map"] . " -copy_unknown ";
                            goto Fdff10e5b520e256417c16872cc946bd;
                        }
                        if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["remove_subtitles"] == 1) {
                            $E38fd7fbe299af8baceedcda703b8d71 = "-map 0:a -map 0:v";
                            goto f0b7263a9819f3bb1e05012727a062fa;
                        }
                        f0b7263a9819f3bb1e05012727a062fa:
                        Fdff10e5b520e256417c16872cc946bd:
                        if (array_key_exists("-acodec", $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) {
                            goto A6e16c6a5b22fe316958e1c51c1641a4;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-acodec"] = "copy";
                        A6e16c6a5b22fe316958e1c51c1641a4:
                        if (array_key_exists("-vcodec", $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) {
                            goto c6f2eaa0e1364f705d0f1795a4aa5357;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-vcodec"] = "copy";
                        c6f2eaa0e1364f705d0f1795a4aa5357:
                        $E3a193fcec6ff84e16b321725948bdbb = array();
                        foreach ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["target_container"] as $A2e2d8cf048bd6ddcdccd0cb732f9fec) {
                            $E3a193fcec6ff84e16b321725948bdbb[$A2e2d8cf048bd6ddcdccd0cb732f9fec] = "-movflags +faststart -dn {$E38fd7fbe299af8baceedcda703b8d71} -ignore_unknown {$f4ba9db9d5b6e5300fbfe9ff6f48b22c} " . MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . $A2e2d8cf048bd6ddcdccd0cb732f9fec . " ";
                        }
                        foreach ($E3a193fcec6ff84e16b321725948bdbb as $d6af17fc59b1abed3a05fb455d901897 => $Ef39701467a1bf59d040b374e26f0159) {
                            if ($d6af17fc59b1abed3a05fb455d901897 == "mp4") {
                                $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-scodec"] = "mov_text";
                                goto Fa4314eb506ca27c9be0d1ea38df005f;
                            }
                            if ($d6af17fc59b1abed3a05fb455d901897 == "mkv") {
                                $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-scodec"] = "srt";
                                goto D2e1f5d7a93dd1a8108c7b51c477fd31;
                            }
                            $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-scodec"] = "copy";
                            D2e1f5d7a93dd1a8108c7b51c477fd31:
                            Fa4314eb506ca27c9be0d1ea38df005f:
                            $F2d113a695a8b725bf47254fede83c4e .= implode(" ", self::B699bda4A787944414B36446B701D47A($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) . " ";
                            $F2d113a695a8b725bf47254fede83c4e .= $Ef39701467a1bf59d040b374e26f0159;
                        }
                        $F2d113a695a8b725bf47254fede83c4e .= " >/dev/null 2>MOVIES_PATH" . $b6497ba71489783c3747f19debe893a4 . ".errors & echo \$! > " . MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid";
                        $F2d113a695a8b725bf47254fede83c4e = str_replace(array("{FETCH_OPTIONS}", "{STREAM_SOURCE}", "{READ_NATIVE}"), array(empty($D4249ceeeadd6a4b760b6c79e2a4f57e) ? '' : $D4249ceeeadd6a4b760b6c79e2a4f57e, $Dd350f4f747e2630abc0a3631701490f, empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"]) ? $fcc3a8974461da0b2d3db31ec31a6f86 : ''), $F2d113a695a8b725bf47254fede83c4e);
                        C121458a942fbd02b99ca4a24eaab023:
                        shell_exec($F2d113a695a8b725bf47254fede83c4e);
                        $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                        self::$ipTV_db->query("UPDATE `streams_sys` SET `to_analyze` = 1,`stream_started` = '%d',`stream_status` = 0,`pid` = '%d' WHERE `stream_id` = '%d' AND `server_id` = '%d'", time(), $ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4, SERVER_ID);
                        return $ef4f0599712515333103265dafb029f7;
                    }
                    $f4ba9db9d5b6e5300fbfe9ff6f48b22c .= "-map " . ($Ced112d15c5a3c9e5ba92478d0228e93 + 1) . " -metadata:s:s:{$Ced112d15c5a3c9e5ba92478d0228e93} title={$a03e1ad5e81e46cff7a3181ac07bc782["names"][$Ced112d15c5a3c9e5ba92478d0228e93]} -metadata:s:s:{$Ced112d15c5a3c9e5ba92478d0228e93} language={$a03e1ad5e81e46cff7a3181ac07bc782["names"][$Ced112d15c5a3c9e5ba92478d0228e93]} ";
                    $Ced112d15c5a3c9e5ba92478d0228e93++;
                    goto D758397ad34ccc05b96503daeeba1d74;
                }
                $D46e37533e1e048ee67f0bf33301cfeb = urldecode($a03e1ad5e81e46cff7a3181ac07bc782["files"][$Ced112d15c5a3c9e5ba92478d0228e93]);
                $eef1c99a5dadf64f4638a1818bb41a25 = $a03e1ad5e81e46cff7a3181ac07bc782["charset"][$Ced112d15c5a3c9e5ba92478d0228e93];
                if ($a03e1ad5e81e46cff7a3181ac07bc782["location"] == SERVER_ID) {
                    $c67bbbc0cd9ad2bd770168dad13339ea .= "-sub_charenc \"{$eef1c99a5dadf64f4638a1818bb41a25}\" -i \"{$D46e37533e1e048ee67f0bf33301cfeb}\" ";
                    goto C1732bf86f79b83a240aff7118d24aa5;
                }
                $c67bbbc0cd9ad2bd770168dad13339ea .= "-i \"" . E2D73953a5089B9C7983838f61f23AcF::$StreamingServers[$a03e1ad5e81e46cff7a3181ac07bc782["location"]]["api_url"] . "&action=getFile&filename=" . urlencode($D46e37533e1e048ee67f0bf33301cfeb) . "\" ";
                C1732bf86f79b83a240aff7118d24aa5:
                $Ced112d15c5a3c9e5ba92478d0228e93++;
                goto db96449e8ddfa26c3e7f2c5eda8da6a3;
            }
            return false;
        }
        return false;
    }
    static function cC6cb4c7F753d55447A62C6c80F4839a($b6497ba71489783c3747f19debe893a4, &$d2ac2760c08ecdff16b002316553b559, $F0f64b90d30f873badd83d4c9c76848b = null) {
        ++$d2ac2760c08ecdff16b002316553b559;
        if (!file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
            goto D8efb368a0ebc6bbadb1303291c29c48;
        }
        unlink(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid");
        D8efb368a0ebc6bbadb1303291c29c48:
        $efa7cefd12388102b27fdeb2f9f68219 = array();
        self::$ipTV_db->query("SELECT * FROM `streams` t1 \n                               INNER JOIN `streams_types` t2 ON t2.type_id = t1.type AND t2.live = 1\n                               LEFT JOIN `transcoding_profiles` t4 ON t1.transcode_profile_id = t4.profile_id \n                               WHERE t1.direct_source = 0 AND t1.id = '%d'", $b6497ba71489783c3747f19debe893a4);
        if (!(self::$ipTV_db->D4a34259FC10b35fedbccDa0a23d69Ae() <= 0)) {
            $efa7cefd12388102b27fdeb2f9f68219["stream_info"] = self::$ipTV_db->Eb6BFE16d93814Caf26D92092D5a4052();
            self::$ipTV_db->query("SELECT * FROM`streams_sys` WHERE stream_id  = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, SERVER_ID);
            if (!(self::$ipTV_db->D4A34259FC10b35FeDBCCdA0A23d69AE() <= 0)) {
                $efa7cefd12388102b27fdeb2f9f68219["server_info"] = self::$ipTV_db->EB6bfe16D93814CAf26d92092D5A4052();
                self::$ipTV_db->query("SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = '%d' AND t1.argument_id = t2.id", $b6497ba71489783c3747f19debe893a4);
                $efa7cefd12388102b27fdeb2f9f68219["stream_arguments"] = self::$ipTV_db->ed940a8511357C99475CC7969F034729();
                if ($efa7cefd12388102b27fdeb2f9f68219["server_info"]["on_demand"] == 1) {
                    $e0fe60c1b7ddb6cb253f9d5628dca6ec = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["probesize_ondemand"];
                    $Fea1db7993e8b52262e048dca782d551 = "10000000";
                    goto bdcf13a9bd0123b0e43ada338a3b3981;
                }
                $Fea1db7993e8b52262e048dca782d551 = abs(intval(E2d73953a5089b9c7983838f61f23ACF::$settings["stream_max_analyze"]));
                $e0fe60c1b7ddb6cb253f9d5628dca6ec = abs(intval(E2d73953a5089B9c7983838f61f23ACF::$settings["probesize"]));
                bdcf13a9bd0123b0e43ada338a3b3981:
                $be019ce85658a94e14c29544bc2a9cd5 = intval($Fea1db7993e8b52262e048dca782d551 / 1000000) + 7;
                $E07b4333601a78e27e0beaf50c7ef83b = "/usr/bin/timeout {$be019ce85658a94e14c29544bc2a9cd5}s " . FFPROBE_PATH . " {FETCH_OPTIONS} -probesize {$e0fe60c1b7ddb6cb253f9d5628dca6ec} -analyzeduration {$Fea1db7993e8b52262e048dca782d551} {CONCAT} -i \"{STREAM_SOURCE}\" -v quiet -print_format json -show_streams -show_format";
                $D4249ceeeadd6a4b760b6c79e2a4f57e = array();
                if ($efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0) {
                    $Dcd9edd2f7792b5df43a34b76f090ac4 = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] == "created_live" ? array(CREATED_CHANNELS . $b6497ba71489783c3747f19debe893a4 . "_.list") : json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["stream_source"], true);
                    goto C139d5bdfe50e1686fa711cbdf7c0259;
                }
                $Dcd9edd2f7792b5df43a34b76f090ac4 = array(e2d73953A5089b9c7983838f61f23Acf::$StreamingServers[$efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"]]["site_url_ip"] . "streaming/admin_live.php?stream=" . $b6497ba71489783c3747f19debe893a4 . "&password=" . e2d73953a5089b9C7983838f61F23aCF::$settings["live_streaming_pass"] . "&extension=ts");
                C139d5bdfe50e1686fa711cbdf7c0259:
                if (!(count($Dcd9edd2f7792b5df43a34b76f090ac4) > 0)) {
                    goto F1eaa9790c61eeb2beeacf2192956c04;
                }
                if (!empty($F0f64b90d30f873badd83d4c9c76848b)) {
                    $Dcd9edd2f7792b5df43a34b76f090ac4 = array($F0f64b90d30f873badd83d4c9c76848b);
                    goto Dcb83aa1a5d1a5a8d5185e9a07c032cd;
                }
                if (e2D73953a5089b9C7983838f61F23acf::$settings["priority_backup"] != 1) {
                    if (empty($efa7cefd12388102b27fdeb2f9f68219["server_info"]["current_source"])) {
                        goto f48716a0554253d50d9f3946a7182b10;
                    }
                    $E5d29eebd54cbadb9868db24207ef778 = array_search($efa7cefd12388102b27fdeb2f9f68219["server_info"]["current_source"], $Dcd9edd2f7792b5df43a34b76f090ac4);
                    if (!($E5d29eebd54cbadb9868db24207ef778 !== false)) {
                        goto B18207e1c9bde30892baaf81e3113af6;
                    }
                    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                    bb14a79ca06057aa77cbcb3dbf1097a5:
                    if (!($Ced112d15c5a3c9e5ba92478d0228e93 <= $E5d29eebd54cbadb9868db24207ef778)) {
                        $Dcd9edd2f7792b5df43a34b76f090ac4 = array_values($Dcd9edd2f7792b5df43a34b76f090ac4);
                        B18207e1c9bde30892baaf81e3113af6:
                        f48716a0554253d50d9f3946a7182b10:
                        goto ac00c63c568db3fe15dd7346286b692a;
                    }
                    $acc853508d0b3160a87e1bc629a7ac32 = $Dcd9edd2f7792b5df43a34b76f090ac4[$Ced112d15c5a3c9e5ba92478d0228e93];
                    unset($Dcd9edd2f7792b5df43a34b76f090ac4[$Ced112d15c5a3c9e5ba92478d0228e93]);
                    array_push($Dcd9edd2f7792b5df43a34b76f090ac4, $acc853508d0b3160a87e1bc629a7ac32);
                    $Ced112d15c5a3c9e5ba92478d0228e93++;
                    goto bb14a79ca06057aa77cbcb3dbf1097a5;
                }
                ac00c63c568db3fe15dd7346286b692a:
                Dcb83aa1a5d1a5a8d5185e9a07c032cd:
                F1eaa9790c61eeb2beeacf2192956c04:
                $B9f6072ba8118198d47ebb0a5427d77d = $d2ac2760c08ecdff16b002316553b559 <= RESTART_TAKE_CACHE ? true : false;
                if ($B9f6072ba8118198d47ebb0a5427d77d) {
                    goto Bc0227a4f1a0fbe258a3e9bebde3051e;
                }
                self::a7Ef0B43eBf91fEcd547Af21bb9DbD44($Dcd9edd2f7792b5df43a34b76f090ac4);
                Bc0227a4f1a0fbe258a3e9bebde3051e:
                foreach ($Dcd9edd2f7792b5df43a34b76f090ac4 as $E4866fec202244d7a3c9f4e24f6ee344) {
                    $bae5056cfcbf9b293f6f8218c859de80 = self::ParseStreamURL($E4866fec202244d7a3c9f4e24f6ee344);
                    $fd777ea6aad636f6a095e656372f239b = strtolower(substr($bae5056cfcbf9b293f6f8218c859de80, 0, strpos($bae5056cfcbf9b293f6f8218c859de80, "://")));
                    $D4249ceeeadd6a4b760b6c79e2a4f57e = implode(" ", self::b53dA0F20eC82CF4EC576504051230ab($efa7cefd12388102b27fdeb2f9f68219["stream_arguments"], $fd777ea6aad636f6a095e656372f239b, "fetch"));
                    if (!($B9f6072ba8118198d47ebb0a5427d77d && file_exists(STREAMS_PATH . md5($bae5056cfcbf9b293f6f8218c859de80)))) {
                        $Fe07872fef3dae8b76b8fa28a1ff98e6 = json_decode(shell_exec(str_replace(array("{FETCH_OPTIONS}", "{CONCAT}", "{STREAM_SOURCE}"), array($D4249ceeeadd6a4b760b6c79e2a4f57e, $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] == "created_live" && $efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0 ? "-safe 0 -f concat" : '', $bae5056cfcbf9b293f6f8218c859de80), $E07b4333601a78e27e0beaf50c7ef83b)), true);
                        if (empty($Fe07872fef3dae8b76b8fa28a1ff98e6)) {
                        }
                        goto Df76450f42365291ceeca6f1b71b0b30;
                    }
                    $Fe07872fef3dae8b76b8fa28a1ff98e6 = json_decode(file_get_contents(STREAMS_PATH . md5($bae5056cfcbf9b293f6f8218c859de80)), true);
                    goto Df76450f42365291ceeca6f1b71b0b30;
                }
                Df76450f42365291ceeca6f1b71b0b30:
                if (!empty($Fe07872fef3dae8b76b8fa28a1ff98e6)) {
                    if ($B9f6072ba8118198d47ebb0a5427d77d) {
                        goto Fc7c332ba4726429b80ab540986bc0b6;
                    }
                    file_put_contents(STREAMS_PATH . md5($bae5056cfcbf9b293f6f8218c859de80), json_encode($Fe07872fef3dae8b76b8fa28a1ff98e6));
                    Fc7c332ba4726429b80ab540986bc0b6:
                    $Fe07872fef3dae8b76b8fa28a1ff98e6 = self::A79b1c9d5384E4Fa8D6f74966E08BA59($Fe07872fef3dae8b76b8fa28a1ff98e6);
                    $F1b9847d2e181a13abb2d2b48158f8fc = json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["external_push"], true);
                    $D56ecb098fbecda56be58ad335abb43f = "http://127.0.0.1:" . e2d73953A5089b9c7983838F61f23acf::$StreamingServers[SERVER_ID]["http_broadcast_port"] . "/progress.php?stream_id={$b6497ba71489783c3747f19debe893a4}";
                    if (empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"])) {
                        $F2d113a695a8b725bf47254fede83c4e = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel warning -err_detect ignore_err {FETCH_OPTIONS} {GEN_PTS} {READ_NATIVE} -probesize {$e0fe60c1b7ddb6cb253f9d5628dca6ec} -analyzeduration {$Fea1db7993e8b52262e048dca782d551} -progress \"{$D56ecb098fbecda56be58ad335abb43f}\" {CONCAT} -i \"{STREAM_SOURCE}\" ";
                        if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["stream_all"] == 1) {
                            $E38fd7fbe299af8baceedcda703b8d71 = "-map 0 -copy_unknown ";
                            goto cde9314bbed6e852ab3167ab58ea1a8f;
                        }
                        if (!empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_map"])) {
                            $E38fd7fbe299af8baceedcda703b8d71 = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_map"] . " -copy_unknown ";
                            goto cde9314bbed6e852ab3167ab58ea1a8f;
                        }
                        if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] == "radio_streams") {
                            $E38fd7fbe299af8baceedcda703b8d71 = "-map 0:a? ";
                            goto e3bc451e6b3b9def16052e8ba1996666;
                        }
                        $E38fd7fbe299af8baceedcda703b8d71 = '';
                        e3bc451e6b3b9def16052e8ba1996666:
                        cde9314bbed6e852ab3167ab58ea1a8f:
                        if (($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["gen_timestamps"] == 1 || empty($fd777ea6aad636f6a095e656372f239b)) && $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] != "created_live") {
                            $b374478dd5d3b1f09d3a8c011aad0bf5 = "-fflags +genpts -async 1";
                            goto E60addbcf5e5b31437074ee0abaecf9f;
                        }
                        $b374478dd5d3b1f09d3a8c011aad0bf5 = "-nofix_dts -start_at_zero -copyts -vsync 0 -correct_ts_overflow 0 -avoid_negative_ts disabled -max_interleave_delta 0";
                        E60addbcf5e5b31437074ee0abaecf9f:
                        $fcc3a8974461da0b2d3db31ec31a6f86 = '';
                        if (!($efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0 && ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["read_native"] == 1 or stristr($Fe07872fef3dae8b76b8fa28a1ff98e6["container"], "hls") or empty($fd777ea6aad636f6a095e656372f239b) or stristr($Fe07872fef3dae8b76b8fa28a1ff98e6["container"], "mp4") or stristr($Fe07872fef3dae8b76b8fa28a1ff98e6["container"], "matroska")))) {
                            goto Cb4ec148f1029df1041e294d22c97991;
                        }
                        $fcc3a8974461da0b2d3db31ec31a6f86 = "-re";
                        Cb4ec148f1029df1041e294d22c97991:
                        if ($efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0 and $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["enable_transcode"] == 1 and $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] != "created_live") {
                            if ($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_profile_id"] == -1) {
                                $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = array_merge(self::B53DA0f20ec82Cf4eC576504051230aB($efa7cefd12388102b27fdeb2f9f68219["stream_arguments"], $fd777ea6aad636f6a095e656372f239b, "transcode"), json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"], true));
                                goto d2632142c375721663ef4705485dafca;
                            }
                            $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = json_decode($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["profile_options"], true);
                            d2632142c375721663ef4705485dafca:
                            goto Cae5ee49879ddb437b41740bd861a8ea;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = array();
                        Cae5ee49879ddb437b41740bd861a8ea:
                        if (array_key_exists("-acodec", $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) {
                            goto F5ecbefda86f95ca8bc25cb81106620a;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-acodec"] = "copy";
                        F5ecbefda86f95ca8bc25cb81106620a:
                        if (array_key_exists("-vcodec", $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) {
                            goto e019587347af0c3eb99891ae397acde3;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-vcodec"] = "copy";
                        e019587347af0c3eb99891ae397acde3:
                        if (array_key_exists("-scodec", $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) {
                            goto F4790ba480c8ac143d46bf93485aa980;
                        }
                        $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-scodec"] = "copy";
                        F4790ba480c8ac143d46bf93485aa980:
                        goto c7a334b7e8433e4f3053a0e29c0e4a0e;
                    }
                    $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"] = array();
                    $F2d113a695a8b725bf47254fede83c4e = FFMPEG_PATH . " -y -nostdin -hide_banner -loglevel quiet {$dcb5d7e42506bc9b88478fdf1c51b3e8} -progress \"{$D56ecb098fbecda56be58ad335abb43f}\" " . $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"];
                    c7a334b7e8433e4f3053a0e29c0e4a0e:
                    $E3a193fcec6ff84e16b321725948bdbb = array();
                    $E3a193fcec6ff84e16b321725948bdbb["mpegts"][] = "{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time " . e2D73953A5089B9C7983838F61f23aCF::$SegmentsSettings["seg_time"] . " -segment_list_size " . E2D73953A5089b9C7983838f61F23acF::$SegmentsSettings["seg_list_size"] . " -segment_format_options \"mpegts_flags=+initial_discontinuity:mpegts_copyts=1\" -segment_list_type m3u8 -segment_list_flags +live+delete -segment_list \"" . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8\" \"" . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_%d.ts\" ";
                    if (!($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["rtmp_output"] == 1)) {
                        goto B75f5d3a7bd46db1fc0c5dddec5dfccd;
                    }
                    $E3a193fcec6ff84e16b321725948bdbb["flv"][] = "{MAP} {AAC_FILTER} -f flv rtmp://127.0.0.1:" . e2D73953a5089b9C7983838F61F23Acf::$StreamingServers[$efa7cefd12388102b27fdeb2f9f68219["server_info"]["server_id"]]["rtmp_port"] . "/live/{$b6497ba71489783c3747f19debe893a4} ";
                    B75f5d3a7bd46db1fc0c5dddec5dfccd:
                    if (empty($F1b9847d2e181a13abb2d2b48158f8fc[SERVER_ID])) {
                        goto c7dcff75623d4521781e168dc1b21314;
                    }
                    foreach ($F1b9847d2e181a13abb2d2b48158f8fc[SERVER_ID] as $fcaa5bbac09b8c47b847ea4c4a1a5a38) {
                        $E3a193fcec6ff84e16b321725948bdbb["flv"][] = "{MAP} {AAC_FILTER} -f flv \"{$fcaa5bbac09b8c47b847ea4c4a1a5a38}\" ";
                    }
                    c7dcff75623d4521781e168dc1b21314:
                    $Ad8564de3953945607a2e176fb5a79d5 = 0;
                    if (!($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["delay_minutes"] > 0 && $efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0)) {
                        foreach ($E3a193fcec6ff84e16b321725948bdbb as $d6af17fc59b1abed3a05fb455d901897 => $ad62fb9b39ee1a149119d8c85926af71) {
                            foreach ($ad62fb9b39ee1a149119d8c85926af71 as $Ef39701467a1bf59d040b374e26f0159) {
                                $F2d113a695a8b725bf47254fede83c4e .= implode(" ", self::b699BdA4a787944414b36446B701d47A($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) . " ";
                                $F2d113a695a8b725bf47254fede83c4e .= $Ef39701467a1bf59d040b374e26f0159;
                            }
                        }
                        goto a25e4c6c27c5d0b4a2b9637a24508992;
                    }
                    $ae27d60d4caff84c74bc6e4a882a0f0b = 0;
                    if (!file_exists(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8")) {
                        goto d9c6408cbd05e202db608eac7f28a81c;
                    }
                    $E45cb49615d9ff0c133fcdeaa506ddb6 = file(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8");
                    if (stristr($E45cb49615d9ff0c133fcdeaa506ddb6[count($E45cb49615d9ff0c133fcdeaa506ddb6) - 1], $b6497ba71489783c3747f19debe893a4 . "_")) {
                        if (!preg_match("/\\_(.*?)\\.ts/", $E45cb49615d9ff0c133fcdeaa506ddb6[count($E45cb49615d9ff0c133fcdeaa506ddb6) - 1], $f563f11de8fd50b6d6e4071878cbe2de)) {
                            goto Fe3793b8850943e388a4b027e79b2056;
                        }
                        $ae27d60d4caff84c74bc6e4a882a0f0b = intval($f563f11de8fd50b6d6e4071878cbe2de[1]) + 1;
                        Fe3793b8850943e388a4b027e79b2056:
                        goto ba86723ee858f98ea9429bb897bc121b;
                    }
                    if (!preg_match("/\\_(.*?)\\.ts/", $E45cb49615d9ff0c133fcdeaa506ddb6[count($E45cb49615d9ff0c133fcdeaa506ddb6) - 2], $f563f11de8fd50b6d6e4071878cbe2de)) {
                        goto Fe39de1c767f75bd2e7e7ab972718309;
                    }
                    $ae27d60d4caff84c74bc6e4a882a0f0b = intval($f563f11de8fd50b6d6e4071878cbe2de[1]) + 1;
                    Fe39de1c767f75bd2e7e7ab972718309:
                    ba86723ee858f98ea9429bb897bc121b:
                    if (file_exists(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old")) {
                        file_put_contents(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old", file_get_contents(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old") . file_get_contents(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8"));
                        shell_exec("sed -i '/EXTINF\\|.ts/!d' DELAY_STREAM" . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old");
                        goto C2d97d464343d4306b08a89484862b73;
                    }
                    copy(DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8", DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old");
                    C2d97d464343d4306b08a89484862b73:
                    d9c6408cbd05e202db608eac7f28a81c:
                    $F2d113a695a8b725bf47254fede83c4e .= implode(" ", self::B699bda4A787944414b36446b701D47a($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"])) . " ";
                    $F2d113a695a8b725bf47254fede83c4e .= "{MAP} -individual_header_trailer 0 -f segment -segment_format mpegts -segment_time " . e2d73953a5089B9c7983838F61F23ACF::$SegmentsSettings["seg_time"] . " -segment_list_size " . $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["delay_minutes"] * 6 . " -segment_start_number {$ae27d60d4caff84c74bc6e4a882a0f0b} -segment_format_options \"mpegts_flags=+initial_discontinuity:mpegts_copyts=1\" -segment_list_type m3u8 -segment_list_flags +live+delete -segment_list \"" . DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8\" \"" . DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_%d.ts\" ";
                    $fc620775a6b6a39c06be0744e448ec48 = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["delay_minutes"] * 60;
                    if (!($ae27d60d4caff84c74bc6e4a882a0f0b > 0)) {
                        goto e1d2a569fee6edb1135a59d9d085e17a;
                    }
                    $fc620775a6b6a39c06be0744e448ec48 -= ($ae27d60d4caff84c74bc6e4a882a0f0b - 1) * 10;
                    if (!($fc620775a6b6a39c06be0744e448ec48 <= 0)) {
                        goto e69eba2c014839520c195c08a770c609;
                    }
                    $fc620775a6b6a39c06be0744e448ec48 = 0;
                    e69eba2c014839520c195c08a770c609:
                    e1d2a569fee6edb1135a59d9d085e17a:
                    a25e4c6c27c5d0b4a2b9637a24508992:
                    $F2d113a695a8b725bf47254fede83c4e .= " >/dev/null 2>>STREAMS_PATH" . $b6497ba71489783c3747f19debe893a4 . ".errors & echo \$! > " . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid";
                    $F2d113a695a8b725bf47254fede83c4e = str_replace(array("{INPUT}", "{FETCH_OPTIONS}", "{GEN_PTS}", "{STREAM_SOURCE}", "{MAP}", "{READ_NATIVE}", "{CONCAT}", "{AAC_FILTER}"), array("\"{$bae5056cfcbf9b293f6f8218c859de80}\"", empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"]) ? $D4249ceeeadd6a4b760b6c79e2a4f57e : '', empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"]) ? $b374478dd5d3b1f09d3a8c011aad0bf5 : '', $bae5056cfcbf9b293f6f8218c859de80, empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"]) ? $E38fd7fbe299af8baceedcda703b8d71 : '', empty($efa7cefd12388102b27fdeb2f9f68219["stream_info"]["custom_ffmpeg"]) ? $fcc3a8974461da0b2d3db31ec31a6f86 : '', $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["type_key"] == "created_live" && $efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0 ? "-safe 0 -f concat" : '', !stristr($Fe07872fef3dae8b76b8fa28a1ff98e6["container"], "flv") && $Fe07872fef3dae8b76b8fa28a1ff98e6["codecs"]["audio"]["codec_name"] == "aac" && $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["transcode_attributes"]["-acodec"] == "copy" ? "-bsf:a aac_adtstoasc" : ''), $F2d113a695a8b725bf47254fede83c4e);
                    shell_exec($F2d113a695a8b725bf47254fede83c4e);
                    $ef4f0599712515333103265dafb029f7 = $ba62003ce025cbe715e83990ce635b6b = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                    if (!(SERVER_ID == $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["tv_archive_server_id"])) {
                        goto B9ed988cc94345d12052c106f622653c;
                    }
                    shell_exec("PHP_BIN TOOLS_PATHarchive.php " . $b6497ba71489783c3747f19debe893a4 . " >/dev/null 2>/dev/null & echo \$!");
                    B9ed988cc94345d12052c106f622653c:
                    $bbbf7885a6c694bea2f3e26c958a6d3d = $efa7cefd12388102b27fdeb2f9f68219["stream_info"]["delay_minutes"] > 0 && $efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"] == 0 ? true : false;
                    $Ad8564de3953945607a2e176fb5a79d5 = $bbbf7885a6c694bea2f3e26c958a6d3d ? time() + $fc620775a6b6a39c06be0744e448ec48 : 0;
                    if (self::$ipTV_db->query("UPDATE `streams_sys` SET `delay_available_at` = '%d',`to_analyze` = 0,`stream_started` = '%d',`stream_info` = '%s',`stream_status` = 0,`pid` = '%d',`progress_info` = '%s',`current_source` = '%s' WHERE `stream_id` = '%d' AND `server_id` = '%d'", $Ad8564de3953945607a2e176fb5a79d5, time(), json_encode($Fe07872fef3dae8b76b8fa28a1ff98e6), $ef4f0599712515333103265dafb029f7, json_encode(array()), $E4866fec202244d7a3c9f4e24f6ee344, $b6497ba71489783c3747f19debe893a4, SERVER_ID)) {
                        $f0d5508533eaf6452b2b014beae1cc7c = !$bbbf7885a6c694bea2f3e26c958a6d3d ? STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8" : DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                        return array("main_pid" => $ef4f0599712515333103265dafb029f7, "stream_source" => $bae5056cfcbf9b293f6f8218c859de80, "delay_enabled" => $bbbf7885a6c694bea2f3e26c958a6d3d, "parent_id" => $efa7cefd12388102b27fdeb2f9f68219["server_info"]["parent_id"], "delay_start_at" => $Ad8564de3953945607a2e176fb5a79d5, "playlist" => $f0d5508533eaf6452b2b014beae1cc7c);
                    }
                    if (!f1ca094152763C79018e9f1893EF1E48::a1EcF5D2a93474B12E622361c656b958($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4)) {
                        goto ef0ad8a633b6164101e7941b44619cbc;
                    }
                    posix_kill($ef4f0599712515333103265dafb029f7, 9);
                    ef0ad8a633b6164101e7941b44619cbc:
                    return 0;
                }
                if (!($efa7cefd12388102b27fdeb2f9f68219["server_info"]["stream_status"] == 0 || $efa7cefd12388102b27fdeb2f9f68219["server_info"]["to_analyze"] == 1 || $efa7cefd12388102b27fdeb2f9f68219["server_info"]["pid"] != -1)) {
                    goto b4bae3516d451844745c4ce1b80dfa71;
                }
                self::$ipTV_db->query("UPDATE `streams_sys` SET `progress_info` = '',`to_analyze` = 0,`pid` = -1,`stream_status` = 1 WHERE `server_id` = '%d' AND `stream_id` = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
                b4bae3516d451844745c4ce1b80dfa71:
                return 0;
            }
            return false;
        }
        return false;
    }
    public static function customOrder($be22b2e386700cd05f45744f2bc8681b, $Cd78bec4e18d5da1025b6ca326411198) {
        if (!(substr($be22b2e386700cd05f45744f2bc8681b, 0, 3) == "-i ")) {
            return 1;
        }
        return -1;
    }
    public static function B53da0f20EC82cf4eC576504051230aB($Fb2d24d19347023f0e84181dd2fed0ca, $fd777ea6aad636f6a095e656372f239b, $c81742471fbf5fc98e647357de25a9c9) {
        $Be4bc3800cb0c610a97fb1378adb4cb6 = array();
        if (empty($Fb2d24d19347023f0e84181dd2fed0ca)) {
            goto f6918c058f1de95083576b6dac74551d;
        }
        foreach ($Fb2d24d19347023f0e84181dd2fed0ca as $A764619a2510c946a02c9116e4ef25da => $f696df44d8d73582200c2ca6cf42b9c0) {
            if (!($f696df44d8d73582200c2ca6cf42b9c0["argument_cat"] != $c81742471fbf5fc98e647357de25a9c9)) {
                if (!(!is_null($f696df44d8d73582200c2ca6cf42b9c0["argument_wprotocol"]) && !stristr($fd777ea6aad636f6a095e656372f239b, $f696df44d8d73582200c2ca6cf42b9c0["argument_wprotocol"]) && !is_null($fd777ea6aad636f6a095e656372f239b))) {
                    if ($f696df44d8d73582200c2ca6cf42b9c0["argument_type"] == "text") {
                        $Be4bc3800cb0c610a97fb1378adb4cb6[] = sprintf($f696df44d8d73582200c2ca6cf42b9c0["argument_cmd"], $f696df44d8d73582200c2ca6cf42b9c0["value"]);
                        goto cb53367581e2630eaed1a97173956593;
                    }
                    $Be4bc3800cb0c610a97fb1378adb4cb6[] = $f696df44d8d73582200c2ca6cf42b9c0["argument_cmd"];
                    cb53367581e2630eaed1a97173956593:
                    goto Deb2846c69ab255ca6e6451ffdea0460;
                }
                goto D66fb364d2e2745628b96fa9c14506d0;
            }
            Deb2846c69ab255ca6e6451ffdea0460:
            D66fb364d2e2745628b96fa9c14506d0:
        }
        f6918c058f1de95083576b6dac74551d:
        return $Be4bc3800cb0c610a97fb1378adb4cb6;
    }
    public static function B699BdA4a787944414B36446B701d47a($f752f0c2f6e384a4c5b006d8b37aa202) {
        $c181c4bb6f0f94fd21d33eb7560d3970 = array();
        foreach ($f752f0c2f6e384a4c5b006d8b37aa202 as $E5d29eebd54cbadb9868db24207ef778 => $f696df44d8d73582200c2ca6cf42b9c0) {
            if (!isset($f696df44d8d73582200c2ca6cf42b9c0["cmd"])) {
                goto e01ccc4c1a76d8298eb3675e77556394;
            }
            $f752f0c2f6e384a4c5b006d8b37aa202[$E5d29eebd54cbadb9868db24207ef778] = $f696df44d8d73582200c2ca6cf42b9c0 = $f696df44d8d73582200c2ca6cf42b9c0["cmd"];
            e01ccc4c1a76d8298eb3675e77556394:
            if (!preg_match("/-filter_complex \"(.*?)\"/", $f696df44d8d73582200c2ca6cf42b9c0, $f563f11de8fd50b6d6e4071878cbe2de)) {
                goto B437f18d5b39c6a8ff8c71fc138228d0;
            }
            $f752f0c2f6e384a4c5b006d8b37aa202[$E5d29eebd54cbadb9868db24207ef778] = trim(str_replace($f563f11de8fd50b6d6e4071878cbe2de[0], '', $f752f0c2f6e384a4c5b006d8b37aa202[$E5d29eebd54cbadb9868db24207ef778]));
            $c181c4bb6f0f94fd21d33eb7560d3970[] = $f563f11de8fd50b6d6e4071878cbe2de[1];
            B437f18d5b39c6a8ff8c71fc138228d0:
        }
        if (empty($c181c4bb6f0f94fd21d33eb7560d3970)) {
            goto Da786c7c5976265520fac421a768c90a;
        }
        $f752f0c2f6e384a4c5b006d8b37aa202[] = "-filter_complex \"" . implode(",", $c181c4bb6f0f94fd21d33eb7560d3970) . "\"";
        Da786c7c5976265520fac421a768c90a:
        $d0bbf774642b5048818671029fbcd131 = array();
        foreach ($f752f0c2f6e384a4c5b006d8b37aa202 as $E5d29eebd54cbadb9868db24207ef778 => $E5a5f56f15e95b7cda24c2b8d526c009) {
            if (is_numeric($E5d29eebd54cbadb9868db24207ef778)) {
                $d0bbf774642b5048818671029fbcd131[] = $E5a5f56f15e95b7cda24c2b8d526c009;
                goto a53b53cccb40bb53ca406f8ca3ab108a;
            }
            $d0bbf774642b5048818671029fbcd131[] = $E5d29eebd54cbadb9868db24207ef778 . " " . $E5a5f56f15e95b7cda24c2b8d526c009;
            a53b53cccb40bb53ca406f8ca3ab108a:
        }
        $d0bbf774642b5048818671029fbcd131 = array_filter($d0bbf774642b5048818671029fbcd131);
        uasort($d0bbf774642b5048818671029fbcd131, array("C872bcfa04B3EAEE1b4A93a0d775B9d7", "customOrder"));
        return array_map("trim", array_values(array_filter($d0bbf774642b5048818671029fbcd131)));
    }
    public static function ParseStreamURL($c090603c5d47ae8a9d587597e762d834) {
        $fd777ea6aad636f6a095e656372f239b = strtolower(substr($c090603c5d47ae8a9d587597e762d834, 0, 4));
        if ($fd777ea6aad636f6a095e656372f239b == "rtmp") {
            if (!stristr($c090603c5d47ae8a9d587597e762d834, "\$OPT")) {
                goto B4d118255ccdfb6d23ea177d225e55b0;
            }
            $ffda203ecb6fa78a1e0070a5aa4ec56f = "rtmp://\$OPT:rtmp-raw=";
            $c090603c5d47ae8a9d587597e762d834 = trim(substr($c090603c5d47ae8a9d587597e762d834, stripos($c090603c5d47ae8a9d587597e762d834, $ffda203ecb6fa78a1e0070a5aa4ec56f) + strlen($ffda203ecb6fa78a1e0070a5aa4ec56f)));
            B4d118255ccdfb6d23ea177d225e55b0:
            $c090603c5d47ae8a9d587597e762d834 .= " live=1 timeout=10";
            goto E892d943df3a6279858f2489805ad258;
        }
        if ($fd777ea6aad636f6a095e656372f239b == "http") {
            $afdb0ced51b4b8ee6258b0dc13956938 = array("youtube.com", "youtu.be", "livestream.com", "ustream.tv", "twitch.tv", "vimeo.com", "facebook.com", "dailymotion.com", "cnn.com", "edition.cnn.com", "youporn.com", "pornhub.com", "youjizz.com", "xvideos.com", "redtube.com", "ruleporn.com", "pornotube.com", "skysports.com", "screencast.com", "xhamster.com", "pornhd.com", "pornktube.com", "tube8.com", "giniko.com", "vporn.com", "xtube.com");
            $D8a83f3df08c0bbb999644c294f2dd06 = str_ireplace("www.", '', parse_url($c090603c5d47ae8a9d587597e762d834, PHP_URL_HOST));
            if (!in_array($D8a83f3df08c0bbb999644c294f2dd06, $afdb0ced51b4b8ee6258b0dc13956938)) {
                goto Cdc91effc9ae0ccf3e4c3815ca9b6593;
            }
            $a6015a655f3200c6e92183b1e0cb3fa9 = trim(shell_exec(YOUTUBE_PATH . " \"{$c090603c5d47ae8a9d587597e762d834}\" -q --get-url --skip-download -f best"));
            $c090603c5d47ae8a9d587597e762d834 = explode("\n", $a6015a655f3200c6e92183b1e0cb3fa9)[0];
            Cdc91effc9ae0ccf3e4c3815ca9b6593:
            goto b07454db9292589dd6373fa3c045b524;
        }
        b07454db9292589dd6373fa3c045b524:
        E892d943df3a6279858f2489805ad258:
        return $c090603c5d47ae8a9d587597e762d834;
    }
}
