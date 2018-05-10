<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8" />
    <meta name="autor" content="Cynthia Bampi">
    <title>Shopping Cart | CS 313</title>
    <link rel="stylesheet" type="text/css" href="shopcart.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <body>
    <h2>Shopping Cart</h2>
    

<?php

// Must be called anywhere you want to use sessions!
session_start();

// All session data is stored in session "superglobal"
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array(
    'dress' => 0,
    'top'   => 0,
    'short' => 0
  );
}

require('products.php');

?>



    <?php
      foreach ($products as $key => $data) { 
    ?>
    <img class="dress" src="<?php echo $data['image']; ?>">
       <form action="add.php" method="POST"> 
       <?php 
       echo '<input type="hidden" name="item" value="' . $key . '">'; 

       ?>
       <input type="number" name="qty" min="1">
            <button>Add</button>
            
       </form>
   
      <?php 
    }
       ?>
  <form action="remove.php" method="POST">
  <select name="item">
    <?php
      foreach ($products as $key => $data) {
        echo "<option value=\"{$key}\">{$data['label']}</option>";
      }
    ?>
  </select>
  <input type="number" name="qty" min="1">
  <button>Remove</button>
</form>

<a href="cart.php"><img src="http://www.clker.com/cliparts/J/C/X/z/E/s/shopping-cart-hi.png"></a>
<a href="checkout.php">Check Out</a>
