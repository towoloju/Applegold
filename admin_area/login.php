<?php
    session_start();
    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
  

</head>
<body>
    <div class="container">
        <form action="" method="post" class="form-login">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" placeholder="Email Address" name="admin_email" class="form-control" required>
            <input type="password" placeholder="Password" name="admin_pass" class="form-control" required>

            <button class="btn btn-lg btn-primary btn-block" name="admin_login" type="submit">Login</button>

        </form>
    </div>


    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>

<script>
    function welcomeAdmin(){
        Swal.fire({
            title: 'Welcome',
            text: 'Welcome Admin',
            icon: 'success'
        }).then(function(){
            window.location = 'index.php?dashboard'
        });
        
    }
    function Invalid(){
        Swal.fire({
            title: 'Oops...',
            icon: 'error',
            text: 'Invalid email and password'
        })
    }

</script>

</body>

</html>


<?php

    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

        $admin_pass= mysqli_real_escape_string($con, $_POST['admin_pass']);

        $get_admin ="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

        $run_admin = mysqli_query($con, $get_admin);

        $count = mysqli_num_rows($run_admin);

        if($count==1){
            $_SESSION['admin_email']=$admin_email;

            echo "<script>
                    welcomeAdmin();
            </script>";

            //echo "<script>window.open('index.php?dashboard','_self')</script>";
                
              
        
        }else{
            echo "<script>
                   Invalid();
            </script>";

        }



    }
?>





                    

