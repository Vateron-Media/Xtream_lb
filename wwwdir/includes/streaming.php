<?php

class F1CA094152763c79018e9f1893eF1E48 {
    public static $ipTV_db;
    public static $AllowedIPs = array();
    public static function cdB7Ed3e4910A38DAaB7bdEdc40d824F() {
        self::$ipTV_db->query("SELECT `ip` FROM `rtmp_ips`");
        return array_merge(array("127.0.0.1"), E2d73953a5089b9C7983838f61f23acF::bDB77ed1fBB30959BA62bAd03Cd981E0(self::$ipTV_db->eD940A8511357C99475Cc7969F034729()));
    }
    public static function F3d10AFc1F577769323A685BA204079e($Bb90ec918cc51fff41a08f4ef7e39763, $F9c8a291792f79d13ff4c34f35ce49af) {
        if (empty($Bb90ec918cc51fff41a08f4ef7e39763["xy_offset"])) {
            $Af058ed2be95a941a12423d243cd34e1 = rand(150, 380);
            $F29d5c9ec3d0b657a9def5786829f217 = rand(110, 250);
            goto b9e315da7e1d01d852b044faeda5c199;
        }
        list($Af058ed2be95a941a12423d243cd34e1, $F29d5c9ec3d0b657a9def5786829f217) = explode("x", $Bb90ec918cc51fff41a08f4ef7e39763["xy_offset"]);
        b9e315da7e1d01d852b044faeda5c199:
        passthru("FFMPEG_PATH -nofix_dts -fflags +igndts -copyts -vsync 0 -nostats -nostdin -hide_banner -loglevel quiet -y -i \"STREAMS_PATH" . $F9c8a291792f79d13ff4c34f35ce49af . "\" -filter_complex \"drawtext=fontfile=" . FFMPEG_FONTS_PATH . ":text='{$Bb90ec918cc51fff41a08f4ef7e39763["message"]}':fontsize={$Bb90ec918cc51fff41a08f4ef7e39763["font_size"]}:x={$Af058ed2be95a941a12423d243cd34e1}:y={$F29d5c9ec3d0b657a9def5786829f217}:fontcolor={$Bb90ec918cc51fff41a08f4ef7e39763["font_color"]}\" -map 0 -vcodec libx264 -preset ultrafast -acodec copy -scodec copy -mpegts_flags +initial_discontinuity -mpegts_copyts 1 -f mpegts -");
        return true;
    }
    public static function E83C60aE0b93a4aaE6a66a6F64fCa8B6($C8eb36fadaae1034e857051e20bdf67a = false, $C8c20cd17d90c22c314200e1babf2dc1 = true) {
        if (empty(self::$AllowedIPs)) {
            $Abd27c61bdb838c62eb1668a13748237 = array("127.0.0.1", $_SERVER["SERVER_ADDR"]);
            if ($C8c20cd17d90c22c314200e1babf2dc1) {
                foreach (E2d73953A5089B9C7983838F61f23AcF::$StreamingServers as $C671e9e0a59f18412464d71d67ba55c7 => $cdc0c93cc163b3de125906f8ba6f72e4) {
                    if (empty($cdc0c93cc163b3de125906f8ba6f72e4["whitelist_ips"])) {
                        goto e99f2f17374a7c36862606187f365431;
                    }
                    $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, json_decode($cdc0c93cc163b3de125906f8ba6f72e4["whitelist_ips"], true));
                    e99f2f17374a7c36862606187f365431:
                    $Abd27c61bdb838c62eb1668a13748237[] = $cdc0c93cc163b3de125906f8ba6f72e4["server_ip"];
                }
                goto F9cf7a3bf5a9e01cbd79364d7d4ab20e;
            }
            if (empty(E2d73953a5089B9c7983838f61F23aCf::$StreamingServers[1]["whitelist_ips"])) {
                goto ddd1c192617478556e57132334c0ab00;
            }
            $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, json_decode(E2D73953A5089b9c7983838F61F23aCf::$StreamingServers[1]["whitelist_ips"], true));
            ddd1c192617478556e57132334c0ab00:
            $Abd27c61bdb838c62eb1668a13748237[] = E2d73953A5089b9c7983838F61f23aCF::$StreamingServers[1]["server_ip"];
            F9cf7a3bf5a9e01cbd79364d7d4ab20e:
            if (!$C8eb36fadaae1034e857051e20bdf67a) {
                goto d64f51fc550bb338d6ad2af6092fae2f;
            }
            if (empty(E2D73953a5089b9c7983838f61f23acF::$settings["allowed_ips_admin"])) {
                goto A74642465072ea7c526109193b1eb805;
            }
            $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, explode(",", e2D73953a5089B9c7983838F61f23AcF::$settings["allowed_ips_admin"]));
            A74642465072ea7c526109193b1eb805:
            self::$ipTV_db->query("SELECT * FROM `xtream_main` WHERE id = 1");
            $Ea0be5d44ff76909820aa5b4285928da = self::$ipTV_db->EB6bfE16D93814Caf26d92092d5A4052();
            if (empty($Ea0be5d44ff76909820aa5b4285928da["root_ip"])) {
                goto df2e95c4f49f7de4f7e9e154353a4efd;
            }
            $Abd27c61bdb838c62eb1668a13748237[] = $Ea0be5d44ff76909820aa5b4285928da["root_ip"];
            df2e95c4f49f7de4f7e9e154353a4efd:
            self::$ipTV_db->query("SELECT DISTINCT t1.`ip` FROM `reg_users` t1 INNER JOIN `member_groups` t2 ON t2.group_id = t1.member_group_id AND t2.is_admin = 1 AND t1.`last_login` >= '%d'", strtotime("-2 hour"));
            $d9bb1c051109b434d417928081feddd9 = e2D73953A5089B9c7983838f61f23acf::bDb77Ed1FBb30959ba62BAD03cd981E0(self::$ipTV_db->ed940a8511357C99475cC7969F034729());
            $Abd27c61bdb838c62eb1668a13748237 = array_merge($Abd27c61bdb838c62eb1668a13748237, $d9bb1c051109b434d417928081feddd9);
            d64f51fc550bb338d6ad2af6092fae2f:
            if (!(!file_exists("TMP_DIRcloud_ips") || time() - filemtime("TMP_DIRcloud_ips") >= 400)) {
                goto A6a1c1116fc7701efecf4b464e63a5df;
            }
            $dcd607dfe0ea23b28214cc6bbb052d68 = e2D73953a5089B9c7983838F61F23ACf::f7D0f36099b34B530e99a73F89464c99("http://xtream-codes.com/cloud_ips");
            if (empty($dcd607dfe0ea23b28214cc6bbb052d68)) {
                goto Febaeba92339aeabe6eb92e8b93d23b0;
            }
            file_put_contents("TMP_DIRcloud_ips", $dcd607dfe0ea23b28214cc6bbb052d68);
            Febaeba92339aeabe6eb92e8b93d23b0:
            A6a1c1116fc7701efecf4b464e63a5df:
            if (!file_exists("TMP_DIRcloud_ips")) {
                goto D85a4aa938f34a3b5644ef7b726b0842;
            }
            $Abd27c61bdb838c62eb1668a13748237 = array_filter(array_merge($Abd27c61bdb838c62eb1668a13748237, array_map("trim", file("TMP_DIRcloud_ips"))));
            D85a4aa938f34a3b5644ef7b726b0842:
            self::$AllowedIPs = $Abd27c61bdb838c62eb1668a13748237;
            return array_unique($Abd27c61bdb838c62eb1668a13748237);
        }
        return self::$AllowedIPs;
    }
    public static function e01C6247dc62e1Ede6Da6671b6adBb8D($b93df8c85c6b9c6b3e155555619bbe8e) {
        file_put_contents(CLOSE_OPEN_CONS_PATH . $b93df8c85c6b9c6b3e155555619bbe8e, 1);
    }
    public static function d909b0D1a6FFFDcDB838046fac418b04($d8d36e593ec0bd7cae9e37c890b536d4 = null, $Fdc134ea90d233be850c53c1266026d6 = null, $E1dc5da23bfc7433f190ed9488d09204 = null, $Bd6640ad180b58c481050d9a3082fe9f = false, $F4625153d1b67f8c81ea5a280caba00e = false, $d2f424c414bd97ab4b5d38563f808de5 = false, $E2565740db1273542fd774924ca12684 = false, $c81742471fbf5fc98e647357de25a9c9 = array(), $Fcdbdb78e4e59d5190fb3db2e90d317c = false) {
        if (empty($d8d36e593ec0bd7cae9e37c890b536d4)) {
            self::$ipTV_db->query("SELECT * FROM `users` WHERE `username` = '%s' AND `password` = '%s' LIMIT 1", $Fdc134ea90d233be850c53c1266026d6, $E1dc5da23bfc7433f190ed9488d09204);
            goto E0e3a98a357fa899d778681a2e7ac3b4;
        }
        self::$ipTV_db->query("SELECT * FROM `users` WHERE `id` = '%d'", $d8d36e593ec0bd7cae9e37c890b536d4);
        E0e3a98a357fa899d778681a2e7ac3b4:
        if (!(self::$ipTV_db->D4A34259Fc10b35fedbCCDA0a23D69Ae() > 0)) {
            return false;
        }
        $fbf1d0a58fcc040ff00728a277a5f306 = self::$ipTV_db->Eb6bFe16d93814Caf26D92092D5A4052();
        $fbf1d0a58fcc040ff00728a277a5f306["bouquet"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["bouquet"], true);
        $fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["allowed_ips"], true);
        $fbf1d0a58fcc040ff00728a277a5f306["allowed_ua"] = json_decode($fbf1d0a58fcc040ff00728a277a5f306["allowed_ua"], true);
        if ($E2565740db1273542fd774924ca12684) {
            self::$ipTV_db->query("SELECT COUNT(`activity_id`) FROM `user_activity_now` WHERE `user_id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["id"]);
            $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] = self::$ipTV_db->B169BAEf7c366ed83af90D613BfB8d0c();
            $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"] = array();
            if (is_null($fbf1d0a58fcc040ff00728a277a5f306["pair_id"])) {
                goto C4aabb06d86da69f35010a5d6d2d7daf;
            }
            self::$ipTV_db->query("SELECT COUNT(`activity_id`) FROM `user_activity_now` WHERE `user_id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
            $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["active_cons"] = self::$ipTV_db->b169bAeF7c366Ed83AF90D613Bfb8D0C();
            self::$ipTV_db->query("SELECT max_connections FROM `users` WHERE `id` = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["pair_id"]);
            $fbf1d0a58fcc040ff00728a277a5f306["pair_line_info"]["max_connections"] = self::$ipTV_db->b169bAEf7C366Ed83af90D613bFB8d0C();
            C4aabb06d86da69f35010a5d6d2d7daf:
            goto b5327d7eab915b8cf9c521a42d8bd976;
        }
        $fbf1d0a58fcc040ff00728a277a5f306["active_cons"] = "N/A";
        b5327d7eab915b8cf9c521a42d8bd976:
        if (!$Bd6640ad180b58c481050d9a3082fe9f) {
            goto b11393ca26e8963827b6fa69f45e2916;
        }
        self::$ipTV_db->query("SELECT *\n                                    FROM `access_output` t1\n                                    INNER JOIN `user_output` t2 ON t1.access_output_id = t2.access_output_id\n                                    WHERE t2.user_id = '%d'", $fbf1d0a58fcc040ff00728a277a5f306["id"]);
        $fbf1d0a58fcc040ff00728a277a5f306["output_formats"] = self::$ipTV_db->ED940A8511357c99475Cc7969F034729(true, "output_key");
        b11393ca26e8963827b6fa69f45e2916:
        if (!$F4625153d1b67f8c81ea5a280caba00e) {
            goto Dffefe61c047dd717c0a4a1f875f8610;
        }
        $fbf1d0a58fcc040ff00728a277a5f306["series_ids"] = $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] = array();
        foreach ($fbf1d0a58fcc040ff00728a277a5f306["bouquet"] as $d67eb2e4c20a32a0641cd7e65ed6e319) {
            if (!(isset(E2d73953a5089B9C7983838f61f23acf::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"]) && is_array(E2d73953a5089b9C7983838f61F23aCf::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"]))) {
                goto A6390784705b789081ba3b0147b40e4f;
            }
            $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"] = array_merge($fbf1d0a58fcc040ff00728a277a5f306["channel_ids"], E2D73953a5089b9C7983838F61F23aCf::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["streams"]);
            A6390784705b789081ba3b0147b40e4f:
            if (!(isset(e2D73953a5089b9C7983838f61F23acf::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"]) && is_array(E2D73953A5089B9C7983838F61f23acF::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"]))) {
                goto C56f0ca339a9ab8a01462a1d2594a1eb;
            }
            $fbf1d0a58fcc040ff00728a277a5f306["series_ids"] = array_merge($fbf1d0a58fcc040ff00728a277a5f306["series_ids"], e2D73953A5089b9c7983838F61f23acF::$Bouquets[$d67eb2e4c20a32a0641cd7e65ed6e319]["series"]);
            C56f0ca339a9ab8a01462a1d2594a1eb:
        }
        if (!($d2f424c414bd97ab4b5d38563f808de5 && !empty($fbf1d0a58fcc040ff00728a277a5f306["channel_ids"]))) {
            goto Add2c51de4966bf22a6c69b49ccd3930;
        }
        $E3306fa3e87c92fab90abcc8961ecc5d = '';
        if (empty($c81742471fbf5fc98e647357de25a9c9)) {
            goto Cbfb923052864ad481de8af36b9bc5e6;
        }
        $E3306fa3e87c92fab90abcc8961ecc5d = " AND (";
        foreach ($c81742471fbf5fc98e647357de25a9c9 as $E348cb4251dc88ab4be7f3b8c09d96ad) {
            $E3306fa3e87c92fab90abcc8961ecc5d .= " t2.type_key = '" . self::$ipTV_db->escape($E348cb4251dc88ab4be7f3b8c09d96ad) . "' OR";
        }
        $E3306fa3e87c92fab90abcc8961ecc5d = substr($E3306fa3e87c92fab90abcc8961ecc5d, 0, -2);
        $E3306fa3e87c92fab90abcc8961ecc5d .= ")";
        Cbfb923052864ad481de8af36b9bc5e6:
        self::$ipTV_db->query("SELECT t1.*,t2.*,t3.category_name,t1.rtmp_output\n                                            FROM `streams` t1 \n                                            LEFT JOIN  `stream_categories` t3 on t3.id = t1.category_id\n                                            INNER JOIN `streams_types` t2 ON t2.type_id = t1.type {$E3306fa3e87c92fab90abcc8961ecc5d}\n                                            WHERE t1.`id` IN(" . implode(",", $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"]) . ") \n                                            ORDER BY FIELD(t1.id, " . implode(",", $fbf1d0a58fcc040ff00728a277a5f306["channel_ids"]) . ");");
        $fbf1d0a58fcc040ff00728a277a5f306["channels"] = self::$ipTV_db->Ed940A8511357c99475CC7969f034729();
        if (!$Fcdbdb78e4e59d5190fb3db2e90d317c) {
            goto A9f2b7e1f575158d15eb522ddc4aa563;
        }
        $B7fea61edf73e202cc8e6d801cd62f11 = 0;
        foreach ($fbf1d0a58fcc040ff00728a277a5f306["channels"] as $Cc2a18fdf76b8e3e115b27f927e5928b => $efa7cefd12388102b27fdeb2f9f68219) {
            $fbf1d0a58fcc040ff00728a277a5f306["channels"][$Cc2a18fdf76b8e3e115b27f927e5928b]["is_adult"] = strtolower($efa7cefd12388102b27fdeb2f9f68219["category_name"]) == "for adults" ? 1 : 0;
        }
        A9f2b7e1f575158d15eb522ddc4aa563:
        Add2c51de4966bf22a6c69b49ccd3930:
        Dffefe61c047dd717c0a4a1f875f8610:
        return $fbf1d0a58fcc040ff00728a277a5f306;
    }
    public static function f821DE2269f55d10183b146c8d058907($b6497ba71489783c3747f19debe893a4, $Bb77c1156db46ab15b509bd70ca13ad0 = array(), $c81742471fbf5fc98e647357de25a9c9 = "movie") {
        if ($c81742471fbf5fc98e647357de25a9c9 == "movie") {
            return in_array($b6497ba71489783c3747f19debe893a4, $Bb77c1156db46ab15b509bd70ca13ad0);
        }
        if ($c81742471fbf5fc98e647357de25a9c9 == "series") {
            self::$ipTV_db->query("SELECT series_id FROM `series_episodes` WHERE `stream_id` = '%d' LIMIT 1", $b6497ba71489783c3747f19debe893a4);
            if (!(self::$ipTV_db->D4A34259fC10b35FeDBCCDA0a23D69ae() > 0)) {
                goto F7a714ee79763ab2d55b5a4c52c276e7;
            }
            return in_array(self::$ipTV_db->b169bAeF7c366eD83Af90d613bfB8D0c(), $Bb77c1156db46ab15b509bd70ca13ad0);
        }
        F7a714ee79763ab2d55b5a4c52c276e7:
        f4d0e705e791b5f27ea9e227da9435aa:
        return false;
    }
    public static function b03404A02C45cF202DA01928E71d3b42($f0d5508533eaf6452b2b014beae1cc7c, $c4f4df649ac9919901a9c71097032334 = 0) {
        if (!file_exists($f0d5508533eaf6452b2b014beae1cc7c)) {
            goto Eba6381513fa8da4139bc23a6a56dc3a;
        }
        $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($f0d5508533eaf6452b2b014beae1cc7c);
        if (!preg_match_all("/(.*?).ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
            fefb24ee68a2171dc33e417a7418be45:
            Eba6381513fa8da4139bc23a6a56dc3a:
            return false;
        }
        if ($c4f4df649ac9919901a9c71097032334 > 0) {
            $e455de5c3772bfe5e89d40805c06bcd0 = intval($c4f4df649ac9919901a9c71097032334 / 10);
            return array_slice($f563f11de8fd50b6d6e4071878cbe2de[0], -$e455de5c3772bfe5e89d40805c06bcd0);
        }
        preg_match("/_(.*)\\./", array_pop($f563f11de8fd50b6d6e4071878cbe2de[0]), $dc97e90a550794b1b10be857a9861404);
        return $dc97e90a550794b1b10be857a9861404[1];
    }
    public static function de40F0dca7C52c3162b552bE591b38eb($F43e647d100aaa12be0cb16c72d9031b, $E1dc5da23bfc7433f190ed9488d09204, $b6497ba71489783c3747f19debe893a4) {
        if (!file_exists($F43e647d100aaa12be0cb16c72d9031b)) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($F43e647d100aaa12be0cb16c72d9031b);
        if (!preg_match_all("/(.*?)\\.ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
            return false;
        }
        foreach ($f563f11de8fd50b6d6e4071878cbe2de[0] as $a5e686e6c77e9ffdb58ffe6b089d4fad) {
            $E4866fec202244d7a3c9f4e24f6ee344 = str_replace($a5e686e6c77e9ffdb58ffe6b089d4fad, "/streaming/admin_live.php?password={$E1dc5da23bfc7433f190ed9488d09204}&extension=m3u8&segment={$a5e686e6c77e9ffdb58ffe6b089d4fad}&stream={$b6497ba71489783c3747f19debe893a4}", $E4866fec202244d7a3c9f4e24f6ee344);
        }
        return $E4866fec202244d7a3c9f4e24f6ee344;
    }
    public static function b5b64Fc74AAa86445F7C95E69baBdD84($F43e647d100aaa12be0cb16c72d9031b, $b6497ba71489783c3747f19debe893a4 = '', $dc5791fad6da6f9dd96b83b988be0cb8 = '', $Fdc134ea90d233be850c53c1266026d6 = '', $E1dc5da23bfc7433f190ed9488d09204 = '') {
        if (!file_exists($F43e647d100aaa12be0cb16c72d9031b)) {
            // [PHPDeobfuscator] Implied return
            return;
        }
        $E4866fec202244d7a3c9f4e24f6ee344 = file_get_contents($F43e647d100aaa12be0cb16c72d9031b);
        if (!preg_match_all("/(.*?)\\.ts/", $E4866fec202244d7a3c9f4e24f6ee344, $f563f11de8fd50b6d6e4071878cbe2de)) {
            return false;
        }
        foreach ($f563f11de8fd50b6d6e4071878cbe2de[0] as $a5e686e6c77e9ffdb58ffe6b089d4fad) {
            $B31f58220362e7d683b209c0b9237d23 = md5($a5e686e6c77e9ffdb58ffe6b089d4fad . $Fdc134ea90d233be850c53c1266026d6 . e2d73953A5089b9C7983838F61F23aCF::$settings["crypt_load_balancing"] . filesize(STREAMS_PATH . $a5e686e6c77e9ffdb58ffe6b089d4fad));
            $E4866fec202244d7a3c9f4e24f6ee344 = str_replace($a5e686e6c77e9ffdb58ffe6b089d4fad, "/hlsr/{$dc5791fad6da6f9dd96b83b988be0cb8}/{$Fdc134ea90d233be850c53c1266026d6}/{$E1dc5da23bfc7433f190ed9488d09204}/{$b6497ba71489783c3747f19debe893a4}/{$B31f58220362e7d683b209c0b9237d23}/{$a5e686e6c77e9ffdb58ffe6b089d4fad}", $E4866fec202244d7a3c9f4e24f6ee344);
        }
        return $E4866fec202244d7a3c9f4e24f6ee344;
    }
    public static function fd9BceaaE00258EC95E5Ad4d91456864($b0f2ad37a04751a76687ec58fd378a0f, $bb9395b85a921191c7f955bd5041f57f = true) {
        if (!empty($b0f2ad37a04751a76687ec58fd378a0f)) {
            if (!empty($b0f2ad37a04751a76687ec58fd378a0f["activity_id"])) {
                goto C1f0bf9a2311cc3754136b3faff930e8;
            }
            self::$ipTV_db->query("SELECT * FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f);
            $b0f2ad37a04751a76687ec58fd378a0f = self::$ipTV_db->eb6bFE16D93814caF26D92092d5a4052();
            C1f0bf9a2311cc3754136b3faff930e8:
            if (!empty($b0f2ad37a04751a76687ec58fd378a0f)) {
                if ($b0f2ad37a04751a76687ec58fd378a0f["container"] == "rtmp") {
                    if ($b0f2ad37a04751a76687ec58fd378a0f["server_id"] == SERVER_ID) {
                        shell_exec("wget --timeout=2 -O /dev/null -o /dev/null \"" . e2d73953A5089B9c7983838f61F23acf::$StreamingServers[SERVER_ID]["rtmp_mport_url"] . "control/drop/client?clientid={$b0f2ad37a04751a76687ec58fd378a0f["pid"]}\" >/dev/null 2>/dev/null &");
                        goto F320140c46f89a17ead04f620e607635;
                    }
                    self::$ipTV_db->query("INSERT INTO `signals` (`pid`,`server_id`,`rtmp`,`time`) VALUES('%d','%d','%d',UNIX_TIMESTAMP())", $b0f2ad37a04751a76687ec58fd378a0f["pid"], $b0f2ad37a04751a76687ec58fd378a0f["server_id"], 1);
                    F320140c46f89a17ead04f620e607635:
                    goto F1ce5c3894cdf27adf47488ed605dd7f;
                }
                if ($b0f2ad37a04751a76687ec58fd378a0f["container"] == "hls") {
                    if ($bb9395b85a921191c7f955bd5041f57f) {
                        goto E3d5797ab2b8a6c9089717db70b829bb;
                    }
                    self::$ipTV_db->query("UPDATE `user_activity_now` SET `hls_end` = 1 WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
                    E3d5797ab2b8a6c9089717db70b829bb:
                    goto Ec825df4235e5d1423fc3b7ddf150306;
                }
                if ($b0f2ad37a04751a76687ec58fd378a0f["server_id"] == SERVER_ID) {
                    shell_exec("kill -9 {$b0f2ad37a04751a76687ec58fd378a0f["pid"]} >/dev/null 2>/dev/null &");
                    goto B230ab46fa78a02b47b8455d326ce5fd;
                }
                self::$ipTV_db->query("INSERT INTO `signals` (`pid`,`server_id`,`time`) VALUES('%d','%d',UNIX_TIMESTAMP())", $b0f2ad37a04751a76687ec58fd378a0f["pid"], $b0f2ad37a04751a76687ec58fd378a0f["server_id"]);
                B230ab46fa78a02b47b8455d326ce5fd:
                Ec825df4235e5d1423fc3b7ddf150306:
                F1ce5c3894cdf27adf47488ed605dd7f:
                if (!$bb9395b85a921191c7f955bd5041f57f) {
                    goto Cc93191f8cf0e5af671d6c57ec38833a;
                }
                self::$ipTV_db->query("DELETE FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
                Cc93191f8cf0e5af671d6c57ec38833a:
                self::c9cCC76c9D6b7e44c6D4a7a6c7191EB5($b0f2ad37a04751a76687ec58fd378a0f["server_id"], $b0f2ad37a04751a76687ec58fd378a0f["user_id"], $b0f2ad37a04751a76687ec58fd378a0f["stream_id"], $b0f2ad37a04751a76687ec58fd378a0f["date_start"], $b0f2ad37a04751a76687ec58fd378a0f["user_agent"], $b0f2ad37a04751a76687ec58fd378a0f["user_ip"], $b0f2ad37a04751a76687ec58fd378a0f["container"], $b0f2ad37a04751a76687ec58fd378a0f["geoip_country_code"], $b0f2ad37a04751a76687ec58fd378a0f["isp"], $b0f2ad37a04751a76687ec58fd378a0f["external_device"]);
                return true;
            }
            return false;
        }
        return false;
    }
    public static function F9EDF299BE4280CC9900d81d8355fd29($b6497ba71489783c3747f19debe893a4, $C671e9e0a59f18412464d71d67ba55c7) {
        $output = array();
        $output["server"] = array();
        $output["info"] = array();
        self::$ipTV_db->query("SELECT * FROM `streams` t1\n                                LEFT JOIN `streams_types` t2 ON t2.type_id = t1.type\n                                WHERE t1.`id` = '%d'", $b6497ba71489783c3747f19debe893a4);
        if (!(self::$ipTV_db->D4a34259FC10B35FedBCCdA0a23d69ae() > 0)) {
            goto B7002483d7ed260768797baaeccacd79;
        }
        $de8b98affa55c7e6bfe327d372e15fc9 = self::$ipTV_db->eB6BFe16D93814CaF26D92092D5A4052();
        $C0d89202f2a1eca312a0eaf802d3b913 = array();
        if (!($de8b98affa55c7e6bfe327d372e15fc9["direct_source"] == 0)) {
            goto a0e9f600cbfffff537344e3c1ced9bd7;
        }
        self::$ipTV_db->query("SELECT * FROM `streams_sys` WHERE `stream_id` = '%d' AND `server_id` = '%d'", $b6497ba71489783c3747f19debe893a4, $C671e9e0a59f18412464d71d67ba55c7);
        if (!(self::$ipTV_db->d4A34259Fc10b35FEDbCCDa0A23d69Ae() > 0)) {
            goto B2faa9f10698e6a7f3a2870f91cc3228;
        }
        $output["server"] = self::$ipTV_db->Eb6BFe16D93814CAF26D92092D5a4052();
        B2faa9f10698e6a7f3a2870f91cc3228:
        a0e9f600cbfffff537344e3c1ced9bd7:
        $output["info"] = $de8b98affa55c7e6bfe327d372e15fc9;
        B7002483d7ed260768797baaeccacd79:
        return !empty($output) ? $output : false;
    }
    public static function D835C2a9787ba794E7590e06621cFa6B($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4, $c3bd62458959952cf55b015822fd5a91 = PHP_BIN) {
        if (!empty($ef4f0599712515333103265dafb029f7)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91))) {
                goto D8fb938252bbb77e0c4fddecdfd4f5ad;
            }
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if (!($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodes[{$b6497ba71489783c3747f19debe893a4}]")) {
                D8fb938252bbb77e0c4fddecdfd4f5ad:
                return false;
            }
            return true;
        }
        return false;
    }
    public static function a5C11CFF1B8d4762a64B3b7Cf8862F98($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4) {
        if (!empty($ef4f0599712515333103265dafb029f7)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe"))) {
                goto be0f19ed66a0ed766b49f11cf9e76c83;
            }
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if (!($A0316410c2d7b66ec51afd1b25e335c7 == "XtreamCodesDelay[{$b6497ba71489783c3747f19debe893a4}]")) {
                be0f19ed66a0ed766b49f11cf9e76c83:
                return false;
            }
            return true;
        }
        return false;
    }
    public static function A1ECf5D2a93474B12e622361C656b958($ef4f0599712515333103265dafb029f7, $b6497ba71489783c3747f19debe893a4, $c3bd62458959952cf55b015822fd5a91 = FFMPEG_PATH) {
        if (!empty($ef4f0599712515333103265dafb029f7)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91))) {
                goto Fc03b4050a981ecdd19df361d091cb15;
            }
            $A0316410c2d7b66ec51afd1b25e335c7 = trim(file_get_contents("/proc/{$ef4f0599712515333103265dafb029f7}/cmdline"));
            if (!stristr($A0316410c2d7b66ec51afd1b25e335c7, "/{$b6497ba71489783c3747f19debe893a4}_.m3u8")) {
                Fc03b4050a981ecdd19df361d091cb15:
                return false;
            }
            return true;
        }
        return false;
    }
    public static function ps_running($ef4f0599712515333103265dafb029f7, $c3bd62458959952cf55b015822fd5a91) {
        if (!empty($ef4f0599712515333103265dafb029f7)) {
            clearstatcache(true);
            if (!(file_exists("/proc/" . $ef4f0599712515333103265dafb029f7) && is_readable("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe") && basename(readlink("/proc/" . $ef4f0599712515333103265dafb029f7 . "/exe")) == basename($c3bd62458959952cf55b015822fd5a91))) {
                return false;
            }
            return true;
        }
        return false;
    }
    public static function CE9736Cb36fC32A1E05Ec062E4E88475($ef4f0599712515333103265dafb029f7) {
        if (!empty($ef4f0599712515333103265dafb029f7)) {
            self::$ipTV_db->query("SELECT * FROM `user_activity_now` WHERE `container` = 'rtmp' AND `pid` = '%d' AND `server_id` = '%d'", $ef4f0599712515333103265dafb029f7, SERVER_ID);
            if (!(self::$ipTV_db->d4a34259fc10b35fEDBccdA0A23d69aE() > 0)) {
                return false;
            }
            $b0f2ad37a04751a76687ec58fd378a0f = self::$ipTV_db->EB6bFe16D93814CaF26d92092D5a4052();
            self::$ipTV_db->query("DELETE FROM `user_activity_now` WHERE `activity_id` = '%d'", $b0f2ad37a04751a76687ec58fd378a0f["activity_id"]);
            self::C9ccc76C9d6b7e44c6D4a7A6c7191EB5($b0f2ad37a04751a76687ec58fd378a0f["server_id"], $b0f2ad37a04751a76687ec58fd378a0f["user_id"], $b0f2ad37a04751a76687ec58fd378a0f["stream_id"], $b0f2ad37a04751a76687ec58fd378a0f["date_start"], $b0f2ad37a04751a76687ec58fd378a0f["user_agent"], $b0f2ad37a04751a76687ec58fd378a0f["user_ip"], $b0f2ad37a04751a76687ec58fd378a0f["container"], $b0f2ad37a04751a76687ec58fd378a0f["geoip_country_code"], $b0f2ad37a04751a76687ec58fd378a0f["isp"], $b0f2ad37a04751a76687ec58fd378a0f["external_device"]);
            return true;
        }
        return false;
    }
    public static function c9CcC76C9D6b7E44c6d4A7a6c7191eB5($C671e9e0a59f18412464d71d67ba55c7, $d8d36e593ec0bd7cae9e37c890b536d4, $b6497ba71489783c3747f19debe893a4, $start, $f1bbf25f8a2aa075b59695b2d749ee5b, $b7eaa095f27405cf78a432ce6504dae0, $b2cbe4de82c7504e1d8d46c57a6264fa, $afcb8aae8ae1125ee6b7356e499e56ab, $C997add4b06067b4b694ca90dd36e6d0, $e8bde7e627ad9d9d70c6010cc669eb60 = '') {
        $b0f2ad37a04751a76687ec58fd378a0f = array("user_id" => intval($d8d36e593ec0bd7cae9e37c890b536d4), "stream_id" => intval($b6497ba71489783c3747f19debe893a4), "server_id" => intval($C671e9e0a59f18412464d71d67ba55c7), "date_start" => intval($start), "user_agent" => $f1bbf25f8a2aa075b59695b2d749ee5b, "user_ip" => htmlentities($b7eaa095f27405cf78a432ce6504dae0), "date_end" => time() + E2d73953a5089B9c7983838f61F23aCF::$StreamingServers[SERVER_ID]["diff_time_main"], "container" => $b2cbe4de82c7504e1d8d46c57a6264fa, "geoip_country_code" => $afcb8aae8ae1125ee6b7356e499e56ab, "isp" => $C997add4b06067b4b694ca90dd36e6d0, "external_device" => htmlentities($e8bde7e627ad9d9d70c6010cc669eb60));
        file_put_contents("TMP_DIRoffline_cons", base64_encode(json_encode($b0f2ad37a04751a76687ec58fd378a0f)) . "\n", "NOOO_EXPEND");
    }
    public static function eF709337A2715D23B673E033a05bF7b7($f0d5508533eaf6452b2b014beae1cc7c, $ef4f0599712515333103265dafb029f7) {
        return self::ps_running($ef4f0599712515333103265dafb029f7, FFMPEG_PATH) && file_exists($f0d5508533eaf6452b2b014beae1cc7c);
    }
    public static function db998acd76fCd118B6Cdb4e9edA68580($c81742471fbf5fc98e647357de25a9c9, $dda1e24ed6a529d7aa6528cc838b24b8, $e4690ed58f6569ca3c7894a84e107f6d = null) {
        clearstatcache();
        if (file_exists($dda1e24ed6a529d7aa6528cc838b24b8)) {
            switch ($c81742471fbf5fc98e647357de25a9c9) {
                case "movie":
                    if (is_null($e4690ed58f6569ca3c7894a84e107f6d)) {
                        goto b599ea1ceec8821acccf09d9ddca311e;
                    }
                    sscanf($e4690ed58f6569ca3c7894a84e107f6d, "%d:%d:%d", $f70b4408f306b0946d856dd29a25b89c, $C3701408f451b56ac9f60cf02f5867b3, $e3cf3851f7ee9d4e859bd7fdd6f6b33e);
                    $f3db7858a998b217cdc28e738fd2182d = isset($e3cf3851f7ee9d4e859bd7fdd6f6b33e) ? $f70b4408f306b0946d856dd29a25b89c * 3600 + $C3701408f451b56ac9f60cf02f5867b3 * 60 + $e3cf3851f7ee9d4e859bd7fdd6f6b33e : $f70b4408f306b0946d856dd29a25b89c * 60 + $C3701408f451b56ac9f60cf02f5867b3;
                    $bd8be6cf39eec67640223143174627d0 = round(filesize($dda1e24ed6a529d7aa6528cc838b24b8) * 0.008 / $f3db7858a998b217cdc28e738fd2182d);
                    b599ea1ceec8821acccf09d9ddca311e:
                    goto ee66ccf07edefdae7f54c8cb3ea7fbf9;
                case "live":
                    $b4ad7225f6375fe5d757d3c7147fb034 = fopen($dda1e24ed6a529d7aa6528cc838b24b8, "r");
                    $C916bb1ae29f2a452125275557a10d33 = array();
                    ec9a875ce4a287107b2d4c91a7ab9d13:
                    if (feof($b4ad7225f6375fe5d757d3c7147fb034)) {
                        fclose($b4ad7225f6375fe5d757d3c7147fb034);
                        $bd8be6cf39eec67640223143174627d0 = count($C916bb1ae29f2a452125275557a10d33) > 0 ? round(array_sum($C916bb1ae29f2a452125275557a10d33) / count($C916bb1ae29f2a452125275557a10d33)) : 0;
                        goto ee66ccf07edefdae7f54c8cb3ea7fbf9;
                    }
                    $Df3643b77de72fea7002c5acff85b896 = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                    if (!stristr($Df3643b77de72fea7002c5acff85b896, "EXTINF")) {
                        goto ee1750d18022eae8fdac677b2259a15f;
                    }
                    list($e779a7ffdb69a3c605e2fccb290d9495, $e3cf3851f7ee9d4e859bd7fdd6f6b33e) = explode(":", $Df3643b77de72fea7002c5acff85b896);
                    $e3cf3851f7ee9d4e859bd7fdd6f6b33e = rtrim($e3cf3851f7ee9d4e859bd7fdd6f6b33e, ",");
                    if (!($e3cf3851f7ee9d4e859bd7fdd6f6b33e <= 0)) {
                        $F9c8a291792f79d13ff4c34f35ce49af = trim(fgets($b4ad7225f6375fe5d757d3c7147fb034));
                        if (file_exists(dirname($dda1e24ed6a529d7aa6528cc838b24b8) . "/" . $F9c8a291792f79d13ff4c34f35ce49af)) {
                            $a653546a7a781fe97e3e0ccb25e5e310 = filesize(dirname($dda1e24ed6a529d7aa6528cc838b24b8) . "/" . $F9c8a291792f79d13ff4c34f35ce49af) * 0.008;
                            $C916bb1ae29f2a452125275557a10d33[] = $a653546a7a781fe97e3e0ccb25e5e310 / $e3cf3851f7ee9d4e859bd7fdd6f6b33e;
                            ee1750d18022eae8fdac677b2259a15f:
                            goto ec9a875ce4a287107b2d4c91a7ab9d13;
                        }
                        fclose($b4ad7225f6375fe5d757d3c7147fb034);
                        return false;
                    }
                    goto ec9a875ce4a287107b2d4c91a7ab9d13;
            }
            ee66ccf07edefdae7f54c8cb3ea7fbf9:
            return $bd8be6cf39eec67640223143174627d0 > 0 ? $bd8be6cf39eec67640223143174627d0 : false;
        }
        return false;
    }
}
