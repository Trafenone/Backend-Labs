<?php
    function MySin($x)
    {
        return sin($x);
    }

    function MyCos($x)
    {
        return cos($x);
    }

    function MyTg($x)
    {
        return tan($x);
    }

    function MyTg2($x) {
        return sin($x) / cos($x);
    }

    function MyPow($x, $y) {
        return pow($x, $y);
    }

    function MyFactorial($x) {
        if ($x == 0 || $x == 1) {
            return 1;
        } else {
            return $x * MyFactorial($x - 1);
        }
    }
?>