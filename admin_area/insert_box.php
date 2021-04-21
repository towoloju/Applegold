<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Insert Product Options
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dropbox fa-fw"></i>  Insert Product Options </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_title">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Image </label>
                        <div class="col-md-6">
                            <input type="file" name="box_image" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_url">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_desc">

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">

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
        function boxSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Product options inserted successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_boxes'
            });
    
        }

        function optionMax(){
            Swal.fire({
                title: 'Oops',
                text: 'You have reached the amount of product options to be inserted',
                icon: 'info'
            })
        }


        function error(){
            Swal.fire({
                title: 'Oops',
                text: 'Something went wrong',
                icon: 'info'
            })
        }

    
    
    </script>

<?php
    if(isset($_POST['submit'])){

        $box_title = $_POST['box_title'];

        $box_image = $_FILES['box_image']['name'];

        $temp_name = $_FILES['box_image']['tmp_name'];

        $box_desc = $_POST['box_desc'];

        $box_url = $_POST['box_url'];

        $view_box = "select * from boxes";

        $run_view_box =  mysqli_query($con,$view_box);

        $count = mysqli_num_rows($run_view_box);

        if($count<5){

            move_uploaded_file($temp_name,"../images/$box_image");

            $insert_box = "insert into boxes (box_title, box_desc, box_url,box_image) values ('$box_title', '$box_desc','$box_url','$box_image')";

            $run_box = mysqli_query($con,$insert_box);

            if($run_box){

                echo "<script> boxSuccess(); </script>";

            }else{

                echo "<script> error(); </script>";

            }

        }else{
            echo "<script> optionMax(); </script>";

        }







    }
?>




<?php

    }
?>