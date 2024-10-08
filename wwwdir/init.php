<?php
require_once 'constants.php';
require IPTV_INCLUDES_PATH . "functions.php";
require IPTV_INCLUDES_PATH . "lib.php";
require IPTV_INCLUDES_PATH . "mysql.php";
require IPTV_INCLUDES_PATH . "streaming.php";
require IPTV_INCLUDES_PATH . "servers.php";
require IPTV_INCLUDES_PATH . "stream.php";

$_INFO = array();

if (file_exists(MAIN_DIR . 'config')) {
    $_INFO = parse_ini_file(CONFIG_PATH . 'config.ini');
    define('SERVER_ID', $_INFO['server_id']);
} else {
    die(array("main_fetch" => false, "error" => "Config Not Found"));
}

$ipTV_db = new ipTV_db($_INFO["username"], $_INFO["password"], $_INFO["database"], $_INFO["hostname"], $_INFO["port"], empty($_INFO["pconnect"]) ? false : true);
ipTV_lib::$ipTV_db = &$ipTV_db;
ipTV_streaming::$ipTV_db = &$ipTV_db;
ipTV_stream::$ipTV_db = &$ipTV_db;
ipTV_lib::init();
