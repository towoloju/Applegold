
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
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $db = mysqli_connect("localhost","root","","ag_store");
    $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    // $con = mysqli_connect('localhost','root','','ag_store');
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





