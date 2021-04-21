<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-book"></i>  Orders
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Email</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Model</th>
                                <th>Amount</th>
                                <th>Receipt NO</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_order ="select * from pending_orders";

                                $run_order = mysqli_query($con, $get_order);

                                while($row_o=mysqli_fetch_array($run_order)){

                                    $order_id = $row_o['order_id'];

                                    $c_id= $row_o['customer_id'];

                                    $receipt = $row_o['receipt_no'];

                                    $quantity = $row_o['quantity'];

                                    $model = $row_o['model'];

                                    $product_id = $row_o['product_id'];

                                    $status = $row_o['order_status'];




                                    $get_product ="select * from product where product_id='$product_id'";

                                    $run_product = mysqli_query($con,$get_product);

                                    $row_p = mysqli_fetch_array($run_product);

                                    $p_title = $row_p['product_title'];




                                    $get_customer = "select * from customer where customer_id='$c_id'";

                                    $run_customer = mysqli_query($con,$get_customer);

                                    $row_c=mysqli_fetch_array($run_customer);

                                    $c_email = $row_c['email'];


                                    $get_date = "select * from customer_orders where order_id='$order_id'";

                                    $run_date = mysqli_query($con,$get_date);

                                    $row_d=mysqli_fetch_array($run_date);

                                    $date = $row_d['order_date'];

                                    $amount = $row_d['amount'];




                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php echo $c_email; ?></td>
                                <td><?php echo $p_title; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $model; ?></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $receipt; ?></td>
                                <td>
                                    <?php 
                                        if($status=='Pending'){
                                            echo $status='Pending';
                                        }else{
                                            echo $status='Complete';
                                        }
                                     ?>
                                </td>   
                                <td><?php echo $date; ?></td>
                                

                                <td>
                                    <a href="index.php?delete_order=<?php echo $order_id; ?>">
                                        <i class="fa fa-trash"></i>  Delete
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