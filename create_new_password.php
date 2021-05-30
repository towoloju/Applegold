<?php
    include ('includes/header.php');
   

?>
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

        function error(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Could not validate your request.',
                
            })
        }
    </script>
</head>
<body>
    <div class="col-md-9">
        <div class="form-reset-container">
        <?php
            //check if token is in db
            $selector = $_GET['selector']; //from url
            $validator = $_GET['validator'];

            if(empty($selector) || empty($validator)){
                 echo " <script> error(); </script>";
            }else{
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){ //check if the hexdacimal format is valid
                ?>

                <form action="reset_password.php" method="post">
                    <input type="hidden" name = "selector" value = "<?php echo $selector; ?>">
                    <input type="hidden" name = "validator" value = "<?php echo $validator; ?>">
                    <input type="password" name = "pwd" class="form-control" placeholder = " New password">
                    <input type="password" name = "pwd_confirm" class="form-control" placeholder = " Confirm New Password">
                    <input type="submit" value="Reset Password" name="reset_password_submit" class="btn btn-primary">
                </form>

                <?php
                }
            }
        ?>
           
        </div>
      
    </div>
</body>
</html>




<?php
    include('includes/footer.php')
?>