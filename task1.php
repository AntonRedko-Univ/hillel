<?php


$array = array(0, 1, 2, array(4, 5, array(7, 8, array(3, 4, 5, array(3, 2, 6)))));

function sumArr($arr)
{
    $i = 1;
    $sum = 0;
    foreach ($arr as $v) {

        if (is_array($v)) {
            $sum += sumArr($v);
        } elseif ($i == 2) {
            $sum = $v + $sum;
        }
        $i++;
    }
    return $sum;
}

echo sumArr($array);