<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Users
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-users"></i>  Users
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile Image</th>
                                <th>Admin Name</th>                           
                                <th>Email Address</th>
                                <th>Position</th>
                                <th>Bio</th>
                                <th>Contact</th>
                                <th>Region</th>
                                <!-- <th>Edit</th>                                
                                <th>Delete</th> -->
                                
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_admin ="select * from admins";

                                $run_admin = mysqli_query($con, $get_admin);

                                while($row_c=mysqli_fetch_array($run_admin)){

                                    $admin_id = $row_c['admin_id'];

                                    $a_image= $row_c['admin_image'];

                                    $a_name = $row_c['admin_name'];

                                    $a_email = $row_c['admin_email'];

                                    $a_contact = $row_c['admin_contact'];

                                    $a_bio = $row_c['admin_about'];

                                    $a_region = $row_c['admin_state'];

                                    $a_password = sha1($row_c['admin_pass']);

                                    $a_job = $row_c['admin_position'];

                                    

                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><img src="admin_images/<?php echo $a_image; ?>" width="60" height="60"></td>
                                <td><?php echo $a_name; ?></td>             
                                <td><?php echo $a_email; ?></td>
                                <td><?php echo $a_job; ?></td>
                                <td><?php echo $a_bio; ?></td> 
                                <td><?php echo $a_contact; ?></td>  
                                <td><?php echo $a_region; ?></td>
                                
                                
                                
                                <!-- <td>
                                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                                        <i class="fa fa-pencil"></i>  Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="index.php?delete_user=<?php echo $admin_id; ?>">
                                        <i class="fa fa-trash"></i>  Delete
                                    </a>
                                </td> -->
                              
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