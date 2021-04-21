<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Insert Product Brand
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-star fa-fw"></i>  Insert Product Brand </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Brand Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="producer_name">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Brand Image </label>
                        <div class="col-md-6">
                            <input type="file" name="producer_image" class="form-control">

                        </div>
                    </div>

    

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Choose as Top Product Brand</label>
                        <div class="col-md-6">
                            <input type="radio"  required name="producer_top" value="yes">
                            <label> Yes</label>

                            <input type="radio"  required name="producer_top" value="no">
                            <label> No</label>

                        </div>

                    </div>

                    
                  


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Product Brand" class="btn btn-primary form-control">

                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >
        function brandSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Product brand inserted successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_brands'
            });
    
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
    if(isset($_POST['submit'])){ 

        $producer_title = $_POST['producer_name'];

        $producer_image = $_FILES['producer_image']['name'];

        $temp_name = $_FILES['producer_image']['tmp_name'];

        $producer_top = $_POST['producer_top'];

        move_uploaded_file($temp_name,"brand_images/$producer_image");

        $insert_producer = "insert into producer (producer_title, producer_top,producer_image ) values ('$producer_title','$producer_top','$producer_image')";

        $run_producer = mysqli_query($con,$insert_producer);

        if($run_producer){
            echo"<script> brandSuccess(); </script>";


        }else{
            echo"<script> error(); </script>";

        }







    }
?>




<?php

    }
?>