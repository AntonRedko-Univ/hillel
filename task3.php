<?php
$list = array (
    array('id', 'login', 'password'),
    array('1', 'ggg', 'hhh'),
    array('2', '1234', '5678')

// ЗАПИСЬ //

);
$fopen = function () use ($list)
{
    $fp = fopen('file.csv', 'w');
    foreach ($list as $fields) {
        fputcsv($fp, $fields, ';', '"');
    }
    fclose($fp);
};

$fopen();

// СЧИТЫВАНИЕ //

$fget = function () use ($list) {

    if (($fp = fopen("file.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($fp, 0, ";")) !== FALSE) {
            $list[] = $data;
        }
        fclose($fp);
        print_r($list);
    }
};

$fget();
?>
