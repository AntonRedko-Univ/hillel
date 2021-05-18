<?php
require_once '../connect.php';

$user_id = $_POST['user_id'];
$order_id = $_POST['order_id'];
$price = $_POST['price'];



mysqli_query($link, "INSERT INTO `orders` (`id`, `user_id`, `order_id`, `price`) VALUES (NULL, '$user_id', '$order_id', '$price')");
header('location: ../addinfo.php');
