<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

?>

<?php

        if(isset($_GET['edit_p_cat'])){
         

             $edit_p_cat_id = $_GET['edit_p_cat'];

             $edit_p_cat = "select * from product_category where p_category_id='$edit_p_cat_id'";

             $run_edit= mysqli_query($con,$edit_p_cat);

             $row_edit = mysqli_fetch_array($run_edit);

             $p_cat_id = $row_edit['p_category_id'];

             $p_cat_title = $row_edit['p_category_title'];

            $p_cat_top= $row_edit['p_cat_top'];

            $p_cat_image= $row_edit['p_cat_image'];


        }
?>




<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Edit Product Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>  Edit Product Category </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">Product Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="<?php echo $p_cat_title; ?>" name="p_cat_title" required>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Product Category Image </label>
                        <div class="col-md-6">
                            <input type="file" name="p_cat_image" class="form-control">

                            <br>
                            <img src="productcat_images/<?php echo $p_cat_image;?>" alt="<?php echo $p_cat_title;?>" class="img-responsive">


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Choose as Top Product Category</label>
                        <div class="col-md-6">
                            <input type="radio"  required name="p_cat_top" value="yes"
                                <?php
                                     if($p_cat_top=='no'){}else{
                                        echo" checked='checked'";
                                    }
                                ?>
                            >
                            <label> Yes</label>

                            <input type="radio"  required name="p_cat_top" value="no"
                                <?php
                                    if($p_cat_top=='no'){echo" checked='checked'";}
                                ?>
                            >
                            <label> No</label>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="update" value=" Edit Product Category"class="form-control btn btn-primary">

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
        function proCatUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Product category updated successfully',
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

<?php
    if(isset($_POST['update'])){

        $p_cat_title = $_POST['p_cat_title'];

        $p_cat_top= $_POST['p_cat_top'];

        if(is_uploaded_file($_FILES['p_cat_image']['tmp_name'])){

            $p_cat_image = $_FILES['p_cat_image']['name'];
      
            $temp_name = $_FILES['p_cat_image']['tmp_name'];

      
            $update_p_cat = "update product_category set p_category_title='$p_cat_title', p_cat_top='$p_cat_top', p_cat_image='$p_cat_image' where p_category_id='$p_cat_id'";
    
            $run_p_cat= mysqli_query($con, $update_p_cat);
    
                if($run_p_cat){
                    echo "<script> proCatUpdate(); </script>";
        
                }else{
                    echo"<script> error(); </script>";
                }

        }else{
            $update_p_cat = "update product_category set p_category_title='$p_cat_title', p_cat_top='$p_cat_top' where p_category_id='$p_cat_id'";
    
            $run_p_cat= mysqli_query($con, $update_p_cat);
    
            if($run_p_cat){
                echo "<script> proCatUpdate(); </script>";
    
            }else{
                echo"<script> error(); </script>";
            }
        }


    }
?>




<?php

    }
?>