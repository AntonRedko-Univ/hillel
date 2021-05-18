<?php
require_once '../connect.php';

$status = $_POST['status'];
$order_id = $_POST['order_id'];

mysqli_query($link, "INSERT INTO `payments` (`id`, `order_id`, `status`) VALUES (NULL, '$order_id', '$status')");
header('location: ../addinfo.php');
