<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>

<nav class="navbar  navbar-fixed-top">
    <div class="navbar-header">
        <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target=".navbar-exl-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="index.php?dashboard" class="navbar-brand"> Admin Area</a>

    </div>



    <ul class="nav navbar-right top-nav">
        <li class="dropdown">

            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>    <?php echo $admin_name; ?>
                 <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"> </i>  Profile
                    </a>
                </li>

                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"><span class="badge"><?php echo $count_products; ?></span></i>   Products
                    </a>
                </li>

                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-user"><span class="badge"><?php echo $count_customers; ?></span></i>   Customers
                    </a>
                </li>

                <li>
                    <a href="index.php?view_cats">
                        <i class="fa fa-fw fa-gear"><span class="badge"><?php echo $count_p_cat ?></span></i>  Product Categories
                    </a>
                </li>

                <li class="divider"></li>


                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i>  Logout
                    </a>
                </li>
                
            </ul>
        </li>
    </ul>



    <div class="collapse navbar-collapse navbar-exl-collapse">
    
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i>  Dashboard
                </a>
            
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-tag"></i>  Products
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="products" class="collapse">
                    <li><a href="index.php?insert_product"> Insert Product</a></li>
                    <li><a href="index.php?view_products"> View Products</a></li>
                </ul>
            
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#brand">
                    <i class="fa fa-fw fa-star"></i>  Product Brand
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="brand" class="collapse">
                    <li><a href="index.php?insert_brand"> Insert Product Brand</a></li>
                    <li><a href="index.php?view_brands"> View Product Brands</a></li>
                </ul>
            
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-edit"></i>  Product Categories
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="p_cat" class="collapse">
                    <li><a href="index.php?insert_p_cat"> Insert Product Category</a></li>
                    <li><a href="index.php?view_p_cats"> View Product Categories</a></li>
                </ul>
            
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-edit"></i>  Categories
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="cat" class="collapse">
                    <li><a href="index.php?insert_cat"> Insert Category</a></li>
                    <li><a href="index.php?view_cats"> View Categories</a></li>
                </ul>
            
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#slide">
                    <i class="fa fa-fw fa-gear"></i>  Slides
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="slide" class="collapse">
                    <li><a href="index.php?insert_slide"> Insert Slide</a></li>
                    <li><a href="index.php?view_slides"> View Slides</a></li>
                </ul>
            
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#box">
                    <i class="fa fa-fw fa-dropbox"></i>  Product Options
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="box" class="collapse">
                    <li><a href="index.php?insert_box"> Insert Product Options</a></li>
                    <li><a href="index.php?view_boxes"> View Product Options</a></li>
                </ul>
            
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#coupon">
                    <i class="fa fa-fw fa-money"></i>  Coupons
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="coupon" class="collapse">
                    <li><a href="index.php?insert_coupon"> Insert Coupons</a></li>
                    <li><a href="index.php?view_coupons"> View Coupons</a></li>
                </ul>
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#terms">
                    <i class="fa fa-fw fa-table"></i>  Terms & Conditions
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="terms" class="collapse">
                    <li><a href="index.php?insert_terms"> Insert Terms & Conditions</a></li>
                    <li><a href="index.php?view_terms"> View Terms & Conditions</a></li>
                </ul>
            
            </li>


            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </li>

            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a>
            </li>

            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>

            <li>
                <a href="index.php?editor">
                    <i class="fa fa-fw fa-pencil"></i> CSS Editor
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#user">
                    <i class="fa fa-fw fa-user"> </i>  Users
                    <i class="fa fa-fw fa-caret-down"> </i>
                </a>

                <ul id="user" class="collapse">
                    <li><a href="index.php?insert_user"> Sign Up</a></li>
                    <li><a href="index.php?user_profile=<?php echo $admin_id ?>"> Edit Account</a></li>
                    <li><a href="index.php?delete_account=<?php echo $admin_id ?>"> Delete Account</a></li>
                    <li><a href="index.php?view_users"> View Admin Users</a></li>
                   
                </ul>
            
            </li>


            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"> </i>  Logout
                </a>
            </li>

        </ul>
        
    </div>


</nav>

<?php
    }
?>