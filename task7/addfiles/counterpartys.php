<?php
require_once '../connect.php';

$name = $_POST['name'];
$user_id = $_POST['user_id'];


mysqli_query($link, "INSERT INTO `counterpartys` (`id`, `name`, `user_id`) VALUES (NULL, '$name', '$user_id')");

header('location: ../addinfo.php');