<?php
register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
header("Access-Control-Allow-Origin: *");
if (!isset(ipTV_lib::$request["token"]) || !isset(ipTV_lib::$request["username"]) || !isset(ipTV_lib::$request["password"]) || !isset(ipTV_lib::$request["stream"])) {
    http_response_code(401);
    die("Missing parameters.");
}
$dc5791fad6da6f9dd96b83b988be0cb8 = str_replace(" ", "+", ipTV_lib::$request["token"]);
$c9ef80acc950f0adcb13d24415dbc633 = json_decode(decrypt_config(base64_decode($dc5791fad6da6f9dd96b83b988be0cb8), md5(ipTV_lib::$settings["crypt_load_balancing"])), true);
if (!is_array($c9ef80acc950f0adcb13d24415dbc633)) {
    http_response_code(401);
    die("ERROR.");
}
$b2cbe4de82c7504e1d8d46c57a6264fa = $c9ef80acc950f0adcb13d24415dbc633["extension"];
$Fdc134ea90d233be850c53c1266026d6 = ipTV_lib::$request["username"];
$E1dc5da23bfc7433f190ed9488d09204 = ipTV_lib::$request["password"];
$ef4f0599712515333103265dafb029f7 = $c9ef80acc950f0adcb13d24415dbc633["pid"];
$e8bde7e627ad9d9d70c6010cc669eb60 = $c9ef80acc950f0adcb13d24415dbc633["external_device"];
$dfbf7f3d08c3458724615497897f4cad = $c9ef80acc950f0adcb13d24415dbc633["on_demand"];
$C997add4b06067b4b694ca90dd36e6d0 = $c9ef80acc950f0adcb13d24415dbc633["isp"];
$bd8be6cf39eec67640223143174627d0 = $c9ef80acc950f0adcb13d24415dbc633["bitrate"];
$ac7cb659ff185789046b11ace1670c09 = $c9ef80acc950f0adcb13d24415dbc633["time"];
$a915d7b641af262a730cfcf433966ebd = $c9ef80acc950f0adcb13d24415dbc633["country"];
$d8d36e593ec0bd7cae9e37c890b536d4 = $c9ef80acc950f0adcb13d24415dbc633["user_id"];
$e23c0ff03f3a73b2d73762f346bfe2a8 = time() + ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"];
$b6497ba71489783c3747f19debe893a4 = intval(ipTV_lib::$request["stream"]);
$f1bbf25f8a2aa075b59695b2d749ee5b = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
$ec660578659a9624aad2966a4d4da133 = $c9ef80acc950f0adcb13d24415dbc633["is_restreamer"];
$b149beed8aaf27a3f198acf4bb7c99cb = $c9ef80acc950f0adcb13d24415dbc633["max_connections"];
$C2b22dc2ec6a811e5a5c1805c22038af = $c9ef80acc950f0adcb13d24415dbc633["monitor_pid"];
if (ipTV_lib::$settings["hash_lb"] == 1) {
    if (!isset($c9ef80acc950f0adcb13d24415dbc633["hash"]) || strlen($c9ef80acc950f0adcb13d24415dbc633["hash"]) != 32) {
        http_response_code(401);
        die;
    }
    $d66bf8442f134e40ea49e8a7e2638aee = array("HTTP_INCAP_CLIENT_IP", "HTTP_CF_CONNECTING_IP", "HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR");
    $Fbd7a63b7e99d2d3b9ace3b6819810eb = false;
    foreach ($d66bf8442f134e40ea49e8a7e2638aee as $Cc2a18fdf76b8e3e115b27f927e5928b) {
        if (array_key_exists($Cc2a18fdf76b8e3e115b27f927e5928b, $_SERVER)) {
            foreach (explode(",", $_SERVER[$Cc2a18fdf76b8e3e115b27f927e5928b]) as $b284c6f3513623259e4ca641e8e99416) {
                $b284c6f3513623259e4ca641e8e99416 = trim($b284c6f3513623259e4ca641e8e99416);
                if (!empty($b284c6f3513623259e4ca641e8e99416)) {
                    $b35667d8dda77f408087e51c1af6f7ac = md5(json_encode(array("stream_id" => $b6497ba71489783c3747f19debe893a4, "user_id" => $d8d36e593ec0bd7cae9e37c890b536d4, "username" => $Fdc134ea90d233be850c53c1266026d6, "password" => $E1dc5da23bfc7433f190ed9488d09204, "user_ip" => $b284c6f3513623259e4ca641e8e99416, "live_streaming_pass" => ipTV_lib::$settings["live_streaming_pass"], "pid" => $ef4f0599712515333103265dafb029f7, "external_device" => $e8bde7e627ad9d9d70c6010cc669eb60, "on_demand" => $dfbf7f3d08c3458724615497897f4cad, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "bitrate" => $bd8be6cf39eec67640223143174627d0, "country" => $a915d7b641af262a730cfcf433966ebd, "extension" => $b2cbe4de82c7504e1d8d46c57a6264fa, "is_restreamer" => $ec660578659a9624aad2966a4d4da133, "max_connections" => $b149beed8aaf27a3f198acf4bb7c99cb, "monitor_pid" => $C2b22dc2ec6a811e5a5c1805c22038af, "time" => $ac7cb659ff185789046b11ace1670c09)));
                    if ($b35667d8dda77f408087e51c1af6f7ac == $c9ef80acc950f0adcb13d24415dbc633["hash"]) {
                        $b7eaa095f27405cf78a432ce6504dae0 = $b284c6f3513623259e4ca641e8e99416;
                        $Fbd7a63b7e99d2d3b9ace3b6819810eb = true;
                    }
                }
            }
        }
    }
    if ($Fbd7a63b7e99d2d3b9ace3b6819810eb) {
        if ($b2cbe4de82c7504e1d8d46c57a6264fa != "m3u8") {
            if (!($ac7cb659ff185789046b11ace1670c09 >= $e23c0ff03f3a73b2d73762f346bfe2a8)) {
                http_response_code(401);
                die;
            }
        }
    } else {
        die;
    }
} else {
    $b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
}
$b93df8c85c6b9c6b3e155555619bbe8e = 0;
$E76a4ed28669e4e5e16a74153d2a3ea8 = true;
$ac61d2c064f4f23b7222db53fc6ef6a8 = null;
if (ipTV_lib::$settings["use_buffer"] == 0) {
    header("X-Accel-Buffering: no");
}
if (ipTV_lib::$settings["double_auth"] == 1) {
    if ($fbf1d0a58fcc040ff00728a277a5f306 = ipTV_streaming::d909b0d1a6fFfDCDb838046faC418b04($d8d36e593ec0bd7cae9e37c890b536d4, null, null, true, true, false, false)) {
        if ($fbf1d0a58fcc040ff00728a277a5f306["username"] != $Fdc134ea90d233be850c53c1266026d6) {
            http_response_code(401);
            die;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306["password"] != $E1dc5da23bfc7433f190ed9488d09204) {
            http_response_code(401);
            die;
        }
        if (!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && $e23c0ff03f3a73b2d73762f346bfe2a8 >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) {
            http_response_code(401);
            die;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0) {
            http_response_code(401);
            die;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0) {
            http_response_code(401);
            die;
        }
        if (!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]))) {
            http_response_code(401);
            die;
        }
        if (!empty($a915d7b641af262a730cfcf433966ebd)) {
            $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
            if ($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) {
                http_response_code(401);
                die;
            }
            if (!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", ipTV_lib::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, ipTV_lib::$settings["allow_countries"])) {
                http_response_code(401);
                die;
            }
        }
        if (!array_key_exists($b2cbe4de82c7504e1d8d46c57a6264fa, $fbf1d0a58fcc040ff00728a277a5f306["output_formats"])) {
            http_response_code(401);
            die;
        }
        if (!in_array($b6497ba71489783c3747f19debe893a4, $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
            http_response_code(401);
            die;
        }
    } else {
        http_response_code(401);
        die;
    }
}
$f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
if (!ipTV_streaming::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH)) {
    if ($dfbf7f3d08c3458724615497897f4cad == 1) {
        if (!ipTV_streaming::D835C2A9787BA794E7590e06621cfa6b($C2b22dc2ec6a811e5a5c1805c22038af, $b6497ba71489783c3747f19debe893a4)) {
            ipTV_stream::startMonitor($b6497ba71489783c3747f19debe893a4);
        }
    } else {
        http_response_code(403);
        die;
    }
}
switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
    case "m3u8":
        $E76a4ed28669e4e5e16a74153d2a3ea8 = false;
        $E93e375f79b35bbb4a3c6614706e14e0 = 0;
        while (!file_exists($f0d5508533eaf6452b2b014beae1cc7c) && $E93e375f79b35bbb4a3c6614706e14e0 <= 20) {
            usleep(500000);
            ++$E93e375f79b35bbb4a3c6614706e14e0;
        }
        if ($E93e375f79b35bbb4a3c6614706e14e0 == 20) {
            die;
        }
        if (empty(ipTV_lib::$request["segment"])) {
            $ipTV_db->query("SELECT activity_id,hls_end FROM `user_activity_now` WHERE `user_id` = '%d' AND `server_id` = '%d' AND `container` = 'hls' AND `user_ip` = '%s' AND `user_agent` = '%s' AND `stream_id` = '%d'", $d8d36e593ec0bd7cae9e37c890b536d4, SERVER_ID, $b7eaa095f27405cf78a432ce6504dae0, $f1bbf25f8a2aa075b59695b2d749ee5b, $b6497ba71489783c3747f19debe893a4);
            if ($ipTV_db->num_rows() == 0) {
                if ($b149beed8aaf27a3f198acf4bb7c99cb != 0) {
                    $ipTV_db->query("UPDATE `user_activity_now` SET `hls_end` = 1 WHERE `user_id` = '%d' AND `container` = 'hls'", $d8d36e593ec0bd7cae9e37c890b536d4);
                }
                $ipTV_db->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`,`hls_last_read`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s','%d')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, "hls", getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8);
                $b93df8c85c6b9c6b3e155555619bbe8e = $ipTV_db->last_insert_id();
            } else {
                $Fa2325a1b301ca7c383cb69087c42d91 = $ipTV_db->get_row();
                if ($Fa2325a1b301ca7c383cb69087c42d91["hls_end"] == 1) {
                    header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                    die;
                }
                $b93df8c85c6b9c6b3e155555619bbe8e = $Fa2325a1b301ca7c383cb69087c42d91["activity_id"];
                $ipTV_db->query("UPDATE `user_activity_now` SET `hls_last_read` = '%d' WHERE `activity_id` = '%d'", $e23c0ff03f3a73b2d73762f346bfe2a8, $Fa2325a1b301ca7c383cb69087c42d91["activity_id"]);
            }
            $ipTV_db->close_mysql();
            if ($E4866fec202244d7a3c9f4e24f6ee344 = ipTV_streaming::B5B64Fc74Aaa86445F7C95e69bAbdd84($f0d5508533eaf6452b2b014beae1cc7c, $b6497ba71489783c3747f19debe893a4, $dc5791fad6da6f9dd96b83b988be0cb8, $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204)) {
                header("Content-Type: application/x-mpegurl");
                header("Content-Length: " . strlen($E4866fec202244d7a3c9f4e24f6ee344));
                header("Cache-Control: no-store, no-cache, must-revalidate");
                echo $E4866fec202244d7a3c9f4e24f6ee344;
            }
            die;
        } else {
            $ipTV_db->close_mysql();
            $B8355a23f8ef2efb6685523365b371e2 = STREAMS_PATH . str_replace(array("\\", "/"), '', urldecode(ipTV_lib::$request["segment"]));
            $b303f3c5ee77668995bff68d4448664a = explode("_", basename($B8355a23f8ef2efb6685523365b371e2));
            if (!file_exists($B8355a23f8ef2efb6685523365b371e2) || $b303f3c5ee77668995bff68d4448664a[0] != $b6497ba71489783c3747f19debe893a4 || empty(ipTV_lib::$request["key_seg"])) {
                header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                die;
            }
            $B31f58220362e7d683b209c0b9237d23 = ipTV_lib::$request["key_seg"];
            $b35667d8dda77f408087e51c1af6f7ac = md5(urldecode(ipTV_lib::$request["segment"]) . $Fdc134ea90d233be850c53c1266026d6 . ipTV_lib::$settings["crypt_load_balancing"] . filesize($B8355a23f8ef2efb6685523365b371e2));
            if ($b35667d8dda77f408087e51c1af6f7ac != $B31f58220362e7d683b209c0b9237d23) {
                header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                die;
            }
            $Caa0aa71d18b85a3c3a825a16209b1a7 = filesize($B8355a23f8ef2efb6685523365b371e2);
            header("Content-Length: " . $Caa0aa71d18b85a3c3a825a16209b1a7);
            header("Content-Type: video/mp2t");
            readfile($B8355a23f8ef2efb6685523365b371e2);
        }
        break;
    default:
        $ipTV_db->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, "ts", getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60);
        $b93df8c85c6b9c6b3e155555619bbe8e = $ipTV_db->last_insert_id();
        $ac61d2c064f4f23b7222db53fc6ef6a8 = TMP_PATH . $b93df8c85c6b9c6b3e155555619bbe8e . ".con";
        $ipTV_db->close_mysql();
        header("Content-Type: video/mp2t");
        $Ae3016c45dd59a9b881c39a8dfeb6f6f = ipTV_streaming::b03404a02c45cF202DA01928E71D3b42($f0d5508533eaf6452b2b014beae1cc7c, ipTV_lib::$settings["client_prebuffer"]);
        if (!empty($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
            if (is_array($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                if (ipTV_lib::$settings["restreamer_prebuffer"] == 1 && $ec660578659a9624aad2966a4d4da133 == 1 || $ec660578659a9624aad2966a4d4da133 == 0) {
                    $Caa0aa71d18b85a3c3a825a16209b1a7 = 0;
                    $d235a7447e2983907e2d39f281c1079f = time();
                    foreach ($Ae3016c45dd59a9b881c39a8dfeb6f6f as $B8355a23f8ef2efb6685523365b371e2) {
                        if (file_exists(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2)) {
                            $Caa0aa71d18b85a3c3a825a16209b1a7 += readfile(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2);
                        } else {
                            die;
                        }
                    }
                    $fe35f86aea36811d53a86b2f5a2ee22a = time() - $d235a7447e2983907e2d39f281c1079f;
                    if ($fe35f86aea36811d53a86b2f5a2ee22a == 0) {
                        $fe35f86aea36811d53a86b2f5a2ee22a = 0.1;
                    }
                    file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($Caa0aa71d18b85a3c3a825a16209b1a7 / $fe35f86aea36811d53a86b2f5a2ee22a / 1024));
                }
                preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
            } else {
                $f8b82aac8ae421c699a4ca4dcf276fda = $Ae3016c45dd59a9b881c39a8dfeb6f6f;
            }
        } else {
            if (!file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
                $f8b82aac8ae421c699a4ca4dcf276fda = -1;
            } else {
                die;
            }
        }
        $e6e1d835d746daf7d74660d362922634 = 0;
        $C72e5ac751c165a671cc57aeb3dbc150 = ipTV_lib::$SegmentsSettings["seg_time"] * 2;
        while (true) {
            $segmentFile = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 1);
            $B28d4d57f34661a8b1773dea1b6dda68 = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 2);
            $Df462682e370952f75b92da6e62a7293 = 0;
            while (!file_exists(STREAMS_PATH . $segmentFile) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150 * 10) {
                usleep(100000);
                ++$Df462682e370952f75b92da6e62a7293;
            }
            if (!file_exists(STREAMS_PATH . $segmentFile)) {
                die;
            }
            if (empty($ef4f0599712515333103265dafb029f7) && file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
                $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
            }
            if (!file_exists(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e)) {
                $e6e1d835d746daf7d74660d362922634 = 0;
                $afe98be45e10c223a52934381b211730 = time();
                $b4ad7225f6375fe5d757d3c7147fb034 = fopen(STREAMS_PATH . $segmentFile, "r");
            }
            $signalData = json_decode(file_get_contents(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e), true);
            switch ($signalData["type"]) {
                case "signal":
                    $Df462682e370952f75b92da6e62a7293 = 0;
                    while (!file_exists(STREAMS_PATH . $B28d4d57f34661a8b1773dea1b6dda68) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150) {
                        sleep(1);
                        ++$Df462682e370952f75b92da6e62a7293;
                    }
                    ipTV_streaming::sendSignalFFMPEG($signalData, $segmentFile);
                    ++$f8b82aac8ae421c699a4ca4dcf276fda;
                    break;
                case "redirect":
                    $b6497ba71489783c3747f19debe893a4 = $F57960e3620515a273e03803fcd30429["stream_id"] = $signalData["stream_id"];
                    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                    $F57960e3620515a273e03803fcd30429["pid"] = null;
                    $Ae3016c45dd59a9b881c39a8dfeb6f6f = ipTV_streaming::B03404A02C45cf202DA01928E71d3b42($f0d5508533eaf6452b2b014beae1cc7c, ipTV_lib::$settings["client_prebuffer"]);
                    preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                    $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
                    break;
            }
            $signalData = null;
            unlink(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e);
        }
}
function shutdown() {
    global $ipTV_db, $C997add4b06067b4b694ca90dd36e6d0, $b93df8c85c6b9c6b3e155555619bbe8e, $E76a4ed28669e4e5e16a74153d2a3ea8, $ac61d2c064f4f23b7222db53fc6ef6a8, $d8d36e593ec0bd7cae9e37c890b536d4, $b2cbe4de82c7504e1d8d46c57a6264fa, $b6497ba71489783c3747f19debe893a4, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $a915d7b641af262a730cfcf433966ebd, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8;
    $ipTV_db->close_mysql();
    if ($b93df8c85c6b9c6b3e155555619bbe8e != 0 && $E76a4ed28669e4e5e16a74153d2a3ea8) {
        ipTV_streaming::CloseAndTransfer($b93df8c85c6b9c6b3e155555619bbe8e);
        ipTV_streaming::c9cCC76C9d6b7e44C6D4A7A6C7191Eb5(SERVER_ID, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $e23c0ff03f3a73b2d73762f346bfe2a8, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60);
        if (file_exists($ac61d2c064f4f23b7222db53fc6ef6a8)) {
            unlink($ac61d2c064f4f23b7222db53fc6ef6a8);
        }
    }
    fastcgi_finish_request();
    if ($b93df8c85c6b9c6b3e155555619bbe8e != 0) {
        posix_kill(getmypid(), 9);
    }
}
