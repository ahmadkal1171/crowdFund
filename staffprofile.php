<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Staff Profile</title>

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

<a href="staffpro.php" class="logo"><img src="images/logo.png"></a>
   <nav class="navbar">
      <a href="staffpro.php">product</a>
   </nav>
   
      <a href="staffprofile.php" class="mobile-button"><img src="images/user.svg"></a>
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
              FROM staff
              WHERE staffEmail = :staffemail
              AND staffPass = :staffpass";
    
    // Prepare the statement
    $stmt = oci_parse($conn, $query);
    
    // Bind the parameters
    oci_bind_by_name($stmt, ":staffemail", $email);
    oci_bind_by_name($stmt, ":staffpass", $pass);
    
    // Execute the statement
    oci_execute($stmt);
    
    // Fetch the data
    $staffdata = oci_fetch_assoc($stmt);
    
    if ($staffdata) {
        echo "
        <div class='profile-container'>
            <div class='user-account'>
                <h2 class='profile-label'>Username</h2>
                <p class='user-name'>" . $staffdata['STAFFNAME'] . "</p>
                <h2 class='profile-label'>Email</h2>
                <p class='user-email'>" . $staffdata['STAFFEMAIL'] . "</p>
                <h2 class='profile-label'>Salary</h2>
                <p class='user-address'> RM " . $staffdata['SALARY'] . "</p>
                <h2 class='profile-label'>Staff Type</h2>
                <p class='user-number'>" . $staffdata['STAFFTYPE'] . "</p>
                <h2 class=
                'profile-label'>Supervisor</h2>
                <p class='user-number'>" . $staffdata['SUPERVISORID'] . "</p>
            </div>
        ";
        echo "
            <form action='' method='post' class='edit-profile-form'>
                <label for='name'>Username:</label>
                <input type='text' id='name' name='username' value='" . $staffdata['STAFFNAME'] . "'>
                <label for='email'>Email:</label>
                <input type='text' id='email' name='email' value='" . $staffdata['STAFFEMAIL'] . "'>
                <label for='address'>Salary (RM): </label>
                <input type='text' id='address' name='salary' value='" . $staffdata['SALARY'] . "'><br/>
                <label for='phone'>Staff type :</label><br/>
                <input type='text' id='phone' name='type' value='" . $staffdata['STAFFTYPE'] . "'>
                <label for='phone'>Supervisor ID :</label><br/>
                <input type='text' id='phone' name='sv' value='" . $staffdata['SUPERVISORID'] . "'>
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
        $salary = $_POST['salary'];
        $type = $_POST['type'];
        $sv = $_POST['sv'];
        
        // Prepare the update query
        $query = "UPDATE staff
                  SET staffName = :username, staffEmail = :email, salary = :salary,  stafftype= :type,supervisorId=:sv
                  WHERE staffid = :id";
                  
        // Prepare the statement
        $stmt = oci_parse($conn, $query);
        
        // Bind the parameters
        oci_bind_by_name($stmt, ":username", $username);
        oci_bind_by_name($stmt, ":email", $email);
        oci_bind_by_name($stmt, ":salary", $salary);
        oci_bind_by_name($stmt, ":type", $type);
        oci_bind_by_name($stmt, ":sv", $sv);
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