<?php

register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
header("Access-Control-Allow-Origin: *");
if (isset(E2d73953a5089b9c7983838f61F23ACF::$request["token"])) {
    $dc5791fad6da6f9dd96b83b988be0cb8 = str_replace(" ", "+", E2D73953A5089b9c7983838F61F23ACF::$request["token"]);
    $c9ef80acc950f0adcb13d24415dbc633 = json_decode(F08cC5C567Cd66B30a2A1f399445489c(base64_decode($dc5791fad6da6f9dd96b83b988be0cb8), md5(E2d73953a5089B9C7983838F61F23ACf::$settings["crypt_load_balancing"])), true);
    if (is_array($c9ef80acc950f0adcb13d24415dbc633)) {
        if (!(E2D73953a5089b9c7983838F61f23aCf::$settings["use_buffer"] == 0)) {
            goto F4607b838966a3869d216aa5d0630859;
        }
        header("X-Accel-Buffering: no");
        F4607b838966a3869d216aa5d0630859:
        $b93df8c85c6b9c6b3e155555619bbe8e = 0;
        $ac61d2c064f4f23b7222db53fc6ef6a8 = null;
        $Fdc134ea90d233be850c53c1266026d6 = $c9ef80acc950f0adcb13d24415dbc633["username"];
        $E1dc5da23bfc7433f190ed9488d09204 = $c9ef80acc950f0adcb13d24415dbc633["password"];
        $d8d36e593ec0bd7cae9e37c890b536d4 = $c9ef80acc950f0adcb13d24415dbc633["user_id"];
        $e8bde7e627ad9d9d70c6010cc669eb60 = $c9ef80acc950f0adcb13d24415dbc633["external_device"];
        $C997add4b06067b4b694ca90dd36e6d0 = $c9ef80acc950f0adcb13d24415dbc633["isp"];
        $ac7cb659ff185789046b11ace1670c09 = $c9ef80acc950f0adcb13d24415dbc633["time"];
        $a915d7b641af262a730cfcf433966ebd = $c9ef80acc950f0adcb13d24415dbc633["country"];
        $b6497ba71489783c3747f19debe893a4 = $c9ef80acc950f0adcb13d24415dbc633["stream_id"];
        $e23c0ff03f3a73b2d73762f346bfe2a8 = time() + e2d73953A5089B9C7983838F61F23acf::$StreamingServers[SERVER_ID]["diff_time_main"];
        $f1bbf25f8a2aa075b59695b2d749ee5b = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
        $start = $c9ef80acc950f0adcb13d24415dbc633["start"];
        $f2d04c1a265fe6228e173c917e0083cb = $c9ef80acc950f0adcb13d24415dbc633["duration"];
        $b2cbe4de82c7504e1d8d46c57a6264fa = $c9ef80acc950f0adcb13d24415dbc633["extension"];
        if (E2D73953a5089B9c7983838f61f23ACF::$settings["hash_lb"] == 1) {
            if (!(!isset($c9ef80acc950f0adcb13d24415dbc633["hash"]) || strlen($c9ef80acc950f0adcb13d24415dbc633["hash"]) != 32)) {
                $d66bf8442f134e40ea49e8a7e2638aee = array("HTTP_INCAP_CLIENT_IP", "HTTP_CF_CONNECTING_IP", "HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR");
                $Fbd7a63b7e99d2d3b9ace3b6819810eb = false;
                foreach ($d66bf8442f134e40ea49e8a7e2638aee as $Cc2a18fdf76b8e3e115b27f927e5928b) {
                    if (!array_key_exists($Cc2a18fdf76b8e3e115b27f927e5928b, $_SERVER)) {
                        goto b175b25b8e0a7a8b3457a54cbca27d91;
                    }
                    foreach (explode(",", $_SERVER[$Cc2a18fdf76b8e3e115b27f927e5928b]) as $b284c6f3513623259e4ca641e8e99416) {
                        $b284c6f3513623259e4ca641e8e99416 = trim($b284c6f3513623259e4ca641e8e99416);
                        if (!empty($b284c6f3513623259e4ca641e8e99416)) {
                            $b35667d8dda77f408087e51c1af6f7ac = md5(json_encode(array("user_id" => $d8d36e593ec0bd7cae9e37c890b536d4, "username" => $Fdc134ea90d233be850c53c1266026d6, "password" => $E1dc5da23bfc7433f190ed9488d09204, "user_ip" => $b284c6f3513623259e4ca641e8e99416, "live_streaming_pass" => E2d73953A5089B9c7983838f61f23ACf::$settings["live_streaming_pass"], "external_device" => $e8bde7e627ad9d9d70c6010cc669eb60, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "country" => $a915d7b641af262a730cfcf433966ebd, "stream_id" => $b6497ba71489783c3747f19debe893a4, "start" => $start, "duration" => $f2d04c1a265fe6228e173c917e0083cb, "extension" => $b2cbe4de82c7504e1d8d46c57a6264fa, "time" => $ac7cb659ff185789046b11ace1670c09)));
                            if (!($b35667d8dda77f408087e51c1af6f7ac == $c9ef80acc950f0adcb13d24415dbc633["hash"])) {
                                goto C8a8810657bb7f08cf2c2aa213fdbd7d;
                            }
                            $b7eaa095f27405cf78a432ce6504dae0 = $b284c6f3513623259e4ca641e8e99416;
                            $Fbd7a63b7e99d2d3b9ace3b6819810eb = true;
                            goto Df890379c1c26ceef0ad8e615a314849;
                        }
                        C8a8810657bb7f08cf2c2aa213fdbd7d:
                    }
                    b175b25b8e0a7a8b3457a54cbca27d91:
                }
                Df890379c1c26ceef0ad8e615a314849:
                if ($Fbd7a63b7e99d2d3b9ace3b6819810eb) {
                    if ($ac7cb659ff185789046b11ace1670c09 >= $e23c0ff03f3a73b2d73762f346bfe2a8) {
                        fee5938f16812e02a69f7bde397736d8:
                        goto C9ae8308ceffbb3acd9b141d1d810385;
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
        C9ae8308ceffbb3acd9b141d1d810385:
        $fae6f311e48c420ee08489911d8efe3a = 0;
        if (!(!empty(e2d73953A5089B9c7983838F61F23Acf::$request["seg"]) && $b2cbe4de82c7504e1d8d46c57a6264fa == "m3u8")) {
            goto d2d817116eb1b8fbe9e448e27a64bee0;
        }
        list($C4681c0bd712178b03634fb95bb79412, $fae6f311e48c420ee08489911d8efe3a) = explode("_", E2d73953a5089b9C7983838f61f23aCF::$request["seg"]);
        $ed16a67a67e228b283a0ea0a8b597613 = intval($C4681c0bd712178b03634fb95bb79412);
        $fae6f311e48c420ee08489911d8efe3a = intval($fae6f311e48c420ee08489911d8efe3a);
        d2d817116eb1b8fbe9e448e27a64bee0:
        if (!(e2D73953a5089B9c7983838F61F23AcF::$settings["double_auth"] == 1)) {
            goto bfb733447178f39b2e2f91383e12a2b4;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306 = F1cA094152763c79018e9F1893Ef1E48::D909B0D1a6FFfdcDb838046fac418b04($d8d36e593ec0bd7cae9e37c890b536d4, null, null, true, true, false, false)) {
            if (!($fbf1d0a58fcc040ff00728a277a5f306["username"] != $Fdc134ea90d233be850c53c1266026d6)) {
                if (!($fbf1d0a58fcc040ff00728a277a5f306["password"] != $E1dc5da23bfc7433f190ed9488d09204)) {
                    if (!(!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && $e23c0ff03f3a73b2d73762f346bfe2a8 >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"])) {
                        if (!($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0)) {
                            if (!($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0)) {
                                if (!(!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"])))) {
                                    if (empty($a915d7b641af262a730cfcf433966ebd)) {
                                        goto e8c29a46c96d8e5b7b0439709695a5a8;
                                    }
                                    $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
                                    if (!($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"])) {
                                        if (!(!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", e2D73953A5089B9c7983838f61F23aCF::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, E2D73953a5089b9C7983838f61F23aCf::$settings["allow_countries"]))) {
                                            e8c29a46c96d8e5b7b0439709695a5a8:
                                            if (in_array($b6497ba71489783c3747f19debe893a4, $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
                                                Eae698aa3846967b19c27391b1a25b44:
                                                bfb733447178f39b2e2f91383e12a2b4:
                                                $f2d04c1a265fe6228e173c917e0083cb = intval($f2d04c1a265fe6228e173c917e0083cb);
                                                if (!is_numeric($start)) {
                                                    if (substr_count($start, "-") == 1) {
                                                        list($Ff4b5b238afab8643f0fc83309f62f6b, $f40a809702dde69dc98935191727489e) = explode("-", $start);
                                                        $Ebcf3bbc550fe4aea552e97b9f929558 = substr($Ff4b5b238afab8643f0fc83309f62f6b, 0, 4);
                                                        $Bfc90a3b4dc2f7582ed1dfc2ecdcead7 = substr($Ff4b5b238afab8643f0fc83309f62f6b, 4, 2);
                                                        $c183ceb9df6ad0f599a987cf77caf5bf = substr($Ff4b5b238afab8643f0fc83309f62f6b, 6, 2);
                                                        $C3701408f451b56ac9f60cf02f5867b3 = 0;
                                                        $e041641fb341837f896123fc736fa1b5 = $f40a809702dde69dc98935191727489e;
                                                        goto F7546166b15dae379b2d98de909e55a2;
                                                    }
                                                    list($Ff4b5b238afab8643f0fc83309f62f6b, $f40a809702dde69dc98935191727489e) = explode(":", $start);
                                                    list($Ebcf3bbc550fe4aea552e97b9f929558, $Bfc90a3b4dc2f7582ed1dfc2ecdcead7, $c183ceb9df6ad0f599a987cf77caf5bf) = explode("-", $Ff4b5b238afab8643f0fc83309f62f6b);
                                                    list($e041641fb341837f896123fc736fa1b5, $C3701408f451b56ac9f60cf02f5867b3) = explode("-", $f40a809702dde69dc98935191727489e);
                                                    F7546166b15dae379b2d98de909e55a2:
                                                    $be4422cded8341cce51900b80e4cb308 = mktime($e041641fb341837f896123fc736fa1b5, $C3701408f451b56ac9f60cf02f5867b3, 0, $Bfc90a3b4dc2f7582ed1dfc2ecdcead7, $c183ceb9df6ad0f599a987cf77caf5bf, $Ebcf3bbc550fe4aea552e97b9f929558);
                                                    goto a6f0f260e941768d1cf7d12e5bb07f4e;
                                                }
                                                $f2d04c1a265fe6228e173c917e0083cb *= 24;
                                                $Cb3a16fe5eb4f38ed73d164d6706e742 = array_values(array_filter(explode("\n", shell_exec("ls -tr TV_ARCHIVE" . $b6497ba71489783c3747f19debe893a4 . " | sed -e 's/\\s\\+/\\n/g'"))));
                                                $Bacc08552a4012d1b1882e1498d40589 = $start * 24;
                                                if (count($Cb3a16fe5eb4f38ed73d164d6706e742) >= $Bacc08552a4012d1b1882e1498d40589) {
                                                    $Bacc08552a4012d1b1882e1498d40589 = $Cb3a16fe5eb4f38ed73d164d6706e742[count($Cb3a16fe5eb4f38ed73d164d6706e742) - $Bacc08552a4012d1b1882e1498d40589];
                                                    goto e5d9671627d4c34c577ba3b7a520e14f;
                                                }
                                                $Bacc08552a4012d1b1882e1498d40589 = $Cb3a16fe5eb4f38ed73d164d6706e742[0];
                                                e5d9671627d4c34c577ba3b7a520e14f:
                                                if (preg_match("/(.*)-(.*)-(.*):(.*)\\./", $Bacc08552a4012d1b1882e1498d40589, $f563f11de8fd50b6d6e4071878cbe2de)) {
                                                    $be4422cded8341cce51900b80e4cb308 = mktime($f563f11de8fd50b6d6e4071878cbe2de[4], 0, 0, $f563f11de8fd50b6d6e4071878cbe2de[2], $f563f11de8fd50b6d6e4071878cbe2de[3], $f563f11de8fd50b6d6e4071878cbe2de[1]);
                                                    f5edaa5e835faf94c1fe7408ac22270f:
                                                    a6f0f260e941768d1cf7d12e5bb07f4e:
                                                    $c6d0530d4d8b9ce8618e256debcead95 = array();
                                                    $E45cb49615d9ff0c133fcdeaa506ddb6 = TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/" . date("Y-m-d:H-i", $be4422cded8341cce51900b80e4cb308) . ".ts";
                                                    if (!(empty($b6497ba71489783c3747f19debe893a4) || empty($be4422cded8341cce51900b80e4cb308) || empty($f2d04c1a265fe6228e173c917e0083cb))) {
                                                        if (!(!file_exists($E45cb49615d9ff0c133fcdeaa506ddb6) || !is_readable($E45cb49615d9ff0c133fcdeaa506ddb6))) {
                                                            $c6d0530d4d8b9ce8618e256debcead95 = array();
                                                            $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                                                            Ca067919338a46b9e45d7d03c15d3cb1:
                                                            if (!($Ced112d15c5a3c9e5ba92478d0228e93 < $f2d04c1a265fe6228e173c917e0083cb)) {
                                                                if (empty($c6d0530d4d8b9ce8618e256debcead95)) {
                                                                    goto F1df245dc6bf415f55f8a70abe67ac15;
                                                                }
                                                                $A2e2d8cf048bd6ddcdccd0cb732f9fec = "TV Archive";
                                                                switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
                                                                    case "m3u8":
                                                                        if (!isset($ed16a67a67e228b283a0ea0a8b597613)) {
                                                                            $F30ccc8fd3427f97ca35bc6ba6610d01->query("SELECT activity_id,hls_end FROM `user_activity_now` WHERE `user_id` = '%d' AND `server_id` = '%d' AND `container` = 'hls' AND `user_ip` = '%s' AND `user_agent` = '%s' AND `stream_id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["id"], SERVER_ID, $b7eaa095f27405cf78a432ce6504dae0, $f1bbf25f8a2aa075b59695b2d749ee5b, $b6497ba71489783c3747f19debe893a4);
                                                                            if ($F30ccc8fd3427f97ca35bc6ba6610d01->D4A34259FC10B35feDbCCdA0A23d69AE() == 0) {
                                                                                if (!($fbf1d0a58fcc040ff00728a277a5f306["max_connections"] != 0)) {
                                                                                    goto ed673c7802b21150f5bb77553cbc4664;
                                                                                }
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("UPDATE `user_activity_now` SET `hls_end` = 1 WHERE `user_id` = '%d' AND `container` = 'hls'", $fbf1d0a58fcc040ff00728a277a5f306["id"]);
                                                                                ed673c7802b21150f5bb77553cbc4664:
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`,`hls_last_read`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s','%d')", $fbf1d0a58fcc040ff00728a277a5f306["id"], $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec . " (HLS)", getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8);
                                                                                $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->c02FB3004CEC2De0bc39f4ed412479B1();
                                                                                goto Efbcdec506e91b4062204ccc0874c664;
                                                                            }
                                                                            $Fa2325a1b301ca7c383cb69087c42d91 = $F30ccc8fd3427f97ca35bc6ba6610d01->eB6bFE16D93814Caf26D92092D5A4052();
                                                                            if (!($Fa2325a1b301ca7c383cb69087c42d91["hls_end"] == 1)) {
                                                                                $b93df8c85c6b9c6b3e155555619bbe8e = $Fa2325a1b301ca7c383cb69087c42d91["activity_id"];
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("UPDATE `user_activity_now` SET `hls_last_read` = '%d' WHERE `activity_id` = '%d'", time(), $Fa2325a1b301ca7c383cb69087c42d91["activity_id"]);
                                                                                Efbcdec506e91b4062204ccc0874c664:
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->A9c27319DDF640f296201c75a1Ef3EEB();
                                                                                $output = "#EXTM3U\n";
                                                                                $output = "#EXTM3U\n#EXT-X-VERSION:3\n";
                                                                                $output = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:60\n";
                                                                                $output = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:60\n#EXT-X-MEDIA-SEQUENCE:0\n";
                                                                                $output = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:60\n#EXT-X-MEDIA-SEQUENCE:0\n#EXT-X-PLAYLIST-TYPE:VOD\n";
                                                                                foreach ($c6d0530d4d8b9ce8618e256debcead95 as $E5d29eebd54cbadb9868db24207ef778 => $D3ecfc45b95ce1954d2279e4bd55eb30) {
                                                                                    $output .= "#EXTINF:60,\n";
                                                                                    $output .= "/streaming/timeshift.php?token={$dc5791fad6da6f9dd96b83b988be0cb8}&seg={$E5d29eebd54cbadb9868db24207ef778}_" . $D3ecfc45b95ce1954d2279e4bd55eb30["filesize"] . ".ts\n";
                                                                                }
                                                                                $output .= "#EXT-X-ENDLIST";
                                                                                header("Content-Type: application/x-mpegurl");
                                                                                header("Content-Length: " . strlen($output));
                                                                                echo $output;
                                                                                die;
                                                                            }
                                                                            header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                                                                            die;
                                                                        }
                                                                        if (!(!empty($c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]) && file_exists($c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filename"]) && $c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filesize"] == $fae6f311e48c420ee08489911d8efe3a)) {
                                                                            goto D2898a933d5eb938aced3c1296598964;
                                                                        }
                                                                        $F9a39e9b608ce284ffa44edd83c9ee81 = 0;
                                                                        $adb6fe828c718151845abb8cc50ba1f4 = $c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filesize"];
                                                                        if (!($ed16a67a67e228b283a0ea0a8b597613 == 0)) {
                                                                            goto D2bd0c23698ffce1bd18237b71121b2d;
                                                                        }
                                                                        $F9a39e9b608ce284ffa44edd83c9ee81 = $c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filesize"] * 0.3;
                                                                        $adb6fe828c718151845abb8cc50ba1f4 = $c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filesize"] - $F9a39e9b608ce284ffa44edd83c9ee81;
                                                                        D2bd0c23698ffce1bd18237b71121b2d:
                                                                        header("Content-Type: video/mp2t");
                                                                        header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
                                                                        $b4ad7225f6375fe5d757d3c7147fb034 = fopen($c6d0530d4d8b9ce8618e256debcead95[$ed16a67a67e228b283a0ea0a8b597613]["filename"], "r");
                                                                        fseek($b4ad7225f6375fe5d757d3c7147fb034, $F9a39e9b608ce284ffa44edd83c9ee81);
                                                                        Ef1a375aebb973e3a366d96f1749763a:
                                                                        if (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
                                                                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                                                                            D2898a933d5eb938aced3c1296598964:
                                                                            die;
                                                                        }
                                                                        echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, e2d73953A5089B9c7983838F61f23ACf::$settings["read_buffer_size"]);
                                                                        goto Ef1a375aebb973e3a366d96f1749763a;
                                                                    default:
                                                                        header("Content-Type: video/mp2t");
                                                                        if (empty($fbf1d0a58fcc040ff00728a277a5f306)) {
                                                                            goto Ffda6332fd1dc8558fd6dfbc0a995ba6;
                                                                        }
                                                                        $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s')", $fbf1d0a58fcc040ff00728a277a5f306["id"], $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60);
                                                                        $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->c02fB3004CeC2de0bC39f4ED412479B1();
                                                                        $ac61d2c064f4f23b7222db53fc6ef6a8 = TMP_DIR . $b93df8c85c6b9c6b3e155555619bbe8e . ".con";
                                                                        $F30ccc8fd3427f97ca35bc6ba6610d01->a9C27319Ddf640F296201c75a1Ef3EEb();
                                                                        Ffda6332fd1dc8558fd6dfbc0a995ba6:
                                                                        $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3 = E8c0E47354927ca1361810A6A0465eEc($c6d0530d4d8b9ce8618e256debcead95);
                                                                        $bd8be6cf39eec67640223143174627d0 = $c2f883bf459da90a240f9950048443f3 * 0.008 / ($f2d04c1a265fe6228e173c917e0083cb * 60);
                                                                        header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
                                                                        $start = 0;
                                                                        $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
                                                                        if (!isset($_SERVER["HTTP_RANGE"])) {
                                                                            goto d2c375b72d2cd0d0de92825463ebbd33;
                                                                        }
                                                                        $e0d1376cc4243595a2ac3f530e229437 = $start;
                                                                        $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
                                                                        list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
                                                                        if (!(strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false)) {
                                                                            if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
                                                                                $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
                                                                                goto c5340e3ccf776516c8588bd1ae9672f8;
                                                                            }
                                                                            $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
                                                                            $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
                                                                            $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
                                                                            c5340e3ccf776516c8588bd1ae9672f8:
                                                                            $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
                                                                            if (!($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3)) {
                                                                                $start = $e0d1376cc4243595a2ac3f530e229437;
                                                                                $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
                                                                                $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
                                                                                header("HTTP/1.1 206 Partial Content");
                                                                                d2c375b72d2cd0d0de92825463ebbd33:
                                                                                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                                                header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
                                                                                $a838e2121503947a2ba6909c4410c54f = 0;
                                                                                if (!($start > 0)) {
                                                                                    goto Bdcc31a58b2b6f9aa79b113439673286;
                                                                                }
                                                                                $a838e2121503947a2ba6909c4410c54f = floor($start / ($c2f883bf459da90a240f9950048443f3 / count($c6d0530d4d8b9ce8618e256debcead95)));
                                                                                Bdcc31a58b2b6f9aa79b113439673286:
                                                                                $cfa781cc76e53231e11390ab2a569bd3 = false;
                                                                                $F9a39e9b608ce284ffa44edd83c9ee81 = 0;
                                                                                $B148ddcae246cc6365bd50b72071862c = 0;
                                                                                $dc3373e46e2f7714d715ad0418cdaee2 = $bd8be6cf39eec67640223143174627d0 * 125;
                                                                                $dc3373e46e2f7714d715ad0418cdaee2 += $dc3373e46e2f7714d715ad0418cdaee2 * E2d73953a5089b9C7983838F61F23ACF::$settings["vod_bitrate_plus"] * 0.01;
                                                                                $afe98be45e10c223a52934381b211730 = time();
                                                                                $E9ee81096c9fac2e7a339b78194cee56 = 0;
                                                                                $Fcf846b3512cb8d6f8d77d39b5ad11f6 = e2D73953a5089B9C7983838f61F23acF::$settings["read_buffer_size"];
                                                                                $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                                                                                $B91a997dabc6216f8d4bc59c20446cb3 = 0;
                                                                                if (e2d73953a5089b9C7983838F61F23aCF::$settings["vod_limit_at"] > 0) {
                                                                                    $D335df82dd7d45c18971012dd95ee6de = intval($c2f883bf459da90a240f9950048443f3 * e2d73953a5089B9c7983838F61F23ACf::$settings["vod_limit_at"] / 100);
                                                                                    goto D3eddc3abd12bd7a80b76c92b433c5fc;
                                                                                }
                                                                                $D335df82dd7d45c18971012dd95ee6de = $c2f883bf459da90a240f9950048443f3;
                                                                                D3eddc3abd12bd7a80b76c92b433c5fc:
                                                                                $ab6c0eeb53062c3fa3175f9a5a7d5c76 = false;
                                                                                foreach ($c6d0530d4d8b9ce8618e256debcead95 as $E5d29eebd54cbadb9868db24207ef778 => $D3ecfc45b95ce1954d2279e4bd55eb30) {
                                                                                    $B148ddcae246cc6365bd50b72071862c += $D3ecfc45b95ce1954d2279e4bd55eb30["filesize"];
                                                                                    if (!(!$cfa781cc76e53231e11390ab2a569bd3 && $a838e2121503947a2ba6909c4410c54f > 0)) {
                                                                                        goto b28f39793a383068e9d4555743501034;
                                                                                    }
                                                                                    if ($a838e2121503947a2ba6909c4410c54f > $E5d29eebd54cbadb9868db24207ef778) {
                                                                                        goto e18d42b141c78f2d2e62f05ed44e7660;
                                                                                    }
                                                                                    $cfa781cc76e53231e11390ab2a569bd3 = true;
                                                                                    $F9a39e9b608ce284ffa44edd83c9ee81 = $start - $B148ddcae246cc6365bd50b72071862c;
                                                                                    b28f39793a383068e9d4555743501034:
                                                                                    $b4ad7225f6375fe5d757d3c7147fb034 = fopen($D3ecfc45b95ce1954d2279e4bd55eb30["filename"], "rb");
                                                                                    fseek($b4ad7225f6375fe5d757d3c7147fb034, $F9a39e9b608ce284ffa44edd83c9ee81);
                                                                                    Abadfcc150246928a69889ec006fac80:
                                                                                    if (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
                                                                                        if (!is_resource($b4ad7225f6375fe5d757d3c7147fb034)) {
                                                                                            goto bb142fe268052803ce8c07b838cf7788;
                                                                                        }
                                                                                        fclose($b4ad7225f6375fe5d757d3c7147fb034);
                                                                                        bb142fe268052803ce8c07b838cf7788:
                                                                                        $F9a39e9b608ce284ffa44edd83c9ee81 = 0;
                                                                                        e18d42b141c78f2d2e62f05ed44e7660:
                                                                                    }
                                                                                    $C4681c0bd712178b03634fb95bb79412 = ftell($b4ad7225f6375fe5d757d3c7147fb034);
                                                                                    $Beb85f0c05e519f48a14915b66ad155c = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $Fcf846b3512cb8d6f8d77d39b5ad11f6);
                                                                                    echo $Beb85f0c05e519f48a14915b66ad155c;
                                                                                    $E9ee81096c9fac2e7a339b78194cee56 += strlen($Beb85f0c05e519f48a14915b66ad155c);
                                                                                    ++$Ced112d15c5a3c9e5ba92478d0228e93;
                                                                                    if (!$ab6c0eeb53062c3fa3175f9a5a7d5c76 && $B91a997dabc6216f8d4bc59c20446cb3 * $Fcf846b3512cb8d6f8d77d39b5ad11f6 >= $D335df82dd7d45c18971012dd95ee6de) {
                                                                                        $ab6c0eeb53062c3fa3175f9a5a7d5c76 = true;
                                                                                        goto A5529b24de391c48d20f442b0444e009;
                                                                                    }
                                                                                    ++$B91a997dabc6216f8d4bc59c20446cb3;
                                                                                    A5529b24de391c48d20f442b0444e009:
                                                                                    if (!($dc3373e46e2f7714d715ad0418cdaee2 > 0 && $ab6c0eeb53062c3fa3175f9a5a7d5c76 && $Ced112d15c5a3c9e5ba92478d0228e93 >= ceil($dc3373e46e2f7714d715ad0418cdaee2 / $Fcf846b3512cb8d6f8d77d39b5ad11f6))) {
                                                                                        goto B677134a6bc1e07f5704e302308286fe;
                                                                                    }
                                                                                    sleep(1);
                                                                                    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                                                                                    B677134a6bc1e07f5704e302308286fe:
                                                                                    if (!(time() - $afe98be45e10c223a52934381b211730 >= 30)) {
                                                                                        goto ebede306974b6d791d53dfdddb334f88;
                                                                                    }
                                                                                    file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($E9ee81096c9fac2e7a339b78194cee56 / 1024 / 30));
                                                                                    $afe98be45e10c223a52934381b211730 = time();
                                                                                    $E9ee81096c9fac2e7a339b78194cee56 = 0;
                                                                                    ebede306974b6d791d53dfdddb334f88:
                                                                                    goto Abadfcc150246928a69889ec006fac80;
                                                                                }
                                                                            }
                                                                            header("HTTP/1.1 416 Requested Range Not Satisfiable");
                                                                            header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                                            die;
                                                                        }
                                                                        header("HTTP/1.1 416 Requested Range Not Satisfiable");
                                                                        header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                                                                        die;
                                                                }
                                                                B268f8531dba41374feef51ccaf443cc:
                                                                F1df245dc6bf415f55f8a70abe67ac15:
                                                                function e8c0E47354927ca1361810a6A0465Eec($c6d0530d4d8b9ce8618e256debcead95) {
                                                                    $adb6fe828c718151845abb8cc50ba1f4 = 0;
                                                                    foreach ($c6d0530d4d8b9ce8618e256debcead95 as $D3ecfc45b95ce1954d2279e4bd55eb30) {
                                                                        $adb6fe828c718151845abb8cc50ba1f4 += $D3ecfc45b95ce1954d2279e4bd55eb30["filesize"];
                                                                    }
                                                                    return $adb6fe828c718151845abb8cc50ba1f4;
                                                                }
                                                                function shutdown() {
                                                                    global $F30ccc8fd3427f97ca35bc6ba6610d01, $b93df8c85c6b9c6b3e155555619bbe8e, $ac61d2c064f4f23b7222db53fc6ef6a8, $d8d36e593ec0bd7cae9e37c890b536d4, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $b6497ba71489783c3747f19debe893a4, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8;
                                                                    $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319DDF640f296201C75A1ef3eEb();
                                                                    if (!($b93df8c85c6b9c6b3e155555619bbe8e !== false)) {
                                                                        goto db6a8c8523e1b3e70fdfe7abd0bed27a;
                                                                    }
                                                                    f1cA094152763C79018E9F1893eF1E48::e01C6247dC62e1eDe6dA6671b6ADbb8D($b93df8c85c6b9c6b3e155555619bbe8e);
                                                                    F1Ca094152763c79018e9F1893EF1e48::C9ccC76c9d6b7E44c6d4a7a6c7191Eb5(SERVER_ID, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $e23c0ff03f3a73b2d73762f346bfe2a8, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $A2e2d8cf048bd6ddcdccd0cb732f9fec, $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60);
                                                                    if (!file_exists($ac61d2c064f4f23b7222db53fc6ef6a8)) {
                                                                        goto fe74bc5d7f013f27bf5aa5412811b9b3;
                                                                    }
                                                                    unlink($ac61d2c064f4f23b7222db53fc6ef6a8);
                                                                    fe74bc5d7f013f27bf5aa5412811b9b3:
                                                                    db6a8c8523e1b3e70fdfe7abd0bed27a:
                                                                    fastcgi_finish_request();
                                                                    if (!($b93df8c85c6b9c6b3e155555619bbe8e !== false)) {
                                                                        goto F9ed20bbb8d4a85ae21377b6dd999716;
                                                                    }
                                                                    posix_kill(getmypid(), 9);
                                                                    F9ed20bbb8d4a85ae21377b6dd999716:
                                                                }
                                                                // [PHPDeobfuscator] Implied script end
                                                                return;
                                                            }
                                                            $E45cb49615d9ff0c133fcdeaa506ddb6 = TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/" . date("Y-m-d:H-i", $be4422cded8341cce51900b80e4cb308 + $Ced112d15c5a3c9e5ba92478d0228e93 * 60) . ".ts";
                                                            if (!file_exists($E45cb49615d9ff0c133fcdeaa506ddb6)) {
                                                                goto Bdc9aa731a1e628666a0c21a8044b79a;
                                                            }
                                                            $c6d0530d4d8b9ce8618e256debcead95[] = array("filename" => $E45cb49615d9ff0c133fcdeaa506ddb6, "filesize" => filesize($E45cb49615d9ff0c133fcdeaa506ddb6));
                                                            Bdc9aa731a1e628666a0c21a8044b79a:
                                                            $Ced112d15c5a3c9e5ba92478d0228e93++;
                                                            goto Ca067919338a46b9e45d7d03c15d3cb1;
                                                        }
                                                        header("HTTP/1.1 404 Not Found");
                                                        die;
                                                    }
                                                    header("HTTP/1.1 400 Bad Request");
                                                    die;
                                                }
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
