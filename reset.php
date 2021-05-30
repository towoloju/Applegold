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
</head>
<body>
    <div class="col-md-9">
        <div class="form-reset-container">
            <h4>Password Reset</h4>
            <p>An email will be sent to you with instructions on how to reset your password</p>
            <form action="reset-request.php" method="post">
                <input type="email" name="email" placeholder="Email Address" class="form-control" id="">
                <input type="submit" value="Receive new password by mail" name="reset-request" class="btn btn-primary">
           </form>
        </div>
      
    </div>
</body>
</html>
<?php
    include('includes/footer.php')
?>