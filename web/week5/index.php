<?php
require('db.php');
$stmt = $db->query("SELECT 
product.id,
product.name,
category.name AS category_name,
product.price,
size.name AS size
FROM product
INNER JOIN category 
ON product.category_id = category.id


INNER JOIN size
ON product.size_id = size.id;");
while($row = $stmt->fetch()){
   // echo '<pre>';//
   // var_dump($row);//
  //  echo '</pre>';//
    echo '<h2>'. $row['name']."</h2>";
    
}