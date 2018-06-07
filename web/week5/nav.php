<<<<<<< HEAD
<?php
$links = array(
        array(
            'url =>'home.php',
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

=======
<?php
$links = array(
        array(
            'url' =>'browse.php',
            'text' =>'Browse'
            ),
            
            
            
            
        
            
            array(
            'url' =>'shopcart',
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

>>>>>>> 49a80b2f2adae315ac4d08a66776ba3830fb6db6
?>