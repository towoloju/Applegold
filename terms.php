
<?php 
 $active='Shop';
    include("includes/header.php");
    include("includes/db.php");
    
?>


    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Terms & Condititons | Refund</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->

            <div class="col-md-3">
                <div class="box">
                    <ul class="nav nav-pills nav-stacked">
                        <?php
                            $get_terms = "select * from terms LIMIT 0,1";

                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms=mysqli_fetch_array($run_terms)){
                               

                                $term_title = $row_terms['term_title'];

                                $term_link = $row_terms['term_link'];
                                
                                


                         
                        
                        ?>

                        <li class="active">
                                <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                                    <?php
                                        echo $term_title;
                                    ?>
                                </a>
                        </li>


                        <?php
                            }
                        ?> 



                        <?php
                            $count_terms = "select * from terms";

                            $run_count_terms = mysqli_query($con,$count_terms);
                            $count = mysqli_num_rows($run_count_terms);
                            $get_terms = "select * from terms LIMIT 1, $count";
                            $run_terms = mysqli_query($con,$get_terms);
                            while($row_terms=mysqli_fetch_array($run_terms)){
                                $term_title = $row_terms['term_title'];

                                $term_link = $row_terms['term_link'];
                            

                            

                        ?>

                        <li class="">
                            <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                                <?php
                                    echo $term_title;
                                ?>
                            </a>
                        </li>

                        <?php
                            }
                        ?>

                    </ul>

                            
                            
                </div>

            </div>

            <div class="col-md-9">
                <div class="box">
                    <div class="tab-content">
                            <?php
                            
                                $get_terms = "select * from terms LIMIT 0,1";

                                $run_terms = mysqli_query($con,$get_terms);
                                while($row_terms=mysqli_fetch_array($run_terms)){
                                    $term_id = $row_terms['term_id'];
                                    $term_desc = $row_terms['term_desc'];
                                    
                                    $term_title = $row_terms['term_title'];

                                    $term_link = $row_terms['term_link'];
                                    
                                
                            
                            ?>
 

                                <div id="<?php echo $term_link?>" class="tab-pane fade in active">
                                    <h1 class="tabTitle"><?php echo $term_title;?></h1>
                                    <p class="tabDesc"><?php echo $term_desc; ?></p>
                                </div>


                            <?php } ?>

                            <?php
                                $count_terms = "select * from terms";

                                $run_count_terms = mysqli_query($con,$count_terms);
                                $count = mysqli_num_rows($run_count_terms);
                                $get_terms = "select * from terms LIMIT 1, $count";
                                $run_terms = mysqli_query($con,$get_terms);
                                while($row_terms=mysqli_fetch_array($run_terms)){
                                    $term_title = $row_terms['term_title'];
                                    $term_desc = $row_terms['term_desc'];
                                    $term_link = $row_terms['term_link'];
                                

                            

                            ?>
                                <div id="<?php echo $term_link?>" class="tab-pane fade in ">
                                    <h1 class="tabTitle"><?php echo $term_title;?></h1>
                                    <p class="tabDesc"><?php echo $term_desc; ?></p>
                                </div>

                            <?php } ?> 
                    </div>
                </div>
            </div>


        



        </div> <!----containerends-->
    </div> <!----content ends-->

   
    <?php

    include("admin_area/includes/footer.php");
    ?>




<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>

</body>
</html>
    