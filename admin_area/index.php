<?php

    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
        $admin_session = $_SESSION['admin_email'];

        $get_admin = "select * from admins where admin_email ='$admin_session'";

        $run_admin = mysqli_query($con, $get_admin);

        $row_admin = mysqli_fetch_array($run_admin);

        $admin_id = $row_admin['admin_id'];

        $admin_name = $row_admin['admin_name'];

        $admin_email = $row_admin['admin_email'];

        $admin_img = $row_admin['admin_image'];

        $admin_state = $row_admin['admin_state'];

        $admin_about = $row_admin['admin_about'];

        $admin_contact = $row_admin['admin_contact'];

        $admin_position = $row_admin['admin_position'];




        $get_products ="select * from product";

        $run_products = mysqli_query($con,$get_products);

        $count_products = mysqli_num_rows($run_products);



        $get_customers ="select * from customer";

        $run_customers= mysqli_query($con,$get_customers);

        $count_customers = mysqli_num_rows($run_customers);




        $get_p_cat = "select * from product_category";

        $run_p_cat = mysqli_query($con,$get_p_cat);

        $count_p_cat = mysqli_num_rows($run_p_cat);




        $get_pending_orders = "select * from pending_orders";

        $run_pending_orders = mysqli_query($con,$get_pending_orders);

        $count_pending_orders = mysqli_num_rows($run_pending_orders);

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" type="text/css" href="css/admin_main.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>   
</head>



<body>
    <div id="wrapper">
        <?php
            include('includes/admin_sidebar.php')
        ?>


        <div id="page-wrapper">
            <div class="container-fluid">

                <?php
                     //dashboard
                    if(isset($_GET['dashboard'])){
                        include('dashboard.php');
                    }

                    //Products
                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }                   
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['delete_product'])){
                        include('delete_product.php');
                    }
                    if(isset($_GET['edit_product'])){
                        include('edit_product.php');
                    }


                     //Product Brand
                     if(isset($_GET['insert_brand'])){
                        include('insert_brand.php');
                    }
                    if(isset($_GET['view_brands'])){
                        include('view_brands.php');
                    }
                    if(isset($_GET['delete_brand'])){
                        include('delete_brand.php');
                    }
                    if(isset($_GET['edit_brand'])){
                        include('edit_brand.php');
                    }


                    //Product Category
                    if(isset($_GET['insert_p_cat'])){
                        include('insert_p_cat.php');
                    }
                    if(isset($_GET['view_p_cats'])){
                        include('view_p_cats.php');
                    }
                    if(isset($_GET['delete_p_cat'])){
                        include('delete_p_cat.php');
                    }
                    if(isset($_GET['edit_p_cat'])){
                        include('edit_p_cat.php');
                    }



                    //Categories
                    if(isset($_GET['insert_cat'])){
                        include('insert_cat.php');
                    }
                    if(isset($_GET['view_cats'])){
                        include('view_cats.php');
                    }
                    if(isset($_GET['delete_cat'])){
                        include('delete_cat.php');
                    }
                    if(isset($_GET['edit_cat'])){
                        include('edit_cat.php');
                    }




                    //Slides
                    if(isset($_GET['insert_slide'])){
                        include('insert_slide.php');
                    }
                    if(isset($_GET['view_slides'])){
                        include('view_slides.php');
                    }
                    if(isset($_GET['delete_slide'])){
                        include('delete_slide.php');
                    }
                    if(isset($_GET['edit_slide'])){
                        include('edit_slide.php');
                    }


                    //Product Options
                    if(isset($_GET['insert_box'])){
                        include('insert_box.php');
                    }
                    if(isset($_GET['view_boxes'])){
                        include('view_boxes.php');
                    }
                    if(isset($_GET['delete_box'])){
                        include('delete_box.php');
                    }
                    if(isset($_GET['edit_box'])){
                        include('edit_box.php');
                    }


                    //Coupons
                    if(isset($_GET['insert_coupon'])){
                        include('insert_coupon.php');
                    }
                    if(isset($_GET['view_coupons'])){
                        include('view_coupons.php');
                    }
                    if(isset($_GET['delete_coupon'])){
                        include('delete_coupon.php');
                    }
                    if(isset($_GET['edit_coupon'])){
                        include('edit_coupon.php');
                    }


                    
                    //Terms & Conditions
                    if(isset($_GET['insert_terms'])){
                        include('insert_terms.php');
                    }
                    if(isset($_GET['view_terms'])){
                        include('view_terms.php');
                    }
                    if(isset($_GET['delete_term'])){
                        include('delete_term.php');
                    }
                    if(isset($_GET['edit_term'])){
                        include('edit_term.php');
                    }




                    //Customers
                    if(isset($_GET['view_customers'])){
                        include('view_customers.php');
                    }
                    if(isset($_GET['delete_customer'])){
                        include('delete_customer.php');
                    }


                    //Orders
                    if(isset($_GET['view_orders'])){
                        include('view_orders.php');
                    }
                    if(isset($_GET['delete_order'])){
                        include('delete_order.php');
                    }

                    
                    //Payments
                    if(isset($_GET['view_payments'])){
                        include('view_payments.php');
                    }
                    if(isset($_GET['delete_payment'])){
                        include('delete_payment.php');
                    }




                     //CSS Editor
                     if(isset($_GET['editor'])){
                        include('editor.php');
                    }
                 

                    //Users
                    if(isset($_GET['insert_user'])){
                        include('insert_user.php');
                    }
                    if(isset($_GET['view_users'])){
                        include('view_users.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                    if(isset($_GET['user_profile'])){
                        include('user_profile.php');
                    }

                ?> 
               
            </div>
        </div>
    </div>
    




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php

    }

?>