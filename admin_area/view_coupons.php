<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Coupons
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i>  Coupons
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Coupon ID</th>
                                <th>Coupon Title</th>
                                <th>Product Title</th>
                                <th>Coupon Price</th>
                                <th>Coupon Code</th>
                                <th>Coupon Limit</th>
                                <th>Coupon Used</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            
                                $i = 0;
                                $get_coupon = "select * from coupons";

                                $run_coupon = mysqli_query($con,$get_coupon);

                                while($row_c=mysqli_fetch_array($run_coupon)){

                                    $coupon_id = $row_c['coupon_id'];

                                    $coupon_pro_id = $row_c['product_id'];

                                    $coupon_title = $row_c['coupon_title'];

                                    $coupon_price = $row_c['coupon_price']/100;

                                    $coupon_code = $row_c['coupon_code'];

                                    $coupon_limit = $row_c['coupon_limit'];

                                    $coupon_used = $row_c['coupon_used'];

                                    $get_product = "select * from product where product_id='$coupon_pro_id'";

                                    $run_product = mysqli_query($con,$get_product);

                                    $row_p = mysqli_fetch_array($run_product);

                                    $product_title = $row_p['product_title'];

                                    $i++;


                                
                            
                            ?>

                            <tr>
                                <td><?php echo $i ;?></td>
                                <td><?php echo $coupon_title ;?></td>
                                <td><?php echo $product_title ;?></td>
                                <td> &#36; <?php echo $coupon_price ;?></td>
                                <td><?php echo $coupon_code ;?></td>
                                <td><?php echo $coupon_limit ;?></td>
                                <td><?php echo $coupon_used ;?></td>
                                <td>
                                
                                    <a href="index.php?edit_coupon=<?php echo $coupon_id ;?>">
                                        <i class="fa fa-pencil"></i>  Edit
                                    </a>

                                </td>
                                <td>
                                
                                    <a href="index.php?delete_coupon=<?php echo $coupon_id ;?>">
                                        <i class="fa fa-trash"></i>  Delete
                                    </a>

                                </td>
                                
                            </tr>
                        
                           <?php
                                }   
                            
                           ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
    }
?>