<?php
class ipTV_servers {
    public static function b2ceD9390FCc204b98376884add1E574($fb89dffee11f11f52678901f30b4d0af, $F57a44e1d4c2a8809dc8855d84e413c1, $c81742471fbf5fc98e647357de25a9c9 = "array", $E6fd3b84b4b4c3b83ac1286a90bed38a = false) {
        $output = array();
        if (!is_array($fb89dffee11f11f52678901f30b4d0af)) {
            $fb89dffee11f11f52678901f30b4d0af = array(intval($fb89dffee11f11f52678901f30b4d0af));
        }
        if (empty($F57a44e1d4c2a8809dc8855d84e413c1)) {
            foreach ($fb89dffee11f11f52678901f30b4d0af as $C671e9e0a59f18412464d71d67ba55c7) {
                $output[$C671e9e0a59f18412464d71d67ba55c7] = '';
            }
            return $output;
        }
        foreach ($fb89dffee11f11f52678901f30b4d0af as $C671e9e0a59f18412464d71d67ba55c7) {
            if (!($C671e9e0a59f18412464d71d67ba55c7 == SERVER_ID)) {
                if (array_key_exists($C671e9e0a59f18412464d71d67ba55c7, ipTV_lib::$StreamingServers)) {
                    $Beb85f0c05e519f48a14915b66ad155c = self::c9f95df7Fafb411701dED135F62e3bB5($C671e9e0a59f18412464d71d67ba55c7, ipTV_lib::$StreamingServers[$C671e9e0a59f18412464d71d67ba55c7]["api_url_ip"] . "&action=runCMD", array("command" => $F57a44e1d4c2a8809dc8855d84e413c1), $E6fd3b84b4b4c3b83ac1286a90bed38a);
                    if ($Beb85f0c05e519f48a14915b66ad155c) {
                        $b77a16302effd0dbdc1ac7d8a1a5d03f = json_decode($Beb85f0c05e519f48a14915b66ad155c, true);
                        $output[$C671e9e0a59f18412464d71d67ba55c7] = $c81742471fbf5fc98e647357de25a9c9 == "array" ? $b77a16302effd0dbdc1ac7d8a1a5d03f : implode("\n", $b77a16302effd0dbdc1ac7d8a1a5d03f);
                    } else {
                        $output[$C671e9e0a59f18412464d71d67ba55c7] = false;
                    }
                }
            } else {
                exec($F57a44e1d4c2a8809dc8855d84e413c1, $e3d63851128e7eff48f7d1e81e95019d);
                $output[$C671e9e0a59f18412464d71d67ba55c7] = $c81742471fbf5fc98e647357de25a9c9 == "array" ? $e3d63851128e7eff48f7d1e81e95019d : implode("\n", $e3d63851128e7eff48f7d1e81e95019d);
            }
        }
        return $output;
    }
    static function fbbdd88eB1b3703a5A7867411effcE35($fb89dffee11f11f52678901f30b4d0af, $c3bd62458959952cf55b015822fd5a91) {
        $Ef314464e8190fb09508a6c9cdedf6f6 = "ps ax | grep '" . basename($c3bd62458959952cf55b015822fd5a91) . "' | awk '{print \$1}'";
        return self::B2CEd9390FCc204b98376884ADD1E574($fb89dffee11f11f52678901f30b4d0af, $Ef314464e8190fb09508a6c9cdedf6f6);
    }
    static function C9F95DF7FAFB411701deD135F62E3Bb5($C671e9e0a59f18412464d71d67ba55c7, $eda79b6c4381b5cc84816737094d985c, $c0b3691d6dcd1091b396006166beb342 = array(), $Dfaefd52c207802d536c9de37fd410ff = 5, $dcb5d7e42506bc9b88478fdf1c51b3e8 = 20) {
        $Ced112d15c5a3c9e5ba92478d0228e93 = 1;
        while ($Ced112d15c5a3c9e5ba92478d0228e93 <= 2) {
            $C31928bf7a6d860aae9dbe5c5bf9dbf8 = curl_init();
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_URL, $eda79b6c4381b5cc84816737094d985c);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0) Gecko/20100101 Firefox/9.0");
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_HEADER, 0);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_CONNECTTIMEOUT, $Dfaefd52c207802d536c9de37fd410ff);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_TIMEOUT, $dcb5d7e42506bc9b88478fdf1c51b3e8);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_SSL_VERIFYPEER, 0);
            if (!empty($c0b3691d6dcd1091b396006166beb342)) {
                curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_POST, true);
                curl_setopt($C31928bf7a6d860aae9dbe5c5bf9dbf8, CURLOPT_POSTFIELDS, http_build_query($c0b3691d6dcd1091b396006166beb342));
            }
            $output = @curl_exec($C31928bf7a6d860aae9dbe5c5bf9dbf8);
            @curl_close($output);
            if ($output !== false) {
                return $output;
            }
            $Ced112d15c5a3c9e5ba92478d0228e93++;
        }
        return false;
    }
}
