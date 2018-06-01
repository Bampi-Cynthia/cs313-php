<!DOCTYPE html>
<html>

<head>
    
    <title> Clothing Store</title>
    <style>
    
    </style>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Pacifico" rel="stylesheet">  
    </head>
    
    <body>
    <h1>Clothing Store</h1>

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
$stmt->execute();
while($row = $stmt->fetch()){
   // echo '<pre>';//
   // var_dump($row);//
  //  echo '</pre>';//
    echo '<h2>'. $row['name']."</h2>";
    
}
        
?>
    </body>
</html>