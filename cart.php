<?php
    $active='Cart';
    include("includes/header.php");
    
?>


    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Cart</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->

            <div id="cart" class="col-md-9"> <!----col-md-9 begins-->
            
                <div class="box"> <!----box begins-->
                    <form action="cart.php" method="post" enctype="multipart/form-data"> <!----form begins-->
                    
                        <h1>Shopping Cart</h1>

                        <?php

                        //Connecting the cart to shop
                        $ip_add = getRealIpUser();

                        $connect_cart = "select * from cart where ip_add='$ip_add'";

                        $run_cart = mysqli_query($con,$connect_cart);

                        $count = mysqli_num_rows($run_cart);

                        ?>

                        <p class="text-muted">You have <?php echo $count; ?> item(s) in your cart</p>


                        <div class="table-responsive"> <!----table-responsive begins-->
                            <table class="table table-hover"> <!----table begins-->
                                <thead> <!----thread begins-->
                                    <tr> <!----tr begins-->
                                        
                                        <th>Product</th>
                                        <th class="model">Model</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th >Sub-Total</th>                                            
                                       <th >Delete</th>
                                    </tr> <!----tr ends-->
                                
                                
                                </thead> <!----thread ends-->
                                    <?php
                                      

                                         $total = 0;

                                         while($row_cart=mysqli_fetch_array($run_cart)){

                                           $pro_id = $row_cart['p_id'];

                                           $pro_model = $row_cart['model'];

                                           $pro_quantity = $row_cart['quantity'];

                                           $pro_price = $row_cart['price']/100;

                                           $get_product = "select * from product where product_id='$pro_id'";

                                           $run_product = mysqli_query($con,$get_product);

                                            while($row_products = mysqli_fetch_array($run_product)){
                                            
                                                $product_title = $row_products['product_title'];

                                                $pro_url = $row_products['product_url'];

                                                //$pro_price = $row_products['product_price'];

                                                $product_img1 = $row_products['product_img1'];

                                                 //$only_price = $row_products['product_price'];

                                                $sub_total = (float)$pro_price *(float)$pro_quantity;

                                                $_SESSION['pro_quantity'] = $pro_quantity;

                                                $total += $sub_total;  
                                                
                                          
                                          
                                    ?>
                                

                                <tbody> <!----tbody begins-->                                                           

                                    <tr>  <!----tr begins-->

                                        <td>

                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product img">
                                            <a href="details.php?pro_id=<?php echo $pro_id ?>"> <?php echo $product_title; ?> </a>

                                        </td>
                                  
                                        <td>

                                             <p style="font-size:80%"><?php echo $pro_model; ?> </p>


                                        </td>


                                        <td>

                                            &#36;   <?php echo $pro_price; ?> 

                                        </td>


                                        <td>

                                            <!-- <div class='col-lg-2 col-md-3 col-sm-6 quantity-bar'> -->
                                            <div class='input-group'>

                                                <!-- <span class='input-group-btn'>
                                                    <button type='button' class='quantity-left-minus btn btn-default btn-number'  data-type='minus' data-field=''>
                                                        <span class='glyphicon glyphicon-minus'></span>
                                                    </button>
                                                </span> -->

                                                <input type='text' name='p_quantity' class='form-control input-number quantity'  data_product_id='<?php echo $pro_id; ?>' value='<?php echo $_SESSION['pro_quantity']; ?> '>

                                                <!-- <span class='input-group-btn'>
                                                    <button type='button' class='quantity-right-plus btn btn-default btn-number ' data-type='plus' data-field=''>
                                                        <span class='glyphicon glyphicon-plus'></span>
                                                    </button>
                                                </span> -->
                                            </div>
                                                                          
                                        </td>


                                        <td>

                                           &#36;  <?php echo $sub_total; ?>

                                        </td>

                                        
                                        <td>

                                            <input type="checkbox" name="remove[]" value="<?php  echo $pro_id ;?>">

                                        </td>
                                  
                                    
                                    </tr>  <!----tr ends-->


                                    <?php
                                        } 
                                    
                                    
                                    }
                                    ?>

                                </tbody> <!----tbody ends-->

                             
                             

                                <tfoot>
                                
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th colspan="3" class="totalp">&#36; <?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                        
                            </table> <!----table ends-->    

                            <div class="form-inline pull-right"> <!---for coupon code---->
                                <div class="form-group">

                                    <label>Coupon Code</label>
                                    <input type="text" name="code"  class="form-control">
                                    <input type="submit" value="Use Coupon" name="apply_coupon" class="btn btn-primary">

                                </div>
                            </div>

                        </div> <!----table-responsive ends-->




                        <div class="box-footer"> <!----box-footer begins-->

                            <div class="pull-left"> <!----pull-left begins-->
                                <a href="shop.php" class="btn btn-primary"> 
                                    <i class=" fa fa-chevron-left"> Continue Shopping</i>
                                </a> 
                            </div> <!----pull-left ends-->

                            <div class="pull-right"> <!----pull-right begins-->
                                <button type="submit" value="Update Cart" name="update" class="btn btn-default"> 
                                    <i class="fa fa-refresh"> Update Cart</i>
                                </button> 

                                <a href="checkout.php" class="btn btn-success">
                                Proceed to checkout <i class="fa fa-play"></i>
                                </a>
                            </div> <!----pull-right ends-->
                    
                        </div> <!----box-footer ends-->
     

                    </form> <!----form ends-->               
                </div> <!----box ends-->

                <!---Coupon Condition--->
                
                <script src="js/jquery-3.4.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/sweetalert2.all.min.js"></script>
                <script >
                    function couponSuccess(){
                        Swal.fire({
                            title: 'Successful',
                            text: 'Your Coupon has been applied',
                            icon: 'success'
                        }).then(function(){
                            window.location = 'cart.php'
                        });
                
                    }

                    function couponExpired(){
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Your coupon already expired',
                            icon: 'info'
                        });
                
                    }

                    function couponEligible(){
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Your coupon cannot be applied to this product',
                            icon: 'info'
                        });
                
                    }

                    function couponInvalid(){
                        Swal.fire({
                            title: 'Oops!',
                            text: 'Your coupon is not valid',
                            icon: 'error'
                        })
                    }
                
                
                </script>
                <?php
                    if(isset($_POST['apply_coupon'])){
                        $code = $_POST['code'];

                        if($code == ""){

                        }else{
                            $get_coupon = "select * from coupons where coupon_code='$code'";
                            $run_coupon = mysqli_query($con,$get_coupon);
                            $check_coupon = mysqli_num_rows($run_coupon);

                            if($check_coupon == "1"){
                                $row_coupon = mysqli_fetch_array($run_coupon);

                                $coupon_price = $row_coupon['coupon_price'];
                                $coupon_pro_id = $row_coupon['product_id'];
                                $coupon_limit= $row_coupon['coupon_limit'];
                                $coupon_used = $row_coupon['coupon_used'];

                                //when coupon used exceeds the number of times if can be used
                                if($coupon_limit == $coupon_used){
                                    echo " <script> couponExpired(); </script>";

                                }else{
                                    $get_cart = "select * from cart where p_id='$coupon_pro_id' AND ip_add = '$ip_add'";
                                    $run_cart = mysqli_query($con,$get_cart);
                                    $check_cart = mysqli_num_rows($run_cart);

                                    if($check_cart == "1"){

                                        $add_used_coupon = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'"; //counting number of times the coupon has been used
                                        $run_used_coupon = mysqli_query($con,$add_used_coupon);
                                        $update_cart = "update cart set price='$coupon_price' where p_id='$coupon_pro_id' AND ip_add='$ip_add'";
                                        $run_update = mysqli_query($con,$update_cart);

                                        echo " <script> couponSuccess(); </script>";
                                        //echo " <script>window.open('cart.php ','_self')</script>";
                                        
                                    }else{
                                        //If product doesnt apply to coupon
                                        echo " <script> couponEligible(); </script>";

                                    }
                                }


                            }else{
                                //If coupon doesn't exixt
                                echo " <script>couponInvalid();</script>";
                            }

                        }
                    }
                ?>
               

                <?php
                
                    function update_cart(){
                        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                     $cleardb_server = $cleardb_url["host"];
                     $cleardb_username = $cleardb_url["user"];
                     $cleardb_password = $cleardb_url["pass"];
                     $cleardb_db = substr($cleardb_url["path"],1);
                     $active_group = 'default';
                     $query_builder = TRUE;
                 
                     // $db = mysqli_connect("localhost","root","","ag_store");
                     $con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
                        // $con = mysqli_connect("localhost", "root", "", "ag_store");
                       
                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id){
                                $delete_product = "delete from cart where p_id = '$remove_id'";

                                $run_delete = mysqli_query($con,$delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                            
                                }
                            }
                       
                        }

                    }

                    echo @$up_cart = update_cart();

                ?>

        <div id=""> 
            
            <h3 class="text-center detail-other">Products You May Like</h3>
        
            <?php

                $get_product = "select * from product order by rand() LIMIT 16,4";

                $run_product = mysqli_query($con,$get_product);

                while($row_products=mysqli_fetch_array($run_product)){
                    $pro_id = $row_products['product_id'];
                    $pro_title = $row_products['product_title'];
                    $pro_url = $row_products['product_url'];
                    $pro_price = $row_products['product_price']/100;
                    $pro_img1 = $row_products['product_img1'];
                    $pro_img2 = $row_products['product_img2'];
        
                    echo "
                    
                    <div class='col-md-3 col-sm-6  col-container detail-col'>
                        <div class='product-grid'>
                            <div class='product-image'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                    <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                                </a>
                                <span class='product-trend-label'></span>
                                <span class='product-discount-label'></span>
                                <ul class='social'>
                                    <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                    <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                    <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
        
        
                                </ul>
                            </div>
        
                            <div class='product-content'>
                                <h3 class='title'>$pro_title</h3>
                                <div class='price'>
                                    <p class=''> &#36; $pro_price</p>
                                
                                </div>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
        
                    ";
                    
                }

            ?>
            
        </div> 

            </div> <!----col-md-9 ends-->

            <div class="col-md-3"> <!----col-md-3 begins-->
                <div id="order-summary" class="box"> <!----order-summary begins-->
                    <div class="box-header"> <!----box-header begins-->
                        <h5>Order Summary</h5>
                    </div> <!----box-header ends-->

                    <p class="text-muted">  <!----text-muted begins-->
                    Shipping and additional costs are calculated based on the value you have entered
                    </p>  <!----text-muted ends-->

                    <div class="table-responsive"> <!----table-responsive begins-->
                        <table class="table"> <!----table begins-->
                        
                            <tbody> <!----tbody begins-->
                                <tr>
                                    <td>Order All Sub-Total</td>
                                    <th> &#36;  <?php echo $total;?></th>
                                </tr>

                                <tr>
                                    <td>Shipping and Handling</td>
                                    <th>&#36;  0</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <th>&#36;  0</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th> &#36; <?php echo $total;?></th>
                                </tr>
                            </tbody> <!----tbody ends-->

                        </table> <!----table ends-->
                    </div> <!----table-responsive ends-->

                </div> <!----order-summary ends-->
            </div> <!----col-md-3 ends-->

        
        </div> <!----containerends-->
    </div> <!----content ends-->

   
    <?php

    include("admin_area/includes/footer.php");
    ?>


</body>
</html>

    