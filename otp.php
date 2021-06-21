    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >
        function confirmSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'A One Time Password (OTP) has been sent to your email, please confirm payment with your OTP',
                icon: 'success'
            })
    
        }

        function error(){
            Swal.fire({
                title: 'Oops ...',
                text: 'Something went wrong',
                icon: 'error'
            })
        }
    </script>
    
    <?php
        include('includes/header.php');
       


        if(!isset($_SESSION['email'])){
            echo "<script>window.open('index.php', '_self')</script>";

       
        }else{

            $ip_add = getRealIpUser();
            $c_email = $_SESSION['email'];
            $key = random_int(0, 9999999);
            $otp = str_pad($key, 6, 0, STR_PAD_LEFT);
            $output = '<h1>Order Confirmation OTP</h1>';
            $output .= '<p>Dear'    . $c_email . '</p>'; 
            $output .= '<p> Enter the  OTP given below to confirm your order:'  . $otp . '<p>';

            
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
            $mail->addAddress($c_email);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML



            $mail->Subject = 'Order Confirmation OTP ';
            $mail->Body    = $output;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
               

                $get_customer = "SELECT customer_id FROM customer WHERE email = '$c_email'";
                $run_customer = mysqli_query($con,$get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id = $row_customer['customer_id'];

                $insert_otp = "INSERT INTO otp_on_delivery (ip_add,customer_id,otp) VALUES ('$ip_add','$customer_id','$otp')";
                $run_insert = mysqli_query($con,$insert_otp);

                if($run_insert){
                    echo"
                    <script> confirmSuccess(); </script>
                    
                     ";
                }else{
                    echo " <script> error(); </script>";

                }

                
            }
        }
         
    ?>
