<?php

class ipTV_db {
    public $result;
    protected $dbuser;
    protected $dbpassword;
    protected $dbname;
    protected $dbhost;
    protected $dbport;
    protected $pconnect = false;
    public $connected = false;
    public $dbh;
    function __construct($d7088ccc4e23889b3261206946d4e6e0, $be3257d30e195bfb29591ed9265cabcc, $d188ddf48f8909e25c0a094e8496f5f5, $Df7f8d61adb9564396b84cc3ac3d18b0, $feb18386e6ff621a6b6a2fe97c1a558f, $C77e9edf9f324fd9250968c70d8625d6 = false) {
        $this->dbuser = $be3257d30e195bfb29591ed9265cabcc;
        $this->dbpassword = $d188ddf48f8909e25c0a094e8496f5f5;
        $this->dbname = $Df7f8d61adb9564396b84cc3ac3d18b0;
        $this->dbport = $feb18386e6ff621a6b6a2fe97c1a558f;
        $this->dbhost = $d7088ccc4e23889b3261206946d4e6e0;
        $this->pconnect = $C77e9edf9f324fd9250968c70d8625d6;
    }
    function a9c27319DDf640F296201C75a1eF3eeB() {
        if (!($this->connected && !$this->pconnect)) {
            goto e56bd58c0d6069084d1de5f373440754;
        }
        $this->connected = false;
        $this->dbh->close();
        e56bd58c0d6069084d1de5f373440754:
        return true;
    }
    function __destruct() {
        $this->a9c27319dDf640F296201C75a1Ef3EeB();
    }
    function F7768984914F74D36D718561fCa367A3() {
        if (!($this->connected && $this->dbh)) {
            $this->dbh = mysqli_init();
            $this->dbh->options(MYSQLI_OPT_CONNECT_TIMEOUT, 7);
            if ($this->pconnect) {
                $this->dbh->real_connect("p:" . $this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname, $this->dbport);
                goto Bd56cd671a3a58793dcbf4c303d1166e;
            }
            $this->dbh->real_connect($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname, $this->dbport);
            Bd56cd671a3a58793dcbf4c303d1166e:
            if (empty($this->dbh->error)) {
                $this->connected = true;
                return true;
            }
            die(json_encode(array("main_fetch" => false, "error" => "MySQL: " . $this->dbh->error)));
        }
        return true;
    }
    function query($e86143ae714b5db9373cfb584f8aaf70) {
        $this->F7768984914F74D36d718561FCA367a3();
        $c32c9d326b971ff887c3247516592d3b = func_num_args();
        $Fd2da6fca34b91ba24c7abfb675cca2d = func_get_args();
        $cf090b387e447999792e13447929e6ab = array();
        $Ced112d15c5a3c9e5ba92478d0228e93 = 1;
        a53e1319a300475aa4cfb1d5ec710a5d:
        if (!($Ced112d15c5a3c9e5ba92478d0228e93 < $c32c9d326b971ff887c3247516592d3b)) {
            $e86143ae714b5db9373cfb584f8aaf70 = vsprintf($e86143ae714b5db9373cfb584f8aaf70, $cf090b387e447999792e13447929e6ab);
            $this->result = mysqli_query($this->dbh, $e86143ae714b5db9373cfb584f8aaf70);
            if ($this->result) {
                return true;
            }
            return false;
        }
        $cf090b387e447999792e13447929e6ab[] = mysqli_real_escape_string($this->dbh, $Fd2da6fca34b91ba24c7abfb675cca2d[$Ced112d15c5a3c9e5ba92478d0228e93]);
        $Ced112d15c5a3c9e5ba92478d0228e93++;
        goto a53e1319a300475aa4cfb1d5ec710a5d;
    }
    function Ed940a8511357C99475CC7969f034729($Dd2789835af575aaa88a4c8cbede59c5 = false, $Db97415207c4ebf1ac837432224012c4 = '', $eaee359317a5714ce93230b0b67189f5 = true, $Dbbc903c6f2cd8cdeab68fd01c992482 = '') {
        if (!($this->dbh && $this->result)) {
            return false;
        }
        $d5f8c5a2322bee76eff752938046634a = array();
        if (!($this->D4A34259fc10b35FeDBCCDa0a23d69Ae() > 0)) {
            goto a565cc7da96b97e7046db33c80e41b66;
        }
        a3025744e3b5b9d2123d60e69424841b:
        if (!($Fa2325a1b301ca7c383cb69087c42d91 = mysqli_fetch_array($this->result, MYSQLI_ASSOC))) {
            a565cc7da96b97e7046db33c80e41b66:
            mysqli_free_result($this->result);
            return $d5f8c5a2322bee76eff752938046634a;
        }
        if ($Dd2789835af575aaa88a4c8cbede59c5 && array_key_exists($Db97415207c4ebf1ac837432224012c4, $Fa2325a1b301ca7c383cb69087c42d91)) {
            if (isset($d5f8c5a2322bee76eff752938046634a[$Fa2325a1b301ca7c383cb69087c42d91[$Db97415207c4ebf1ac837432224012c4]])) {
                goto d5f5adb2d4b1dcc1ea9328a64469d43f;
            }
            $d5f8c5a2322bee76eff752938046634a[$Fa2325a1b301ca7c383cb69087c42d91[$Db97415207c4ebf1ac837432224012c4]] = array();
            d5f5adb2d4b1dcc1ea9328a64469d43f:
            if (!$eaee359317a5714ce93230b0b67189f5) {
                if (!empty($Dbbc903c6f2cd8cdeab68fd01c992482) && array_key_exists($Dbbc903c6f2cd8cdeab68fd01c992482, $Fa2325a1b301ca7c383cb69087c42d91)) {
                    $d5f8c5a2322bee76eff752938046634a[$Fa2325a1b301ca7c383cb69087c42d91[$Db97415207c4ebf1ac837432224012c4]][$Fa2325a1b301ca7c383cb69087c42d91[$Dbbc903c6f2cd8cdeab68fd01c992482]] = $Fa2325a1b301ca7c383cb69087c42d91;
                    goto f309b819421e331c3d838e6f3799abdd;
                }
                $d5f8c5a2322bee76eff752938046634a[$Fa2325a1b301ca7c383cb69087c42d91[$Db97415207c4ebf1ac837432224012c4]][] = $Fa2325a1b301ca7c383cb69087c42d91;
                f309b819421e331c3d838e6f3799abdd:
                goto fb30d9596b30e9a60154a5ebf6a2a273;
            }
            $d5f8c5a2322bee76eff752938046634a[$Fa2325a1b301ca7c383cb69087c42d91[$Db97415207c4ebf1ac837432224012c4]] = $Fa2325a1b301ca7c383cb69087c42d91;
            fb30d9596b30e9a60154a5ebf6a2a273:
            goto f288e61ef0f50fa95e2088dc4815ea73;
        }
        $d5f8c5a2322bee76eff752938046634a[] = $Fa2325a1b301ca7c383cb69087c42d91;
        f288e61ef0f50fa95e2088dc4815ea73:
        goto a3025744e3b5b9d2123d60e69424841b;
    }
    public function eb6BFe16d93814cAf26D92092d5a4052() {
        if (!($this->dbh && $this->result)) {
            return false;
        }
        $Fa2325a1b301ca7c383cb69087c42d91 = array();
        if (!($this->D4A34259Fc10B35fEdBcCda0A23D69AE() > 0)) {
            goto F8a4a95863ffa7c6dd22dbf9ec29d839;
        }
        $Fa2325a1b301ca7c383cb69087c42d91 = mysqli_fetch_array($this->result, MYSQLI_ASSOC);
        F8a4a95863ffa7c6dd22dbf9ec29d839:
        mysqli_free_result($this->result);
        return $Fa2325a1b301ca7c383cb69087c42d91;
    }
    public function b169bAef7c366Ed83Af90D613BFb8D0c() {
        if (!($this->dbh && $this->result)) {
            return false;
        }
        $Fa2325a1b301ca7c383cb69087c42d91 = false;
        if (!($this->d4a34259Fc10B35fEDbCcDa0A23d69Ae() > 0)) {
            goto c5436713210810e57a52a0a096e74351;
        }
        $Fa2325a1b301ca7c383cb69087c42d91 = mysqli_fetch_array($this->result, MYSQLI_NUM);
        $Fa2325a1b301ca7c383cb69087c42d91 = $Fa2325a1b301ca7c383cb69087c42d91[0];
        c5436713210810e57a52a0a096e74351:
        mysqli_free_result($this->result);
        return $Fa2325a1b301ca7c383cb69087c42d91;
    }
    public function dcEaB38EEd908557c244f9Ef2E68b426() {
        return mysqli_affected_rows($this->dbh);
    }
    public function F79DEb89967A61d12279a178b21F5865($e86143ae714b5db9373cfb584f8aaf70) {
        $this->F7768984914f74d36D718561Fca367a3();
        $this->result = mysqli_query($this->dbh, $e86143ae714b5db9373cfb584f8aaf70);
    }
    public function escape($Cf20a2a99ab965e1e1f62377d639e7ca) {
        $this->f7768984914f74D36D718561Fca367a3();
        return mysqli_real_escape_string($this->dbh, $Cf20a2a99ab965e1e1f62377d639e7ca);
    }
    public function B591bbD4354C8D25f1772A39962012A1() {
        return mysqli_num_fields($this->result);
    }
    public function C02fb3004CEc2de0BC39F4ED412479B1() {
        return mysqli_insert_id($this->dbh);
    }
    public function D4A34259fc10B35FeDbccda0A23d69AE() {
        return mysqli_num_rows($this->result);
    }
}
