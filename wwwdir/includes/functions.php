<?php
function f08CC5c567cD66B30A2a1f399445489C($c4f2e017c25217ae776c514360d87c14, $Cc2a18fdf76b8e3e115b27f927e5928b) {
    $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
    $B7fc3b4e141984f6f3022df909b559bd = '';
    foreach (str_split($c4f2e017c25217ae776c514360d87c14) as $f3fc50ad60d4f325ae0634af14d6f6db) {
        $B7fc3b4e141984f6f3022df909b559bd .= chr(ord($f3fc50ad60d4f325ae0634af14d6f6db) ^ ord($Cc2a18fdf76b8e3e115b27f927e5928b[$Ced112d15c5a3c9e5ba92478d0228e93++ % strlen($Cc2a18fdf76b8e3e115b27f927e5928b)]));
    }
    return $B7fc3b4e141984f6f3022df909b559bd;
}
function c2E1CA22613B17Bf832806EB2F8e484C() {
    $c7ab7708f671da09c226df8f49028f96 = array();
    $c7ab7708f671da09c226df8f49028f96["cpu"] = intval(bD9FbC0DEA263696AFE4c62f9CC43C7C());
    $c7ab7708f671da09c226df8f49028f96["cpu_cores"] = intval(shell_exec("cat /proc/cpuinfo | grep \"^processor\" | wc -l"));
    $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = intval(sys_getloadavg()[0] * 100 / $c7ab7708f671da09c226df8f49028f96["cpu_cores"]);
    if ($c7ab7708f671da09c226df8f49028f96["cpu_avg"] > 100) {
        $c7ab7708f671da09c226df8f49028f96["cpu_avg"] = 100;
    }
    $B447c6366978a6843ac28093a89a8da8 = (int) trim(shell_exec("free | grep -c available"));
    if ($B447c6366978a6843ac28093a89a8da8 == 0) {
        $c7ab7708f671da09c226df8f49028f96["total_mem"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
        $c7ab7708f671da09c226df8f49028f96["total_mem_free"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$4+\$6+\$7}'"));
    } else {
        $c7ab7708f671da09c226df8f49028f96["total_mem"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$2}'"));
        $c7ab7708f671da09c226df8f49028f96["total_mem_free"] = intval(shell_exec("/usr/bin/free -tk | grep -i Mem: | awk '{print \$7}'"));
    }
    $c7ab7708f671da09c226df8f49028f96["total_mem_used"] = $c7ab7708f671da09c226df8f49028f96["total_mem"] - $c7ab7708f671da09c226df8f49028f96["total_mem_free"];
    $c7ab7708f671da09c226df8f49028f96["total_mem_used_percent"] = (int) $c7ab7708f671da09c226df8f49028f96["total_mem_used"] / $c7ab7708f671da09c226df8f49028f96["total_mem"] * 100;
    $c7ab7708f671da09c226df8f49028f96["total_disk_space"] = disk_total_space(IPTV_PANEL_DIR);
    $c7ab7708f671da09c226df8f49028f96["uptime"] = f13b6503f406fB912c4EC88551215c0f();
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
    $c7ab7708f671da09c226df8f49028f96["cpu_load_average"] = sys_getloadavg()[0];
    return $c7ab7708f671da09c226df8f49028f96;
}
function d4b07b867deCABF1143a3f821224167c($Dfa618a096444a88ace702dece7d9654, $C671e9e0a59f18412464d71d67ba55c7 = null) {
    global $ipTV_db;
    $b438af56c1b4a7bfe991147fc7ce11b8 = '';
    if (!empty($C671e9e0a59f18412464d71d67ba55c7)) {
        $b438af56c1b4a7bfe991147fc7ce11b8 = "WHERE t1.server_id = '" . intval($C671e9e0a59f18412464d71d67ba55c7) . "'";
    }
    switch ($Dfa618a096444a88ace702dece7d9654) {
        case "open":
            $e86143ae714b5db9373cfb584f8aaf70 = "\n                SELECT t1.*,t2.*,t3.*,t5.bitrate\n                FROM `user_activity_now` t1\n                LEFT JOIN `users` t2 ON t2.id = t1.user_id\n                LEFT JOIN `streams` t3 ON t3.id = t1.stream_id\n                LEFT JOIN `streams_sys` t5 ON t5.stream_id = t1.stream_id AND t5.server_id = t1.server_id\n                {$b438af56c1b4a7bfe991147fc7ce11b8}\n                ORDER BY t1.activity_id ASC";
            break;
        case "closed":
            $e86143ae714b5db9373cfb584f8aaf70 = "\n                SELECT t1.*,t2.*,t3.*,t5.bitrate\n                FROM `user_activity` t1\n                LEFT JOIN `users` t2 ON t2.id = t1.user_id\n                LEFT JOIN `streams` t3 ON t3.id = t1.stream_id\n                LEFT JOIN `streams_sys` t5 ON t5.stream_id = t1.stream_id AND t5.server_id = t1.server_id\n                {$b438af56c1b4a7bfe991147fc7ce11b8}\n                ORDER BY t1.activity_id ASC";
            break;
    }
    $ipTV_db->query($e86143ae714b5db9373cfb584f8aaf70);
    return $ipTV_db->get_rows(true, "user_id", false);
}
function Efc0aEb4B245b992b0f2A749dac55820($C3cd02a609fd2e2fce50181271eadd0e, $f40a809702dde69dc98935191727489e = 600) {
    if (file_exists($C3cd02a609fd2e2fce50181271eadd0e)) {
        $ef4f0599712515333103265dafb029f7 = trim(file_get_contents($C3cd02a609fd2e2fce50181271eadd0e));
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7)) {
            if (time() - filemtime($C3cd02a609fd2e2fce50181271eadd0e) < $f40a809702dde69dc98935191727489e) {
                die("Running...");
            }
            posix_kill($ef4f0599712515333103265dafb029f7, 9);
        }
    }
    file_put_contents($C3cd02a609fd2e2fce50181271eadd0e, getmypid());
    return false;
}
function bD9Fbc0DEa263696AFE4c62F9cC43C7C() {
    $C509548039a7fd0656a288f295717917 = intval(shell_exec("ps aux|awk 'NR > 0 { s +=\$3 }; END {print s}'"));
    $bf4600f5d510ffdeb10d8a3bd843fbfa = intval(shell_exec("grep --count processor /proc/cpuinfo"));
    return intval($C509548039a7fd0656a288f295717917 / $bf4600f5d510ffdeb10d8a3bd843fbfa);
}
function cf78a30169E3F4a75226712Bf3f1A141() {
    return substr(md5(ipTV_lib::$settings["unique_id"]), 0, 15);
}
function dC21D452Ebb663Fc8CC7497b46c2a2DA() {
    if (file_exists(TMP_DIR . "crontab_refresh")) {
        return false;
    }
    $d9cb55dd9a4ad4e10ab6b386d5e76189 = scandir(CRON_PATH);
    $Cc3bc233a822e5f9ab41521e606004fb = array();
    foreach ($d9cb55dd9a4ad4e10ab6b386d5e76189 as $de5bdccba050fecbee4b9672d09d648e) {
        $Be92fd0f9dca5f4fe58fcec056830842 = CRON_PATH . $de5bdccba050fecbee4b9672d09d648e;
        if (is_file($Be92fd0f9dca5f4fe58fcec056830842)) {
            if (!(pathinfo($Be92fd0f9dca5f4fe58fcec056830842, PATHINFO_EXTENSION) != "php")) {
                $Cc3bc233a822e5f9ab41521e606004fb[] = "*/1 * * * * " . PHP_BIN . " " . $Be92fd0f9dca5f4fe58fcec056830842 . " # Xtream-Codes IPTV Panel";
            }
        }
    }
    $fe7aa2485f8fed415f0212bd3dd16840 = trim(shell_exec("crontab -l"));
    if (!empty($fe7aa2485f8fed415f0212bd3dd16840)) {
        $F26ef5e6bb02b59575ba7aa672469a63 = explode("\n", $fe7aa2485f8fed415f0212bd3dd16840);
        $F26ef5e6bb02b59575ba7aa672469a63 = array_map("trim", $F26ef5e6bb02b59575ba7aa672469a63);
        if ($F26ef5e6bb02b59575ba7aa672469a63 == $Cc3bc233a822e5f9ab41521e606004fb) {
            file_put_contents(TMP_DIR . "crontab_refresh", 1);
            return true;
        }
        $bbf03db42d5f3d788c0f9e1b528c9b5c = count($F26ef5e6bb02b59575ba7aa672469a63);
        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        while ($Ced112d15c5a3c9e5ba92478d0228e93 < $bbf03db42d5f3d788c0f9e1b528c9b5c) {
            if (stripos($F26ef5e6bb02b59575ba7aa672469a63[$Ced112d15c5a3c9e5ba92478d0228e93], CRON_PATH)) {
                unset($F26ef5e6bb02b59575ba7aa672469a63[$Ced112d15c5a3c9e5ba92478d0228e93]);
            }
            $Ced112d15c5a3c9e5ba92478d0228e93++;
        }
        foreach ($Cc3bc233a822e5f9ab41521e606004fb as $d1b6fd98dddabc1f61dad95114df60fc) {
            array_push($F26ef5e6bb02b59575ba7aa672469a63, $d1b6fd98dddabc1f61dad95114df60fc);
        }
    } else {
        $F26ef5e6bb02b59575ba7aa672469a63 = $Cc3bc233a822e5f9ab41521e606004fb;
    }
    shell_exec("crontab -r");
    $Ec87292498b49ac01881c84fbfa5695f = tempnam("/tmp", "crontab");
    $A7cd68109a3d420b829e6d9425875c6d = fopen($Ec87292498b49ac01881c84fbfa5695f, "w");
    fwrite($A7cd68109a3d420b829e6d9425875c6d, implode("\r\n", $F26ef5e6bb02b59575ba7aa672469a63) . "\r\n");
    fclose($A7cd68109a3d420b829e6d9425875c6d);
    shell_exec("crontab {$Ec87292498b49ac01881c84fbfa5695f}");
    @unlink($Ec87292498b49ac01881c84fbfa5695f);
    file_put_contents(TMP_DIR . "crontab_refresh", 1);
}
function Af2b2d2022eC3FF730194014E66593a0($F824f448699b01e56f80a3e8d83c0fef) {
    $af3692eb90cde68c0f6813893d13a3c2 = 60;
    $c5ed0fda6c84d0de6ef1c5451e2e593a = 60 * $af3692eb90cde68c0f6813893d13a3c2;
    $A80849db201a6ebdf5d7b9b35180fab7 = 24 * $c5ed0fda6c84d0de6ef1c5451e2e593a;
    $D63d1d8be3baf42c029b2fc5cb0781b3 = (int) floor($F824f448699b01e56f80a3e8d83c0fef / $A80849db201a6ebdf5d7b9b35180fab7);
    $f4d6e5cb7b81bc94223e6a701ca18aec = $F824f448699b01e56f80a3e8d83c0fef % $A80849db201a6ebdf5d7b9b35180fab7;
    $f70b4408f306b0946d856dd29a25b89c = (int) floor($f4d6e5cb7b81bc94223e6a701ca18aec / $c5ed0fda6c84d0de6ef1c5451e2e593a);
    $a58c1c17edf77a05eadc5e42afdedbd0 = $f4d6e5cb7b81bc94223e6a701ca18aec % $c5ed0fda6c84d0de6ef1c5451e2e593a;
    $C3701408f451b56ac9f60cf02f5867b3 = (int) floor($a58c1c17edf77a05eadc5e42afdedbd0 / $af3692eb90cde68c0f6813893d13a3c2);
    $C3ef6ed409c87f56145943de6899231d = $a58c1c17edf77a05eadc5e42afdedbd0 % $af3692eb90cde68c0f6813893d13a3c2;
    $e3cf3851f7ee9d4e859bd7fdd6f6b33e = (int) ceil($C3ef6ed409c87f56145943de6899231d);
    $dd215f4a4ae637754f1f997b904748c1 = '';
    if ($D63d1d8be3baf42c029b2fc5cb0781b3 != 0) {
        $dd215f4a4ae637754f1f997b904748c1 .= "{$D63d1d8be3baf42c029b2fc5cb0781b3}d ";
    }
    if ($f70b4408f306b0946d856dd29a25b89c != 0) {
        $dd215f4a4ae637754f1f997b904748c1 .= "{$f70b4408f306b0946d856dd29a25b89c}h ";
    }
    if ($C3701408f451b56ac9f60cf02f5867b3 != 0) {
        $dd215f4a4ae637754f1f997b904748c1 .= "{$C3701408f451b56ac9f60cf02f5867b3}m ";
    }
    $dd215f4a4ae637754f1f997b904748c1 .= "{$e3cf3851f7ee9d4e859bd7fdd6f6b33e}s";
    return $dd215f4a4ae637754f1f997b904748c1;
}
function f13B6503f406FB912c4EC88551215c0f() {
    if (file_exists("/proc/uptime") and is_readable("/proc/uptime")) {
        $f8618cbd66ff63e83b2ada78f7b7063d = explode(" ", file_get_contents("/proc/uptime"));
        return Af2B2D2022EC3ff730194014E66593a0(intval($f8618cbd66ff63e83b2ada78f7b7063d[0]));
    }
    return '';
}
