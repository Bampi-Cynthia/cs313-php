<?php

session_start();

require('products.php');

foreach ($_SESSION['cart'] as $key => $qty) {
  echo $products[$key]['label'] . ': ' . $qty . '<br>';
}
?>

<a href="index.php">Main</a>
<a href="checkout.php">Check Out</a>
