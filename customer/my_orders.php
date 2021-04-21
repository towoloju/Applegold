<center>
    <h1 style="color:#054a91;">My Orders</h1>
    <p class="lead">
        Your orders on one place
    </p>
    <p class="text-muted">
        If you have any questions, feel free to <a href="../contact.php">contact us </a>. Our customer service works <strong>24/7</strong>
    </p>

</center>

<hr>

<div class="table-responsive">

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Amount</th>
                <th>Receipt</th>
                <th>Quantity</th>
                <th>Model</th>
                <th>Order Date:</th>
                <th>Status</th>
                <th>Confirm</th>
            </tr>
        </thead>
        <tbody>
          
        <?php
            $customer_session = $_SESSION['email'];

            $get_customer = "select * from customer where email='$customer_session'";

            $con = mysqli_connect("localhost", "root", "", "ag_store");

            $run_customer = mysqli_query($con,$get_customer);
  
            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $get_orders = "select * from customer_orders where customer_id='$customer_id'";

            $run_orders = mysqli_query($con,$get_orders);

            $i = 0;

            while($row_orders = mysqli_fetch_array($run_orders)){
                $i++;
                $order_id = $row_orders['order_id'];
                $amount = $row_orders['amount'];
                $receipt = $row_orders['receipt_no'];
                $quantity = $row_orders['quantity'];
                $model = $row_orders['model'];
                $order_date = substr($row_orders['order_date'],0,11);
                $order_status = $row_orders['order_status'];
                
                  
                 if($order_status=='Pending'){
                     $order_status = 'Unpaid';
                
                 }else{
                    $order_status = 'Paid';
                 }
             


        ?>
            <tr>
                <th><?php echo $i; ?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $receipt; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $model; ?></td> 
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td>
                    <a href="confirm.php?order_id=<?php echo  $order_id; ?>" target="_blank" class="btn btn-primary btn-sm">Confirm Paid</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>