<?php
register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
$ee71f7e48925b7b9deb96cfba7d2f6de = false;
$Caa0aa71d18b85a3c3a825a16209b1a7 = 0;
$b93df8c85c6b9c6b3e155555619bbe8e = 0;
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (empty(ipTV_lib::$request["stream"]) || empty(ipTV_lib::$request["password"]) || ipTV_lib::$settings["live_streaming_pass"] != ipTV_lib::$request["password"]) {
    http_response_code(401);
    die;
}
if (!in_array($b7eaa095f27405cf78a432ce6504dae0, ipTV_streaming::E83C60AE0b93A4aAe6a66a6F64fCa8b6(true))) {
    http_response_code(401);
    die;
}
$efa7cefd12388102b27fdeb2f9f68219 = pathinfo(ipTV_lib::$request["stream"]);
$b6497ba71489783c3747f19debe893a4 = intval($efa7cefd12388102b27fdeb2f9f68219["filename"]);
$b2cbe4de82c7504e1d8d46c57a6264fa = $efa7cefd12388102b27fdeb2f9f68219["extension"];
$ipTV_db->query("\n                    SELECT t1.*\n                    FROM `streams` t1\n                    INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.pid IS NOT NULL AND t2.server_id = '%d'\n                    INNER JOIN `streams_types` t3 ON t3.type_id = t1.type AND t3.type_key = 'movie'\n                    WHERE t1.`id` = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
if (ipTV_lib::$settings["use_buffer"] == 0) {
    header("X-Accel-Buffering: no");
}
if ($ipTV_db->num_rows() > 0) {
    $B50798beca3c6fb2144dfc9abe827d5d = $ipTV_db->get_row();
    $ipTV_db->close_mysql();
    $Fe8d29210e292634354f7f2975a7c5c0 = MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . $b2cbe4de82c7504e1d8d46c57a6264fa;
    if (file_exists($Fe8d29210e292634354f7f2975a7c5c0)) {
        switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
            case "mp4":
                header("Content-type: video/mp4");
                break;
            case "mkv":
                header("Content-type: video/x-matroska");
                break;
            case "avi":
                header("Content-type: video/x-msvideo");
                break;
            case "3gp":
                header("Content-type: video/3gpp");
                break;
            case "flv":
                header("Content-type: video/x-flv");
                break;
            case "wmv":
                header("Content-type: video/x-ms-wmv");
                break;
            case "mov":
                header("Content-type: video/quicktime");
                break;
            case "ts":
                header("Content-type: video/mp2t");
                break;
            default:
                header("Content-Type: application/octet-stream");
        }
        $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Fe8d29210e292634354f7f2975a7c5c0, "rb");
        $c2f883bf459da90a240f9950048443f3 = filesize($Fe8d29210e292634354f7f2975a7c5c0);
        $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3;
        $start = 0;
        $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
        header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
        if (isset($_SERVER["HTTP_RANGE"])) {
            $e0d1376cc4243595a2ac3f530e229437 = $start;
            $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
            list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
            if (strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false) {
                header("HTTP/1.1 416 Requested Range Not Satisfiable");
                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                die;
            }
            if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
                $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
            } else {
                $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
                $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
                $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
            }
            $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
            if ($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3) {
                header("HTTP/1.1 416 Requested Range Not Satisfiable");
                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                die;
            }
            $start = $e0d1376cc4243595a2ac3f530e229437;
            $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
            $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
            fseek($b4ad7225f6375fe5d757d3c7147fb034, $start);
            header("HTTP/1.1 206 Partial Content");
        }
        header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
        header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
        $Fcf846b3512cb8d6f8d77d39b5ad11f6 = 1024 * 8;
        while (!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654) {
            $Beb85f0c05e519f48a14915b66ad155c = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $Fcf846b3512cb8d6f8d77d39b5ad11f6);
            echo $Beb85f0c05e519f48a14915b66ad155c;
        }
        fclose($b4ad7225f6375fe5d757d3c7147fb034);
        die;
    }
}
function shutdown() {
    global $ipTV_db;
    $ipTV_db->close_mysql();
    fastcgi_finish_request();
}
