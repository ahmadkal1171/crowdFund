<?php ?>
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

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="staffpro.php" class="logo"><img src="images/logo.png"></a>
   <nav class="navbar">
      <a href="staffpro.php">product</a>
   </nav>
      <a href="staffprofile.php" class="mobile-button"><img src="images/user.svg"></a>
   
</section>

<div class="heading" style="background:url(images/background-pic2.jpg) no-repeat">
   <h1>OUR PRODUCT</h1>
</div>

<section class = "body">
<main>
			<?php
				$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
				$username = "onpoint";
				$password = "system";
				
				$conn = oci_connect($username, $password, $db);
				session_start();
			
				/* add to cart module */
				$prod_id = $_GET["prodId"];

    $query = "SELECT * FROM product
                WHERE prodId = '$prod_id'";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    $prod_data = oci_fetch_assoc($stmt);

    if ($_SESSION['email_login'] != null && $_SESSION['pass_login'] != null) {

        $product_div = "";

        if ($prod_data['PRODIMG'] !== null) {
            $prod_img = base64_encode($prod_data['PRODIMG']->load());
            $product_div .= "
                <div class='view-container'>
                    <div class='img-view-header'>
                        <img class='img-view' src='data:image/jpeg;base64, $prod_img' alt='product image'>
                    </div>
            ";
        }

        $product_div .= "
            <div class='view-desc-parent'>

                <h1 class='prod-name' name='prodName' style='font-weight: 500;'>" . $prod_data['PRODNAME'] . "</h1>
                <h2 class='prod-price'>Price : RM " . number_format($prod_data['PRODPRICE'], 2, '.', '') . "</h2>
                <h3 class='product-desc' style='font-weight:400;'>" . $prod_data['PRODDESC'] . "</h3>
                <br>
                <h2 style='margin: .5em 0;'>Quantity In Stock: " . $prod_data['PRODQTT'] . "</h2>

                <form class='prod-addcart' action='' method='post'>
                    <input type='text' name='prodname' value='" . $prod_data['PRODNAME'] . "' style='display:none;'>
                    <label class='quant-label' style='font-size:14px;' for='quant'>Quantity:</label>
                    <input id='quant' class='prod-quantity' type='number' name='quantity' value='"  . $prod_data['PRODQTT'] . "'><br/>
                    <!--<label style='font-size:14px;' class='quant-label' for='quant'>Size:</label>
                    <br>-->
                    <input class='addcartbutton' type='submit' name='addcart' value='UPDATE'>
                </form>
            </div>
        </div>
        ";

        echo $product_div;

        /* add to cart */
        if (isset($_POST['addcart'])) {
            $cust_id = $_SESSION['id_login'];
            $prodname = $_POST['prodname'];
            $prodQtt = $_POST['quantity'];
        
            
        
            $versql = "SELECT prodqtt, Prodname,prodid
                        FROM product
                        WHERE  prodId = $prod_id";
            $stmt = oci_parse($conn, $versql);
            oci_execute($stmt);
            $data = oci_fetch_assoc($stmt);
        
            if (oci_num_rows($stmt) != 0) {
                
                $insertquery = "UPDATE product
                                SET prodName = '$prodname', prodQtt = $prodQtt
                                WHERE  prodId = $prod_id";
        
                $stmt = oci_parse($conn, $insertquery);
                oci_execute($stmt);
        
                if ($stmt) {
                    echo '
                            <script>
                                alert("Updated successfully");
                            </script>
                        ';
                } else {
                    echo '
                            <script>
                                alert("Failed to update cart");
                            </script>
                        ';
                }
            }  else {
                $insertquery = "UPDATE PRODUCT
                                SET prodName = '$prodname', prodQtt = $prodQtt
                                WHERE  prodId = :prod_id";
                $stmt = oci_parse($conn, $insertquery);
                oci_execute($stmt);

                if ($stmt) {
                    echo '
                            <script>
                                alert("Updated successfully");
                            </script>
                        ';
                } else {
                    echo 'Failed to add to update';
                }
            }
        }
    } else {
        echo "
                <script>
                    document.alert('Please login first');
                </script>
            ";
        header("Location: register.php");
    }

    /* end add to cart module */

    // Close the Oracle database connection
    oci_close($conn);
				
			?>
			
		</main>
</section>




<section class="footer">

   <div class="box-container">

     

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

</body>
</html>