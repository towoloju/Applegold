<?php
 $active='Account';
    include("includes/header.php");
?>



    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Sign In</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->



            <div class="col-md-3"> <!----col-md-3 begins-->   

                <?php
                    include("admin_area/includes/sidebar.php");
                ?>
            </div> <!----col-md-3 ends-->


            <div class="col-md-9"> <!----col-md-9 begins--> 
                <div class="box"> <!----box begins--> 
                    <div class="box-header"> <!----box-header begins--> 
                        <center> <!--center begins-->
                            <h1>Login</h1>
                            <p class="lead">Already have an account?</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quos delectus incidunt, hic quae deserunt impedit soluta explicabo officiis necessitatibus possimus sequi expedita numquam 
                            aliquid eum dignissimos? Tempore, velit iste?</p>

                        </center> <!--center begins-->



                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                            <div class="main-container">
                                <div class="form-container">
                                    <input type="email" class="control"  name ="email" placeholder ="Email Address" required>
                                    <input type="password" class="control"  name ="password" placeholder="Password" required>
                                    <button name="login" value="Sign In" class="btn btn-primary btn-signup">
                                        <i class="fa fa-login"></i> Sign In
                                    </button>
                                    <center>
                                        <a href="custimer_register.php" class="signin-link">Don't have an account? Sign Up</a>
                                    </center>
                                  
                                    
                                </div>
                            </div>

                        </form>
                

                    </div> <!----box-header ends--> 
                </div> <!----box ends--> 
            </div> <!----col-md-9 ends--> 

        </div> <!----container ends-->
    </div> <!----content ends-->



            <?php
            include("admin_area/includes/footer.php");
            ?>




<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>


<?php

if(isset($_POST['login'])){

    $c_email = $_POST['email'];

    $c_password = $_POST['password'];
   
    $select_customer = "select * from customer where email='$c_email' AND password='$c_password'";

    $con = mysqli_connect("localhost", "root", "", "ag_store");

    $run_customer = mysqli_query($con,$select_customer);

    $get_ip = getRealIpUser();

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where ip_add='$get_ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){

        echo "<script>alert('Invalid email or password')</script>";

       exit();

    }
 
    if($check_customer==1 AND $check_cart==0){

        $_SESSION['last_name'] = $c_lastname;

        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }else{
        $_SESSION['last_name'] = $c_lastname;

        echo "<script>alert('You are logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }


   

}

?>