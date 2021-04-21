<?php
    $customer_session = $_SESSION['email'];

    $get_customer = "select * from customer where email = '$customer_session'";

    $run_customer = mysqli_query($con,$get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];
    
    $c_firstname = $row_customer['first_name'];

    $c_lastname = $row_customer['last_name'];

    $c_email = $row_customer['email'];

    $c_phonenumber = $row_customer['phone_number'];

    $c_address = $row_customer['address'];

    $c_region = $row_customer['region'];

    $c_postalcode = $row_customer['postal_code'];

    $c_image = $row_customer['profile_image'];

?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
            function update(){
                Swal.fire({
                    text: 'Your account has been updated successfully, please refresh',
                    title: 'Success',
                    icon: 'success'
                })
            }
    </script>




    <form action="" method="post" enctype="multipart/form-data">

        <h1 align="center" class="confirm-text">My Account</h1>

        <div class="main-container">
            <div class="form-confirm">   

                <img src="customer_image/<?php echo $c_image; ?>" class="image_responsive account-img" alt="Profile Picture">
                <input type ="file" class="right-control pic" id="c_image"  name="c_image" placeholder="Upload Picture">
                <input type ="text" class="control" id="firstname" name ="firstname" value="<?php echo $c_firstname; ?>" placeholder= "First Name" required>
                <input type ="text" class="right-control" id="lastname" name="lastname" value="<?php echo $c_lastname; ?>" placeholder="Last Name" required>
                <input type="email" class="control" id="email" name ="email" value="<?php echo $c_email; ?>" placeholder ="Email Address" required>
                <input type="tel"  class="right-control"  id="phone" name="phonenumber" value="<?php echo $c_phonenumber; ?>" required placeholder="123-4567-8987" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required>
                                   
                <input type ="text" class="control" id="address" name="address" value="<?php echo $c_address; ?>" placeholder="Address" required>
                <input type ="text" class="right-control" id="region" name="region" value="<?php echo $c_region; ?>" placeholder="Region/State" required>
                <input type ="text" class="control" id="postalcode" name="postalcode" value="<?php echo $c_postalcode; ?>" placeholder="Postal Code">                                        
                <div class="btn">
                    <button class="btn btn-primary btn-account"  name="update">
                        <i class="fa fa-user"></i> Update Account
                    </button>
                </div>

            </div>
        </div>

    </form>
<?php

    if(isset($_POST['update'])){

        $update_id = $customer_id;

        $firstname = $_POST['firstname'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $phonenumber = $_POST['phonenumber'];

        $address = $_POST['address'];

        $region = $_POST['region'];

        $postalcode = $_POST['postalcode'];

        $image = $_FILES['c_image']['name'];

        $image_tmp = $_FILES['c_image']['tmp_name'];

        move_uploaded_file ($image_tmp,"customer_image/$image");

        $update_customer = "update customer set first_name='$firstname', last_name='$lastname', email='$email',
        phone_number='$phonenumber', address='$address', region='$region', postal_code='$postalcode',
        profile_image='$image' where email='$customer_session'";

        $run_customer = mysqli_query($con,$update_customer);

        if($run_customer){
            echo" <script>update();</script>";
            //echo" <script>window.open('my_account.php?edit_account','_self')</script>";
        }


    }

?>


            
