<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Insert Slide
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-gear fa-fw"></i>  Insert Slide </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

                
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_name">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Image </label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_title">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Caption</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_caption">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Link</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_link">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_url">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Slide" class="btn btn-primary form-control">

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
        function slideSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Slide inserted successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_slides'
            });
    
        }


        function slideMax(){
            Swal.fire({
                title: 'Oops',
                text: 'You have reached the amount of slides to be inserted',
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

        $slide_name = $_POST['slide_name'];

        $slide_image = $_FILES['slide_image']['name'];

        $temp_name = $_FILES['slide_image']['tmp_name'];

        $slide_title = $_POST['slide_title'];

        $slide_caption = $_POST['slide_caption'];

        $slide_link = $_POST['slide_link'];

        $slide_url = $_POST['slide_url'];

        $view_slides = "select * from slider";

        $run_view_slide =  mysqli_query($con,$view_slides);

        $count = mysqli_num_rows($run_view_slide);

        if($count<4){

            move_uploaded_file($temp_name,"slide_images/$slide_image");

            $insert_slide = "insert into slider (slide_name, slide_image, slide_title, slide_caption, slide_link, slide_url) values ('$slide_name','$slide_image','$slide_title','$slide_caption','$slide_link', '$slide_url')";

            $run_slide = mysqli_query($con,$insert_slide);

            if($run_slide){

                echo "<script> slideSuccess(); </script>";
            }else{
                echo "<script> error(); </script>";

            }

        }else{
            echo "<script> slideMax();</script>";

        }







    }
?>




<?php

    }
?>