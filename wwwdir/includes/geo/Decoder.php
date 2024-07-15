<?php
class c485c6f9dAf0d851a5FBe1439527a3e8 {
    private $fileStream;
    private $pointerBase;
    private $pointerTestHack;
    private $switchByteOrder;
    private $types = array(0 => "extended", 1 => "pointer", 2 => "utf8_string", 3 => "double", 4 => "bytes", 5 => "uint16", 6 => "uint32", 7 => "map", 8 => "int32", 9 => "uint64", 10 => "uint128", 11 => "array", 12 => "container", 13 => "end_marker", 14 => "boolean", 15 => "float");
    public function __construct($d82efd6e8719757709b6a4f271c2ba87, $b97f28ffca6a1705be82f34c34190c63 = 0, $cfea6bbb32e425aa9041dd95e323ab64 = false) {
        $this->fileStream = $d82efd6e8719757709b6a4f271c2ba87;
        $this->pointerBase = $b97f28ffca6a1705be82f34c34190c63;
        $this->pointerTestHack = $cfea6bbb32e425aa9041dd95e323ab64;
        $this->switchByteOrder = $this->ae0bDDE412CA42eBc797C976e44d0797();
    }
    public function dA74DDA22ff07ACFe23F4435b739d4c6($cce2738c6256d1c1113cf2149925c3b3) {
        list(, $e0603b37b1d44f8a9b9da85e2f18e462) = unpack("C", Ddc23aec20310dF645DdEbd5EC6d891f::EEF015C1bf4CD5Bff0a1e707190DcfF3($this->fileStream, $cce2738c6256d1c1113cf2149925c3b3, 1));
        $cce2738c6256d1c1113cf2149925c3b3++;
        $c81742471fbf5fc98e647357de25a9c9 = $this->types[$e0603b37b1d44f8a9b9da85e2f18e462 >> 5];
        if ($c81742471fbf5fc98e647357de25a9c9 === "pointer") {
            list($cbf9a51bcb83507ceea74282f1f3c84c, $cce2738c6256d1c1113cf2149925c3b3) = $this->E23A32Df43288Fa40464DaEc3a54C8CA($e0603b37b1d44f8a9b9da85e2f18e462, $cce2738c6256d1c1113cf2149925c3b3);
            if ($this->pointerTestHack) {
                return array($cbf9a51bcb83507ceea74282f1f3c84c);
            }
            list($b77a16302effd0dbdc1ac7d8a1a5d03f) = $this->DA74Dda22fF07acFE23f4435b739d4c6($cbf9a51bcb83507ceea74282f1f3c84c);
            return array($b77a16302effd0dbdc1ac7d8a1a5d03f, $cce2738c6256d1c1113cf2149925c3b3);
        }
        if ($c81742471fbf5fc98e647357de25a9c9 === "extended") {
            list(, $B3c3da3b83c5c2c8c8ae9f626e240e22) = unpack("C", DDC23aEC20310Df645dDEBd5Ec6d891F::eEF015C1Bf4Cd5bFf0a1E707190dCff3($this->fileStream, $cce2738c6256d1c1113cf2149925c3b3, 1));
            $Beb72eb67ada7da5ac78ea9c53451eac = $B3c3da3b83c5c2c8c8ae9f626e240e22 + 7;
            if ($Beb72eb67ada7da5ac78ea9c53451eac < 8) {
                throw new e086cF8177E883A39E807d20D8FcbC89("Something went horribly wrong in the decoder. An extended type " . "resolved to a type number < 8 (" . $this->types[$Beb72eb67ada7da5ac78ea9c53451eac] . ")");
            }
            $c81742471fbf5fc98e647357de25a9c9 = $this->types[$Beb72eb67ada7da5ac78ea9c53451eac];
            $cce2738c6256d1c1113cf2149925c3b3++;
        }
        list($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3) = $this->BdF406801298c9948aA9B20BB9E3C6E2($e0603b37b1d44f8a9b9da85e2f18e462, $cce2738c6256d1c1113cf2149925c3b3);
        return $this->B691576cE0B021251E5a97a1FB5D8CE2($c81742471fbf5fc98e647357de25a9c9, $cce2738c6256d1c1113cf2149925c3b3, $c2f883bf459da90a240f9950048443f3);
    }
    private function B691576Ce0B021251e5A97a1FB5d8cE2($c81742471fbf5fc98e647357de25a9c9, $cce2738c6256d1c1113cf2149925c3b3, $c2f883bf459da90a240f9950048443f3) {
        switch ($c81742471fbf5fc98e647357de25a9c9) {
            case "map":
                return $this->af8792FA3b03D7cCa5312218e37060EB($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3);
            case "array":
                return $this->a6eE38468a98B573A0D6DbD503eB9c85($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3);
            case "boolean":
                return array($this->BabCCda73B4f1f2DAd7e39009a328660($c2f883bf459da90a240f9950048443f3), $cce2738c6256d1c1113cf2149925c3b3);
        }
        $C1359ef071af6e57c5c8996447dedf89 = $cce2738c6256d1c1113cf2149925c3b3 + $c2f883bf459da90a240f9950048443f3;
        $Caa0aa71d18b85a3c3a825a16209b1a7 = DDC23aEc20310df645dDeBD5Ec6d891F::eEf015c1bF4cd5bfF0a1e707190DCfF3($this->fileStream, $cce2738c6256d1c1113cf2149925c3b3, $c2f883bf459da90a240f9950048443f3);
        switch ($c81742471fbf5fc98e647357de25a9c9) {
            case "utf8_string":
                return array($this->AcDB2cde105e70b2d17A2304573aD1C6($Caa0aa71d18b85a3c3a825a16209b1a7), $C1359ef071af6e57c5c8996447dedf89);
            case "double":
                $this->bc6eacC2B6513917194E9a150315f94B(8, $c2f883bf459da90a240f9950048443f3);
                return array($this->Cd697d8b4Ce83555372DDAA5e7B70d35($Caa0aa71d18b85a3c3a825a16209b1a7), $C1359ef071af6e57c5c8996447dedf89);
            case "float":
                $this->BC6Eacc2B6513917194e9A150315f94B(4, $c2f883bf459da90a240f9950048443f3);
                return array($this->cCA97Aa763dD29BCA421dfeB8CA91340($Caa0aa71d18b85a3c3a825a16209b1a7), $C1359ef071af6e57c5c8996447dedf89);
            case "bytes":
                return array($Caa0aa71d18b85a3c3a825a16209b1a7, $C1359ef071af6e57c5c8996447dedf89);
            case "uint16":
            case "uint32":
                return array($this->cf4df9f0480C5C0E3283e737EED10b8B($Caa0aa71d18b85a3c3a825a16209b1a7), $C1359ef071af6e57c5c8996447dedf89);
            case "int32":
                return array($this->cd135508A19Ac81BfB751523F2C8067f($Caa0aa71d18b85a3c3a825a16209b1a7), $C1359ef071af6e57c5c8996447dedf89);
            case "uint64":
            case "uint128":
                return array($this->b2E6E5c987a6e9776CA2701Adf186883($Caa0aa71d18b85a3c3a825a16209b1a7, $c2f883bf459da90a240f9950048443f3), $C1359ef071af6e57c5c8996447dedf89);
            default:
                throw new e086cF8177e883a39e807D20D8fcbC89("Unknown or unexpected type: " . $c81742471fbf5fc98e647357de25a9c9);
        }
    }
    private function Bc6eAcc2B6513917194E9A150315F94b($Cb705e5e8def333e2eff28d1800bd9ca, $B00062cd965b27c98f9f233b5afcd38f) {
        if ($Cb705e5e8def333e2eff28d1800bd9ca !== $B00062cd965b27c98f9f233b5afcd38f) {
            throw new E086cf8177e883a39E807D20d8fcbc89("The MaxMind DB file's data section contains bad data (unknown data type or corrupt data)");
        }
    }
    private function a6Ee38468A98B573a0d6Dbd503eB9C85($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3) {
        $fcb78624272a356f23ae5e8471da3ea0 = array();
        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        while ($Ced112d15c5a3c9e5ba92478d0228e93 < $c2f883bf459da90a240f9950048443f3) {
            list($b16944a0f2657c5e94a14137db656a79, $cce2738c6256d1c1113cf2149925c3b3) = $this->dA74DdA22fF07ACfE23f4435b739D4c6($cce2738c6256d1c1113cf2149925c3b3);
            array_push($fcb78624272a356f23ae5e8471da3ea0, $b16944a0f2657c5e94a14137db656a79);
            $Ced112d15c5a3c9e5ba92478d0228e93++;
        }
        return array($fcb78624272a356f23ae5e8471da3ea0, $cce2738c6256d1c1113cf2149925c3b3);
    }
    private function baBCcda73B4f1f2dAd7E39009A328660($c2f883bf459da90a240f9950048443f3) {
        return $c2f883bf459da90a240f9950048443f3 === 0 ? false : true;
    }
    private function Cd697D8B4ce83555372dDAA5E7b70d35($Bdca92d7334c27f5f2b9088b1890c469) {
        list(, $Fbc386f98b5f0df915b63bbe881bdd81) = unpack("d", $this->f3af039b12c23FB729eEd33e01683C8e($Bdca92d7334c27f5f2b9088b1890c469));
        return $Fbc386f98b5f0df915b63bbe881bdd81;
    }
    private function CCA97aA763Dd29bca421dfEb8CA91340($Bdca92d7334c27f5f2b9088b1890c469) {
        list(, $B3c6ada767ad0dd62edf699f3ce57ca0) = unpack("f", $this->f3aF039b12C23fB729EEd33E01683c8e($Bdca92d7334c27f5f2b9088b1890c469));
        return $B3c6ada767ad0dd62edf699f3ce57ca0;
    }
    private function CD135508a19Ac81BFB751523f2C8067F($Caa0aa71d18b85a3c3a825a16209b1a7) {
        $Caa0aa71d18b85a3c3a825a16209b1a7 = $this->efeE079AB8C678fD0928C42bd0446c34($Caa0aa71d18b85a3c3a825a16209b1a7, 4);
        list(, $a4125e86503d5cbbaf0a3465e108dd08) = unpack("l", $this->f3af039B12c23Fb729eed33e01683c8e($Caa0aa71d18b85a3c3a825a16209b1a7));
        return $a4125e86503d5cbbaf0a3465e108dd08;
    }
    private function aF8792fa3b03D7ccA5312218e37060EB($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3) {
        $E38fd7fbe299af8baceedcda703b8d71 = array();
        $Ced112d15c5a3c9e5ba92478d0228e93 = 0;
        while ($Ced112d15c5a3c9e5ba92478d0228e93 < $c2f883bf459da90a240f9950048443f3) {
            list($Cc2a18fdf76b8e3e115b27f927e5928b, $cce2738c6256d1c1113cf2149925c3b3) = $this->dA74dDA22fF07acfE23f4435B739D4C6($cce2738c6256d1c1113cf2149925c3b3);
            list($b16944a0f2657c5e94a14137db656a79, $cce2738c6256d1c1113cf2149925c3b3) = $this->Da74dDa22ff07acFe23F4435B739d4C6($cce2738c6256d1c1113cf2149925c3b3);
            $E38fd7fbe299af8baceedcda703b8d71[$Cc2a18fdf76b8e3e115b27f927e5928b] = $b16944a0f2657c5e94a14137db656a79;
            $Ced112d15c5a3c9e5ba92478d0228e93++;
        }
        return array($E38fd7fbe299af8baceedcda703b8d71, $cce2738c6256d1c1113cf2149925c3b3);
    }
    private $pointerValueOffset = array(1 => 0, 2 => 2048, 3 => 526336, 4 => 0);
    private function E23A32df43288FA40464daec3a54C8Ca($e0603b37b1d44f8a9b9da85e2f18e462, $cce2738c6256d1c1113cf2149925c3b3) {
        $E4bf3ab859f6fceedd542c0bacd0f41f = ($e0603b37b1d44f8a9b9da85e2f18e462 >> 3 & 3) + 1;
        $Fcf846b3512cb8d6f8d77d39b5ad11f6 = DDc23Aec20310df645DdEbD5eC6D891F::EEF015C1Bf4cD5BFf0A1e707190DCfF3($this->fileStream, $cce2738c6256d1c1113cf2149925c3b3, $E4bf3ab859f6fceedd542c0bacd0f41f);
        $cce2738c6256d1c1113cf2149925c3b3 = $cce2738c6256d1c1113cf2149925c3b3 + $E4bf3ab859f6fceedd542c0bacd0f41f;
        $F704bd461553985461f5aacedcbf9f36 = $E4bf3ab859f6fceedd542c0bacd0f41f === 4 ? $Fcf846b3512cb8d6f8d77d39b5ad11f6 : pack("C", $e0603b37b1d44f8a9b9da85e2f18e462 & 7) . $Fcf846b3512cb8d6f8d77d39b5ad11f6;
        $Eb48f9d652424766984dbf4b21291c53 = $this->CF4DF9F0480C5c0E3283e737EeD10b8b($F704bd461553985461f5aacedcbf9f36);
        $cbf9a51bcb83507ceea74282f1f3c84c = $Eb48f9d652424766984dbf4b21291c53 + $this->pointerBase + $this->pointerValueOffset[$E4bf3ab859f6fceedd542c0bacd0f41f];
        return array($cbf9a51bcb83507ceea74282f1f3c84c, $cce2738c6256d1c1113cf2149925c3b3);
    }
    private function cf4DF9f0480C5c0E3283e737EED10b8B($Caa0aa71d18b85a3c3a825a16209b1a7) {
        list(, $a4125e86503d5cbbaf0a3465e108dd08) = unpack("N", $this->eFEe079AB8C678fd0928C42bd0446C34($Caa0aa71d18b85a3c3a825a16209b1a7, 4));
        return $a4125e86503d5cbbaf0a3465e108dd08;
    }
    private function B2E6e5c987a6e9776CA2701aDf186883($Caa0aa71d18b85a3c3a825a16209b1a7, $d45eb59bcc6af5f94a29dabc055e8b9e) {
        $b64b42e337a37fb6c3760b7c7924aee5 = log(PHP_INT_MAX, 2) / 8;
        if ($d45eb59bcc6af5f94a29dabc055e8b9e === 0) {
            return 0;
        }
        $b9a8831a486c6b05236f2faf85fccd5a = ceil($d45eb59bcc6af5f94a29dabc055e8b9e / 4);
        $Ceff12352da6a0dd226fe286f51d2d29 = $b9a8831a486c6b05236f2faf85fccd5a * 4;
        $C7702ea9699d55feda5b1f4f197483d0 = $this->EFee079aB8c678fd0928C42Bd0446c34($Caa0aa71d18b85a3c3a825a16209b1a7, $Ceff12352da6a0dd226fe286f51d2d29);
        $Eb48f9d652424766984dbf4b21291c53 = array_merge(unpack("N{$b9a8831a486c6b05236f2faf85fccd5a}", $C7702ea9699d55feda5b1f4f197483d0));
        $F1b65b35af6a6f08d8f876d81c881d55 = 0;
        $Bdbe64c679544f87a85a1d325058161f = "4294967296";
        foreach ($Eb48f9d652424766984dbf4b21291c53 as $Bdbeb2a0e7fa0d58376a3d245bcb8b94) {
            if ($d45eb59bcc6af5f94a29dabc055e8b9e <= $b64b42e337a37fb6c3760b7c7924aee5) {
                $F1b65b35af6a6f08d8f876d81c881d55 = ($F1b65b35af6a6f08d8f876d81c881d55 << 32) + $Bdbeb2a0e7fa0d58376a3d245bcb8b94;
            } else {
                if (extension_loaded("gmp")) {
                    $F1b65b35af6a6f08d8f876d81c881d55 = B58D0405a6135ada67dD191D8f005A6a(c359A2557647260f7a3c323f00f14c23(f2D1e241C90C16168ab0f704Fe9221D5($F1b65b35af6a6f08d8f876d81c881d55, $Bdbe64c679544f87a85a1d325058161f), $Bdbeb2a0e7fa0d58376a3d245bcb8b94));
                } else {
                    if (extension_loaded("bcmath")) {
                        $F1b65b35af6a6f08d8f876d81c881d55 = bcadd(bcmul($F1b65b35af6a6f08d8f876d81c881d55, $Bdbe64c679544f87a85a1d325058161f), $Bdbeb2a0e7fa0d58376a3d245bcb8b94);
                    } else {
                        throw new \e8aE15f26E6bdbd1e14664E9757bA733("The gmp or bcmath extension must be installed to read this database.");
                    }
                }
            }
        }
        return $F1b65b35af6a6f08d8f876d81c881d55;
    }
    private function Acdb2CdE105e70B2d17a2304573Ad1C6($Caa0aa71d18b85a3c3a825a16209b1a7) {
        return $Caa0aa71d18b85a3c3a825a16209b1a7;
    }
    private function bdF406801298c9948aA9B20Bb9E3c6E2($e0603b37b1d44f8a9b9da85e2f18e462, $cce2738c6256d1c1113cf2149925c3b3) {
        $c2f883bf459da90a240f9950048443f3 = $e0603b37b1d44f8a9b9da85e2f18e462 & 31;
        $d6251a86a48fa368f62a0fe7499a8a03 = $c2f883bf459da90a240f9950048443f3 < 29 ? 0 : $c2f883bf459da90a240f9950048443f3 - 28;
        $Caa0aa71d18b85a3c3a825a16209b1a7 = ddc23Aec20310Df645Ddebd5EC6D891f::eEf015C1Bf4Cd5bff0A1E707190dcfF3($this->fileStream, $cce2738c6256d1c1113cf2149925c3b3, $d6251a86a48fa368f62a0fe7499a8a03);
        $de4a0c978006453997b21dcdf6f25d8e = $this->cf4df9f0480C5C0E3283e737EEd10B8B($Caa0aa71d18b85a3c3a825a16209b1a7);
        if ($c2f883bf459da90a240f9950048443f3 === 29) {
            $c2f883bf459da90a240f9950048443f3 = 29 + $de4a0c978006453997b21dcdf6f25d8e;
        } else {
            if ($c2f883bf459da90a240f9950048443f3 === 30) {
                $c2f883bf459da90a240f9950048443f3 = 285 + $de4a0c978006453997b21dcdf6f25d8e;
            } else {
                if ($c2f883bf459da90a240f9950048443f3 > 30) {
                    $c2f883bf459da90a240f9950048443f3 = ($de4a0c978006453997b21dcdf6f25d8e & 268435455 >> 32 - 8 * $d6251a86a48fa368f62a0fe7499a8a03) + 65821;
                }
            }
        }
        return array($c2f883bf459da90a240f9950048443f3, $cce2738c6256d1c1113cf2149925c3b3 + $d6251a86a48fa368f62a0fe7499a8a03);
    }
    private function eFEe079AB8C678fd0928C42Bd0446c34($eee1e41165186c8620f2f85b283cc77b, $Eb61af1e5538a8380364b66dd8c2ad39) {
        return str_pad($eee1e41165186c8620f2f85b283cc77b, $Eb61af1e5538a8380364b66dd8c2ad39, "\0", STR_PAD_LEFT);
    }
    private function f3af039b12c23fb729eeD33e01683c8E($Caa0aa71d18b85a3c3a825a16209b1a7) {
        return $this->switchByteOrder ? strrev($Caa0aa71d18b85a3c3a825a16209b1a7) : $Caa0aa71d18b85a3c3a825a16209b1a7;
    }
    private function Ae0bDDE412Ca42ebC797c976e44d0797() {
        $F0896ee357b57844c9bf9674f2d9d161 = 255;
        $F704bd461553985461f5aacedcbf9f36 = pack("S", $F0896ee357b57844c9bf9674f2d9d161);
        return $F0896ee357b57844c9bf9674f2d9d161 === current(unpack("v", $F704bd461553985461f5aacedcbf9f36));
    }
}
