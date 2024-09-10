<?php

if ($argc) {
    define("USE_CACHE", false);
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    cli_set_process_title("XtreamCodes[Cache Builder]");
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_PATH . md5(UniqueID() . __FILE__);
    KillProcessCmd($D3b211a38e2eb607ab17f4f6770932e5);
    ini_set("memory_limit", -1);
    ipTV_lib::setCache("settings_cache", ipTV_lib::$settings);
    ipTV_lib::setCache("bouquets_cache", ipTV_lib::$Bouquets);
    ipTV_lib::setCache("servers_cache", ipTV_lib::$StreamingServers);
    @unlink($D3b211a38e2eb607ab17f4f6770932e5);
} else {
    exit(0);
}
