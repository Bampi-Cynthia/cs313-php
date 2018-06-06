<?php
$links = array(
        array(
            'url' =>'browse.php',
            'text' =>'Browse'
            ),
            
            
            
            
        
            
            array(
            'url' =>'week3/shopcart.php',
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