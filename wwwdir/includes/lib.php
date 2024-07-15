<?php
class ipTV_lib {
    public static $request = array();
    public static $ipTV_db;
    public static $settings = array();
    public static $StreamingServers = array();
    public static $SegmentsSettings = array();
    public static $MainServerInfo = array();
    public static $Bouquets = array();
    public static function init() {
        global $_INFO;
        if (!empty($_GET)) {
            self::FBbBF3bAb572F3560E9dfFd9ebBd4e20($_GET);
        }
        if (!empty($_POST)) {
            self::FBBBF3bAB572F3560e9dFfd9ebBD4E20($_POST);
        }
        if (!empty($_SESSION)) {
            self::FbBbF3BaB572f3560E9dffD9EbbD4E20($_SESSION);
        }
        if (!empty($_COOKIE)) {
            self::fBbBF3baB572f3560e9dFfD9EbBd4e20($_COOKIE);
        }
        $C6171fcdac3217d5a9b091fc2b3d261d = @self::aA40eE2FfDfe12452716429513430F2C($_GET, array());
        self::$request = @self::aa40eE2ffDFe12452716429513430f2c($_POST, $C6171fcdac3217d5a9b091fc2b3d261d);
        self::$settings = self::fAC158b2900eDa8d9feA9ce2a66b560d();
        date_default_timezone_set(self::$settings["default_timezone"]);
        self::$StreamingServers = self::f474abc8f654C5D28420A68068C18Dd5();
        if (FETCH_BOUQUETS) {
            self::$Bouquets = self::ce41C5CFE6432569F79B494C62AcEd7A();
        }
        if (self::$StreamingServers[SERVER_ID]["persistent_connections"] != $_INFO["pconnect"]) {
            $_INFO["pconnect"] = self::$StreamingServers[SERVER_ID]["persistent_connections"];
            if (!empty($_INFO) && is_array($_INFO) && !empty($_INFO["db_user"])) {
                file_put_contents(IPTV_PANEL_DIR . "config", base64_encode(F08cC5c567cD66b30a2a1F399445489c(json_encode($_INFO), CONFIG_CRYPT_KEY)), LOCK_EX);
            }
        }
        self::$SegmentsSettings = self::A657C8CD61954154981441e0dE806126();
        dC21d452ebb663fC8Cc7497B46C2a2DA();
    }
    public static function f7d0F36099B34B530E99A73f89464c99($A2e57573d62f751a39de8fa7429e3701, $cca009a6dd04ce553f0d1ac1b78fe926 = false) {
        if (file_exists(TMP_DIR . md5($A2e57573d62f751a39de8fa7429e3701)) && time() - filemtime(TMP_DIR . md5($A2e57573d62f751a39de8fa7429e3701)) <= 300) {
            return false;
        }
        $C31928bf7a6d860aae9dbe5c5bf9dbf8 = curl_init();
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_URL, $A2e57573d62f751a39de8fa7429e3701);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_TIMEOUT, 3);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_SSL_VERIFYPEER, 0);
        $Cb89c2fa787990691eed438f631c7d3b = curl_exec($C31928bf7a6d860aae9dbe5c5bf9dbf8);
        $e069850a94023657d025a722a0492e14 = (int) curl_getinfo($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLINFO_HTTP_CODE);
        curl_close($C31928bf7a6d860aae9dbe5c5bf9dbf8);
        if ($e069850a94023657d025a722a0492e14 != 200) {
            file_put_contents(TMP_DIR . md5($A2e57573d62f751a39de8fa7429e3701), 0);
            return false;
        }
        if (file_exists(TMP_DIR . md5($A2e57573d62f751a39de8fa7429e3701))) {
            unlink(TMP_DIR . md5($A2e57573d62f751a39de8fa7429e3701));
        }
        return trim($Cb89c2fa787990691eed438f631c7d3b);
    }
    public static function A657C8Cd61954154981441E0De806126() {
        $bd924b8c3f1ff98472c351a0008f3c78 = array();
        $bd924b8c3f1ff98472c351a0008f3c78["seg_time"] = 10;
        $bd924b8c3f1ff98472c351a0008f3c78["seg_list_size"] = 6;
        return $bd924b8c3f1ff98472c351a0008f3c78;
    }
    public static function CE41C5cfe6432569f79B494c62AceD7a() {
        $D51d1bfa053cbe55a255433d64d5a4ac = self::AC20D0E7327dC322f3F2C37e07aC52F4("bouquets_cache");
        if (!empty($D51d1bfa053cbe55a255433d64d5a4ac)) {
            return $D51d1bfa053cbe55a255433d64d5a4ac;
        }
        $output = array();
        self::$ipTV_db->query("SELECT `id`,`bouquet_channels`,`bouquet_series` FROM `bouquets`");
        foreach (self::$ipTV_db->get_rows(true, "id") as $d67eb2e4c20a32a0641cd7e65ed6e319 => $Ab383a3bea70787872e573ac7a0644dd) {
            $output[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"] = json_decode($Ab383a3bea70787872e573ac7a0644dd["bouquet_channels"], true);
            $output[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"] = json_decode($Ab383a3bea70787872e573ac7a0644dd["bouquet_series"], true);
        }
        return $output;
    }
    public static function fac158B2900EDA8D9fea9Ce2A66B560d() {
        $D51d1bfa053cbe55a255433d64d5a4ac = self::AC20D0e7327Dc322f3F2C37E07Ac52F4("settings_cache");
        if (!empty($D51d1bfa053cbe55a255433d64d5a4ac)) {
            return $D51d1bfa053cbe55a255433d64d5a4ac;
        }
        $output = array();
        self::$ipTV_db->query("SELECT * FROM `settings`");
        $d5f8c5a2322bee76eff752938046634a = self::$ipTV_db->get_row();
        foreach ($d5f8c5a2322bee76eff752938046634a as $Cc2a18fdf76b8e3e115b27f927e5928b => $B759d0a2cbaf4e2319f4338d533fc7dd) {
            $output[$Cc2a18fdf76b8e3e115b27f927e5928b] = $B759d0a2cbaf4e2319f4338d533fc7dd;
        }
        $output["allow_countries"] = json_decode($output["allow_countries"], true);
        return $output;
    }
    public static function bd24dC62845546c5ddf2397A8FBb654b($D51d1bfa053cbe55a255433d64d5a4ac, $Ecf4751835141bfcce480ec62720b500) {
        $Ecf4751835141bfcce480ec62720b500 = "<?php \$output = " . var_export($Ecf4751835141bfcce480ec62720b500, true) . "; ?>";
        if (!file_exists(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php") || md5_file(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php") != md5($Ecf4751835141bfcce480ec62720b500)) {
            file_put_contents(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php_tmp", $Ecf4751835141bfcce480ec62720b500, LOCK_EX);
            rename(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php_tmp", TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php");
            opcache_invalidate(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php", true);
            opcache_compile_file(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php");
        }
    }
    public static function AC20d0E7327Dc322f3F2c37e07aC52f4($D51d1bfa053cbe55a255433d64d5a4ac) {
        if (file_exists(TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php") && USE_CACHE === true) {
            include TMP_DIR . $D51d1bfa053cbe55a255433d64d5a4ac . ".php";
            return $output;
        }
        return false;
    }
    public static function f474ABC8F654c5D28420a68068C18dD5() {
        $D51d1bfa053cbe55a255433d64d5a4ac = self::aC20d0E7327DC322f3F2C37E07Ac52F4("servers_cache");
        if (!empty($D51d1bfa053cbe55a255433d64d5a4ac)) {
            return $D51d1bfa053cbe55a255433d64d5a4ac;
        }
        self::$ipTV_db->query("SELECT * FROM `streaming_servers`");
        $C0d89202f2a1eca312a0eaf802d3b913 = array();
        if (empty($_SERVER["REQUEST_SCHEME"])) {
            $_SERVER["REQUEST_SCHEME"] = "http";
        }
        foreach (self::$ipTV_db->get_rows() as $Fa2325a1b301ca7c383cb69087c42d91) {
            if (!empty($Fa2325a1b301ca7c383cb69087c42d91["vpn_ip"]) && inet_pton($Fa2325a1b301ca7c383cb69087c42d91["vpn_ip"]) !== false) {
                $A2e57573d62f751a39de8fa7429e3701 = $Fa2325a1b301ca7c383cb69087c42d91["vpn_ip"];
            } else {
                if (empty($Fa2325a1b301ca7c383cb69087c42d91["domain_name"])) {
                    $A2e57573d62f751a39de8fa7429e3701 = $Fa2325a1b301ca7c383cb69087c42d91["server_ip"];
                } else {
                    $A2e57573d62f751a39de8fa7429e3701 = str_replace(array("http://", "/", "https://"), '', $Fa2325a1b301ca7c383cb69087c42d91["domain_name"]);
                }
            }
            $fd777ea6aad636f6a095e656372f239b = is_array(self::$settings["use_https"]) && in_array($Fa2325a1b301ca7c383cb69087c42d91["id"], self::$settings["use_https"]) ? "https" : "http";
            $c58f730234cdfba1bc472a8dc2f1732c = $fd777ea6aad636f6a095e656372f239b == "http" ? $Fa2325a1b301ca7c383cb69087c42d91["http_broadcast_port"] : $Fa2325a1b301ca7c383cb69087c42d91["https_broadcast_port"];
            $Fa2325a1b301ca7c383cb69087c42d91["api_url"] = $fd777ea6aad636f6a095e656372f239b . "://" . $A2e57573d62f751a39de8fa7429e3701 . ":" . $c58f730234cdfba1bc472a8dc2f1732c . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $Fa2325a1b301ca7c383cb69087c42d91["site_url"] = $fd777ea6aad636f6a095e656372f239b . "://" . $A2e57573d62f751a39de8fa7429e3701 . ":" . $c58f730234cdfba1bc472a8dc2f1732c . "/";
            $Fa2325a1b301ca7c383cb69087c42d91["rtmp_server"] = "rtmp://" . $A2e57573d62f751a39de8fa7429e3701 . ":" . $Fa2325a1b301ca7c383cb69087c42d91["rtmp_port"] . "/live/";
            $Fa2325a1b301ca7c383cb69087c42d91["rtmp_mport_url"] = "http://127.0.0.1:31210/";
            $Fa2325a1b301ca7c383cb69087c42d91["api_url_ip"] = $fd777ea6aad636f6a095e656372f239b . "://" . $Fa2325a1b301ca7c383cb69087c42d91["server_ip"] . ":" . $c58f730234cdfba1bc472a8dc2f1732c . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $Fa2325a1b301ca7c383cb69087c42d91["api_url_ip_local"] = $fd777ea6aad636f6a095e656372f239b . "://127.0.0.1:" . $c58f730234cdfba1bc472a8dc2f1732c . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $Fa2325a1b301ca7c383cb69087c42d91["site_url_ip"] = $fd777ea6aad636f6a095e656372f239b . "://" . $Fa2325a1b301ca7c383cb69087c42d91["server_ip"] . ":" . $c58f730234cdfba1bc472a8dc2f1732c . "/";
            $Fa2325a1b301ca7c383cb69087c42d91["geoip_countries"] = empty($Fa2325a1b301ca7c383cb69087c42d91["geoip_countries"]) ? array() : json_decode($Fa2325a1b301ca7c383cb69087c42d91["geoip_countries"], true);
            unset($Fa2325a1b301ca7c383cb69087c42d91["ssh_password"], $Fa2325a1b301ca7c383cb69087c42d91["watchdog_data"], $Fa2325a1b301ca7c383cb69087c42d91["last_check_ago"], $Fa2325a1b301ca7c383cb69087c42d91["server_hardware"]);
            $C0d89202f2a1eca312a0eaf802d3b913[intval($Fa2325a1b301ca7c383cb69087c42d91["id"])] = $Fa2325a1b301ca7c383cb69087c42d91;
        }
        return $C0d89202f2a1eca312a0eaf802d3b913;
    }
    public static function FbbbF3Bab572f3560E9DfFd9Ebbd4E20(&$Ecf4751835141bfcce480ec62720b500, $e1688cf94922669946cadc2671fc1e4a = 0) {
        if ($e1688cf94922669946cadc2671fc1e4a >= 10) {
            return;
        }
        foreach ($Ecf4751835141bfcce480ec62720b500 as $E5d29eebd54cbadb9868db24207ef778 => $D9766cd1f3a5e424d9142967a54e0231) {
            if (is_array($D9766cd1f3a5e424d9142967a54e0231)) {
                self::FBbbF3baB572F3560e9dfFd9Ebbd4E20($Ecf4751835141bfcce480ec62720b500[$E5d29eebd54cbadb9868db24207ef778], ++$e1688cf94922669946cadc2671fc1e4a);
            } else {
                $D9766cd1f3a5e424d9142967a54e0231 = str_replace(chr("0"), '', $D9766cd1f3a5e424d9142967a54e0231);
                $D9766cd1f3a5e424d9142967a54e0231 = str_replace("\0", '', $D9766cd1f3a5e424d9142967a54e0231);
                $D9766cd1f3a5e424d9142967a54e0231 = str_replace("\0", '', $D9766cd1f3a5e424d9142967a54e0231);
                $D9766cd1f3a5e424d9142967a54e0231 = str_replace("../", "&#46;&#46;/", $D9766cd1f3a5e424d9142967a54e0231);
                $D9766cd1f3a5e424d9142967a54e0231 = str_replace("&#8238;", '', $D9766cd1f3a5e424d9142967a54e0231);
                $Ecf4751835141bfcce480ec62720b500[$E5d29eebd54cbadb9868db24207ef778] = $D9766cd1f3a5e424d9142967a54e0231;
            }
        }
    }
    public static function AA40ee2ffdFE12452716429513430f2C(&$Ecf4751835141bfcce480ec62720b500, $C6171fcdac3217d5a9b091fc2b3d261d = array(), $e1688cf94922669946cadc2671fc1e4a = 0) {
        if ($e1688cf94922669946cadc2671fc1e4a >= 20) {
            return $C6171fcdac3217d5a9b091fc2b3d261d;
        }
        if (!is_array($Ecf4751835141bfcce480ec62720b500)) {
            return $C6171fcdac3217d5a9b091fc2b3d261d;
        }
        foreach ($Ecf4751835141bfcce480ec62720b500 as $E5d29eebd54cbadb9868db24207ef778 => $D9766cd1f3a5e424d9142967a54e0231) {
            if (is_array($D9766cd1f3a5e424d9142967a54e0231)) {
                $C6171fcdac3217d5a9b091fc2b3d261d[$E5d29eebd54cbadb9868db24207ef778] = self::AA40EE2ffdFe12452716429513430F2C($Ecf4751835141bfcce480ec62720b500[$E5d29eebd54cbadb9868db24207ef778], array(), $e1688cf94922669946cadc2671fc1e4a + 1);
            } else {
                $E5d29eebd54cbadb9868db24207ef778 = self::aE2dEFEc772Fab1b49078B3c168F7BAb($E5d29eebd54cbadb9868db24207ef778);
                $D9766cd1f3a5e424d9142967a54e0231 = self::a7AA9f887DD4548809217302A678cC44($D9766cd1f3a5e424d9142967a54e0231);
                $C6171fcdac3217d5a9b091fc2b3d261d[$E5d29eebd54cbadb9868db24207ef778] = $D9766cd1f3a5e424d9142967a54e0231;
            }
        }
        return $C6171fcdac3217d5a9b091fc2b3d261d;
    }
    public static function Ae2deFEC772Fab1B49078B3c168f7BAb($Cc2a18fdf76b8e3e115b27f927e5928b) {
        if ($Cc2a18fdf76b8e3e115b27f927e5928b === '') {
            return '';
        }
        $Cc2a18fdf76b8e3e115b27f927e5928b = htmlspecialchars(urldecode($Cc2a18fdf76b8e3e115b27f927e5928b));
        $Cc2a18fdf76b8e3e115b27f927e5928b = str_replace("..", '', $Cc2a18fdf76b8e3e115b27f927e5928b);
        $Cc2a18fdf76b8e3e115b27f927e5928b = preg_replace("/\\_\\_(.+?)\\_\\_/", '', $Cc2a18fdf76b8e3e115b27f927e5928b);
        $Cc2a18fdf76b8e3e115b27f927e5928b = preg_replace("/^([\\w\\.\\-\\_]+)\$/", "\$1", $Cc2a18fdf76b8e3e115b27f927e5928b);
        return $Cc2a18fdf76b8e3e115b27f927e5928b;
    }
    public static function A7Aa9F887dD4548809217302a678Cc44($B759d0a2cbaf4e2319f4338d533fc7dd) {
        if ($B759d0a2cbaf4e2319f4338d533fc7dd == '') {
            return '';
        }
        $B759d0a2cbaf4e2319f4338d533fc7dd = str_replace("&#032;", " ", stripslashes($B759d0a2cbaf4e2319f4338d533fc7dd));
        $B759d0a2cbaf4e2319f4338d533fc7dd = str_replace(array("\r\n", "\n\r", "\r"), "\n", $B759d0a2cbaf4e2319f4338d533fc7dd);
        $B759d0a2cbaf4e2319f4338d533fc7dd = str_replace("<!--", "&#60;&#33;--", $B759d0a2cbaf4e2319f4338d533fc7dd);
        $B759d0a2cbaf4e2319f4338d533fc7dd = str_replace("-->", "--&#62;", $B759d0a2cbaf4e2319f4338d533fc7dd);
        $B759d0a2cbaf4e2319f4338d533fc7dd = str_ireplace("<script", "&#60;script", $B759d0a2cbaf4e2319f4338d533fc7dd);
        $B759d0a2cbaf4e2319f4338d533fc7dd = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $B759d0a2cbaf4e2319f4338d533fc7dd);
        $B759d0a2cbaf4e2319f4338d533fc7dd = preg_replace("/&#(\\d+?)([^\\d;])/i", "&#\\1;\\2", $B759d0a2cbaf4e2319f4338d533fc7dd);
        return trim($B759d0a2cbaf4e2319f4338d533fc7dd);
    }
    public static function BDb77ED1FBB30959bA62BAd03Cd981e0($fcb78624272a356f23ae5e8471da3ea0) {
        $e987973e3f37937acc8ef14e8fab75bc = array();
        foreach ($fcb78624272a356f23ae5e8471da3ea0 as $b16944a0f2657c5e94a14137db656a79) {
            if (is_scalar($b16944a0f2657c5e94a14137db656a79) or is_resource($b16944a0f2657c5e94a14137db656a79)) {
                $e987973e3f37937acc8ef14e8fab75bc[] = $b16944a0f2657c5e94a14137db656a79;
            } else {
                if (is_array($b16944a0f2657c5e94a14137db656a79)) {
                    $e987973e3f37937acc8ef14e8fab75bc = array_merge($e987973e3f37937acc8ef14e8fab75bc, self::BDB77ed1FBB30959BA62bAd03cd981e0($b16944a0f2657c5e94a14137db656a79));
                }
            }
        }
        return $e987973e3f37937acc8ef14e8fab75bc;
    }
}
