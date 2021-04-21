<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / View Slides
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-gear fa-fw"></i>  Slides </h3>
            </div>


            <div class="panel-body">
                <?php
                    $get_slide = "select * from slider";

                    $run_slide = mysqli_query($con,$get_slide);

                    while($row_slide=mysqli_fetch_array($run_slide)){

                        $slide_id = $row_slide['slide_id'];

                        $slide_name = $row_slide['slide_name'];

                        $slide_image = $row_slide['slide_image'];

                        $slide_title = $row_slide['slide_title'];

                        $slide_caption = $row_slide['slide_caption'];

                        $slide_link = $row_slide['slide_link'];

                        $slide_url = $row_slide['slide_url'];

                    

                    
                ?>

                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                                <?php echo $slide_name; ?>
                            </h3>
                        </div>

                        <div class="panel-body">

                            <img src="slide_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name?>" class="img-responsive">
                            <h4><?php echo $slide_title; ?></h4>
                            <p> <?php echo $slide_caption; ?></p>
                            <p><?php echo $slide_link;?></p>
                            <a href=""><?php echo $slide_url; ?></a>


                        </div>

                        <div class="panel-footer">
                            <center>
                                <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left">
                                    <i class="fa fa-pencil"></i>  Edit
                                </a>
                                <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right">
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