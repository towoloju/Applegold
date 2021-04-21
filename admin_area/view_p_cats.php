<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / View Product Categories
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tag fa-fw"></i>  Product Categories </h3>
            </div>


            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Product Category ID</th>
                            <th>Product Category Title</th>
                            <th>Product Category Image</th>
                            <th>Top Product Category</th>
                            <th>Edit Product Category</th>
                            <th>Delete Product Category</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=0;

                            $get_p_cats ="select * from product_category";

                            $run_p_cats = mysqli_query($con,$get_p_cats);

                            while($row_p_cats= mysqli_fetch_array($run_p_cats)){

                                $p_cat_id = $row_p_cats['p_category_id'];

                                $p_cat_title =$row_p_cats['p_category_title'];

                                $p_cat_top = $row_p_cats['p_cat_top'];

                                $p_cat_image = $row_p_cats['p_cat_image'];

                                $i++;
                            
                        ?>
                    
                    </tbody>
                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td> <?php echo $p_cat_title; ?> </td>
                                <td><img src="productcat_images/<?php echo $p_cat_image; ?>" width="60" height="60"></td>
                                <td> <?php echo $p_cat_top; ?> </td>
                                <td>
                                    <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>

                        <?php
                             }
                        ?>

                  </table>
              </div>
            </div>
        </div>
    </div>
</div>


<?php
    }

?>