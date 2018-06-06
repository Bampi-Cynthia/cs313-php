<?php
$links = array(
        array(
            'url =>week5/home.php',
            'text' =>'Home'
            ),
    
        array(
            'url' =>'browse.php',
            'text' =>'Clothes'
            ),
            
            
            
            
        
            
            array(
            'url' =>'shopcart.php',
            'text'=>'Shopping Cart'
            )


);

foreach($links as $link){
    echo '<a href="' . $link['url'] . '"';
    
    if (isset($currentPage) && $currentPage === $link['url']) {
        echo ' id="currentPage"';
    }
    
    echo '>' .$link['text'] . '</a>';
    
}

?>