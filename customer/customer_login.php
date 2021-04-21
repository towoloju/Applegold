<!-- 
    <div class="box">

        <div class="box-header"> 
        
            <center> 
                <h1 class="form-head">Signin to your account</h1>
                <div class="alert alert-warning alert-dismissible fade show">
                <strong>Info</strong> Please fill all fields before submitting
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                
            </center> 
        
        

            <form action="checkout.php" method="post"> 
                <div class="main-container ">
                    <div class="form-container">
                        <input type="email" class="control"  name ="email" placeholder ="Email Address" required>
                        <input type="password" class="control"  name ="password" placeholder="Password" required>
                        <button name="login" value="login" class="btn btn-primary btn-signup">
                        <i class="fa fa-sign-in"></i> Login
                        </button>

                        <div class="alternate">
                        <a href="customer_register.php" class="signin-link">Don't have an account? Sign Up</a> 
                        </div>
                                
                    </div>
                </div>

                
                    
                
            </form>
            </div> 
    </div>  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
        function invalidDet(){
            Swal.fire({
                
                icon: 'error',
                text: 'Email and password do not match'
             })
            }
            function update(){
            Swal.fire({
                
                icon: 'info',
                text: 'Please edit and update your account'
             })
            }
    </script>

</head>
<body>
    
<?php

if(isset($_POST['login'])){

   

    $c_email = $_POST['email'];

    $c_password = $_POST['password'];
   
    $select_customer = "select * from customer where email='$c_email' AND password='$c_password'";

    $con = mysqli_connect("localhost", "root", "", "ag_store");

    $run_customer = mysqli_query($con,$select_customer);

    $check_customer = mysqli_num_rows($run_customer);

    $get_ip = getRealIpUser();


    $select_cart = "select * from cart where ip_add='$get_ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    $get_customer = "select * from customer where email='$c_email'";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $c_lastname = $row_customer['last_name'];

    if($check_customer==0){

        echo "<script>
                invalidDet();
            </script>";

       exit();

    }
 
    if($check_customer==1 AND $check_cart==0){

        $_SESSION['email'] = $c_email;
        
        echo "<script>window.open('customer/my_account.php?edit_account','_self')</script>";
    }else{
        $_SESSION['email'] = $c_email;
        echo "<script>window.open('checkout.php','_self')</script>";
    }

}

?>
</body>

<script src="js/bootstrap.min.js"></script>
</html>
  

   





