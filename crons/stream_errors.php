<?php

set_time_limit(0);
if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(UniqueID() . __FILE__);
    KillProcessCmd($D3b211a38e2eb607ab17f4f6770932e5);
    $Bc90810ba7aa9dba3da32be473481ebe = ["the user-agent option is deprecated", "Last message repeated", "deprecated", "Packets poorly interleaved"];
    if ($A7cd68109a3d420b829e6d9425875c6d = opendir(STREAMS_PATH)) {
        while (false === ($e51d2d22edaf82bf4df6dd3cd1f2e264 = readdir($A7cd68109a3d420b829e6d9425875c6d))) {
            if ($e51d2d22edaf82bf4df6dd3cd1f2e264 != "." && $e51d2d22edaf82bf4df6dd3cd1f2e264 != ".." && is_file(STREAMS_PATH . $e51d2d22edaf82bf4df6dd3cd1f2e264)) {
                $E45cb49615d9ff0c133fcdeaa506ddb6 = STREAMS_PATH . $e51d2d22edaf82bf4df6dd3cd1f2e264;
                list($b6497ba71489783c3747f19debe893a4, $b2cbe4de82c7504e1d8d46c57a6264fa) = explode(".", $e51d2d22edaf82bf4df6dd3cd1f2e264);
                if ($b2cbe4de82c7504e1d8d46c57a6264fa == "errors") {
                    $c4d295c2e7809a5697cc83a4f04d65bf = array_values(array_unique(array_map("trim", explode("\n", file_get_contents($E45cb49615d9ff0c133fcdeaa506ddb6)))));
                    foreach ($c4d295c2e7809a5697cc83a4f04d65bf as $error) {
                        if (!(empty($error) || f5f93afd707e5e9078c39ab1af456d4c($Bc90810ba7aa9dba3da32be473481ebe, $error))) {
                            $ipTV_db->query("INSERT INTO `stream_logs` (`stream_id`,`server_id`,`date`,`error`) VALUES('%d','%d','%d','%s')", $b6497ba71489783c3747f19debe893a4, SERVER_ID, time() + ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"], $error);
                        }
                    }
                    unlink($E45cb49615d9ff0c133fcdeaa506ddb6);
                }
            }
        }
        closedir($A7cd68109a3d420b829e6d9425875c6d);
    }
    $ipTV_db->query("DELETE FROM `stream_logs` WHERE `date` <= '%d' AND `server_id` = '%d'", strtotime("-3 hours", time() + ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"]), SERVER_ID);
} else {
    exit(0);
}
function F5f93AFD707e5e9078c39ab1Af456d4C($e28c90a1ce83661822e722be8085d73d, $d0f2aea53477a47db820c0da06a3138f) {
    foreach ($e28c90a1ce83661822e722be8085d73d as $A0d2cda48a3197c6f4b764ba5548b77d) {
        if (!stristr($d0f2aea53477a47db820c0da06a3138f, $A0d2cda48a3197c6f4b764ba5548b77d)) {
        } else {
            return true;
        }
    }
    return false;
}
