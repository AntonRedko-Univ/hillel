<?php

$string = 'Execute Выполнить тест';
$matches = array();
$res = array();

    preg_match_all('/[a-z, A-Z]+?/u',  $string, $matches);
    foreach ($matches[0] as $match) {
        $res[$match] = isset($res[$match]) ? ++$res[$match] : 1;
    }

    preg_match_all('/[а-яА-ЯёЁ]+?/u',  $string, $matches);
    foreach ($matches[0] as $match) {
        $res[$match] = isset($res[$match]) ? ++$res[$match] : 1;
    }

    print_r($res);

