<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>
<?php
    
     if(isset($_GET['user_profile'])){

        $edit_id =$_GET['user_profile'];

        $get_admin ="select * from admins where admin_id='$edit_id'";

        $run_admin= mysqli_query($con, $get_admin);

        $row_edit = mysqli_fetch_array($run_admin);

        $a_id = $row_edit['admin_id'];

        $name = $row_edit['admin_name'];

        $image = $row_edit['admin_image'];

        $email = $row_edit['admin_email'];

        $contact = $row_edit['admin_contact'];

        $position = $row_edit['admin_position'];

        $region = $row_edit['admin_state'];

        $bio = $row_edit['admin_about'];

        $password = $row_edit['admin_pass'];


    }





?>
    
    <div class="row" style="margin-top:60px;"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <ol class="breadcrumb"> <!---breadcrumb begins-->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Edit Account
                </li>
            </ol> <!---breadcrumb ends--->
        </div> <!--col-lg-12 ends-->
    </div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->
                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-user fa-fw"></i> Edit Account
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->
            
                <div class="panel-body">  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Fullname</label>
                            <div class="col-md-6">
                            <input type="text"class="form-control" name="admin_name" value="<?php echo $name; ?>" required> 

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Profile Image</label>
                            <div class="col-md-6">
                                <input type="file"  class="form-control" name="admin_image">
                                
                                <img src="admin_images/<?php echo $image; ?>" alt="" width="60" height="70">
                        
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Email Address</label>
                            <div class="col-md-6">
                            <input type="text" placeholder="Email Address" class="form-control" name="admin_email" value="<?php echo $email; ?>" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Position </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_position" value="<?php echo $position; ?>" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Region </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_state" value="<?php echo $region; ?>" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Phone Number </label>
                            <div class="col-md-6">
                            <input type="tel"  class="form-control" name="admin_contact" value="<?php echo $contact; ?>" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Password </label>
                            <div class="col-md-6">
                            <input type="password" class="form-control" name="admin_pass" value="<?php echo $password; ?>" required>

                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Password </label>
                            <div class="col-md-6">
                                <textarea name="admin_about" cols="10" rows="5" class="form-control">
                                     <?php echo $bio; ?>
                                </textarea>
                            </div>
                        </div>


  
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> </label>
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-primary btn-product" name="submit" value="Update Account">                            

                            </div>
                        </div>
                            
    
                    </form>
                </div> <!--panel-body ends-->
                
               
            </div> <!--panel panel-default-->
        </div> <!--col-lg-12 ends-->
    </div> <!--row ends-->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <script >
     
        function accountUpdate(){
            Swal.fire({
                title: 'Updated',
                text: 'Account updated successfully, please login',
                icon: 'success'
            }).then(function(){
                window.location = 'login.php'
            });
    
        }

        function error(){
            Swal.fire({
                title: 'Oops ...',
                text: 'Something went wrong',
                icon: 'error'
            })
        }

    
    </script>

<?php
    if(isset($_POST['submit'])){
      $admin = $_POST['admin_name'];  
      $email = $_POST['admin_email'];
      $position = $_POST['admin_position'];
      $region = $_POST['admin_state'];
      $password = $_POST['admin_pass'];
      $contact = $_POST['admin_contact'];
      $bio = $_POST['admin_about'];
   

        if(is_uploaded_file($_FILES['admin_image']['name'])){

            $image = $_FILES['admin_image']['name'];

            $temp_name = $_FILES['admin_image']['tmp_name'];

            $update_admin = "update admins set  admin_name='$admin', admin_email='$email', admin_image='$image', admin_position='$position',
            admin_state='$region', admin_pass='$password', admin_contact='$contact', admin_about='$bio'  where admin_id='$a_id'";

            $run_admin= mysqli_query($con,$update_admin);

            if($run_admin){

                    echo "<script> accountUpdate(); </script>";

                }else{

                    echo "<script> error(); </script>";

                }
        }else{
            $update_admin = "update admins set  admin_name='$admin', admin_email='$email', admin_position='$position',
            admin_state='$region', admin_pass='$password', admin_contact='$contact', admin_about='$bio'  where admin_id='$a_id'";

            $run_admin= mysqli_query($con,$update_admin);

            if($run_admin){

                    echo "<script> accountUpdate(); </script>";

                }else{

                    echo "<script> error(); </script>";

                }
        }

    }
?>




<?php 
    }
?>

