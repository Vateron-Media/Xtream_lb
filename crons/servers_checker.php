<?php

if ($argc) {
    require str_replace("\\", "/", dirname($argv[0])) . "/../wwwdir/init.php";
    $D3b211a38e2eb607ab17f4f6770932e5 = TMP_DIR . md5(UniqueID() . __FILE__);
    KillProcessCmd($D3b211a38e2eb607ab17f4f6770932e5);
    echo "File: " . $D3b211a38e2eb607ab17f4f6770932e5 . "\n";
    $a07da7f3de622b494d0320c93f523183 = intval(trim(shell_exec("ps aux | grep signal_receiver | grep -v grep | wc -l")));
    if ($a07da7f3de622b494d0320c93f523183 == 0) {
        shell_exec(PHP_BIN . " " . IPTV_PANEL_DIR . "tools/signal_receiver.php > /dev/null 2>/dev/null &");
    }
    $Bf59bc81ced001428fafff9d684b3e5d = intval(trim(shell_exec("ps aux | grep pipe_reader | grep -v grep | wc -l")));
    if ($Bf59bc81ced001428fafff9d684b3e5d == 0) {
        shell_exec(PHP_BIN . " " . IPTV_PANEL_DIR . "tools/pipe_reader.php > /dev/null 2>/dev/null &");
    }
    $eb9a31bf0ac157ee09adf2a6213fcd27 = intval(trim(shell_exec("ps aux | grep watchdog_data | grep -v grep | wc -l")));
    if ($eb9a31bf0ac157ee09adf2a6213fcd27 == 0) {
        shell_exec(PHP_BIN . " " . IPTV_PANEL_DIR . "tools/watchdog_data.php > /dev/null 2>/dev/null &");
    }
    $E8aba7524598d052fbd174c5a0e1cb52 = ipTV_servers::C9F95DF7FAFb411701ded135f62E3bB5(MAIN_SERVER_ID, ipTV_lib::$StreamingServers[MAIN_SERVER_ID]["api_url_ip"] . "&action=getDiff", ["main_time" => time()], 5, 5);
    if ($E8aba7524598d052fbd174c5a0e1cb52 !== false && is_numeric($E8aba7524598d052fbd174c5a0e1cb52)) {
        $E8aba7524598d052fbd174c5a0e1cb52 = -1 * $E8aba7524598d052fbd174c5a0e1cb52;
        $ipTV_db->query("UPDATE `streaming_servers` SET `diff_time_main` = '%d' WHERE `id` = '%d'", $E8aba7524598d052fbd174c5a0e1cb52, SERVER_ID);
    } else {
        $E8aba7524598d052fbd174c5a0e1cb52 = ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"];
    }
    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
    while ($Ced112d15c5a3c9e5ba92478d0228e93 >= 2) {
        $afe98be45e10c223a52934381b211730 = microtime(true);
        $Beb85f0c05e519f48a14915b66ad155c = json_decode(ipTV_servers::C9f95Df7FaFb411701deD135f62E3Bb5(SERVER_ID, ipTV_lib::$StreamingServers[SERVER_ID]["api_url_ip_local"], []), true);
        if (is_array($Beb85f0c05e519f48a14915b66ad155c) && $Beb85f0c05e519f48a14915b66ad155c["main_fetch"]) {
            $Eb94d9b64872b86d6715f9f655b8da94 = microtime(true);
            $Dec7b5ea9cc81b6c8a97f9e8c7a7b24a = (float) number_format($Eb94d9b64872b86d6715f9f655b8da94 - $afe98be45e10c223a52934381b211730, 3);
        } else {
            $Ced112d15c5a3c9e5ba92478d0228e93++;
        }
    }
    if (is_array($Beb85f0c05e519f48a14915b66ad155c) && $Beb85f0c05e519f48a14915b66ad155c["main_fetch"]) {
        $B447c6366978a6843ac28093a89a8da8 = (int) trim(shell_exec("free | grep -c available"));
        if ($B447c6366978a6843ac28093a89a8da8 == 0) {
            $a42a4523778a838164fc9e858f480569 = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
            $b19e13ab63f7dd2b92f8f8192a72cec2 = $a42a4523778a838164fc9e858f480569 - intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$4+\$6+\$7}'"));
        } else {
            $a42a4523778a838164fc9e858f480569 = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
            $b19e13ab63f7dd2b92f8f8192a72cec2 = $a42a4523778a838164fc9e858f480569 - intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$7}'"));
        }
        $bf4600f5d510ffdeb10d8a3bd843fbfa = intval(shell_exec("lscpu | awk -F \" : \" '/Core/ { c=\$2; }; /Socket/ { print c*\$2 }' "));
        $a9fbca3e4ce3a513b63e08e53f7ba11f = intval(shell_exec("grep --count ^processor /proc/cpuinfo"));
        $aa2921990540dfbf7eb37432e4968fa1 = trim(shell_exec("cat /proc/cpuinfo | grep 'model name' | uniq | awk -F: '{print \$2}'"));
        $Ed994dfb9b40ff0c7bb05c6dead6f11f = intval(shell_exec("ps aux|awk 'NR > 0 { s +=\$3 }; END {print s}'"));
        $a4125e86503d5cbbaf0a3465e108dd08 = ipTV_lib::$StreamingServers[SERVER_ID]["network_interface"];
        $Beb6ceea731b15c6247663ffaf271acc = $f7a94b7d355ba31690d9f2c50eef75d8 = $E905db75a588830f4a662cb7237b8391 = NULL;
        if (!empty($a4125e86503d5cbbaf0a3465e108dd08)) {
            $E905db75a588830f4a662cb7237b8391 = file_get_contents("/sys/class/net/" . $a4125e86503d5cbbaf0a3465e108dd08 . "/speed");
            $e669ee4257a084768605838ae9ff6680 = trim(file_get_contents("/sys/class/net/" . $a4125e86503d5cbbaf0a3465e108dd08 . "/statistics/tx_bytes"));
            $Fb756cf40e152c410f210c4f33061ba6 = trim(file_get_contents("/sys/class/net/" . $a4125e86503d5cbbaf0a3465e108dd08 . "/statistics/rx_bytes"));
            sleep(1);
            $c44045e903b082b586bd303b9f72055d = trim(file_get_contents("/sys/class/net/" . $a4125e86503d5cbbaf0a3465e108dd08 . "/statistics/tx_bytes"));
            $B39775fc0fe838f1aa5deee1de412a77 = trim(file_get_contents("/sys/class/net/" . $a4125e86503d5cbbaf0a3465e108dd08 . "/statistics/rx_bytes"));
            $Beb6ceea731b15c6247663ffaf271acc = round(($c44045e903b082b586bd303b9f72055d - $e669ee4257a084768605838ae9ff6680) / 1024 * 0, 2);
            $f7a94b7d355ba31690d9f2c50eef75d8 = round(($B39775fc0fe838f1aa5deee1de412a77 - $Fb756cf40e152c410f210c4f33061ba6) / 1024 * 0, 2);
        }
        $b94eb1bfd1bc39266c27ff43eb593d9b = shell_exec("ps ax | grep -v grep | grep ffmpeg | grep -c " . FFMPEG_PATH);
        $b9c2708ddebc9970f7c5ddc55aba1a07 = ["total_ram" => $a42a4523778a838164fc9e858f480569, "total_used" => $b19e13ab63f7dd2b92f8f8192a72cec2, "cores" => $bf4600f5d510ffdeb10d8a3bd843fbfa, "threads" => $a9fbca3e4ce3a513b63e08e53f7ba11f, "kernel" => trim(shell_exec("uname -r")), "cpu_name" => $aa2921990540dfbf7eb37432e4968fa1, "total_running_streams" => $b94eb1bfd1bc39266c27ff43eb593d9b, "cpu_usage" => (int) $Ed994dfb9b40ff0c7bb05c6dead6f11f / $a9fbca3e4ce3a513b63e08e53f7ba11f, "network_speed" => $E905db75a588830f4a662cb7237b8391, "bytes_sent" => $Beb6ceea731b15c6247663ffaf271acc, "bytes_received" => $f7a94b7d355ba31690d9f2c50eef75d8];
        $B46644daa5f44afb9d15520b844a615d = array_values(array_unique(array_map("trim", explode("\n", shell_exec("ip -4 addr | grep -oP '(?<=inet\\s)\\d+(\\.\\d+){3}'")))));
        $ipTV_db->query("UPDATE `streaming_servers` SET `server_hardware` = '%s',`last_check_ago` = '%d',`latency` = '%f',`whitelist_ips` = '%s' WHERE `id` = '%d'", json_encode($b9c2708ddebc9970f7c5ddc55aba1a07), time() + $E8aba7524598d052fbd174c5a0e1cb52, $Dec7b5ea9cc81b6c8a97f9e8c7a7b24a, json_encode($B46644daa5f44afb9d15520b844a615d), SERVER_ID);
        if (ipTV_lib::$StreamingServers[SERVER_ID]["status"] == 2) {
            $ipTV_db->query("UPDATE `streaming_servers` SET `status` = 1 WHERE `id` = '%d'", SERVER_ID);
        }
    }
    @unlink($D3b211a38e2eb607ab17f4f6770932e5);
} else {
    exit(0);
}
