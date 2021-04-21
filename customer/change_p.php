
    

<h1 align="center" class="confirm-text">Change Password</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="main-container">
        <div class="form-confirm">
            <input type="password" class="control" id="password"  name ="oldpassword" placeholder="Old Password" required>
            <input type="password" class="control" id="password" name ="newpassword" placeholder="New Password" required>
            <input type="password" class="control" id="confirmpassword" name ="confirmpassword" placeholder="Confirm New Password" required>
            <button class="btn btn-primary btn-account" name="change_password">
                <i class="fa fa-user"></i> Update
            </button>     
        </div>
    </div>
</form>

<?php

    if(isset($_POST['change_password'])){

        $c_email = $_SESSION['email'];    

        $old_password = $_POST['oldpassword'];

        $new_password = $_POST['newpassword'];

        $select_old_p = "select * from customer where password='$old_password'";

        $run_old_p = mysqli_query($con,$select_old_p);

        $check_old_p = mysqli_fetch_array($run_old_p);

        if($check_old_p==0){

            echo" <script>alert('Sorry, your current password is not valid. Please try again')</script>";
            exit();
        }

        $update_password = "update customer set password='$new_password' where email='$c_email' ";

        $run_password = mysqli_query($con,$update_password);

        if($run_password){
            echo" <script>alert('Password updated Successfully')</script>";
            echo" <script>window.open('my_account.php?my_orders','_self')</script>";
        }

    }

?>

 