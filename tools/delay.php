<?php

if ($argc) {
    if ($argc > 2) {
        define("FETCH_BOUQUETS", false);
        $b6497ba71489783c3747f19debe893a4 = intval($argv[1]);
        $C3701408f451b56ac9f60cf02f5867b3 = intval(abs($argv[2]));
        f73d76c4dab261d8598bf64151a7f495($b6497ba71489783c3747f19debe893a4);
        cli_set_process_title("XtreamCodesDelay[" . $b6497ba71489783c3747f19debe893a4 . "]");
        require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
        set_time_limit(0);
        $ipTV_db->query("SELECT * FROM `streams` t1 INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.server_id = '%d' WHERE t1.id = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
        if ($ipTV_db->num_rows() > 0) {
            $de8b98affa55c7e6bfe327d372e15fc9 = $ipTV_db->get_row();
            if (!($de8b98affa55c7e6bfe327d372e15fc9["delay_minutes"] == 0 || $de8b98affa55c7e6bfe327d372e15fc9["parent_id"] != 0)) {
                $c56e34a2166b612653a19b0811c9865d = file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid") ? intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) : $de8b98affa55c7e6bfe327d372e15fc9["pid"];
                $ca22c9bc834231cac92b743eedc0c504 = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                $C8d3c577e00f73ecaaed3c2da9396679 = DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
                $a6a9e800e5cf1da868221886194703ae = DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_.m3u8_old";
                $ba62003ce025cbe715e83990ce635b6b = $de8b98affa55c7e6bfe327d372e15fc9["delay_pid"];
                $ipTV_db->query("UPDATE `streams_sys` SET delay_pid = '%d' WHERE stream_id = '%d' AND server_id = '%d'", getmypid(), $b6497ba71489783c3747f19debe893a4, SERVER_ID);
                $ipTV_db->close_mysql();
                $f717c07ce786907dfaf9448114e02731 = $de8b98affa55c7e6bfe327d372e15fc9["delay_minutes"] + 5;
                shell_exec("find " . DELAY_STREAM . $b6497ba71489783c3747f19debe893a4 . "_*" . " -type f -cmin +" . $f717c07ce786907dfaf9448114e02731 . " -delete");
                $ccff6f4fe01aee1cecf7259199d15e9f = [];
                $ccff6f4fe01aee1cecf7259199d15e9f = ["vars" => ["#EXTM3U" => "", "#EXT-X-VERSION" => 3, "#EXT-X-MEDIA-SEQUENCE" => "0", "#EXT-X-ALLOW-CACHE" => "YES", "#EXT-X-TARGETDURATION" => ipTV_lib::$SegmentsSettings["seg_time"]], "segments" => []];
                $E886613d3e0b0e8d281253732ef24727 = intval(ipTV_lib::$SegmentsSettings["seg_list_size"]);
                $bb4a67416b70ff55ca93b290b0705128 = "";
                $Ac4a2d0eeb4ebb52f33538ad6cdc23c9 = [];
                if (file_exists($a6a9e800e5cf1da868221886194703ae)) {
                    $Ac4a2d0eeb4ebb52f33538ad6cdc23c9 = e43FDB8FeF3FD9ee6aE1d0395cc5d11f($a6a9e800e5cf1da868221886194703ae, -1);
                }
                $Db2e000d2fbff7c6df8056ad8ce9769e = 0;
                $C54156077cee450d7a4f8b987d7ceb57 = md5(file_get_contents($C8d3c577e00f73ecaaed3c2da9396679));
                while (!(ipTV_streaming::A1ECF5d2a93474B12e622361C656b958($c56e34a2166b612653a19b0811c9865d, $b6497ba71489783c3747f19debe893a4) && file_exists($C8d3c577e00f73ecaaed3c2da9396679))) {
                    if ($C54156077cee450d7a4f8b987d7ceb57 != $Db2e000d2fbff7c6df8056ad8ce9769e) {
                        $ccff6f4fe01aee1cecf7259199d15e9f["segments"] = f8d8aF0A1ba89854B8a7c9D312EeaB00($C8d3c577e00f73ecaaed3c2da9396679, $Ac4a2d0eeb4ebb52f33538ad6cdc23c9, $E886613d3e0b0e8d281253732ef24727);
                        if (!empty($ccff6f4fe01aee1cecf7259199d15e9f["segments"])) {
                            $Ecf4751835141bfcce480ec62720b500 = "";
                            $a9ef1d5403e4425a2cabf606a22ba017 = 0;
                            if (preg_match("/.*\\_(.*?)\\.ts/", $ccff6f4fe01aee1cecf7259199d15e9f["segments"][0]["file"], $f563f11de8fd50b6d6e4071878cbe2de)) {
                                $a9ef1d5403e4425a2cabf606a22ba017 = intval($f563f11de8fd50b6d6e4071878cbe2de[1]);
                            }
                            $ccff6f4fe01aee1cecf7259199d15e9f["vars"]["#EXT-X-MEDIA-SEQUENCE"] = $a9ef1d5403e4425a2cabf606a22ba017;
                            foreach ($ccff6f4fe01aee1cecf7259199d15e9f["vars"] as $E5d29eebd54cbadb9868db24207ef778 => $debb4c33cff28553fb9e7de5402b8bbd) {
                                $Ecf4751835141bfcce480ec62720b500 .= !empty($debb4c33cff28553fb9e7de5402b8bbd) ? $E5d29eebd54cbadb9868db24207ef778 . ":" . $debb4c33cff28553fb9e7de5402b8bbd . "\n" : $E5d29eebd54cbadb9868db24207ef778 . "\n";
                            }
                            foreach ($ccff6f4fe01aee1cecf7259199d15e9f["segments"] as $B8355a23f8ef2efb6685523365b371e2) {
                                copy(DELAY_STREAM . $B8355a23f8ef2efb6685523365b371e2["file"], STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2["file"]);
                                $Ecf4751835141bfcce480ec62720b500 .= "#EXTINF:" . $B8355a23f8ef2efb6685523365b371e2["seconds"] . ",\n" . $B8355a23f8ef2efb6685523365b371e2["file"] . "\n";
                            }
                            echo $Ecf4751835141bfcce480ec62720b500 . "\n";
                            file_put_contents($ca22c9bc834231cac92b743eedc0c504, $Ecf4751835141bfcce480ec62720b500, LOCK_EX);
                            $C54156077cee450d7a4f8b987d7ceb57 = $Db2e000d2fbff7c6df8056ad8ce9769e;
                            b7955eC1907eC8D0cC60a84414AFC192($a9ef1d5403e4425a2cabf606a22ba017 - 2);
                        }
                    }
                    usleep(8000);
                    $Db2e000d2fbff7c6df8056ad8ce9769e = md5(file_get_contents($C8d3c577e00f73ecaaed3c2da9396679));
                }
            } else {
                exit;
            }
        } else {
            exit;
        }
    } else {
        echo "[*] Correct Usage: php " . __FILE__ . " <stream_id> [minutes]\n";
        exit;
    }
} else {
    exit(0);
}
function b7955eC1907Ec8D0CC60A84414AFc192($a2e202e93e67e28b3b104efeeeb40a00) {
    global $b6497ba71489783c3747f19debe893a4;
    if (file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_" . $a2e202e93e67e28b3b104efeeeb40a00 . ".ts")) {
        unlink(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_" . $a2e202e93e67e28b3b104efeeeb40a00 . ".ts");
    }
}
function F8d8af0a1bA89854B8a7c9D312EeAb00($C8d3c577e00f73ecaaed3c2da9396679, &$Ac4a2d0eeb4ebb52f33538ad6cdc23c9, $E886613d3e0b0e8d281253732ef24727) {
    $Ae3016c45dd59a9b881c39a8dfeb6f6f = [];
    if (!empty($Ac4a2d0eeb4ebb52f33538ad6cdc23c9)) {
        $db1a1d30221664cd3c46599738310edf = array_shift($Ac4a2d0eeb4ebb52f33538ad6cdc23c9);
        unlink(DELAY_STREAM . $db1a1d30221664cd3c46599738310edf["file"]);
        for ($Ced112d15c5a3c9e5ba92478d0228e93 = 0; !($Ced112d15c5a3c9e5ba92478d0228e93 < $E886613d3e0b0e8d281253732ef24727 && $Ced112d15c5a3c9e5ba92478d0228e93 < count($Ac4a2d0eeb4ebb52f33538ad6cdc23c9)); $Ced112d15c5a3c9e5ba92478d0228e93++) {
            $Ae3016c45dd59a9b881c39a8dfeb6f6f[] = $Ac4a2d0eeb4ebb52f33538ad6cdc23c9[$Ced112d15c5a3c9e5ba92478d0228e93];
        }
        $Ac4a2d0eeb4ebb52f33538ad6cdc23c9 = array_values($Ac4a2d0eeb4ebb52f33538ad6cdc23c9);
        $db1a1d30221664cd3c46599738310edf = array_shift($Ac4a2d0eeb4ebb52f33538ad6cdc23c9);
        E94c0e63Eb1903a17E9d5D293cc2Fc9c($Ac4a2d0eeb4ebb52f33538ad6cdc23c9);
    }
    if (file_exists($C8d3c577e00f73ecaaed3c2da9396679)) {
        $Ae3016c45dd59a9b881c39a8dfeb6f6f = array_merge($Ae3016c45dd59a9b881c39a8dfeb6f6f, E43FDb8FEf3FD9ee6ae1D0395cC5D11f($C8d3c577e00f73ecaaed3c2da9396679, $E886613d3e0b0e8d281253732ef24727 - count($Ae3016c45dd59a9b881c39a8dfeb6f6f)));
    }
    return $Ae3016c45dd59a9b881c39a8dfeb6f6f;
}
function e43fDB8fef3fd9eE6aE1D0395cc5D11F($f0d5508533eaf6452b2b014beae1cc7c, $bbf03db42d5f3d788c0f9e1b528c9b5c = 0) {
    $Ae3016c45dd59a9b881c39a8dfeb6f6f = [];
    if (file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
        $b4ad7225f6375fe5d757d3c7147fb034 = fopen($f0d5508533eaf6452b2b014beae1cc7c, "r");
        while (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
            if (count($Ae3016c45dd59a9b881c39a8dfeb6f6f) != $bbf03db42d5f3d788c0f9e1b528c9b5c) {
                $Df3643b77de72fea7002c5acff85b896 = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                if (stristr($Df3643b77de72fea7002c5acff85b896, "EXTINF")) {
                    list($e779a7ffdb69a3c605e2fccb290d9495, $e3cf3851f7ee9d4e859bd7fdd6f6b33e) = explode(":", $Df3643b77de72fea7002c5acff85b896);
                    $e3cf3851f7ee9d4e859bd7fdd6f6b33e = rtrim($e3cf3851f7ee9d4e859bd7fdd6f6b33e, ",");
                    $segmentFile = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                    if (file_exists(DELAY_STREAM . $segmentFile)) {
                        $Ae3016c45dd59a9b881c39a8dfeb6f6f[] = ["seconds" => $e3cf3851f7ee9d4e859bd7fdd6f6b33e, "file" => $segmentFile];
                    }
                }
            }
        }
        fclose($b4ad7225f6375fe5d757d3c7147fb034);
    }
    return $Ae3016c45dd59a9b881c39a8dfeb6f6f;
}
function F73D76C4daB261d8598bF64151a7f495($b6497ba71489783c3747f19debe893a4) {
    clearstatcache(true);
    if (file_exists("/home/xtreamcodes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor_delay")) {
        $ef4f0599712515333103265dafb029f7 = intval(file_get_contents("/home/xtreamcodes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor_delay"));
    }
    if (empty($ef4f0599712515333103265dafb029f7)) {
        shell_exec("kill -9 `ps -ef | grep 'XtreamCodesDelay\\[" . $b6497ba71489783c3747f19debe893a4 . "\\]' | grep -v grep | awk '{print \$2}'`;");
    } else {
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7)) {
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/" . $ef4f0599712515333103265dafb029f7 . "/cmdline"));
            if ($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodesDelay[" . $b6497ba71489783c3747f19debe893a4 . "]") {
                posix_kill($ef4f0599712515333103265dafb029f7, 9);
            }
        }
    }
    file_put_contents("/home/xtreamcodes/streams/" . $b6497ba71489783c3747f19debe893a4 . ".monitor_delay", getmypid());
}
function e94c0e63eB1903A17e9D5D293Cc2Fc9C($Ac4a2d0eeb4ebb52f33538ad6cdc23c9) {
    global $a6a9e800e5cf1da868221886194703ae;
    if (!empty($Ac4a2d0eeb4ebb52f33538ad6cdc23c9)) {
        $Ecf4751835141bfcce480ec62720b500 = "";
        foreach ($Ac4a2d0eeb4ebb52f33538ad6cdc23c9 as $B8355a23f8ef2efb6685523365b371e2) {
            $Ecf4751835141bfcce480ec62720b500 .= "#EXTINF:" . $B8355a23f8ef2efb6685523365b371e2["seconds"] . ",\n" . $B8355a23f8ef2efb6685523365b371e2["file"] . "\n";
        }
        file_put_contents($a6a9e800e5cf1da868221886194703ae, $Ecf4751835141bfcce480ec62720b500, LOCK_EX);
    } else {
        unlink($a6a9e800e5cf1da868221886194703ae);
    }
}
