<?php
$counter = 0;
require_once 'connect.php';
echo "<pre>";


$user_id  = mysqli_query($link, "SELECT `user_id` FROM `counterpartys`");
$user_name = mysqli_query($link, "SELECT `name` FROM `counterpartys`");
$order_user_id = mysqli_query($link,"SELECT `user_id` FROM `orders`");
$order_order_id = mysqli_query($link, "SELECT `order_id` FROM `orders`");
$payment_order_id = mysqli_query($link, "SELECT `order_id` FROM `payments`");
$order_status = mysqli_query($link, "SELECT `status` FROM `payments`");



$array_user_id = mysqli_fetch_all($user_id, MYSQLI_ASSOC);
$array_name = mysqli_fetch_all($user_name, MYSQLI_ASSOC);
$array_order_id = mysqli_fetch_all($order_user_id, MYSQLI_ASSOC);

$array_order_order_id = mysqli_fetch_all($order_order_id, MYSQLI_ASSOC);
$array_payment_order_id = mysqli_fetch_all($payment_order_id, MYSQLI_ASSOC);
$array_order_status = mysqli_fetch_all($order_status, MYSQLI_ASSOC);

$name = '';






// ВЫБОРКА ЗАКАЗОВ ПО 1 КОНТРАГЕНТУ //


foreach ($array_user_id as $value){

    foreach ($array_order_id as $item ){
        //var_dump($item);
        //var_dump($value);
        if ($value == $item && $item['user_id'] == 1){
            $name = $array_name[0]["name"];
            $counter++;
        }
    }
}
print_r("$name принадлежит $counter заказов");
echo "<hr>";


// ВЫБОРКА ПО СУММЕ ВСЕХ ЗАКАЗОВ НА КОНТРАГЕНТОВ //


$count_user = count($array_name);
$i = 0;
    foreach ($array_user_id as $value){
        $counter = 0;

        foreach ($array_order_id as $item){
            //var_dump($item);
            //var_dump($value);
            if ($value['user_id'] == $item['user_id']){
                $counter++;
            }
        }

        $name = $array_name[$i]["name"];
        $i++;
    print_r("$name принажделит $counter заказов");
    echo '<pre>';
}
echo '<hr>';


// ВЫБОРКА ЗАДВОЕННЫХ КОНТРАГЕНТОВ //


for ($i = 0; $i < $count_user; $i++) {
    for ($j = 0; $j < $count_user; $j++) {
        if ($array_name[$i]['name'] == $array_name[$j]['name'] && !($array_user_id[$i]['user_id'] == $array_user_id[$j]['user_id'])) {
            $name = $array_name[$j]['name'];
            //var_dump($array_name[$j]['name']);
            $id = $array_user_id[$j]['user_id'];
            echo '<pre>';
            print_r("Detected $name with id $id");
        }
    }
}
echo '<hr>';

// ВЫБОРКА ОПЛАЧЕННЫХ ЗАКАЗОВ //

$count_orders = 0;
$count_orders = count($array_order_order_id);

for ($m = 0; $m < $count_orders; $m++){
    for ($n = 0; $n < $count_orders; $n++){
        if ($array_order_order_id[$m]['order_id'] == $array_payment_order_id[$n]['order_id'] && $array_order_status[$n]['status'] == 0){
            $id_2 = $array_order_order_id[$m]['order_id'];
            echo '<pre>';
            echo "This order with id $id_2 don't paid";
        }elseif($array_order_order_id[$m]['order_id'] == $array_payment_order_id[$n]['order_id'] && $array_order_status[$n]['status'] == 1){
            $id_2 = $array_order_order_id[$m]['order_id'];
            echo '<pre>';
            echo "This order with id $id_2 are paid";
        }
    }
}
