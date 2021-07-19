<?php

    include("includes/db.php");
    include_once("functions/functions.php");
?>
 <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>

<?php

    if(isset($_GET['c_id'])){

        $customer_id = $_GET['c_id'];

    }

    $ip_add = getRealIpUser();

    $status = "Pending";

    $receipt_no = mt_rand(); //Random numbers//

    $get_otp = "SELECT * FROM otp_on_delivery order by 1 DESC LIMIT 1";
    $run_otp = mysqli_query($con,$get_otp);
    $row_otp = mysqli_fetch_array($run_otp);
    $otp_pin = $row_otp['otp'];

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($con,$select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){
        $pro_id = $row_cart['p_id'];
        $pro_quantity = $row_cart['quantity'];
        $pro_model = $row_cart['model'];
        $price =  $row_cart['price'];
        //$get_product = "select * from product where product_id='$pro_id'";
        //$run_product = mysqli_query($con,$get_product);

        //while($row_product = mysqli_fetch_array($run_product)){
            $sub_total = $price * $pro_quantity;
            
            $insert_customer_order = "insert into customer_orders (customer_id,amount,receipt_no,quantity,model,otp,order_date,order_status)
             values ('$customer_id','$sub_total','$receipt_no','$pro_quantity','$pro_model','$otp_pin',NOW(),'$status')";
            
            $run_customer_order = mysqli_query($con,$insert_customer_order);

            $insert_pending_order = "insert into pending_orders (customer_id,receipt_no,product_id,quantity,model,order_status)
            values ('$customer_id','$receipt_no','$pro_id','$pro_quantity','$pro_model','$status')";

            $run_pending_order = mysqli_query($con,$insert_pending_order);

            $delete_cart = "delete from cart where ip_add='$ip_add'";

            $run_delete = mysqli_query($con,$delete_cart);

            echo "<script>
                        orderSuccess();
                    </script>";
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";


        //}
    }

?>



