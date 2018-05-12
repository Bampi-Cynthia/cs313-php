<?php

session_start();

$item = $_POST['item'];
$qty  = $_POST['qty'];

$_SESSION['cart'][$item] += $qty;

header('Location: cart.php');






?>