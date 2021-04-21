<?php

      if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{
?>



<div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>   Dashboard / View Product Brands
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-star"></i>  Product Brands
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class= "table table-striped table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Brand Name</th>
                                <th>Brand Image</th>
                                <th>Top Brand</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $i=0;

                                $get_p ="select * from producer";

                                $run_p = mysqli_query($con, $get_p);

                                while($row_p = mysqli_fetch_array($run_p)){

                                    $producer_id = $row_p['producer_id'];

                                    $producer_title = $row_p['producer_title'];

                                    $producer_image = $row_p['producer_image'];

                                    $producer_top = $row_p['producer_top'];

                                    $i++;

                                
                            ?>

                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php echo $producer_title; ?></td>
                                <td><img src="brand_images/<?php echo $producer_image; ?>" width="60" height="60"></td>
                                <td><?php echo $producer_top; ?></td>
                                <td>
                                    <a href="index.php?delete_brand=<?php echo $producer_id; ?>">
                                        <i class="fa fa-trash"></i>  Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_brand=<?php echo $producer_id; ?>">
                                        <i class="fa fa-pencil"></i>  Edit
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