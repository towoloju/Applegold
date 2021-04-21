<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Insert Product Category
            </li>
        </ol>
    </div>
</div>

<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >
        function proCatSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Product category inserted successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_p_cats'
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



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>  Insert Product Category </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="p_cat_title">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Category Image </label>
                        <div class="col-md-6">
                            <input type="file" name="p_cat_image" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Choose as Top Product Category</label>
                        <div class="col-md-6">
                            <input type="radio"  required name="p_cat_top" value="yes">
                            <label> Yes</label>

                            <input type="radio"  required name="p_cat_top" value="no">
                            <label> No</label>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="submit" value="Insert Product Category" class="form-control btn btn-primary">

                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    if(isset($_POST['submit'])){

        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_image= $_POST['p_cat_image'];

        $p_cat_image = $_FILES['p_cat_image']['name'];

        $temp_name = $_FILES['p_cat_image']['tmp_name'];

        $p_cat_top= $_POST['p_cat_top'];

        move_uploaded_file($temp_name,"productcat_images/$p_cat_image");

        $insert_p_cat = "insert into product_category (p_category_title, p_cat_top, p_cat_image) values ('$p_cat_title','$p_cat_top','$p_cat_image')";

        $run_p_cat = mysqli_query($con,$insert_p_cat);

        if($run_p_cart){
            echo "<script> proCatSuccess(); </script>";

        }else{
            echo "<script> error();</script>";

        }



    }
?>




<?php

    }
?>