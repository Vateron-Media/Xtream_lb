<?php
header("Access-Control-Allow-Origin: *");
register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (empty(ipTV_lib::$request["stream"]) || empty(ipTV_lib::$request["extension"]) || empty(ipTV_lib::$request["password"]) || ipTV_lib::$settings["live_streaming_pass"] != ipTV_lib::$request["password"]) {
    http_response_code(401);
    die;
}
if (!in_array($b7eaa095f27405cf78a432ce6504dae0, ipTV_streaming::E83c60Ae0B93a4Aae6a66A6f64fcA8b6(true))) {
    http_response_code(401);
    die;
}
$E1dc5da23bfc7433f190ed9488d09204 = ipTV_lib::$settings["live_streaming_pass"];
$b6497ba71489783c3747f19debe893a4 = intval(ipTV_lib::$request["stream"]);
$b2cbe4de82c7504e1d8d46c57a6264fa = ipTV_lib::$request["extension"];
$ipTV_db->query("\n                    SELECT * \n                    FROM `streams` t1\n                    INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.server_id = '%d'\n                    WHERE t1.`id` = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
if (ipTV_lib::$settings["use_buffer"] == 0) {
    header("X-Accel-Buffering: no");
}
if ($ipTV_db->num_rows() > 0) {
    $F57960e3620515a273e03803fcd30429 = $ipTV_db->get_row();
    $ipTV_db->close_mysql();
    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
    if (!ipTV_streaming::a1ecf5d2A93474b12E622361c656b958($F57960e3620515a273e03803fcd30429["pid"], $b6497ba71489783c3747f19debe893a4)) {
        if ($F57960e3620515a273e03803fcd30429["on_demand"] == 1) {
            if (!ipTV_streaming::D835c2A9787bA794E7590e06621cFa6B($F57960e3620515a273e03803fcd30429["monitor_pid"], $b6497ba71489783c3747f19debe893a4)) {
                ipTV_stream::cCe5281dDFb1F4C0D820841761F78170($b6497ba71489783c3747f19debe893a4);
            }
        } else {
            http_response_code(403);
            die;
        }
    }
    switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
        case "m3u8":
            if (!ipTV_streaming::eF709337a2715D23B673e033a05bf7B7($f0d5508533eaf6452b2b014beae1cc7c, $F57960e3620515a273e03803fcd30429["pid"])) {
            } else {
                if (empty(ipTV_lib::$request["segment"])) {
                    if (!($E4866fec202244d7a3c9f4e24f6ee344 = ipTV_streaming::de40f0DCA7C52C3162b552Be591b38eB($f0d5508533eaf6452b2b014beae1cc7c, $E1dc5da23bfc7433f190ed9488d09204, $b6497ba71489783c3747f19debe893a4))) {
                    } else {
                        header("Content-Type: application/x-mpegurl");
                        header("Content-Length: " . strlen($E4866fec202244d7a3c9f4e24f6ee344));
                        echo $E4866fec202244d7a3c9f4e24f6ee344;
                    }
                } else {
                    $B8355a23f8ef2efb6685523365b371e2 = STREAMS_PATH . str_replace(array("\\", "/"), '', urldecode(ipTV_lib::$request["segment"]));
                    if (!file_exists($B8355a23f8ef2efb6685523365b371e2)) {
                    } else {
                        $Caa0aa71d18b85a3c3a825a16209b1a7 = filesize($B8355a23f8ef2efb6685523365b371e2);
                        header("Content-Length: " . $Caa0aa71d18b85a3c3a825a16209b1a7);
                        header("Content-Type: video/mp2t");
                        readfile($B8355a23f8ef2efb6685523365b371e2);
                    }
                }
            }
            break;
        default:
            header("Content-Type: video/mp2t");
            $Ae3016c45dd59a9b881c39a8dfeb6f6f = ipTV_streaming::b03404a02c45Cf202dA01928E71d3B42($f0d5508533eaf6452b2b014beae1cc7c, ipTV_lib::$settings["client_prebuffer"]);
            if (!empty($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                if (is_array($Ae3016c45dd59a9b881c39a8dfeb6f6f)) {
                    foreach ($Ae3016c45dd59a9b881c39a8dfeb6f6f as $B8355a23f8ef2efb6685523365b371e2) {
                        readfile(STREAMS_PATH . $B8355a23f8ef2efb6685523365b371e2);
                    }
                    preg_match("/_(.*)\\./", array_pop($Ae3016c45dd59a9b881c39a8dfeb6f6f), $dc97e90a550794b1b10be857a9861404);
                    $f8b82aac8ae421c699a4ca4dcf276fda = $dc97e90a550794b1b10be857a9861404[1];
                } else {
                    $f8b82aac8ae421c699a4ca4dcf276fda = $Ae3016c45dd59a9b881c39a8dfeb6f6f;
                }
            } else {
                if (!file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
                    $f8b82aac8ae421c699a4ca4dcf276fda = -1;
                } else {
                    die;
                }
            }
            $e6e1d835d746daf7d74660d362922634 = 0;
            $C72e5ac751c165a671cc57aeb3dbc150 = ipTV_lib::$SegmentsSettings["seg_time"] * 2;
            while (true) {
                $F9c8a291792f79d13ff4c34f35ce49af = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 1);
                $B28d4d57f34661a8b1773dea1b6dda68 = sprintf("%d_%d.ts", $b6497ba71489783c3747f19debe893a4, $f8b82aac8ae421c699a4ca4dcf276fda + 2);
                $Df462682e370952f75b92da6e62a7293 = 0;
                while (!file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && $Df462682e370952f75b92da6e62a7293 <= $C72e5ac751c165a671cc57aeb3dbc150 * 10) {
                    usleep(100000);
                    ++$Df462682e370952f75b92da6e62a7293;
                }
                if (!file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af)) {
                    die;
                }
                if (empty($F57960e3620515a273e03803fcd30429["pid"]) && file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid")) {
                    $F57960e3620515a273e03803fcd30429["pid"] = intval(file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.pid"));
                }
                $e6e1d835d746daf7d74660d362922634 = 0;
                $b4ad7225f6375fe5d757d3c7147fb034 = fopen(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af, "r");
                while ($e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && !file_exists(STREAMS_PATH . $B28d4d57f34661a8b1773dea1b6dda68)) {
                    $Ecf4751835141bfcce480ec62720b500 = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, ipTV_lib::$settings["read_buffer_size"]);
                    if (empty($Ecf4751835141bfcce480ec62720b500)) {
                        sleep(1);
                        if (!is_resource($b4ad7225f6375fe5d757d3c7147fb034) || !file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af)) {
                            die;
                        }
                        ++$e6e1d835d746daf7d74660d362922634;
                    }
                    echo $Ecf4751835141bfcce480ec62720b500;
                    $e6e1d835d746daf7d74660d362922634 = 0;
                }
                if (!(ipTV_streaming::ps_running($F57960e3620515a273e03803fcd30429["pid"], FFMPEG_PATH) && $e6e1d835d746daf7d74660d362922634 <= $C72e5ac751c165a671cc57aeb3dbc150 && file_exists(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af) && is_resource($b4ad7225f6375fe5d757d3c7147fb034))) {
                    die;
                } else {
                    $fae6f311e48c420ee08489911d8efe3a = filesize(STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af);
                    $D863e93bdec7cffe0229f5278c01b0b1 = $fae6f311e48c420ee08489911d8efe3a - ftell($b4ad7225f6375fe5d757d3c7147fb034);
                    if ($D863e93bdec7cffe0229f5278c01b0b1 > 0) {
                        echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $D863e93bdec7cffe0229f5278c01b0b1);
                    }
                }
                fclose($b4ad7225f6375fe5d757d3c7147fb034);
                $e6e1d835d746daf7d74660d362922634 = 0;
                $f8b82aac8ae421c699a4ca4dcf276fda++;
            }
    }
} else {
    http_response_code(403);
}
function shutdown() {
    global $ipTV_db;
    $ipTV_db->close_mysql();
    fastcgi_finish_request();
}
