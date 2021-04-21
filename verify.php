
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
<?php
    $con = mysqli_connect('localhost','root','','ag_store');
    $customer_id = $_GET['customer_id'];
    $token = $_GET['token'];
    $update = "UPDATE customer SET verified = 'Active' WHERE customer_id = '$customer_id' AND token = '$token'";
    $result= mysqli_query ($con,$update);
    if($result){
        echo "  <script>
                    Verify();
                    
                </script>
        "; 
    }else{
        echo "<script>
                failedVerify();
            </script>"; 
    }
?>

</body>
</html>





