<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

?>

<?php

        if(isset($_GET['edit_cat'])){
         

             $edit_cat_id = $_GET['edit_cat'];

             $edit_cat = "select * from categories where category_id='$edit_cat_id'";

             $run_edit= mysqli_query($con,$edit_cat);

             $row_edit = mysqli_fetch_array($run_edit);

             $cat_id = $row_edit['category_id'];

             $cat_title = $row_edit['category_title'];

             $cat_image= $row_edit['cat_image'];

             $cat_top= $row_edit['cat_top'];


        }
?>

<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >
        function CatUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Category updated successfully',
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


<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Edit Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil fa-fw"></i>  Edit Category </h3>
            </div>


            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Category Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="<?php echo $cat_title; ?>" name="cat_title" required>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Category Image </label>
                        <div class="col-md-6">
                            <input type="file" name="cat_image" class="form-control">
                            <br>
                            <img src="category_images/<?php echo $cat_image;?>" alt="<?php echo $cat_title;?>" class="img-responsive">


                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"> Choose as Top Category</label>
                        <div class="col-md-6">
                            <input type="radio"  required name="cat_top" value="yes"
                                <?php
                                     if($cat_top=='no'){}else{
                                        echo" checked='checked'";
                                    }
                                ?>
                            >
                            <label> Yes</label>

                            <input type="radio"  required name="cat_top" value="no"
                                <?php
                                    if($cat_top=='no'){echo" checked='checked'";}
                                ?>
                            >
                            <label> No</label>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">
                             <input type="submit" name="update" value=" Edit Category"class="form-control btn btn-primary">

                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    if(isset($_POST['update'])){

        $cat_title = $_POST['cat_title'];

        $cat_top= $_POST['cat_top'];

        if(is_uploaded_file($_FILES['cat_image']['tmp_name'])){

            $cat_image = $_FILES['cat_image']['name'];
      
            $temp_name = $_FILES['cat_image']['tmp_name'];

            $update_cat = "update categories set category_title='$cat_title', cat_top='$cat_top', cat_image='$cat_image' where category_id='$cat_id'";
    
            $run_cat= mysqli_query($con,$update_cat);
    
            if($run_cat){
                echo "<script> CatUpdate(); </script>";
    
            }else{
                echo"<script> error(); </script>";
            }
        }else{
            $update_cat = "update categories set category_title='$cat_title', cat_top='$cat_top' where category_id='$cat_id'";
    
            $run_cat= mysqli_query($con,$update_cat);
    
            if($run_cat){
                echo "<script> CatUpdate(); </script>";
    
            }else{
                echo"<script> error(); </script>";
            }

        }

    }
?>




<?php

    }
?>