<?php
     session_start();
     $database_name = "product_details";
     $con = mysqli_connect("localhost", "root","", $database_name);
 
     if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            }else{
                echo '<script>alert("product is added to cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }

     }

     if(isset($_GET["action"])){

            if($_GET["action"] == "delete"){
                foreach($_SESSION["cart"] as $keys => $value){
                    if($value["product_id"] == $_GET["id"]){
                        unset($_SESSION["cart"]);
                        echo '<script>alert("product has been removed")</script>';
                        echo '<script>window.location="cart.php"</script>';
                    }
                }
            }

     }

?>



<<!DOCTYPE HTML>
<HTML>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myth Store | Cart</title>
    <link rel="stylesheet" href="Bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fixed.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>    
<body>
    <div id="home">
      <!---start of navigation --->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
           <span class="navbar-toggler-icon"></span> 
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="start.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">Products</a>
              </li>
            </ul>
          </div>
      </nav>
    </div>

    <!----- cart item details -->

    <div class="small-container cart-page">
    <div class="row">
          
           
    <?php
            $query = "SELECT * FROM product ORDER BY id ASC";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0){
               
                while ($row = mysqli_fetch_array($result)){

               
        ?>
        <div class="col-4">
 <form method="post" action="cart.php?action=add&id=<?php echo $row["id"] ?>">
                    <div>
                    <img src="<?php echo $row["image"]; ?> " class="img-responsive">
                    <h4><?php echo $row["pname"]; ?></h4>
                    <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                </div>
                    <h4>Rs <?php echo $row["price"]; ?></h4>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                   <input type="submit" name="add" class="shopbtn" value="Add to Cart! &#8594;"/>
                    </div>
                </form>
                </div>
                <?php
                }
            }
            ?>
</div>
    <div class="cart-info">
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Details</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value){
                        
                        ?>
           
                 <tr>
                     <td><?php echo $value["item_name"]; ?></td>
                     <td><?php echo $value["item_quantity"]; ?></td>
                     <td>Rs <?php echo $value["product_price"]; ?></td>
                     <td>Rs <?php echo number_format( $value["item_quantity"] * $value["product_price"],  2); ?></td>
                     <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                    
                </tr>  
                </table>
                
                <div class="total-price">  
                <table>
                 <?php
                    $total = $total + ($value["item_quantity"] * $value["product_price"]);
                 ?> 
          
                 <tr>
                    <td>Total</td>
                    <th>Rs <?php echo number_format($total, 2); ?> </th>
                    <td></td>
                 </tr>
                 <?php
                    }
                }
                    ?>
                     </table>
                </div>
                    <form action="https://forms.gle/SGzVVvxEPboGh5mHA">
                    <input type="submit" value="Check out" />
                    </form>
                </div>
        

    </div>
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
