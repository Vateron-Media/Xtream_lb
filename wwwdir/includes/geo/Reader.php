<?php

class FFCABA9D38408D4853b09feD9B2F7571 {
    private static $DATA_SECTION_SEPARATOR_SIZE = 16;
    private static $METADATA_START_MARKER = "\xab\xcd\xefMaxMind.com";
    private static $METADATA_START_MARKER_LENGTH = 14;
    private static $METADATA_MAX_SIZE = 131072;
    private $decoder;
    private $fileHandle;
    private $fileSize;
    private $ipV4Start;
    private $metadata;
    public function __construct($d50b7c216f0a40aacb5609eed9efba18) {
        if (!(func_num_args() !== 1)) {
            if (is_readable($d50b7c216f0a40aacb5609eed9efba18)) {
                $this->fileHandle = @fopen($d50b7c216f0a40aacb5609eed9efba18, "rb");
                if (!($this->fileHandle === false)) {
                    $this->fileSize = @filesize($d50b7c216f0a40aacb5609eed9efba18);
                    if (!($this->fileSize === false)) {
                        $start = $this->dfD3f8438dA225035FD54aCa26a8cEF7($d50b7c216f0a40aacb5609eed9efba18);
                        $c9e96ba62bc9c2d2fa9c7663864e813b = new c485c6f9Daf0d851a5FBE1439527A3E8($this->fileHandle, $start);
                        list($fb717a1d84a9525974a6e12a6df787fa) = $c9e96ba62bc9c2d2fa9c7663864e813b->Da74ddA22ff07aCfe23f4435B739D4C6($start);
                        $this->metadata = new Cb367Ff73bf6c43c6b176770E3AdCDd3($fb717a1d84a9525974a6e12a6df787fa);
                        $this->decoder = new c485c6F9daf0D851A5fbe1439527A3e8($this->fileHandle, $this->metadata->searchTreeSize + self::$DATA_SECTION_SEPARATOR_SIZE);
                        // [PHPDeobfuscator] Implied return
                        return;
                    }
                    throw new \B580bEb4fdbC0537891C2991310a1F55("Error determining the size of \"{$d50b7c216f0a40aacb5609eed9efba18}\".");
                }
                throw new \c81065eE3C31E97e72Fe319aB719D3AF("Error opening \"{$d50b7c216f0a40aacb5609eed9efba18}\".");
            }
            throw new \C81065eE3c31e97E72FE319Ab719D3Af("The file \"{$d50b7c216f0a40aacb5609eed9efba18}\" does not exist or is not readable.");
        }
        throw new \C81065eE3c31e97E72fE319AB719D3AF("The constructor takes exactly one argument.");
    }
    public function F0C9B48F97cf10f24DA4e7bE863374aF($ba9f05313c030ce171440ef71c960502) {
        if (!(func_num_args() !== 1)) {
            if (is_resource($this->fileHandle)) {
                if (filter_var($ba9f05313c030ce171440ef71c960502, FILTER_VALIDATE_IP)) {
                    if (!($this->metadata->ipVersion === 4 && strrpos($ba9f05313c030ce171440ef71c960502, ":"))) {
                        $cbf9a51bcb83507ceea74282f1f3c84c = $this->d508Dd7Dd96c9D168355401499B8debF($ba9f05313c030ce171440ef71c960502);
                        if (!($cbf9a51bcb83507ceea74282f1f3c84c === 0)) {
                            return $this->c619d9C2426aCF150f92c79e78358893($cbf9a51bcb83507ceea74282f1f3c84c);
                        }
                        return null;
                    }
                    throw new \C81065eE3C31e97E72Fe319ab719D3Af("Error looking up {$ba9f05313c030ce171440ef71c960502}. You attempted to look up an" . " IPv6 address in an IPv4-only database.");
                }
                throw new \C81065Ee3c31e97E72Fe319ab719D3aF("The value \"{$ba9f05313c030ce171440ef71c960502}\" is not a valid IP address.");
            }
            throw new \bf5C81650e9a333007179a27D7dA2DE1("Attempt to read from a closed MaxMind DB.");
        }
        throw new \c81065ee3c31e97E72FE319AB719d3AF("Method takes exactly one argument.");
    }
    private function d508dD7DD96c9D168355401499B8dEBf($ba9f05313c030ce171440ef71c960502) {
        $E083a6154cd89437ce3465caa08ca1ba = array_merge(unpack("C*", inet_pton($ba9f05313c030ce171440ef71c960502)));
        $B4908e4a15357c8a2d844b889beab09e = count($E083a6154cd89437ce3465caa08ca1ba) * 8;
        $Eade348d8e535bc41de594b370a35c08 = $this->D24027EC6c2A1471BA78EaF1D1307215($B4908e4a15357c8a2d844b889beab09e);
        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        D7ffdd586d0414caf276bff01380b15f:
        if (!($Ced112d15c5a3c9e5ba92478d0228e93 < $B4908e4a15357c8a2d844b889beab09e)) {
            goto ec7e45abf80b058a2545bbc6fb036283;
        }
        if (!($Eade348d8e535bc41de594b370a35c08 >= $this->metadata->nodeCount)) {
            $f008eb49bae443bc14e13f1d9a5bdc49 = 255 & $E083a6154cd89437ce3465caa08ca1ba[$Ced112d15c5a3c9e5ba92478d0228e93 >> 3];
            $a1293ae7d526e220dccd424c4d77d6fb = 1 & $f008eb49bae443bc14e13f1d9a5bdc49 >> 7 - $Ced112d15c5a3c9e5ba92478d0228e93 % 8;
            $Eade348d8e535bc41de594b370a35c08 = $this->EDe6CdA7F470C4e3d7dC5814D552A3f1($Eade348d8e535bc41de594b370a35c08, $a1293ae7d526e220dccd424c4d77d6fb);
            $Ced112d15c5a3c9e5ba92478d0228e93++;
            goto D7ffdd586d0414caf276bff01380b15f;
        }
        ec7e45abf80b058a2545bbc6fb036283:
        if ($Eade348d8e535bc41de594b370a35c08 === $this->metadata->nodeCount) {
            return 0;
        }
        if ($Eade348d8e535bc41de594b370a35c08 > $this->metadata->nodeCount) {
            return $Eade348d8e535bc41de594b370a35c08;
        }
        Ac924cc333ecaefacdfe6cfe189fc670:
        throw new e086cf8177E883a39E807D20d8FCBC89("Something bad happened");
    }
    private function d24027EC6c2A1471BA78eAF1d1307215($adb6fe828c718151845abb8cc50ba1f4) {
        if (!($this->metadata->ipVersion === 6 && $adb6fe828c718151845abb8cc50ba1f4 === 32)) {
            return 0;
        }
        return $this->a8F495Ec685daCE327Fe5cfF443071ec();
    }
    private function a8f495eC685dACe327fe5cff443071EC() {
        if (!($this->metadata->ipVersion === 4)) {
            if (!$this->ipV4Start) {
                $Eade348d8e535bc41de594b370a35c08 = 0;
                $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
                Ea2675318f40d357eea21ed4c006ba33:
                if (!($Ced112d15c5a3c9e5ba92478d0228e93 < 96 && $Eade348d8e535bc41de594b370a35c08 < $this->metadata->nodeCount)) {
                    $this->ipV4Start = $Eade348d8e535bc41de594b370a35c08;
                    return $Eade348d8e535bc41de594b370a35c08;
                }
                $Eade348d8e535bc41de594b370a35c08 = $this->Ede6CdA7f470C4E3d7Dc5814d552A3f1($Eade348d8e535bc41de594b370a35c08, 0);
                $Ced112d15c5a3c9e5ba92478d0228e93++;
                goto Ea2675318f40d357eea21ed4c006ba33;
            }
            return $this->ipV4Start;
        }
        return 0;
    }
    private function EdE6cda7F470c4E3D7DC5814D552A3F1($eefc7d1b6e303f79abeea6cbc870be54, $E668004a0a9dcb461fceccb5e47023d6) {
        $Bba096624b751a22932ab2ffdd49b6f6 = $eefc7d1b6e303f79abeea6cbc870be54 * $this->metadata->nodeByteSize;
        switch ($this->metadata->recordSize) {
            case 24:
                $Caa0aa71d18b85a3c3a825a16209b1a7 = DDc23AEC20310DF645DdEBD5Ec6d891f::eeF015C1bf4CD5BFf0A1E707190dCFF3($this->fileHandle, $Bba096624b751a22932ab2ffdd49b6f6 + $E668004a0a9dcb461fceccb5e47023d6 * 3, 3);
                list(, $Eade348d8e535bc41de594b370a35c08) = unpack("N", "\x00" . $Caa0aa71d18b85a3c3a825a16209b1a7);
                return $Eade348d8e535bc41de594b370a35c08;
            case 28:
                $ac9161250e1425da08ae348e395917df = DDc23aEC20310DF645dDEbd5EC6D891f::EeF015C1BF4CD5bfF0a1e707190dcFF3($this->fileHandle, $Bba096624b751a22932ab2ffdd49b6f6 + 3, 1);
                list(, $Ddbf13c1d636ae8630bef9d3578dc7b1) = unpack("C", $ac9161250e1425da08ae348e395917df);
                if ($E668004a0a9dcb461fceccb5e47023d6 === 0) {
                    $Ddbf13c1d636ae8630bef9d3578dc7b1 = (240 & $Ddbf13c1d636ae8630bef9d3578dc7b1) >> 4;
                    goto Eed97541d309f0cf1c14273451b05ffa;
                }
                $Ddbf13c1d636ae8630bef9d3578dc7b1 = 15 & $Ddbf13c1d636ae8630bef9d3578dc7b1;
                Eed97541d309f0cf1c14273451b05ffa:
                $Caa0aa71d18b85a3c3a825a16209b1a7 = ddc23AeC20310Df645DDEbD5ec6d891F::eEf015C1bf4cD5BfF0a1e707190dcff3($this->fileHandle, $Bba096624b751a22932ab2ffdd49b6f6 + $E668004a0a9dcb461fceccb5e47023d6 * 4, 3);
                list(, $Eade348d8e535bc41de594b370a35c08) = unpack("N", chr($Ddbf13c1d636ae8630bef9d3578dc7b1) . $Caa0aa71d18b85a3c3a825a16209b1a7);
                return $Eade348d8e535bc41de594b370a35c08;
            case 32:
                $Caa0aa71d18b85a3c3a825a16209b1a7 = DDC23aeC20310Df645ddebD5EC6D891F::eEf015c1Bf4Cd5BfF0A1E707190DcFF3($this->fileHandle, $Bba096624b751a22932ab2ffdd49b6f6 + $E668004a0a9dcb461fceccb5e47023d6 * 4, 4);
                list(, $Eade348d8e535bc41de594b370a35c08) = unpack("N", $Caa0aa71d18b85a3c3a825a16209b1a7);
                return $Eade348d8e535bc41de594b370a35c08;
            default:
                throw new E086CF8177E883a39E807D20d8fcbc89("Unknown record size: " . $this->metadata->recordSize);
        }
    }
    private function C619d9c2426ACF150f92C79E78358893($cbf9a51bcb83507ceea74282f1f3c84c) {
        $df14369d2f2c39637590721c96dee636 = $cbf9a51bcb83507ceea74282f1f3c84c - $this->metadata->nodeCount + $this->metadata->searchTreeSize;
        if (!($df14369d2f2c39637590721c96dee636 > $this->fileSize)) {
            list($Ecf4751835141bfcce480ec62720b500) = $this->decoder->da74Dda22Ff07ACFe23F4435b739d4c6($df14369d2f2c39637590721c96dee636);
            return $Ecf4751835141bfcce480ec62720b500;
        }
        throw new e086cf8177e883a39E807D20d8FCbC89("The MaxMind DB file's search tree is corrupt");
    }
    private function DFd3f8438dA225035fD54aCA26A8CEF7($Bf16c9240a717f40e5629c2ab7355c5e) {
        $A7cd68109a3d420b829e6d9425875c6d = $this->fileHandle;
        $aba53873f2116a2606b1d784b83e5baf = fstat($A7cd68109a3d420b829e6d9425875c6d);
        $dae5c33ec395060057bc824576fcecad = $aba53873f2116a2606b1d784b83e5baf["size"];
        $d7a3f50f82f63b2d01b109a18e76de06 = self::$METADATA_START_MARKER;
        $E3ae8f9f054c4c223f06e21113c29da6 = self::$METADATA_START_MARKER_LENGTH;
        $b36dc8b8c96ba3a63fb9d4f53f2754d0 = min(self::$METADATA_MAX_SIZE, $dae5c33ec395060057bc824576fcecad) - $E3ae8f9f054c4c223f06e21113c29da6;
        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        d6579310814df1811f457d0faf65b97c:
        if (!($Ced112d15c5a3c9e5ba92478d0228e93 <= $b36dc8b8c96ba3a63fb9d4f53f2754d0)) {
            throw new E086Cf8177E883A39e807d20d8fcBC89("Error opening database file ({$Bf16c9240a717f40e5629c2ab7355c5e}). " . "Is this a valid MaxMind DB file?");
        }
        $B13e63b83fa032f987dd1e1436a7d353 = 0;
        E18b3d73a23e13c5764d20406953ee0a:
        if (!($B13e63b83fa032f987dd1e1436a7d353 < $E3ae8f9f054c4c223f06e21113c29da6)) {
            return $dae5c33ec395060057bc824576fcecad - $Ced112d15c5a3c9e5ba92478d0228e93;
        }
        fseek($A7cd68109a3d420b829e6d9425875c6d, $dae5c33ec395060057bc824576fcecad - $Ced112d15c5a3c9e5ba92478d0228e93 - $B13e63b83fa032f987dd1e1436a7d353 - 1);
        $e42d0b221802c89f956ca043c1cf10ff = fgetc($A7cd68109a3d420b829e6d9425875c6d);
        if (!($e42d0b221802c89f956ca043c1cf10ff !== $d7a3f50f82f63b2d01b109a18e76de06[$E3ae8f9f054c4c223f06e21113c29da6 - $B13e63b83fa032f987dd1e1436a7d353 - 1])) {
            $B13e63b83fa032f987dd1e1436a7d353++;
            goto E18b3d73a23e13c5764d20406953ee0a;
        }
        $Ced112d15c5a3c9e5ba92478d0228e93++;
        goto d6579310814df1811f457d0faf65b97c;
    }
    public function c5ddABCe550c89BF039DaE797Ff17565() {
        if (!func_num_args()) {
            if (is_resource($this->fileHandle)) {
                return $this->metadata;
            }
            throw new \bf5C81650e9A333007179A27D7DA2De1("Attempt to read from a closed MaxMind DB.");
        }
        throw new \c81065ee3C31E97E72fE319ab719D3AF("Method takes no arguments.");
    }
    public function close() {
        if (is_resource($this->fileHandle)) {
            fclose($this->fileHandle);
            // [PHPDeobfuscator] Implied return
            return;
        }
        throw new \bF5c81650E9A333007179A27d7dA2DE1("Attempt to close a closed MaxMind DB.");
    }
}
