<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
   
</head>
<body>
    

<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / Add New Product
            </li>
        </ol>
    </div>
</div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->
                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-money fa-fw"></i> Insert Products
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->


               
                <div class="panel-body">  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                      
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Name </label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control" required>

                            </div>
                        </div>

                   


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Brand </label>
                            <div class="col-md-6">
                                    <select name="producer" class="form-control">
                                        <option selected disabled>Select a Brand</option>
                                        
                                        <?php
                                            $con = mysqli_connect("localhost", "root", "", "ag_store");

                                            $get_producer = "select * from producer";
                                            $run_producer = mysqli_query($con, $get_producer);

                                            while($row_p = mysqli_fetch_array($run_producer)){
                                                $producer_id = $row_p['producer_id'];
                                                $producer_title = $row_p['producer_title'];
                                                

                                                echo "
                                                
                                                    <option value = '$producer_id'> $producer_title </option>
                                                
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
                                    <option selected disabled>Select a Product Category</option>

                                
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
                                    <option selected disabled>Select a Category</option>

                                    
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "", "ag_store");

                                        $get_category = "select * from categories";
                                        $run_category = mysqli_query($con, $get_category);

                                        while($row_category = mysqli_fetch_array($run_category)){
                                            $category_id = $row_category['category_id'];
                                            $category_title = $row_category['category_title'];

                                            echo "
                                            
                                                <option value = '$category_id'> $category_title </option>
                                            
                                            ";
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>

                    

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 1 </label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" name="product_img1" required>

                            </div>
                        </div>
                            
                           
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 2 </label>
                            <div class="col-md-6">
                            <input type="file"  class="form-control" name="product_img2" required>           

                            </div>
                        </div>
                        
                            
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 3 </label>
                            <div class="col-md-6">
                            <input type="file"class="form-control" name="product_img3" required>

                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 1 - Zoom  </label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" name="cproduct_img1">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 2 - Zoom  </label>
                            <div class="col-md-6">
                            <input type="file"  class="form-control" name="cproduct_img2">           

                            </div>
                        </div>
                            

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Image 3 - Zoom  </label>
                            <div class="col-md-6">
                            <input type="file"  class="form-control" name="cproduct_img3">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Model  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="product_model">

                            </div>
                        </div>  
                        


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Price  </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="product_price" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Old Price  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="old_price">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product New Price  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="new_price">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Discount  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="discount">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="pro_label" class="control-label col-md-3"> Product Label  </label>
                            <div class="col-md-6">
                                <select name="pro_label" class="form-control">
                                        <option selected disabled>Select Product Label</option>
                                        <option value ="new">New Product</option>
                                        <option value="sale">Product on Sale</option>
                                </select>
                            </div>
                        </div>


                                          
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Keywords  </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="product_keywords" required>

                            </div>
                        </div>   


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Product Description  </label>
                            <div class="col-md-6">
                            <textarea name="product_desc" cols="10" rows="5" class="form-control"></textarea>

                            </div>
                        </div>  



                        <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-primary form-control" name="submit" value="Insert Product">

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
        function pSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Product inserted successfully',
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



</body>
</html>
<?php
    if(isset($_POST['submit'])){
      $product_title = $_POST['product_title']; 
      $producer_id = $_POST['producer']; 
      $product_cat = $_POST['product_cat'];
      $category = $_POST['category'];
      $product_price = $_POST['product_price'];
      $product_oldprice = $_POST['old_price'];
      $product_newprice = $_POST['new_price'];
      $product_discount = $_POST['discount'];
      $product_label = $_POST['pro_label'];
      $product_keywords = $_POST['product_keywords'];
      $product_desc = $_POST['product_desc'];
      $product_model = $_POST['product_model'];


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

      $insert_product = "insert into product (p_category_id,category_id,producer_id,date,product_title,product_img1,product_img2,product_img3,cproduct_img1,cproduct_img2,cproduct_img3,old_price, new_price, discount, product_label, product_price,product_keywords,product_desc,product_model) values
      ('$product_cat','$category',$producer_id,NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$cproduct_img1','$cproduct_img2','$cproduct_img3','$product_oldprice','$product_newprice','$product_discount', '$product_label','$product_price','$product_keywords','$product_desc','$product_model')";

      $run_product = mysqli_query($con,$insert_product);

      if($run_product){
          echo "<script>
            pSuccess();
        </script>";
      }else{
        echo "<script>
        error();
    </script>"; 
      }
    
    }
?>


<?php 
    }
?>

