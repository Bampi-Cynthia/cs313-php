<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=uft-8" />
    <link rel='stylesheet' href='scss/prodpage.scss' />
    <meta name='viewport' content="width=device-width, intial-scale=1">
     
    
	</head>
    <body>
        
<?php include_once('nav.php');?>
        
<div class="container">
  <div class="header">
    <div class="header-logo">
    
    </div>
    <nav class="header-nav">
      <i class="ion-ios-cart"></i>
      <div></div>
    </nav>
  </div>
  <div class="product">
    <div class="product-photo">
      <img src="https://cdn.shopify.com/s/files/1/0844/5511/products/EM18056005_1805_WhiteOrange_Front_compact.jpg?v=1526323047">
      <img src="https://cdn.shopify.com/s/files/1/0844/5511/products/EM18056005_1805_WhiteOrange_Side_compact.jpg?v=1526323047">
    </div>
    <div class="product-detail">
      <h1 class="product__title">Stylish Easygoing Dress</h1>
      <div class="product__price">$44.99</div>
      <div class="product__subtitle">Think what to wear no more! This perfect summer dress is exactly what you need. The floral and stripe detail elevates the simple silhouette. You'll be wanting to wear this to the beach or the picnic party.</div>
      <div class="product__color">
        <form action="">
          <fieldset>
            <input type="radio" name="color">
            <label for="straw">
              <i class="ion-android-done"></i>
            </label>
          </fieldset>
          <fieldset>
            <input type="radio" name="color">
            <label for="brown">
              <i class="ion-android-done"></i>
            </label>
          </fieldset>
        </form>
      </div>
      <a class="product__button" href="#" onClick="buttonAnimate()">
        <span>Add to cart</span>
        <span>Success</span>
      </a>
    </div>
  </div>
</div>
        <script>
        const button = document.querySelector('.product__button');

function buttonAnimate() {
  button.classList.add('product__button--success');
}
        </script>
        
    </body>
</html>
