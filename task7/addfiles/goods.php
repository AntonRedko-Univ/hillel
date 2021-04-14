<?php

require_once '../connect.php';

$Name = $_POST['name'];
$Price = $_POST['price'];
$Quantity = $_POST['quantity'];

mysqli_query($link, "INSERT INTO `goods list` (`id`, `Name`, `price`, `quantity`) VALUES (NULL, '$Name', '$Price', '$Quantity')");
header('location: ../addinfo.php');

?>