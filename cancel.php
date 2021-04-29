
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
        function failedPayment(){
            Swal.fire({
                icon: 'info',
                timer:10000,
                title: 'Payment Failed',
                text: ' Your order has been canceled, please go back to continue shopping.',
                
            })
        }
        function error(){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong',
                
            })
        }
    </script>
</head>
<body>
<?php
    include("includes/db.php");
    include_once("functions/functions.php");

    //$con = mysqli_connect('localhost','root','','ag_store');
    //get product id, price, and currency

    $ip_add = getRealIpUser();

    $receipt_no = mt_rand(); //Random numbers//

    $get_product = "select * from cart where ip_add='$ip_add'";

    $run_product = mysqli_query($con,$get_product);

    $row_cart = mysqli_fetch_array($run_product);

    $pro_id=$row_cart['p_id'];

    $price = $row_cart['price'];

    $currency = $row_cart['currency'];
    
        //get customer email

        $session = $_SESSION['email'];

        $get_customer = "select * from customer where email='$session'";

        $result = mysqli_query($con,$get_customer);

        $row_customer = mysqli_fetch_array($result);

        $c_email = $row_customer['email'];
    
        //set status to success
        $status = "failed";
        $insert_payment = "insert into  online_payment (product_id, customer_email, amount, receipt, currency, status) VALUES ('$pro_id', '$c_email', '$price', '$receipt_no', '$currency', '$status')";
        $run_payment = mysqli_query($con,$insert_payment);
        if($run_payment){
            echo "  <script>
                        failedPayment();
                        
                    </script>
            "; 
        }else{
            echo "<script>
                    error();
                </script>"; 
        }

        $delete_cart = "delete from cart where ip_add='$ip_add'";

        $run_delete = mysqli_query($con,$delete_cart);
    

     
?>
<a href="customer/my_account.php?my_orders" class="btn btn-primary">Home</a>
</body>
</html>