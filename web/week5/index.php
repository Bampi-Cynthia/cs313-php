<?php
require('db.php');
$stmt = $db->query('SELECT * FROM product');
while($row = $stmt->fetch()){
    echo '<pre>';
    var_dump($row);
    echo '</pre>';
}