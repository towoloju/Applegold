<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

<?php
    if(isset($_GET['edit_product'])){

        $edit_id =$_GET['edit_product'];

        $get_p ="select * from product where product_id='$edit_id'";

        $run_edit = mysqli_query($con, $get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['product_id'];

        $p_cat_id = $row_edit['p_category_id'];

        $cat_id = $row_edit['category_id'];

        $producer_id = $row_edit['producer_id'];

        $p_title = $row_edit['product_title'];

        $pro_img1 = $row_edit['product_img1'];

        $pro_img2 = $row_edit['product_img2'];

        $pro_img3 = $row_edit['product_img3'];

        $cpro_img1 = $row_edit['cproduct_img1'];

        $cpro_img1 = $row_edit['cproduct_img2'];

        $cpro_img1 = $row_edit['cproduct_img3'];

        $p_oldp = $row_edit['old_price'];

        $p_newp = $row_edit['new_price'];

        $p_discount = $row_edit['discount'];

        $currency = $row_edit['currency'];

        $p_label = $row_edit['product_label'];

        $p_price = $row_edit['product_price'];

        $p_key = $row_edit['product_keywords'];

        $p_desc = $row_edit['product_desc'];

        $p_model = $row_edit['product_model'];

    }

    $get_p_title = "select * from producer where producer_id = '$producer_id'";

    $run_p = mysqli_query($con,$get_p_title);

    $row_p = mysqli_fetch_array($run_p);

    $producer_title = $row_p['producer_title'];


    $get_p_cat = "select * from product_category where p_category_id = '$p_cat_id'";

    $run_p_cat = mysqli_query($con,$get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_category_title'];



    $get_cat = "select * from categories where category_id = '$cat_id'";

    $run_cat = mysqli_query($con,$get_cat);

    $row_cat = mysqli_fetch_array($run_cat);

    $cat_title = $row_cat['category_title'];



?>

    
    <div class="row" style="margin-top:60px;"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <ol class="breadcrumb"> <!---breadcrumb begins-->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Product
                </li>
            </ol> <!---breadcrumb ends--->
        </div> <!--col-lg-12 ends-->
    </div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->
                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-pencil fa-fw"></i> Edit Product
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->



               
                <div class="panel-body">  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                      
                         
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Name </label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control"  value="<?php echo $p_title; ?>" required>

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Brand </label>
                            <div class="col-md-6">
                                <select name="producer" class="form-control">
                                    <option disabled value="Select Manufacturer">Select Manufacturer</option>
                                    <option selected value="<?php echo $producer_id; ?>"> <?php echo $producer_title;?></option>
                            
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "ag_store");

                                        $get_p = "select * from producer";
                                        $run_p = mysqli_query($con, $get_p);

                                        while($row_p = mysqli_fetch_array($run_p)){
                                            $pro_id = $row_p['producer_id'];
                                            $pro_title = $row_p['producer_title'];

                                            echo "
                                            
                                                <option value = '$pro_id'> $pro_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>

                            </div>
                        </div> 


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Category </label>
                            <div class="col-md-6">
                            
                                <select name="product_cat" class="form-control">
                                    <option disabled value="select product category">Select Product Category</option>

                                    <option selected value="<?php echo $p_cat_id?>"> <?php echo $p_cat_title;?></option>

                    

                                    
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "ag_store");

                                        $get_p_category = "select * from product_category";
                                        $run_p_category = mysqli_query($con, $get_p_category);

                                        while($row_p_category = mysqli_fetch_array($run_p_category)){
                                            $p_category_id = $row_p_category['p_category_id'];
                                            $p_category_title = $row_p_category['p_category_title'];

                                            echo "
                                            
                                                <option value = '$p_category_id'> $p_category_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Category </label>
                            <div class="col-md-6">
                                <select name="category" class="form-control">
                                    <option disabled value="select category">Select Category</option>

                                    <option selected value="<?php echo $cat_id?>"> <?php echo $cat_title;?></option>
                                    
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "ag_store");

                                        $get_category = "select * from categories";
                                        $run_category = mysqli_query($con, $get_category);

                                        while($row_category = mysqli_fetch_array($run_category)){
                                            $cat_id = $row_category['category_id'];
                                            $cat_title = $row_category['category_title'];

                                            echo "
                                            
                                                <option value ='$cat_id'>  $cat_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 1 </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img1" >
                                <br>
                                <img src="product_images/<?php echo $pro_img1; ?>" alt="" width="60" height="70">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 2 </label>
                            <div class="col-md-6">

                                <input type="file"  class="form-control" name="product_img2">   
                                <br>
                                <img src="product_images/<?php echo $pro_img2; ?>" alt="" width="60" height="70">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 3 </label>
                            <div class="col-md-6">
                                    
                                <input type="file" class="form-control" name="product_img3">
                                <br>
                                <img src="product_images/<?php echo $pro_img3; ?>" alt="" width="60" height="70">
                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 1 - Zoom  </label>
                            <div class="col-md-6">
                                        
                                <input type="file" class="form-control" name="cproduct_img1">
                                <br>
                                <img src="product_images/<?php echo $cpro_img1; ?>" alt=" Copy <?php echo $p_title?>" width="60" height="70">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 2 - Zoom  </label>
                            <div class="col-md-6">
                                        
                                <input type="file" class="form-control" name="cproduct_img2">  
                                <br>
                                <img src="product_images/<?php echo $cpro_img2; ?>" alt=" Copy <?php echo $p_title?>" width="60" height="70">
                            </div>
                        </div>
                            

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 3 - Zoom  </label>
                            <div class="col-md-6">

                                <input type="file"  class="form-control" name="cproduct_img3" value="<?php echo $cpro_img3; ?>">
                                <br>
                                <img src="product_images/<?php echo $cpro_img3; ?>" alt="Copy <?php echo $p_title?>" width="60" height="70">
                    
                            </div>
                        </div>
                            

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Model  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="product_model" value="<?php echo $p_model; ?>" required>

                            </div>
                        </div>  
                        


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Price  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control"  placeholder="Price*100"  name="product_price" value="<?php echo $p_price; ?>" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Old Price  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control"  placeholder="Price*100" name="old_price" value="<?php echo $p_oldp; ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product New Price  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" placeholder="Price*100" name="new_price" value="<?php echo $p_newp; ?>">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Discount  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="discount" value="<?php echo $p_discount; ?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Currency  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="currency" placeholder="usd"  value="<?php echo $currency; ?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Label  </label>
                            <div class="col-md-6">
                                <select name="label" class="form-control">
                                    <option  disabled>Select Product Label</option>
                                    <option selected value="<?php echo $p_label; ?>"> <?php echo $p_label;?></option>
                                    <option value ="new">New Product</option>
                                    <option value="sale">Product on Sale</option>
        

                                </select>
                            </div>
                        </div>


                                          
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Keywords  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="product_keywords" value="<?php echo $p_key; ?>" required>

                            </div>
                        </div>   


                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Description  </label>
                            <div class="col-md-6">

                                <textarea name="product_desc" cols="10" rows="5" class="form-control">
                                    <?php echo $p_desc; ?>
                                </textarea>
                            </div>
                        </div>  



                        <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-primary form-control" name="update" value="Edit Product">

                            </div>
                        </div>  
                    
    
                    </form>
                </div> <!--panel-body ends-->
                
               
            </div> <!--panel panel-default-->
        </div> <!--col-lg-12 ends-->
    </div> <!--row ends-->

   
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script >
        function proUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Product updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_products'
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
      $product_title = $_POST['product_title'];
      $producer_id =  $_POST['producer'];
      $product_cat = $_POST['product_cat'];
      $category = $_POST['category'];
      $product_price = $_POST['product_price'];
      $product_oldprice = $_POST['old_price'];
      $product_newprice = $_POST['new_price'];
      $product_discount = $_POST['discount'];
      $currency = $_POST['currency'];
      $product_label = $_POST['label'];
      $product_keywords = $_POST['product_keywords'];
      $product_desc = $_POST['product_desc'];
      $product_model = $_POST['product_model'];

      if(is_uploaded_file($_FILES['file']['tmp_name'])){

            //to change/upload product image

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");

        $cproduct_img1 = $_FILES['cproduct_img1']['name'];
        $cproduct_img2 = $_FILES['cproduct_img2']['name'];
        $cproduct_img3 = $_FILES['cproduct_img3']['name'];

        $ctemp_name1 = $_FILES['cproduct_img1']['tmp_name'];
        $ctemp_name2 = $_FILES['cproduct_img2']['tmp_name'];
        $ctemp_name3 = $_FILES['cproduct_img3']['tmp_name'];

        move_uploaded_file($ctemp_name1, "product_images/$cproduct_img1");
        move_uploaded_file($ctemp_name2, "product_images/$cproduct_img2");
        move_uploaded_file($ctemp_name3, "product_images/$cproduct_img3");

        $update_product = "update product set p_category_id='$product_cat', category_id='$category',producer_id='$producer_id', date=NOW(), product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', cproduct_img1='$cproduct_img1', cproduct_img2='$cproduct_img2',
        cproduct_img3='$cpro_img3', old_price='$product_oldprice', new_price='$product_newprice', discount='$product_discount', product_label='$product_label', product_price='$product_price', currency='$currency', product_keywords='$product_keywords', product_desc='$product_desc', product_model='$product_model' where product_id='$p_id'";
    
        $run_product= mysqli_query($con, $update_product);
    
            if($run_product){
                echo "<script> proUpdate(); </script>";
        
        
            }else{
                echo"<script> error(); </script>";
            }
        
        
        }else{

          //if you dont want to upload/change product  image

            $update_product = "update product set p_category_id='$product_cat', category_id='$category',producer_id='$producer_id', date=NOW(), product_title='$product_title',
             old_price='$product_oldprice', new_price='$product_newprice', discount='$product_discount', product_label='$product_label', product_price='$product_price',currency='$currency', product_keywords='$product_keywords', product_desc='$product_desc', product_model='$product_model' where product_id='$p_id'";
        
            $run_product= mysqli_query($con, $update_product);
        
            if($run_product){
                echo "<script> proUpdate(); </script>";
          
        
            }else{
                echo"<script> error(); </script>";
            }
        
        }
     
    }
?>


<?php 
    }
?>