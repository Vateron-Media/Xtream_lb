<?php

header("Access-Control-Allow-Origin: *");
register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (!(empty(e2d73953a5089B9c7983838F61f23ACf::$request["stream"]) || empty(e2d73953A5089b9c7983838f61f23AcF::$request["extension"]) || empty(E2D73953a5089b9C7983838F61f23ACF::$request["password"]) || E2d73953a5089B9c7983838f61f23AcF::$settings["live_streaming_pass"] != e2D73953A5089b9C7983838f61f23aCF::$request["password"])) {
    if (in_array($b7eaa095f27405cf78a432ce6504dae0, f1ca094152763c79018e9f1893eF1E48::E83c60Ae0B93a4Aae6a66A6f64fcA8b6(true))) {
        $E1dc5da23bfc7433f190ed9488d09204 = e2D73953A5089b9c7983838f61F23AcF::$settings["live_streaming_pass"];
        $b6497ba71489783c3747f19debe893a4 = intval(e2D73953a5089b9c7983838f61F23Acf::$request["stream"]);
        $b2cbe4de82c7504e1d8d46c57a6264fa = e2D73953a5089B9C7983838F61F23ACF::$request["extension"];
        $F30ccc8fd3427f97ca35bc6ba6610d01->query("\n                    SELECT * \n                    FROM `streams` t1\n                    INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.server_id = '%d'\n                    WHERE t1.`id` = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
        if (!(E2d73953a5089b9c7983838f61f23AcF::$settings["use_buffer"] == 0)) {
            goto A88365112efb04b9786acfd0cf867523;
        }
        header("X-Accel-Buffering: no");
        A88365112efb04b9786acfd0cf867523:
        if ($F30ccc8fd3427f97ca35bc6ba6610d01->d4a34259fC10b35FEdBCCdA0a23D69AE() > 0) {
            $F57960e3620515a273e03803fcd30429 = $F30ccc8fd3427f97ca35bc6ba6610d01->eb6BfE16D93814CAF26D92092d5a4052();
            $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319ddf640f296201c75a1eF3EEb();
            $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
            if (F1CA094152763C79018e9f1893Ef1e48::a1ecf5d2A93474b12E622361c656b958($F57960e3620515a273e03803fcd30429["pid"], $b6497ba71489783c3747f19debe893a4)) {
                goto eb83f12ac37b2bda467a91082b795121;
            }
            if ($F57960e3620515a273e03803fcd30429["on_demand"] == 1) {
                if (f1Ca094152763c79018e9F1893EF1E48::D835c2A9787bA794E7590e06621cFa6B($F57960e3620515a273e03803fcd30429["monitor_pid"], $b6497ba71489783c3747f19debe893a4)) {
                    goto f68205ff1b65c5401a14d720f9f71b6c;
                }
                C872BcfA04b3eAee1B4A93a0d775b9d7::cCe5281dDFb1F4C0D820841761F78170($b6497ba71489783c3747f19debe893a4);
                f68205ff1b65c5401a14d720f9f71b6c:
                eb99ddfa354dced074a9c8031ddc4cd2:
                eb83f12ac37b2bda467a91082b795121:
                switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
                    case "m3u8":
                        if (!F1CA094152763C79018E9F1893EF1E48::eF709337a2715D23B673e033a05bf7B7($f0d5508533eaf6452b2b014beae1cc7c, $F57960e3620515a273e03803fcd30429["pid"])) {
                            goto Ae958f89a79f9cd0dcc813595315b6ec;
                        }
                        if (empty(E2D73953A5089B9C7983838f61F23aCF::$request["segment"])) {
                            if (!($E4866fec202244d7a3c9f4e24f6ee344 = f1Ca094152763C79018e9F1893Ef1E48::de40f0DCA7C52C3162b552Be591b38eB($f0d5508533eaf6452b2b014beae1cc7c, $E1dc5da23bfc7433f190ed9488d09204, $b6497ba71489783c3747f19debe893a4))) {
                                goto Abd40ebb778537cf2d61201429f29f13;
                            }
                            header("Content-Type: application/x-mpegurl");
                            header("Content-Length: " . strlen($E4866fec202244d7a3c9f4e24f6ee344));
                            echo $E4866fec202244d7a3c9f4e24f6ee344;
                            Abd40ebb778537cf2d61201429f29f13:
                            goto F55a7f1157b4d4b138f6340da436b9f3;
                        }
                        $B8355a23f8ef2efb6685523365b371e2 = STREAMS_PATH . str_replace(array("\\", "/"), '', urldecode(e2D73953a5089b9c7983838F61f23aCF::$request["segment"]));
                        if (!file_exists($B8355a23f8ef2efb6685523365b371e2)) {
                            goto a8a849f84fbdfe6d425d0d68ba8ef28a;
                        }
                        $Caa0aa71d18b85a3c3a825a16209b1a7 = filesize($B8355a23f8ef2efb6685523365b371e2);
                        header("Content-Length: " . $Caa0aa71d18b85a3c3a825a16209b1a7);
                        header("Content-Type: video/mp2t");
                        readfile($B8355a23f8ef2efb6685523365b371e2);
                        a8a849f84fbdfe6d425d0d68ba8ef28a:
                        F55a7f1157b4d4b138f6340da436b9f3:
                        Ae958f89a79f9cd0dcc813595315b6ec:
                        goto Bf1bbaf26dde3e070495a01a12bf89a0;
                    default:
                        header("Content-Type: video/mp2t");
                        $Ae3016c45dd59a9b881c39a8dfeb6f6f = F1CA094152763C79018e9F1893eF1E48::b03404a02c45Cf202dA01928E71d3B42($f0d5508533eaf6452b2b014beae1cc7c, e2D73953A5089b9c7983838F61F23acf::$settings["client_prebuffer"]);
                        if (!empty($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                            if (is_array($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                                foreach ($Ae3016c45dd59a9b881c39a8dfeb6f6f as $B8355a23f8ef2efb6685523365b371e2) {
                                    readfile(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2);
                                }
                                preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                                $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
                                goto B94311e766780be7b283860f5e96f1d5;
                            }
                            $f8b82aac8ae421c699a4ca4dcf276fda = $Ae3016c45dd59a9b881c39a8dfeb6f6f;
                            B94311e766780be7b283860f5e96f1d5:
                            goto d3eb9f412c6f410f4a1b1a03d6505f2b;
                        }
                        if (!file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
                            $f8b82aac8ae421c699a4ca4dcf276fda = -1;
                            d3eb9f412c6f410f4a1b1a03d6505f2b:
                            $e6e1d835d746daf7d74660d362922634 = 0;
                            $C72e5ac751c165a671cc57aeb3dbc150 = e2D73953a5089B9C7983838F61F23acf::$SegmentsSettings["seg_time"] * 2;
                            b9b4eae3f1e071aee84073ea15d833c9:
                            if (!true) {
                            }
                            $F9c8a291792f79d13ff4c34f35ce49af = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 1);
                            $B28d4d57f34661a8b1773dea1b6dda68 = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 2);
                            $Df462682e370952f75b92da6e62a7293 = 0;
                            f385d2a46f48f5066cd15a0acee877a7:
                            if (!(!file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150 * 10)) {
                                if (file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af)) {
                                    if (!(empty($F57960e3620515a273e03803fcd30429["pid"]) && file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"))) {
                                        goto f899b68b86fcc6f653c83d9fbb92c262;
                                    }
                                    $F57960e3620515a273e03803fcd30429["pid"] = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                                    f899b68b86fcc6f653c83d9fbb92c262:
                                    $e6e1d835d746daf7d74660d362922634 = 0;
                                    $b4ad7225f6375fe5d757d3c7147fb034 = fopen(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af, "r");
                                    Deda5c6e5856659f433018ab0fdcc3c7:
                                    if (!($e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && !file_exists(STREAMS_PATH . $B28d4d57f34661a8b1773dea1b6dda68))) {
                                        if (F1Ca094152763c79018e9F1893eF1e48::ps_running($F57960e3620515a273e03803fcd30429["pid"], FFMPEG_PATH) && $e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && is_resource($b4ad7225f6375fe5d757d3c7147fb034)) {
                                            $fae6f311e48c420ee08489911d8efe3a = filesize(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af);
                                            $D863e93bdec7cffe0229f5278c01b0b1 = $fae6f311e48c420ee08489911d8efe3a - ftell($b4ad7225f6375fe5d757d3c7147fb034);
                                            if (!($D863e93bdec7cffe0229f5278c01b0b1 > 0)) {
                                                goto Cbba4b213040e0d47b77ab84c3306640;
                                            }
                                            echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $D863e93bdec7cffe0229f5278c01b0b1);
                                            Cbba4b213040e0d47b77ab84c3306640:
                                            Cb142bf11a1aa1f16501298f3e7bc77d:
                                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                                            $e6e1d835d746daf7d74660d362922634 = 0;
                                            $f8b82aac8ae421c699a4ca4dcf276fda++;
                                            goto b9b4eae3f1e071aee84073ea15d833c9;
                                        }
                                        die;
                                    }
                                    $Ecf4751835141bfcce480ec62720b500 = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, E2d73953a5089B9C7983838f61f23AcF::$settings["read_buffer_size"]);
                                    if (!empty($Ecf4751835141bfcce480ec62720b500)) {
                                        echo $Ecf4751835141bfcce480ec62720b500;
                                        $e6e1d835d746daf7d74660d362922634 = 0;
                                        goto Deda5c6e5856659f433018ab0fdcc3c7;
                                    }
                                    sleep(1);
                                    if (!(!is_resource($b4ad7225f6375fe5d757d3c7147fb034) || !file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af))) {
                                        ++$e6e1d835d746daf7d74660d362922634;
                                        goto Deda5c6e5856659f433018ab0fdcc3c7;
                                    }
                                    die;
                                }
                                die;
                            }
                            usleep(100000);
                            ++$Df462682e370952f75b92da6e62a7293;
                            goto f385d2a46f48f5066cd15a0acee877a7;
                        }
                        die;
                }
                Bf1bbaf26dde3e070495a01a12bf89a0:
                goto D76d034e298ecc464cab58fd7496bceb;
            }
            http_response_code(403);
            die;
        }
        http_response_code(403);
        D76d034e298ecc464cab58fd7496bceb:
        function shutdown()
        {
            global $F30ccc8fd3427f97ca35bc6ba6610d01;
            $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319DDf640F296201c75A1eF3eEb();
            fastcgi_finish_request();
        }
        // [PHPDeobfuscator] Implied script end
        return;
    }
    http_response_code(401);
    die;
}
http_response_code(401);
die;
