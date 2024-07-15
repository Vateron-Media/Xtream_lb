<?php
set_time_limit(0);
require "init.php";
header("X-Accel-Buffering: no");
header("Access-Control-Allow-Origin: *");
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (empty(ipTV_lib::$request["password"]) || ipTV_lib::$request["password"] != ipTV_lib::$settings["live_streaming_pass"]) {
    die(json_encode(array("main_fetch" => false, "error" => "Wrong Password")));
}
if (!in_array($b7eaa095f27405cf78a432ce6504dae0, ipTV_streaming::E83C60ae0B93a4AAE6a66a6f64FCA8B6(false))) {
    die(json_encode(array("main_fetch" => false, "error" => "Not Allowed")));
}
$Cfd5aeeef0d1970527f63419de620a46 = !empty(ipTV_lib::$request["action"]) ? ipTV_lib::$request["action"] : '';
switch ($Cfd5aeeef0d1970527f63419de620a46) {
    case "reset_cache":
        $E179fbf94a7c2de093622901d974626c = opcache_reset();
        echo (int) $E179fbf94a7c2de093622901d974626c;
        die;
    case "vod":
        if (!empty(ipTV_lib::$request["stream_ids"]) && !empty(ipTV_lib::$request["function"])) {
            $b40a34c6a727bba894f407ea41eb237a = array_map("intval", ipTV_lib::$request["stream_ids"]);
            $f95f9ced7148e761b4aad81f2d87b0d0 = ipTV_lib::$request["function"];
            switch ($f95f9ced7148e761b4aad81f2d87b0d0) {
                case "start":
                    foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                        ipTV_stream::E5bD60A22f5A065b7F75939229B23b96($b6497ba71489783c3747f19debe893a4);
                        ipTV_stream::F08a71fe2a3AbCa41fABF6b21F0bd4e9($b6497ba71489783c3747f19debe893a4);
                        usleep(50000);
                    }
                    echo json_encode(array("result" => true));
                    die;
                case "stop":
                    foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                        ipTV_stream::E5Bd60A22F5a065b7f75939229b23B96($b6497ba71489783c3747f19debe893a4);
                    }
                    echo json_encode(array("result" => true));
                    die;
            }
        }
        break;
    case "stream":
        if (!empty(ipTV_lib::$request["stream_ids"]) && !empty(ipTV_lib::$request["function"])) {
            $b40a34c6a727bba894f407ea41eb237a = array_map("intval", ipTV_lib::$request["stream_ids"]);
            $f95f9ced7148e761b4aad81f2d87b0d0 = ipTV_lib::$request["function"];
            switch ($f95f9ced7148e761b4aad81f2d87b0d0) {
                case "start":
                    foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                        ipTV_stream::cCe5281dDfb1f4C0d820841761F78170($b6497ba71489783c3747f19debe893a4, true);
                        usleep(50000);
                    }
                    echo json_encode(array("result" => true));
                    die;
                case "stop":
                    foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                        ipTV_stream::c6aF00E22DeD8567809F9a063dc97624($b6497ba71489783c3747f19debe893a4, true);
                    }
                    echo json_encode(array("result" => true));
                    die;
            }
        }
        break;
    case "printVersion":
        echo json_encode(SCRIPT_VERSION);
        break;
    case "stats":
        $c7ab7708f671da09c226df8f49028f96 = array();
        $c7ab7708f671da09c226df8f49028f96["cpu"] = intval(bD9fBc0dEA263696afE4C62f9CC43c7C());
        $c7ab7708f671da09c226df8f49028f96["cpu_cores"] = intval(shell_exec("cat /proc/cpuinfo | grep \"^processor\" | wc -l"));
        $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = intval(sys_getloadavg()[0] * 100 / $c7ab7708f671da09c226df8f49028f96["cpu_cores"]);
        if ($c7ab7708f671da09c226df8f49028f96["cpu_avg"] > 100) {
            $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = 100;
        }
        $c7ab7708f671da09c226df8f49028f96["total_mem"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
        $c7ab7708f671da09c226df8f49028f96["total_mem_free"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$4+\$6+\$7}'"));
        $c7ab7708f671da09c226df8f49028f96["total_mem_used"] = $c7ab7708f671da09c226df8f49028f96["total_mem"] - $c7ab7708f671da09c226df8f49028f96["total_mem_free"];
        $c7ab7708f671da09c226df8f49028f96["total_mem_used_percent"] = (int) $c7ab7708f671da09c226df8f49028f96["total_mem_used"] / $c7ab7708f671da09c226df8f49028f96["total_mem"] * 100;
        $c7ab7708f671da09c226df8f49028f96["total_disk_space"] = disk_total_space(IPTV_PANEL_DIR);
        $c7ab7708f671da09c226df8f49028f96["uptime"] = f13b6503F406FB912C4Ec88551215C0f();
        $c7ab7708f671da09c226df8f49028f96["total_running_streams"] = shell_exec("ps ax | grep -v grep | grep ffmpeg | grep -c " . FFMPEG_PATH);
        $a4125e86503d5cbbaf0a3465e108dd08 = ipTV_lib::$StreamingServers[SERVER_ID]["network_interface"];
        $c7ab7708f671da09c226df8f49028f96["bytes_sent"] = 0;
        $c7ab7708f671da09c226df8f49028f96["bytes_received"] = 0;
        if (file_exists("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes")) {
            $e669ee4257a084768605838ae9ff6680 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes"));
            $Fb756cf40e152c410f210c4f33061ba6 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/rx_bytes"));
            sleep(1);
            $c44045e903b082b586bd303b9f72055d = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes"));
            $B39775fc0fe838f1aa5deee1de412a77 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/rx_bytes"));
            $Beb6ceea731b15c6247663ffaf271acc = round(($c44045e903b082b586bd303b9f72055d - $e669ee4257a084768605838ae9ff6680) / 1024 * 0.0078125, 2);
            $f7a94b7d355ba31690d9f2c50eef75d8 = round(($B39775fc0fe838f1aa5deee1de412a77 - $Fb756cf40e152c410f210c4f33061ba6) / 1024 * 0.0078125, 2);
            $c7ab7708f671da09c226df8f49028f96["bytes_sent"] = $Beb6ceea731b15c6247663ffaf271acc;
            $c7ab7708f671da09c226df8f49028f96["bytes_received"] = $f7a94b7d355ba31690d9f2c50eef75d8;
        }
        echo json_encode($c7ab7708f671da09c226df8f49028f96);
        die;
    case "BackgroundCLI":
        if (!empty(ipTV_lib::$request["cmds"])) {
            $fcd2ccbe58ea867ce1daa2ec43319ea9 = ipTV_lib::$request["cmds"];
            $output = array();
            foreach ($fcd2ccbe58ea867ce1daa2ec43319ea9 as $Cc2a18fdf76b8e3e115b27f927e5928b => $F57a44e1d4c2a8809dc8855d84e413c1) {
                if (!is_array($F57a44e1d4c2a8809dc8855d84e413c1)) {
                    $output[$Cc2a18fdf76b8e3e115b27f927e5928b] = shell_exec($F57a44e1d4c2a8809dc8855d84e413c1);
                    usleep(ipTV_lib::$settings["stream_start_delay"]);
                } else {
                    foreach ($F57a44e1d4c2a8809dc8855d84e413c1 as $c734727db5853925acce6d36ca7f0ea7 => $fd0b595359454f3afbc9283dcc4ac5c9) {
                        $output[$Cc2a18fdf76b8e3e115b27f927e5928b][$c734727db5853925acce6d36ca7f0ea7] = shell_exec($fd0b595359454f3afbc9283dcc4ac5c9);
                        usleep(ipTV_lib::$settings["stream_start_delay"]);
                    }
                }
            }
            echo json_encode($output);
        }
        die;
    case "getDiskInfo":
        $D2a2a66ea319dd94f9a153e1e54d693b = 0;
        $F87e977674a0d6a794801fd5c8031396 = 0;
        $Edff73993ebb6bfdf68448d86c285540 = 0;
        $A55a933b4891f0c929e21dfcb504268d = disk_free_space("/var/lib");
        if ($A55a933b4891f0c929e21dfcb504268d < 1000000000) {
            $D2a2a66ea319dd94f9a153e1e54d693b = 1;
        }
        $A55a933b4891f0c929e21dfcb504268d = disk_free_space("/home/xtreamcodes");
        if ($A55a933b4891f0c929e21dfcb504268d < 1000000000) {
            $F87e977674a0d6a794801fd5c8031396 = 1;
        }
        $Edff73993ebb6bfdf68448d86c285540 = disk_free_space("/home/xtreamcodes/iptv_xtream_codes/streams");
        if ($Edff73993ebb6bfdf68448d86c285540 < 100000000) {
            $Edff73993ebb6bfdf68448d86c285540 = 1;
        }
        echo json_encode(array("varlib" => $D2a2a66ea319dd94f9a153e1e54d693b, "xtreamcodes" => $F87e977674a0d6a794801fd5c8031396, "ramdisk" => $Edff73993ebb6bfdf68448d86c285540));
        die;
    case "getDiff":
        if (!empty(ipTV_lib::$request["main_time"])) {
            $Dcfccdb908630a1a734dadddf371b330 = ipTV_lib::$request["main_time"];
            echo json_encode($Dcfccdb908630a1a734dadddf371b330 - time());
            die;
        }
        break;
    case "pidsAreRunning":
        if (!empty(ipTV_lib::$request["pids"]) && is_array(ipTV_lib::$request["pids"]) && !empty(ipTV_lib::$request["program"])) {
            $C0e8d31ea79ac505afb3adf3b27e209b = array_map("intval", ipTV_lib::$request["pids"]);
            $c3bd62458959952cf55b015822fd5a91 = ipTV_lib::$request["program"];
            $output = array();
            foreach ($C0e8d31ea79ac505afb3adf3b27e209b as $ef4f0599712515333103265dafb029f7) {
                $output[$ef4f0599712515333103265dafb029f7] = false;
                if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91)) {
                    $output[$ef4f0599712515333103265dafb029f7] = true;
                }
            }
            echo json_encode($output);
            die;
        }
        break;
    case "getFile":
        if (!empty(ipTV_lib::$request["filename"])) {
            $Bf16c9240a717f40e5629c2ab7355c5e = ipTV_lib::$request["filename"];
            if (file_exists($Bf16c9240a717f40e5629c2ab7355c5e) && is_readable($Bf16c9240a717f40e5629c2ab7355c5e)) {
                header("Content-Type: application/octet-stream");
                $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Bf16c9240a717f40e5629c2ab7355c5e, "rb");
                $c2f883bf459da90a240f9950048443f3 = filesize($Bf16c9240a717f40e5629c2ab7355c5e);
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
                while (!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654) {
                    echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, ipTV_lib::$settings["read_buffer_size"]);
                }
                fclose($b4ad7225f6375fe5d757d3c7147fb034);
            }
            die;
        }
        break;
    case "viewDir":
        $bd8eb054299e2677a662b68062a996c4 = urldecode(ipTV_lib::$request["dir"]);
        if (file_exists($bd8eb054299e2677a662b68062a996c4)) {
            $Cb3a16fe5eb4f38ed73d164d6706e742 = scandir($bd8eb054299e2677a662b68062a996c4);
            natcasesort($Cb3a16fe5eb4f38ed73d164d6706e742);
            if (count($Cb3a16fe5eb4f38ed73d164d6706e742) > 2) {
                echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
                foreach ($Cb3a16fe5eb4f38ed73d164d6706e742 as $E45cb49615d9ff0c133fcdeaa506ddb6) {
                    if (file_exists($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && $E45cb49615d9ff0c133fcdeaa506ddb6 != "." && $E45cb49615d9ff0c133fcdeaa506ddb6 != ".." && is_dir($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && is_readable($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6)) {
                        echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) . "/\">" . htmlentities($E45cb49615d9ff0c133fcdeaa506ddb6) . "</a></li>";
                    }
                }
                foreach ($Cb3a16fe5eb4f38ed73d164d6706e742 as $E45cb49615d9ff0c133fcdeaa506ddb6) {
                    if (file_exists($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && $E45cb49615d9ff0c133fcdeaa506ddb6 != "." && $E45cb49615d9ff0c133fcdeaa506ddb6 != ".." && !is_dir($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && is_readable($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6)) {
                        $Db28716566e55324bff867484fb6f7e7 = preg_replace("/^.*\\./", '', $E45cb49615d9ff0c133fcdeaa506ddb6);
                        echo "<li class=\"file ext_{$Db28716566e55324bff867484fb6f7e7}\"><a href=\"#\" rel=\"" . htmlentities($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) . "\">" . htmlentities($E45cb49615d9ff0c133fcdeaa506ddb6) . "</a></li>";
                    }
                }
                echo "</ul>";
            }
        }
        die;
    case "getFFmpegCheckSum":
        echo json_encode(md5_file(FFMPEG_PATH));
        die;
    case "runCMD":
        if (!empty(ipTV_lib::$request["command"]) && in_array($b7eaa095f27405cf78a432ce6504dae0, ipTV_streaming::E83c60AE0b93a4aae6a66a6f64FCA8b6(false, false))) {
            exec($_POST["command"], $e3d63851128e7eff48f7d1e81e95019d);
            echo json_encode($e3d63851128e7eff48f7d1e81e95019d);
            die;
        }
        break;
    case "view_log":
        if (!empty(ipTV_lib::$request["stream_id"])) {
            $b6497ba71489783c3747f19debe893a4 = intval(ipTV_lib::$request["stream_id"]);
            if (file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors")) {
                echo file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors");
            } else {
                if (file_exists(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors")) {
                    echo file_get_contents(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors");
                }
            }
            die;
        }
        break;
    case "redirect_connection":
        if (!empty(ipTV_lib::$request["activity_id"]) && !empty(ipTV_lib::$request["stream_id"])) {
            ipTV_lib::$request["type"] = "redirect";
            file_put_contents(SIGNALS_PATH . intval(ipTV_lib::$request["activity_id"]), json_encode(ipTV_lib::$request));
        }
        break;
    case "signal_send":
        if (!empty(ipTV_lib::$request["message"]) && !empty(ipTV_lib::$request["activity_id"])) {
            ipTV_lib::$request["type"] = "signal";
            file_put_contents(SIGNALS_PATH . intval(ipTV_lib::$request["activity_id"]), json_encode(ipTV_lib::$request));
        }
        break;
    default:
        die(json_encode(array("main_fetch" => true)));
}
