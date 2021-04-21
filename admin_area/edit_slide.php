<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>

<?php

    if(isset($_GET['edit_slide'])){

        $edit_slide_id = $_GET['edit_slide'];

        $edit_slide = "select * from slider where slide_id='$edit_slide_id'";

        $run_edit_slide = mysqli_query($con,$edit_slide);

        $row_edit_slide = mysqli_fetch_array($run_edit_slide);

        $slide_id = $row_edit_slide['slide_id'];

        $slide_name = $row_edit_slide['slide_name'];

        $slide_image = $row_edit_slide['slide_image'];

        $slide_title = $row_edit_slide['slide_title'];

        $slide_caption = $row_edit_slide['slide_caption'];

        $slide_link = $row_edit_slide['slide_link'];

        $slide_url = $row_edit_slide['slide_url'];






    }

?>

<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Edit Slide
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>  Edit Slide </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_name" value="<?php echo $slide_name; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Image </label>
                        <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control">

                            <br>
                            <img src="slide_images/<?php echo $slide_image;?>" alt="<?php echo $slide_name;?>" class="img-responsive">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_title" value="<?php echo $slide_title; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Caption</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_caption" value="<?php echo $slide_caption; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide Link</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_link" value="<?php echo $slide_link; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Slide URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="slide_url" value="<?php echo $slide_url; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="update" value="Update Slide" class="btn btn-primary form-control">

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
        function slideUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Slide updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_slides'
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
    if(isset($_POST['update'])){

        $slide_name = $_POST['slide_name'];

        $slide_title = $_POST['slide_title'];

        $slide_caption = $_POST['slide_caption'];

        $slide_link = $_POST['slide_link'];

        $slide_url = $_POST['slide_url'];


        if(is_uploaded_file($_FILES['slide_image']['tmp_name'])){
            
            $slide_image = $_FILES['slide_image']['name'];

            $temp_name = $_FILES['slide_image']['tmp_name']; 
            
            $update_slide = "update slider set slide_name='$slide_name', slide_image='$slide_image', slide_title='$slide_title', slide_caption='$slide_caption', slide_link='$slide_link', slide_url='$slide_url'  where slide_id=$slide_id";

            $run_update_slide = mysqli_query($con,$update_slide);

            if($run_update_slide){
                echo "<script> slideUpdate(); </script>";
            }else{
                echo"<script> error(); </script>";
            }


        }else{
            $update_slide = "update slider set slide_name='$slide_name', slide_title='$slide_title', slide_caption='$slide_caption', slide_link='$slide_link', slide_url='$slide_url'  where slide_id=$slide_id";

            $run_update_slide = mysqli_query($con,$update_slide);

            if($run_update_slide){
                echo "<script> slideUpdate(); </script>";
            }else{
                echo"<script> error(); </script>";
            }
        }
    }
?>



<?php

    }
?>