<?php
class ipTV_streaming {
    public static $ipTV_db;
    public static $AllowedIPs = array();
    public static function cdB7Ed3e4910A38DAaB7bdEdc40d824F() {
        self::$ipTV_db->query("SELECT `ip` FROM `rtmp_ips`");
        return array_merge(array("127.0.0.1"), ipTV_lib::bDB77ed1fBB30959BA62bAd03Cd981E0(self::$ipTV_db->get_rows()));
    }
    public static function F3d10AFc1F577769323A685BA204079e($Bb90ec918cc51fff41a08f4ef7e39763, $F9c8a291792f79d13ff4c34f35ce49af) {
        if (empty($Bb90ec918cc51fff41a08f4ef7e39763["xy_offset"])) {
            $Af058ed2be95a941a12423d243cd34e1 = rand(150, 380);
            $F29d5c9ec3d0b657a9def5786829f217 = rand(110, 250);
        } else {
            list($Af058ed2be95a941a12423d243cd34e1, $F29d5c9ec3d0b657a9def5786829f217) = explode("x", $Bb90ec918cc51fff41a08f4ef7e39763["xy_offset"]);
        }
        passthru(FFMPEG_PATH . " -nofix_dts -fflags +igndts -copyts -vsync 0 -nostats -nostdin -hide_banner -loglevel quiet -y -i \"" . STREAMS_PATH . $F9c8a291792f79d13ff4c34f35ce49af . "\" -filter_complex \"drawtext=fontfile=" . FFMPEG_FONTS_PATH . ":text='{$Bb90ec918cc51fff41a08f4ef7e39763["message"]}':fontsize={$Bb90ec918cc51fff41a08f4ef7e39763["font_size"]}:x={$Af058ed2be95a941a12423d243cd34e1}:y={$F29d5c9ec3d0b657a9def5786829f217}:fontcolor={$Bb90ec918cc51fff41a08f4ef7e39763["font_color"]}\" -map 0 -vcodec libx264 -preset ultrafast -acodec copy -scodec copy -mpegts_flags +initial_discontinuity -mpegts_copyts 1 -f mpegts -");
        return true;
    }
    public static function E83C60aE0b93a4aaE6a66a6F64fCa8B6($C8eb36fadaae1034e857051e20bdf67a = false, $C8c20cd17d90c22c314200e1babf2dc1 = true) {
        if (!empty(self::$AllowedIPs)) {
            return self::$AllowedIPs;
        }
        $Abd27c61bdb838c62eb1668a13748237 = array("127.0.0.1", $_SERVER["SERVER_ADDR"]);
        if ($C8c20cd17d90c22c314200e1babf2dc1) {
            foreach (ipTV_lib::$StreamingServers as $C671e9e0a59f18412464d71d67ba55c7 => $cdc0c93cc163b3de125906f8ba6f72e4) {
                if (!empty($cdc0c93cc163b3de125906f8ba6f72e4["whitelist_ips"])) {
                    $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, json_decode($cdc0c93cc163b3de125906f8ba6f72e4["whitelist_ips"], true));
                }
                $Abd27c61bdb838c62eb1668a13748237[] = $cdc0c93cc163b3de125906f8ba6f72e4["server_ip"];
            }
        } else {
            if (!empty(ipTV_lib::$StreamingServers[1]["whitelist_ips"])) {
                $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, json_decode(ipTV_lib::$StreamingServers[1]["whitelist_ips"], true));
            }
            $Abd27c61bdb838c62eb1668a13748237[] = ipTV_lib::$StreamingServers[1]["server_ip"];
        }
        if ($C8eb36fadaae1034e857051e20bdf67a) {
            if (!empty(ipTV_lib::$settings["allowed_ips_admin"])) {
                $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, explode(",", ipTV_lib::$settings["allowed_ips_admin"]));
            }
            self::$ipTV_db->query("SELECT * FROM `xtream_main` WHERE id = 1");
            $Ea0be5d44ff76909820aa5b4285928da = self::$ipTV_db->get_row();
            if (!empty($Ea0be5d44ff76909820aa5b4285928da["root_ip"])) {
                $Abd27c61bdb838c62eb1668a13748237[] = $Ea0be5d44ff76909820aa5b4285928da["root_ip"];
            }
            self::$ipTV_db->query("SELECT DISTINCT t1.`ip` FROM `reg_users` t1 INNER JOIN `member_groups` t2 ON t2.group_id = t1.member_group_id AND t2.is_admin = 1 AND t1.`last_login` >= '%d'", strtotime("-2 hour"));
            $d9bb1c051109b434d417928081feddd9 = ipTV_lib::bDb77Ed1FBb30959ba62BAD03cd981E0(self::$ipTV_db->get_rows());
            $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, $d9bb1c051109b434d417928081feddd9);
        }
        if (!file_exists(TMP_DIR . "cloud_ips") || time() - filemtime(TMP_DIR . "cloud_ips") >= 400) {
            $dcd607dfe0ea23b28214cc6bbb052d68 = ipTV_lib::f7D0f36099b34B530e99a73F89464c99("http://xtream-codes.com/cloud_ips");
            if (!empty($dcd607dfe0ea23b28214cc6bbb052d68)) {
                file_put_contents(TMP_DIR . "cloud_ips", $dcd607dfe0ea23b28214cc6bbb052d68);
            }
        }
        if (file_exists(TMP_DIR . "cloud_ips")) {
            $Abd27c61bdb838c62eb1668a13748237 = array_filter(array_merge($Abd27c61bdb838c62eb1668a13748237, array_map("trim", file(TMP_DIR . "cloud_ips"))));
        }
        self::$AllowedIPs = $Abd27c61bdb838c62eb1668a13748237;
        return array_unique($Abd27c61bdb838c62eb1668a13748237);
    }
    public static function e01C6247dc62e1Ede6Da6671b6adBb8D($b93df8c85c6b9c6b3e155555619bbe8e) {
        file_put_contents(CLOSE_OPEN_CONS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e, 1);
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
    public static function a5C11CFF1B8d4762a64B3b7Cf8862F98($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4) {
        if (empty($ef4f0599712515333103265dafb029f7)) {
            return false;
        }
        clearstatcache(true);
        if (file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) {
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if ($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodesDelay[{$b6497ba71489783c3747f19debe893a4}]") {
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
        file_put_contents(TMP_DIR . "offline_cons", base64_encode(json_encode($b0f2ad37a04751a76687ec58fd378a0f)) . "\n", FILE_APPEND | LOCK_EX);
    }
    public static function eF709337A2715D23B673E033a05bF7b7($f0d5508533eaf6452b2b014beae1cc7c, $ef4f0599712515333103265dafb029f7) {
        return self::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH) && file_exists($f0d5508533eaf6452b2b014beae1cc7c);
    }
    public static function db998acd76fCd118B6Cdb4e9edA68580($c81742471fbf5fc98e647357de25a9c9, $dda1e24ed6a529d7aa6528cc838b24b8, $e4690ed58f6569ca3c7894a84e107f6d = null) {
        clearstatcache();
        if (!file_exists($dda1e24ed6a529d7aa6528cc838b24b8)) {
            return false;
        }
        switch ($c81742471fbf5fc98e647357de25a9c9) {
            case "movie":
                if (is_null($e4690ed58f6569ca3c7894a84e107f6d)) {
                } else {
                    sscanf($e4690ed58f6569ca3c7894a84e107f6d, "%d:%d:%d", $f70b4408f306b0946d856dd29a25b89c, $C3701408f451b56ac9f60cf02f5867b3, $e3cf3851f7ee9d4e859bd7fdd6f6b33e);
                    $f3db7858a998b217cdc28e738fd2182d = isset($e3cf3851f7ee9d4e859bd7fdd6f6b33e) ? $f70b4408f306b0946d856dd29a25b89c * 3600 + $C3701408f451b56ac9f60cf02f5867b3 * 60 + $e3cf3851f7ee9d4e859bd7fdd6f6b33e : $f70b4408f306b0946d856dd29a25b89c * 60 + $C3701408f451b56ac9f60cf02f5867b3;
                    $bd8be6cf39eec67640223143174627d0 = round(filesize($dda1e24ed6a529d7aa6528cc838b24b8) * 0.008 / $f3db7858a998b217cdc28e738fd2182d);
                }
                break;
            case "live":
                $b4ad7225f6375fe5d757d3c7147fb034 = fopen($dda1e24ed6a529d7aa6528cc838b24b8, "r");
                $C916bb1ae29f2a452125275557a10d33 = array();
                while (!feof($b4ad7225f6375fe5d757d3c7147fb034)) {
                    $Df3643b77de72fea7002c5acff85b896 = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                    if (stristr($Df3643b77de72fea7002c5acff85b896, "EXTINF")) {
                        list($e779a7ffdb69a3c605e2fccb290d9495, $e3cf3851f7ee9d4e859bd7fdd6f6b33e) = explode(":", $Df3643b77de72fea7002c5acff85b896);
                        $e3cf3851f7ee9d4e859bd7fdd6f6b33e = rtrim($e3cf3851f7ee9d4e859bd7fdd6f6b33e, ",");
                        if ($e3cf3851f7ee9d4e859bd7fdd6f6b33e <= 0) {
                            break;
                        }
                        $F9c8a291792f79d13ff4c34f35ce49af = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                        if (!file_exists(dirname($dda1e24ed6a529d7aa6528cc838b24b8) . "/" . $F9c8a291792f79d13ff4c34f35ce49af)) {
                            fclose($b4ad7225f6375fe5d757d3c7147fb034);
                            return false;
                        }
                        $a653546a7a781fe97e3e0ccb25e5e310 = filesize(dirname($dda1e24ed6a529d7aa6528cc838b24b8) . "/" . $F9c8a291792f79d13ff4c34f35ce49af) * 0.008;
                        $C916bb1ae29f2a452125275557a10d33[] = $a653546a7a781fe97e3e0ccb25e5e310 / $e3cf3851f7ee9d4e859bd7fdd6f6b33e;
                    }
                }
                fclose($b4ad7225f6375fe5d757d3c7147fb034);
                $bd8be6cf39eec67640223143174627d0 = count($C916bb1ae29f2a452125275557a10d33) > 0 ? round(array_sum($C916bb1ae29f2a452125275557a10d33) / count($C916bb1ae29f2a452125275557a10d33)) : 0;
                break;
        }
        return $bd8be6cf39eec67640223143174627d0 > 0 ? $bd8be6cf39eec67640223143174627d0 : false;
    }
}
