<?php
    $active="Cart";
    session_start();
    include("includes/db.php");
    include_once("functions/functions.php");
    require('PHPMailer/PHPMailerAutoload.php');
    require('credentials.php');

  
?>

<?php

    $ip_add = getRealIpUser();

    if(isset($_POST['id'])){

        $id = $_POST['id']; 

        $quantity = $_POST['quantity']; 

        $update_qty = "update cart set quantity='$quantity' where p_id='$id' AND ip_add='$ip_add'";
        
        $run_quantity = mysqli_query($con,$update_qty);
    }

?>