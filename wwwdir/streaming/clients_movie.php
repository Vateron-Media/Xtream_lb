<?php

register_shutdown_function("shutdown");
$d6c42124360742e53de0e04176a0f94c = null;
set_time_limit(0);
require "../init.php";
if (!(!isset(E2D73953A5089b9C7983838F61f23aCf::$request["token"]) || !isset(E2D73953A5089B9C7983838F61f23ACf::$request["username"]) || !isset(E2d73953a5089b9C7983838f61f23Acf::$request["password"]) || !isset(E2d73953a5089B9C7983838F61f23aCF::$request["stream"]))) {
    $dc5791fad6da6f9dd96b83b988be0cb8 = str_replace(" ", "+", e2d73953a5089b9c7983838F61f23acf::$request["token"]);
    $c9ef80acc950f0adcb13d24415dbc633 = json_decode(f08Cc5C567CD66b30a2A1F399445489c(base64_decode($dc5791fad6da6f9dd96b83b988be0cb8), md5(E2D73953a5089b9C7983838F61F23aCF::$settings["crypt_load_balancing"])), true);
    if (is_array($c9ef80acc950f0adcb13d24415dbc633)) {
        $Fdc134ea90d233be850c53c1266026d6 = E2D73953a5089B9c7983838f61F23aCf::$request["username"];
        $E1dc5da23bfc7433f190ed9488d09204 = E2D73953a5089b9c7983838f61f23acF::$request["password"];
        $ef4f0599712515333103265dafb029f7 = $c9ef80acc950f0adcb13d24415dbc633["pid"];
        $e8bde7e627ad9d9d70c6010cc669eb60 = $c9ef80acc950f0adcb13d24415dbc633["external_device"];
        $dfbf7f3d08c3458724615497897f4cad = $c9ef80acc950f0adcb13d24415dbc633["on_demand"];
        $C997add4b06067b4b694ca90dd36e6d0 = $c9ef80acc950f0adcb13d24415dbc633["isp"];
        $bd8be6cf39eec67640223143174627d0 = $c9ef80acc950f0adcb13d24415dbc633["bitrate"];
        $ac7cb659ff185789046b11ace1670c09 = $c9ef80acc950f0adcb13d24415dbc633["time"];
        $a915d7b641af262a730cfcf433966ebd = $c9ef80acc950f0adcb13d24415dbc633["country"];
        $e23c0ff03f3a73b2d73762f346bfe2a8 = time() + e2d73953A5089b9c7983838F61f23aCf::$StreamingServers[SERVER_ID]["diff_time_main"];
        $b6497ba71489783c3747f19debe893a4 = $c9ef80acc950f0adcb13d24415dbc633["stream_id"];
        $b2cbe4de82c7504e1d8d46c57a6264fa = $c9ef80acc950f0adcb13d24415dbc633["extension"];
        $f1bbf25f8a2aa075b59695b2d749ee5b = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
        $ec660578659a9624aad2966a4d4da133 = $c9ef80acc950f0adcb13d24415dbc633["is_restreamer"];
        $d8d36e593ec0bd7cae9e37c890b536d4 = $c9ef80acc950f0adcb13d24415dbc633["user_id"];
        $b149beed8aaf27a3f198acf4bb7c99cb = $c9ef80acc950f0adcb13d24415dbc633["max_connections"];
        $C2b22dc2ec6a811e5a5c1805c22038af = $c9ef80acc950f0adcb13d24415dbc633["monitor_pid"];
        if (E2D73953a5089b9c7983838f61f23AcF::$settings["hash_lb"] == 1) {
            if (!(!isset($c9ef80acc950f0adcb13d24415dbc633["hash"]) || strlen($c9ef80acc950f0adcb13d24415dbc633["hash"]) != 32)) {
                $d66bf8442f134e40ea49e8a7e2638aee = array("HTTP_INCAP_CLIENT_IP", "HTTP_CF_CONNECTING_IP", "HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR");
                $Fbd7a63b7e99d2d3b9ace3b6819810eb = false;
                foreach ($d66bf8442f134e40ea49e8a7e2638aee as $Cc2a18fdf76b8e3e115b27f927e5928b) {
                    if (!array_key_exists($Cc2a18fdf76b8e3e115b27f927e5928b, $_SERVER)) {
                        goto A1fb34294ddfcd215f383bf45e68bed5;
                    }
                    foreach (explode(",", $_SERVER[$Cc2a18fdf76b8e3e115b27f927e5928b]) as $b284c6f3513623259e4ca641e8e99416) {
                        $b284c6f3513623259e4ca641e8e99416 = trim($b284c6f3513623259e4ca641e8e99416);
                        if (!empty($b284c6f3513623259e4ca641e8e99416)) {
                            $b35667d8dda77f408087e51c1af6f7ac = md5(json_encode(array("stream_id" => $b6497ba71489783c3747f19debe893a4, "user_id" => $d8d36e593ec0bd7cae9e37c890b536d4, "username" => $Fdc134ea90d233be850c53c1266026d6, "password" => $E1dc5da23bfc7433f190ed9488d09204, "user_ip" => $b284c6f3513623259e4ca641e8e99416, "live_streaming_pass" => e2D73953A5089b9c7983838f61f23aCf::$settings["live_streaming_pass"], "pid" => $ef4f0599712515333103265dafb029f7, "external_device" => $e8bde7e627ad9d9d70c6010cc669eb60, "on_demand" => $dfbf7f3d08c3458724615497897f4cad, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "bitrate" => $bd8be6cf39eec67640223143174627d0, "country" => $a915d7b641af262a730cfcf433966ebd, "extension" => $b2cbe4de82c7504e1d8d46c57a6264fa, "is_restreamer" => $ec660578659a9624aad2966a4d4da133, "max_connections" => $b149beed8aaf27a3f198acf4bb7c99cb, "monitor_pid" => $C2b22dc2ec6a811e5a5c1805c22038af, "time" => $ac7cb659ff185789046b11ace1670c09)));
                            if (!($b35667d8dda77f408087e51c1af6f7ac == $c9ef80acc950f0adcb13d24415dbc633["hash"])) {
                                goto d5b39687d1573e9eeae9880cb7132044;
                            }
                            $b7eaa095f27405cf78a432ce6504dae0 = $b284c6f3513623259e4ca641e8e99416;
                            $Fbd7a63b7e99d2d3b9ace3b6819810eb = true;
                            goto C8939fb9fbd136d09ea9288e4b1ee3c3;
                        }
                        d5b39687d1573e9eeae9880cb7132044:
                    }
                    A1fb34294ddfcd215f383bf45e68bed5:
                }
                C8939fb9fbd136d09ea9288e4b1ee3c3:
                if ($Fbd7a63b7e99d2d3b9ace3b6819810eb) {
                    if ($ac7cb659ff185789046b11ace1670c09 >= $e23c0ff03f3a73b2d73762f346bfe2a8) {
                        Bc2a72eeb653c0b8ec477bf89de7a776:
                        goto f3cd994a9e3079469938b171fc63185a;
                    }
                    http_response_code(401);
                    die;
                }
                http_response_code(401);
                die;
            }
            http_response_code(401);
            die;
        }
        $b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
        f3cd994a9e3079469938b171fc63185a:
        $A2e2d8cf048bd6ddcdccd0cb732f9fec = "VOD";
        $b93df8c85c6b9c6b3e155555619bbe8e = 0;
        $ac61d2c064f4f23b7222db53fc6ef6a8 = null;
        $c81742471fbf5fc98e647357de25a9c9 = empty(e2d73953a5089b9C7983838F61f23AcF::$request["type"]) ? null : e2d73953a5089b9C7983838f61f23AcF::$request["type"];
        if (!(E2d73953A5089b9c7983838f61f23aCf::$settings["use_buffer"] == 0)) {
            goto d3855604d3f98ee944045971c367510b;
        }
        header("X-Accel-Buffering: no");
        d3855604d3f98ee944045971c367510b:
        if (!(E2d73953a5089b9c7983838f61F23AcF::$settings["double_auth"] == 1)) {
            goto Eb1847a96aecc054850feeee5cf5b4bc;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306 = f1cA094152763c79018e9f1893eF1e48::D909B0D1a6fFFDCDB838046FAC418b04($d8d36e593ec0bd7cae9e37c890b536d4, null, null, true, true, false, false)) {
            if (!($fbf1d0a58fcc040ff00728a277a5f306["username"] != $Fdc134ea90d233be850c53c1266026d6)) {
                if (!($fbf1d0a58fcc040ff00728a277a5f306["password"] != $E1dc5da23bfc7433f190ed9488d09204)) {
                    if (!(!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && $e23c0ff03f3a73b2d73762f346bfe2a8 >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"])) {
                        if (!($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0)) {
                            if (!($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0)) {
                                if (!(!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"])))) {
                                    if (empty($a915d7b641af262a730cfcf433966ebd)) {
                                        goto A7d66eb97fd366864b2ffa605b495883;
                                    }
                                    $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
                                    if (!($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"])) {
                                        if (!(!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", e2d73953A5089b9c7983838f61f23ACf::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, e2D73953a5089B9c7983838f61f23ACF::$settings["allow_countries"]))) {
                                            A7d66eb97fd366864b2ffa605b495883:
                                            if (f1CA094152763c79018E9f1893EF1e48::F821DE2269f55D10183B146c8D058907($b6497ba71489783c3747f19debe893a4, $c81742471fbf5fc98e647357de25a9c9 == "movie" ? $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] : $fbf1d0a58fcc040ff00728a277a5f306["series_ids"], $c81742471fbf5fc98e647357de25a9c9)) {
                                                c1a122a27ed18c6b6000d5f4235321f8:
                                                Eb1847a96aecc054850feeee5cf5b4bc:
                                                $dc3373e46e2f7714d715ad0418cdaee2 = !empty($bd8be6cf39eec67640223143174627d0) ? $bd8be6cf39eec67640223143174627d0 * 125 : 0;
                                                $dc3373e46e2f7714d715ad0418cdaee2 += $dc3373e46e2f7714d715ad0418cdaee2 * e2d73953A5089B9c7983838f61f23ACF::$settings["vod_bitrate_plus"] * 0.01;
                                                $Fe8d29210e292634354f7f2975a7c5c0 = MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . $b2cbe4de82c7504e1d8d46c57a6264fa;
                                                if (!file_exists($Fe8d29210e292634354f7f2975a7c5c0)) {
                                                    function shutdown() {
                                                        global $F30ccc8fd3427f97ca35bc6ba6610d01, $b93df8c85c6b9c6b3e155555619bbe8e, $ac61d2c064f4f23b7222db53fc6ef6a8, $d8d36e593ec0bd7cae9e37c890b536d4, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $b6497ba71489783c3747f19debe893a4, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e23c0ff03f3a73b2d73762f346bfe2a8;
                                                        $F30ccc8fd3427f97ca35bc6ba6610d01->A9c27319DdF640F296201c75A1eF3Eeb();
                                                        if (!($b93df8c85c6b9c6b3e155555619bbe8e != 0)) {
                                                            goto C5678f696fef8447ef5be6a066212015;
                                                        }
                                                        f1cA094152763C79018E9F1893eF1E48::E01C6247Dc62e1edE6DA6671B6ADBb8d($b93df8c85c6b9c6b3e155555619bbe8e);
                                                        f1Ca094152763C79018e9F1893ef1E48::C9cCc76C9D6b7e44c6d4A7a6c7191EB5(SERVER_ID, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $e23c0ff03f3a73b2d73762f346bfe2a8, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, '');
                                                        if (!file_exists($ac61d2c064f4f23b7222db53fc6ef6a8)) {
                                                            goto bdd619ebd547f07bd5d8aad92506297a;
                                                        }
                                                        unlink($ac61d2c064f4f23b7222db53fc6ef6a8);
                                                        bdd619ebd547f07bd5d8aad92506297a:
                                                        C5678f696fef8447ef5be6a066212015:
                                                        fastcgi_finish_request();
                                                        if (!($b93df8c85c6b9c6b3e155555619bbe8e != 0)) {
                                                            goto C2711ef93e45e34f4c86b7258eb8ac16;
                                                        }
                                                        posix_kill(getmypid(), 9);
                                                        C2711ef93e45e34f4c86b7258eb8ac16:
                                                    }
                                                    // [PHPDeobfuscator] Implied script end
                                                    return;
                                                }
                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0);
                                                $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->c02FB3004cEC2de0bC39f4eD412479B1();
                                                $ac61d2c064f4f23b7222db53fc6ef6a8 = TMP_DIR . $b93df8c85c6b9c6b3e155555619bbe8e . ".con";
                                                $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319dDF640F296201C75a1EF3EEB();
                                                switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
                                                    case "mp4":
                                                        header("Content-type: video/mp4");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "mkv":
                                                        header("Content-type: video/x-matroska");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "avi":
                                                        header("Content-type: video/x-msvideo");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "3gp":
                                                        header("Content-type: video/3gpp");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "flv":
                                                        header("Content-type: video/x-flv");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "wmv":
                                                        header("Content-type: video/x-ms-wmv");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "mov":
                                                        header("Content-type: video/quicktime");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    case "ts":
                                                        header("Content-type: video/mp2t");
                                                        goto Cd4e66f6fa47475ac2a1e1975dd664ae;
                                                    default:
                                                        header("Content-Type: application/octet-stream");
                                                }
                                                Cd4e66f6fa47475ac2a1e1975dd664ae:
                                                $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Fe8d29210e292634354f7f2975a7c5c0, "rb");
                                                $c2f883bf459da90a240f9950048443f3 = filesize($Fe8d29210e292634354f7f2975a7c5c0);
                                                $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3;
                                                $start = 0;
                                                $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
                                                header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
                                                if (!isset($_SERVER["HTTP_RANGE"])) {
                                                    goto b1388c1300931b373250ebc5d313e49d;
                                                }
                                                $e0d1376cc4243595a2ac3f530e229437 = $start;
                                                $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
                                                list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
                                                if (!(strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false)) {
                                                    if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
                                                        $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
                                                        goto Ffda6ecd97e44d3f9a0b64956bf5b94c;
                                                    }
                                                    $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
                                                    $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
                                                    $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
                                                    Ffda6ecd97e44d3f9a0b64956bf5b94c:
                                                    $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
                                                    if (!($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3)) {
                                                        $start = $e0d1376cc4243595a2ac3f530e229437;
                                                        $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
                                                        $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
                                                        fseek($b4ad7225f6375fe5d757d3c7147fb034, $start);
                                                        header("HTTP/1.1 206 Partial Content");
                                                        b1388c1300931b373250ebc5d313e49d:
                                                        header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                        header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
                                                        $afe98be45e10c223a52934381b211730 = time();
                                                        $E9ee81096c9fac2e7a339b78194cee56 = 0;
                                                        $Fcf846b3512cb8d6f8d77d39b5ad11f6 = e2D73953A5089b9C7983838F61f23aCF::$settings["read_buffer_size"];
                                                        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                                                        $B91a997dabc6216f8d4bc59c20446cb3 = 0;
                                                        if (E2d73953a5089b9C7983838f61f23ACf::$settings["vod_limit_at"] > 0) {
                                                            $D335df82dd7d45c18971012dd95ee6de = intval($adb6fe828c718151845abb8cc50ba1f4 * E2d73953A5089B9C7983838F61F23aCf::$settings["vod_limit_at"] / 100);
                                                            goto E0c51124e9b715dda4e81d1420b47188;
                                                        }
                                                        $D335df82dd7d45c18971012dd95ee6de = $adb6fe828c718151845abb8cc50ba1f4;
                                                        E0c51124e9b715dda4e81d1420b47188:
                                                        $ab6c0eeb53062c3fa3175f9a5a7d5c76 = false;
                                                        A9756e791aab2b2ba3a210247e20e3c0:
                                                        if (!(!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654)) {
                                                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                                                            die;
                                                        }
                                                        $Beb85f0c05e519f48a14915b66ad155c = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $Fcf846b3512cb8d6f8d77d39b5ad11f6);
                                                        ++$Ced112d15c5a3c9e5ba92478d0228e93;
                                                        if (!$ab6c0eeb53062c3fa3175f9a5a7d5c76 && $B91a997dabc6216f8d4bc59c20446cb3 * $Fcf846b3512cb8d6f8d77d39b5ad11f6 >= $D335df82dd7d45c18971012dd95ee6de) {
                                                            $ab6c0eeb53062c3fa3175f9a5a7d5c76 = true;
                                                            goto E60699a8e32cd8a0eed6e04cafd93811;
                                                        }
                                                        ++$B91a997dabc6216f8d4bc59c20446cb3;
                                                        E60699a8e32cd8a0eed6e04cafd93811:
                                                        echo $Beb85f0c05e519f48a14915b66ad155c;
                                                        $E9ee81096c9fac2e7a339b78194cee56 += strlen($Beb85f0c05e519f48a14915b66ad155c);
                                                        if (!(time() - $afe98be45e10c223a52934381b211730 >= 30)) {
                                                            goto B7da84d59f99de59d20900a864c71df3;
                                                        }
                                                        file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($E9ee81096c9fac2e7a339b78194cee56 / 1024 / 30));
                                                        $afe98be45e10c223a52934381b211730 = time();
                                                        $E9ee81096c9fac2e7a339b78194cee56 = 0;
                                                        B7da84d59f99de59d20900a864c71df3:
                                                        if (!($dc3373e46e2f7714d715ad0418cdaee2 > 0 && $ab6c0eeb53062c3fa3175f9a5a7d5c76 && $Ced112d15c5a3c9e5ba92478d0228e93 >= ceil($dc3373e46e2f7714d715ad0418cdaee2 / $Fcf846b3512cb8d6f8d77d39b5ad11f6))) {
                                                            goto ba9c8840d2a9c9a5632f13e12355ada7;
                                                        }
                                                        sleep(1);
                                                        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                                                        ba9c8840d2a9c9a5632f13e12355ada7:
                                                        goto A9756e791aab2b2ba3a210247e20e3c0;
                                                    }
                                                    header("HTTP/1.1 416 Requested Range Not Satisfiable");
                                                    header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                    die;
                                                }
                                                header("HTTP/1.1 416 Requested Range Not Satisfiable");
                                                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                die;
                                            }
                                            http_response_code(401);
                                            die;
                                        }
                                        http_response_code(401);
                                        die;
                                    }
                                    http_response_code(401);
                                    die;
                                }
                                http_response_code(401);
                                die;
                            }
                            http_response_code(401);
                            die;
                        }
                        http_response_code(401);
                        die;
                    }
                    http_response_code(401);
                    die;
                }
                http_response_code(401);
                die;
            }
            http_response_code(401);
            die;
        }
        http_response_code(401);
        die;
    }
    http_response_code(401);
    die("ERROR.");
}
http_response_code(401);
die("Missing parameters.");
