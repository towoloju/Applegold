<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
        function pwdUpdate(){
            Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your password has been reset, please login'
            }).then(function(){
                window.location ='index.php'
            })
        }

        function errorPwd(){
            Swal.fire({
                icon: 'error',
                text: 'Password do not match.',
            }).then(function(){
                window.location ='create_new_password.php'
            })
        }

        // function errorResubmit(){
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Oops...',
        //         text: 'You need to re-submit your request' 
        //     }).then(function(){
        //         window.location ='create_new_password.php'
        //     })
        // }

        function error(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Could not validate your request' 
            })
        }
    </script>
</head>
<body>
    
</body>
</html>
<?php
    if(isset($_POST['reset_password_submit'])){

        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $pwd = $_POST['pwd'];
        $pwd_repeat = $_POST['pwd_confirm'];

        if(empty($pwd) || empty($pwd_repeat)){
            header('Location: create_new_password.php');
            exit();
        }else if($pwd != $pwd_repeat){
            echo "<script> errorPwd(); </script>";
            exit(); 

        }


        $current_date = date("U");

        include('includes/db.php');

        $sql = "SELECT * FROM pwd_reset WHERE pwd_reset_selector = '$selector' AND pwd_reset_expire >= '$current_date'";

        $query = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($query);

        $pwd_email = $row['pwd_reset_email'];

        $get_customer = "SELECT FROM customer WHERE email = '$pwd_email' ";

        $query_c = mysqli_query($con, $get_customer);

        $update = "UPDATE customer SET password = '$pwd' WHERE email = '$pwd_email'";

        $run_update = mysqli_query($con, $update);

        if($run_update){
            echo "<script> pwdUpdate(); </script>";
        }else{
            echo "<script> error(); </script>";

        }


    }else{
        header('Location: index.php');
    }
    


?>