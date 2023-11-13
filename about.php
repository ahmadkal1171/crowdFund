<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style1.css">
   
   <style type="text/css">
     .heading-title{
		 border-radius: 20px 20px 0px 0px;
		 padding: 10px 0px;
		 background: yellow;
		 color: black;
		 width: 100%;
		 display: flex;
		 align-content: center;
		 justify-content: center;
		 font-size: 260%
	 }
	 .faq-item{
		 margin-bottom: 40px;
		 margin-top: 40px;
	 }
	 .faq-body{
		 display: none;
		 margin-top: 30px;
	 }
	 .faq-wrapper{
		 width: 75%;
		 margin: 0 auto;
	 }
	 .faq-inner{
		 padding: 30px;
		 background: white;
	 }
	 .faq-plus{
		 float: right;
		 font-size: 1.4em;
		 line-height: 1em;
		 cursor: pointer;
	 }
	 hr{
		 background: white; 
	 }
	 h3{
		 font-size: 170%;
	 }
	 .swipe-more{
		 text-align: center;
         margin-top: 2rem;
	 }
	 
   </style>

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

<!-- header section ends -->

<div class="heading" style="background:url(images/background-pic.jpg) no-repeat">
   <h1>about us</h1>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="images/background-pic.jpg" alt="">
   </div>

   <div class="content">
      <h3>About us</h3>
      <p>

Established in the year 2022, On Point D.Store has been established as the leading Malaysia specialist retailer of fashionable branded, sports and casual wear. At this moment in time, On Point D.Store is already regarded as the most innovative visual merchandiser of sportswear with the best and most exclusive stylish range. On Point D.Store looks forward to a progressive development in Asia in the days to come..</p>
     
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>shop category</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>affordable price</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24/7 guide service</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading-title"> About </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            
            <p>On Point D.Store seeks to inspire the emerging generation of globally minded consumers through a connection to the universal culture of sport, music and fashion. On Point D.Store has a detailed understanding of its fashion focussed and “street” consumer and cultivates its product range to appeal to this audience. On Point D.Store’s product offering is underpinned by substantial communication of the On Point D.Store Brand and its associations to its consumers through social media, influencers and outdoor marketing campaigns.</p>
            <h3>Ahmad Haikal bin Ahmad Zulfikri</h3>
            <span>PROJECT MANAGER</span>
            <img src="images/haikal.jpg" alt="">
         </div>

         <div class="swiper-slide slide">
           
            <p>The On Point D.Store Group continuously sets the global standard for retail experience through best-in-class operations, connected consumer experiences and the unique delivery of the world’s most authentic brands to the market. The On Point D.Store Group is committed to showcasing brands in a premium environment and stores remain a core part of On Point D.Store Strategy. 
            <h3>MUHAMMAD IDZHAM BIN MAZLAN</h3>
            <span>PROGRAMMER</span>
            <img src="images/am.jpg" alt="">
         </div>

         <div class="swiper-slide slide">
            
            <p>Across the wider On Point D.store Group we also have multiple businesses which do one or more of the following: expand our branded reach, support our ability to develop and wholesale branded shoes or facilitate the Group’s entry into fashion and sport related categories. This is to maintain ultimate flexibility in our business model, widen our customer appeal and be able to capitalise on the fast pace of consumer trends.</p>
            <h3>Muhammad Hafiz Naufal bin Hasmuni</h3>
            <span>DATABASE DESIGNER 1</span>
            <img src="images/pal.jpg" alt="">
         </div>

         <div class="swiper-slide slide">
            <p>We always strive to do the right thing for our colleagues, our customers, and our communities. We are proud of our achievements to date, from improving conditions for workers in our supply chain to increasing our efforts.</p>
            <h3>Danial Thaqif bin Mohamed Fikri</h3>
            <span>DATABASE DESIGNER 2</span>
            <img src="images/qep.jpg" alt="">
         </div>

         <div class="swiper-slide slide">
            <p>We always strive to do the right thing for our colleagues, our customers, and our communities. We are proud of our achievements to date, from improving conditions for workers in our supply chain to increasing our efforts.</p>
            <h3>Muhammad Rafizi bin Amran</h3>
            <span>DATABASE DESIGNER 2</span>
            <img src="images/piji.jpg" alt="">
         </div>
      </div>

     
   </div>
   
<div class="swipe-more"><span class="btn">swipe for more</span></div>

</section>

<section class="FAQs">

   
   <body>
      <div class="container">
	    <div class="row">
		  <div class="faq-wrapper">
		  <div class="heading-title">
		      <h1>FAQs</h1>
			</div>
			  <div class="faq-inner">
			    <div class="faq-item">
				<h3>WHERE IS MY ORDER?<span class="faq-plus">&plus;</span></h3>
				<div class="faq-body">
				  How do I track the status of my order and order shipment? <br>
				  I didn't receive my order, but my order tracking details shows it has been delivered. What's going on?<br>
				  What if I receive the wrong item or my order is missing an item?
				</div>
				</div>
				<hr>
				
				<div class="faq-item">
				<h3>FINDING YOUR FAVOURITE PRODUCTS<span class="faq-plus">&plus;</span></h3>
				<div class="faq-body">
				  How do I find a specific product?  <br>
				</div>
				</div>
				<hr>
				
				<div class="faq-item">
				<h3>SIZING<span class="faq-plus">&plus;</span></h3>
				<div class="faq-body">
				  What shoe size will fit me? <br>
				</div>
				</div>
				<hr>
				
				<div class="faq-item">
				<h3>PAYMENT INFORMATION<span class="faq-plus">&plus;</span></h3>
				<div class="faq-body">
				  What forms of payment do you accept on On Point D.Store?<br>
				  Why didn't my order go through?<br>
				  When is my debit or credit card charged?
				</div>
				</div>
				<hr>
				
			  </div>
			  
		  
		  </div>
		  </div>
		  </div>
		  </div>
		  
		  <script type="text/javascript">
		      $(".faq-plus").on('click',function(){
				  $(this).parent().parent().find('.faq-body').slideToggle();
			  });
		  </script>
	</body>
	

            
            
            

        

         
      </div>

   </div>

</section>

<!-- reviews section ends -->















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