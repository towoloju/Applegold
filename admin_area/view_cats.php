<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / View Categories
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-tag fa-fw"></i>  Categories </h3>
            </div>


            <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Title</th>
                            <th>Category Image</th>
                            <th>Top Category</th>
                            <th>Edit Category</th>
                            <th>Delete Category</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=0;

                            $get_cats ="select * from categories";

                            $run_cats = mysqli_query($con,$get_cats);

                            while($row_cats= mysqli_fetch_array($run_cats)){

                                $cat_id = $row_cats['category_id'];

                                $cat_title =$row_cats['category_title'];

                                $cat_top = $row_cats['cat_top'];

                                $cat_image = $row_cats['cat_image'];

                                $i++;
                            
                        ?>
                    
                    </tbody>
                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td> <?php echo $cat_title; ?> </td>
                                
                                <td><img src="category_images/<?php echo $cat_image; ?>" width="60" height="60"></td>
                                <td > <?php echo $cat_top; ?> </td>
                                <td>
                                    <a href="index.php?edit_cat=<?php echo $cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                </td>
                                <td>
                                <a href="index.php?delete_cat=<?php echo $cat_id; ?>">
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