<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / View Products Options
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dropbox fa-fw"></i>  Product Options </h3>
            </div>


            <div class="panel-body">
                <?php
                    $get_box = "select * from boxes";

                    $run_box = mysqli_query($con,$get_box);

                    while($row_slide=mysqli_fetch_array($run_box)){

                        $box_id = $row_slide['box_id'];

                        $box_title = $row_slide['box_title'];

                        $box_image = $row_slide['box_image'];

                        $box_desc = $row_slide['box_desc'];

                        $box_url = $row_slide['box_url'];

                    

                    
                ?>

                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                                <?php echo $box_title; ?>
                            </h3>
                        </div>

                        <div class="panel-body">

                            <img src="../images/<?php echo $box_image; ?>" alt="<?php echo $box_title?>" class="img-responsive">
                            <p> <?php echo $box_desc; ?></p>
                            
                            <a href=""><?php echo $box_url; ?></a>


                        </div>

                        <div class="panel-footer">
                            <center>
                                <a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left">
                                    <i class="fa fa-pencil"></i>  Edit
                                </a>
                                <a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right">
                                    <i class="fa fa-trash"></i>  Delete
                                </a>
                                <div class="clearfix"></div>
                            </center>
                        </div>
                    </div>
                </div>

                <?php } ?>


            </div>
        </div>
    </div>
</div>


<?php
    }

?>