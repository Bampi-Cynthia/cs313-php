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


<form action="add.php" method="POST">
  <select name="item">
    <?php
      foreach ($products as $key => $label) {
        echo "<option value=\"{$key}\">$label</option>";
      }
    ?>
  </select>
  <input type="number" name="qty" min="1">
  <button>Add</button>
</form>


<form action="remove.php" method="POST">
  <select name="item">
    <?php
      foreach ($products as $key => $label) {
        echo "<option value=\"{$key}\">$label</option>";
      }
    ?>
  </select>
  <input type="number" name="qty" min="1">
  <button>Remove</button>
</form>

<a href="cart.php">Cart</a>
<a href="checkout.php">Check Out</a>
