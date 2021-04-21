

<?php
 $active='Account';
    include("includes/header.php");
?>



    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Sign In</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->



        

            <div class="col-md-12"> <!----col-md-9 begins--> 
                        <script src="js/jquery-3.4.1.min.js"></script>
                        <script src="js/sweetalert2.all.min.js"></script>
                        <script>
                                function inActive(){
                                    Swal.fire({
                                        title: 'Oops...',
                                        icon: 'error',
                                        text: 'Looks like you account has not been verified, please verify your account before proceeding to checkout'
                                    })
                                }
                                function signIn(){
                                    Swal.fire({
                                        title: 'Oops...',
                                        icon: 'info',
                                        text: 'You are not signed in, Sign in to continue'
                                    })
                                }
                            
                        </script>
        
        
      



                <?php
                  
                    if(!isset($_SESSION['email'])){

                        
                        include("customer/customer_login.php");
                        echo "<script>
                                signIn();
                        </script>";
                        //echo "<script>alert('Please signin to your account')</script>";                       
                    
                    // }elseif(isset($_SESSION['email'])){
                    //       $get_email = "select * from customer";
                    //       $run = mysqli_query($db,$get_email);
                    //       $row_mail=mysqli_fetch_array($run); 
                    //       $verify = $row_mail['verified'];

                    //       if($verify = 'inactive'){
                    //         echo "<script>
                    //              inActive();
                    //          </script>";
                    //       }
                                           
                    // }
                    }else{
                        
                        
                            include("payment.php");
                        
                        
                    }
                ?>
            </div>
        


        </div> <!----container ends-->
    </div> <!----content ends-->



            <?php
            include("admin_area/includes/footer.php");
            ?>






<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>




</body>
</html>


