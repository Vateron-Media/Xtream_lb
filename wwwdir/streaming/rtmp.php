<?php

if (!($_SERVER["REMOTE_ADDR"] != "127.0.0.1")) {
    set_time_limit(0);
    require "../init.php";
    if (!(e2d73953A5089b9C7983838F61f23AcF::$request["call"] == "publish")) {
        e6a587d5ec476dcd5331c910ddc73736:
        if (!(E2D73953A5089b9C7983838F61F23AcF::$request["call"] == "play_done")) {
            if (!(empty(e2D73953A5089b9C7983838f61f23acF::$request["username"]) && empty(e2d73953A5089B9c7983838F61F23acf::$request["password"]) && in_array(e2D73953A5089B9C7983838f61f23aCf::$request["addr"], F1CA094152763C79018e9f1893eF1e48::e83C60ae0B93a4Aae6A66a6F64fCa8B6()))) {
                if (!(!isset(E2d73953a5089B9c7983838F61F23ACf::$request["username"]) || !isset(e2D73953A5089b9C7983838F61f23AcF::$request["password"]) || !isset(E2d73953a5089b9c7983838f61F23aCf::$request["tcurl"]) || !isset(E2D73953A5089b9c7983838f61F23Acf::$request["app"]))) {
                    $b6497ba71489783c3747f19debe893a4 = intval(e2D73953A5089B9C7983838F61f23AcF::$request["name"]);
                    $b7eaa095f27405cf78a432ce6504dae0 = e2d73953A5089b9c7983838f61f23ACf::$request["addr"];
                    $Fdc134ea90d233be850c53c1266026d6 = E2D73953A5089B9C7983838f61f23acf::$request["username"];
                    $E1dc5da23bfc7433f190ed9488d09204 = E2D73953a5089B9C7983838F61f23acF::$request["password"];
                    $b2cbe4de82c7504e1d8d46c57a6264fa = "rtmp";
                    $e8bde7e627ad9d9d70c6010cc669eb60 = '';
                    if (!($fbf1d0a58fcc040ff00728a277a5f306 = F1Ca094152763c79018E9F1893eF1e48::d909b0d1a6fFfdCDB838046FAC418b04(null, $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204, true, true, false, true))) {
                        goto fb878c8d9a8da665fab57b445fd02c44;
                    }
                    if (!(!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && time() >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"])) {
                        if (!($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0)) {
                            if (!($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0)) {
                                $A357e4da7e159844550464e414faeb73 = new FFcaBA9D38408d4853b09fed9b2f7571(GEOIP2_FILENAME);
                                $a915d7b641af262a730cfcf433966ebd = $A357e4da7e159844550464e414faeb73->F0c9b48f97cF10F24Da4E7be863374Af($b7eaa095f27405cf78a432ce6504dae0)["registered_country"]["iso_code"];
                                $A357e4da7e159844550464e414faeb73->close();
                                if (!(!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"])))) {
                                    if (empty($a915d7b641af262a730cfcf433966ebd)) {
                                        goto B6516f412c7d12bbf987a836f80fe884;
                                    }
                                    $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
                                    if (!($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"])) {
                                        if (!(!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", E2d73953A5089b9C7983838F61F23acF::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, E2d73953a5089b9c7983838F61f23acF::$settings["allow_countries"]))) {
                                            B6516f412c7d12bbf987a836f80fe884:
                                            if (array_key_exists($b2cbe4de82c7504e1d8d46c57a6264fa, $fbf1d0a58fcc040ff00728a277a5f306["output_formats"])) {
                                                if (in_array($b6497ba71489783c3747f19debe893a4, $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
                                                    if (!($fbf1d0a58fcc040ff00728a277a5f306["max_connections"] != 0)) {
                                                        goto b61ea884cc4485fa6f092919312d0826;
                                                    }
                                                    if (empty($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"])) {
                                                        goto Ea2f116e93cc1aedf47fab646a26a8a4;
                                                    }
                                                    if (!($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"] != 0)) {
                                                        goto Cb4e5263e11a95a4b72fc99fd9a5ed00;
                                                    }
                                                    if (!($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["active_cons"] >= $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"])) {
                                                        goto f5909e098fb2d83c27ba3cf8b4aafbe2;
                                                    }
                                                    f1ca094152763c79018E9f1893ef1E48::FD9bCEaaE00258Ec95e5Ad4d91456864(true, $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
                                                    f5909e098fb2d83c27ba3cf8b4aafbe2:
                                                    Cb4e5263e11a95a4b72fc99fd9a5ed00:
                                                    Ea2f116e93cc1aedf47fab646a26a8a4:
                                                    if (!($fbf1d0a58fcc040ff00728a277a5f306["active_cons"] >= $fbf1d0a58fcc040ff00728a277a5f306["max_connections"])) {
                                                        goto A25bc1396e441423c093dcaeced0ff07;
                                                    }
                                                    if (!f1ca094152763c79018E9f1893Ef1e48::fD9bceaae00258eC95e5Ad4d91456864(true, $fbf1d0a58fcc040ff00728a277a5f306["id"])) {
                                                        goto C377a7c6827aee893aa5130923bc0b36;
                                                    }
                                                    $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] -= 1;
                                                    C377a7c6827aee893aa5130923bc0b36:
                                                    A25bc1396e441423c093dcaeced0ff07:
                                                    b61ea884cc4485fa6f092919312d0826:
                                                    $edb14c7cf85a4e59ae887506c408a3df = f1ca094152763C79018E9f1893Ef1E48::f9edf299be4280cC9900D81d8355fd29($b6497ba71489783c3747f19debe893a4, SERVER_ID);
                                                    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                                                    if (!(!F1CA094152763C79018E9F1893eF1e48::ps_running($edb14c7cf85a4e59ae887506c408a3df["server"]["pid"], FFMPEG_PATH) && $edb14c7cf85a4e59ae887506c408a3df["info"]["on_demand"] == 1)) {
                                                        goto a819e7879875e00953bab92a1153b657;
                                                    }
                                                    C872BcFa04b3eAEe1b4a93a0d775b9d7::ccE5281DdFb1F4c0d820841761f78170($b6497ba71489783c3747f19debe893a4);
                                                    sleep(5);
                                                    a819e7879875e00953bab92a1153b657:
                                                    if (!($fbf1d0a58fcc040ff00728a277a5f306["max_connections"] == 0 || $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] < $fbf1d0a58fcc040ff00728a277a5f306["max_connections"])) {
                                                        fb878c8d9a8da665fab57b445fd02c44:
                                                        http_response_code(404);
                                                        // [PHPDeobfuscator] Implied script end
                                                        return;
                                                    }
                                                    $F30ccc8fd3427f97ca35bc6ba6610d01->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s')", $fbf1d0a58fcc040ff00728a277a5f306["id"], $b6497ba71489783c3747f19debe893a4, SERVER_ID, '', $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, e2d73953a5089B9c7983838F61f23AcF::$request["clientid"], time(), $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60);
                                                    $b93df8c85c6b9c6b3e155555619bbe8e = $F30ccc8fd3427f97ca35bc6ba6610d01->c02fB3004cEC2DE0bc39F4ed412479B1();
                                                    $F30ccc8fd3427f97ca35bc6ba6610d01->a9C27319DdF640F296201c75A1Ef3eEB();
                                                    http_response_code(200);
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
                http_response_code(404);
                die("Missing parameters.");
            }
            http_response_code(200);
            die;
        }
        F1CA094152763c79018E9f1893Ef1e48::ce9736cB36FC32a1E05ec062E4e88475(E2d73953a5089b9c7983838f61f23acF::$request["clientid"]);
        http_response_code(200);
        die;
    }
    if (!in_array(E2d73953A5089B9c7983838F61F23acF::$request["addr"], F1ca094152763C79018e9f1893EF1e48::CdB7Ed3E4910a38DaaB7bDedc40d824F())) {
        http_response_code(404);
        die;
    }
    http_response_code(200);
    die;
}
die;
