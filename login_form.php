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

if (!empty($_SESSION['email_login']) && !empty($_SESSION['pass_login'])) {
    header("Location: register.php");
}

if (isset($_POST["login"])) {
    $login_email = $_POST["cusEmail"];
    $login_pass = $_POST["cusPassword"];

    $query = "SELECT idCus, cusEmail, cusPassword
              FROM customer
              WHERE cusEmail = :login_email
              AND cusPassword = :login_pass";

    $stmt = oci_parse($conn, $query);
    oci_bind_by_name($stmt, ":login_email", $login_email);
    oci_bind_by_name($stmt, ":login_pass", $login_pass);
    oci_execute($stmt);

    $data = oci_fetch_assoc($stmt);
    
        if ($data !== false) {
            header("Location: home.php");
            $_SESSION["email_login"] = $login_email;
            $_SESSION["pass_login"] = $login_pass;
            $_SESSION["id_login"] = $data['IDCUS'];
        } else {
            echo '<script>
                    $(document).ready(function(){
                        $(".notregister").show();
                    });
                </script>';
        }
        
        oci_free_statement($stmt);
    }
    
    oci_close($conn);

    
        
        /*$query = "SELECT idCus, cusEmail, cusPassword
                FROM customer
                WHERE cusEmail = '$login_email'
                AND cusPassword = '$login_pass'";
        
        $sendsql = mysqli_query($connect, $query);
        
        $data = mysqli_fetch_array($sendsql);
        
        if(mysqli_num_rows($sendsql) != 0){
            header("Location: home.php");
            $_SESSION["email_login"] = $login_email;
            $_SESSION["pass_login"] = $login_pass;
            $_SESSION["id_login"] = $data['idCus'];
        }
        else{
            echo 
            '<script>
                $(document).ready(function(){
                    $(".notregister").show();
                });
            </script>
            '
            ;*/
        
        
        
    
?>