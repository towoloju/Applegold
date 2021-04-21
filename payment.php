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

            $con = mysqli_connect("localhost", "root", "", "ag_store");

            $run_customer = mysqli_query($con,$select_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

        ?>

        <div class="options">
            <h2>Payment Options</h2>
            <p class="lead">
                <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay on Delivery</a>
            </p>

            <p class="lead">
                <a href="" data-toggle="modal" data-target="#exampleModalPay">
                    Paypal Payment
                    <!-- <img class="img-responsive" src="admin_area/product_images/product-img1.jpg" alt="creditcard">  -->
                </a>
            </p>

        </div>

       
     
    </div>


    <div class="col-md-6 box payment modal fade" id="exampleModalPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalPayTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <i class="fa-fa-credit-card"></i>  <h5 class="modal-title" id="exampleModalPayTitle">PayPal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                    </button>
                </div>

                <div class="modal-body pay-form">
                    <form method="post" action="" enctype="multipart/form-data">                                                                
                        <div class="form-body">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <p><strong> Please fill in your card details</strong></p>
                            </div> 
                            <br>
                            <input type="tel"class="form-control" id="card-number"  name="card-number" placeholder="XXXX XXXX XXXX XXXX" required>
                            <input type="text"class="form-control"  name="card-holder-name" placeholder="Firstname and Lastname" required>
                            <div class="expiry-date">
                                
                                <input type="tel" class="form-control month" id="month"  maxlength="2" name="month" placeholder="MM" required>
                                <input type="tel" class="form-control year" id="year"  maxlength="2"  name="year" placeholder="YY" required>
                                
                            </div>
                            <div class="card-cvv">
                            
                                <input type="tel" class="form-control cvv" id="cvv" name="cvv" maxlength="3" placeholder="CVV" required>
                                
                            </div>
                            <button type="submit" class="btn btn-primary" value="submit"> Proceed to PayPal</button>
                        
                        </div>
                                            
                    </form>
                </div>
        
            </div>
        </div>
    </div>





    





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