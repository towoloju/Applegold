    <?php

    //Connecting the cart to shop
    $ip_add = getRealIpUser();

    $connect_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($con,$connect_cart);

    $count = mysqli_num_rows($run_cart);

    ?>
    <div class="box">

        <?php
        
            $session_email = $_SESSION['email'];

            $select_customer = "select * from customer where email='$session_email'";
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

            $run_customer = mysqli_query($con,$select_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $get_product = "SELECT * FROM cart ";

            $query = mysqli_query($con,$get_product);

            if($query->num_rows > 0){

                while ($row = mysqli_fetch_array($query)){
                    $pro_id = $row['p_id'];
                    $pro_name = $row['name'];
                    $pro_model = $row['model'];
                    $price = $row['price'];
                    

        ?>
      

        <div class="options">
            <h2>Payment Options</h2>
            <p class="lead">
                <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay on Delivery</a>
                <a href='otp.php?c_id=<?php echo $customer_id; ?>' target='_blank' class="btn btn-primary btn-sm" style="width:70px; margin-top:-5px; magrign-left:-10px;">Get OTP</a>
            </p>

            <p class="lead">
                <a href="stripe_checkout.php?pro_id=<?php echo $pro_id; ?>" >
                    Pay Online with Stripe 
                </a>
            </p>

        </div>

       
     
    </div>

    <?php
        }
    }
    ?>
  




    





<style>
  
    .options{
        margin-left:400px; 
        margin-top:150px;
        margin-bottom:100px;

    }
    @media(max-width:380px){
        .options{
            margin-left:20px; 
            margin-top:70px;
            margin-bottom:50px;

        }
        .options a{
        margin-left:50px
        }
        .modal{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width:300px;
            max-width:100%;
        }
        .form-body{
            margin-right:10px;
            margin-top:10px;
            width:auto;
        }
        
        .expiry-date .month {
            width:20px  !important;
           
        }
        .expiry-date .year{
            margin-right:-30px;
            width:20px
        }   
        .card-cvv{
          
            width:20px;
        }
        .btn-primary{
            width:auto;
            margin-top:20px;
        }
    }
    h2{
        color:#0549a1;
    }
    .options a{
      margin-left:45px
    }
    .modal{
        left:30%;
    }
    .pay-form{
        margin-top:10px;
    }
    .form-body{
      margin-left:10px;
      margin-top:10px;
      width:350px;
    }
    .form-control{
        margin-top:20px;
       
    }
    .expiry-date .month {
    width:100px  !important;
    text-align:center;
    }
    .expiry-date .year{
        float:right;
        text-align:center;
        margin-right:130px;
        margin-top:-34px;
        width:100px
    }   
    .card-cvv{
        float:right !important;  
        margin-top:-54px;
        margin-right:0px;
        text-align:center;
        width:100px;
    }
    .btn-primary{
        width:360px;
        margin-top:20px;
    }
   .summary{
       margin-top:-360px;
       margin-right:100px;
       float:right;
   }
    

</style>