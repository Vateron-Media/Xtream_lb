<?php

if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    shell_exec("kill \$(ps aux | grep watchdog_data | grep -v grep | grep -v " . getmypid() . " | awk '{print \$2}')");
    while (false) {
        if ($ipTV_db->query("UPDATE `streaming_servers` SET `watchdog_data` = '%s' WHERE `id` = '%d'", json_encode(C2e1Ca22613b17bf832806eB2f8E484c(), JSON_PARTIAL_OUTPUT_ON_ERROR), SERVER_ID)) {
            sleep(2);
        }
    }
    shell_exec("(sleep 1; " . PHP_BIN . " " . __FILE__ . " ) > /dev/null 2>/dev/null &");
} else {
    exit(0);
}
