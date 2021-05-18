<?php
require_once 'connect.php';

// ВЫБОРКА ЗАКАЗОВ ПО 1 КОНТРАГЕНТУ //
$start = 1;

$info = mysqli_query($link, "SELECT `user_id`, `name` FROM `counterpartys` WHERE `user_id` = {$start}");
$arr_info = mysqli_fetch_all($info, MYSQLI_ASSOC);
echo '<pre>';
$name = $arr_info[0]['name'];

$order_id = mysqli_query($link, "SELECT `order_id` FROM `orders` WHERE `user_id` = {$arr_info[0]['user_id']}");
$arr_order = mysqli_fetch_all($order_id, MYSQLI_ASSOC);
$counter = count($arr_order);
print_r("$name have $counter orders");
echo '<hr>';

// ВЫБОРКА ПО СУММЕ ВСЕХ ЗАКАЗОВ НА КОНТРАГЕНТОВ //

$info_2 = mysqli_query($link, "SELECT `name`, `user_id` FROM `counterpartys`");
$arr_info_2 = mysqli_fetch_all($info_2, MYSQLI_ASSOC);
$counter_2 = count($arr_info_2);

for($i = 0; $i < $counter_2; $i++){
    $order_id_2 = mysqli_query($link, "SELECT `order_id` FROM `orders` WHERE `user_id` = {$arr_info_2[$i]['user_id']}");
    $arr_order_id_2 = mysqli_fetch_all($order_id_2, MYSQLI_ASSOC);
    $count_order = count($arr_order_id_2);

    $name_2 = $arr_info_2[$i]['name'];
    echo '<pre>';
    print_r("$name_2 have $count_order orders");

}
echo '<hr>';
// ВЫБОРКА ЗАДВОЕННЫХ КОНТРАГЕНТОВ //

$info_3 = mysqli_query($link, "SELECT `name`, COUNT(*) FROM `counterpartys` HAVING COUNT(*) > 1");
$arr_info_3 = mysqli_fetch_all($info_3, MYSQLI_ASSOC);
$doubled_name = $arr_info_3[0]['name'];

print_r("Doubled client $doubled_name");
echo '<hr>';
// ВЫБОРКА ОПЛАЧЕННЫХ ЗАКАЗОВ //

$info_4 = mysqli_query($link, "SELECT `order_id` FROM `payments` WHERE `status` = 1");
$arr_info_4 = mysqli_fetch_all($info_4, MYSQLI_ASSOC);
var_dump($arr_info_4);
$count_info_4 = count($arr_info_4);
print_r('Paid orders with id: ');
for($k = 0; $k < $count_info_4; $k++){
    print_r($arr_info_4[$k]['order_id']);
    echo ' ';
}