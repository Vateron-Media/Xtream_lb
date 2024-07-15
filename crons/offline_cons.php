<?php

set_time_limit(0);
if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(cF78a30169e3f4a75226712Bf3f1A141() . __FILE__);
    EFc0aeb4b245b992b0F2A749DaC55820($D3b211a38e2eb607ab17f4f6770932e5);
    $E6ecbe8e89c77744a256939f9ba4dbee = TMP_DIR . "offline_cons";
    if (E2D73953A5089B9C7983838f61F23aCF::$settings["save_closed_connection"] != 0) {
        $e86143ae714b5db9373cfb584f8aaf70 = "";
        if (file_exists($E6ecbe8e89c77744a256939f9ba4dbee)) {
            f16d3e5b6ae28bdb3e45d1c117ea0f14($E6ecbe8e89c77744a256939f9ba4dbee, $e86143ae714b5db9373cfb584f8aaf70);
            unlink($E6ecbe8e89c77744a256939f9ba4dbee);
        }
        $e86143ae714b5db9373cfb584f8aaf70 = rtrim($e86143ae714b5db9373cfb584f8aaf70, ",");
        if (!empty($e86143ae714b5db9373cfb584f8aaf70)) {
            $F30ccc8fd3427f97ca35bc6ba6610d01->f79deB89967A61d12279a178B21F5865("INSERT INTO `user_activity` (`server_id`,`user_id`,`isp`,`external_device`,`stream_id`,`date_start`,`user_agent`,`user_ip`,`date_end`,`container`,`geoip_country_code`) VALUES " . $e86143ae714b5db9373cfb584f8aaf70);
        }
    } else {
        if (file_exists($E6ecbe8e89c77744a256939f9ba4dbee)) {
            unlink($E6ecbe8e89c77744a256939f9ba4dbee);
        }
        exit;
    }
} else {
    exit(0);
}
function F16D3e5B6Ae28bdB3e45d1c117eA0f14($E45cb49615d9ff0c133fcdeaa506ddb6, &$e86143ae714b5db9373cfb584f8aaf70) {
    global $F30ccc8fd3427f97ca35bc6ba6610d01;
    if (file_exists($E45cb49615d9ff0c133fcdeaa506ddb6)) {
        $b4ad7225f6375fe5d757d3c7147fb034 = fopen($E45cb49615d9ff0c133fcdeaa506ddb6, "r");
        while (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
            $Df3643b77de72fea7002c5acff85b896 = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
            if (!empty($Df3643b77de72fea7002c5acff85b896)) {
                $Df3643b77de72fea7002c5acff85b896 = json_decode(base64_decode($Df3643b77de72fea7002c5acff85b896), true);
                $Df3643b77de72fea7002c5acff85b896 = array_map([$F30ccc8fd3427f97ca35bc6ba6610d01, "escape"], $Df3643b77de72fea7002c5acff85b896);
                $e86143ae714b5db9373cfb584f8aaf70 .= "(" . SERVER_ID . ",'" . $Df3643b77de72fea7002c5acff85b896["user_id"] . "','" . $Df3643b77de72fea7002c5acff85b896["isp"] . "','" . $Df3643b77de72fea7002c5acff85b896["external_device"] . "','" . $Df3643b77de72fea7002c5acff85b896["stream_id"] . "','" . $Df3643b77de72fea7002c5acff85b896["date_start"] . "','" . $Df3643b77de72fea7002c5acff85b896["user_agent"] . "','" . $Df3643b77de72fea7002c5acff85b896["user_ip"] . "','" . $Df3643b77de72fea7002c5acff85b896["date_end"] . "','" . $Df3643b77de72fea7002c5acff85b896["container"] . "','" . $Df3643b77de72fea7002c5acff85b896["geoip_country_code"] . "'),";
            }
        }
        fclose($b4ad7225f6375fe5d757d3c7147fb034);
    }
    return $e86143ae714b5db9373cfb584f8aaf70;
}
