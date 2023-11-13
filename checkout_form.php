<?php
$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
$username = "onpoint";
$password = "system";

$conn = oci_connect($username, $password, $db);
/*require 'connection.php';*/
    
// Checkout and save customer info in the orders table
if (isset($_POST['orders'])) {
  $name = $_POST['cusName'];
  $email = $_POST['cusEmail'];
  $phone = $_POST['cusNumPhone'];
  $products = $_POST['products'];
  $grand_total = $_POST['grand_total'];
  $address = $_POST['cusAddress'];
  $pmode = $_POST['payment'];
  $cartid = $_POST['cartid'];
  $cust_id = $_POST["custid"];
  echo intval($cartid);

  $data = '';

  $request = "INSERT INTO orders (ORDERName, ORDEREmail, ORDERNumPhone, ORDERAddress, payment, products, grand_total,orderid, cartid )
              VALUES (:name, :email, :phone, :address, :pmode, :products, :grand_total,ORDERID_SEQUENCE.NEXTVAL, :cartid)";
  $stmt = oci_parse($conn, $request);
  oci_bind_by_name($stmt, ":name", $name);
  oci_bind_by_name($stmt, ":email", $email);
  oci_bind_by_name($stmt, ":phone", $phone);
  oci_bind_by_name($stmt, ":address", $address);
  oci_bind_by_name($stmt, ":pmode", $pmode);
  oci_bind_by_name($stmt, ":products", $products);
  oci_bind_by_name($stmt, ":grand_total", $grand_total);
  oci_bind_by_name($stmt, ":cartid", $cartid);
  oci_execute($stmt);

  // if ($stmt) {
    
  //   $query = "DELETE FROM cart WHERE idCus = $cust_id";
  //       $stmts = oci_parse($conn, $query);
  //       oci_execute($stmts);
    echo '
      <script>
        alert("You have successfully ordered!");
      </script>
    ';

    $data .= '<center><div class="cart-details" style="background-color:whitesmoke; width: 35%;
      border: 0px solid black;
      margin: auto auto;
      padding: 0 1em;
      padding-bottom: 1em;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    ">
      <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
      <h2 class="text-success">Your Order Placed Successfully!</h2>
      <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
      <h4>Your Name : ' . $name . '</h4>
      <h4>Your E-mail : ' . $email . '</h4>
      <h4>Your Phone : ' . $phone . '</h4>
      <h4>Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
      <h4>Payment Mode : ' . $pmode . '</h4>
      <a href="home.php" name="homecart" class="btn">Go to home</a></center>
    </div>';
    echo $data;
  } else {
    echo "Query failed!";
  }

?>
