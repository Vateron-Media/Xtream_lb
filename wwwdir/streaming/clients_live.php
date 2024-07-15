<?php

register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
header("Access-Control-Allow-Origin: *");
if (!(!isset(E2D73953a5089b9C7983838F61f23aCf::$request["token"]) || !isset(E2d73953a5089B9c7983838F61f23AcF::$request["username"]) || !isset(e2d73953a5089B9C7983838F61f23Acf::$request["password"]) || !isset(e2d73953a5089b9c7983838F61F23AcF::$request["stream"]))) {
    $dc5791fad6da6f9dd96b83b988be0cb8 = str_replace(" ", "+", E2d73953a5089B9c7983838F61f23Acf::$request["token"]);
    $c9ef80acc950f0adcb13d24415dbc633 = json_decode(f08Cc5c567CD66B30A2A1f399445489c(base64_decode($dc5791fad6da6f9dd96b83b988be0cb8), md5(E2D73953a5089B9C7983838f61f23ACf::$settings["crypt_load_balancing"])), true);
    if (is_array($c9ef80acc950f0adcb13d24415dbc633)) {
        $b2cbe4de82c7504e1d8d46c57a6264fa = $c9ef80acc950f0adcb13d24415dbc633["extension"];
        $Fdc134ea90d233be850c53c1266026d6 = e2d73953A5089b9c7983838f61F23Acf::$request["username"];
        $E1dc5da23bfc7433f190ed9488d09204 = E2D73953a5089B9C7983838F61f23AcF::$request["password"];
        $ef4f0599712515333103265dafb029f7 = $c9ef80acc950f0adcb13d24415dbc633["pid"];
        $e8bde7e627ad9d9d70c6010cc669eb60 = $c9ef80acc950f0adcb13d24415dbc633["external_device"];
        $dfbf7f3d08c3458724615497897f4cad = $c9ef80acc950f0adcb13d24415dbc633["on_demand"];
        $C997add4b06067b4b694ca90dd36e6d0 = $c9ef80acc950f0adcb13d24415dbc633["isp"];
        $bd8be6cf39eec67640223143174627d0 = $c9ef80acc950f0adcb13d24415dbc633["bitrate"];
        $ac7cb659ff185789046b11ace1670c09 = $c9ef80acc950f0adcb13d24415dbc633["time"];
        $a915d7b641af262a730cfcf433966ebd = $c9ef80acc950f0adcb13d24415dbc633["country"];
        $d8d36e593ec0bd7cae9e37c890b536d4 = $c9ef80acc950f0adcb13d24415dbc633["user_id"];
        $e23c0ff03f3a73b2d73762f346bfe2a8 = time() + E2D73953A5089B9c7983838F61f23Acf::$StreamingServers[SERVER_ID]["diff_time_main"];
        $b6497ba71489783c3747f19debe893a4 = intval(E2d73953A5089B9C7983838f61f23acF::$request["stream"]);
        $f1bbf25f8a2aa075b59695b2d749ee5b = empty($_SERVER["HTTP_USER_AGENT"]) ? '' : htmlentities(trim($_SERVER["HTTP_USER_AGENT"]));
        $ec660578659a9624aad2966a4d4da133 = $c9ef80acc950f0adcb13d24415dbc633["is_restreamer"];
        $b149beed8aaf27a3f198acf4bb7c99cb = $c9ef80acc950f0adcb13d24415dbc633["max_connections"];
        $C2b22dc2ec6a811e5a5c1805c22038af = $c9ef80acc950f0adcb13d24415dbc633["monitor_pid"];
        if (E2d73953A5089b9C7983838F61F23ACf::$settings["hash_lb"] == 1) {
            if (!(!isset($c9ef80acc950f0adcb13d24415dbc633["hash"]) || strlen($c9ef80acc950f0adcb13d24415dbc633["hash"]) != 32)) {
                $d66bf8442f134e40ea49e8a7e2638aee = array("HTTP_INCAP_CLIENT_IP", "HTTP_CF_CONNECTING_IP", "HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR");
                $Fbd7a63b7e99d2d3b9ace3b6819810eb = false;
                foreach ($d66bf8442f134e40ea49e8a7e2638aee as $Cc2a18fdf76b8e3e115b27f927e5928b) {
                    if (!array_key_exists($Cc2a18fdf76b8e3e115b27f927e5928b, $_SERVER)) {
                        goto F08de8b4d9aea9a9fa3db845cea111c4;
                    }
                    foreach (explode(",", $_SERVER[$Cc2a18fdf76b8e3e115b27f927e5928b]) as $b284c6f3513623259e4ca641e8e99416) {
                        $b284c6f3513623259e4ca641e8e99416 = trim($b284c6f3513623259e4ca641e8e99416);
                        if (!empty($b284c6f3513623259e4ca641e8e99416)) {
                            $b35667d8dda77f408087e51c1af6f7ac = md5(json_encode(array("stream_id" => $b6497ba71489783c3747f19debe893a4, "user_id" => $d8d36e593ec0bd7cae9e37c890b536d4, "username" => $Fdc134ea90d233be850c53c1266026d6, "password" => $E1dc5da23bfc7433f190ed9488d09204, "user_ip" => $b284c6f3513623259e4ca641e8e99416, "live_streaming_pass" => E2D73953A5089B9C7983838f61f23acf::$settings["live_streaming_pass"], "pid" => $ef4f0599712515333103265dafb029f7, "external_device" => $e8bde7e627ad9d9d70c6010cc669eb60, "on_demand" => $dfbf7f3d08c3458724615497897f4cad, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "bitrate" => $bd8be6cf39eec67640223143174627d0, "country" => $a915d7b641af262a730cfcf433966ebd, "extension" => $b2cbe4de82c7504e1d8d46c57a6264fa, "is_restreamer" => $ec660578659a9624aad2966a4d4da133, "max_connections" => $b149beed8aaf27a3f198acf4bb7c99cb, "monitor_pid" => $C2b22dc2ec6a811e5a5c1805c22038af, "time" => $ac7cb659ff185789046b11ace1670c09)));
                            if (!($b35667d8dda77f408087e51c1af6f7ac == $c9ef80acc950f0adcb13d24415dbc633["hash"])) {
                                goto df197d8c407903ea833fb34baecdd77f;
                            }
                            $b7eaa095f27405cf78a432ce6504dae0 = $b284c6f3513623259e4ca641e8e99416;
                            $Fbd7a63b7e99d2d3b9ace3b6819810eb = true;
                            goto a1ad70f957361a24b40d7952077bd282;
                        }
                        df197d8c407903ea833fb34baecdd77f:
                    }
                    F08de8b4d9aea9a9fa3db845cea111c4:
                }
                a1ad70f957361a24b40d7952077bd282:
                if ($Fbd7a63b7e99d2d3b9ace3b6819810eb) {
                    if (!($b2cbe4de82c7504e1d8d46c57a6264fa != "m3u8")) {
                        goto de195f9b9cd35f3f630d7fa05a11e363;
                    }
                    if ($ac7cb659ff185789046b11ace1670c09 >= $e23c0ff03f3a73b2d73762f346bfe2a8) {
                        de195f9b9cd35f3f630d7fa05a11e363:
                        d71e3edf5e92d068cec44ff8df48f00d:
                        goto Bc2cfc544a3e26d632772c0102a3c2ef;
                    }
                    http_response_code(401);
                    die;
                }
                die;
            }
            http_response_code(401);
            die;
        }
        $b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
        Bc2cfc544a3e26d632772c0102a3c2ef:
        $b93df8c85c6b9c6b3e155555619bbe8e = 0;
        $E76a4ed28669e4e5e16a74153d2a3ea8 = true;
        $ac61d2c064f4f23b7222db53fc6ef6a8 = null;
        if (!(E2D73953A5089b9c7983838F61f23acF::$settings["use_buffer"] == 0)) {
            goto Afd5651ec5aecac3fb0b1356f7086ed0;
        }
        header("X-Accel-Buffering: no");
        Afd5651ec5aecac3fb0b1356f7086ed0:
        if (!(E2D73953A5089b9C7983838f61F23aCf::$settings["double_auth"] == 1)) {
            goto E202a483a7040c9e1886a618ee794e92;
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306 = F1CA094152763C79018e9f1893EF1e48::d909b0d1a6fFfDCDb838046faC418b04($d8d36e593ec0bd7cae9e37c890b536d4, null, null, true, true, false, false)) {
            if (!($fbf1d0a58fcc040ff00728a277a5f306["username"] != $Fdc134ea90d233be850c53c1266026d6)) {
                if (!($fbf1d0a58fcc040ff00728a277a5f306["password"] != $E1dc5da23bfc7433f190ed9488d09204)) {
                    if (!(!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && $e23c0ff03f3a73b2d73762f346bfe2a8 >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"])) {
                        if (!($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0)) {
                            if (!($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0)) {
                                if (!(!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"])))) {
                                    if (empty($a915d7b641af262a730cfcf433966ebd)) {
                                        goto Ba255fa46ca41d318e9b3ceaa5e9433e;
                                    }
                                    $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
                                    if (!($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"])) {
                                        if (!(!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", E2D73953a5089B9C7983838F61F23ACF::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, e2D73953A5089B9C7983838F61F23ACf::$settings["allow_countries"]))) {
                                            Ba255fa46ca41d318e9b3ceaa5e9433e:
                                            if (array_key_exists($b2cbe4de82c7504e1d8d46c57a6264fa, $fbf1d0a58fcc040ff00728a277a5f306["output_formats"])) {
                                                if (in_array($b6497ba71489783c3747f19debe893a4, $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
                                                    Ac7fb1b0e636f2f5d07ee13945abc56c:
                                                    E202a483a7040c9e1886a618ee794e92:
                                                    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                                                    if (f1cA094152763C79018e9f1893eF1E48::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH)) {
                                                        goto f882a522994bbe785f4a20c6c7299d3a;
                                                    }
                                                    if ($dfbf7f3d08c3458724615497897f4cad == 1) {
                                                        if (F1ca094152763c79018E9F1893Ef1e48::D835C2A9787BA794E7590e06621cfa6b($C2b22dc2ec6a811e5a5c1805c22038af, $b6497ba71489783c3747f19debe893a4)) {
                                                            goto a413515beb08f43b12ad968d4e4e67d8;
                                                        }
                                                        c872BCFa04B3eaeE1B4A93A0D775B9D7::cCE5281ddfb1f4c0D820841761f78170($b6497ba71489783c3747f19debe893a4);
                                                        a413515beb08f43b12ad968d4e4e67d8:
                                                        C50aee2793a295ac439de7ac826e35ed:
                                                        f882a522994bbe785f4a20c6c7299d3a:
                                                        switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
                                                            case "m3u8":
                                                                $E76a4ed28669e4e5e16a74153d2a3ea8 = false;
                                                                $E93e375f79b35bbb4a3c6614706e14e0 = 0;
                                                                Aca9608ad6b6491b8a090007c050ffbc:
                                                                if (!(!file_exists($f0d5508533eaf6452b2b014beae1cc7c) && $E93e375f79b35bbb4a3c6614706e14e0 <= 20)) {
                                                                    if (!($E93e375f79b35bbb4a3c6614706e14e0 == 20)) {
                                                                        if (empty(E2D73953A5089B9c7983838f61F23ACF::$request["segment"])) {
                                                                            $F30ccc8fd3427f97ca35bc6ba6610d01->query("SELECT activity_id,hls_end FROM `user_activity_now` WHERE `user_id` = '%d' AND `server_id` = '%d' AND `container` = 'hls' AND `user_ip` = '%s' AND `user_agent` = '%s' AND `stream_id` = '%d'", $d8d36e593ec0bd7cae9e37c890b536d4, SERVER_ID, $b7eaa095f27405cf78a432ce6504dae0, $f1bbf25f8a2aa075b59695b2d749ee5b, $b6497ba71489783c3747f19debe893a4);
                                                                            if ($F30ccc8fd3427f97ca35bc6ba6610d01->d4A34259fc10B35fEDbccDA0A23d69ae() == 0) {
                                                                                if (!($b149beed8aaf27a3f198acf4bb7c99cb != 0)) {
                                                                                    goto d672714bff5bfbe5c50c04c51eaf3214;
                                                                                }
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("UPDATE `user_activity_now` SET `hls_end` = 1 WHERE `user_id` = '%d' AND `container` = 'hls'", $d8d36e593ec0bd7cae9e37c890b536d4);
                                                                                d672714bff5bfbe5c50c04c51eaf3214:
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`,`hls_last_read`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s','%d')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, "hls", getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8);
                                                                                $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->C02fB3004CEc2DE0bc39F4eD412479B1();
                                                                                goto Af8fdd32547ef7948de61d5686a1e68c;
                                                                            }
                                                                            $Fa2325a1b301ca7c383cb69087c42d91 = $F30ccc8fd3427f97ca35bc6ba6610d01->EB6Bfe16d93814CAf26d92092d5A4052();
                                                                            if (!($Fa2325a1b301ca7c383cb69087c42d91["hls_end"] == 1)) {
                                                                                $b93df8c85c6b9c6b3e155555619bbe8e = $Fa2325a1b301ca7c383cb69087c42d91["activity_id"];
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("UPDATE `user_activity_now` SET `hls_last_read` = '%d' WHERE `activity_id` = '%d'", $e23c0ff03f3a73b2d73762f346bfe2a8, $Fa2325a1b301ca7c383cb69087c42d91["activity_id"]);
                                                                                Af8fdd32547ef7948de61d5686a1e68c:
                                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->a9C27319dDF640F296201c75a1EF3eEb();
                                                                                if (!($E4866fec202244d7a3c9f4e24f6ee344 = F1CA094152763C79018e9f1893Ef1e48::B5B64Fc74Aaa86445F7C95e69bAbdd84($f0d5508533eaf6452b2b014beae1cc7c, $b6497ba71489783c3747f19debe893a4, $dc5791fad6da6f9dd96b83b988be0cb8, $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204))) {
                                                                                    goto Ad8ad50bf0d6eec133e4487722006bfc;
                                                                                }
                                                                                header("Content-Type: application/x-mpegurl");
                                                                                header("Content-Length: " . strlen($E4866fec202244d7a3c9f4e24f6ee344));
                                                                                header("Cache-Control: no-store, no-cache, must-revalidate");
                                                                                echo $E4866fec202244d7a3c9f4e24f6ee344;
                                                                                Ad8ad50bf0d6eec133e4487722006bfc:
                                                                                die;
                                                                            }
                                                                            header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                                                                            die;
                                                                        }
                                                                        $F30ccc8fd3427f97ca35bc6ba6610d01->A9C27319ddF640f296201c75a1EF3eeB();
                                                                        $B8355a23f8ef2efb6685523365b371e2 = STREAMS_PATH . str_replace(array("\\", "/"), '', urldecode(E2D73953A5089B9C7983838f61F23acf::$request["segment"]));
                                                                        $b303f3c5ee77668995bff68d4448664a = explode("_", basename($B8355a23f8ef2efb6685523365b371e2));
                                                                        if (!(!file_exists($B8355a23f8ef2efb6685523365b371e2) || $b303f3c5ee77668995bff68d4448664a[0] != $b6497ba71489783c3747f19debe893a4 || empty(e2d73953A5089B9C7983838F61f23AcF::$request["key_seg"]))) {
                                                                            $B31f58220362e7d683b209c0b9237d23 = E2D73953a5089b9C7983838f61F23aCf::$request["key_seg"];
                                                                            $b35667d8dda77f408087e51c1af6f7ac = md5(urldecode(E2D73953a5089B9C7983838F61F23ACf::$request["segment"]) . $Fdc134ea90d233be850c53c1266026d6 . E2d73953A5089b9c7983838f61f23ACF::$settings["crypt_load_balancing"] . filesize($B8355a23f8ef2efb6685523365b371e2));
                                                                            if (!($b35667d8dda77f408087e51c1af6f7ac != $B31f58220362e7d683b209c0b9237d23)) {
                                                                                $Caa0aa71d18b85a3c3a825a16209b1a7 = filesize($B8355a23f8ef2efb6685523365b371e2);
                                                                                header("Content-Length: " . $Caa0aa71d18b85a3c3a825a16209b1a7);
                                                                                header("Content-Type: video/mp2t");
                                                                                readfile($B8355a23f8ef2efb6685523365b371e2);
                                                                                goto Da5514db48e46db88b21fbc68b8b9108;
                                                                            }
                                                                            header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                                                                            die;
                                                                        }
                                                                        header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden", true, 403);
                                                                        die;
                                                                    }
                                                                    die;
                                                                }
                                                                usleep(500000);
                                                                ++$E93e375f79b35bbb4a3c6614706e14e0;
                                                                goto Aca9608ad6b6491b8a090007c050ffbc;
                                                            default:
                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s')", $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, SERVER_ID, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, "ts", getmypid(), $e23c0ff03f3a73b2d73762f346bfe2a8, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60);
                                                                $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->c02fB3004CEC2de0bc39F4Ed412479B1();
                                                                $ac61d2c064f4f23b7222db53fc6ef6a8 = TMP_DIR . $b93df8c85c6b9c6b3e155555619bbe8e . ".con";
                                                                $F30ccc8fd3427f97ca35bc6ba6610d01->a9C27319DdF640f296201c75a1EF3eeb();
                                                                header("Content-Type: video/mp2t");
                                                                $Ae3016c45dd59a9b881c39a8dfeb6f6f = f1CA094152763C79018E9f1893EF1E48::b03404a02c45cF202DA01928E71D3b42($f0d5508533eaf6452b2b014beae1cc7c, E2D73953A5089B9C7983838f61f23acF::$settings["client_prebuffer"]);
                                                                if (!empty($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                                                                    if (is_array($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                                                                        if (!(e2d73953A5089b9c7983838f61F23acf::$settings["restreamer_prebuffer"] == 1 && $ec660578659a9624aad2966a4d4da133 == 1 || $ec660578659a9624aad2966a4d4da133 == 0)) {
                                                                            goto C1cb93814da277e36f0f50dd4213c201;
                                                                        }
                                                                        $Caa0aa71d18b85a3c3a825a16209b1a7 = 0;
                                                                        $d235a7447e2983907e2d39f281c1079f = time();
                                                                        foreach ($Ae3016c45dd59a9b881c39a8dfeb6f6f as $B8355a23f8ef2efb6685523365b371e2) {
                                                                            if (file_exists(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2)) {
                                                                                $Caa0aa71d18b85a3c3a825a16209b1a7 += readfile(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2);
                                                                                b2f8e9a9da76faa1fc2058350fc6cb76:
                                                                            }
                                                                            die;
                                                                        }
                                                                        $fe35f86aea36811d53a86b2f5a2ee22a = time() - $d235a7447e2983907e2d39f281c1079f;
                                                                        if (!($fe35f86aea36811d53a86b2f5a2ee22a == 0)) {
                                                                            goto Ace720138bdf96bf6b21dbd73d0aa81e;
                                                                        }
                                                                        $fe35f86aea36811d53a86b2f5a2ee22a = 0.1;
                                                                        Ace720138bdf96bf6b21dbd73d0aa81e:
                                                                        file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($Caa0aa71d18b85a3c3a825a16209b1a7 / $fe35f86aea36811d53a86b2f5a2ee22a / 1024));
                                                                        C1cb93814da277e36f0f50dd4213c201:
                                                                        preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                                                                        $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
                                                                        goto bbf1b835f119497ea321f255357b5e36;
                                                                    }
                                                                    $f8b82aac8ae421c699a4ca4dcf276fda = $Ae3016c45dd59a9b881c39a8dfeb6f6f;
                                                                    bbf1b835f119497ea321f255357b5e36:
                                                                    goto afa836d6183c9e75903c5c0e42034178;
                                                                }
                                                                if (!file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
                                                                    $f8b82aac8ae421c699a4ca4dcf276fda = -1;
                                                                    afa836d6183c9e75903c5c0e42034178:
                                                                    $e6e1d835d746daf7d74660d362922634 = 0;
                                                                    $C72e5ac751c165a671cc57aeb3dbc150 = E2d73953A5089B9c7983838F61F23ACf::$SegmentsSettings["seg_time"] * 2;
                                                                    Def53a156c5ecdf2c085fc314d5c44f8:
                                                                    if (!true) {
                                                                    }
                                                                    $F9c8a291792f79d13ff4c34f35ce49af = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 1);
                                                                    $B28d4d57f34661a8b1773dea1b6dda68 = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 2);
                                                                    $Df462682e370952f75b92da6e62a7293 = 0;
                                                                    Ddb22bbf96ae781f9745e0ce632d61b5:
                                                                    if (!(!file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150 * 10)) {
                                                                        if (file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af)) {
                                                                            if (!(empty($ef4f0599712515333103265dafb029f7) && file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"))) {
                                                                                goto f2f23008d14d09540da093f23b542268;
                                                                            }
                                                                            $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                                                                            f2f23008d14d09540da093f23b542268:
                                                                            if (!file_exists(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e)) {
                                                                                $e6e1d835d746daf7d74660d362922634 = 0;
                                                                                $afe98be45e10c223a52934381b211730 = time();
                                                                                $b4ad7225f6375fe5d757d3c7147fb034 = fopen(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af, "r");
                                                                                a5e7323e33992ef77dff3e40257dd09b:
                                                                                if (!($e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && !file_exists(STREAMS_PATH . $B28d4d57f34661a8b1773dea1b6dda68))) {
                                                                                    goto ba6adc097608483caf1ffb25dec37279;
                                                                                }
                                                                                $Ecf4751835141bfcce480ec62720b500 = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, E2d73953A5089b9c7983838f61F23Acf::$settings["read_buffer_size"]);
                                                                                if (!empty($Ecf4751835141bfcce480ec62720b500)) {
                                                                                    echo $Ecf4751835141bfcce480ec62720b500;
                                                                                    $e6e1d835d746daf7d74660d362922634 = 0;
                                                                                    goto a5e7323e33992ef77dff3e40257dd09b;
                                                                                }
                                                                                if (f1CA094152763c79018e9F1893EF1E48::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH)) {
                                                                                    sleep(1);
                                                                                    ++$e6e1d835d746daf7d74660d362922634;
                                                                                    goto a5e7323e33992ef77dff3e40257dd09b;
                                                                                }
                                                                                ba6adc097608483caf1ffb25dec37279:
                                                                                if (F1Ca094152763C79018e9f1893eF1E48::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH) && $e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && is_resource($b4ad7225f6375fe5d757d3c7147fb034)) {
                                                                                    $fae6f311e48c420ee08489911d8efe3a = filesize(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af);
                                                                                    $D863e93bdec7cffe0229f5278c01b0b1 = $fae6f311e48c420ee08489911d8efe3a - ftell($b4ad7225f6375fe5d757d3c7147fb034);
                                                                                    if (!($D863e93bdec7cffe0229f5278c01b0b1 > 0)) {
                                                                                        goto Ecb278bdb0d3b8ff55b1fd7508da8d33;
                                                                                    }
                                                                                    echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $D863e93bdec7cffe0229f5278c01b0b1);
                                                                                    Ecb278bdb0d3b8ff55b1fd7508da8d33:
                                                                                    $fe35f86aea36811d53a86b2f5a2ee22a = time() - $afe98be45e10c223a52934381b211730;
                                                                                    if (!($fe35f86aea36811d53a86b2f5a2ee22a <= 0)) {
                                                                                        goto Ea526b122edbbad910286fafae01c4fa;
                                                                                    }
                                                                                    $fe35f86aea36811d53a86b2f5a2ee22a = 0.1;
                                                                                    Ea526b122edbbad910286fafae01c4fa:
                                                                                    file_put_contents($ac61d2c064f4f23b7222db53fc6ef6a8, intval($fae6f311e48c420ee08489911d8efe3a / 1024 / $fe35f86aea36811d53a86b2f5a2ee22a));
                                                                                    goto e82f1759956267b065c645764d03b711;
                                                                                }
                                                                                if (!($ec660578659a9624aad2966a4d4da133 == 1 || $e6e1d835d746daf7d74660d362922634 > $C72e5ac751c165a671cc57aeb3dbc150)) {
                                                                                    $Df462682e370952f75b92da6e62a7293 = 0;
                                                                                    A4ea65dcda7710a926727c432954d469:
                                                                                    if (!($Df462682e370952f75b92da6e62a7293 <= E2D73953A5089b9c7983838f61f23ACf::$SegmentsSettings["seg_time"] && !F1CA094152763C79018e9f1893Ef1E48::A1Ecf5d2A93474B12E622361C656b958($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4))) {
                                                                                        if (!($Df462682e370952f75b92da6e62a7293 > E2D73953A5089B9c7983838F61f23acf::$SegmentsSettings["seg_time"] || !f1ca094152763C79018e9f1893eF1e48::a1ecF5D2A93474b12e622361c656B958($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4))) {
                                                                                            $f8b82aac8ae421c699a4ca4dcf276fda = -2;
                                                                                            e82f1759956267b065c645764d03b711:
                                                                                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                                                                                            $e6e1d835d746daf7d74660d362922634 = 0;
                                                                                            $f8b82aac8ae421c699a4ca4dcf276fda++;
                                                                                            goto Def53a156c5ecdf2c085fc314d5c44f8;
                                                                                        }
                                                                                        die;
                                                                                    }
                                                                                    sleep(1);
                                                                                    if (!file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
                                                                                        goto a8222858dba9b53864a42dd8d5983b82;
                                                                                    }
                                                                                    $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                                                                                    a8222858dba9b53864a42dd8d5983b82:
                                                                                    ++$Df462682e370952f75b92da6e62a7293;
                                                                                    goto A4ea65dcda7710a926727c432954d469;
                                                                                }
                                                                                die;
                                                                            }
                                                                            $Bb90ec918cc51fff41a08f4ef7e39763 = json_decode(file_get_contents(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e), true);
                                                                            switch ($Bb90ec918cc51fff41a08f4ef7e39763["type"]) {
                                                                                case "signal":
                                                                                    $Df462682e370952f75b92da6e62a7293 = 0;
                                                                                    c8ea35faf87410d8d79bd878f0362f81:
                                                                                    if (!(!file_exists(STREAMS_PATH . $B28d4d57f34661a8b1773dea1b6dda68) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150)) {
                                                                                        F1CA094152763C79018E9F1893Ef1E48::f3d10Afc1f577769323a685ba204079E($Bb90ec918cc51fff41a08f4ef7e39763, $F9c8a291792f79d13ff4c34f35ce49af);
                                                                                        ++$f8b82aac8ae421c699a4ca4dcf276fda;
                                                                                        goto b5e2ebae81b70625d060f37b92be4d80;
                                                                                    }
                                                                                    sleep(1);
                                                                                    ++$Df462682e370952f75b92da6e62a7293;
                                                                                    goto c8ea35faf87410d8d79bd878f0362f81;
                                                                                case "redirect":
                                                                                    $b6497ba71489783c3747f19debe893a4 = $F57960e3620515a273e03803fcd30429["stream_id"] = $Bb90ec918cc51fff41a08f4ef7e39763["stream_id"];
                                                                                    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                                                                                    $F57960e3620515a273e03803fcd30429["pid"] = null;
                                                                                    $Ae3016c45dd59a9b881c39a8dfeb6f6f = f1cA094152763c79018e9F1893Ef1e48::B03404A02C45cf202DA01928E71d3b42($f0d5508533eaf6452b2b014beae1cc7c, e2D73953A5089b9C7983838F61F23acF::$settings["client_prebuffer"]);
                                                                                    preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                                                                                    $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
                                                                                    goto b5e2ebae81b70625d060f37b92be4d80;
                                                                            }
                                                                            b5e2ebae81b70625d060f37b92be4d80:
                                                                            $Bb90ec918cc51fff41a08f4ef7e39763 = null;
                                                                            unlink(SIGNALS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e);
                                                                            goto Def53a156c5ecdf2c085fc314d5c44f8;
                                                                        }
                                                                        die;
                                                                    }
                                                                    usleep(100000);
                                                                    ++$Df462682e370952f75b92da6e62a7293;
                                                                    goto Ddb22bbf96ae781f9745e0ce632d61b5;
                                                                }
                                                                die;
                                                        }
                                                        Da5514db48e46db88b21fbc68b8b9108:
                                                        function shutdown()
                                                        {
                                                            global $F30ccc8fd3427f97ca35bc6ba6610d01, $C997add4b06067b4b694ca90dd36e6d0, $b93df8c85c6b9c6b3e155555619bbe8e, $E76a4ed28669e4e5e16a74153d2a3ea8, $ac61d2c064f4f23b7222db53fc6ef6a8, $d8d36e593ec0bd7cae9e37c890b536d4, $b2cbe4de82c7504e1d8d46c57a6264fa, $b6497ba71489783c3747f19debe893a4, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $a915d7b641af262a730cfcf433966ebd, $e8bde7e627ad9d9d70c6010cc669eb60, $e23c0ff03f3a73b2d73762f346bfe2a8;
                                                            $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319ddf640f296201C75a1ef3eeB();
                                                            if (!($b93df8c85c6b9c6b3e155555619bbe8e != 0 && $E76a4ed28669e4e5e16a74153d2a3ea8)) {
                                                                goto D1dd921fc77e1ebcf21d36e3cf77e20a;
                                                            }
                                                            f1cA094152763C79018E9F1893EF1E48::E01c6247dc62e1ede6DA6671B6aDBb8D($b93df8c85c6b9c6b3e155555619bbe8e);
                                                            F1CA094152763c79018e9F1893Ef1E48::c9cCC76C9d6b7e44C6D4A7A6C7191Eb5(SERVER_ID, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $e23c0ff03f3a73b2d73762f346bfe2a8, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, $a915d7b641af262a730cfcf433966ebd, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60);
                                                            if (!file_exists($ac61d2c064f4f23b7222db53fc6ef6a8)) {
                                                                goto d919d1498a23da5e6597f86566b63d74;
                                                            }
                                                            unlink($ac61d2c064f4f23b7222db53fc6ef6a8);
                                                            d919d1498a23da5e6597f86566b63d74:
                                                            D1dd921fc77e1ebcf21d36e3cf77e20a:
                                                            fastcgi_finish_request();
                                                            if (!($b93df8c85c6b9c6b3e155555619bbe8e != 0)) {
                                                                goto eb5d3bc5f33cfc9b72f21dd4fbf70880;
                                                            }
                                                            posix_kill(getmypid(), 9);
                                                            eb5d3bc5f33cfc9b72f21dd4fbf70880:
                                                        }
                                                        // [PHPDeobfuscator] Implied script end
                                                        return;
                                                    }
                                                    http_response_code(403);
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
        die;
    }
    http_response_code(401);
    die("ERROR.");
}
http_response_code(401);
die("Missing parameters.");
