<?php

			

			$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
			$username = "onpoint";
			$password = "system";
			
			$conn = oci_connect($username, $password, $db);
			
			if (!$conn) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			} else if (isset($_POST["signup"])) {
				$cusEmail = $_POST["cusEmail"];
				$cusPassword = $_POST["cusPassword"];
				$cusName = $_POST["cusName"];
				$cusAddress = $_POST["cusAddress"];
				$cusNumPhone = $_POST["cusNumPhone"];
				$cusDOB = $_POST["cusDOB"];


				// Convert cusDOB to the desired date format
				$cusDOBFormatted = date("d-M-Y", strtotime($cusDOB));
			
				$sql = "INSERT INTO customer (idCus, cusEmail, cusPassword, cusName,cusAddress, cusNumPhone, cusDOB)
						VALUES (CUSTOMER_SEQUENCE.NEXTVAL, :cusEmail, :cusPassword, :cusName,:cusAddress, :cusNumPhone, :cusDOB)";
			
				$stmt = oci_parse($conn, $sql);
				oci_bind_by_name($stmt, ":cusEmail", $cusEmail);
				oci_bind_by_name($stmt, ":cusPassword", $cusPassword);
				oci_bind_by_name($stmt, ":cusName", $cusName);
				oci_bind_by_name($stmt, ":cusAddress", $cusAddress);
				oci_bind_by_name($stmt, ":cusNumPhone", $cusNumPhone);
				oci_bind_by_name($stmt, ":cusDOB", $cusDOBFormatted);
				oci_execute($stmt);
			
				$rowsAffected = oci_num_rows($stmt);
				if ($rowsAffected > 0) {
					echo '
						<script>
							alert("You have successfully registered!");
						</script>
					';
					header("Location: register.php");
					exit(); // Add this to prevent further execution of the script
				} else {
					echo "Query failed!";
				}
			
				oci_free_statement($stmt);
					/*$sendsql = mysqli_query($connect, $sql);
					
					if($sendsql){
						echo 
						'
							<script>
								alert("You have successfully registered!");
							</script>
						';
						header("Location: register.php");
					}
					else{
						echo "Query failed!";
					}
				*/
			}
			oci_close($conn);
		?>