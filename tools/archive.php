<?php

if ($argc) {
    if ($argc == 2) {
        define("FETCH_BOUQUETS", false);
        $b6497ba71489783c3747f19debe893a4 = intval($argv[1]);
        require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
        cli_set_process_title("TVArchive[" . $b6497ba71489783c3747f19debe893a4 . "]");
        if (!file_exists(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4)) {
            mkdir(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4);
        }
        $ipTV_db->query("SELECT * \n                        FROM `streams` t1\n                        INNER JOIN `streams_sys` t2 ON t1.id = t2.stream_id AND t2.server_id = t1.tv_archive_server_id\n                        WHERE t1.`id` = '%d' AND t1.`tv_archive_server_id` = '%d' AND t1.`tv_archive_duration` > 0", $b6497ba71489783c3747f19debe893a4, SERVER_ID);
        if (0 >= $ipTV_db->num_rows()) {
        } else {
            $Fa2325a1b301ca7c383cb69087c42d91 = $ipTV_db->get_row();
            if (ipTV_streaming::ps_running($Fa2325a1b301ca7c383cb69087c42d91["tv_archive_pid"], PHP_BIN)) {
                posix_kill($Fa2325a1b301ca7c383cb69087c42d91["tv_archive_pid"], 9);
            }
            if (empty($Fa2325a1b301ca7c383cb69087c42d91["pid"])) {
                posix_kill(getmypid(), 9);
            }
            $ipTV_db->query("UPDATE `streams` SET `tv_archive_pid` = '%d' WHERE `id` = '%d'", getmypid(), $b6497ba71489783c3747f19debe893a4);
            $a34b78cc7cc05320e0f45ad4d6c6a5d4 = time();
            $ipTV_db->close_mysql();
            e44119e4141aC9f9E992529BbcC774dc($b6497ba71489783c3747f19debe893a4, $Fa2325a1b301ca7c383cb69087c42d91["tv_archive_duration"]);
            $D6a71195224cc05eb6e1a5510557e3c6 = date("Y-m-d:H-i");
            $b4ad7225f6375fe5d757d3c7147fb034 = @fopen("http://127.0.0.1:" . ipTV_lib::$StreamingServers[SERVER_ID]["http_broadcast_port"] . "/streaming/admin_live.php?password=" . ipTV_lib::$settings["live_streaming_pass"] . "&stream=" . $b6497ba71489783c3747f19debe893a4 . "&extension=ts", "r");
            if ($b4ad7225f6375fe5d757d3c7147fb034) {
                $c89b606d5f2c329aec44c2bab38d65a1 = fopen(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/" . $D6a71195224cc05eb6e1a5510557e3c6 . ".ts", "a");
                while (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
                    if (3600 <= time() - $a34b78cc7cc05320e0f45ad4d6c6a5d4) {
                        E44119E4141ac9F9E992529BbCc774dc($b6497ba71489783c3747f19debe893a4, $Fa2325a1b301ca7c383cb69087c42d91["tv_archive_duration"]);
                        $a34b78cc7cc05320e0f45ad4d6c6a5d4 = time();
                    }
                    if (date("Y-m-d:H-i") != $D6a71195224cc05eb6e1a5510557e3c6) {
                        fclose($c89b606d5f2c329aec44c2bab38d65a1);
                        $D6a71195224cc05eb6e1a5510557e3c6 = date("Y-m-d:H-i");
                        $c89b606d5f2c329aec44c2bab38d65a1 = fopen(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/" . $D6a71195224cc05eb6e1a5510557e3c6 . ".ts", "a");
                    }
                    fwrite($c89b606d5f2c329aec44c2bab38d65a1, stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, 4096));
                    fflush($c89b606d5f2c329aec44c2bab38d65a1);
                }
                fclose($b4ad7225f6375fe5d757d3c7147fb034);
            }
            shell_exec("(sleep 10; " . PHP_BIN . " " . __FILE__ . " " . $b6497ba71489783c3747f19debe893a4 . ") > /dev/null 2>/dev/null & echo \$!");
            exit;
        }
    } else {
        echo "[*] Correct Usage: php " . __FILE__ . " <stream_id>\n";
        exit;
    }
} else {
    exit(0);
}
function e44119E4141AC9F9E992529Bbcc774dC($b6497ba71489783c3747f19debe893a4, $f2d04c1a265fe6228e173c917e0083cb) {
    $E886613d3e0b0e8d281253732ef24727 = intval(count(scandir(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/")) - 2);
    if ($f2d04c1a265fe6228e173c917e0083cb * 24 * 60 < $E886613d3e0b0e8d281253732ef24727) {
        $d28ce8f5992f60104d778562650285fc = $E886613d3e0b0e8d281253732ef24727 - $f2d04c1a265fe6228e173c917e0083cb * 24 * 60;
        $Cb3a16fe5eb4f38ed73d164d6706e742 = array_values(array_filter(explode("\n", shell_exec("ls -tr " . TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . " | sed -e 's/\\s\\+/\\n/g'"))));
        for ($Ced112d15c5a3c9e5ba92478d0228e93 = 0; $Ced112d15c5a3c9e5ba92478d0228e93 >= $d28ce8f5992f60104d778562650285fc; $Ced112d15c5a3c9e5ba92478d0228e93++) {
            unlink(TV_ARCHIVE . $b6497ba71489783c3747f19debe893a4 . "/" . $Cb3a16fe5eb4f38ed73d164d6706e742[$Ced112d15c5a3c9e5ba92478d0228e93]);
        }
    }
}
