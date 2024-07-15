<?php

if ($argc) {
    if ($argc > 1) {
        define("FETCH_BOUQUETS", false);
        $b6497ba71489783c3747f19debe893a4 = intval($argv[1]);
        $Ade893e71b29c7f38c8da56a5a578210 = empty($argv[2]) ? false : true;
        f73d76c4dab261d8598bf64151a7f495($b6497ba71489783c3747f19debe893a4);
        cli_set_process_title("XtreamCodes[" . $b6497ba71489783c3747f19debe893a4 . "]");
        require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
        set_time_limit(0);
        $ipTV_db->query("SELECT * FROM `streams` t1 INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.server_id = '%d' WHERE t1.id = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
        if ($ipTV_db->num_rows() > 0) {
            $de8b98affa55c7e6bfe327d372e15fc9 = $ipTV_db->get_row();
            $ipTV_db->query("UPDATE `streams_sys` SET `monitor_pid` = '%d' WHERE `server_stream_id` = '%d'", getmypid(), $de8b98affa55c7e6bfe327d372e15fc9["server_stream_id"]);
            $c56e34a2166b612653a19b0811c9865d = file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid") ? intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) : $de8b98affa55c7e6bfe327d372e15fc9["pid"];
            $e9b00e29dc8b3f8a1ff0276f94e34917 = json_decode($de8b98affa55c7e6bfe327d372e15fc9["auto_restart"], true);
            $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
            $ba62003ce025cbe715e83990ce635b6b = $de8b98affa55c7e6bfe327d372e15fc9["delay_pid"];
            $E6996f02446d721d2dd73111c24ce67a = $de8b98affa55c7e6bfe327d372e15fc9["parent_id"];
            $Dcd9edd2f7792b5df43a34b76f090ac4 = [];
            if ($E6996f02446d721d2dd73111c24ce67a == 0) {
                $Dcd9edd2f7792b5df43a34b76f090ac4 = json_decode($de8b98affa55c7e6bfe327d372e15fc9["stream_source"], true);
            }
            $F58961366af8dce9f886583c15d9d374 = $de8b98affa55c7e6bfe327d372e15fc9["current_source"];
            $F0f64b90d30f873badd83d4c9c76848b = NULL;
            $ipTV_db->query("SELECT t1.*, t2.* FROM `streams_options` t1, `streams_arguments` t2 WHERE t1.stream_id = '%d' AND t1.argument_id = t2.id", $b6497ba71489783c3747f19debe893a4);
            $Ac5372e43132587fad426d83ee2caccf = $ipTV_db->get_rows();
            if (0 < $de8b98affa55c7e6bfe327d372e15fc9["delay_minutes"] && $de8b98affa55c7e6bfe327d372e15fc9["parent_id"] == 0) {
                $Ef40f59b21839941b898f2dd4979f03d = DELAY_STREAM;
                $f0d5508533eaf6452b2b014beae1cc7c = DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                $Bd84a7e6e5c66ffae15ce0fa507a2cc7 = true;
            } else {
                $Bd84a7e6e5c66ffae15ce0fa507a2cc7 = false;
                $Ef40f59b21839941b898f2dd4979f03d = STREAMS_PATH;
            }
            $e1ca82fdb2a31f8e43b341dccf24b7e3 = 0;
            if (!ipTV_streaming::A1ecf5D2A93474b12E622361C656B958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4)) {
                while (false) {
                }
            } else {
                if ($Ade893e71b29c7f38c8da56a5a578210) {
                    $e1ca82fdb2a31f8e43b341dccf24b7e3 = RESTART_TAKE_CACHE + 1;
                    shell_exec("kill -9 " . $c56e34a2166b612653a19b0811c9865d);
                    shell_exec("rm -f " . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_*");
                    if ($Bd84a7e6e5c66ffae15ce0fa507a2cc7 && ipTV_streaming::A5C11cff1b8D4762a64b3B7Cf8862F98($ba62003ce025cbe715e83990ce635b6b, $b6497ba71489783c3747f19debe893a4)) {
                        shell_exec("kill -9 " . $ba62003ce025cbe715e83990ce635b6b);
                    }
                    usleep(50000);
                    $ba62003ce025cbe715e83990ce635b6b = $c56e34a2166b612653a19b0811c9865d = 0;
                }
            }
            if (0 < $c56e34a2166b612653a19b0811c9865d) {
                $ipTV_db->close_mysql();
                $Cc9b51b82848c26737b4564ddf4926ad = $E13f8ad7f294b3d53a97f3b3fcaeed0d = $d9089d6c4a05167df0eb1a67a995b57f = time();
                $df1e2f0fa7893d3c9d06a406ec24a8a8 = md5_file($f0d5508533eaf6452b2b014beae1cc7c);
                while (!(ipTV_streaming::a1ecf5d2A93474B12e622361C656b958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4) && file_exists($f0d5508533eaf6452b2b014beae1cc7c))) {
                    if (!(empty($e9b00e29dc8b3f8a1ff0276f94e34917["days"]) || empty($e9b00e29dc8b3f8a1ff0276f94e34917["at"]))) {
                        list($e041641fb341837f896123fc736fa1b5, $C3701408f451b56ac9f60cf02f5867b3) = explode(":", $e9b00e29dc8b3f8a1ff0276f94e34917["at"]);
                        if (in_array(date("l"), $e9b00e29dc8b3f8a1ff0276f94e34917["days"]) && date("H") == $e041641fb341837f896123fc736fa1b5) {
                            if ($C3701408f451b56ac9f60cf02f5867b3 != date("i")) {
                            }
                        }
                    }
                    if (ipTV_lib::$settings["audio_restart_loss"] == 1 && 300 < time() - $Cc9b51b82848c26737b4564ddf4926ad) {
                        list($B8355a23f8ef2efb6685523365b371e2) = ipTV_streaming::b03404A02C45Cf202dA01928E71D3b42($f0d5508533eaf6452b2b014beae1cc7c, 10);
                        if (!empty($B8355a23f8ef2efb6685523365b371e2)) {
                            $dad2a08e78759b893753ecedbaeabe83 = ipTV_stream::c40Ab46F24644F0dcfad4B6d617c2734($Ef40f59b21839941b898f2dd4979f03d . $B8355a23f8ef2efb6685523365b371e2, SERVER_ID);
                            if (isset($dad2a08e78759b893753ecedbaeabe83["codecs"]["audio"]) && !empty($dad2a08e78759b893753ecedbaeabe83["codecs"]["audio"])) {
                                $Cc9b51b82848c26737b4564ddf4926ad = time();
                            }
                        }
                    }
                    if (ipTV_lib::$SegmentsSettings["seg_time"] * 6 <= time() - $E13f8ad7f294b3d53a97f3b3fcaeed0d) {
                        $E13168098604fb6634418f8c9321baef = md5_file($f0d5508533eaf6452b2b014beae1cc7c);
                        if ($df1e2f0fa7893d3c9d06a406ec24a8a8 != $E13168098604fb6634418f8c9321baef) {
                            $df1e2f0fa7893d3c9d06a406ec24a8a8 = $E13168098604fb6634418f8c9321baef;
                            $E13f8ad7f294b3d53a97f3b3fcaeed0d = time();
                        }
                    }
                    if (ipTV_lib::$settings["priority_backup"] == 1 && 1 < count($Dcd9edd2f7792b5df43a34b76f090ac4) && $E6996f02446d721d2dd73111c24ce67a == 0 && 10 < time() - $d9089d6c4a05167df0eb1a67a995b57f) {
                        $d9089d6c4a05167df0eb1a67a995b57f = time();
                        $E5d29eebd54cbadb9868db24207ef778 = array_search($F58961366af8dce9f886583c15d9d374, $Dcd9edd2f7792b5df43a34b76f090ac4);
                        if (0 < $E5d29eebd54cbadb9868db24207ef778) {
                            foreach ($Dcd9edd2f7792b5df43a34b76f090ac4 as $E4866fec202244d7a3c9f4e24f6ee344) {
                                $bae5056cfcbf9b293f6f8218c859de80 = ipTV_stream::ParseStreamURL($E4866fec202244d7a3c9f4e24f6ee344);
                                if ($bae5056cfcbf9b293f6f8218c859de80 != $F58961366af8dce9f886583c15d9d374) {
                                    $fd777ea6aad636f6a095e656372f239b = strtolower(substr($bae5056cfcbf9b293f6f8218c859de80, 0, strpos($bae5056cfcbf9b293f6f8218c859de80, "://")));
                                    $D4249ceeeadd6a4b760b6c79e2a4f57e = implode(" ", ipTV_stream::b53da0f20eC82CF4Ec576504051230aB($Ac5372e43132587fad426d83ee2caccf, $fd777ea6aad636f6a095e656372f239b, "fetch"));
                                    if (!($a58a92e1c21a65066c6ca36591929d95 = ipTV_stream::C40Ab46f24644f0DCFad4b6d617C2734($bae5056cfcbf9b293f6f8218c859de80, SERVER_ID, $D4249ceeeadd6a4b760b6c79e2a4f57e))) {
                                    } else {
                                        $F0f64b90d30f873badd83d4c9c76848b = $bae5056cfcbf9b293f6f8218c859de80;
                                    }
                                }
                            }
                        }
                    }
                    if ($Bd84a7e6e5c66ffae15ce0fa507a2cc7 && $de8b98affa55c7e6bfe327d372e15fc9["delay_available_at"] <= time() && !ipTV_streaming::a5C11cFF1B8D4762a64b3B7CF8862F98($ba62003ce025cbe715e83990ce635b6b, $b6497ba71489783c3747f19debe893a4)) {
                        $ba62003ce025cbe715e83990ce635b6b = intval(shell_exec(PHP_BIN . " " . TOOLS_PATH . "delay.php " . $b6497ba71489783c3747f19debe893a4 . " " . $de8b98affa55c7e6bfe327d372e15fc9["delay_minutes"] . " >/dev/null 2>/dev/null & echo \$!"));
                    }
                    sleep(1);
                }
                $ipTV_db->db_connect();
            }
            if (ipTV_streaming::A1eCF5d2A93474b12E622361C656B958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4)) {
                shell_exec("kill -9 " . $c56e34a2166b612653a19b0811c9865d);
                usleep(50000);
            }
            if (!ipTV_streaming::A5c11Cff1b8d4762a64b3b7Cf8862F98($ba62003ce025cbe715e83990ce635b6b, $b6497ba71489783c3747f19debe893a4)) {
                while (ipTV_streaming::A1eCF5d2a93474b12e622361C656b958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4)) {
                }
            } else {
                shell_exec("kill -9 " . $ba62003ce025cbe715e83990ce635b6b);
                usleep(50000);
            }
            echo "Restarting...\n";
            shell_exec("rm -f " . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_*");
            $Ecf4751835141bfcce480ec62720b500 = ipTV_stream::Cc6CB4C7F753D55447A62C6C80F4839A($b6497ba71489783c3747f19debe893a4, $e1ca82fdb2a31f8e43b341dccf24b7e3, $F0f64b90d30f873badd83d4c9c76848b);
            if ($Ecf4751835141bfcce480ec62720b500 !== false) {
                if (!(is_numeric($Ecf4751835141bfcce480ec62720b500) && $Ecf4751835141bfcce480ec62720b500 == 0)) {
                    sleep(mt_rand(5, 10));
                    $c56e34a2166b612653a19b0811c9865d = $Ecf4751835141bfcce480ec62720b500["main_pid"];
                    $f0d5508533eaf6452b2b014beae1cc7c = $Ecf4751835141bfcce480ec62720b500["playlist"];
                    $Bd84a7e6e5c66ffae15ce0fa507a2cc7 = $Ecf4751835141bfcce480ec62720b500["delay_enabled"];
                    $de8b98affa55c7e6bfe327d372e15fc9["delay_available_at"] = $Ecf4751835141bfcce480ec62720b500["delay_start_at"];
                    $F58961366af8dce9f886583c15d9d374 = $Ecf4751835141bfcce480ec62720b500["stream_source"];
                    $E6996f02446d721d2dd73111c24ce67a = $Ecf4751835141bfcce480ec62720b500["parent_id"];
                    $F0f64b90d30f873badd83d4c9c76848b = NULL;
                    if ($Bd84a7e6e5c66ffae15ce0fa507a2cc7) {
                        $Ef40f59b21839941b898f2dd4979f03d = DELAY_STREAM;
                    } else {
                        $Ef40f59b21839941b898f2dd4979f03d = STREAMS_PATH;
                    }
                    for ($Df462682e370952f75b92da6e62a7293 = 0; !(ipTV_streaming::a1eCf5D2a93474B12E622361c656b958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4) && !file_exists($f0d5508533eaf6452b2b014beae1cc7c) && $Df462682e370952f75b92da6e62a7293 <= ipTV_lib::$SegmentsSettings["seg_time"] * 3); $Df462682e370952f75b92da6e62a7293++) {
                        echo "Checking For PlayList...\n";
                        sleep(1);
                    }
                    if ($Df462682e370952f75b92da6e62a7293 == ipTV_lib::$SegmentsSettings["seg_time"] * 3) {
                        shell_exec("kill -9 " . $c56e34a2166b612653a19b0811c9865d);
                        usleep(50000);
                    }
                    if (RESTART_TAKE_CACHE < $e1ca82fdb2a31f8e43b341dccf24b7e3) {
                        $e1ca82fdb2a31f8e43b341dccf24b7e3 = 0;
                    }
                } else {
                    sleep(mt_rand(10, 25));
                }
            } else {
                exit;
            }
        } else {
            ipTV_stream::c6AF00e22Ded8567809f9A063DC97624($b6497ba71489783c3747f19debe893a4);
            exit;
        }
    } else {
        echo "[*] Correct Usage: php " . __FILE__ . " <stream_id> [restart]\n";
        exit;
    }
} else {
    exit(0);
}
function F73D76C4dAB261d8598bf64151A7f495($b6497ba71489783c3747f19debe893a4) {
    clearstatcache(true);
    if (file_exists("/home/xtreamcodes/iptv_xtream_codes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor")) {
        $ef4f0599712515333103265dafb029f7 = intval(file_get_contents("/home/xtreamcodes/iptv_xtream_codes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor"));
    }
    if (empty($ef4f0599712515333103265dafb029f7)) {
        shell_exec("kill -9 `ps -ef | grep 'XtreamCodes\\[" . $b6497ba71489783c3747f19debe893a4 . "\\]' | grep -v grep | awk '{print \$2}'`;");
    } else {
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7)) {
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/" . $ef4f0599712515333103265dafb029f7 . "/cmdline"));
            if ($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodes[" . $b6497ba71489783c3747f19debe893a4 . "]") {
                posix_kill($ef4f0599712515333103265dafb029f7, 9);
            }
        }
    }
    file_put_contents("/home/xtreamcodes/iptv_xtream_codes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor", getmypid());
}
