<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Staff Page</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1_2.css">
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php
	
		session_start();

      
      $email = $_SESSION["email_login"];
    //   $_SESSION["pass_login"];
      $id = $_SESSION["id_login"];

      if(!$_SESSION['id_login']){
         header("Location: stafflogin.php");
      }

	  if (isset($_SESSION["id_login"]))
	  	echo "<script>alert('welcome staff: '+ $email)</script>";
	else
		echo "<script>alert('nein' )</script>";
   ?>
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo"><img src="images/logo.png"></a>
   <nav class="navbar">
      <a href="staffpro.php">product</a>
   </nav>
   
      <a href="staffprofile.php" class="mobile-button"><img src="images/user.svg"></a>
   </nav>
</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/background-pic2.jpg) no-repeat">
   <h1>PRODUCT</h1>
</div>

<!-- packages section starts  -->

<main class="product-container">
   <section class="men" id="men">
      <h1 class="heading-title">MEN</h1>
			
				<?php
					#include "connection.php";
					$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
			$username = "onpoint";
			$password = "system";
			
			$conn = oci_connect($username, $password, $db);

					$query = "SELECT prodId, prodName, prodPrice, ProdDesc, prodImg, prodQtt
             FROM product
             WHERE prodCategory = 'men'";
   $stmt = oci_parse($conn, $query);

   if (!$stmt) {
      $error = oci_error($conn);
      echo "Failed to parse SQL query: " . $error['message'];
      exit;
   }

   $result = oci_execute($stmt);

   if ($result !== false) {
      echo "<div class='product-child'>";
      while ($prodarray = oci_fetch_assoc($stmt)) {
		$prodImg = '';
		$prodDesc = '';
	 
		// Check if the OCI-Lob objects are valid
		if ($prodarray['PRODIMG'] !== null) {
		   $blobImg = $prodarray['PRODIMG']->load();
		   $prodImg = base64_encode($blobImg);
		}
	 
		if ($prodarray['PRODDESC'] !== null) {
		   $prodDesc = $prodarray['PRODDESC'];
		}

		
		echo "
		   <a href='editproduct.php?prodId=" . $prodarray['PRODID'] . "' class='product-link' style='text-decoration: none; color: black;'>
			  <p><input type=\"submit\" name=\"upd\" value=\"UPDATE\" class=\"button\"></p>
			  <div class='product-card'>
				 <img src='data:image/jpeg;base64," . $prodImg . "' alt='rings picture'>
				 
				 <h2>" . $prodarray['PRODNAME'] . "</h2>
				 <h3>Quantity : " .  $prodarray['PRODQTT'] . "</h3>
				 <h3>RM " . $prodarray['PRODPRICE'] . "</h3>
				 <p>" . $prodDesc . "</p>
				 <p></p>
				 
				 <`
				 
			  </div>
		   </a>
		";
      }
      echo "</div>";
   } else {
      $error = oci_error($stmt);
      echo "Failed to execute SQL query: " . $error['message'];
   }
				?>
   </section>

   <section class="women" id="women">
      <h1 class="heading-title">WOMEN</h1>
			
				<?php
					$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
					$username = "onpoint";
					$password = "system";
					
					$conn = oci_connect($username, $password, $db);
		
							$query = "SELECT prodId, prodName, prodPrice, ProdDesc, prodImg, ProdQtt
					 FROM product
					 WHERE prodCategory = 'women'";
		   $stmt = oci_parse($conn, $query);
		
		   if (!$stmt) {
			  $error = oci_error($conn);
			  echo "Failed to parse SQL query: " . $error['message'];
			  exit;
		   }
		
		   $result = oci_execute($stmt);
		
		   if ($result !== false) {
			  echo "<div class='product-child'>";
			  while ($prodarray = oci_fetch_assoc($stmt)) {
				$prodImg = '';
				$prodDesc = '';
			 
				// Check if the OCI-Lob objects are valid
				if ($prodarray['PRODIMG'] !== null) {
				   $blobImg = $prodarray['PRODIMG']->load();
				   $prodImg = base64_encode($blobImg);
				}
			 
				if ($prodarray['PRODDESC'] !== null) {
				   $prodDesc = $prodarray['PRODDESC'];
				}
			 
				echo "
				<a href='editproduct.php?prodId=" . $prodarray['PRODID'] . "' class='product-link' style='text-decoration: none; color: black;'>
			  <p><input type=\"submit\" name=\"upd\" value=\"UPDATE\" class=\"button\"></p>
			  <div class='product-card'>
				 <img src='data:image/jpeg;base64," . $prodImg . "' alt='rings picture'>
				 
				 <h2>" . $prodarray['PRODNAME'] . "</h2>
				 <h3>Quantity : " .  $prodarray['PRODQTT'] . "</h3>
				 <h3>RM " . $prodarray['PRODPRICE'] . "</h3>
				 <p>" . $prodDesc . "</p>
					  </div>
				   </a>
				";
			  }
			  echo "</div>";
		   } else {
			  $error = oci_error($stmt);
			  echo "Failed to execute SQL query: " . $error['message'];
		   }
				?>
   </section>

   <section class="kids" id="kids">
      <h1 class="heading-title">KIDS</h1>
			
				<?php
					$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
					$username = "onpoint";
					$password = "system";
					
					$conn = oci_connect($username, $password, $db);
		
							$query = "SELECT prodId, prodName, prodPrice, ProdDesc, prodImg, ProdQtt
					 FROM product
					 WHERE prodCategory = 'kids'";
		   $stmt = oci_parse($conn, $query);
		
		   if (!$stmt) {
			  $error = oci_error($conn);
			  echo "Failed to parse SQL query: " . $error['message'];
			  exit;
		   }
		
		   $result = oci_execute($stmt);
		
		   if ($result !== false) {
			  echo "<div class='product-child'>";
			  while ($prodarray = oci_fetch_assoc($stmt)) {
				$prodImg = '';
				$prodDesc = '';
			 
				// Check if the OCI-Lob objects are valid
				if ($prodarray['PRODIMG'] !== null) {
				   $blobImg = $prodarray['PRODIMG']->load();
				   $prodImg = base64_encode($blobImg);
				}
			 
				if ($prodarray['PRODDESC'] !== null) {
				   $prodDesc = $prodarray['PRODDESC'];
				}
			 
				echo "
				<a href='editproduct.php?prodId=" . $prodarray['PRODID'] . "' class='product-link' style='text-decoration: none; color: black;'>
			 <p><input type=\"submit\" name=\"upd\" value=\"UPDATE\" class=\"update\"></p>
			  <div class='product-card'>
				 <img src='data:image/jpeg;base64," . $prodImg . "' alt='rings picture'>
				  
				 <h2>" . $prodarray['PRODNAME'] . "</h2>
				 <h3>Quantity : " .  $prodarray['PRODQTT'] . "</h3>
				 <h3>RM " . $prodarray['PRODPRICE'] . "</h3>
				 <p>" . $prodDesc . "</p>
					  </div>
				   </a>
				";
			  }
			  echo "</div>";
		   } else {
			  $error = oci_error($stmt);
			  echo "Failed to execute SQL query: " . $error['message'];
		   }
				?>
   </section>
</main>
<!-- packages section ends -->


<!-- footer section starts  -->

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

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
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
</body>
</html>