<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

<?php
    if(isset($_GET['edit_coupon'])){

        $edit_id =$_GET['edit_coupon'];

        $get_c ="select * from coupons where coupon_id='$edit_id'";

        $run_edit = mysqli_query($con, $get_c);

        $row_edit = mysqli_fetch_array($run_edit);

        $c_id = $row_edit['coupon_id'];

        $pro_id = $row_edit['product_id'];

        $c_title = $row_edit['coupon_title'];

        $c_limit = $row_edit['coupon_limit'];

        $c_used = $row_edit['coupon_used'];

        $c_code = $row_edit['coupon_code'];

        $c_price = $row_edit['coupon_price'];
    }

    $get_p = "select * from product where product_id = '$pro_id'";

    $run_p = mysqli_query($con,$get_p);

    $row_p = mysqli_fetch_array($run_p);

    $product_id = $row_p['product_id'];

    $product_title = $row_p['product_title'];

?>


    
<div class="row product-container"  style="margin-top:60px;"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <ol class="breadcrumb"> <!---breadcrumb begins-->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Coupons
                </li>
            </ol> <!---breadcrumb ends--->
        </div> <!--col-lg-12 ends-->
    </div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->

                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-money fa-fw"></i> Edit Coupons
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->
              

                <div class="panel-body" >  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Title</label>
                            <div class="col-md-6">  
                                <input type="text" class="form-control" name="coupon_title" value="<?php echo $c_title; ?>" required>

                            </div>
                        </div> 


                        <div class="form-group">
                            <label class="col-md-3 control-label">Select Product</label>
                            <div class="col-md-6">  
                                <select name="product_id" class="form-control" required>
                                    <option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>

                                    <?php
                                    
                                        $get_pro = "select * from product";
                                        $run_p = mysqli_query($con,$get_pro);
                                        while($row_p=mysqli_fetch_array($run_p)){
                                            $p_id = $row_p['product_id'];
                                            $p_title = $row_p['product_title'];

                                            echo "<option value='$p_id'>$p_title</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Price</label>
                            <div class="col-md-6">  
                                <input type="text" class="form-control" value="<?php echo $c_price; ?>" placeholder="Price*100" name="coupon_price" required>

                            </div>
                        </div>  


                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Code</label>
                            <div class="col-md-6">  
                                <input type="text" id="c_code" class="form-control" value="<?php echo $c_code; ?>" name="coupon_code" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Limit</label>
                            <div class="col-md-6">  
                                <input type="number"  class="form-control" value="<?php echo $c_limit; ?>" name="coupon_limit" required>

                            </div>
                        </div>  
                    
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"></label>
                            <div class="col-md-6">
                                <button type="button" onclick="getCouponCode()" class="btn btn-success"> Generete Code</button>
                                <input type="submit" name="update" value="Update Coupon" class="btn btn-primary">

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
    <script src="js/app.js"></script>

    <script >
        function couponUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Coupon updated successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_coupons'
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
    if(isset($_POST['update'])){
      $coupon_title = $_POST['coupon_title']; 
      $coupon_pro_id = $_POST['product_id'];
      $coupon_price = $_POST['coupon_price'];
      $coupon_limit = $_POST['coupon_limit'];
      $coupon_code = $_POST['coupon_code'];
   
      $update_c = "update coupons set product_id='$coupon_pro_id', coupon_title='$coupon_title', coupon_price='$coupon_price',
      coupon_limit='$coupon_limit', coupon_used='$c_used', coupon_code='$coupon_code' where coupon_id='$c_id'";

      $run_c = mysqli_query($con,$update_c);

      if($run_c){
            echo "<script> couponUpdate(); </script>";

        }else{

            echo "<script> error(); </script>";

        }

     
    
    }
?>


<?php 
    }
?>
