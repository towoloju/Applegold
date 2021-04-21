<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>

<?php

    if(isset($_GET['edit_box'])){

        $edit_box_id = $_GET['edit_box'];

        $edit_box = "select * from boxes where box_id='$edit_box_id'";

        $run_edit_box = mysqli_query($con,$edit_box);

        $row_edit_box = mysqli_fetch_array($run_edit_box);

        $box_id = $row_edit_box['box_id'];

        $box_title = $row_edit_box['box_title'];

        $box_image = $row_edit_box['box_image'];

        $box_desc = $row_edit_box['box_desc'];

        $box_url = $row_edit_box['box_url'];






    }

?>

<div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Product Options
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>  Edit Product Options </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_title" value="<?php echo $box_title; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Image </label>
                        <div class="col-md-6">
                            <input type="file" name="box_image" class="form-control">

                            <br>
                            <img src="../images/<?php echo $box_image;?>" alt="<?php echo $box_title;?>" class="img-responsive">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option Description</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_desc" value="<?php echo $box_desc; ?>">

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Option URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="box_url" value="<?php echo $box_url; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Update Product Option" class="btn btn-primary form-control">

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
        function boxUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Product option updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_boxes'
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

        $box_title = $_POST['box_title'];

        $box_image = $_FILES['box_image']['name'];

        $temp_name = $_FILES['box_image']['tmp_name'];

        $box_desc = $_POST['box_desc'];

        $box_url = $_POST['box_url'];


        if(is_uploaded_file($_FILES['box_image']['tmp_name'])){

            $box_image = $_FILES['box_image']['name'];

            $temp_name = $_FILES['box_image']['tmp_name'];

            $update_box = "update boxes set box_title='$box_title ', box_image='$box_image', box_desc='$box_desc', box_url='$box_url'  where box_id=$box_id";

            $run_update_box = mysqli_query($con,$update_box);

            if($run_update_box){
                    echo "<script> boxUpdate(); </script>";
                }else{
                    echo"<script> error(); </script>";
                }


        }else{
            $update_box = "update boxes set box_title='$box_title ', box_desc='$box_desc', box_url='$box_url'  where box_id=$box_id";

            $run_update_box = mysqli_query($con,$update_box);

            if($run_update_box){

                 echo "<script> boxUpdate(); </script>";
                }else{
                    echo"<script> error(); </script>";
                }
        }

        
    }

?>




<?php

    }
?>