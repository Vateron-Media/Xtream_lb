<?php
class ipTV_streaming {
    public static $ipTV_db;
    public static $AllowedIPs = array();
    public static function sendSignalFFMPEG($signalData, $segmentFile) {
        if (empty($signalData["xy_offset"])) {
            $x = rand(150, 380);
            $y = rand(110, 250);
        } else {
            list($x, $y) = explode("x", $signalData["xy_offset"]);
        }
        passthru(FFMPEG_PATH . " -nofix_dts -fflags +igndts -copyts -vsync 0 -nostats -nostdin -hide_banner -loglevel quiet -y -i \"" . STREAMS_PATH . $segmentFile . "\" -filter_complex \"drawtext=fontfile=" . FFMPEG_FONTS_PATH . ":text='{$signalData["message"]}':fontsize={$signalData["font_size"]}:x={$x}:y={$y}:fontcolor={$signalData["font_color"]}\" -map 0 -vcodec libx264 -preset ultrafast -acodec copy -scodec copy -mpegts_flags +initial_discontinuity -mpegts_copyts 1 -f mpegts -");
        return true;
    }
    public static function getAllowedIPs($C8eb36fadaae1034e857051e20bdf67a = false, $C8c20cd17d90c22c314200e1babf2dc1 = true) {
        $rCache = ipTV_lib::getCache('allowed_ips', 60);
        if (!empty($cache)) {
            return $rCache;
        }
        $rIPs = array("127.0.0.1", $_SERVER["SERVER_ADDR"]);
        if ($C8c20cd17d90c22c314200e1babf2dc1) {
            foreach (ipTV_lib::$StreamingServers as $C671e9e0a59f18412464d71d67ba55c7 => $serverInfo) {
                if (!empty($serverInfo["whitelist_ips"])) {
                    $rIPs = array_merge($rIPs, json_decode($serverInfo["whitelist_ips"], true));
                }
                $rIPs[] = $serverInfo["server_ip"];
            }
        } else {
            if (!empty(ipTV_lib::$StreamingServers[1]["whitelist_ips"])) {
                $rIPs = array_merge($rIPs, json_decode(ipTV_lib::$StreamingServers[1]["whitelist_ips"], true));
            }
            $rIPs[] = ipTV_lib::$StreamingServers[1]["server_ip"];
        }
        if ($C8eb36fadaae1034e857051e20bdf67a) {
            if (!empty(ipTV_lib::$settings["allowed_ips_admin"])) {
                $rIPs = array_merge($rIPs, explode(",", ipTV_lib::$settings["allowed_ips_admin"]));
            }
            self::$ipTV_db->query("SELECT * FROM `xtream_main` WHERE id = 1");
            $Ea0be5d44ff76909820aa5b4285928da = self::$ipTV_db->get_row();
            if (!empty($Ea0be5d44ff76909820aa5b4285928da["root_ip"])) {
                $rIPs[] = $Ea0be5d44ff76909820aa5b4285928da["root_ip"];
            }
            self::$ipTV_db->query("SELECT DISTINCT t1.`ip` FROM `reg_users` t1 INNER JOIN `member_groups` t2 ON t2.group_id = t1.member_group_id AND t2.is_admin = 1 AND t1.`last_login` >= '%d'", strtotime("-2 hour"));
            $d9bb1c051109b434d417928081feddd9 = ipTV_lib::array_values_recursive(self::$ipTV_db->get_rows());
            $rIPs = array_merge($rIPs, $d9bb1c051109b434d417928081feddd9);
        }
        if (!file_exists(TMP_PATH . "cloud_ips") || time() - filemtime(TMP_PATH . "cloud_ips") >= 400) {
            $contents = ipTV_lib::SimpleWebGet("http://xtream-codes.com/cloud_ips");
            if (!empty($contents)) {
                file_put_contents(TMP_PATH . "cloud_ips", $contents);
            }
        }
        if (file_exists(TMP_PATH . "cloud_ips")) {
            $rIPs = array_filter(array_merge($rIPs, array_map("trim", file(TMP_PATH . "cloud_ips"))));
        }
        self::$AllowedIPs = $rIPs;
        return array_unique($rIPs);
    }
    public static function CloseAndTransfer($activity_id) {
        file_put_contents(CONS_TMP_PATH . $activity_id, 1);
    }
    public static function d909b0D1a6FFFDcDB838046fac418b04($d8d36e593ec0bd7cae9e37c890b536d4 = null, $Fdc134ea90d233be850c53c1266026d6 = null, $E1dc5da23bfc7433f190ed9488d09204 = null, $Bd6640ad180b58c481050d9a3082fe9f = false, $F4625153d1b67f8c81ea5a280caba00e = false, $d2f424c414bd97ab4b5d38563f808de5 = false, $E2565740db1273542fd774924ca12684 = false, $c81742471fbf5fc98e647357de25a9c9 = array(), $Fcdbdb78e4e59d5190fb3db2e90d317c = false) {
        if (empty($d8d36e593ec0bd7cae9e37c890b536d4)) {
            self::$ipTV_db->query("SELECT * FROM `users` WHERE `username` = '%s' AND `password` = '%s' LIMIT 1", $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204);
        } else {
            self::$ipTV_db->query("SELECT * FROM `users` WHERE `id` = '%d'", $d8d36e593ec0bd7cae9e37c890b536d4);
        }
        if (self::$ipTV_db->num_rows() > 0) {
            $fbf1d0a58fcc040ff00728a277a5f306 = self::$ipTV_db->get_row();
            $fbf1d0a58fcc040ff00728a277a5f306["bouquet"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["bouquet"], true);
            $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"], true);
            $fbf1d0a58fcc040ff00728a277a5f306["allowed_ua"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["allowed_ua"], true);
            if ($E2565740db1273542fd774924ca12684) {
                self::$ipTV_db->query("SELECT COUNT(`activity_id`) FROM `user_activity_now` WHERE `user_id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["id"]);
                $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] = self::$ipTV_db->get_col();
                $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"] = array();
                if (!is_null($fbf1d0a58fcc040ff00728a277a5f306["pair_id"])) {
                    self::$ipTV_db->query("SELECT COUNT(`activity_id`) FROM `user_activity_now` WHERE `user_id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
                    $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["active_cons"] = self::$ipTV_db->get_col();
                    self::$ipTV_db->query("SELECT max_connections FROM `users` WHERE `id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
                    $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"] = self::$ipTV_db->get_col();
                }
            } else {
                $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] = "N/A";
            }
            if ($Bd6640ad180b58c481050d9a3082fe9f) {
                self::$ipTV_db->query("SELECT *\n                                    FROM `access_output` t1\n                                    INNER JOIN `user_output` t2 ON t1.access_output_id = t2.access_output_id\n                                    WHERE t2.user_id = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["id"]);
                $fbf1d0a58fcc040ff00728a277a5f306["output_formats"] = self::$ipTV_db->get_rows(true, "output_key");
            }
            if ($F4625153d1b67f8c81ea5a280caba00e) {
                $fbf1d0a58fcc040ff00728a277a5f306["series_ids"] = $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] = array();
                foreach ($fbf1d0a58fcc040ff00728a277a5f306["bouquet"] as $d67eb2e4c20a32a0641cd7e65ed6e319) {
                    if (isset(ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"]) && is_array(ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"])) {
                        $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] = array_merge($fbf1d0a58fcc040ff00728a277a5f306["channel_ids"], ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"]);
                    }
                    if (isset(ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"]) && is_array(ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"])) {
                        $fbf1d0a58fcc040ff00728a277a5f306["series_ids"] = array_merge($fbf1d0a58fcc040ff00728a277a5f306["series_ids"], ipTV_lib::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"]);
                    }
                }
                if ($d2f424c414bd97ab4b5d38563f808de5 && !empty($fbf1d0a58fcc040ff00728a277a5f306["channel_ids"])) {
                    $E3306fa3e87c92fab90abcc8961ecc5d = '';
                    if (!empty($c81742471fbf5fc98e647357de25a9c9)) {
                        $E3306fa3e87c92fab90abcc8961ecc5d = " AND (";
                        foreach ($c81742471fbf5fc98e647357de25a9c9 as $E348cb4251dc88ab4be7f3b8c09d96ad) {
                            $E3306fa3e87c92fab90abcc8961ecc5d .= " t2.type_key = '" . self::$ipTV_db->escape($E348cb4251dc88ab4be7f3b8c09d96ad) . "' OR";
                        }
                        $E3306fa3e87c92fab90abcc8961ecc5d = substr($E3306fa3e87c92fab90abcc8961ecc5d, 0, -2);
                        $E3306fa3e87c92fab90abcc8961ecc5d .= ")";
                    }
                    self::$ipTV_db->query("SELECT t1.*,t2.*,t3.category_name,t1.rtmp_output\n                                            FROM `streams` t1 \n                                            LEFT JOIN  `stream_categories` t3 on t3.id = t1.category_id\n                                            INNER JOIN `streams_types` t2 ON t2.type_id = t1.type {$E3306fa3e87c92fab90abcc8961ecc5d}\n                                            WHERE t1.`id` IN(" . implode(",", $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"]) . ") \n                                            ORDER BY FIELD(t1.id, " . implode(",", $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"]) . ");");
                    $fbf1d0a58fcc040ff00728a277a5f306["channels"] = self::$ipTV_db->get_rows();
                    if ($Fcdbdb78e4e59d5190fb3db2e90d317c) {
                        $B7fea61edf73e202cc8e6d801cd62f11 = 0;
                        foreach ($fbf1d0a58fcc040ff00728a277a5f306["channels"] as $Cc2a18fdf76b8e3e115b27f927e5928b => $efa7cefd12388102b27fdeb2f9f68219) {
                            $fbf1d0a58fcc040ff00728a277a5f306["channels"][$Cc2a18fdf76b8e3e115b27f927e5928b]["is_adult"] = strtolower($efa7cefd12388102b27fdeb2f9f68219["category_name"]) == "for adults" ? 1 : 0;
                        }
                    }
                }
            }
            return $fbf1d0a58fcc040ff00728a277a5f306;
        }
        return false;
    }
    public static function f821DE2269f55d10183b146c8d058907($b6497ba71489783c3747f19debe893a4, $Bb77c1156db46ab15b509bd70ca13ad0 = array(), $c81742471fbf5fc98e647357de25a9c9 = "movie") {
        if ($c81742471fbf5fc98e647357de25a9c9 == "movie") {
            return in_array($b6497ba71489783c3747f19debe893a4, $Bb77c1156db46ab15b509bd70ca13ad0);
        } else {
            if ($c81742471fbf5fc98e647357de25a9c9 == "series") {
                self::$ipTV_db->query("SELECT series_id FROM `series_episodes` WHERE `stream_id` = '%d' LIMIT 1", $b6497ba71489783c3747f19debe893a4);
                if (self::$ipTV_db->num_rows() > 0) {
                    return in_array(self::$ipTV_db->get_col(), $Bb77c1156db46ab15b509bd70ca13ad0);
                }
            }
        }
        return false;
    }
    public static function b03404A02C45cF202DA01928E71d3b42($f0d5508533eaf6452b2b014beae1cc7c, $c4f4df649ac9919901a9c71097032334 = 0) {
        if (file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
            $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($f0d5508533eaf6452b2b014beae1cc7c);
            if (preg_match_all("/(.*?).ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
                if ($c4f4df649ac9919901a9c71097032334 > 0) {
                    $e455de5c3772bfe5e89d40805c06bcd0 = intval($c4f4df649ac9919901a9c71097032334 / 10);
                    return array_slice($f563f11de8fd50b6d6e4071878cbe2de[0], -$e455de5c3772bfe5e89d40805c06bcd0);
                } else {
                    preg_match("/_(.*)\\./", array_pop($f563f11de8fd50b6d6e4071878cbe2de[0]), $dc97e90a550794b1b10be857a9861404);
                    return $dc97e90a550794b1b10be857a9861404[1];
                }
            }
        }
        return false;
    }
    public static function de40F0dca7C52c3162b552bE591b38eb($F43e647d100aaa12be0cb16c72d9031b, $E1dc5da23bfc7433f190ed9488d09204, $b6497ba71489783c3747f19debe893a4) {
        if (file_exists($F43e647d100aaa12be0cb16c72d9031b)) {
            $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($F43e647d100aaa12be0cb16c72d9031b);
            if (preg_match_all("/(.*?)\\.ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
                foreach ($f563f11de8fd50b6d6e4071878cbe2de[0] as $a5e686e6c77e9ffdb58ffe6b089d4fad) {
                    $E4866fec202244d7a3c9f4e24f6ee344 = str_replace($a5e686e6c77e9ffdb58ffe6b089d4fad, "/streaming/admin_live.php?password={$E1dc5da23bfc7433f190ed9488d09204}&extension=m3u8&segment={$a5e686e6c77e9ffdb58ffe6b089d4fad}&stream={$b6497ba71489783c3747f19debe893a4}", $E4866fec202244d7a3c9f4e24f6ee344);
                }
                return $E4866fec202244d7a3c9f4e24f6ee344;
            }
            return false;
        }
    }
    public static function D835C2a9787ba794E7590e06621cFa6B($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4, $c3bd62458959952cf55b015822fd5a91 = PHP_BIN) {
        if (empty($ef4f0599712515333103265dafb029f7)) {
            return false;
        }
        clearstatcache(true);
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91)) {
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if ($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodes[{$b6497ba71489783c3747f19debe893a4}]") {
                return true;
            }
        }
        return false;
    }
    public static function A1ECf5D2a93474B12e622361C656b958($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4, $c3bd62458959952cf55b015822fd5a91 = FFMPEG_PATH) {
        if (empty($ef4f0599712515333103265dafb029f7)) {
            return false;
        }
        clearstatcache(true);
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91)) {
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if (stristr($A0316410c2d7b66ec51afd1b25e335c7, "/{$b6497ba71489783c3747f19debe893a4}_.m3u8")) {
                return true;
            }
        }
        return false;
    }
    public static function ps_running($ef4f0599712515333103265dafb029f7, $c3bd62458959952cf55b015822fd5a91) {
        if (empty($ef4f0599712515333103265dafb029f7)) {
            return false;
        }
        clearstatcache(true);
        if (!(!file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) == basename($c3bd62458959952cf55b015822fd5a91))) {
            return true;
        }
        return false;
    }
    public static function c9CcC76C9D6b7E44c6d4A7a6c7191eB5($C671e9e0a59f18412464d71d67ba55c7, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $start, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, $afcb8aae8ae1125ee6b7356e499e56ab, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60 = '') {
        $b0f2ad37a04751a76687ec58fd378a0f = array("user_id" => intval($d8d36e593ec0bd7cae9e37c890b536d4), "stream_id" => intval($b6497ba71489783c3747f19debe893a4), "server_id" => intval($C671e9e0a59f18412464d71d67ba55c7), "date_start" => intval($start), "user_agent" => $f1bbf25f8a2aa075b59695b2d749ee5b, "user_ip" => htmlentities($b7eaa095f27405cf78a432ce6504dae0), "date_end" => time() + ipTV_lib::$StreamingServers[SERVER_ID]["diff_time_main"], "container" => $b2cbe4de82c7504e1d8d46c57a6264fa, "geoip_country_code" => $afcb8aae8ae1125ee6b7356e499e56ab, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "external_device" => htmlentities($e8bde7e627ad9d9d70c6010cc669eb60));
        file_put_contents(TMP_PATH . "offline_cons", base64_encode(json_encode($b0f2ad37a04751a76687ec58fd378a0f)) . "\n", FILE_APPEND | LOCK_EX);
    }
    public static function eF709337A2715D23B673E033a05bF7b7($f0d5508533eaf6452b2b014beae1cc7c, $ef4f0599712515333103265dafb029f7) {
        return self::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH) && file_exists($f0d5508533eaf6452b2b014beae1cc7c);
    }
    public static function getMainID() {
        foreach (ipTV_lib::$StreamingServers as $rServerID => $rServer) {
            if ($rServer['is_main']) {
                return $rServerID;
            }
        }
    }
    public static function updateStream($streamID) {
        self::$ipTV_db->query('SELECT COUNT(*) AS `count` FROM `signals` WHERE `server_id` = \'%s\' AND `cache` = 1 AND `custom_data` = \'%s\';', self::getMainID(), json_encode(array('type' => 'update_stream', 'id' => $streamID)));
        if (self::$ipTV_db->get_row()['count'] == 0) {
            self::$ipTV_db->query('INSERT INTO `signals`(`server_id`, `cache`, `time`, `custom_data`) VALUES(\'%s\', 1, \'%s\', \'%s\');', self::getMainID(), time(), json_encode(array('type' => 'update_stream', 'id' => $streamID)));
        }
        return true;
    }
    public static function getCapacity() {
        self::$ipTV_db->query('SELECT `server_id`, COUNT(*) AS `online_clients` FROM `lines_live` WHERE `server_id` <> 0 AND `hls_end` = 0 GROUP BY `server_id`;');
        $rRows = self::$ipTV_db->get_rows(true, 'server_id');

        if (ipTV_lib::$settings['split_by'] == 'band') {
            $rServerSpeed = array();
            foreach (array_keys(ipTV_lib::$StreamingServers) as $rServerID) {
                $rServerHardware = json_decode(ipTV_lib::$StreamingServers[$rServerID]['server_hardware'], true);
                if (!empty($rServerHardware['network_speed'])) {
                    $rServerSpeed[$rServerID] = (float) $rServerHardware['network_speed'];
                } else {
                    if (0 < ipTV_lib::$StreamingServers[$rServerID]['network_guaranteed_speed']) {
                        $rServerSpeed[$rServerID] = ipTV_lib::$StreamingServers[$rServerID]['network_guaranteed_speed'];
                    } else {
                        $rServerSpeed[$rServerID] = 1000;
                    }
                }
            }
            foreach ($rRows as $rServerID => $rRow) {
                $rCurrentOutput = intval(ipTV_lib::$StreamingServers[$rServerID]['watchdog']['bytes_sent'] / 125000);
                $rRows[$rServerID]['capacity'] = (float) ($rCurrentOutput / (($rServerSpeed[$rServerID] ?: 1000)));
            }
        } else {
            if (ipTV_lib::$settings['split_by'] == 'maxclients') {
                foreach ($rRows as $rServerID => $rRow) {
                    $rRows[$rServerID]['capacity'] = (float) ($rRow['online_clients'] / ((ipTV_lib::$StreamingServers[$rServerID]['total_clients'] ?: 1)));
                }
            } else {
                if (ipTV_lib::$settings['split_by'] == 'guar_band') {
                    foreach ($rRows as $rServerID => $rRow) {
                        $rCurrentOutput = intval(ipTV_lib::$StreamingServers[$rServerID]['watchdog']['bytes_sent'] / 125000);
                        $rRows[$rServerID]['capacity'] = (float) ($rCurrentOutput / ((ipTV_lib::$StreamingServers[$rServerID]['network_guaranteed_speed'] ?: 1)));
                    }
                } else {
                    foreach ($rRows as $rServerID => $rRow) {
                        $rRows[$rServerID]['capacity'] = $rRow['online_clients'];
                    }
                }
            }
        }
        file_put_contents(CACHE_TMP_PATH . "servers_capacity", json_encode($rRows), LOCK_EX);
        return $rRows;
    }
    public static function getConnections($server_id = null, $user_id = null, $streamID = null) {
        $rWhere = array();
        if (!empty($server_id)) {
            $rWhere[] = 't1.server_id = ' . intval($server_id);
        }
        if (!empty($user_id)) {
            $rWhere[] = 't1.user_id = ' . intval($user_id);
        }
        $rExtra = '';
        if (count($rWhere) > 0) {
            $rExtra = 'WHERE ' . implode(' AND ', $rWhere);
        }
        $rQuery = 'SELECT t2.*,t3.*,t5.bitrate,t1.*,t1.uuid AS `uuid` FROM `lines_live` t1 LEFT JOIN `users` t2 ON t2.id = t1.user_id LEFT JOIN `streams` t3 ON t3.id = t1.stream_id LEFT JOIN `streams_servers` t5 ON t5.stream_id = t1.stream_id AND t5.server_id = t1.server_id ' . $rExtra . ' ORDER BY t1.activity_id ASC';
        self::$ipTV_db->query($rQuery);
        return self::$ipTV_db->get_rows(true, 'user_id', false);
    }
    public static function closeConnection($rActivityInfo, $rRemove = true, $rEnd = true) {
        if (!empty($rActivityInfo)) {
            if (!is_array($rActivityInfo)) {
                if (strlen(strval($rActivityInfo)) == 32) {
                    self::$ipTV_db->query('SELECT * FROM `lines_live` WHERE `uuid` = \'%s\'', $rActivityInfo);
                } else {
                    self::$ipTV_db->query('SELECT * FROM `lines_live` WHERE `activity_id` = \'%s\'', $rActivityInfo);
                }
                $rActivityInfo = self::$ipTV_db->get_row();
            }
            if (is_array($rActivityInfo)) {
                if ($rActivityInfo['container'] == 'rtmp') {
                    if ($rActivityInfo['server_id'] == SERVER_ID) {
                        shell_exec('wget --timeout=2 -O /dev/null -o /dev/null "' . ipTV_lib::$StreamingServers[SERVER_ID]['rtmp_mport_url'] . 'control/drop/client?clientid=' . intval($rActivityInfo['pid']) . '" >/dev/null 2>/dev/null &');
                    } else {
                        self::$ipTV_db->query('INSERT INTO `signals` (`pid`,`server_id`,`rtmp`,`time`) VALUES(\'%s\',\'%s\',\'%s\',UNIX_TIMESTAMP())', $rActivityInfo['pid'], $rActivityInfo['server_id'], 1);
                    }
                } else {
                    if ($rActivityInfo['container'] == 'hls') {
                        if (!$rRemove && $rEnd && $rActivityInfo['hls_end'] == 0) {
                            self::$ipTV_db->query('UPDATE `lines_live` SET `hls_end` = 1 WHERE `activity_id` = \'%s\'', $rActivityInfo['activity_id']);
                            ipTV_lib::unlink_file(CONS_TMP_PATH . $rActivityInfo['stream_id'] . '/' . $rActivityInfo['uuid']);
                        }
                    } else {
                        if ($rActivityInfo['server_id'] == SERVER_ID) {
                            if ($rActivityInfo['pid'] != getmypid() && is_numeric($rActivityInfo['pid']) && 0 < $rActivityInfo['pid']) {
                                posix_kill(intval($rActivityInfo['pid']), 9);
                            }
                        } else {
                            self::$ipTV_db->query('INSERT INTO `signals` (`pid`,`server_id`,`time`) VALUES(\'%s\',\'%s\',UNIX_TIMESTAMP())', $rActivityInfo['pid'], $rActivityInfo['server_id']);
                        }
                    }
                }
                if ($rActivityInfo['server_id'] == SERVER_ID) {
                    if (file_exists(CONS_TMP_PATH . $rActivityInfo['uuid'])) {
                        ipTV_lib::unlink_file(CONS_TMP_PATH . $rActivityInfo['uuid']);
                    }
                }
                if ($rRemove) {
                    if ($rActivityInfo['server_id'] == SERVER_ID) {
                        if (file_exists(CONS_TMP_PATH . $rActivityInfo['stream_id'] . '/' . $rActivityInfo['uuid'])) {
                            ipTV_lib::unlink_file(CONS_TMP_PATH . $rActivityInfo['stream_id'] . '/' . $rActivityInfo['uuid']);
                        }
                    }
                    self::$ipTV_db->query('DELETE FROM `lines_live` WHERE `activity_id` = \'%s\'', $rActivityInfo['activity_id']);
                }
                self::writeOfflineActivity($rActivityInfo['server_id'], $rActivityInfo['user_id'], $rActivityInfo['stream_id'], $rActivityInfo['date_start'], $rActivityInfo['user_agent'], $rActivityInfo['user_ip'], $rActivityInfo['container'], $rActivityInfo['geoip_country_code'], $rActivityInfo['isp'], $rActivityInfo['external_device'], $rActivityInfo['divergence']);
                return true;
            }
            return false;
        }
        return false;
    }
    public static function writeOfflineActivity($serverID, $userID, $streamID, $start, $userAgent, $IP, $rExtension, $GeoIP, $rISP, $rExternalDevice = '', $rDivergence = 0) {
        if (ipTV_lib::$settings['save_closed_connection'] != 0) {
            if ($serverID && $userID && $streamID) {
                $rActivityInfo = array('user_id' => intval($userID), 'stream_id' => intval($streamID), 'server_id' => intval($serverID), 'date_start' => intval($start), 'user_agent' => $userAgent, 'user_ip' => htmlentities($IP), 'date_end' => time(), 'container' => $rExtension, 'geoip_country_code' => $GeoIP, 'isp' => $rISP, 'external_device' => htmlentities($rExternalDevice), 'divergence' => intval($rDivergence));
                file_put_contents(LOGS_TMP_PATH . 'activity', base64_encode(json_encode($rActivityInfo)) . "\n", FILE_APPEND | LOCK_EX);
            }
        } else {
            return null;
        }
    }
    public static function isProcessRunning($PID, $EXE) {
        if (!empty($PID)) {
            clearstatcache(true);
            if (!(file_exists('/proc/' . $PID) && is_readable('/proc/' . $PID . '/exe') && strpos(basename(readlink('/proc/' . $PID . '/exe')), basename($EXE)) === 0)) {
                return false;
            }
            return true;
        }
        return false;
    }
    /** 
     * Checks if a monitor process is running with the specified PID and stream ID. 
     * 
     * @param int $PID The process ID of the monitor. 
     * @param int $streamID The stream ID to check against. 
     * @param string $ffmpeg_path The path to the FFmpeg executable (default is PHP_BIN). 
     * @return bool Returns true if the monitor process is running with the specified PID and stream ID, false otherwise. 
     */
    public static function CheckMonitorRunning($PID, $streamID, $ffmpeg_path = PHP_BIN) {
        if (!empty($PID)) {
            clearstatcache(true);
            if (file_exists('/proc/' . $PID) && is_readable('/proc/' . $PID . '/exe') && basename(readlink('/proc/' . $PID . '/exe')) == basename($ffmpeg_path)) {
                $value = trim(file_get_contents("/proc/{$PID}/cmdline"));
                if ($value == "XtreamCodes[{$streamID}]") {
                    return true;
                }
            }
            return false;
        }
        return false;
    }
    public static function isStreamRunning($PID, $streamID) {
        if (!empty($PID)) {
            clearstatcache(true);
            if (file_exists('/proc/' . $PID) && is_readable('/proc/' . $PID . '/exe')) {
                if (strpos(basename(readlink('/proc/' . $PID . '/exe')), 'ffmpeg') === 0) {
                    $command = trim(file_get_contents('/proc/' . $PID . '/cmdline'));
                    if (stristr($command, '/' . $streamID . '_.m3u8') || stristr($command, '/' . $streamID . '_%d.ts')) {
                        return true;
                    }
                } else {
                    if (strpos(basename(readlink('/proc/' . $PID . '/exe')), 'php') !== 0) {
                    } else {
                        return true;
                    }
                }
            }
            return false;
        }
        return false;
    }
    public static function GetStreamBitrate($type, $path, $force_duration = null) {
        clearstatcache();
        if (!file_exists($path)) {
            return false;
        }
        switch ($type) {
            case 'movie':
                if (!is_null($force_duration)) {
                    sscanf($force_duration, '%d:%d:%d', $hours, $minutes, $seconds);
                    $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
                    $bitrate = round(filesize($path) * 0.008 / $time_seconds);
                }
                break;
            case 'live':
                $fp = fopen($path, 'r');
                $bitrates = array();
                while (!feof($fp)) {
                    $line = trim(fgets($fp));
                    if (stristr($line, 'EXTINF')) {
                        list($trash, $seconds) = explode(':', $line);
                        $seconds = rtrim($seconds, ',');
                        if ($seconds <= 0) {
                            continue;
                        }
                        $segment_file = trim(fgets($fp));
                        if (!file_exists(dirname($path) . '/' . $segment_file)) {
                            fclose($fp);
                            return false;
                        }
                        $segment_size_in_kilobits = filesize(dirname($path) . '/' . $segment_file) * 0.008;
                        $bitrates[] = $segment_size_in_kilobits / $seconds;
                    }
                }
                fclose($fp);
                $bitrate = count($bitrates) > 0 ? round(array_sum($bitrates) / count($bitrates)) : 0;
                break;
        }
        return $bitrate > 0 ? $bitrate : false;
    }
    public static function getUserIP() {
        return !empty(ipTV_lib::$settings['get_real_ip_client']) && !empty($_SERVER[ipTV_lib::$settings['get_real_ip_client']]) ? $_SERVER[ipTV_lib::$settings['get_real_ip_client']] : $_SERVER['REMOTE_ADDR'];
    }
    public static function isDelayRunning($PID, $streamID) {
        if (empty($PID)) {
            return false;
        }
        clearstatcache(true);
        if (file_exists('/proc/' . $PID) && is_readable('/proc/' . $PID . '/exe')) {
            $value = trim(file_get_contents("/proc/{$PID}/cmdline"));
            if ($value == "XtreamCodesDelay[{$streamID}]") {
                return true;
            }
        }
        return false;
    }
    public static function StreamLog($rStreamID, $rServerID, $rAction, $rSource = '') {
        if (ipTV_lib::$settings['save_restart_logs'] != 0) {
            $rData = array('server_id' => $rServerID, 'stream_id' => $rStreamID, 'action' => $rAction, 'source' => $rSource, 'time' => time());
            file_put_contents(LOGS_TMP_PATH . 'stream_log.log', base64_encode(json_encode($rData)) . "\n", FILE_APPEND);
        } else {
            return null;
        }
    }
    public static function GetSegmentsOfPlaylist($playlist, $prebuffer = 0, $segmentDuration = 10) {
        if (file_exists($playlist)) {
            $source = file_get_contents($playlist);
            if (preg_match_all('/(.*?).ts/', $source, $rMatches)) {
                if (0 < $prebuffer) {
                    $totalSegments = intval($prebuffer / $segmentDuration);
                    if (!$totalSegments) {
                        $totalSegments = 1;
                    }
                    return array_slice($rMatches[0], 0 - $totalSegments);
                }
                if ($prebuffer == -1) {
                    return $rMatches[0];
                }
                preg_match('/_(.*)\\./', array_pop($rMatches[0]), $currentSegment);
                return $currentSegment[1];
            }
        }
    }
    /** 
     * Logs client actions to a file if client_logs_save setting is enabled or bypass flag is set to true. 
     *  
     * @param int $streamID The ID of the stream. 
     * @param int $userID The ID of the user performing the action. 
     * @param string $action The action being performed. 
     * @param string $IP The IP address of the user. 
     * @param string $data Additional data to be logged (optional). 
     * @param bool $bypass Flag to bypass the client_logs_save setting (optional). 
     * @return void|null 
     */
    public static function ClientLog($streamID, $userID, $action, $IP, $data = '', $bypass = false) {
        if (ipTV_lib::$settings['client_logs_save'] != 0 || $bypass) {
            $user_agent = (!empty($_SERVER['HTTP_USER_AGENT']) ? htmlentities($_SERVER['HTTP_USER_AGENT']) : '');
            $data = array('user_id' => $userID, 'stream_id' => $streamID, 'action' => $action, 'query_string' => htmlentities($_SERVER['QUERY_STRING']), 'user_agent' => $user_agent, 'user_ip' => $IP, 'time' => time(), 'extra_data' => $data);
            file_put_contents(LOGS_TMP_PATH . 'client_request.log', base64_encode(json_encode($data)) . "\n", FILE_APPEND);
        } else {
            return null;
        }
    }
    public static function ShowVideo($is_restreamer = 0, $video_id_setting, $video_path_id, $extension = 'ts') {
        global $showErrors;
        if ($is_restreamer == 0 && ipTV_lib::$settings[$video_id_setting] == 1) {
            if ($extension == 'm3u8') {
                $extm3u = '#EXTM3U
				#EXT-X-VERSION:3
				#EXT-X-MEDIA-SEQUENCE:0
				#EXT-X-ALLOW-CACHE:YES
				#EXT-X-TARGETDURATION:11
				#EXTINF:10.0,
				' . ipTV_lib::$settings[$video_path_id] . '
				#EXT-X-ENDLIST';
                header('Content-Type: application/x-mpegurl');
                header('Content-Length: ' . strlen($extm3u));
                echo $extm3u;
                die;
            } else {
                header('Content-Type: video/mp2t');
                readfile(ipTV_lib::$settings[$video_path_id]);
                die;
            }
        }
        if ($showErrors) {
            print_r($video_id_setting);
        } else {
            http_response_code(403);
        }
        die;
    }
    public static function validateConnections($userInfo, $IP = null, $userAgent = null) {
        if ($userInfo['max_connections'] != 0) {
            if (!empty($userInfo['pair_id'])) {
                self::closeConnections($userInfo['pair_id'], $userInfo['max_connections'],  $IP, $userAgent);
            }
            self::closeConnections($userInfo['id'], $userInfo['max_connections'], $IP, $userAgent);
        }
    }
    public static function closeConnections($userID, $rMaxConnections, $IP = null, $userAgent = null) {
        self::$ipTV_db->query('SELECT `lines_live`.*, `on_demand` FROM `lines_live` LEFT JOIN `streams_servers` ON `streams_servers`.`stream_id` = `lines_live`.`stream_id` AND `streams_servers`.`server_id` = `lines_live`.`server_id` WHERE `lines_live`.`user_id` = \'%d\' AND `lines_live`.`hls_end` = 0 ORDER BY `lines_live`.`activity_id` ASC', $userID);
        $rConnectionCount = self::$ipTV_db->num_rows();
        $rToKill = $rConnectionCount - $rMaxConnections;
        if ($rToKill > 0) {
            $rConnections = self::$ipTV_db->get_rows();
        } else {
            return null;
        }

        $IP = self::getUserIP();
        $rKilled = 0;
        $rDelSID = $rDelUUID = $IDs = array();
        if ($IP && $userAgent) {
            $rKillTypes = array(2, 1, 0);
        } else {
            if ($IP) {
                $rKillTypes = array(1, 0);
            } else {
                $rKillTypes = array(0);
            }
        }
        foreach ($rKillTypes as $rKillOwnIP) {
            $i = 0;
            while ($i < count($rConnections) && $rKilled < $rToKill) {
                if ($rKilled != $rToKill) {
                    if ($rConnections[$i]['pid'] != getmypid()) {
                        if ($rConnections[$i]['user_ip'] == $IP && $rConnections[$i]['user_agent'] == $userAgent && $rKillOwnIP == 2 || $rConnections[$i]['user_ip'] == $IP && $rKillOwnIP == 1 || $rKillOwnIP == 0) {
                            if (self::closeConnection($rConnections[$i])) {
                                $rKilled++;
                                if ($rConnections[$i]['container'] != 'hls') {
                                    $IDs[] = intval($rConnections[$i]['activity_id']);

                                    $rDelUUID[] = $rConnections[$i]['uuid'];
                                    $rDelSID[$rConnections[$i]['stream_id']][] = $rDelUUID;
                                }
                                if ($rConnections[$i]['on_demand'] && $rConnections[$i]['server_id'] == SERVER_ID && ipTV_lib::$settings["on_demand_instant_off"]) {
                                    self::removeFromQueue($rConnections[$i]['stream_id'], $rConnections[$i]['pid']);
                                }
                            }
                        }
                    }
                    $i++;
                } else {
                    break;
                }
            }
        }
        if (!empty($IDs)) {
            self::$ipTV_db->query('DELETE FROM `lines_live` WHERE `activity_id` IN (' . implode(',', array_map('intval', $IDs)) . ')');
            foreach ($rDelUUID as $rUUID) {
                ipTV_lib::unlink_file(CONS_TMP_PATH . $rUUID);
            }
            foreach ($rDelSID as $streamID => $rUUIDs) {
                foreach ($rUUIDs as $rUUID) {
                    ipTV_lib::unlink_file(CONS_TMP_PATH . $streamID . '/' . $rUUID);
                }
            }
        }
        return $rKilled;
    }
    public static function removeFromQueue($rStreamID, $rPID) {
        $rActivePIDs = array();
        foreach ((unserialize(file_get_contents(SIGNALS_TMP_PATH . 'queue_' . intval($rStreamID))) ?: array()) as $rActivePID) {
            if (self::isProcessRunning($rActivePID, 'php-fpm') && $rPID != $rActivePID) {
                $rActivePIDs[] = $rActivePID;
            }
        }
        if (0 < count($rActivePIDs)) {
            file_put_contents(SIGNALS_TMP_PATH . 'queue_' . intval($rStreamID), serialize($rActivePIDs));
        } else {
            unlink(SIGNALS_TMP_PATH . 'queue_' . intval($rStreamID));
        }
    }
    public static function generateHLS($rM3U8, $rUsername, $rPassword, $streamID, $rUUID, $IP, $rVideoCodec = 'h264', $rOnDemand = 0, $rServerID = null, $rProxyID = null) {
        if (file_exists($rM3U8)) {
            $rSource = file_get_contents($rM3U8);
            if ($rOnDemand) {
                $rKeyToken = encryptData($IP . '/' . $streamID, ipTV_lib::$settings['live_streaming_pass'], OPENSSL_EXTRA);
                $rSource = "#EXTM3U\n#EXT-X-KEY:METHOD=AES-128,URI=\"" . (($rProxyID ? '/' . md5($rProxyID . '_' . $rServerID . '_' . OPENSSL_EXTRA) : '')) . '/key/' . $rKeyToken . '",IV=0x' . bin2hex(file_get_contents(STREAMS_PATH . $streamID . '_.iv')) . "\n" . substr($rSource, 8, strlen($rSource) - 8);
            }
            if (preg_match_all('/(.*?)\\.ts/', $rSource, $rMatches)) {
                foreach ($rMatches[0] as $rMatch) {
                    $rToken = encryptData($rUsername . '/' . $rPassword . '/' . $IP . '/' . $streamID . '/' . $rMatch . '/' . $rUUID . '/' . SERVER_ID . '/' . $rVideoCodec . '/' . $rOnDemand, ipTV_lib::$settings['live_streaming_pass'], OPENSSL_EXTRA);
                    $rSource = str_replace($rMatch, (($rProxyID ? '/' . md5($rProxyID . '_' . $rServerID . '_' . OPENSSL_EXTRA) : '')) . '/hls/' . $rToken, $rSource);
                }
                return $rSource;
            }
        }
        return false;
    }
    public static function getIPInfo($IP) {
        if (!empty($IP)) {
            if (!file_exists(CONS_TMP_PATH . md5($IP) . '_geo2')) {
                $rGeoIP =  new MaxMind\Db\Reader(GEOIP2COUNTRY_FILENAME);
                $rResponse = $rGeoIP->get($IP);
                $rGeoIP->close();
                if ($rResponse) {
                    file_put_contents(CONS_TMP_PATH . md5($IP) . '_geo2', json_encode($rResponse));
                }
                return $rResponse;
            }
            return json_decode(file_get_contents(CONS_TMP_PATH . md5($IP) . '_geo2'), true);
        }
        return false;
    }
    public static function GetUserInfo($userID = null, $username = null, $password = null, $getChannelIDs = false, $getBouquetInfo = false, $IP = '') {
        $userInfo = null;
        if (ipTV_lib::$cached) {
            if (empty($password) && empty($userID) && strlen($username) == 32) {
                if (ipTV_lib::$settings['case_sensitive_line']) {
                    $userID = intval(file_get_contents(USER_TMP_PATH . 'user_t_' . $username));
                } else {
                    $userID = intval(file_get_contents(USER_TMP_PATH . 'user_t_' . strtolower($username)));
                }
            } else {
                if (!empty($username) && !empty($password)) {
                    if (ipTV_lib::$settings['case_sensitive_line']) {
                        $userID = intval(file_get_contents(USER_TMP_PATH . 'user_c_' . $username . '_' . $password));
                    } else {
                        $userID = intval(file_get_contents(USER_TMP_PATH . 'user_c_' . strtolower($username) . '_' . strtolower($password)));
                    }
                } else {
                    if (empty($userID)) {
                        return false;
                    }
                }
            }
            if ($userID) {
                $userInfo = unserialize(file_get_contents(USER_TMP_PATH . 'user_i_' . $userID));
            }
        } else {
            if (empty($password) && empty($userID) && strlen($username) == 32) {
                self::$ipTV_db->query('SELECT * FROM `users` WHERE `is_mag` = 0 AND `is_e2` = 0 AND `access_token` = \'%s\' AND LENGTH(`access_token`) = 32', $username);
            } else {
                if (!empty($username) && !empty($password)) {
                    self::$ipTV_db->query('SELECT `users`.*, `mag_devices`.`token` AS `mag_token` FROM `users` LEFT JOIN `mag_devices` ON `mag_devices`.`user_id` = `users`.`id` WHERE `username` = \'%s\' AND `password` = \'%s\' LIMIT 1', $username, $password);
                } else {
                    if (!empty($userID)) {
                        self::$ipTV_db->query('SELECT `users`.*, `mag_devices`.`token` AS `mag_token` FROM `users` LEFT JOIN `mag_devices` ON `mag_devices`.`user_id` = `users`.`id` WHERE `id` = \'%s\'', $userID);
                    } else {
                        return false;
                    }
                }
            }
            if (self::$ipTV_db->num_rows() > 0) {
                $userInfo = self::$ipTV_db->get_row();
            }
        }
        if (!$userInfo) {
            return false;
        }
        if (ipTV_lib::$settings['county_override_1st'] == 1 && empty($userInfo['forced_country']) && !empty($IP) && $userInfo['max_connections'] == 1) {
            $userInfo['forced_country'] = self::getIPInfo($IP)['registered_country']['iso_code'];

            self::$ipTV_db->query('UPDATE `users` SET `forced_country` = \'%s\' WHERE `id` = \'%s\'', $userInfo['forced_country'], $userInfo['id']);
        }
        $userInfo['bouquet'] = json_decode($userInfo['bouquet'], true);
        $userInfo['allowed_ips'] = @array_filter(@array_map('trim', @json_decode($userInfo['allowed_ips'], true)));
        $userInfo['allowed_ua'] = @array_filter(@array_map('trim', @json_decode($userInfo['allowed_ua'], true)));
        if (file_exists(TMP_PATH . 'user_output' . $userInfo["id"])) {
            $userInfo["output_formats"] = unserialize(file_get_contents(TMP_PATH . "user_output" . $userInfo["id"]));
        } else {
            self::$ipTV_db->query("SELECT * FROM `access_output` t1 INNER JOIN `user_output` t2 ON t1.access_output_id = t2.access_output_id WHERE t2.user_id = '%d'", $userInfo["id"]);
            $userInfo["output_formats"] = self::$ipTV_db->get_rows(true, "output_key");
            file_put_contents(TMP_PATH . 'user_output' . $userInfo["id"], serialize($userInfo["output_formats"]), LOCK_EX);
        }

        $userInfo['con_isp_name'] = null;
        $userInfo['isp_violate'] = 0;
        $userInfo['isp_is_server'] = 0;

        if (ipTV_lib::$settings['show_isps'] == 1 || !empty($IP)) {
            $ISPLock = self::getISP($IP);
            if (is_array($ISPLock)) {
                if (!empty($ISPLock["isp_info"]["description"])) {
                    $userInfo["con_isp_name"] = $ISPLock["isp_info"]["description"];
                    if (ipTV_lib::$settings['block_svp'] == 1) {
                        $IspIsBlocked = self::checkIspIsBlocked($userInfo["con_isp_name"]);
                        if ($userInfo["is_restreamer"] == 0 && ipTV_lib::$settings["block_svp"] == 1 && !empty($ISPLock["isp_info"]["is_server"])) {
                            $userInfo["isp_is_server"] = $ISPLock["isp_info"]["is_server"];
                        }
                        if ($userInfo["isp_is_server"] == 1) {
                            $userInfo["con_isp_type"] = $ISPLock["isp_info"]["type"];
                        }
                        if ($IspIsBlocked !== false) {
                            $userInfo["isp_is_server"] = $IspIsBlocked == 1 ? 1 : 0;
                            $userInfo["con_isp_type"] = $userInfo["isp_is_server"] == 1 ? "Custom" : null;
                        }
                    }
                }
            }
            if (!empty($userInfo['con_isp_name']) && ipTV_lib::$settings['enable_isp_lock'] == 1 && $userInfo['is_stalker'] == 0 && $userInfo['is_isplock'] == 1 && !empty($userInfo['isp_desc']) && strtolower($userInfo['con_isp_name']) != strtolower($userInfo['isp_desc'])) {
                $userInfo['isp_violate'] = 1;
            }
            if ($userInfo['isp_violate'] == 0 && strtolower($userInfo['con_isp_name']) != strtolower($userInfo['isp_desc'])) {
                self::$ipTV_db->query('UPDATE `users` SET `isp_desc` = \'%s\', `as_number` = \'%s\' WHERE `id` = \'%s\'', $userInfo['con_isp_name'], $userInfo['isp_asn'], $userInfo['id']);
            }
        }

        if ($getChannelIDs) {
            $rLiveIDs = $rVODIDs = $rRadioIDs = $rCategoryIDs = $rChannelIDs = $rSeriesIDs = array();
            foreach ($userInfo['bouquet'] as $ID) {
                if (isset(ipTV_lib::$Bouquets[$ID]['streams'])) {
                    $rChannelIDs = array_merge($rChannelIDs, ipTV_lib::$Bouquets[$ID]['streams']);
                }
                if (isset(ipTV_lib::$Bouquets[$ID]['series'])) {
                    $rSeriesIDs = array_merge($rSeriesIDs, ipTV_lib::$Bouquets[$ID]['series']);
                }
                if (isset(ipTV_lib::$Bouquets[$ID]['channels'])) {
                    $rLiveIDs = array_merge($rLiveIDs, ipTV_lib::$Bouquets[$ID]['channels']);
                }
                if (isset(ipTV_lib::$Bouquets[$ID]['movies'])) {
                    $rVODIDs = array_merge($rVODIDs, ipTV_lib::$Bouquets[$ID]['movies']);
                }
                if (isset(ipTV_lib::$Bouquets[$ID]['radios'])) {
                    $rRadioIDs = array_merge($rRadioIDs, ipTV_lib::$Bouquets[$ID]['radios']);
                }
            }
            $userInfo['channel_ids'] = array_map('intval', array_unique($rChannelIDs));
            $userInfo['series_ids'] = array_map('intval', array_unique($rSeriesIDs));
            $userInfo['vod_ids'] = array_map('intval', array_unique($rVODIDs));
            $userInfo['live_ids'] = array_map('intval', array_unique($rLiveIDs));
            $userInfo['radio_ids'] = array_map('intval', array_unique($rRadioIDs));
        }
        $rAllowedCategories = array();
        $rCategoryMap = unserialize(file_get_contents(CACHE_TMP_PATH . 'category_map'));
        foreach ($userInfo['bouquet'] as $ID) {
            $rAllowedCategories = array_merge($rAllowedCategories, ($rCategoryMap[$ID] ?: array()));
        }
        $userInfo['category_ids'] = array_values(array_unique($rAllowedCategories));
        return $userInfo;
    }
    public static function checkIspIsBlocked($con_isp_name) {
        foreach (ipTV_lib::$customISP as $isp) {
            if (strtolower($con_isp_name) == strtolower($isp['isp'])) {
                return $isp['blocked'];
            }
        }
        return false;
    }
    public static function getISP($user_ip) {
        if (!empty($user_ip)) {
            if (file_exists(USER_TMP_PATH . md5($user_ip) . '_isp')) {
                return unserialize(file_get_contents(USER_TMP_PATH . md5($user_ip) . '_isp'));
            }
            if ((isset($user_ip)) && (filter_var($user_ip, FILTER_VALIDATE_IP))) {
                $rData = json_decode(file_get_contents("https://db-ip.com/demo/home.php?s=" . $user_ip), True);

                if (strlen($rData["demoInfo"]["isp"]) > 0) {
                    $json = array(
                        "isp_info" => array(
                            "as_number" => $rData["demoInfo"]["asNumber"],
                            "description" => $rData["demoInfo"]["isp"],
                            "type" => $rData["demoInfo"]["usageType"],
                            "ip" => $rData["demoInfo"]["ipAddress"],
                            "country_code" => $rData["demoInfo"]["countryCode"],
                            "country_name" => $rData["demoInfo"]["countryName"],
                            "is_server" => $rData["demoInfo"]["usageType"] != "consumer" ? true : false
                            // note: if api is not returning correct usagetype, try another isp api source.
                        )
                    );
                    file_put_contents(USER_TMP_PATH . md5($user_ip) . '_isp', serialize($json));
                }
            }
            return $json;
        }
        return false;
    }
    public static function checkGlobalBlockUA($user_agent) {
        $user_agent = strtolower($user_agent);
        $id = false;
        foreach (ipTV_lib::$blockedUA as $key => $value) {
            if (($value['exact_match'] == 1)) {
                if ($value['blocked_ua'] == $user_agent) {
                    $id = $key;
                    break;
                }
            } else if (stristr($user_agent, $value['blocked_ua'])) {
                $id = $key;
            }
        }
        if ($id > 0) {
            self::$ipTV_db->query('UPDATE `blocked_user_agents` SET `attempts_blocked` = `attempts_blocked`+1 WHERE `id` = \'%d\'', $id);
            die;
        }
    }
    public static function ChannelInfo($streamID, $extension, $userInfo, $rCountryCode, $rUserISP = '', $rType = '') {
        $rStream = self::getStreamData($streamID);
        if ($rStream) {
            $rStream['info']['bouquets'] = $rStream['bouquets'];
            $rAvailableServers = array();
            if ($rType == 'archive') {
                if (0 < $rStream['info']['tv_archive_duration'] && 0 < $rStream['info']['tv_archive_server_id'] && array_key_exists($rStream['info']['tv_archive_server_id'], ipTV_lib::$StreamingServers)) {
                    $rAvailableServers = array($rStream['info']['tv_archive_server_id']);
                }
            } else {

                if ($rStream['info']['direct_source'] == 0) {
                    foreach (ipTV_lib::$StreamingServers as $rServerID => $serverInfo) {
                        if (array_key_exists($rServerID, $rStream['servers']) || $serverInfo['server_online'] || $serverInfo['server_type'] == 0) {

                            if (isset($rStream['servers'][$rServerID])) {
                                if ($rType == 'movie') {
                                    if ((!empty($rStream['servers'][$rServerID]['pid']) && $rStream['servers'][$rServerID]['to_analyze'] == 0 && $rStream['servers'][$rServerID]['stream_status'] == 0 || $rStream['info']['direct_source'] == 1) && ($rStream['info']['target_container'] == $extension || ($extension = 'srt')) && $serverInfo['timeshift_only'] == 0) {
                                        $rAvailableServers[] = $rServerID;
                                    }
                                } else {
                                    if (($rStream['servers'][$rServerID]['on_demand'] == 1 && $rStream['servers'][$rServerID]['stream_status'] != 1 || 0 < $rStream['servers'][$rServerID]['pid'] && $rStream['servers'][$rServerID]['stream_status'] == 0) && $rStream['servers'][$rServerID]['to_analyze'] == 0 && (int) $rStream['servers'][$rServerID]['delay_available_at'] <= time() && $serverInfo['timeshift_only'] == 0 || $rStream['info']['direct_source'] == 1) {
                                        $rAvailableServers[] = $rServerID;
                                    }
                                }
                            }
                        }
                    }
                } else {
                    header('Location: ' . str_replace(' ', '%20', json_decode($rStream['info']['stream_source'], true)[0]));
                    exit();
                }
            }
            if (!empty($rAvailableServers)) {
                shuffle($rAvailableServers);
                $rServerCapacity = self::getCapacity();
                $rAcceptServers = array();
                foreach ($rAvailableServers as $rServerID) {
                    $rOnlineClients = (isset($rServerCapacity[$rServerID]['online_clients']) ? $rServerCapacity[$rServerID]['online_clients'] : 0);
                    if ($rOnlineClients == 0) {
                        $rServerCapacity[$rServerID]['capacity'] = 0;
                    }
                    $rAcceptServers[$rServerID] = (0 < ipTV_lib::$StreamingServers[$rServerID]['total_clients'] && $rOnlineClients < ipTV_lib::$StreamingServers[$rServerID]['total_clients'] ? $rServerCapacity[$rServerID]['capacity'] : false);
                }
                $rAcceptServers = array_filter($rAcceptServers, 'is_numeric');
                if (empty($rAcceptServers)) {
                    if ($rType == 'archive') {
                        return null;
                    }
                    return array();
                }
                $rKeys = array_keys($rAcceptServers);
                $rValues = array_values($rAcceptServers);
                array_multisort($rValues, SORT_ASC, $rKeys, SORT_ASC);
                $rAcceptServers = array_combine($rKeys, $rValues);
                if ($extension == 'rtmp' && array_key_exists(SERVER_ID, $rAcceptServers)) {
                    $rRedirectID = SERVER_ID;
                } else {
                    if (isset($userInfo) && $userInfo['force_server_id'] != 0 && array_key_exists($userInfo['force_server_id'], $rAcceptServers)) {
                        $rRedirectID = $userInfo['force_server_id'];
                    } else {
                        $rPriorityServers = array();
                        foreach (array_keys($rAcceptServers) as $rServerID) {
                            if (ipTV_lib::$StreamingServers[$rServerID]['enable_geoip'] == 1) {
                                if (in_array($rCountryCode, ipTV_lib::$StreamingServers[$rServerID]['geoip_countries'])) {
                                    $rRedirectID = $rServerID;
                                    break;
                                }
                                if (ipTV_lib::$StreamingServers[$rServerID]['geoip_type'] == 'strict') {
                                    unset($rAcceptServers[$rServerID]);
                                } else {
                                    if (isset($rStream) && !ipTV_lib::$settings['ondemand_balance_equal'] && $rStream['servers'][$rServerID]['on_demand']) {
                                        $rPriorityServers[$rServerID] = (ipTV_lib::$StreamingServers[$rServerID]['geoip_type'] == 'low_priority' ? 3 : 2);
                                    } else {
                                        $rPriorityServers[$rServerID] = (ipTV_lib::$StreamingServers[$rServerID]['geoip_type'] == 'low_priority' ? 2 : 1);
                                    }
                                }
                            } else {
                                if (ipTV_lib::$StreamingServers[$rServerID]['enable_isp'] == 1) {
                                    if (in_array(strtolower(trim(preg_replace('/[^A-Za-z0-9 ]/', '', $rUserISP))), ipTV_lib::$StreamingServers[$rServerID]['isp_names'])) {
                                        $rRedirectID = $rServerID;
                                        break;
                                    }
                                    if (ipTV_lib::$StreamingServers[$rServerID]['isp_type'] == 'strict') {
                                        unset($rAcceptServers[$rServerID]);
                                    } else {
                                        if (isset($rStream) && !ipTV_lib::$settings['ondemand_balance_equal'] && $rStream['servers'][$rServerID]['on_demand']) {
                                            $rPriorityServers[$rServerID] = (ipTV_lib::$StreamingServers[$rServerID]['isp_type'] == 'low_priority' ? 3 : 2);
                                        } else {
                                            $rPriorityServers[$rServerID] = (ipTV_lib::$StreamingServers[$rServerID]['isp_type'] == 'low_priority' ? 2 : 1);
                                        }
                                    }
                                } else {
                                    if (isset($rStream) && !ipTV_lib::$settings['ondemand_balance_equal'] && $rStream['servers'][$rServerID]['on_demand']) {
                                        $rPriorityServers[$rServerID] = 2;
                                    } else {
                                        $rPriorityServers[$rServerID] = 1;
                                    }
                                }
                            }
                        }
                        if (!(empty($rPriorityServers) && empty($rRedirectID))) {
                            $rRedirectID = (empty($rRedirectID) ? array_search(min($rPriorityServers), $rPriorityServers) : $rRedirectID);
                        } else {
                            return false;
                        }
                    }
                }
                if ($rType == 'archive') {
                    return $rRedirectID;
                }
                $rStream['info']['redirect_id'] = $rRedirectID;
                $fc4c58c5d1cd68d1 = $rRedirectID;
                return array_merge($rStream['info'], $rStream['servers'][$fc4c58c5d1cd68d1]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function getStreamingURL($rServerID = null, $rForceHTTP = false) {
        if (!isset($rServerID)) {
            $rServerID = SERVER_ID;
        }
        if ($rForceHTTP) {
            $rProtocol = 'http';
        } else {
            $rProtocol = ipTV_lib::$StreamingServers[$rServerID]['server_protocol'];
        }
        $rDomain = null;
        if (0 < strlen(HOST) && in_array(strtolower(HOST), array_map('strtolower', ipTV_lib::$StreamingServers[$rServerID]['domains']['urls']))) {
            $rDomain = HOST;
        } else {
            if (ipTV_lib::$StreamingServers[$rServerID]['random_ip'] && 0 < count(ipTV_lib::$StreamingServers[$rServerID]['domains']['urls'])) {
                $rDomain = ipTV_lib::$StreamingServers[$rServerID]['domains']['urls'][array_rand(ipTV_lib::$StreamingServers[$rServerID]['domains']['urls'])];
            }
        }
        if ($rDomain) {
            $rURL = $rProtocol . '://' . $rDomain . ':' . ipTV_lib::$StreamingServers[$rServerID][$rProtocol . '_broadcast_port'];
        } else {
            $rURL = rtrim(ipTV_lib::$StreamingServers[$rServerID][$rProtocol . '_url'], '/');
        }
        return $rURL;
    }
    public static function getStreamData($streamID) {
        if (CACHE_STREAMS) {
            if (file_exists(TMP_PATH . $streamID . "_cacheStream") && time() - filemtime(TMP_PATH . $streamID . "_cacheStream") <= CACHE_STREAMS_TIME) {
                return unserialize(file_get_contents(TMP_PATH . $streamID . "_cacheStream"));
            }
        }
        $rOutput = array();
        self::$ipTV_db->query('SELECT * FROM `streams` t1 LEFT JOIN `streams_types` t2 ON t2.type_id = t1.type WHERE t1.`id` = \'%s\'', $streamID);
        if (self::$ipTV_db->num_rows() > 0) {
            $rStreamInfo = self::$ipTV_db->get_row();
            $rServers = array();
            if ($rStreamInfo['direct_source'] == 0) {
                self::$ipTV_db->query('SELECT * FROM `streams_servers` WHERE `stream_id` = \'%s\'', $streamID);
                if (self::$ipTV_db->num_rows() > 0) {
                    $rServers = self::$ipTV_db->get_rows(true, 'server_id');
                }
            }
            $rOutput['bouquets'] = self::getBouquetMap($streamID);
            $rOutput['info'] = $rStreamInfo;
            $rOutput['servers'] = $rServers;
            if (CACHE_STREAMS) {
                file_put_contents(TMP_PATH . $streamID . "_cacheStream", serialize($rOutput), LOCK_EX);
            }
        }
        return (!empty($rOutput) ? $rOutput : false);
    }
    public static function getBouquetMap($streamID) {
        $rBouquetMap = unserialize(file_get_contents(CACHE_TMP_PATH . 'bouquet_map'));
        $rReturn = ($rBouquetMap[$streamID] ?: array());
        unset($rBouquetMap);
        return $rReturn;
    }
}
