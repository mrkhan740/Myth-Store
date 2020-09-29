<?php
    $product_shuffle = $product->getData();

?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Brooks Products Page</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
        require('php/DBcontroller.php');
        ?>
        <?php
        require("functions.php");
        ?>
         
      
       </head>
    <body>
        
       <div class="container">
           <div class="navbar">
               <div class="logo">
                   <img src="images/b.jpg" width="70px" >
      
               </div>
               <nav>
                   <ul id="MenuItems">
                       <li><a href="index.html">Home</a></li>
                       <li><a href="products.html">Products</a></li>
                       <li><a href="">About</a></li>
                       <li><a href="">Contact</a></li>
                       <li><a href="signup.html">Account</a></li> 
                   </ul>
               </nav>
               <a href="cart.php"><img src="images/cart.jpg" width="30px" height="30px"></a>
               <img src="images/menu-icon.jpg" class="menu-icon" onclick="menutoggle()">
           </div> 
       </div>
   
   
   
       <div class="small-container">



           <div class="row">
          
           <div class="col-4">
           <?php foreach ($product_shuffle as $item) { ?>
           <img src="<?php echo $item['image']??"Oneplus.jpg" ?>">
                    <h4><?php echo $item['pname']??"unknown";?> </h4>
                    <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                </div>
                    <h4>Rs <?php echo $item['price'] ?? '0'; ?> </h4>
                    <button type="submit" class="btn">Add to cart</button>
               


            </div>
           <?php } ?>
            </div>


         <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594</span>
        </div>
              
       <!-----footer-->
   
       <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-col-2">
                            <img src="img/logo.png">
                            <p>MythStore is collection of Premium Smartphones. Widely consideredto be a genunie smarphone dealer.</p>
                            <p>The above mentioned words are just to increase lines. Do not set your mind to buy. Doing such might leed to transaction failure</p>
                        </div>
                    <hr>
                    <p class="copyright">&copy; 2020 - Myth Store</p>
                </div>
        </body>
        </HTML>
