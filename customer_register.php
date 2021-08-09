<?php
 $active='Account';
    include("includes/header.php");

    require('PHPMailer/PHPMailerAutoload.php');
    require('credentials.php');

    $error= NULL;

?>



    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Sign Up</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->



         


            <div class="col-md-12"> <!----col-md-9 begins--> 
                <div class="box"> <!----box begins--> 
                    <div class="box-header"> <!----box-header begins--> 
                        <center>
                            <h1 class="form-head">Create a new account</h1>
                            <div class="alert alert-warning alert-dismissible fade show">
                            <strong>Info</strong> Please fill all fields before submitting
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        </center>



                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                            <div class="main-container">
                                <div class="form-container">
                                    <input type ="file" class="control form-height-custom"  name="c_image" placeholder="Upload Picture">
                                    <input type ="text" class="control"  name ="firstname" placeholder= "First Name" required>
                                    <input type ="text" class="control"  name="lastname" placeholder="Last Name" required>
                                    <input type="email" class="control"  name ="email" placeholder ="Email Address" required>
                                    <input type="tel" id="phone" name="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br><br>
                                    <small>Format: 123-45-678</small><br><br>
                                    <input type ="text" class="control" name="address" placeholder="Address" required>
                                    <input type ="text" class="control"  name="region" placeholder="Region/State" required>
                                    <input type ="text" class="control"  name="postalcode" placeholder="Postal Code">
                                    <input type="password" class="control"  name ="password" placeholder="Password" required>
                                    <input type="password" class="control"  name ="confirmpassword" placeholder="Confirm Password" required>
                                    <?php
                                        echo $error;
                                    ?>
                                    <button name="register" value="Sign Up" class="btn btn-primary btn-signup">
                                        <i class="fa fa-user-md"></i> Sign Up
                                    </button>
                                    <div class="alternate">
                                        <a href="checkout.php" class="signin-link">Already have an account? Sign In</a>
                                    </div>
                                  
                                    
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

if(isset($_POST['register'])){

      
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_firstname = $_POST['firstname']; 
    $c_lastname = $_POST['lastname'];
    $c_email = $_POST['email'];
    $c_phonenumber = $_POST['phonenumber'];
    $c_address = $_POST['address'];
    $c_region = $_POST['region'];
    $c_postalcode = $_POST['postalcode'];
    $c_password = sha1($_POST['password']);
    $confirm_password = $_POST['confirmpassword'];
    $token = md5(rand(10000,99999));
    $verified = "inactive";
    $c_ip = getRealIpUser();

    move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");

    if($c_password !== $confirm_password){
        $error = "<p style='color : red';>Passwords dont match</p>";
    }else{
        $insert_customer = "insert into customer (profile_image,first_name,last_name,email,phone_number,address,region,postal_code,password,customer_ip,verified,token) 
        values ('$c_image','$c_firstname',' $c_lastname','$c_email','$c_phonenumber','$c_address','$c_region','$c_postalcode','$c_password','$c_ip','$verified','$token')";
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


        $run_customer = mysqli_query($con,$insert_customer);

        $last_id = mysqli_insert_id($con);

        $url = 'http://'.$_SERVER['SERVER_NAME'].'/AGconsult/verify.php?id='.$last_id.'&token='.$token;
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
            //$mail->SMTPDebug = SMTP::DEBUG_CONNECTION;  
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
                    
                    $sel_cart = "select * from cart where ip_add='$c_ip'";

                    $run_cart = mysqli_query($con,$sel_cart);

                    $check_cart = mysqli_num_rows($run_cart);

                    if($check_cart>0){

                        $_SESSION['email'] = $c_email;

                        echo "<script>alert('Registration Successful.  We've sent an activation link to  " .$c_email.  "')</script>";

                        echo "<script>window.open('checkout.php','_self')</script>";
                    }else{
                        //When users register without items in cart
                        $_SESSION['email'] = $c_email;

                        echo "<script>alert('Registration Successful. We've sent an activation link to  " .$c_email.  "')</script>";

                        echo "<script>window.open('index.php','_self')</script>";
                    }
                  
                }
        }
                

   

    
}}

?>