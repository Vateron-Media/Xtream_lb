<?php

if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(CF78A30169E3f4a75226712bf3F1A141() . __FILE__);
    eFc0AEb4B245b992b0F2a749DAC55820($D3b211a38e2eb607ab17f4f6770932e5);
    cli_set_process_title("XtreamCodes[VOD CC Checker]");
    ini_set("memory_limit", -1);
    $D06be8460e891963b999cef4fd2ddef8 = ipTV_servers::fBBdd88eb1b3703a5A7867411EfFce35(SERVER_ID, FFMPEG_PATH);
    $ipTV_db->query("SELECT t1.*,t2.* FROM `streams_sys` t1 \n                INNER JOIN `streams` t2 ON t2.id = t1.stream_id AND t2.direct_source = 0\n                INNER JOIN `streams_types` t3 ON t3.type_id = t2.type AND t3.live = 0\n                WHERE (t1.to_analyze = 1 OR t1.stream_status = 2) AND t1.server_id = '%d'", SERVER_ID);
    if (0 < $ipTV_db->num_rows()) {
        $d5f8c5a2322bee76eff752938046634a = $ipTV_db->get_rows();
        foreach ($d5f8c5a2322bee76eff752938046634a as $Fa2325a1b301ca7c383cb69087c42d91) {
            echo "[*] Checking Movie " . $Fa2325a1b301ca7c383cb69087c42d91["stream_display_name"] . " ON Server ID " . $Fa2325a1b301ca7c383cb69087c42d91["server_id"] . " \t\t---> ";
            if ($Fa2325a1b301ca7c383cb69087c42d91["to_analyze"] == 1) {
                if (!empty($D06be8460e891963b999cef4fd2ddef8[$Fa2325a1b301ca7c383cb69087c42d91["server_id"]]) && in_array($Fa2325a1b301ca7c383cb69087c42d91["pid"], $D06be8460e891963b999cef4fd2ddef8[$Fa2325a1b301ca7c383cb69087c42d91["server_id"]])) {
                    echo "WORKING\n";
                } else {
                    echo "\n\n\n";
                    $Ecd19d611581ce12bbdc70025666abf9 = json_decode($Fa2325a1b301ca7c383cb69087c42d91["target_container"], true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $Fa2325a1b301ca7c383cb69087c42d91["target_container"] = $Ecd19d611581ce12bbdc70025666abf9;
                    } else {
                        $Fa2325a1b301ca7c383cb69087c42d91["target_container"] = [$Fa2325a1b301ca7c383cb69087c42d91["target_container"]];
                    }
                    $Fa2325a1b301ca7c383cb69087c42d91["target_container"] = $Fa2325a1b301ca7c383cb69087c42d91["target_container"][0];
                    $Dd350f4f747e2630abc0a3631701490f = MOVIES_PATH . $Fa2325a1b301ca7c383cb69087c42d91["stream_id"] . "." . $Fa2325a1b301ca7c383cb69087c42d91["target_container"];
                    if ($a58a92e1c21a65066c6ca36591929d95 = ipTV_stream::c40ab46F24644f0Dcfad4B6d617C2734($Dd350f4f747e2630abc0a3631701490f, $Fa2325a1b301ca7c383cb69087c42d91["server_id"])) {
                        $f2d04c1a265fe6228e173c917e0083cb = isset($a58a92e1c21a65066c6ca36591929d95["duration"]) ? $a58a92e1c21a65066c6ca36591929d95["duration"] : 0;
                        sscanf($f2d04c1a265fe6228e173c917e0083cb, "%d:%d:%d", $f70b4408f306b0946d856dd29a25b89c, $C3701408f451b56ac9f60cf02f5867b3, $e3cf3851f7ee9d4e859bd7fdd6f6b33e);
                        $f3db7858a998b217cdc28e738fd2182d = isset($e3cf3851f7ee9d4e859bd7fdd6f6b33e) ? $f70b4408f306b0946d856dd29a25b89c * 3600 + $C3701408f451b56ac9f60cf02f5867b3 * 60 + $e3cf3851f7ee9d4e859bd7fdd6f6b33e : $f70b4408f306b0946d856dd29a25b89c * 60 + $C3701408f451b56ac9f60cf02f5867b3;
                        $c2f883bf459da90a240f9950048443f3 = ipTV_servers::b2CeD9390fCC204B98376884Add1E574($Fa2325a1b301ca7c383cb69087c42d91["server_id"], "wc -c < " . $Dd350f4f747e2630abc0a3631701490f, "raw");
                        $bd8be6cf39eec67640223143174627d0 = round($c2f883bf459da90a240f9950048443f3[$Fa2325a1b301ca7c383cb69087c42d91["server_id"]] * 0 / $f3db7858a998b217cdc28e738fd2182d);
                        $D972344b0ddea2cd33c173d1f9abed5d = json_decode($Fa2325a1b301ca7c383cb69087c42d91["movie_propeties"], true);
                        if (is_array($D972344b0ddea2cd33c173d1f9abed5d)) {
                        } else {
                            $D972344b0ddea2cd33c173d1f9abed5d = [];
                        }
                        if (isset($D972344b0ddea2cd33c173d1f9abed5d["duration_secs"]) && $f3db7858a998b217cdc28e738fd2182d == $D972344b0ddea2cd33c173d1f9abed5d["duration_secs"]) {
                        } else {
                            $D972344b0ddea2cd33c173d1f9abed5d["duration_secs"] = $f3db7858a998b217cdc28e738fd2182d;
                            $D972344b0ddea2cd33c173d1f9abed5d["duration"] = $f2d04c1a265fe6228e173c917e0083cb;
                        }
                        if (isset($D972344b0ddea2cd33c173d1f9abed5d["video"]) && $a58a92e1c21a65066c6ca36591929d95["codecs"]["video"]["codec_name"] == $D972344b0ddea2cd33c173d1f9abed5d["video"]) {
                        } else {
                            $D972344b0ddea2cd33c173d1f9abed5d["video"] = $a58a92e1c21a65066c6ca36591929d95["codecs"]["video"];
                        }
                        if (isset($D972344b0ddea2cd33c173d1f9abed5d["audio"]) && $a58a92e1c21a65066c6ca36591929d95["codecs"]["audio"]["codec_name"] == $D972344b0ddea2cd33c173d1f9abed5d["audio"]) {
                        } else {
                            $D972344b0ddea2cd33c173d1f9abed5d["audio"] = $a58a92e1c21a65066c6ca36591929d95["codecs"]["audio"];
                        }
                        if (isset($D972344b0ddea2cd33c173d1f9abed5d["bitrate"]) && $bd8be6cf39eec67640223143174627d0 == $D972344b0ddea2cd33c173d1f9abed5d["bitrate"]) {
                        } else {
                            $D972344b0ddea2cd33c173d1f9abed5d["bitrate"] = $bd8be6cf39eec67640223143174627d0;
                        }
                        $ipTV_db->query("UPDATE `streams` SET `movie_propeties` = '%s' WHERE `id` = '%d'", json_encode($D972344b0ddea2cd33c173d1f9abed5d), $Fa2325a1b301ca7c383cb69087c42d91["stream_id"]);
                        $ipTV_db->query("UPDATE `streams_sys` SET `bitrate` = '%d',`to_analyze` = 0,`stream_status` = 0,`stream_info` = '%s'  WHERE `server_stream_id` = '%d'", $bd8be6cf39eec67640223143174627d0, json_encode($a58a92e1c21a65066c6ca36591929d95), $Fa2325a1b301ca7c383cb69087c42d91["server_stream_id"]);
                        echo "VALID\n";
                    } else {
                        $ipTV_db->query("UPDATE `streams_sys` SET `to_analyze` = 0,`stream_status` = 1  WHERE `server_stream_id` = '%d'", $Fa2325a1b301ca7c383cb69087c42d91["server_stream_id"]);
                        echo "BAD MOVIE\n";
                    }
                }
            } else {
                echo "NO ACTION\n";
            }
        }
    }
} else {
    exit(0);
}
