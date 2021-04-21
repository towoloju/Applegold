<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>


<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <script >

        function adminDelete(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete account!',
                timer: 4000
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Account has been deleted',
                    'success'
                 
                    )
                }
            }).then(function(){
                window.location = 'login.php'
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
    
     if(isset($_GET['delete_account'])){

        $delete_id = $_GET['delete_account'];

        $delete = "delete from admins where admin_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete);

        if($run_delete){

            echo"<script> adminDelete(); </script>";

        }else{
            echo"<script> error(); </script>";
        }


    }





?>

<?php } ?>
    
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>

      
    </script>


<?php
    $con = mysqli_connect("localhost", "root", "","ag_store");
    $delete ="DELETE from admins WHERE email = '$email'";
    $run_delete = mysqli_query($con, $delete);
    if($run_delete){
       session_destroy();
         echo "<script> adminDelete(); </script>";
        
    }
?>
   
    
