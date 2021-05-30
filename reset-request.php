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
        function pwdReset(){
            Swal.fire({
                icon: 'success',
                title: 'Password Reset',
                text: 'We sent password reset instructions to your email, please check and reset your password.'
                })
        }

        function error(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong, please try again.',
                
            })
        }
    </script>
</head>
<body>
    
</body>
</html>
<?php
    if(isset($_POST['reset-request'])){
        //create a token
        $selector = bin2hex(random_bytes(8)); //8 bytes binary to hex

        $token = random_bytes(32); //authenticates the user

        $url = 'http://'.$_SERVER['SERVER_NAME'].'/applegold/create_new_password.php?selector=' . $selector . '&validator=' . bin2hex($token);

        $output = '<p>We received a password reset request.Find the link to reset your password below. If you did not make this resquest, please ignore this email </p>';
        $output .= '<p> Here is your password reset link : </br>';
        $output .= '<a href="' . $url . '">' . $url . '</a><p>';

        $expire = date("U") + 1800; 

        include('includes/db.php');
        require('PHPMailer/PHPMailerAutoload.php');
        require('credentials.php');

        $user_email = $_POST['email']; //email from form

        //To prevent multiple tokens, delete previous token from existing user
        $sql = "DELETE from pwd_reset WHERE pwd_reset_email=?";

        $stmt = mysqli_stmt_init($con); //initialize connectinon from db

        if(!mysqli_stmt_prepare($stmt, $sql)){

            echo "<script> error(); <script>";
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $user_email); //what the '?' should be replaced with before executing the statement ie string 's'

            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwd_reset (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expire) VALUES (?,?,?,?);";

        $stmt = mysqli_stmt_init($con); //initialize connectinon from db

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "<script> error(); <script>";
            exit();
        }else {
            $hashed_token = password_hash($token, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssss", $user_email, $selector, $hashed_token, $expire); //what the '?' should be replaced with before executing the statement ie string 's'

            $execute = mysqli_stmt_execute($stmt);
        } 

        mysqli_stmt_close($stmt);

        mysqli_close($con);


        if($execute==true){
                                            
                                    
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
            $mail->addAddress($user_email);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo(EMAIL, 'Apple & Gold');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
    
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
    
            
    
            $mail->Subject = 'Password Reset';
            $mail->Body    = $output;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo"
                            <script>
                            pwdReset();
                        </script>
                     
                        ";
                }
                   
                
                
        }
           



         
 

    }else{
        header('Location:index.php');
    }

?>