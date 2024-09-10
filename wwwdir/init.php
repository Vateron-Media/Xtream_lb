<?php
require_once 'constants.php';
require IPTV_INCLUDES_PATH . "functions.php";
require IPTV_INCLUDES_PATH . "lib.php";
require IPTV_INCLUDES_PATH . "mysql.php";
require IPTV_INCLUDES_PATH . "streaming.php";
require IPTV_INCLUDES_PATH . "servers.php";
require IPTV_INCLUDES_PATH . "stream.php";
include IPTV_INCLUDES_PATH . "geo/Reader.php";
include IPTV_INCLUDES_PATH . "geo/Decoder.php";
include IPTV_INCLUDES_PATH . "geo/Util.php";
include IPTV_INCLUDES_PATH . "geo/Metadata.php";

$_INFO = array();
if (file_exists(MAIN_DIR . "config")) {
    $_INFO = json_decode(decrypt_config(base64_decode(file_get_contents(MAIN_DIR . "config")), CONFIG_CRYPT_KEY), true);
    define("SERVER_ID", $_INFO["server_id"]);
    define("MAIN_SERVER_ID", $_INFO["main_server_id"]);
} else {
    die(json_encode(array("main_fetch" => false, "error" => "Config Not Found")));
}
$ipTV_db = new ipTV_db($_INFO["host"], $_INFO["db_user"], $_INFO["db_pass"], $_INFO["db_name"], $_INFO["db_port"], empty($_INFO["pconnect"]) ? false : true);
ipTV_lib::$ipTV_db = &$ipTV_db;
ipTV_streaming::$ipTV_db = &$ipTV_db;
ipTV_stream::$ipTV_db = &$ipTV_db;
ipTV_lib::init();
