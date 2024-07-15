<?php
register_shutdown_function("shutdown");
$d6c42124360742e53de0e04176a0f94c = null;
set_time_limit(0);
require "../init.php";
if (!isset(ipTV_lib::$request["token"]) || !isset(ipTV_lib::$request["username"]) || !isset(ipTV_lib::$request["password"]) || !isset(ipTV_lib::$request["stream"])) {
    http_response_code(401);
    die("Missing parameters.");
}
$dc5791fad6da6f9dd96b83b988be0cb8 = str_replace(" ", "+", ipTV_lib::$request["token"]);
$c9ef80acc950f0adcb13d24415dbc633 = json_decode(f08Cc5C567CD66b30a2A1F399445489c(base64_decode($dc5791fad6da6f9dd96b83b988be0cb8), md5(ipTV_lib::$settings["crypt_load_balancing"])), true);
if (!is_array($c9ef80acc950f0adcb13d24415dbc633)) {
    http_response_code(401);
    die("ERROR.");
}
$Fdc134ea90d233be850c53c1266026d6 = ipTV_lib::$request["username"];
$E1dc5da23bfc7433f190ed9488d09204 = ipTV_lib::$request["password"];
$ef4f0599712515333103265dafb029f7 = $c9ef80acc950f0adcb13d24415dbc633["pid"];
$e8bde7e627ad9d9d70c6010cc669eb60 = $c9ef80acc950f0adcb13d24415dbc633["external_device"];
$dfbf7f3d08c3458724615497897f4cad = $c9ef80acc950f0adcb13d24415dbc633["on_demand"];
$C997add4b06067b4b694ca90dd36e6d0 = $c9ef80acc950f0adcb13d24415dbc633["isp"];
$bd8be6cf39eec67640223143174627d0 = $c9ef80acc950f0adcb13d24415dbc633["bitrate"];
$ac7cb659ff185789046b11ace1670c09 = $c9ef80acc950f0adcb13d24415dbc633["time"];
$a915d7b641af262a730cfcf433966ebd = $c9ef80acc950f0adcb13d24415dbc633["country"];
$e23c0ff03f3a73b2d73762f346bfe2a8 = time() + ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"];
$b6497ba71489783c3747f19debe893a4 = $c9ef80acc950f0adcb13d24415dbc633["stream_id"];
$b2cbe4de82c7504e1d8d46c57a6264fa = $c9ef80acc950f0adcb13d24415dbc633["extension"];
$f1bbf25f8a2aa075b59695b2d749ee5b = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
$ec660578659a9624aad2966a4d4da133 = $c9ef80acc950f0adcb13d24415dbc633["is_restreamer"];
$d8d36e593ec0bd7cae9e37c890b536d4 = $c9ef80acc950f0adcb13d24415dbc633["user_id"];
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
        if (!($ac7cb659ff185789046b11ace1670c09 >= $e23c0ff03f3a73b2d73762f346bfe2a8)) {
            http_response_code(401);
            die;
        }
    } else {
        http_response_code(401);
        die;
    }
} else {
    $b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
}
$A2e2d8cf048bd6ddcdccd0cb732f9fec = "VOD";
$b93df8c85c6b9c6b3e155555619bbe8e = 0;
$ac61d2c064f4f23b7222db53fc6ef6a8 = null;
$c81742471fbf5fc98e647357de25a9c9 = empty(ipTV_lib::$request["type"]) ? null : ipTV_lib::$request["type"];
if (ipTV_lib::$settings["use_buffer"] == 0) {
    header("X-Accel-Buffering: no");
}
if (ipTV_lib::$settings["double_auth"] == 1) {
    if ($fbf1d0a58fcc040ff00728a277a5f306 = ipTV_streaming::D909B0D1a6fFFDCDB838046FAC418b04($d8d36e593ec0bd7cae9e37c890b536d4, null, null, true, true, false, false)) {
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
        if (!ipTV_streaming::F821DE2269f55D10183B146c8D058907($b6497ba71489783c3747f19debe893a4, $c81742471fbf5fc98e647357de25a9c9 == "movie" ? $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] : $fbf1d0a58fcc040ff00728a277a5f306["series_ids"], $c81742471fbf5fc98e647357de25a9c9)) {
            http_response_code(401);
            die;
        }
    } else {
        http_response_code(401);
        die;
    }
}
$dc3373e46e2f7714d715ad0418cdaee2 = !empty($bd8be6cf39eec67640223143174627d0) ? $bd8be6cf39eec67640223143174627d0 * 125 : 0;
$dc3373e46e2f7714d715ad0418cdaee2 += $dc3373e46e2f7714d715ad0418cdaee2 * ipTV_lib::$settings["vod_bitrate_plus"] * 0.01;
$Fe8d29210e292634354f7f2975a7c5c0 = MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . $b2cbe4de82c7504e1d8d46c57a6264fa;
if (file_exists($Fe8d29210e292634354f7f2975a7c5c0)) {
    $ipTV_db->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0);
    $b93df8c85c6b9c6b3e155555619bbe8e = $ipTV_db->last_insert_id();
    $ac61d2c064f4f23b7222db53fc6ef6a8 = TMP_DIR . $b93df8c85c6b9c6b3e155555619bbe8e . ".con";
    $ipTV_db->close_mysql();
    switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
        case "mp4":
            header("Content-type: video/mp4");
            break;
        case "mkv":
            header("Content-type: video/x-matroska");
            break;
        case "avi":
            header("Content-type: video/x-msvideo");
            break;
        case "3gp":
            header("Content-type: video/3gpp");
            break;
        case "flv":
            header("Content-type: video/x-flv");
            break;
        case "wmv":
            header("Content-type: video/x-ms-wmv");
            break;
        case "mov":
            header("Content-type: video/quicktime");
            break;
        case "ts":
            header("Content-type: video/mp2t");
            break;
        default:
            header("Content-Type: application/octet-stream");
    }
    $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Fe8d29210e292634354f7f2975a7c5c0, "rb");
    $c2f883bf459da90a240f9950048443f3 = filesize($Fe8d29210e292634354f7f2975a7c5c0);
    $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3;
    $start = 0;
    $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
    header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
    if (isset($_SERVER["HTTP_RANGE"])) {
        $e0d1376cc4243595a2ac3f530e229437 = $start;
        $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
        list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
        if (strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false) {
            header("HTTP/1.1 416 Requested Range Not Satisfiable");
            header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
            die;
        }
        if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
            $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
        } else {
            $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
            $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
            $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
        }
        $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
        if ($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3) {
            header("HTTP/1.1 416 Requested Range Not Satisfiable");
            header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
            die;
        }
        $start = $e0d1376cc4243595a2ac3f530e229437;
        $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
        $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
        fseek($b4ad7225f6375fe5d757d3c7147fb034, $start);
        header("HTTP/1.1 206 Partial Content");
    }
    header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
    header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
    $afe98be45e10c223a52934381b211730 = time();
    $E9ee81096c9fac2e7a339b78194cee56 = 0;
    $Fcf846b3512cb8d6f8d77d39b5ad11f6 = ipTV_lib::$settings["read_buffer_size"];
    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
    $B91a997dabc6216f8d4bc59c20446cb3 = 0;
    if (ipTV_lib::$settings["vod_limit_at"] > 0) {
        $D335df82dd7d45c18971012dd95ee6de = intval($adb6fe828c718151845abb8cc50ba1f4 * ipTV_lib::$settings["vod_limit_at"] / 100);
    } else {
        $D335df82dd7d45c18971012dd95ee6de = $adb6fe828c718151845abb8cc50ba1f4;
    }
    $ab6c0eeb53062c3fa3175f9a5a7d5c76 = false;
    while (!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654) {
        $Beb85f0c05e519f48a14915b66ad155c = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $Fcf846b3512cb8d6f8d77d39b5ad11f6);
        ++$Ced112d15c5a3c9e5ba92478d0228e93;
        if (!(!$ab6c0eeb53062c3fa3175f9a5a7d5c76 && $B91a997dabc6216f8d4bc59c20446cb3 * $Fcf846b3512cb8d6f8d77d39b5ad11f6 >= $D335df82dd7d45c18971012dd95ee6de)) {
            ++$B91a997dabc6216f8d4bc59c20446cb3;
        } else {
            $ab6c0eeb53062c3fa3175f9a5a7d5c76 = true;
        }
        echo $Beb85f0c05e519f48a14915b66ad155c;
        $E9ee81096c9fac2e7a339b78194cee56 += strlen($Beb85f0c05e519f48a14915b66ad155c);
        if (time() - $afe98be45e10c223a52934381b211730 >= 30) {
            file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($E9ee81096c9fac2e7a339b78194cee56 / 1024 / 30));
            $afe98be45e10c223a52934381b211730 = time();
            $E9ee81096c9fac2e7a339b78194cee56 = 0;
        }
        if ($dc3373e46e2f7714d715ad0418cdaee2 > 0 && $ab6c0eeb53062c3fa3175f9a5a7d5c76 && $Ced112d15c5a3c9e5ba92478d0228e93 >= ceil($dc3373e46e2f7714d715ad0418cdaee2 / $Fcf846b3512cb8d6f8d77d39b5ad11f6)) {
            sleep(1);
            $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        }
    }
    fclose($b4ad7225f6375fe5d757d3c7147fb034);
    die;
}
function shutdown() {
    global $ipTV_db, $b93df8c85c6b9c6b3e155555619bbe8e, $ac61d2c064f4f23b7222db53fc6ef6a8, $d8d36e593ec0bd7cae9e37c890b536d4, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $b6497ba71489783c3747f19debe893a4, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e23c0ff03f3a73b2d73762f346bfe2a8;
    $ipTV_db->close_mysql();
    if ($b93df8c85c6b9c6b3e155555619bbe8e != 0) {
        ipTV_streaming::E01C6247Dc62e1edE6DA6671B6ADBb8d($b93df8c85c6b9c6b3e155555619bbe8e);
        ipTV_streaming::C9cCc76C9D6b7e44c6d4A7a6c7191EB5(SERVER_ID, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $e23c0ff03f3a73b2d73762f346bfe2a8, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, '');
        if (file_exists($ac61d2c064f4f23b7222db53fc6ef6a8)) {
            unlink($ac61d2c064f4f23b7222db53fc6ef6a8);
        }
    }
    fastcgi_finish_request();
    if ($b93df8c85c6b9c6b3e155555619bbe8e != 0) {
        posix_kill(getmypid(), 9);
    }
}
