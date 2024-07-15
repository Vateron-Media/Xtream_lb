<?php

if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    cli_set_process_title("XtreamCodes[Live Checker]");
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(cf78a30169E3F4A75226712bf3f1A141() . __FILE__);
    Efc0AEB4B245B992b0F2a749DAC55820($D3b211a38e2eb607ab17f4f6770932e5);
    $b40a34c6a727bba894f407ea41eb237a = [];
    $ipTV_db->query("SELECT\n                          t2.stream_display_name,\n                          t1.stream_id,\n                          t1.monitor_pid,\n                          t1.on_demand,\n                          t1.server_stream_id,\n                          t1.pid,\n                          clients.online_clients\n                        FROM\n                          `streams_sys` t1\n                        INNER JOIN `streams` t2 ON t2.id = t1.stream_id AND t2.direct_source = 0\n                        INNER JOIN `streams_types` t3 ON t3.type_id = t2.type\n                        LEFT JOIN\n                          (\n                          SELECT\n                            stream_id,\n                            COUNT(*) as online_clients\n                          FROM\n                            `user_activity_now`\n                          WHERE `server_id` = '%d'\n                          GROUP BY\n                            stream_id\n                        ) AS clients\n                        ON\n                          clients.stream_id = t1.stream_id\n                        WHERE\n                          (\n                            t1.pid IS NOT NULL OR t1.stream_status <> 0 OR t1.to_analyze = 1\n                          ) AND t1.server_id = '%d' AND t3.live = 1", SERVER_ID, SERVER_ID);
    if (0 < $ipTV_db->num_rows()) {
        $Ecab3ed662352e7c91c6e045c57fac60 = $ipTV_db->get_rows();
        foreach ($Ecab3ed662352e7c91c6e045c57fac60 as $efa7cefd12388102b27fdeb2f9f68219) {
            $b40a34c6a727bba894f407ea41eb237a[] = $efa7cefd12388102b27fdeb2f9f68219["stream_id"];
            if (ipTV_streaming::D835C2A9787BA794e7590e06621cfa6B($efa7cefd12388102b27fdeb2f9f68219["monitor_pid"], $efa7cefd12388102b27fdeb2f9f68219["stream_id"])) {
                if (!($efa7cefd12388102b27fdeb2f9f68219["on_demand"] == 1 && $efa7cefd12388102b27fdeb2f9f68219["online_clients"] == 0)) {
                    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.m3u8";
                    if (!(ipTV_streaming::A1ECF5D2A93474B12E622361c656B958($efa7cefd12388102b27fdeb2f9f68219["pid"], $efa7cefd12388102b27fdeb2f9f68219["stream_id"]) && file_exists($f0d5508533eaf6452b2b014beae1cc7c))) {
                    } else {
                        $E3e8a009e88a10ef5bdfcd4630af0f9f = ipTV_streaming::db998aCd76Fcd118b6cDB4E9eDA68580("live", STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.m3u8");
                        $Cf06357624313b73c0a6453ccb618bef = file_exists(STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.progress") ? json_decode(file_get_contents(STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.progress"), true) : [];
                        if (file_exists(STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.pid")) {
                            $ef4f0599712515333103265dafb029f7 = intval(file_get_contents(STREAMS_PATH . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.pid"));
                        } else {
                            $ef4f0599712515333103265dafb029f7 = intval(shell_exec("ps aux | grep -v grep | grep '/" . $efa7cefd12388102b27fdeb2f9f68219["stream_id"] . "_.m3u8' | awk '{print \$2}'"));
                        }
                        if ($efa7cefd12388102b27fdeb2f9f68219["pid"] != $ef4f0599712515333103265dafb029f7) {
                            $ipTV_db->query("UPDATE `streams_sys` SET `pid` = '%d',`progress_info` = '%s',`bitrate` = '%d' WHERE `server_stream_id` = '%d'", $ef4f0599712515333103265dafb029f7, json_encode($Cf06357624313b73c0a6453ccb618bef), $E3e8a009e88a10ef5bdfcd4630af0f9f, $efa7cefd12388102b27fdeb2f9f68219["server_stream_id"]);
                        } else {
                            $ipTV_db->query("UPDATE `streams_sys` SET `progress_info` = '%s',`bitrate` = '%d' WHERE `server_stream_id` = '%d'", json_encode($Cf06357624313b73c0a6453ccb618bef), $E3e8a009e88a10ef5bdfcd4630af0f9f, $efa7cefd12388102b27fdeb2f9f68219["server_stream_id"]);
                        }
                    }
                } else {
                    ipTV_stream::C6AF00e22ded8567809f9a063Dc97624($efa7cefd12388102b27fdeb2f9f68219["stream_id"], true);
                }
            } else {
                ipTV_stream::cCE5281ddFb1f4C0D820841761F78170($efa7cefd12388102b27fdeb2f9f68219["stream_id"]);
                usleep(50000);
            }
        }
    }
    $ea32ba0f85fe74722f862c56957aec0f = shell_exec("ps aux | grep XtreamCodes");
    if (preg_match_all("/XtreamCodes\\[(.*)\\]/", $ea32ba0f85fe74722f862c56957aec0f, $f563f11de8fd50b6d6e4071878cbe2de)) {
        $E7673ebc6521c6950cab99750195bc80 = array_diff($f563f11de8fd50b6d6e4071878cbe2de[1], $b40a34c6a727bba894f407ea41eb237a);
        foreach ($E7673ebc6521c6950cab99750195bc80 as $b6497ba71489783c3747f19debe893a4) {
            if (is_numeric($b6497ba71489783c3747f19debe893a4)) {
                shell_exec("kill -9 `ps -ef | grep '/" . $b6497ba71489783c3747f19debe893a4 . "_.m3u8\\|XtreamCodes\\[" . $b6497ba71489783c3747f19debe893a4 . "\\]' | grep -v grep | awk '{print \$2}'`;");
                shell_exec("rm -f " . STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_*");
            }
        }
    }
    @unlink($D3b211a38e2eb607ab17f4f6770932e5);
} else {
    exit(0);
}
