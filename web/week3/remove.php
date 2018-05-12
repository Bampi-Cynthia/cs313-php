<?php

session_start();

$item = $_POST['item'];
$qty  = $_POST['qty'];

$_SESSION['cart'][$item] -= $qty;

if ($_SESSION['cart'][$item] < 0) {
  $_SESSION['cart'][$item] = 0;
}

header('Location: cart.php');
