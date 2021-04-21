<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{


?>

<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >

        function couponDelete(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                timer: 4000
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Coupon has been deleted',
                    'success'
                 
                    )
                }
            }).then(function(){
                window.location = 'index.php?view_coupons'
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
     if(isset($_GET['delete_coupon'])){

        $delete_id = $_GET['delete_coupon'];

        $delete_coupon = "delete from coupons where coupon_id='$delete_id'";

        $run_delete = mysqli_query($con,$delete_coupon);

        if($run_delete){
          

            echo"<script> couponDelete(); </script>";
    
    
    
        }else{
            echo"<script> error(); </script>";

        }
    }

?>


<?php
    }
?>