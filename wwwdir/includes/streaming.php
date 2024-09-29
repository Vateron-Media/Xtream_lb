<?php
class ipTV_streaming {
    public static $ipTV_db;
    public static $AllowedIPs = array();
    public static function cdB7Ed3e4910A38DAaB7bdEdc40d824F() {
        self::$ipTV_db->query("SELECT `ip` FROM `rtmp_ips`");
        return array_merge(array("127.0.0.1"), ipTV_lib::array_values_recursive(self::$ipTV_db->get_rows()));
    }
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
    public static function b5b64Fc74AAa86445F7C95E69baBdD84($F43e647d100aaa12be0cb16c72d9031b, $b6497ba71489783c3747f19debe893a4 = '', $dc5791fad6da6f9dd96b83b988be0cb8 = '', $Fdc134ea90d233be850c53c1266026d6 = '', $E1dc5da23bfc7433f190ed9488d09204 = '') {
        if (file_exists($F43e647d100aaa12be0cb16c72d9031b)) {
            $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($F43e647d100aaa12be0cb16c72d9031b);
            if (preg_match_all("/(.*?)\\.ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
                foreach ($f563f11de8fd50b6d6e4071878cbe2de[0] as $a5e686e6c77e9ffdb58ffe6b089d4fad) {
                    $B31f58220362e7d683b209c0b9237d23 = md5($a5e686e6c77e9ffdb58ffe6b089d4fad . $Fdc134ea90d233be850c53c1266026d6 . ipTV_lib::$settings["crypt_load_balancing"] . filesize(STREAMS_PATH . $a5e686e6c77e9ffdb58ffe6b089d4fad));
                    $E4866fec202244d7a3c9f4e24f6ee344 = str_replace($a5e686e6c77e9ffdb58ffe6b089d4fad, "/hlsr/{$dc5791fad6da6f9dd96b83b988be0cb8}/{$Fdc134ea90d233be850c53c1266026d6}/{$E1dc5da23bfc7433f190ed9488d09204}/{$b6497ba71489783c3747f19debe893a4}/{$B31f58220362e7d683b209c0b9237d23}/{$a5e686e6c77e9ffdb58ffe6b089d4fad}", $E4866fec202244d7a3c9f4e24f6ee344);
                }
                return $E4866fec202244d7a3c9f4e24f6ee344;
            }
            return false;
        }
    }
    public static function fd9BceaaE00258EC95E5Ad4d91456864($b0f2ad37a04751a76687ec58fd378a0f, $bb9395b85a921191c7f955bd5041f57f = true) {
        if (empty($b0f2ad37a04751a76687ec58fd378a0f)) {
            return false;
        }
        if (empty($b0f2ad37a04751a76687ec58fd378a0f["activity_id"])) {
            self::$ipTV_db->query("SELECT * FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f);
            $b0f2ad37a04751a76687ec58fd378a0f = self::$ipTV_db->get_row();
        }
        if (empty($b0f2ad37a04751a76687ec58fd378a0f)) {
            return false;
        }
        if ($b0f2ad37a04751a76687ec58fd378a0f["container"] == "rtmp") {
            if ($b0f2ad37a04751a76687ec58fd378a0f["server_id"] == SERVER_ID) {
                shell_exec("wget --timeout=2 -O /dev/null -o /dev/null \"" . ipTV_lib::$StreamingServers[SERVER_ID]["rtmp_mport_url"] . "control/drop/client?clientid={$b0f2ad37a04751a76687ec58fd378a0f["pid"]}\" >/dev/null 2>/dev/null &");
            } else {
                self::$ipTV_db->query("INSERT INTO `signals` (`pid`,`server_id`,`rtmp`,`time`) VALUES('%d','%d','%d',UNIX_TIMESTAMP())", $b0f2ad37a04751a76687ec58fd378a0f["pid"], $b0f2ad37a04751a76687ec58fd378a0f["server_id"], 1);
            }
        } else {
            if ($b0f2ad37a04751a76687ec58fd378a0f["container"] == "hls") {
                if (!$bb9395b85a921191c7f955bd5041f57f) {
                    self::$ipTV_db->query("UPDATE `user_activity_now` SET `hls_end` = 1 WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
                }
            } else {
                if ($b0f2ad37a04751a76687ec58fd378a0f["server_id"] == SERVER_ID) {
                    shell_exec("kill -9 {$b0f2ad37a04751a76687ec58fd378a0f["pid"]} >/dev/null 2>/dev/null &");
                } else {
                    self::$ipTV_db->query("INSERT INTO `signals` (`pid`,`server_id`,`time`) VALUES('%d','%d',UNIX_TIMESTAMP())", $b0f2ad37a04751a76687ec58fd378a0f["pid"], $b0f2ad37a04751a76687ec58fd378a0f["server_id"]);
                }
            }
        }
        if ($bb9395b85a921191c7f955bd5041f57f) {
            self::$ipTV_db->query("DELETE FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
        }
        self::c9cCC76c9D6b7e44c6D4a7a6c7191EB5($b0f2ad37a04751a76687ec58fd378a0f["server_id"], $b0f2ad37a04751a76687ec58fd378a0f["user_id"], $b0f2ad37a04751a76687ec58fd378a0f["stream_id"], $b0f2ad37a04751a76687ec58fd378a0f["date_start"], $b0f2ad37a04751a76687ec58fd378a0f["user_agent"], $b0f2ad37a04751a76687ec58fd378a0f["user_ip"], $b0f2ad37a04751a76687ec58fd378a0f["container"], $b0f2ad37a04751a76687ec58fd378a0f["geoip_country_code"], $b0f2ad37a04751a76687ec58fd378a0f["isp"], $b0f2ad37a04751a76687ec58fd378a0f["external_device"]);
        return true;
    }
    public static function F9EDF299BE4280CC9900d81d8355fd29($b6497ba71489783c3747f19debe893a4, $C671e9e0a59f18412464d71d67ba55c7) {
        $output = array();
        $output["server"] = array();
        $output["info"] = array();
        self::$ipTV_db->query("SELECT * FROM `streams` t1\n                                LEFT JOIN `streams_types` t2 ON t2.type_id = t1.type\n                                WHERE t1.`id` = '%d'", $b6497ba71489783c3747f19debe893a4);
        if (self::$ipTV_db->num_rows() > 0) {
            $de8b98affa55c7e6bfe327d372e15fc9 = self::$ipTV_db->get_row();
            $C0d89202f2a1eca312a0eaf802d3b913 = array();
            if ($de8b98affa55c7e6bfe327d372e15fc9["direct_source"] == 0) {
                self::$ipTV_db->query("SELECT * FROM `streams_sys` WHERE `stream_id` = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, $C671e9e0a59f18412464d71d67ba55c7);
                if (self::$ipTV_db->num_rows() > 0) {
                    $output["server"] = self::$ipTV_db->get_row();
                }
            }
            $output["info"] = $de8b98affa55c7e6bfe327d372e15fc9;
        }
        return !empty($output) ? $output : false;
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
    public static function CE9736Cb36fC32A1E05Ec062E4E88475($ef4f0599712515333103265dafb029f7) {
        if (empty($ef4f0599712515333103265dafb029f7)) {
            return false;
        }
        self::$ipTV_db->query("SELECT * FROM `user_activity_now` WHERE `container` = 'rtmp' AND `pid` = '%d' AND `server_id` = '%d'", $ef4f0599712515333103265dafb029f7, SERVER_ID);
        if (self::$ipTV_db->num_rows() > 0) {
            $b0f2ad37a04751a76687ec58fd378a0f = self::$ipTV_db->get_row();
            self::$ipTV_db->query("DELETE FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
            self::C9ccc76C9d6b7e44c6D4a7A6c7191EB5($b0f2ad37a04751a76687ec58fd378a0f["server_id"], $b0f2ad37a04751a76687ec58fd378a0f["user_id"], $b0f2ad37a04751a76687ec58fd378a0f["stream_id"], $b0f2ad37a04751a76687ec58fd378a0f["date_start"], $b0f2ad37a04751a76687ec58fd378a0f["user_agent"], $b0f2ad37a04751a76687ec58fd378a0f["user_ip"], $b0f2ad37a04751a76687ec58fd378a0f["container"], $b0f2ad37a04751a76687ec58fd378a0f["geoip_country_code"], $b0f2ad37a04751a76687ec58fd378a0f["isp"], $b0f2ad37a04751a76687ec58fd378a0f["external_device"]);
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
}
