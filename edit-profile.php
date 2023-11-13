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
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

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
		
		<div class="user-account-container">
			<h1 class="profile-title">MY PROFILE</h1>
			<?php
    // Include the Oracle connection file
    $db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
				$username = "onpoint";
				$password = "system";
				
				$conn = oci_connect($username, $password, $db);
    
    // Start the session
    session_start();
    
    // Get the email and password from the session
    $email = $_SESSION['email_login'];
    $pass = $_SESSION['pass_login'];
    
    // Prepare the query
    $query = "SELECT *
              FROM customer
              WHERE cusEmail = :cusemail
              AND cusPassword = :pass";
    
    // Prepare the statement
    $stmt = oci_parse($conn, $query);
    
    // Bind the parameters
    oci_bind_by_name($stmt, ":cusemail", $email);
    oci_bind_by_name($stmt, ":pass", $pass);
    
    // Execute the statement
    oci_execute($stmt);
    
    // Fetch the data
    $custdata = oci_fetch_assoc($stmt);
    
    if ($custdata) {
        echo "
        <div class='profile-container'>
            <div class='user-account'>
                <h2 class='profile-label'>Username</h2>
                <p class='user-name'>" . $custdata['CUSNAME'] . "</p>
                <h2 class='profile-label'>Email</h2>
                <p class='user-email'>" . $custdata['CUSEMAIL'] . "</p>
                <h2 class='profile-label'>Address</h2>
                <p class='user-address'>" . $custdata['CUSADDRESS'] . "</p>
                <h2 class='profile-label'>Phone Number</h2>
                <p class='user-number'>" . $custdata['CUSNUMPHONE'] . "</p>
            </div>
        ";
        echo "
            <form action='' method='post' class='edit-profile-form'>
                <label for='name'>Username:</label>
                <input type='text' id='name' name='username' value='" . $custdata['CUSNAME'] . "'>
                <label for='email'>Email:</label>
                <input type='text' id='email' name='email' value='" . $custdata['CUSEMAIL'] . "'>
                <label for='address'>Address:</label>
                <input type='text' id='address' name='address' value='" . $custdata['CUSADDRESS'] . "'><br/>
                <label for='phone'>Phone Number:</label><br/>
                <input type='text' id='phone' name='phone' value='" . $custdata['CUSNUMPHONE'] . "'>
                <input type='submit' name='updateprofile' value='UPDATE' style='border:none;border-radius:10px;height:35px;'>
            </form>
        </div>
        ";
        
        echo "
            <div class='cust-page-button'>
                <div class='profile-edit-button'>
                    <p class='edit-button-tag'>EDIT PROFILE</p>
                </div>
                <a class='logout-button' href='edit-profile.php?LOGOUT=true'>
                    <div>
                        <p class='edit-button-tag'>LOGOUT</p>
                    </div>
                </a>
            </div>
        ";
    }
    
    /* ------------------ EDIT PROFILE CUSTOMER ------------------------ */
    if (isset($_POST['updateprofile'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        // Prepare the update query
        $query = "UPDATE customer
                  SET cusName = :username, cusEmail = :email, cusAddress = :address, cusNumPhone = :phone
                  WHERE idCus = :id";
                  
        // Prepare the statement
        $stmt = oci_parse($conn, $query);
        
        // Bind the parameters
        oci_bind_by_name($stmt, ":username", $username);
        oci_bind_by_name($stmt, ":email", $email);
        oci_bind_by_name($stmt, ":address", $address);
        oci_bind_by_name($stmt, ":phone", $phone);
        oci_bind_by_name($stmt, ":id", $_SESSION['id_login']);
        
        // Execute the statement
        $result = oci_execute($stmt);
        
        if ($result) {
            echo "
                <script>
                    alert('Profile changed');
                </script>
            ";
            header("Refresh:0");
        } else {
            echo "Update failed!";
        }
    }
    
    if (isset($_GET['LOGOUT'])) {
        // Unset and destroy the session
        session_unset();
        session_destroy();
        
        header('Location: home.php');
    }
    
    // Close the Oracle connection
    oci_close($conn);
		?>
		</div>
		
		
	</body>

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

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
	<script>	
		
		$("document").ready(function(){
			$(".profile-edit-button").click(function(){
				$(".user-account").toggle("500");
				$(".edit-profile-form").toggle("500");
				$(".profile-warning").toggle();
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