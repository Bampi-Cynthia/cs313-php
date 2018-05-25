
<?php
require('db.php');
$currentPage = 'browse.php';
require('nav.php');
?>


<form action='browse.php' method='post'>
<select name='category'>
    <?php
    $stmt = $db->query("SELECT id, name FROM category");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo '<option value="'. $row['id'] . '">'.$row['name'] . '</option>';
        
    }
    
    ?>
    
    </select>
<button>Search</button>
</form>
<?php
if (isset($_POST['category'])) {
 $stmt = $db->prepare("SELECT 
product.id,
product.name,
category.name AS category_name,
product.price,
size.name AS size
FROM product
INNER JOIN category 
ON product.category_id = category.id


INNER JOIN size
ON product.size_id = size.id
WHERE category.id = :cat_id
;");
    $stmt->bindValue('cat_id' , $_POST['category'],PDO::PARAM_INT );
    
    
$stmt->execute();
while($row = $stmt->fetch()){
   // echo '<pre>';//
   // var_dump($row);//
  //  echo '</pre>';//
    echo '<h2>'. $row['name']."</h2>";
    
}
}


?>