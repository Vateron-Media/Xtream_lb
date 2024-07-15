<?php
if ($_SERVER["REMOTE_ADDR"] != "127.0.0.1") {
    die;
}
set_time_limit(0);
require "../init.php";
if (ipTV_lib::$request["call"] == "publish") {
    if (!in_array(ipTV_lib::$request["addr"], ipTV_streaming::CdB7Ed3E4910a38DaaB7bDedc40d824F())) {
        http_response_code(404);
        die;
    } else {
        http_response_code(200);
        die;
    }
}
if (ipTV_lib::$request["call"] == "play_done") {
    ipTV_streaming::ce9736cB36FC32a1E05ec062E4e88475(ipTV_lib::$request["clientid"]);
    http_response_code(200);
    die;
}
if (empty(ipTV_lib::$request["username"]) && empty(ipTV_lib::$request["password"]) && in_array(ipTV_lib::$request["addr"], ipTV_streaming::e83C60ae0B93a4Aae6A66a6F64fCa8B6())) {
    http_response_code(200);
    die;
}
if (!isset(ipTV_lib::$request["username"]) || !isset(ipTV_lib::$request["password"]) || !isset(ipTV_lib::$request["tcurl"]) || !isset(ipTV_lib::$request["app"])) {
    http_response_code(404);
    die("Missing parameters.");
}
$b6497ba71489783c3747f19debe893a4 = intval(ipTV_lib::$request["name"]);
$b7eaa095f27405cf78a432ce6504dae0 = ipTV_lib::$request["addr"];
$Fdc134ea90d233be850c53c1266026d6 = ipTV_lib::$request["username"];
$E1dc5da23bfc7433f190ed9488d09204 = ipTV_lib::$request["password"];
$b2cbe4de82c7504e1d8d46c57a6264fa = "rtmp";
$e8bde7e627ad9d9d70c6010cc669eb60 = '';
if ($fbf1d0a58fcc040ff00728a277a5f306 = ipTV_streaming::d909b0d1a6fFfdCDB838046FAC418b04(null, $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204, true, true, false, true)) {
    if (!is_null($fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) && time() >= $fbf1d0a58fcc040ff00728a277a5f306["exp_date"]) {
        http_response_code(401);
        die;
    }
    if ($fbf1d0a58fcc040ff00728a277a5f306["admin_enabled"] == 0) {
        http_response_code(401);
        die;
    }
    if ($fbf1d0a58fcc040ff00728a277a5f306["enabled"] == 0) {
        http_response_code(401);
        die;
    }
    $A357e4da7e159844550464e414faeb73 = new FFcaBA9D38408d4853b09fed9b2f7571(GEOIP2_FILENAME);
    $a915d7b641af262a730cfcf433966ebd = $A357e4da7e159844550464e414faeb73->F0c9b48f97cF10F24Da4E7be863374Af($b7eaa095f27405cf78a432ce6504dae0)["registered_country"]["iso_code"];
    $A357e4da7e159844550464e414faeb73->close();
    if (!empty($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]) && !in_array($b7eaa095f27405cf78a432ce6504dae0, array_map("gethostbyname", $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"]))) {
        http_response_code(401);
        die;
    }
    if (!empty($a915d7b641af262a730cfcf433966ebd)) {
        $E972828ab802d6aab7b08caf07470ba4 = !empty($fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) ? true : false;
        if ($E972828ab802d6aab7b08caf07470ba4 && $fbf1d0a58fcc040ff00728a277a5f306["forced_country"] != "ALL" && $a915d7b641af262a730cfcf433966ebd != $fbf1d0a58fcc040ff00728a277a5f306["forced_country"]) {
            http_response_code(401);
            die;
        }
        if (!$E972828ab802d6aab7b08caf07470ba4 && !in_array("ALL", ipTV_lib::$settings["allow_countries"]) && !in_array($a915d7b641af262a730cfcf433966ebd, ipTV_lib::$settings["allow_countries"])) {
            http_response_code(401);
            die;
        }
    }
    if (!array_key_exists($b2cbe4de82c7504e1d8d46c57a6264fa, $fbf1d0a58fcc040ff00728a277a5f306["output_formats"])) {
        http_response_code(401);
        die;
    }
    if (!in_array($b6497ba71489783c3747f19debe893a4, $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
        http_response_code(401);
        die;
    }
    if ($fbf1d0a58fcc040ff00728a277a5f306["max_connections"] != 0) {
        if (!empty($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"])) {
            if ($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"] != 0) {
                if ($fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["active_cons"] >= $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"]) {
                    ipTV_streaming::FD9bCEaaE00258Ec95e5Ad4d91456864(true, $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
                }
            }
        }
        if ($fbf1d0a58fcc040ff00728a277a5f306["active_cons"] >= $fbf1d0a58fcc040ff00728a277a5f306["max_connections"]) {
            if (ipTV_streaming::fD9bceaae00258eC95e5Ad4d91456864(true, $fbf1d0a58fcc040ff00728a277a5f306["id"])) {
                $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] -= 1;
            }
        }
    }
    $edb14c7cf85a4e59ae887506c408a3df = ipTV_streaming::f9edf299be4280cC9900D81d8355fd29($b6497ba71489783c3747f19debe893a4, SERVER_ID);
    $f0d5508533eaf6452b2b014beae1cc7c = STREAMS_PATH . $b6497ba71489783c3747f19debe893a4 . "_.m3u8";
    if (!ipTV_streaming::ps_running($edb14c7cf85a4e59ae887506c408a3df["server"]["pid"], FFMPEG_PATH) && $edb14c7cf85a4e59ae887506c408a3df["info"]["on_demand"] == 1) {
        ipTV_stream::ccE5281DdFb1F4c0d820841761f78170($b6497ba71489783c3747f19debe893a4);
        sleep(5);
    }
    if ($fbf1d0a58fcc040ff00728a277a5f306["max_connections"] == 0 || $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] < $fbf1d0a58fcc040ff00728a277a5f306["max_connections"]) {
        $ipTV_db->query("INSERT INTO `user_activity_now` (`user_id`,`stream_id`,`server_id`,`user_agent`,`user_ip`,`container`,`pid`,`date_start`,`geoip_country_code`,`isp`,`external_device`) VALUES('%d','%d','%d','%s','%s','%s','%d','%d','%s','%s','%s')", $fbf1d0a58fcc040ff00728a277a5f306["id"], $b6497ba71489783c3747f19debe893a4, SERVER_ID, '', $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, ipTV_lib::$request["clientid"], time(), $a915d7b641af262a730cfcf433966ebd, $ccd2e0619bfa39a78e869e4f48fcc7c6, $e8bde7e627ad9d9d70c6010cc669eb60);
        $b93df8c85c6b9c6b3e155555619bbe8e = $ipTV_db->last_insert_id();
        $ipTV_db->close_mysql();
        http_response_code(200);
        die;
    }
}
http_response_code(404);
