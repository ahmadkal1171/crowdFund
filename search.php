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

<main class="product-container">
			<h1 style="text-align:center;margin:2em">RESULT</h1>
				<?php
					$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
               $username = "onpoint";
               $password = "system";
               
               $conn = oci_connect($username, $password, $db);
				
					if(isset($_POST['searchbutton'])){
						
						$searchvalue = $_POST['searchtext'];
					
						$query = "SELECT prodId, prodName, prodPrice, prodDesc, prodCategory, prodImg
                           FROM product
                           WHERE prodName = :searchvalue
                           OR prodCategory = :searchvalue
                           OR prodName LIKE '%' || :searchvalue || '%'
                           OR prodPrice LIKE '%' || :searchvalue || '%'";

                  $sql = oci_parse($conn, $query);

                  // Bind the search value to the query
                  oci_bind_by_name($sql, ':searchvalue', $searchvalue);

                  oci_execute($sql);

                  if ($sql) {
                     echo "<div class='product-child'> ";
                     while ($prodarray = oci_fetch_assoc($sql)) {
                        echo "
                           <a href='viewproduct.php?prodId=" . $prodarray['prodId'] . "' class='product-link' style='text-decoration: none; color: black;'>
                              <div class='product-card'>
                                 <img src='images/" . $prodarray['prodImg'] . "' alt='rings picture'>
                                 <div class='prod-card-desc'>
                                    <h2>" . $prodarray['prodName'] . "</h2>
                                    <h3>RM " . $prodarray['prodPrice'] . "</h3>
                                    <div id='product-card-desc'>" . $prodarray['prodDesc'] . "</div>
                                 </div>
                              </div>
                           </a>";
                     }
                     echo "</div>";
                  }

						else{
							
						}
					
					}
				?>
			
		</main>

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

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
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