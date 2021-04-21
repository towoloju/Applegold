<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>


    
    <div class="row product-container"  style="margin-top:60px;"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <ol class="breadcrumb"> <!---breadcrumb begins-->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Coupons
                </li>
            </ol> <!---breadcrumb ends--->
        </div> <!--col-lg-12 ends-->
    </div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->

                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-money fa-fw"></i> Insert Coupons
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->
              

                <div class="panel-body" >  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Title</label>
                            <div class="col-md-6">  
                                <input type="text" class="form-control" name="coupon_title" required>

                            </div>
                        </div> 


                        <div class="form-group">
                            <label class="col-md-3 control-label">Select Product</label>
                            <div class="col-md-6">  
                                <select name="product_id" class="form-control" required>
                                    <option selected disabled >Select Product for Coupon</option>

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
                                <input type="text" class="form-control" name="coupon_price" required>

                            </div>
                        </div>  


                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Code</label>
                            <div class="col-md-6">  
                                <input type="text"  id="c_code" class="form-control" name="coupon_code"  required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Coupon Limit</label>
                            <div class="col-md-6">  
                                <input type="number"  class="form-control" name="coupon_limit" value="1" required>

                            </div>
                        </div>  


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"></label>
                            <div class="col-md-6">
                                <button type="button" onclick="getCouponCode()" class="btn btn-success"> Generete Code</button>
                                <input type="submit" name="submit" value="Create Coupon" class="btn btn-primary">

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
        function couponSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Coupon created successfully',
                icon: 'success'
            }).then(function(){
                window.location = 'index.php?view_coupons'
            });
    
        }

        function couponExists(){
            Swal.fire({
                title: 'Oops',
                text: 'A coupon already exists for this product',
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

</body>
</html>

<?php
    if(isset($_POST['submit'])){
      $coupon_title = $_POST['coupon_title']; 
      $coupon_pro_id = $_POST['product_id'];
      $coupon_price = $_POST['coupon_price'];
      $coupon_limit = $_POST['coupon_limit'];
      $coupon_code = $_POST['coupon_code'];
      $coupon_used = 0;
    


      $get_coupon = "select * from coupons where product_id='$coupon_pro_id' or coupon_code='$coupon_code'";
      $run_coupon = mysqli_query($con,$get_coupon);
      $check_coupon = mysqli_num_rows($run_coupon);

        if($check_coupon==1){
            echo "<script> couponExists(); </script>";

        }else{
            
            $insert_coupon = "insert into coupons (product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) values('$coupon_pro_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";
            $run_coupon= mysqli_query($con,$insert_coupon);

            if($run_coupon){
                echo "<script> couponSuccess(); </script>";
            }else{
                echo "<script> error(); </script>";

            }

        }
     

     
    
    }
?>


<?php 
    }
?>