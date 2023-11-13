<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>package</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="css/style.css">
   <!--<link rel="stylesheet" href="css/stylecart.css">-->
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

</head>
<body>
<br><br> 
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo"><img src="images/logo.png"></a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">product</a>
      <a href="cart.php">cart</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

   

   <nav class="header-mobile-nav">

         <form class="search-div" action="search.php" method="post" style="display:none;">
            <input class="search-input" type="search" name='searchtext'>
            <input class="search-button" type="submit" name='searchbutton' value="GO" style="width:20%; height:50px; right:50%;" >
         </form>
         <a class="mobile-button" id="search-button"><i class="fa fa-search"></i></a>
      <a href="edit-profile.php" class="mobile-button"><img src="images/user.svg"></a>
   </nav>
</section>

<?php
		$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
		$username = "onpoint";
		$password = "system";
		
		$conn = oci_connect($username, $password, $db);
        

		session_start();
		
		$cust_id = $_SESSION["id_login"];
        
       


    $query = "SELECT c.prodId, c.prodCartQtt, c.totalPrice, c.prodSize, p.prodName, p.prodPrice, p.prodQtt, c.cartid
                FROM cart c
                INNER JOIN product p ON c.prodId = p.prodId
                WHERE c.idCus = $cust_id";
           $stmt = oci_parse($conn, $query);
          oci_execute($stmt);
         
    
    

    /* show items from the cart */
    if ($stmt) {
        echo "
            <h1 style='text-align:center;margin:1em;'>YOUR CART</h1>
            <div class='cart-container'>
                <div class='child-cart-container'>
        ";

        $totalprice = 0;
        $totalquant = 0;
        while ($prodarray = oci_fetch_assoc($stmt)) {
			echo "
				<div class='cart-card'>
					<div class='cart-card-desc'>
						<h2>".$prodarray['PRODNAME']."</h2>
						<p>Size: ".$prodarray['PRODSIZE']."</p>
						<p>".$prodarray['PRODCARTQTT']." x ". number_format($prodarray['PRODPRICE'], 2, '.', '')."</p>
		
						<form class='edit-form' action='' method='post'>
							<label for='quant'>Edit quantity:</label>
							<input type='number' value='".$prodarray['PRODID']."' style='display:none;' name='productid'>
							<input type='number' value='".$prodarray['PRODPRICE']."' style='display:none;' name='productprice'>
							<input class='quant-edit' id='quant' type='number' name='quantedit' min='1' max='".$prodarray['PRODQTT']."'><br/>
							<input class='edit-form-button'  type='submit' name='editquant' value='CHANGE'>
						</form>
		
						<h4 style='margin:1.2em 0;'>TOTAL = RM ". number_format($prodarray['TOTALPRICE'], 2, '.', '') ."</h4>
					</div>
					<a class='edit-del-button cart-del-button' href='cart.php?DEL=true&prodId=".$prodarray['PRODID']."' style='display:none;'>
						<div style='padding:.5em;'>
							<p>REMOVE</p>
						</div>
					</a>
				</div>
			";
		
			$totalprice += $prodarray['TOTALPRICE'];
			$totalquant += $prodarray['PRODCARTQTT'];
		}
		

        echo "
            <div id='edit-button' style='padding:.5em;'>
                <p>EDIT</p>
            </div>
        </div>
        ";

        echo "
            <div class='cart-details'>
                <h2 style='text-align:center;margin:.5em;'>CHECKOUT DETAILS</h2>
                <h3>Total Quantity: ". $totalquant ."</h3>
                <h3>Total Price: RM ". number_format($totalprice, 2, '.', '') ."</h3>
                <h3>Delivery Charge: RM 4.50</h3>
                <hr/>
                <h3>SUBTOTAL: RM ".number_format($totalprice + 4.50, 2, '.', '') ."</h3>
                <a href='checkout.php' style='text-decoration:none;color:black;'>
                    <div class='checkout-button'>
                        <h5 style='width:100%;'>CHECKOUT</h5>
                    </div>
                </a>
            </div>
        </div>
        ";
    }/* else {
        echo "
            <script>
                alert('Your cart is empty');
                history.back();
            </script>
        ";
    }*/
    /* end of show items in the cart */

    /* DELETE item from cart */
    function delCartItems($custid) {

        $db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
		$username = "onpoint";
		$password = "system";
		
		$conn = oci_connect($username, $password, $db);

        $prodid = $_GET['prodId'];

        $query = "DELETE FROM cart WHERE idCus = $custid AND prodId = $prodid";

        $stmt = oci_parse($conn, $query);
        oci_execute($stmt);

        if ($stmt) {
            $query = "SELECT * FROM cart WHERE idCus = ".$_SESSION['id_login']."";

            $stmt = oci_parse($conn, $query);
            oci_execute($stmt);

            echo "
                <script>
                    alert('Item removed from your cart');
                </script>
            ";

            if (oci_num_rows($stmt) == 0) {
                header('Location: home.php');
            } else {
                echo "
                    <script>
                        window.location = 'cart.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Failed to remove');
                </script>
            ";
        }
    }

    if (isset($_GET['DEL'])) {
        delCartItems($cust_id);
    }
    /* end of DELETE item from cart */

    /* EDIT items in cart */
    if (isset($_POST['editquant'])) {
        $cart_prodID = $_POST['productid'];
        $cart_custID = $cust_id;
        $newcart_quant = $_POST['quantedit'];
        $prod_price = $_POST['productprice'];
        $newTotalPrice = $newcart_quant * $prod_price;

        $query = "UPDATE cart
                SET prodCartQtt = $newcart_quant, totalPrice = $newTotalPrice
                WHERE idCus = $cart_custID
                AND prodId = $cart_prodID";

        $stmt = oci_parse($conn, $query);
        oci_execute($stmt);

        if ($stmt) {
            echo "
               ```php
                <script>
                    alert('Quantity changed');
                    window.location = 'cart.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Failed to change quantity');
                </script>
            ";
        }
    }
		/* end of EDIT items in cart */
	?>

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> FAQs </a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +60 18-249 2362 </a>
         <a href="#"> <i class="fas fa-phone"></i> +60 11-6992 7861 </a>
         <a href="#"> <i class="fas fa-envelope"></i> OnPointD.Store@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Malaysia - 50000 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>On Point D.Store designer</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</body>

<script>
		
		$("document").ready(function(){
			$("#edit-button").click(function(){
				$(".edit-form").fadeToggle();
				$(".edit-form-button").fadeToggle();
				$(".cart-del-button").fadeToggle();
			});
		});
	</script>
	<script>
		$("document").ready(function(){
			$("#menu-button").click(function(){
				$(".header-nav").slideToggle("1000");
			});
			$("#search-button").click(function(){
				$(".search-div").toggle();
			});
		});
	</script>
</html>