
<?php
$links = array(
array(
'url' =>'home.php',
'text' =>'Home'
),   
array(
'url' =>'browse.php',
'text' =>'Clothes'
),           
array(
'url' =>'week3/index.php',
'text'=>'Shopping Cart'
));

foreach($links as $link){
    echo '<a href="' . $link['url'] . '"';
    
    if (isset($currentPage) && $currentPage === $link['url']) {
        echo ' id="currentPage"';
    }
    
    echo '>' .$link['text'] . '</a>';
    
}
?>
