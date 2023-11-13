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
                <p style='margin: .5em 0;'>Quantity In Stock: " . $prod_data['PRODQTT'] . "</p>

                <form class='prod-addcart' action='' method='post'>
                    <input type='text' name='prodname' value='" . $prod_data['PRODNAME'] . "' style='display:none;'>
                    <label class='quant-label' style='font-size:14px;' for='quant'>Quantity:</label>
                    <input id='quant' class='prod-quantity' type='number' name='quantity' value='1' min='1' max='" . $prod_data['PRODQTT'] . "'><br/>
                    <label style='font-size:14px;' class='quant-label' for='quant'>Size:</label>
                    <select style='border:1px;' name='prod-size'>
                        <option value=''>choose</option>
                        <option value='7'>7 UK</option>
                        <option value='7.5'>7.5 UK</option>
                        <option value='8'>8UK</option>
                        <option value='8.5'>8.5 UK</option>
                        <option value='9'>9 UK</option>
                        <option value='9.5'>9.5 UK</option>
                    </select><br>
                    <input class='addcartbutton' type='submit' name='addcart' value='Add to cart'>
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
            $prodsize = $_POST['prod-size'];
            $totalPrice = $prod_data['PRODPRICE'] * $prodQtt;

            $versql = "SELECT PRODCARTQTT, TOTALPRICE, PRODSIZE
                        FROM cart
                        WHERE idCus = $cust_id
                        AND prodId = $prod_id";
            $stmt = oci_parse($conn, $versql);
            oci_execute($stmt);
            $data = oci_fetch_assoc($stmt);

            if (oci_num_rows($stmt) != 0) {
                $newquant = $prodQtt + $data['PRODCARTQTT'];
                $newTotalPrice = $totalPrice + $data['TOTALPRICE'];
                $insertquery = "UPDATE cart
                                SET prodName = '$prodname', prodCartQtt = $newquant, totalPrice = $newTotalPrice
                                WHERE idCus = $cust_id
                                AND prodId = $prod_id";

                /* to determine if the added product is more than the quantity */
                if ($newquant > $prod_data['PRODQTT']) {
                    echo '
                            <script>
                                alert("Cannot add more than quantity provided");
                            </script>
                        ';
                } else {
                    $stmt = oci_parse($conn, $insertquery);
                    oci_execute($stmt);

                    if ($stmt) {
                        echo '
                                <script>
                                    alert("Added to cart successfully");
                                </script>
                            ';
                    } else {
                        echo '
                                <script>
                                    alert("Failed to add to cart");
                                </script>
                            ';
                    }
                }
            } else {
                $insertquery = "INSERT INTO cart (idCus, prodName, prodId, prodCartQtt, totalPrice, prodSize,cartid)
                                VALUES ($cust_id, '$prodname', $prod_id, $prodQtt, $totalPrice, '$prodsize',CARTID_SEQUENCE.NEXTVAL)";
                $stmt = oci_parse($conn, $insertquery);
                oci_execute($stmt);

                if ($stmt) {
                    echo '
                            <script>
                                alert("Added to cart successfully");
                            </script>
                        ';
                } else {
                    echo 'Failed to add to cart';
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

</body>
</html>