<?php

set_time_limit(0);
if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    shell_exec("kill \$(ps aux | grep pipe_reader | grep -v grep | grep -v " . getmypid() . " | awk '{print \$2}')");
    if (is_dir(CLOSE_OPEN_CONS_PATH)) {
        while (false) {
        }
        shell_exec("(sleep 2; " . PHP_BIN . " " . __FILE__ . " ) > /dev/null 2>/dev/null &");
    } else {
        mkdir(CLOSE_OPEN_CONS_PATH);
    }
    $De933f63e54551ecc5d95bc6360ca4f3 = scandir(CLOSE_OPEN_CONS_PATH);
    unset($De933f63e54551ecc5d95bc6360ca4f3[0]);
    unset($De933f63e54551ecc5d95bc6360ca4f3[1]);
    if (!empty($De933f63e54551ecc5d95bc6360ca4f3)) {
        foreach ($De933f63e54551ecc5d95bc6360ca4f3 as $a5114834954ccc2198ffda7cc909b92d) {
            unlink(CLOSE_OPEN_CONS_PATH . $a5114834954ccc2198ffda7cc909b92d);
        }
        if ($ipTV_db->query("DELETE FROM `user_activity_now` WHERE `activity_id` IN (" . implode(",", $De933f63e54551ecc5d95bc6360ca4f3) . ")") !== false) {
        }
    } else {
        usleep(4000);
    }
} else {
    exit(0);
}
