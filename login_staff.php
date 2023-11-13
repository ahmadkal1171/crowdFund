<?php
session_start();
$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=DESKTOP-HFLLK8G)(PORT=1521))(CONNECT_DATA=(SID=xe)))";
$username = "onpoint";
$password = "system";

$conn = oci_connect($username, $password, $db);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}



if (isset($_POST["loginstaff"])) {
    

    $login_email = $_POST["staffemail"];
    $login_pass = $_POST["staffpass"];

    $query = "SELECT staffid, staffemail, staffpass, stafftype
              FROM staff
              WHERE staffemail = :login_email
              AND staffpass = :login_pass";

    $stmt = oci_parse($conn, $query);
    oci_bind_by_name($stmt, ":login_email", $login_email);
    oci_bind_by_name($stmt, ":login_pass", $login_pass);
    oci_execute($stmt);

    echo "<script>alert($login_email)</script>";

    $data = oci_fetch_row($stmt);

    
    if ($data !== false) {
        $stafftype = $data[3];
        if($stafftype == 'STOCKIST'){
            header("Location: staffpro.php");
        }
        elseif($stafftype == 'PROMOTER'){
            header("Location: staffpro1.php");
        }
            
            $_SESSION["email_login"] = $login_email;
            $_SESSION["pass_login"] = $login_pass;
            $staffid = $data[0];
            $_SESSION["id_login"] = $staffid;
        // echo "<script>alert($staffid);</script>";
        exit; // Added to prevent further code execution
    } else {
        echo '<script>
                    $(document).ready(function(){
                        $(".notregister").show();
                    });
                </script>';
    }

    oci_free_statement($stmt);
}
else
echo "<script>alert('TAK KELUAR BODOH')</script>;";
// if (!empty($_SESSION['email_login']) && !empty($_SESSION['pass_login'])) {
//     header("Location: stafflogin.php");
//     exit; // Added to prevent further code execution
// }
oci_close($conn);


?>
