

       <?php
       
            $customer_session = $_SESSION['email'];
            $get_customer = "select * from customer where email='$customer_session'";
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_image = $row_customer['profile_image'];
            $customer_lastname = $row_customer['last_name'];
            $c_email = $row_customer['email'];
            if(!isset($_SESSION['email'])){

            }else{
                echo"
                    <center>
                        <img src ='customer_image/$customer_image' class='img-responsive'>
                    <center>
                    <br/>
                

                ";
            }

       ?>
 
                <script src="js/jquery-3.4.1.min.js"></script>
                <script src="js/sweetalert2.all.min.js"></script>

            <div class="support-menu">
                <nav class="vertical">
                    <ul>
                        <li>
                            <a>Hello  <?php echo $customer_lastname?></a>
                            <div>
                                <ul>
                                    <li class="<?php if(isset ($_GET['my_orders'])){echo "active";} ?>">
                                        <a href="my_account.php?my_orders">
                                            <i class="fa fa-list"></i>  My Orders
                                        </a>
                                    </li>


                                    <li class="<?php if(isset ($_GET['edit_account'])){echo "active";} ?>">
                                        <a href="my_account.php?edit_account">
                                            <i class="fa fa-pencil"></i>  Edit Account
                                        </a>
                                    </li>

                                    <li class="<?php if(isset ($_GET['change_p'])){echo "active";} ?>">
                                        <a href="my_account.php?change_p">
                                            <i class="fa fa-user"></i>  Change Password
                                        </a>
                                    </li>

                                    <li class="<?php if(isset ($_GET['delete_account'])){echo "active";} ?>">
                                        <a href="my_account.php?delete_account" class="del">
                                            <i class="fa fa-trash-o"></i>  Delete Account
                                        </a>
                                    </li>

                                    <script>
                                        $('.del').on('click', function (e){
                                            e.preventDefault();
                                            const href = $(this).attr('href')
                                            Swal.fire({
                                                icon:'warning',
                                                title: 'Do you really want to delete your account?',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor : '#dd3',
                                                confirmButtonText: 'Delete Account'
                                            }).then((result) =>{
                                                if(result.value){
                                                    document.location.href = href;
                                                }
                                            })
                                        })
                                    
                                    </script>

                                    <li>
                                        <a href="logout.php">
                                            <i class="fa fa-sign-out"></i>  Log Out
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </li>

                    

            
                        <li>
                            <a href="../contact.php">Support Forum</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>

