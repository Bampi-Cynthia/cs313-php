
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
<?php
require 'db.php';
$currentPage = 'browse.php';
require 'nav.php';
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

  <div id ='product'>

      

<?php



// Step 1: Start with the query that selects everything

$query = "SELECT 

product.id,

product.name,

product.image_url,

category.name AS category_name,

product.price AS price,

size.name AS size

FROM product

INNER JOIN category 

ON product.category_id = category.id





INNER JOIN size

ON product.size_id = size.id

";





// Step 2: If the user has chosen a category, we modify the base query

if (isset($_POST['category'])) {

  $query .= 'WHERE category.id = :cat_id';

}



// Step 3: prepare the query

$stmt = $db->prepare($query);





// Step 4: if the user has chosen a category, we bind a value to the prepared query

if (isset($_POST['category'])) {

  $stmt->bindValue('cat_id' , $_POST['category'],PDO::PARAM_INT );

}



    

// Step 5: We execute the prepared statement and proceed as normal

$stmt->execute();

while($row = $stmt->fetch()){

   // echo '<pre>';//

   // var_dump($row);//

  //  echo '</pre>';//

    echo '<div class="product">';

    echo '<h4>'. $row['name']."</h4>";

    echo '<img src ="' . $row['image_url'] . '">';

	echo '<p>'. $row['description']."</p>";

    echo '<h4>'. $row['price']."</h4>";
    echo '</div>';

}

}



?>

        </div>

    </body>