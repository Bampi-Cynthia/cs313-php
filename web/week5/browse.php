
<?php
require('db.php');
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
    var_dump($_POST);
}


?>