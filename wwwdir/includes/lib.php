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
            self::cleanGlobals($_GET);
        }
        if (!empty($_POST)) {
            self::cleanGlobals($_POST);
        }
        if (!empty($_SESSION)) {
            self::cleanGlobals($_SESSION);
        }
        if (!empty($_COOKIE)) {
            self::cleanGlobals($_COOKIE);
        }
        $input = @self::parseIncomingRecursively($_GET, array());
        self::$request = @self::parseIncomingRecursively($_POST, $input);
        self::$settings = self::getSettings();
        date_default_timezone_set(self::$settings["default_timezone"]);
        self::$StreamingServers = self::getServers();
        if (FETCH_BOUQUETS) {
            self::$Bouquets = self::getBouquets();
        }
        if (self::$StreamingServers[SERVER_ID]["persistent_connections"] != $_INFO["pconnect"]) {
            $_INFO["pconnect"] = self::$StreamingServers[SERVER_ID]["persistent_connections"];
            if (!empty($_INFO) && is_array($_INFO) && !empty($_INFO["db_user"])) {
                file_put_contents(MAIN_DIR . "config", base64_encode(decrypt_config(json_encode($_INFO), CONFIG_CRYPT_KEY)), LOCK_EX);
            }
        }
        self::$SegmentsSettings = self::calculateSegNumbers();
        crontab_refresh();
    }
    public static function SimpleWebGet($url, $save_cache = false) {
        if (file_exists(TMP_PATH . md5($url)) && time() - filemtime(TMP_PATH . md5($url)) <= 300) {
            return false;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $res = curl_exec($ch);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code != 200) {
            file_put_contents(TMP_PATH . md5($url), 0);
            return false;
        }
        if (file_exists(TMP_PATH . md5($url))) {
            unlink(TMP_PATH . md5($url));
        }
        return trim($res);
    }
    public static function calculateSegNumbers() {
        $segments_settings = array();
        $segments_settings["seg_time"] = 10;
        $segments_settings["seg_list_size"] = 6;
        return $segments_settings;
    }
    public static function getBouquets() {
        $rCache = self::getCache('bouquets', 60);
        if (!empty($rCache)) {
            return $rCache;
        }
        $output = array();
        self::$ipTV_db->query('SELECT *, IF(`bouquet_order` > 0, `bouquet_order`, 999) AS `order` FROM `bouquets` ORDER BY `order` ASC;');
        foreach (self::$ipTV_db->get_rows(true, 'id') as $rID => $rChannels) {
            $output[$rID]['streams'] = array_merge(json_decode($rChannels['bouquet_channels'], true), json_decode($rChannels['bouquet_movies'], true), json_decode($rChannels['bouquet_radios'], true));
            $output[$rID]['series'] = json_decode($rChannels['bouquet_series'], true);
            $output[$rID]['channels'] = json_decode($rChannels['bouquet_channels'], true);
            $output[$rID]['movies'] = json_decode($rChannels['bouquet_movies'], true);
            $output[$rID]['radios'] = json_decode($rChannels['bouquet_radios'], true);
        }
        self::setCache('bouquets', $output);
        return $output;
    }
    public static function getSettings() {
        $cache = self::getCache('settings', 20);
        if (!empty($cache)) {
            return $cache;
        }
        $output = array();
        self::$ipTV_db->query("SELECT * FROM `settings`");
        $rows = self::$ipTV_db->get_row();
        foreach ($rows as $key => $val) {
            $output[$key] = $val;
        }
        $output["allow_countries"] = json_decode($output["allow_countries"], true);
        return $output;
    }
    /** 
     * Sets the cache data for a given cache key. 
     * 
     * @param string $cache The cache key. 
     * @param mixed $data The data to be cached. 
     * @return void 
     */
    public static function setCache($cache, $data) {
        $serializedData = serialize($data);
        if (!file_exists(CACHE_TMP_PATH)) {
            mkdir(CACHE_TMP_PATH);
        }
        file_put_contents(CACHE_TMP_PATH . $cache, $serializedData, LOCK_EX);
    }
    /** 
     * Retrieves the cached data for a given cache key if it exists and is not expired. 
     * 
     * @param string $cache The cache key. 
     * @param int|null $rSeconds The expiration time in seconds. 
     * @return mixed|null The cached data if it exists and is not expired, null otherwise. 
     */
    public static function getCache($cache, $rSeconds = null) {
        if (file_exists(CACHE_TMP_PATH . $cache)) {
            if (!$rSeconds && time() - filemtime(CACHE_TMP_PATH . $cache) > $rSeconds) {
                $data = file_get_contents(CACHE_TMP_PATH . $cache);
                return unserialize($data);
            }
        }
        return null;
    }
    public static function getServers() {
        $cache = self::getCache('servers', 20);
        if (!empty($cache)) {
            return $cache;
        }
        self::$ipTV_db->query("SELECT * FROM `streaming_servers`");
        $servers = array();
        if (empty($_SERVER["REQUEST_SCHEME"])) {
            $_SERVER["REQUEST_SCHEME"] = "http";
        }
        foreach (self::$ipTV_db->get_rows() as $row) {
            if (!empty($row["vpn_ip"]) && inet_pton($row["vpn_ip"]) !== false) {
                $url = $row["vpn_ip"];
            } elseif (empty($row["domain_name"])) {
                $url = $row["server_ip"];
            } else {
                $url = str_replace(array("http://", "/", "https://"), '', $row["domain_name"]);
            }
            $server_protocol = is_array(self::$settings["use_https"]) && in_array($row["id"], self::$settings["use_https"]) ? "https" : "http";
            $http_port = ($server_protocol == 'http' ? intval($row['http_broadcast_port']) : intval($row['https_broadcast_port']));
            $row["api_url"] = $server_protocol . "://" . $url . ":" . $http_port . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $row["site_url"] = $server_protocol . "://" . $url . ":" . $http_port . "/";
            $row["rtmp_server"] = "rtmp://" . $url . ":" . $row["rtmp_port"] . "/live/";
            $row["rtmp_mport_url"] = "http://127.0.0.1:31210/";
            $row["api_url_ip"] = $server_protocol . "://" . $row["server_ip"] . ":" . $http_port . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $row["api_url_ip_local"] = $server_protocol . "://127.0.0.1:" . $http_port . "/system_api.php?password=" . ipTV_lib::$settings["live_streaming_pass"];
            $row["site_url_ip"] = $server_protocol . "://" . $row["server_ip"] . ":" . $http_port . "/";
            $row["geoip_countries"] = empty($row["geoip_countries"]) ? array() : json_decode($row["geoip_countries"], true);
            unset($row["ssh_password"], $row["watchdog_data"], $row["last_check_ago"], $row["server_hardware"]);
            $servers[intval($row["id"])] = $row;
        }
        return $servers;
    }
    public static function cleanGlobals(&$data, $iteration = 0) {
        if ($iteration >= 10) {
            return;
        }
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                self::cleanGlobals($data[$k], ++$iteration);
            } else {
                $v = str_replace(chr('0'), '', $v);
                $v = str_replace('', '', $v);
                $v = str_replace('', '', $v);
                $v = str_replace('../', '&#46;&#46;/', $v);
                $v = str_replace('&#8238;', '', $v);
                $data[$k] = $v;
            }
        }
    }
    public static function parseIncomingRecursively(&$data, $input = array(), $iteration = 0) {
        if ($iteration >= 20) {
            return $input;
        }
        if (!is_array($data)) {
            return $input;
        }
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                $input[$k] = self::parseIncomingRecursively($data[$k], array(), $iteration + 1);
            } else {
                $k = self::parseCleanKey($k);
                $v = self::parseCleanValue($v);
                $input[$k] = $v;
            }
        }
        return $input;
    }
    public static function parseCleanKey($key) {
        if ($key === '') {
            return '';
        }
        $key = htmlspecialchars(urldecode($key));
        $key = str_replace('..', '', $key);
        $key = preg_replace('/\\_\\_(.+?)\\_\\_/', '', $key);
        $key = preg_replace('/^([\\w\\.\\-\\_]+)$/', '$1', $key);
        return $key;
    }
    public static function parseCleanValue($val) {
        if ($val == "") {
            return "";
        }
        $val = str_replace("&#032;", " ", stripslashes($val));
        $val = str_replace(array("\r\n", "\n\r", "\r"), "\n", $val);
        $val = str_replace("<!--", "&#60;&#33;--", $val);
        $val = str_replace("-->", "--&#62;", $val);
        $val = str_ireplace("<script", "&#60;script", $val);
        $val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val);
        $val = preg_replace("/&#(\\d+?)([^\\d;])/i", "&#\\1;\\2", $val);
        return trim($val);
    }
    public static function array_values_recursive($array) {
        if (!is_array($array)) {
            return $array;
        }
        $arrayValues = array();
        foreach ($array as $value) {
            if ((is_scalar($value) or is_resource($value))) {
                $arrayValues[] = $value;
            } else if (is_array($value)) {
                $arrayValues = array_merge($arrayValues, self::array_values_recursive($value));
            }
        }
        return $arrayValues;
    }
    public static function check_cron($rFilename, $rTime = 1800) {
        if (file_exists($rFilename)) {
            $PID = trim(file_get_contents($rFilename));
            if (file_exists('/proc/' . $PID)) {
                if (time() - filemtime($rFilename) >= $rTime) {
                    if (is_numeric($PID) && 0 < $PID) {
                        posix_kill($PID, 9);
                    }
                } else {
                    exit('Running...');
                }
            }
        }
        file_put_contents($rFilename, getmypid());
        return false;
    }
}
