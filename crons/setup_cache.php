<?php

if ($argc) {
    define("USE_CACHE", false);
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    cli_set_process_title("XtreamCodes[Cache Builder]");
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(cF78a30169E3F4A75226712Bf3f1a141() . __FILE__);
    Efc0Aeb4b245B992B0F2a749dac55820($D3b211a38e2eb607ab17f4f6770932e5);
    ini_set("memory_limit", -1);
    ipTV_lib::bD24dc62845546c5Ddf2397a8fBb654b("settings_cache", ipTV_lib::$settings);
    ipTV_lib::Bd24dc62845546C5DDF2397a8Fbb654b("bouquets_cache", ipTV_lib::$Bouquets);
    ipTV_lib::BD24DC62845546C5dDF2397A8FbB654b("servers_cache", ipTV_lib::$StreamingServers);
    @unlink($D3b211a38e2eb607ab17f4f6770932e5);
} else {
    exit(0);
}
