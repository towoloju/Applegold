<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row " style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Insert Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>  Insert Category </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="cat_title">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Category Image </label>
                        <div class="col-md-6">
                            <input type="file" name="cat_image" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Choose as Top Category</label>
                        <div class="col-md-6">
                            <input type="radio"  required name="cat_top" value="yes">
                            <label> Yes</label>

                            <input type="radio"  required name="cat_top" value="no">
                            <label> No</label>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Category" class="form-control btn btn-primary">

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
        function CatSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Category inserted successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_cats'
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

        $cat_title = $_POST['cat_title'];

        $cat_top= $_POST['cat_top'];

        $cat_image = $_FILES['cat_image']['name'];

        $temp_name = $_FILES['cat_image']['tmp_name'];

        move_uploaded_file($temp_name,"category_images/$cat_image");

        $insert_cat = "insert into categories (category_title, cat_top, cat_image) values ('$cat_title','$cat_top','$cat_image')";

        $run_cat = mysqli_query($con,$insert_cat);

        if($run_cat){
            echo "<script> CatSuccess(); </script>";

        }else{
            echo "<script> error();</script>";

        }



    }
?>




<?php

    }
?>