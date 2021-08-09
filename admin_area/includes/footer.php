<section class="services">
    <div class="row">
        <div class="col span-1-of-4">
        <p><img src="images/truck.png" class="service-image" alt=""></p>
            <h4>Free delivery for $80+ orders </h4>
            <p>We deliver in 48 hours max</p>
        </div>
        <div class="col span-1-of-4">
            <img src="images/cart.png" class="service-image1" alt="">
            <h4> Satisfied or Refunded </h4>
            <p>Free returns within 14 days.</p>
        </div>
        <div class="col span-1-of-4">
            <img src="images/customer.png" class="service-image1" alt="">
            <h4> We are available 24/7 </h4>
            <p>Contact us by chat, email or phone</p>
        </div>
        <div class="col span-1-of-4">
            <img src="images/card.png" class="service-image1" alt="">
            <h4> 100% Secure payments </h4>
            <p>Mastercard, Visa, Verve, Amex, Paypal</p>
        </div>
    </div>
</section>



<div class="row">
    <hr>
</div>


<section class="footer-categories">
    <div class="row">

        <div class="col span-1-of-4">
            <h5>User Section</h5>
            <ul><!--ul begins--->
                <li>
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo "<a href ='checkout.php'>Sign In</a>";
                        }else{
                            echo "<a href = 'customer/my_account.php?my_orders'>My Account</a>";

                        }
                                
                    ?>
                </li>
                <li>
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo "<a href ='checkout.php'>Sign Up</a>";
                        }else{
                            echo "<a href = 'customer/my_account.php?edit_account'>Edit Account</a>";

                        }
                    ?> 
                </li>

                <li>
                    <a href="terms.php">Terms & Conditions</a>
                </li>
            </ul> 
        </div>

        <div class="col span-1-of-4">
            <h5>Top Product Categories</h5>
            <ul>
                <?php
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

                $get_p_category = "select * from product_category where p_cat_top='yes'";
                $run_p_category = mysqli_query($con,$get_p_category);

                while($row_p_category=mysqli_fetch_array($run_p_category)){
                    $p_category_id = $row_p_category['p_category_id'];
                    $p_category_title = $row_p_category['p_category_title'];

                    echo "
                            <li>
                                <a href ='shop.php?p_category=$p_category_id'>
                                    $p_category_title
                                </a>
                            </li>
                        ";
                }
                ?>
            </ul>
 
        </div>

        <div class="col span-1-of-4">
            <h5>Pages</h5>
            <ul>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a> </li>
                    <li><a href="contact.php"> Contact Us</a></li>
                </ul>

            
            </ul>
        </div>
        
        <div class="col span-1-of-4">
            <h5>Our newsletter</h5>
            <p>Subscribe to get notified about product launches, special offers and news</p>
            <input type="text" name="" class="form-control" placeholder="Your email" id="">
            <a href="#" class="btn btn-info">Subscribe</a>
        </div>
    </div>
</section>


<section class="copyright">
    <div class="row">
        
        <div class="col span-1-of-3">
            <p>Follow us</p>
            <div class="copyicon">
                <i class="fa fa-instagram"></i>
                <i class="fa fa-facebook"></i>
                <i class="fa fa-pinterest"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-youtube"></i>
            </div>
            
        </div>
        <div class="col span-1-of-3">
            <p>We Accept</p>
            <img src="images/Credit-Card-Visa-And-Master-Card-PNG-File.png" alt="">
        </div>
        <div class="col span-1-of-3">
            <p class="trademark"> Copyright &copy; 2020 Apple and Gold Consulting. All Rights Reserved </p>
        </div>
        

    </div>
</section>













<!-- 
<div id="footer"> 
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-3">

                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a> </li>
                    <li><a href="contact.php"> Contact Us</a></li>
                </ul>

                <hr>

                <h4>User Section</h4>
                <ul>
                <li>
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo "<a href ='checkout.php'>Sign In</a>";
                        }else{
                            echo "<a href = 'customer/my_account.php?my_orders'>My Account</a>";
    
                        }
                                
                    ?>
                </li>
                <li>
                    <?php
                        if(!isset($_SESSION['email'])){
                            echo "<a href ='checkout.php'>Sign Up</a>";
                        }else{
                            echo "<a href = 'customer/my_account.php?edit_account'>Edit Account</a>";
    
                        }
                    ?> 
                </li>
                </ul>


                <hr class="hidden-md hidden-lg hidden-sm">

            </div>

            <div class="col-sm-6 col-md-3">

                <h4>Top Product Categories</h4> 
                <ul>
                <?php

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

                    $get_p_category = "select * from product_category";
                    $run_p_category = mysqli_query($con,$get_p_category);

                    while($row_p_category=mysqli_fetch_array($run_p_category)){
                        $p_category_id = $row_p_category['p_category_id'];
                        $p_category_title = $row_p_category['p_category_title'];

                        echo "
                                <li>
                                    <a href ='shop.php?p_category=$p_category_id'>
                                         $p_category_title
                                    </a>
                                </li>
                            ";

                    }
                 
                 ?>
                </ul> 

                <hr class="hidden-md hidden-lg">

            </div>

            <div class="col-sm-6 col-md-3">

                <h4>Find Us:</h4>
               <p> 

                    <strong>Apple & Gold Consulting</strong>
                    <br>Lagos
                    <br>Abuja
                    <br>090-3188-7584
                    <br>applegold@yahoo.com / e-appglegold@yahoo.com

               </p> 
                <a href="contact.php">Check our contacts page</a>

                <hr class="hidden-md hidden-lg">

            </div>


            <div class="col-sm-6 col-md-3">>

                <h4> Get the News </h4>
                <p class="text-muted">
                 Subscribe to our newletters and get our latest information 
                </p>
              
                <form action="" method="post"> 
                    <div class="input-group"> 
                        <input type="email" class="form-control" name="email">
                        <span class="input-group-btn">
                            <input type="submit" value="subscribe" class="btn btn-default">
                         </span>
                    </div> 
                </form>

                <hr>

                <h4> Keep in Touch</h4>
                <p class="social">
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>

                </p>

                <hr class="hidden-md hidden-lg">

                </div>

        </div> 
    </div> 
</div> 

<div id="copyright">
    <div class="container"> 
        <div class="col-md-6"> 

            <p class="pull-left">&copy; 2020 Apple&Gold Consulting. All Rights Reserved </p>

        </div>

        <div class="col-md-6"> 

            <p class="pull-right"><a href="#">Oluwatowo Akinbode</a> </p>

        </div> 
    </div> 
</div> -->