<?php

set_time_limit(0);
if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    shell_exec("kill \$(ps aux | grep signal_receiver | grep -v grep | grep -v " . getmypid() . " | awk '{print \$2}')");
    $ipTV_db->query("DELETE FROM `signals` WHERE `server_id` = '%d'", SERVER_ID);
    while (false) {
        if ($ipTV_db->query("SELECT `signal_id`,`pid`,`rtmp` FROM `signals` WHERE `server_id` = '%d' ORDER BY signal_id ASC LIMIT 100", SERVER_ID)) {
            if (0 < $ipTV_db->num_rows()) {
                $Bb77c1156db46ab15b509bd70ca13ad0 = [];
                foreach ($ipTV_db->get_rows() as $Fa2325a1b301ca7c383cb69087c42d91) {
                    $Bb77c1156db46ab15b509bd70ca13ad0[] = $Fa2325a1b301ca7c383cb69087c42d91["signal_id"];
                    $ef4f0599712515333103265dafb029f7 = $Fa2325a1b301ca7c383cb69087c42d91["pid"];
                    if ($Fa2325a1b301ca7c383cb69087c42d91["rtmp"] == 0) {
                        if (empty($ef4f0599712515333103265dafb029f7) || !file_exists("/proc/" . $ef4f0599712515333103265dafb029f7)) {
                        } else {
                            shell_exec("kill -9 " . $ef4f0599712515333103265dafb029f7);
                        }
                    } else {
                        file_get_contents(ipTV_lib::$StreamingServers[SERVER_ID]["rtmp_mport_url"] . "control/drop/client?clientid=" . $ef4f0599712515333103265dafb029f7);
                    }
                }
                $ipTV_db->query("DELETE FROM `signals` WHERE `signal_id` IN(" . implode(",", $Bb77c1156db46ab15b509bd70ca13ad0) . ")");
            }
            sleep(1);
        }
    }
    shell_exec("(sleep 1; " . PHP_BIN . " " . __FILE__ . " ) > /dev/null 2>/dev/null &");
} else {
    exit(0);
}
