<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >

        function userDelete(){
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
                    'Account has been deleted',
                    'success'
                 
                    )
                }
            }).then(function(){
                window.location = 'index.php?view_users'
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
    if(isset($_GET['delete_user'])){
        $delete_c_id = $_GET['delete_user'];

        $delete_c = "delete from admins where admin_id='$delete_c_id'";

        $run_delete = mysqli_query($con,$delete_c);

        if($run_delete){

            echo"<script> userDelete(); </script>";

        }else{
            echo"<script> error(); </script>";

        }
    }
?>






<?php
    }
?>