<<<<<<< HEAD
<?php

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$rows = null;

if(!empty($_POST['name'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $likename = '%' . $name . '%';

    $stmt = $db->prepare('SELECT * FROM product.name WHERE name LIKE :name');
    $stmt->bindValue(':name', $likename, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

else {
    $stmt = $db->prepare('SELECT * FROM product.name');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo '<h1>Clothing Inventory</h1>';

foreach($rows as $row) {
    echo '<p>';
    echo '<a href="details.php?id=' . $row['product.id'] . '">';
    echo '<strong>' . $row['name'] . ' ' . $row['size'] . ':' . $row['price'] . ' - </strong></a>';
    echo '</p>';
}


?>
<!-- STRETCH CHALLENGE 01 -->

<br>
<form action="index.php" method="post">
    <strong><label for="name">name:</label></strong>
    <input type="text" name="name" id="name">
    <input type="submit" value="Search">
</form>
=======
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
>>>>>>> 49a80b2f2adae315ac4d08a66776ba3830fb6db6
