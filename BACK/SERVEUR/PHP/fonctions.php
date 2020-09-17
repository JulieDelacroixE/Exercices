<?php

function calculator($a, $b, $c) {

    if ($c == '+') {
        $result = $a + $b;
        return $result;
    }

    if ($c == '-') {
        $result = $a - $b;
        return $result;
    }

    if ($c == '*' or $c == 'x') {
        $result = $a * $b;
        return $result;
    }

    if ($c == '/') {
        $result = $a / $b;
        return $result;
    }
}

$nbr1 = 2;
$nbr2 = 5;

echo calculator($nbr1, $nbr2,'*');


?>