    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
            function detele(){
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text: 'Your account has been deleted',
                    
                }) 
            }
    
    </script>


<?php
    $con = mysqli_connect("localhost", "root", "","ag_store");
    $delete ="DELETE from customer WHERE email = '$c_email'";
    $run_delete = mysqli_query($con, $delete);
    if($run_delete){
       session_destroy();
         echo "<script> delete(); </script>";
        
    }
?>
   
    

    <!-- <h1 align="center" class="delete-text">Do you really want to delete your account?</h1>
<form action="" method="post" class="form-button">
    <center>
    <input type="submit" name="yes" value="Yes, I want to delete" class="btn btn-danger">
    <input type="submit" name="no" value="No, I don't to delete" class="btn btn-primary">
    </center>
    
</form> -->

<?php
 //$c_email =$_SESSION['email'];
//  if(isset($_POST['yes'])){
//      $delete_customer = "delete from customer where email='$c_email'";
//      $run_delete_customer = mysqli_query($con,$delete_customer);
//      if($run_delete_customer){
//             echo "<script>delete();</script>";
//          session_destroy();
//          echo "<script>alert('Account deleted, sign up to create a new account')</script>";
//          echo "<script>window.open('../index.php','_self')</script>";

//      }
//  }
//  if(isset($_POST['no'])){
//     echo "<script>window.open('my_account.php?my_orders','_self')</script>";

//  }

?>


