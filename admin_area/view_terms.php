<?php

 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php', '_self')</script>";

    }else{

   

?>
<div class=div class="row" style="margin-top:60px;">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  Dashboard / View Terms & Conditions
            </li>
        </ol>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dropbox fa-fw"></i>  Terms & Condititons </h3>
            </div>


            <div class="panel-body">
                <?php
                    $get_term = "select * from terms";

                    $run_term = mysqli_query($con,$get_term);

                    while($row_term=mysqli_fetch_array($run_term)){

                        $term_id = $row_term['term_id'];

                        $term_title = $row_term['term_title'];

                        $term_link = $row_term['term_link'];

                        $term_desc = $row_term['term_desc'];

                       

                    

                    
                ?>

                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                                <?php echo $term_title; ?>
                            </h3>
                        </div>

                        <div class="panel-body">

                            <p> <?php echo $term_desc; ?></p>
                            
                            <a href=""><?php echo $term_link; ?></a>


                        </div>

                        <div class="panel-footer">
                            <center>
                                <a href="index.php?edit_term=<?php echo $term_id; ?>" class="pull-left">
                                    <i class="fa fa-pencil"></i>  Edit
                                </a>
                                <a href="index.php?delete_term=<?php echo $term_id; ?>" class="pull-right">
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