<?php
$showErrors = false;

@ini_set("user_agent", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0) Gecko/20100101 Firefox/9.0");


// FOLDERS
define('MAIN_DIR', '/home/xtreamcodes/');
define('IPTV_ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');
define('IPTV_INCLUDES_PATH', IPTV_ROOT_PATH . 'includes' . '/');
define('IPTV_TEMPLATES_PATH', IPTV_ROOT_PATH . 'templates' . '/');
define('STREAMS_PATH', MAIN_DIR . 'streams/');
define('MOVIES_IMAGES', MAIN_DIR . 'wwwdir/images/');
define('ENIGMA2_PLUGIN_DIR', MOVIES_IMAGES . 'enigma2/');
define('CREATED_CHANNELS', MAIN_DIR . 'created_channels/');
define('CRON_PATH', MAIN_DIR . 'crons/');
define('ASYNC_DIR', MAIN_DIR . 'async_incs/');
define('TOOLS_PATH', MAIN_DIR . 'tools/');
define('IPTV_CLIENT_AREA', MAIN_DIR . 'wwwdir/client_area/');
define('BIN_PATH', MAIN_DIR . 'bin/');
define('TV_ARCHIVE', MAIN_DIR . 'tv_archive/');
define('DELAY_STREAM', MAIN_DIR . 'delay/');
define('SIGNALS_PATH', MAIN_DIR . 'signals/');
define("MOVIES_PATH", MAIN_DIR . "movies/");
define('IPTV_CLIENT_AREA_TEMPLATES_PATH', IPTV_CLIENT_AREA . 'templates/');
// -------------------

// BINARIES FILE
define('PHP_BIN', '/home/xtreamcodes/php/bin/php');
define('FFMPEG_PATH', file_exists(BIN_PATH . 'ffmpeg') ? BIN_PATH . 'ffmpeg' : '/usr/bin/ffmpeg');
define('FFPROBE_PATH', file_exists(BIN_PATH . 'ffprobe') ? BIN_PATH . 'ffprobe' : '/usr/bin/ffprobe');
define('YOUTUBE_PATH', BIN_PATH . 'youtube');
define('GEOIP2_FILENAME', BIN_PATH . 'maxmind/GeoLite2-Country.mmdb');
define('GEOIP2ISP_FILENAME', BIN_PATH . 'maxmind/GeoLite2-ISP.mmdb');
// -------------------

// TEMP FOLDERS
define('TMP_PATH', MAIN_DIR . 'tmp/');
define('CACHE_TMP_PATH', TMP_PATH . 'cache/');
define('CONS_TMP_PATH', TMP_PATH . 'opened_cons/');
define('LOGS_TMP_PATH', TMP_PATH . 'logs/');
// -------------------

//CONTENT FOLDERS
define('CONTENT_PATH', MAIN_DIR . 'content/');
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

define('PHP_ERRORS', $showErrors);
set_error_handler('log_error');
set_exception_handler('log_exception');
register_shutdown_function('log_fatal');

if (PHP_ERRORS) {
    error_reporting(1 | 4);
    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

function log_error($rErrNo, $rMessage, $rFile, $rLine, $rContext = null) {
    if (in_array($rErrNo, array(1, 2, 4))) {
        $error = array(1 => 'error', 2 => 'warning', 4 => 'parse')[$rErrNo];
        panellog($error, $rMessage, $rFile, $rLine);
    }
}

function log_exception($e) {
    panellog('exception', $e->getMessage(), $e->getTraceAsString(), $e->getLine());
}

function log_fatal() {
    $rError = error_get_last();
    if ($rError !== null && $rError['type'] == 1) {
        panellog('error', $rError['message'], $rError['file'], $rError['line']);
    }
}

function panelLog($rType, $rMessage, $rExtra = '', $rLine = 0) {
    $data = array('type' => $rType, 'message' => $rMessage, 'extra' => $rExtra, 'line' => $rLine, 'time' => time());
    file_put_contents(LOGS_TMP_PATH . 'error_log.log', base64_encode(json_encode($data)) . "\n", FILE_APPEND);
}

function generateError($rError, $rKill = true, $rCode = null) {
    global $rErrorCodes;
    global $showErrors;

    if ($showErrors) {
        $rErrorDescription = ($rErrorCodes[$rError] ?: '');
        $rStyle = '*{-webkit-box-sizing:border-box;box-sizing:border-box}body{padding:0;margin:0}#notfound{position:relative;height:100vh}#notfound .notfound{position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.notfound{max-width:520px;width:100%;line-height:1.4;text-align:center}.notfound .notfound-404{position:relative;height:200px;margin:0 auto 20px;z-index:-1}.notfound .notfound-404 h1{font-family:Montserrat,sans-serif;font-size:236px;font-weight:200;margin:0;color:#211b19;text-transform:uppercase;position:absolute;left:50%;top:50%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.notfound .notfound-404 h2{font-family:Montserrat,sans-serif;font-size:28px;font-weight:400;text-transform:uppercase;color:#211b19;background:#fff;padding:10px 5px;margin:auto;display:inline-block;position:absolute;bottom:0;left:0;right:0}.notfound p{font-family:Montserrat,sans-serif;font-size:14px;font-weight:300;text-transform:uppercase}@media only screen and (max-width:767px){.notfound .notfound-404 h1{font-size:148px}}@media only screen and (max-width:480px){.notfound .notfound-404{height:148px;margin:0 auto 10px}.notfound .notfound-404 h1{font-size:86px}.notfound .notfound-404 h2{font-size:16px}}';
        echo '<html><head><title>Debug Mode</title><link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet"><style>' . $rStyle . '</style></head><body><div id="notfound"><div class="notfound"><div class="notfound-404"><h1>XTREAMUI</h1><h2>' . $rError . '</h2><br/></div><p>' . $rErrorDescription . '</p></div></div></body></html>';

        if ($rKill) {
            exit();
        }
    } else {
        if ($rKill) {
            if (!$rCode) {
                generate404();
            } else {
                http_response_code($rCode);

                exit();
            }
        }
    }
}

function generate404($rKill = true) {
    echo "<html>\r\n<head><title>404 Not Found</title></head>\r\n<body>\r\n<center><h1>404 Not Found</h1></center>\r\n<hr><center>nginx</center>\r\n</body>\r\n</html>\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->\r\n<!-- a padding to disable MSIE and Chrome friendly error page -->";
    http_response_code(404);

    if ($rKill) {
        exit();
    }
}
