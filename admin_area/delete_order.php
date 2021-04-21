<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >

        function orderDelete(){
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
                    'Order has been deleted',
                    'success'
                 
                    )
                }
            }).then(function(){
                window.location = 'index.php?view_orders'
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
    if(isset($_GET['delete_order'])){
        $delete_order_id = $_GET['delete_order'];

        $delete_order = "delete from pending_orders where order_id='$delete_order_id'";

        $run_delete = mysqli_query($con,$delete_order);

        if($run_delete){

            echo"<script> orderDelete(); </script>";

          


        }else{
            echo"<script> error(); </script>";

        }
    }
?>






<?php
    }
?>