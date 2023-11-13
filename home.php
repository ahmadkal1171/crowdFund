<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style1.css">

</head>
<?php
      session_start();
      
      $_SESSION["email_login"];
      $_SESSION["pass_login"];
      $_SESSION["id_login"];

      if(!$_SESSION['id_login']){
         header("Location: register.php");
      }
   ?>
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

<!-- header section ends -->

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/adidas.jpg) no-repeat">
            <div class="content">
               <span>Nike, Adidas, Puma</span>
               <h3>ADIDAS Imposible Is Nothing</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/nike.png) no-repeat">
            <div class="content">
               <span>Nike, Adidas, Puma</span>
               <h3>NIKE Just Do It</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/puma.png) no-repeat">
            <div class="content">
               <span>Nike, Adidas, Puma</span>
               <h3>PUMA Forever Faster</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> category </h1>

   <div class="box-container">

   <a href="package.php#men">
      <div class="box">
         <h3>men</h3> 
      </div>
   </a>

   <a href="package.php#women">
      <div class="box">
         <h3>women</h3>
      </div>
   </a>

   <a href="package.php#kids">
      <div class="box">
         <h3>kids</h3>
      </div>
</a>

   </div>

</section>

<!-- services section ends -->

<!-- home about section starts  -->

<section class="home-about">

   <div class="image">
      <img src="images/sales.jpg" alt="">
   </div>

   <div class="content">
      <h3>shop the offer</h3>
      <p>Red tones on the All Star BB Evo and Chuck 70 pay tribute to the origin of basketball. It started with a peach basket. The rest is history.</p>
      <a href="package.php" class="btn">shop</a>
   </div>

</section>

<!-- home about section ends -->

<!-- home packages section starts  -->

<section class="home-packages">

   <h1 class="heading-title"> the brands you love </h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="images/adidas1.jpg" alt="">
         </div>
         <div class="content">
            <h3>ADIDAS</h3>
            <p>FORUM LOW CL SHOES</p>
            <p> RM459.00 </p>
            <a href="package.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/nike1.jpg" alt="">
         </div>
         <div class="content">
            <h3>NIKE</h3>
            <p>Nike Air Presto x Hello Kitty</p>
            <p> RM 609.00 </p>
            <a href="package.php" class="btn">shop now</a>
         </div>
      </div>
      
      <div class="box">
         <div class="image">
            <img src="images/puma1.jpg" alt="">
         </div>
         <div class="content">
            <h3>PUMA</h3>
            <p> Muse X-2 Metallic Women's Sneakers </p>
            <p> RM 429.00 </p>
            <a href="package.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

   <div class="load-more"> <a href="package.php" class="btn">load more</a> </div>

</section>

<!-- home packages section ends -->

<!-- footer section starts  -->

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
			$("#menu-button").click(function(){
				$(".header-nav").slideToggle("1000");
			});
			$("#search-button").click(function(){
				$(".search-div").toggle();
			});
		});
	</script>
</html>