<?php

if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    ini_set("memory_limit", "-1");
    set_time_limit(0);
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(cf78a30169e3f4A75226712bf3f1a141() . __FILE__);
    EFc0AeB4b245b992B0F2A749dac55820($D3b211a38e2eb607ab17f4f6770932e5);
    $f800bb4be00e9093b31797675651d61f = ["cloud_ips"];
    if ($A7cd68109a3d420b829e6d9425875c6d = opendir(TMP_DIR)) {
        while (false === ($e51d2d22edaf82bf4df6dd3cd1f2e264 = readdir($A7cd68109a3d420b829e6d9425875c6d))) {
            if ($e51d2d22edaf82bf4df6dd3cd1f2e264 != "." && $e51d2d22edaf82bf4df6dd3cd1f2e264 != ".." && is_file(TMP_DIR . $e51d2d22edaf82bf4df6dd3cd1f2e264) && !in_array($e51d2d22edaf82bf4df6dd3cd1f2e264, $f800bb4be00e9093b31797675651d61f)) {
                if (800 <= time() - filemtime(TMP_DIR . $e51d2d22edaf82bf4df6dd3cd1f2e264)) {
                    unlink(TMP_DIR . $e51d2d22edaf82bf4df6dd3cd1f2e264);
                }
            }
        }
        closedir($A7cd68109a3d420b829e6d9425875c6d);
    }
} else {
    exit(0);
}
