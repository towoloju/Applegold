<?php
    $active="Cart";
    session_start();


    include("includes/db.php");
    include_once("functions/functions.php");
    require('PHPMailer/PHPMailerAutoload.php');
    require('credentials.php');

  
?>

<body>


 
    <!----Top menu-->
    <div id="top"><!---Begin Top-->
        <div class="container"><!---Begin Container-->

            <div class="col-md-6 offer"><!---Begin Offer col md-6-->   
                <a href="#" class="btn btn-warning btn-sm userid">

                    <?php
                        if(!isset($_SESSION['email'])){
                            echo" Welcome: Guest";
                        }else{
                            echo "Welcome: " . $_SESSION['email'] . "";
                        }
                    ?>
                </a>  
                <form class="navbar-form navbar-left form  navbar-collapse collapse" id="search">
                    <div class="input-group">
                        <input type="text" class="control" aria-label="..." placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-info btn-top"  type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
           


            </div><!---End Offer col md-6-->
              

            <div class="col-md-6"><!---Begin-->
                <ul class="menu"><!---Menu Begin-->

                    <li>
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
                        //  $con = mysqli_connect("localhost", "root", "", "ag_store");
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
                                                <a href="customer/change_p.php" class="btn btn-danger btn-reset">
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

    
  


    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Cart</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->

            <div id="cart" class="col-md-9"> <!----col-md-9 begins-->
            
                <div class="box"> <!----box begins-->
                    <form action="cart.php" method="post" enctype="multipart/form-data"> <!----form begins-->
                    
                        <h1>Shopping Cart</h1>
                        <?php

                        //Connecting the cart to shop
                        $ip_add = getRealIpUser();

                        $connect_cart = "select * from cart where ip_add='$ip_add'";

                        $run_cart = mysqli_query($con,$connect_cart);

                        $count = mysqli_num_rows($run_cart);

                        ?>

                        <p class="text-muted">You have <?php echo $count; ?> item(s) in your cart</p>

                        <div class="table-responsive"> <!----table-responsive begins-->
                            <table class="table table-hover"> <!----table begins-->
                                <thead> <!----thread begins-->
                                    <tr> <!----tr begins-->
                                        <th>Product</th>
                                        <th class="model" >Model</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th >Sub-Total</th>                                            
                                       <th >Delete</th>
                                    </tr> <!----tr ends-->
                                
                                
                                </thead> <!----thread ends-->

                                <tbody> <!----tbody begins-->
                                <?php
                                
                                    $total = 0;

                                    while($row_cart = mysqli_fetch_array($run_cart)){

                                        $pro_id = $row_cart['p_id'];

                                        $pro_model = $row_cart['model'];

                                        $pro_quantity = $row_cart['quantity'];

                                        $pro_sale = $row_cart['price'];

                                        $get_product = "select * from product where product_id='$pro_id'";

                                        $run_product = mysqli_query($con,$get_product);

                                        while ($row_products = mysqli_fetch_array($run_product)){

                                            $product_title = $row_products['product_title'];

                                            $product_img1 = $row_products['product_img1'];

                                            $only_price = $row_products['product_price'];

                                            $sub_total = $pro_sale*$pro_quantity;

                                            $_SESSION['pro_qty'] = $pro_quantity;

                                            $total += $sub_total;                                       

                                ?>
                                    <tr>  <!----tr begins-->
                                        <td>

                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product img">
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                                        </td>
                                        <td>

                                        <?php echo $pro_model ?> 

                                        </td>
                                        <td>

                                        &#8358;   <?php echo $pro_sale; ?> 

                                        </td>


                                        <td>   
                                            <input type='text' name='p_quantity' class='form-control input-number quantity' data_product_id='<?php echo $pro_id?>' value="<?php echo $_SESSION['pro_qty']; ?>">
                              
                                        </td>


                                        <td>

                                        &#8358;  <?php echo $sub_total; ?>

                                        </td>
                                        <td>

                                        <input type="checkbox" name="remove[]" value="<?php  echo $pro_id ;?>">

                                        </td>
                                      
                                         
                                    
                                    </tr>  <!----tr ends-->


                                    <?php
                                    
                                    }
                                
                                } 
                                    
                                    ?>

                                </tbody> <!----tbody ends-->

                                

                            

                                <tfoot>
                                
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th colspan="3" class="totalp"> &#8358; <?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                        
                            </table> <!----table ends-->                  
                        </div> <!----table-responsive ends-->

                        <div class="box-footer"> <!----box-footer begins-->

                            <div class="pull-left"> <!----pull-left begins-->
                                <a href="shop.php" class="btn btn-primary"> 
                                    <i class=" fa fa-chevron-left"> Continue Shopping</i>
                                </a> 
                            </div> <!----pull-left ends-->

                            <div class="pull-right"> <!----pull-right begins-->
                                <button type="submit" value="Update Cart" name="update" class="btn btn-default"> 
                                    <i class="fa fa-refresh"> Update Cart</i>
                                </button> 

                                <a href="checkout.php" class="btn btn-success">
                                Proceed to checkout <i class="fa fa-play"></i>
                                </a>
                            </div> <!----pull-right ends-->
                    
                        </div> <!----box-footer ends-->
     

                    </form> <!----form ends-->               
                </div> <!----box ends-->
                

                <?php
                
                    function update_cart(){
                        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                     $cleardb_server = $cleardb_url["host"];
                     $cleardb_username = $cleardb_url["user"];
                     $cleardb_password = $cleardb_url["pass"];
                     $cleardb_db = substr($cleardb_url["path"],1);
                     $active_group = 'default';
                     $query_builder = TRUE;
                 
                     // $db = mysqli_connect("localhost","root","","ag_store");
                     $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
                        // $con = mysqli_connect("localhost", "root", "", "ag_store");
                       
                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from cart where p_id = '$remove_id'";

                                $run_delete = mysqli_query($con,$delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }


                        }
                    }


                    echo @$up_cart = update_cart();
                ?>

        <div id=""> 
            
            <h3 class="text-center detail-other">Products You May Like</h3>
        
            <?php

                $get_product = "select * from product order by rand() LIMIT 16,4";

                $run_product = mysqli_query($con,$get_product);

                while($row_products=mysqli_fetch_array($run_product)){
                    $pro_id = $row_products['product_id'];
                    $pro_title = $row_products['product_title'];
                    $pro_price = $row_products['product_price'];
                    $pro_img1 = $row_products['product_img1'];
                    $pro_img2 = $row_products['product_img2'];
        
                    echo "
                    
                    <div class='col-md-3 col-sm-6  col-container detail-col'>
                        <div class='product-grid'>
                            <div class='product-image'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                    <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                                </a>
                                <span class='product-trend-label'></span>
                                <span class='product-discount-label'></span>
                                <ul class='social'>
                                    <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                    <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                    <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
        
        
                                </ul>
                            </div>
        
                            <div class='product-content'>
                                <h3 class='title'>$pro_title</h3>
                                <div class='price'>
                                    <p class=''>  &#8358; $pro_price</p>
                                
                                </div>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
        
                    ";
                    
                }

            ?>
            
        </div> 

            </div> <!----col-md-9 ends-->

            <div class="col-md-3"> <!----col-md-3 begins-->
                <div id="order-summary" class="box"> <!----order-summary begins-->
                    <div class="box-header"> <!----box-header begins-->
                        <h5>Order Summary</h5>
                    </div> <!----box-header ends-->

                    <p class="text-muted">  <!----text-muted begins-->
                    Shipping and additional costs are calculated based on the value you have entered
                    </p>  <!----text-muted ends-->

                    <div class="table-responsive"> <!----table-responsive begins-->
                        <table class="table"> <!----table begins-->
                        
                            <tbody> <!----tbody begins-->
                                <tr>
                                    <td>Order All Sub-Total</td>
                                    <th>&#8358;  <?php echo $total;?></th>
                                </tr>

                                <tr>
                                    <td>Shipping and Handling</td>
                                    <th> &#8358;  0</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th> &#8358;  0</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>&#8358; <?php echo $total;?></th>
                                </tr>
                            </tbody> <!----tbody ends-->

                        </table> <!----table ends-->
                    </div> <!----table-responsive ends-->

                </div> <!----order-summary ends-->
            </div> <!----col-md-3 ends-->

        
        </div> <!----containerends-->
    </div> <!----content ends-->

   
    <?php

    include("admin_area/includes/footer.php");
    ?>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>

    <script>
        $(document).ready(function(data){
            $(document).on('keyup','.quantity',function(){

                var id = $(this).data("product_id");
                var quantity = $(this).val();

                if(quantity !=''){
                    $.ajax({

                        url = "change.php",
                        method = "POST",
                        data:{id:id, quantity:quantity},
                        success:function(){
                            $("body").load("cart_body.php");

                        }


                    })
                }

            });
        });
    
    </script>
</body>