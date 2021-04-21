<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>

    
    <div class="row" style="margin-top:60px;"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <ol class="breadcrumb"> <!---breadcrumb begins-->
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Sign Up
                </li>
            </ol> <!---breadcrumb ends--->
        </div> <!--col-lg-12 ends-->
    </div>

    <div class="row"> <!--row begins-->
        <div class="col-lg-12"> <!--col-lg-12 begins-->
            <div class="panel panel-primary"> <!--panel panel-default begins-->
                <div class="panel-heading"> <!--panel-heading begins-->
                    <h3 class="panel-title" align="center"> <!--col-lg-12 begins-->
                        <i class="fa fa-user fa-fw"></i> Sign Up
                    </h3> <!--col-lg-12 begins-->
                </div> <!--panel-heading ends-->
                

                <div class="panel-body">  <!--panel-body begins-->
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Admin Name </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="admin_name" required> 

                            </div>
                        </div>  

                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Profile Image </label>
                            <div class="col-md-6">
                            <input type="file" class="form-control" name="admin_image" >

                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Email Address </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="admin_email" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Phone Number</label>
                            <div class="col-md-6">
                            <input type="tel" class="form-control" name="admin_contact" required>

                            </div>
                        </div>
  


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Admin Role/Position </label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="admin_position" required>

                            </div>
                        </div>  


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Region</label>
                            <div class="col-md-6">
                            <input type="text"  class="form-control" name="admin_state" required>

                            </div>
                        </div>  



                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Password</label>
                            <div class="col-md-6">
                            <input type="password"  class="form-control" name="admin_pass" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label col-md-3"> Admin Bio</label>
                            <div class="col-md-6">
                            <textarea name="admin_about" cols="10" rows="5" class="form-control"></textarea>

                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label for="" class="control-label col-md-3"></label>
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-primary form-control" name="submit" value="Register">

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
        function registerSuccess(){
            Swal.fire({
                title: 'Successful',
                text: 'Registration successful, please login',
                icon: 'success'
            }).then(function(){
                window.location = 'login.php'
            });
    
        }



        function error(){
            Swal.fire({
                title: 'Oops',
                text: 'Something went wrong',
                icon: 'info'
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


      $image = $_FILES['admin_image']['name'];
      $temp_name = $_FILES['admin_image']['tmp_name'];

      move_uploaded_file($temp_name, "admin_images/$image");

      $insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_state,admin_about,admin_contact,admin_position) values
      ('$admin','$email','$password','$image','$region','$bio','$contact','$position')";

      $run_admin = mysqli_query($con,$insert_admin);

      if($run_admin){
      
             echo "<script> registerSuccess(); </script>";
        }else{
            echo "<script> error(); </script>";

        }
    
    }
?>


<?php 
    }
?>