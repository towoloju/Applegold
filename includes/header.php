<?php
    session_start();
    

    include("includes/db.php");
    include("functions/functions.php");
    require('PHPMailer/PHPMailerAutoload.php');
    require('credentials.php');

  
?>

<?php
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];

        $get_product = "select * from product where product_id='$product_id'";
        
        $run_product = mysqli_query($con, $get_product);

        $row_products = mysqli_fetch_array($run_product);

        $p_category_id = $row_products['p_category_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price']/100;

        $pro_desc = $row_products['product_desc'];

        $pro_model = $row_products['product_model'];

        $pro_img1 = $row_products['product_img1'];

        $pro_img2 = $row_products['product_img2'];

        $pro_img3 = $row_products['product_img3'];

        $pro_label = $row_products['product_label'];

        $pro_oldprice = $row_products['old_price']/100;

        $pro_newprice = $row_products['new_price']/100;

        $pro_discount = $row_products['discount'];

        $get_p_category = "select * from product_category where p_category_id='$p_category_id'";

        $run_p_category = mysqli_query($con,$get_p_category);

        $row_p_category = mysqli_fetch_array($run_p_category);

        $p_category_title = $row_p_category['p_category_title'];
    };

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AG STORE</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/lightslider.css">
    <link rel="stylesheet" type="text/css" href="styles/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>   
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
        //SEARCH BAR

        function searchq(){
            //collect the value of the input field with .val()
            var searchText = $("input[name='search']").val();

            $.post("includes/search.php", {searchVal: searchText}, function(output){
                $("#output").html(output);  
            });
        }
    </script>
    

    
 
</head>
<body>


 
    <!----Top menu-->
    <div id="top"><!---Begin Top-->
        <div class="container"><!---Begin Container-->

            <div class="col-md-6 offer"><!---Begin Offer col md-6-->   
                <a href="#" class="btn btn-success btn-sm userid">

                    <?php
                        if(!isset($_SESSION['email'])){
                            echo" Welcome: Guest";
                        }else{
                            echo "Welcome: " . $_SESSION['email'] . "";
                        }
                    ?>
                </a>  
                <form class="navbar-form navbar-left form  navbar-collapse collapse " method="POST" action="header.php" id="search"> <!---instant search search-loading--->

                    <div class="input-group"> <!---input container-->
                        <input type="text" class="control search-input" name="search" onkeydown="searchq();" placeholder="Search mouse, keyboard..."> <!---search input-->
                        <!-- <div class="input-group-btn">
                            <button class="btn btn-info btn-top" name="submit"  type="submit"><i class="fa fa-search"></i></button>
                        </div> -->
                    </div>
                      
                    <div class="search-result-container" id="output">

                    </div>
               
                </form>
           


            </div><!---End Offer col md-6-->
              

            <div class="col-md-6"><!---Begin-->
                <ul class="menu"><!---Menu Begin-->

                    <li>
                    <?php
                         $con = mysqli_connect("localhost", "root", "", "ag_store");
                         $error= NULL;

                            if(isset($_POST['register'])){

                                
                                // $c_image = $_FILES['c_image']['name'];
                                // $c_image_tmp = $_FILES['c_image']['tmp_name'];
                                $c_firstname = $_POST['firstname']; 
                                $c_lastname = $_POST['lastname'];
                                $c_email = $_POST['email'];
                                // $c_phonenumber = $_POST['phonenumber'];
                                // $c_address = $_POST['address'];
                                // $c_region = $_POST['region'];
                                // $c_postalcode = $_POST['postalcode'];
                                $c_password = $_POST['password'];
                                $confirm_password = $_POST['confirmp'];
                                $token = md5(rand(10000,99999));
                                $verified = "inactive";
                                $c_ip = getRealIpUser();

                                // move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");

                                if($c_password !== $confirm_password){
                                    echo "
                                    <script>
                                        passWord(); 
                                    </script>
                                         
                                           
                                        ";
                                    //echo "<script>window.open('index.php','_self')</script>";
                                }else{
                                    $insert_customer = "insert into customer (first_name,last_name,email,password,customer_ip,verified,token) 
                                    values ('$c_firstname',' $c_lastname','$c_email','$c_password','$c_ip','$verified','$token')";

                                   


                                    $run_customer = mysqli_query($con,$insert_customer);

                                    $last_id = mysqli_insert_id($con);

                                    $url = 'http://'.$_SERVER['SERVER_NAME'].'/applegold/verify.php?customer_id='.$last_id.'&token='.$token;
                                    $output = '<div>Thanks for signing up, please click the link below to activate your account.' .$url. 
                                    '<br> This link would expire in 1 hour </div>';

                                    if($run_customer==true){
                                            
                                    
                                        date_default_timezone_set('Etc/UTC');
                                        $mail = new PHPMailer;
                                
                                        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
                                
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = 'smtp.gmail.com';
                                        // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = EMAIL;                 // SMTP username
                                        $mail->Password = PASSWORD;                           // SMTP password
                                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 465;  
                                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                                        // $mail->SMTPOptions = array(
                                        //     'ssl'=>array(
                                        //         'verify_peer'=> false,
                                        //         'verify_peer_name' => false,
                                        //         'allow_self_signed' => true
                                        //     )
                                        // );                              // TCP port to connect to
                                
                                        $mail->setFrom(EMAIL, 'Apple & Gold');
                                        $mail->addAddress($c_email, $c_lastname);     // Add a recipient
                                        // $mail->addAddress('ellen@example.com');               // Name is optional
                                        // $mail->addReplyTo('info@example.com', 'Information');
                                        // $mail->addCC('cc@example.com');
                                        // $mail->addBCC('bcc@example.com');
                                
                                        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                
                                        
                                
                                        $mail->Subject = 'Account Verification';
                                        $mail->Body    = $output;
                                        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                
                                            if(!$mail->send()) {
                                                echo 'Message could not be sent.';
                                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                                            } else {
                                                echo"
                                                        <script>
                                                        signUp(); 
                                                    </script>
                                                 
                                                    ";
                                            }
                                                // $sel_cart = "select * from cart where ip_add='$c_ip'";

                                                // $run_cart = mysqli_query($con,$sel_cart);

                                                // $check_cart = mysqli_num_rows($run_cart);

                                                // if($check_cart>0){

                                                //     $_SESSION['email'] = $c_email;

                                                //     echo "<script>alert('Registration Successful.  We've sent an activation link to  " .$c_email.  "')</script>";

                                                //     echo "<script>window.open('checkout.php','_self')</script>";
                                                // }else{
                                                //     //When users register without items in cart
                                                //     $_SESSION['email'] = $c_email;

                                                    // echo "<script>alert('Registration Successful. We've sent an activation link to  " .$c_email.  "')</script>";

                                                    // echo "<script>window.open('index.php','_self')</script>";
                                                
                                            
                                            
                                    }
                                            

                            

                                
                                }
                            }

                    ?>
                        <a href=""  data-toggle="modal" data-target="#exampleModalLong">Sign Up</a>

                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-signup">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hello! Create your account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="" enctype="multipart/form-data">                                       
                                            <div class="f-signin">
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <p><strong> Please fill all fields</strong></p>
                                                </div> 
                                                <input type ="text" class="fcontrol"  name ="firstname" placeholder= "First Name" required>
                                                <input type ="text" class="fcontrol"  name="lastname" placeholder="Last Name" required>
                                                <input type="email" class="fcontrol"  name ="email" placeholder ="Email Address" required>
                                                <input type="password" class="fcontrol"  name ="password" placeholder="Password" required>
                                                <input type="password" class="fcontrol"  name ="confirmp" placeholder="Confirm Password" required>

                                                <button name="register" value="Sign Up" class="btn btn-primary btn-signup">
                                                    <i class="fa fa-user-md"></i> Sign Up
                                                </button>
            
                                            </div>
                                            
                                                                
                                        </form>
                                    </div>
                              
                                </div>
                            </div>
                        </div>


                      

                   
                    </li>



                    <li>
                        <a href="customer/my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php"><i class="fa fa-shopping-cart cart-icon"><span class="badge"><?php items();?></span></i>Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                        
                        <?php

                            if(!isset($_SESSION['email'])){
                                
                                echo" <a href='' data-toggle='modal' data-target='#exampleModal'>Sign in</a> ";
                            }else{
                                //Once customer has signed in it should show Sign out
                                echo" <a href='customer/logout.php'>Sign Out</a> ";
                            }
                        
                        ?>

                        </a>


                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h2 class="modal-title">Welcome Back!</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                            
                                    <div class="modal-body">
                                        <form method="post" action="checkout.php" enctype="multipart/form-data">
                                            
                                            <div class="f-signin">
                                                <input type="email" class="fcontrol"  name ="email" placeholder ="Email Address" required>
                                                <input type="password" class="fcontrol"  name ="password" placeholder="Password" required>
                                                <button name="login" value="login" class="btn btn-primary btn-signup">
                                                    <i class="fa fa-sign-in"></i> Login
                                                </button>

                                                
                                            </div>
                                            <div class="reset">
                                                <p>Forgot Password?</p>
                                                <a href="reset.php" class="btn btn-danger btn-reset">
                                                    <i class="fa fa-key"></i> Reset Password
                                                </a> 
                                            </div>
                                                                
                                        </form>
                                    </div>

                                  
                            
                                </div>
                            </div>
                        </div>



                    </li>
                

                </ul><!---Menu End-->
            </div><!--- End-->
            
        </div><!---End container-->
    </div><!---End Top-->
    


    <div id="navbar" class="navbar navbar-default toggle"> <!---Navigation menu starts-->
        <div class="container"> <!---Container starts-->
            <div class="navbar-header"> <!---navbar headerstarts-->

                <a href="index.php" class="navbar-brand home"> <!----Navbar brand starts-->
                    <img src="images/mainlogo.jpg" alt="AG-logo" class="hidden-xs">
                    <img src="images/mobilelogo.jpg" alt="AG-logo Mobile" class="visible-xs"> 
                </a> <!----Navbar brand ends-->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-bars"></i>

                </button>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-search"></i>

                </button>
               
               

             
            </div><!----Navbar headerends-->

            <div class="navbar-collapse collapse nav-menu" id="navigation"> <!----Navbar collapse-->

                <div class="padding-nav"> <!---padding-nav begins---->

                    <ul class="nav navbar-nav left"> <!---nav nav-navbar left begins---->

                        <li class="<?php if($active=='Home') echo"active"; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>">
                            <a href="shop.php"> Shop</a>
                        </li> 
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            <?php
                                if(!isset($_SESSION['last_name'])){
                                    echo "<a href ='checkout.php'>My Account</a>";
                                }else{
                                    echo "<a href ='customer/my_account.php?my_orders'>My Account</a>";
 
                                }
                            
                            ?>
                        </li>
                        <li class="<?php if($active=='Cart') echo"active"; ?>">
                            <a href="cart.php"> Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo"active"; ?>">
                            <a href="contact.php"> Contact Us</a>
                        </li>


                    </ul> <!---nav nav-navbar left ends---->

                </div> <!---padding-nav ends---->

               

                

                

            </div> <!----Navbar collapse ends-->

        </div><!----container  ends-->

    </div><!----Navigation menu ends-->

    
 