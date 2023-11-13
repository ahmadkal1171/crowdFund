<!DOCTYPE html>
<html>
	<head>
		<title>RINGS</title>
		<link rel="icon" type="image/x-icon" href="media/RingsBlingsLogo-top.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
	</head>
	<body>
		<header>
		</header>
		
		<main class="product-container">
			<h1 style="text-align:center;margin:2em">RESULT</h1>
				<?php
					include "database_conf.php";
					
					if(isset($_POST['searchbutton'])){
						
						$searchvalue = $_POST['searchtext'];
					
						$query = "SELECT proId, prodImg, product_name, product_price, product_desc, product_type
								 FROM product
								 WHERE product_name = '$searchvalue'
								 OR product_type = '$searchvalue'";
								 
						$sql = mysqli_query($connect, $query);
						
						if($sql){
							echo "
								<div class='product-child'> ";
							while($prodarray = mysqli_fetch_assoc($sql)){
								echo 
								"
									<a href='product_view.php?product_ID=".$prodarray['product_ID']."' class='product-link' style='text-decoration: none; color: black;'>
										<div class='product-card'>
											<img src='".$prodarray['product_img']."' alt='rings picture'>
											<div class='prod-card-desc'>
												<h2>".$prodarray['product_name']."</h2>
												<h3>RM ".$prodarray['product_price']."</h3>
												<div id='product-card-desc'>".$prodarray['product_desc']."</div>
											</div>
										</div>
									</a>
								"
								;
							}
							echo "
							
								</div>";
						}
						else{
							
						}
					
					}
				?>
			
		</main>
		<footer>
		</footer>
	</body>
	<script>
		$("header").load("header_part.php");
		$("footer").load("footer_part.php");
	</script>
<html>