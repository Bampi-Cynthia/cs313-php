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

    $stmt = $db->prepare('SELECT * FROM product.name WHERE name LIKE :Name');
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
    <strong><label for="name">Name:</label></strong>
    <input type="text" name="name" id="name">
    <input type="submit" value="Search">
</form>