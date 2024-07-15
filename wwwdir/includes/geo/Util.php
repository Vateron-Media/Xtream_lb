<?php

class DDc23Aec20310Df645DDebd5EC6D891f {
    public static function eEF015c1BF4cd5BFf0a1E707190dcff3($efa7cefd12388102b27fdeb2f9f68219, $cce2738c6256d1c1113cf2149925c3b3, $d9cd6efd2aa251a6dd8811d7cb09d064) {
        if (!($d9cd6efd2aa251a6dd8811d7cb09d064 === 0)) {
            if (!(fseek($efa7cefd12388102b27fdeb2f9f68219, $cce2738c6256d1c1113cf2149925c3b3) === 0)) {
                goto F0cade5ed9444175e040f940e87570a5;
            }
            $b16944a0f2657c5e94a14137db656a79 = fread($efa7cefd12388102b27fdeb2f9f68219, $d9cd6efd2aa251a6dd8811d7cb09d064);
            if (!(ftell($efa7cefd12388102b27fdeb2f9f68219) - $cce2738c6256d1c1113cf2149925c3b3 === $d9cd6efd2aa251a6dd8811d7cb09d064)) {
                F0cade5ed9444175e040f940e87570a5:
                throw new E086CF8177E883A39E807d20D8Fcbc89("The MaxMind DB file contains bad data");
            }
            return $b16944a0f2657c5e94a14137db656a79;
        }
        return "";
    }
}
