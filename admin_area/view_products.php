<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Products
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags"></i>  Products
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Initial Quantity</th>
                                <th>Quantity Sold</th>
                                <th>Quanntity Left</th>
                                <th>Keywords</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_product ="select * from product";

                                $run_product = mysqli_query($con, $get_product);

                                while($row_p = mysqli_fetch_array($run_product)){

                                    $pro_id = $row_p['product_id'];

                                    $pro_title = $row_p['product_title'];

                                    $pro_img1 = $row_p['product_img1'];

                                    $pro_price = $row_p['product_price'];

                                    $pro_key = $row_p['product_keywords'];

                                    $pro_date = $row_p['date'];

                                    $int_qty = $row_p['int_qty'];

                                   

                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php echo $pro_title; ?></td>
                                <td><img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                <td> &#36; <?php echo $pro_price/100; ?></td>
                                <td> <?php echo $int_qty ?></td>
                                <td>
                                    <?php
                                        $get_sold ="select * from pending_orders where product_id='$pro_id'";

                                        $run_sold= mysqli_query($con,$get_sold);

                                        $row_sold = mysqli_fetch_array($run_sold);

                                        $qty_sold = $row_sold['quantity'];

                                        if($qty_sold > 0){
                                            echo $qty_sold;
                                        }else{
                                            echo '0';
                                        }


                                       // $count = mysqli_num_rows($run_sold);

                                       
                                    ?>
                                </td>
                                <td>
                                    <?php  
                                        $color = "#000000";
                                        $qty_left = $int_qty - $qty_sold;
                                        
                                        if($qty_left > ($int_qty/2)){
                                            $color = '#555';
                                        }else{
                                            $color = '#ff0000';
                                        }
                                        echo "<span style=\"color: $color\">$qty_left</span>";

                                        
                                    ?>
                                </td>
                                <td><?php echo $pro_key; ?></td>
                                <td><?php echo $pro_date; ?></td>
                                <td>
                                    <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-trash"></i>  Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-pencil"></i>  Edit
                                    </a>
                                </td>
                            </tr>

                            <?php } ?>

                           

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