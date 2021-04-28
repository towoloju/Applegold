<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Customers
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users"></i>  Customers
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Region</th>
                                <th>Postal Code</th>
                                <th>Verification</th>
                                <th>Token</th>
                                <th>Date</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_customer ="select * from customer";

                                $run_customer = mysqli_query($con, $get_customer);

                                while($row_c=mysqli_fetch_array($run_customer)){

                                    $c_id = $row_c['customer_id'];

                                    $c_image= $row_c['profile_image'];

                                    $c_firstname = $row_c['first_name'];

                                    $c_lastname = $row_c['last_name'];

                                    $c_email = $row_c['email'];

                                    $c_phonenumber = $row_c['phone_number'];

                                    $c_address = $row_c['address'];

                                    $c_region = $row_c['region'];

                                    $c_postalcode = $row_c['postal_code'];

                                    $c_password = sha1($row_c['password']);

                                    $c_verified = $row_c['verified'];

                                    $c_token = $row_c['token'];

                                    $c_time = $row_c['Time'];

                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><img src="../customer/customer_image/<?php echo $c_image; ?>" width="60" height="60"></td>
                                <td><?php echo $c_firstname; ?></td>
                                <td><?php echo $c_lastname; ?></td>
                                <td><?php echo $c_email; ?></td>
                                <td><?php echo $c_phonenumber; ?></td>
                                <td><?php echo $c_address; ?></td>   
                                <td><?php echo $c_region; ?></td>
                                <td><?php echo $c_postalcode; ?></td>
                                <td><?php echo $c_verified; ?></td>
                                <td><?php echo $c_token; ?></td>
                                <td><?php echo $c_time; ?></td>

                                <td>
                                    <a href="index.php?delete_customer=<?php echo $c_id; ?>">
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