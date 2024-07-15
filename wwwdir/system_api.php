<?php

set_time_limit(0);
require "init.php";
header("X-Accel-Buffering: no");
header("Access-Control-Allow-Origin: *");
$b7eaa095f27405cf78a432ce6504dae0 = $_SERVER["REMOTE_ADDR"];
if (!(empty(E2d73953a5089b9C7983838F61F23aCf::$request["password"]) || E2D73953a5089B9C7983838f61F23AcF::$request["password"] != E2D73953a5089B9c7983838f61F23acF::$settings["live_streaming_pass"])) {
    if (in_array($b7eaa095f27405cf78a432ce6504dae0, f1Ca094152763c79018e9F1893Ef1e48::E83C60ae0B93a4AAE6a66a6f64FCA8B6(false))) {
        $Cfd5aeeef0d1970527f63419de620a46 = !empty(e2D73953a5089b9C7983838F61f23Acf::$request["action"]) ? e2d73953A5089b9c7983838f61f23acf::$request["action"] : '';
        switch ($Cfd5aeeef0d1970527f63419de620a46) {
            case "reset_cache":
                $E179fbf94a7c2de093622901d974626c = opcache_reset();
                echo (int) $E179fbf94a7c2de093622901d974626c;
                die;
            case "vod":
                if (!(!empty(e2d73953A5089B9c7983838F61F23ACF::$request["stream_ids"]) && !empty(e2d73953a5089B9c7983838f61f23acf::$request["function"]))) {
                    goto bc42c03829ae12364b0f3aca5ffa76b2;
                }
                $b40a34c6a727bba894f407ea41eb237a = array_map("intval", E2D73953A5089b9C7983838F61F23ACF::$request["stream_ids"]);
                $f95f9ced7148e761b4aad81f2d87b0d0 = E2d73953a5089b9C7983838f61F23aCF::$request["function"];
                switch ($f95f9ced7148e761b4aad81f2d87b0d0) {
                    case "start":
                        foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                            c872BCFa04b3eAee1B4A93a0d775b9D7::E5bD60A22f5A065b7F75939229B23b96($b6497ba71489783c3747f19debe893a4);
                            c872bcfa04b3eAee1b4A93A0D775B9D7::F08a71fe2a3AbCa41fABF6b21F0bd4e9($b6497ba71489783c3747f19debe893a4);
                            usleep(50000);
                        }
                        echo json_encode(array("result" => true));
                        die;
                    case "stop":
                        foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                            c872bcFA04B3eaEe1b4A93a0D775b9d7::E5Bd60A22F5a065b7f75939229b23B96($b6497ba71489783c3747f19debe893a4);
                        }
                        echo json_encode(array("result" => true));
                        die;
                }
                Fb44385c3815c045a36389aaa05d0e4c:
                bc42c03829ae12364b0f3aca5ffa76b2:
                goto c05fc001c3e8eafc15533f7f26aadbfa;
            case "stream":
                if (!(!empty(E2D73953A5089b9C7983838F61f23AcF::$request["stream_ids"]) && !empty(E2D73953a5089b9C7983838f61f23aCf::$request["function"]))) {
                    goto C3668ce7fb6a3899945c423a55485de7;
                }
                $b40a34c6a727bba894f407ea41eb237a = array_map("intval", E2D73953A5089B9c7983838f61f23ACF::$request["stream_ids"]);
                $f95f9ced7148e761b4aad81f2d87b0d0 = E2D73953A5089B9C7983838f61f23acf::$request["function"];
                switch ($f95f9ced7148e761b4aad81f2d87b0d0) {
                    case "start":
                        foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                            C872BCFa04B3eaEE1B4A93A0D775B9D7::cCe5281dDfb1f4C0d820841761F78170($b6497ba71489783c3747f19debe893a4, true);
                            usleep(50000);
                        }
                        echo json_encode(array("result" => true));
                        die;
                    case "stop":
                        foreach ($b40a34c6a727bba894f407ea41eb237a as $b6497ba71489783c3747f19debe893a4) {
                            c872Bcfa04B3EAEE1B4A93A0d775b9D7::c6aF00E22DeD8567809F9a063dc97624($b6497ba71489783c3747f19debe893a4, true);
                        }
                        echo json_encode(array("result" => true));
                        die;
                }
                d60d05f3d9441caa2cb4a7fcb6c37546:
                C3668ce7fb6a3899945c423a55485de7:
                goto c05fc001c3e8eafc15533f7f26aadbfa;
            case "printVersion":
                echo json_encode(SCRIPT_VERSION);
                goto c05fc001c3e8eafc15533f7f26aadbfa;
            case "stats":
                $c7ab7708f671da09c226df8f49028f96 = array();
                $c7ab7708f671da09c226df8f49028f96["cpu"] = intval(bD9fBc0dEA263696afE4C62f9CC43c7C());
                $c7ab7708f671da09c226df8f49028f96["cpu_cores"] = intval(shell_exec("cat /proc/cpuinfo | grep \"^processor\" | wc -l"));
                $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = intval(sys_getloadavg()[0] * 100 / $c7ab7708f671da09c226df8f49028f96["cpu_cores"]);
                if (!($c7ab7708f671da09c226df8f49028f96["cpu_avg"] > 100)) {
                    goto a9292ab79ce1cac8c918127b3899dd74;
                }
                $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = 100;
                a9292ab79ce1cac8c918127b3899dd74:
                $c7ab7708f671da09c226df8f49028f96["total_mem"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
                $c7ab7708f671da09c226df8f49028f96["total_mem_free"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$4+\$6+\$7}'"));
                $c7ab7708f671da09c226df8f49028f96["total_mem_used"] = $c7ab7708f671da09c226df8f49028f96["total_mem"] - $c7ab7708f671da09c226df8f49028f96["total_mem_free"];
                $c7ab7708f671da09c226df8f49028f96["total_mem_used_percent"] = (int) $c7ab7708f671da09c226df8f49028f96["total_mem_used"] / $c7ab7708f671da09c226df8f49028f96["total_mem"] * 100;
                $c7ab7708f671da09c226df8f49028f96["total_disk_space"] = disk_total_space(IPTV_PANEL_DIR);
                $c7ab7708f671da09c226df8f49028f96["uptime"] = f13b6503F406FB912C4Ec88551215C0f();
                $c7ab7708f671da09c226df8f49028f96["total_running_streams"] = shell_exec("ps ax | grep -v grep | grep ffmpeg | grep -c FFMPEG_PATH");
                $a4125e86503d5cbbaf0a3465e108dd08 = e2d73953A5089b9c7983838F61F23aCF::$StreamingServers[SERVER_ID]["network_interface"];
                $c7ab7708f671da09c226df8f49028f96["bytes_sent"] = 0;
                $c7ab7708f671da09c226df8f49028f96["bytes_received"] = 0;
                if (!file_exists("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes")) {
                    goto E2008fc7ce8a4db22cb7b67a42248317;
                }
                $e669ee4257a084768605838ae9ff6680 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes"));
                $Fb756cf40e152c410f210c4f33061ba6 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/rx_bytes"));
                sleep(1);
                $c44045e903b082b586bd303b9f72055d = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/tx_bytes"));
                $B39775fc0fe838f1aa5deee1de412a77 = trim(file_get_contents("/sys/class/net/{$a4125e86503d5cbbaf0a3465e108dd08}/statistics/rx_bytes"));
                $Beb6ceea731b15c6247663ffaf271acc = round(($c44045e903b082b586bd303b9f72055d - $e669ee4257a084768605838ae9ff6680) / 1024 * 0.0078125, 2);
                $f7a94b7d355ba31690d9f2c50eef75d8 = round(($B39775fc0fe838f1aa5deee1de412a77 - $Fb756cf40e152c410f210c4f33061ba6) / 1024 * 0.0078125, 2);
                $c7ab7708f671da09c226df8f49028f96["bytes_sent"] = $Beb6ceea731b15c6247663ffaf271acc;
                $c7ab7708f671da09c226df8f49028f96["bytes_received"] = $f7a94b7d355ba31690d9f2c50eef75d8;
                E2008fc7ce8a4db22cb7b67a42248317:
                echo json_encode($c7ab7708f671da09c226df8f49028f96);
                die;
            case "BackgroundCLI":
                if (empty(e2D73953A5089b9C7983838f61F23acf::$request["cmds"])) {
                    goto f9db059336ff4d8f2649bc201ae6f10b;
                }
                $fcd2ccbe58ea867ce1daa2ec43319ea9 = E2d73953a5089b9c7983838F61F23ACF::$request["cmds"];
                $output = array();
                foreach ($fcd2ccbe58ea867ce1daa2ec43319ea9 as $Cc2a18fdf76b8e3e115b27f927e5928b => $F57a44e1d4c2a8809dc8855d84e413c1) {
                    if (!is_array($F57a44e1d4c2a8809dc8855d84e413c1)) {
                        $output[$Cc2a18fdf76b8e3e115b27f927e5928b] = shell_exec($F57a44e1d4c2a8809dc8855d84e413c1);
                        usleep(e2D73953a5089B9C7983838f61f23ACF::$settings["stream_start_delay"]);
                        goto Bd29c31c9096a66b0e0cb375143bbff5;
                    }
                    foreach ($F57a44e1d4c2a8809dc8855d84e413c1 as $c734727db5853925acce6d36ca7f0ea7 => $fd0b595359454f3afbc9283dcc4ac5c9) {
                        $output[$Cc2a18fdf76b8e3e115b27f927e5928b][$c734727db5853925acce6d36ca7f0ea7] = shell_exec($fd0b595359454f3afbc9283dcc4ac5c9);
                        usleep(E2D73953A5089B9C7983838f61F23aCf::$settings["stream_start_delay"]);
                    }
                    Bd29c31c9096a66b0e0cb375143bbff5:
                }
                echo json_encode($output);
                f9db059336ff4d8f2649bc201ae6f10b:
                die;
            case "getDiskInfo":
                $D2a2a66ea319dd94f9a153e1e54d693b = 0;
                $F87e977674a0d6a794801fd5c8031396 = 0;
                $Edff73993ebb6bfdf68448d86c285540 = 0;
                $A55a933b4891f0c929e21dfcb504268d = disk_free_space("/var/lib");
                if (!($A55a933b4891f0c929e21dfcb504268d < 1000000000)) {
                    goto Ae910d89011231819534eaf36a7b9c43;
                }
                $D2a2a66ea319dd94f9a153e1e54d693b = 1;
                Ae910d89011231819534eaf36a7b9c43:
                $A55a933b4891f0c929e21dfcb504268d = disk_free_space("/home/xtreamcodes");
                if (!($A55a933b4891f0c929e21dfcb504268d < 1000000000)) {
                    goto b2cc204cf3c064ba6d3ebab090b54868;
                }
                $F87e977674a0d6a794801fd5c8031396 = 1;
                b2cc204cf3c064ba6d3ebab090b54868:
                $Edff73993ebb6bfdf68448d86c285540 = disk_free_space("/home/xtreamcodes/iptv_xtream_codes/streams");
                if (!($Edff73993ebb6bfdf68448d86c285540 < 100000000)) {
                    goto e6c56357e099718317df9f86624cc577;
                }
                $Edff73993ebb6bfdf68448d86c285540 = 1;
                e6c56357e099718317df9f86624cc577:
                echo json_encode(array("varlib" => $D2a2a66ea319dd94f9a153e1e54d693b, "xtreamcodes" => $F87e977674a0d6a794801fd5c8031396, "ramdisk" => $Edff73993ebb6bfdf68448d86c285540));
                die;
            case "getDiff":
                if (empty(E2D73953a5089B9C7983838F61f23Acf::$request["main_time"])) {
                    goto c05fc001c3e8eafc15533f7f26aadbfa;
                }
                $Dcfccdb908630a1a734dadddf371b330 = e2D73953A5089B9C7983838f61F23AcF::$request["main_time"];
                echo json_encode($Dcfccdb908630a1a734dadddf371b330 - time());
                die;
            case "pidsAreRunning":
                if (!(!empty(e2d73953a5089B9C7983838f61F23acF::$request["pids"]) && is_array(e2d73953A5089b9c7983838f61f23ACf::$request["pids"]) && !empty(E2d73953A5089B9C7983838F61f23aCf::$request["program"]))) {
                    goto c05fc001c3e8eafc15533f7f26aadbfa;
                }
                $C0e8d31ea79ac505afb3adf3b27e209b = array_map("intval", E2D73953A5089b9C7983838f61F23acF::$request["pids"]);
                $c3bd62458959952cf55b015822fd5a91 = E2D73953a5089b9C7983838f61F23AcF::$request["program"];
                $output = array();
                foreach ($C0e8d31ea79ac505afb3adf3b27e209b as $ef4f0599712515333103265dafb029f7) {
                    $output[$ef4f0599712515333103265dafb029f7] = false;
                    if (!(file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91))) {
                        goto d31005007317ff8efa59e36e62696765;
                    }
                    $output[$ef4f0599712515333103265dafb029f7] = true;
                    d31005007317ff8efa59e36e62696765:
                }
                echo json_encode($output);
                die;
            case "getFile":
                if (empty(E2D73953a5089b9c7983838F61F23acF::$request["filename"])) {
                    goto c05fc001c3e8eafc15533f7f26aadbfa;
                }
                $Bf16c9240a717f40e5629c2ab7355c5e = E2d73953A5089b9c7983838F61f23AcF::$request["filename"];
                if (!(file_exists($Bf16c9240a717f40e5629c2ab7355c5e) && is_readable($Bf16c9240a717f40e5629c2ab7355c5e))) {
                    goto F1a6dd69b9af962007b11e31290e6b87;
                }
                header("Content-Type: application/octet-stream");
                $b4ad7225f6375fe5d757d3c7147fb034 = @fopen($Bf16c9240a717f40e5629c2ab7355c5e, "rb");
                $c2f883bf459da90a240f9950048443f3 = filesize($Bf16c9240a717f40e5629c2ab7355c5e);
                $adb6fe828c718151845abb8cc50ba1f4 = $c2f883bf459da90a240f9950048443f3;
                $start = 0;
                $Dfa618a096444a88ace702dece7d9654 = $c2f883bf459da90a240f9950048443f3 - 1;
                header("Accept-Ranges: 0-{$adb6fe828c718151845abb8cc50ba1f4}");
                if (!isset($_SERVER["HTTP_RANGE"])) {
                    goto A15bac605f92826e66a2a84d74ea00f1;
                }
                $e0d1376cc4243595a2ac3f530e229437 = $start;
                $e715c54a968c0c022972b99f8095f9b8 = $Dfa618a096444a88ace702dece7d9654;
                list(, $e9e34387b8f1113709cd9f6f23ef418d) = explode("=", $_SERVER["HTTP_RANGE"], 2);
                if (!(strpos($e9e34387b8f1113709cd9f6f23ef418d, ",") !== false)) {
                    if ($e9e34387b8f1113709cd9f6f23ef418d == "-") {
                        $e0d1376cc4243595a2ac3f530e229437 = $c2f883bf459da90a240f9950048443f3 - substr($e9e34387b8f1113709cd9f6f23ef418d, 1);
                        goto C0d4d6f3d22825c31f9418a3355be864;
                    }
                    $e9e34387b8f1113709cd9f6f23ef418d = explode("-", $e9e34387b8f1113709cd9f6f23ef418d);
                    $e0d1376cc4243595a2ac3f530e229437 = $e9e34387b8f1113709cd9f6f23ef418d[0];
                    $e715c54a968c0c022972b99f8095f9b8 = isset($e9e34387b8f1113709cd9f6f23ef418d[1]) && is_numeric($e9e34387b8f1113709cd9f6f23ef418d[1]) ? $e9e34387b8f1113709cd9f6f23ef418d[1] : $c2f883bf459da90a240f9950048443f3;
                    C0d4d6f3d22825c31f9418a3355be864:
                    $e715c54a968c0c022972b99f8095f9b8 = $e715c54a968c0c022972b99f8095f9b8 > $Dfa618a096444a88ace702dece7d9654 ? $Dfa618a096444a88ace702dece7d9654 : $e715c54a968c0c022972b99f8095f9b8;
                    if (!($e0d1376cc4243595a2ac3f530e229437 > $e715c54a968c0c022972b99f8095f9b8 || $e0d1376cc4243595a2ac3f530e229437 > $c2f883bf459da90a240f9950048443f3 - 1 || $e715c54a968c0c022972b99f8095f9b8 >= $c2f883bf459da90a240f9950048443f3)) {
                        $start = $e0d1376cc4243595a2ac3f530e229437;
                        $Dfa618a096444a88ace702dece7d9654 = $e715c54a968c0c022972b99f8095f9b8;
                        $adb6fe828c718151845abb8cc50ba1f4 = $Dfa618a096444a88ace702dece7d9654 - $start + 1;
                        fseek($b4ad7225f6375fe5d757d3c7147fb034, $start);
                        header("HTTP/1.1 206 Partial Content");
                        A15bac605f92826e66a2a84d74ea00f1:
                        header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                        header("Content-Length: " . $adb6fe828c718151845abb8cc50ba1f4);
                        fad102f0063d226d0113731fc6d3ec80:
                        if (!(!feof($b4ad7225f6375fe5d757d3c7147fb034) && ($B2dcc8d8fbd078a3e9963b74037ab315 = ftell($b4ad7225f6375fe5d757d3c7147fb034)) <= $Dfa618a096444a88ace702dece7d9654)) {
                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                            F1a6dd69b9af962007b11e31290e6b87:
                            die;
                        }
                        echo stream_get_line($b4ad7225f6375fe5d757d3c7147fb034, E2d73953A5089B9C7983838F61F23acf::$settings["read_buffer_size"]);
                        goto fad102f0063d226d0113731fc6d3ec80;
                    }
                    header("HTTP/1.1 416 Requested Range Not Satisfiable");
                    header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                    die;
                }
                header("HTTP/1.1 416 Requested Range Not Satisfiable");
                header("Content-Range: bytes {$start}-{$Dfa618a096444a88ace702dece7d9654}/{$c2f883bf459da90a240f9950048443f3}");
                die;
            case "viewDir":
                $bd8eb054299e2677a662b68062a996c4 = urldecode(e2D73953a5089B9c7983838f61F23aCf::$request["dir"]);
                if (!file_exists($bd8eb054299e2677a662b68062a996c4)) {
                    goto E95f0f3613f21e6f66b0cd69ea2dcd68;
                }
                $Cb3a16fe5eb4f38ed73d164d6706e742 = scandir($bd8eb054299e2677a662b68062a996c4);
                natcasesort($Cb3a16fe5eb4f38ed73d164d6706e742);
                if (!(count($Cb3a16fe5eb4f38ed73d164d6706e742) > 2)) {
                    goto F670fd37d82371a4e783c7819343df03;
                }
                echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
                foreach ($Cb3a16fe5eb4f38ed73d164d6706e742 as $E45cb49615d9ff0c133fcdeaa506ddb6) {
                    if (!(file_exists($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && $E45cb49615d9ff0c133fcdeaa506ddb6 != "." && $E45cb49615d9ff0c133fcdeaa506ddb6 != ".." && is_dir($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && is_readable($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6))) {
                        goto A921d0dbf8724c33aabd33cb32da40b7;
                    }
                    echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) . "/\">" . htmlentities($E45cb49615d9ff0c133fcdeaa506ddb6) . "</a></li>";
                    A921d0dbf8724c33aabd33cb32da40b7:
                }
                foreach ($Cb3a16fe5eb4f38ed73d164d6706e742 as $E45cb49615d9ff0c133fcdeaa506ddb6) {
                    if (!(file_exists($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && $E45cb49615d9ff0c133fcdeaa506ddb6 != "." && $E45cb49615d9ff0c133fcdeaa506ddb6 != ".." && !is_dir($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) && is_readable($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6))) {
                        goto be1b03ede5fc6e9e315dae22853f7b4b;
                    }
                    $Db28716566e55324bff867484fb6f7e7 = preg_replace("/^.*\\./", '', $E45cb49615d9ff0c133fcdeaa506ddb6);
                    echo "<li class=\"file ext_{$Db28716566e55324bff867484fb6f7e7}\"><a href=\"#\" rel=\"" . htmlentities($bd8eb054299e2677a662b68062a996c4 . $E45cb49615d9ff0c133fcdeaa506ddb6) . "\">" . htmlentities($E45cb49615d9ff0c133fcdeaa506ddb6) . "</a></li>";
                    be1b03ede5fc6e9e315dae22853f7b4b:
                }
                echo "</ul>";
                F670fd37d82371a4e783c7819343df03:
                E95f0f3613f21e6f66b0cd69ea2dcd68:
                die;
            case "getFFmpegCheckSum":
                echo json_encode(md5_file(FFMPEG_PATH));
                die;
            case "runCMD":
                if (!(!empty(e2d73953A5089b9c7983838F61F23acF::$request["command"]) && in_array($b7eaa095f27405cf78a432ce6504dae0, F1cA094152763c79018E9F1893ef1E48::E83c60AE0b93a4aae6a66a6f64FCA8b6(false, false)))) {
                    goto c05fc001c3e8eafc15533f7f26aadbfa;
                }
                exec($_POST["command"], $e3d63851128e7eff48f7d1e81e95019d);
                echo json_encode($e3d63851128e7eff48f7d1e81e95019d);
                die;
            case "view_log":
                if (empty(e2d73953A5089b9C7983838F61F23acf::$request["stream_id"])) {
                    goto c05fc001c3e8eafc15533f7f26aadbfa;
                }
                $b6497ba71489783c3747f19debe893a4 = intval(e2D73953a5089B9c7983838F61f23ACf::$request["stream_id"]);
                if (file_exists(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors")) {
                    echo file_get_contents(STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors");
                    goto E76f59e4f4fa6a8b10074f06f317a496;
                }
                if (file_exists(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors")) {
                    echo file_get_contents(MOVIES_PATH . $b6497ba71489783c3747f19debe893a4 . ".errors");
                    goto Feeb95e4fde3f7fc420accd1b046050b;
                }
                Feeb95e4fde3f7fc420accd1b046050b:
                E76f59e4f4fa6a8b10074f06f317a496:
                die;
            case "redirect_connection":
                if (!(!empty(E2D73953a5089B9c7983838F61f23acf::$request["activity_id"]) && !empty(E2D73953a5089b9c7983838f61f23acf::$request["stream_id"]))) {
                    goto Ce36e4412c1e84663a5e1741d69c1af7;
                }
                e2D73953A5089B9c7983838f61F23AcF::$request["type"] = "redirect";
                file_put_contents(SIGNALS_PATH . intval(e2D73953a5089b9c7983838F61f23Acf::$request["activity_id"]), json_encode(e2D73953A5089b9c7983838F61F23ACf::$request));
                Ce36e4412c1e84663a5e1741d69c1af7:
                goto c05fc001c3e8eafc15533f7f26aadbfa;
            case "signal_send":
                if (!(!empty(e2d73953A5089B9C7983838f61F23AcF::$request["message"]) && !empty(e2d73953a5089B9C7983838F61F23AcF::$request["activity_id"]))) {
                    goto edfe569f16d030f767aeb03d198e4016;
                }
                E2D73953a5089b9c7983838f61F23AcF::$request["type"] = "signal";
                file_put_contents(SIGNALS_PATH . intval(E2d73953a5089B9c7983838f61f23aCF::$request["activity_id"]), json_encode(E2D73953a5089b9C7983838F61F23Acf::$request));
                edfe569f16d030f767aeb03d198e4016:
                goto c05fc001c3e8eafc15533f7f26aadbfa;
            default:
                die(json_encode(array("main_fetch" => true)));
        }
        c05fc001c3e8eafc15533f7f26aadbfa:
        // [PHPDeobfuscator] Implied script end
        return;
    }
    die(json_encode(array("main_fetch" => false, "error" => "Not Allowed")));
}
die(json_encode(array("main_fetch" => false, "error" => "Wrong Password")));
