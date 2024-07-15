<?php

register_shutdown_function("shutdown");
set_time_limit(0);
require "../init.php";
$ee71f7e48925b7b9deb96cfba7d2f6de = false;
$Caa0aa71d18b85a3c3a825a16209b1a7 = 0;
$b93df8c85c6b9c6b3e155555619bbe8e = 0;
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (!(empty(e2d73953A5089B9c7983838f61F23ACF::$request["stream"]) || empty(E2D73953A5089B9c7983838F61F23Acf::$request["password"]) || e2D73953A5089B9c7983838F61f23aCf::$settings["live_streaming_pass"] != e2d73953A5089B9C7983838F61f23ACf::$request["password"])) {
    if (in_array($b7eaa095f27405cf78a432ce6504dae0, F1CA094152763C79018e9F1893ef1e48::E83C60AE0b93A4aAe6a66a6F64fCa8b6(true))) {
        $efa7cefd12388102b27fdeb2f9f68219 = pathinfo(E2D73953A5089B9C7983838f61F23AcF::$request["stream"]);
        $b6497ba71489783c3747f19debe893a4 = intval($efa7cefd12388102b27fdeb2f9f68219["filename"]);
        $b2cbe4de82c7504e1d8d46c57a6264fa = $efa7cefd12388102b27fdeb2f9f68219["extension"];
        $F30ccc8fd3427f97ca35bc6ba6610d01->query("\n                    SELECT t1.*\n                    FROM `streams` t1\n                    INNER JOIN `streams_sys` t2 ON t2.stream_id = t1.id AND t2.pid IS NOT NULL AND t2.server_id = '%d'\n                    INNER JOIN `streams_types` t3 ON t3.type_id = t1.type AND t3.type_key = 'movie'\n                    WHERE t1.`id` = '%d'", SERVER_ID, $b6497ba71489783c3747f19debe893a4);
        if (!(e2d73953A5089b9C7983838f61F23ACf::$settings["use_buffer"] == 0)) {
            goto D02ba0add8b55d0de067ad79601ce27c;
        }
        header("X-Accel-Buffering: no");
        D02ba0add8b55d0de067ad79601ce27c:
        if (!($F30ccc8fd3427f97ca35bc6ba6610d01->d4a34259Fc10b35FEDbcCda0a23d69aE() > 0)) {
            goto Dcaccf0c9d25b043c0058eeaf8a80e30;
        }
        $B50798beca3c6fb2144dfc9abe827d5d = $F30ccc8fd3427f97ca35bc6ba6610d01->eB6bFe16d93814Caf26d92092d5A4052();
        $F30ccc8fd3427f97ca35bc6ba6610d01->a9c27319DdF640F296201C75A1Ef3EeB();
        $Fe8d29210e292634354f7f2975a7c5c0 = MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . "." . $b2cbe4de82c7504e1d8d46c57a6264fa;
        if (!file_exists($Fe8d29210e292634354f7f2975a7c5c0)) {
            Dcaccf0c9d25b043c0058eeaf8a80e30:
            function shutdown() {
                global $F30ccc8fd3427f97ca35bc6ba6610d01;
                $F30ccc8fd3427f97ca35bc6ba6610d01->A9C27319ddf640f296201C75A1Ef3EeB();
                fastcgi_finish_request();
            }
            // [PHPDeobfuscator] Implied script end
            return;
        }
        switch ($b2cbe4de82c7504e1d8d46c57a6264fa) {
            case "mp4":
                header("Content-type: video/mp4");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "mkv":
                header("Content-type: video/x-matroska");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "avi":
                header("Content-type: video/x-msvideo");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "3gp":
                header("Content-type: video/3gpp");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "flv":
                header("Content-type: video/x-flv");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "wmv":
                header("Content-type: video/x-ms-wmv");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "mov":
                header("Content-type: video/quicktime");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            case "ts":
                header("Content-type: video/mp2t");
                goto Bd0e66b995f1ba5d4da131a2333f9c88;
            default:
                header("Content-Type: application/octet-stream");
        }
        Bd0e66b995f1ba5d4da131a2333f9c88:
        $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Fe8d29210e292634354f7f2975a7c5c0, "rb");
        $c2f883bf459da90a240f9950048443f3 = filesize($Fe8d29210e292634354f7f2975a7c5c0);
        $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3;
        $start = 0;
        $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
        header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
        if (!isset($_SERVER["HTTP_RANGE"])) {
            goto C53e3b88b33ca6069d9c16d5edc05db7;
        }
        $e0d1376cc4243595a2ac3f530e229437 = $start;
        $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
        list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
        if (!(strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false)) {
            if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
                $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
                goto a5b65fc9f3aef70fa94b78573381b246;
            }
            $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
            $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
            $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
            a5b65fc9f3aef70fa94b78573381b246:
            $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
            if (!($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3)) {
                $start = $e0d1376cc4243595a2ac3f530e229437;
                $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
                $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
                fseek($b4ad7225f6375fe5d757d3c7147fb034, $start);
                header("HTTP/1.1 206 Partial Content");
                C53e3b88b33ca6069d9c16d5edc05db7:
                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
                $Fcf846b3512cb8d6f8d77d39b5ad11f6 = 8192;
                d80652706fd7b35406ea0e2ea1e35556:
                if (!(!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654)) {
                    fclose($b4ad7225f6375fe5d757d3c7147fb034);
                    die;
                }
                $Beb85f0c05e519f48a14915b66ad155c = stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, $Fcf846b3512cb8d6f8d77d39b5ad11f6);
                echo $Beb85f0c05e519f48a14915b66ad155c;
                goto d80652706fd7b35406ea0e2ea1e35556;
            }
            header("HTTP/1.1 416 Requested Range Not Satisfiable");
            header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
            die;
        }
        header("HTTP/1.1 416 Requested Range Not Satisfiable");
        header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
        die;
    }
    http_response_code(401);
    die;
}
http_response_code(401);
die;
