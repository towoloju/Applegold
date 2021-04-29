<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Payments
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money"></i>  Payments
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Email</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Receipt NO</th>
                                <th>Voucher Code</th>
                                <th>Date</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_payment ="select * from payment";

                                $run_payment = mysqli_query($con, $get_payment);

                                while($row_o=mysqli_fetch_array($run_payment)){

                                    $payment_id = $row_o['payment_id'];

                                    $mode =$row_o['payment_mode'];

                                    $receipt = $row_o['receipt_no'];

                                    $amount = $row_o['amount'];

                                    $voucher = $row_o['voucher_code'];

                                    $date = $row_o['payment_date'];

                                    $c_email = $row_o['customer_email'];


                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php 
                                  
                                    echo $c_email; ?></td>
                                <td>&#36; <?php echo $amount; ?></td>
                                <td><?php echo $mode; ?></td>
                                <td><?php echo $receipt; ?></td>
                                <td><?php echo $voucher; ?></td>
                                <td><?php echo $date; ?></td>
                                

                                <td>
                                    <a href="index.php?delete_payment=<?php echo $payment_id; ?>">
                                        <i class="fa fa-trash"></i>  Delete
                                    </a>
                                </td>
                              
                            </tr>

                            <?php    } ?>

                           

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