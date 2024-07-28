<?php
error_reporting(0);
ini_set("display_errors", 0);
@ini_set("user_agent", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0) Gecko/20100101 Firefox/9.0");
define("MOVIES_PATH", IPTV_PANEL_DIR . "movies/");

// FOLDERS
define('MAIN_DIR', '/home/xtreamcodes/');
define('IPTV_ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');
define('IPTV_INCLUDES_PATH', IPTV_ROOT_PATH . 'includes' . '/');
define('IPTV_TEMPLATES_PATH', IPTV_ROOT_PATH . 'templates' . '/');
define('IPTV_PANEL_DIR', MAIN_DIR . 'iptv_xtream_codes/');
define('STREAMS_PATH', IPTV_PANEL_DIR . 'streams/');
define('MOVIES_IMAGES', IPTV_PANEL_DIR . 'wwwdir/images/');
define('ENIGMA2_PLUGIN_DIR', MOVIES_IMAGES . 'enigma2/');
define('CREATED_CHANNELS', IPTV_PANEL_DIR . 'created_channels/');
define('CRON_PATH', IPTV_PANEL_DIR . 'crons/');
define('ASYNC_DIR', IPTV_PANEL_DIR . 'async_incs/');
define('TOOLS_PATH', IPTV_PANEL_DIR . 'tools/');
define('IPTV_CLIENT_AREA', IPTV_PANEL_DIR . 'wwwdir/client_area/');
define('BIN_PATH', IPTV_PANEL_DIR . 'bin/');
define('TV_ARCHIVE', IPTV_PANEL_DIR . 'tv_archive/');
define('DELAY_STREAM', IPTV_PANEL_DIR . 'delay/');
define('SIGNALS_PATH', IPTV_PANEL_DIR . 'signals/');
define('IPTV_CLIENT_AREA_TEMPLATES_PATH', IPTV_CLIENT_AREA . 'templates/');
// -------------------

// BINARIES FILE
define('PHP_BIN', '/home/xtreamcodes/iptv_xtream_codes/php/bin/php');
define('FFMPEG_PATH', file_exists(BIN_PATH . 'ffmpeg') ? BIN_PATH . 'ffmpeg' : '/usr/bin/ffmpeg');
define('FFPROBE_PATH', file_exists(BIN_PATH . 'ffprobe') ? BIN_PATH . 'ffprobe' : '/usr/bin/ffprobe');
define('YOUTUBE_PATH', BIN_PATH . 'youtube');
define('GEOIP2_FILENAME', BIN_PATH . 'maxmind/GeoLite2-Country.mmdb');
define('GEOIP2ISP_FILENAME', BIN_PATH . 'maxmind/GeoLite2-ISP.mmdb');
// -------------------

// TEMP FOLDERS
define('TMP_DIR', IPTV_PANEL_DIR . 'tmp/');
define('CACHE_TMP_PATH', TMP_DIR . 'cache/');
define('CONS_TMP_PATH', TMP_DIR . 'opened_cons/');
define('LOGS_TMP_PATH', TMP_DIR . 'logs/');
// -------------------

//CONTENT FOLDERS
define('CONTENT_PATH', IPTV_PANEL_DIR . 'content/');
define('VOD_PATH', CONTENT_PATH . 'vod/');
// -------------------

// CONSTANTS VAR
define('SCRIPT_VERSION', '1.0.0');
define('IN_SCRIPT', true);
define('SOFTWARE', 'iptv');
define('FFMPEG_FONTS_PATH', SIGNALS_PATH . 'free-sans.ttf');
define("KEY_CRYPT", md5(base64_encode("K76eTItpqxJA4iTmrytrmDo1LTndAG")));
define('CONFIG_CRYPT_KEY', '5709650b0d7806074842c6de575025b1');
define('OPENSSL_EXTRA', '5gd46z5s4fg6sd8f4gs6');
define('RESTART_TAKE_CACHE', 5);
define('TOTAL_SAVES_DROP', 6);
// -------------------


if (!defined("USE_CACHE")) {
    define("USE_CACHE", true);
}
if (!defined("FETCH_BOUQUETS")) {
    define("FETCH_BOUQUETS", true);
}
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
if (file_exists(IPTV_PANEL_DIR . "config")) {
    $_INFO = json_decode(decrypt_config(base64_decode(file_get_contents(IPTV_PANEL_DIR . "config")), CONFIG_CRYPT_KEY), true);
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
