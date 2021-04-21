<?php
    $aBrand =  array();
    $aCat = array();
    $aPcat = array();


    //For Product Brands

    if(isset($_REQUEST['brand'])&&is_array($_REQUEST['brand'])){

        foreach($_REQUEST['brand'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aBrand[(int)$sVal] = (int)$sVal;


            }
        }
    }

    //For Product Categories

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aPcat[(int)$sVal] = (int)$sVal;


            }
        }
    }


    //For Categories

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aCat[(int)$sVal] = (int)$sVal;


            }
        }
    }

?>

<div class="support-menu">
    <nav class="vertical">
        <ul>
            <li>    
              
                <div class="panel-heading panel-primary">
                    <h3>Product Brand</h3><!---Title-->
                    
                    <a href="JavaScript:Void(0);"> <!---Hide-->
                        <span class="nav-toggle hide-show">
                            Hide
                        </span>
                    </a> <!---Hide Ends-->
                </div>            
                
                

                <div class="panel-collapse collapse-data">
            
                    <div class="panel-body"> <!---Body-->

                        <div class="input-group"> <!---Form box-->
                            <input type="text" class="form-control" placeholder="Filter Brands"  
                            id="dev-table-filter" data-filters="#dev-brands" data-action="filter"> <!---Search Box-->

                            <a href="" class="input-group-addon">
                                <i class="fa fa-search"></i> <!---Icon-->
                            </a>

                        </div>
                    </div>

                    <div class="panel-body scroll-menu" >
                        <ul id="dev-brands"> <!---Lists-->
                            <?php
                            
                                // getPCats();
                                $get_producer = "select * from producer where producer_top='yes'";
                                $run_producer = mysqli_query($con,$get_producer);

                                while($row_p=mysqli_fetch_array($run_producer)){
                                    $producer_id = $row_p['producer_id'];
                                    $producer_title = $row_p['producer_title'];
                                    $producer_top = $row_p['producer_top'];
                                    $producer_image = $row_p['producer_image'];

                                    if($producer_image == ""){

                                    }else{
                                        $producer_image = "<img src = 'admin_area/brand_images/$producer_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li class='checkbox checkbox-primary active '> 
                                            <a style='background:#fcfcfc'>
                                                <label>
                                                    <input ";
                                                    //once its checked users cannot check another list
                                                    if(isset($aBrand[$producer_id])){
                                                        echo"checked='checked'";
                                                    }
                                                    
                                                    
                                                    
                                                    echo" type='checkbox' value='$producer_id' class='get_producer' name='producer' style='margin-top:2px;'>
                                                    <span>
                                                        $producer_image
                                                        $producer_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                                $get_producer = "select * from producer where producer_top='no '";
                                $run_producer = mysqli_query($con,$get_producer);

                                while($row_p=mysqli_fetch_array($run_producer)){
                                    $producer_id = $row_p['producer_id'];
                                    $producer_title = $row_p['producer_title'];
                                    $producer_top = $row_p['producer_top'];
                                    $producer_image = $row_p['producer_image'];

                                    if($producer_image == ""){

                                    }else{
                                        $producer_image = "<img src = 'admin_area/brand_images/$producer_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li class='checkbox checkbox-primary'> 
                                            <a>
                                                <label>
                                                    <input ";

                                                            if(isset($aBrand[$producer_id])){
                                                                echo"checked='checked'";
                                                            }
                                                    
                                                    echo "type='checkbox' value='$producer_id' class='get_producer' name='producer' style='margin-top:2px;'>
                                                    <span>
                                                        $producer_image
                                                        $producer_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                             
                            ?>
                        </ul>
                    </div>

                       
                    


                </div>
                
            </li>

            <li>                
                <div class="panel-heading panel-primary">
                    <h3>Product Category</h3><!---Title-->
                    
                    <a href="JavaScript:Void(0);" > <!---Hide-->
                        <span class="nav-toggle hide-show">
                            Hide
                        </span>
                    </a> <!---Hide Ends-->
                </div> 

                <div class="panel-collapse collapse-data">
            
                <div class="panel-body"> <!---Body-->

                    <div class="input-group"> <!---Form box-->
                        <input type="text" class="form-control" placeholder="Filter Product Category"  
                        id="dev-table-filter" data-filters="#devpcat" data-action="filter"> <!---Search Box-->

                        <a href="" class="input-group-addon">
                            <i class="fa fa-search"></i> <!---Icon-->
                        </a>

                    </div>
                </div>

                    <div class="panel-body scroll-menu" >
                        <ul id="devpcat"> <!---Lists-->
                            <?php
                            
                                // getPCats();
                                $get_product = "select * from product_category where p_cat_top='yes'";
                                $run_product = mysqli_query($con,$get_product);

                                while($row_p=mysqli_fetch_array($run_product)){
                                    $p_cat_id = $row_p['p_category_id'];
                                    $p_cat_title = $row_p['p_category_title'];
                                    $p_cat_top = $row_p['p_cat_top'];
                                    $p_cat_image = $row_p['p_cat_image'];

                                    if($p_cat_image == ""){

                                    }else{
                                        $p_cat_image = "<img src = 'admin_area/productcat_images/$p_cat_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li  class='checkbox checkbox-primary'> 
                                            <a style='background:#fcfcfc'>
                                                <label>
                                                    <input ";


                                                        if(isset($aPcat[$p_cat_id])){
                                                            echo"checked='checked'";
                                                        }
                                                    
                                                    echo "type='checkbox' value='$p_cat_id' class='get_p_cat' name='product_category' style='margin-top:2px;'>
                                                    <span>
                                                        $p_cat_image
                                                        $p_cat_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                                $get_product = "select * from product_category where p_cat_top='no'";
                                $run_product = mysqli_query($con,$get_product);

                                while($row_p=mysqli_fetch_array($run_product)){
                                    $p_cat_id = $row_p['p_category_id'];
                                    $p_cat_title = $row_p['p_category_title'];
                                    $p_cat_top = $row_p['p_cat_top'];
                                    $p_cat_image = $row_p['p_cat_image'];

                                    if($p_cat_image == ""){

                                    }else{
                                        $p_cat_image = "<img src = 'admin_area/productcat_images/$p_cat_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li  class='checkbox checkbox-primary'> 
                                            <a>
                                                <label>
                                                    <input ";
                                                    
                                                    if(isset($aPcat[$p_cat_id])){
                                                        echo"checked='checked'";
                                                    }
                                                    
                                                    echo" type='checkbox' value='$p_cat_id' class='get_p_cat' name='product_category' style='margin-top:2px;'>
                                                    <span>
                                                        $p_cat_image
                                                        $p_cat_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                             
                            ?>
                        </ul>
                    </div>

                       
                    


                </div>
                
            </li>


            <li>                
                 <div class="panel-heading panel-primary">
                    <h3>Category</h3><!---Title-->
                    
                    <a href="JavaScript:Void(0);" > <!---Hide-->
                        <span class="nav-toggle hide-show">
                            Hide
                        </span>
                    </a> <!---Hide Ends-->
                </div> 

                <div class="panel-collapse collapse-data">
            
                <div class="panel-body"> <!---Body-->

                    <div class="input-group"> <!---Form box-->
                        <input type="text" class="form-control" placeholder="Filter Categories"  
                        id="dev-table-filter" data-filters="#dev-cat" data-action="filter"> <!---Search Box-->

                        <a href="" class="input-group-addon">
                            <i class="fa fa-search"></i> <!---Icon-->
                        </a>

                    </div>
                </div>

                    <div class="panel-body scroll-menu" >
                        <ul id="dev-cat"> <!---Lists-->
                            <?php
                            
                                // getPCats();
                                $get_cat = "select * from categories where cat_top='yes'";
                                $run_cat = mysqli_query($con,$get_cat);

                                while($row_p=mysqli_fetch_array($run_cat)){
                                    $cat_id = $row_p['category_id'];
                                    $cat_title = $row_p['category_title'];
                                    $cat_top = $row_p['cat_top'];
                                    $cat_image = $row_p['cat_image'];

                                    if($cat_image == ""){

                                    }else{
                                        $cat_image = "<img src = 'admin_area/category_images/$cat_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li  class='checkbox checkbox-primary'> 
                                            <a style='background:#fcfcfc'>
                                                <label>
                                                    <input ";
                                                    
                                                        if(isset($aCat[$cat_id])){
                                                            echo"checked='checked'";
                                                        }
                                                    
                                                    echo "type='checkbox' value='$cat_id' class='get_cat' name='category' style='margin-top:2px;'>
                                                    <span>
                                                        $cat_image
                                                        $cat_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                                $get_cat = "select * from categories where cat_top='no'";
                                $run_cat = mysqli_query($con,$get_cat);

                                while($row_p=mysqli_fetch_array($run_cat)){
                                    $cat_id = $row_p['category_id'];
                                    $cat_title = $row_p['category_title'];
                                    $cat_top = $row_p['cat_top'];
                                    $cat_image = $row_p['cat_image'];

                                    if($cat_image == ""){

                                    }else{
                                        $cat_image = "<img src = 'admin_area/category_images/$cat_image' width='20px'>&nbsp ";
                                    }

                                    echo"
                                    
                                        <li  class='checkbox checkbox-primary '> 
                                            <a>
                                                <label>
                                                    <input ";
                                                        if(isset($aCat[$cat_id])){
                                                            echo"checked='checked'";
                                                        }
                                                    echo "type='checkbox' value='$cat_id' class='get_cat' name='categoryr' style='margin-top:2px;'>
                                                    <span>
                                                        $cat_image
                                                        $cat_title
                                                    </span>
                                                </label>
                                            </a>
                                        </li>
                                    ";


                                }

                             
                            ?>
                        </ul>
                    </div>

                    

                </div>
                
            </li>


   
            <li>
                <a href="contact.php">Support Forum</a>
            </li>


            <li>
                <a href="contact.php">Contact Us</a>
            </li>
        </ul>
    </nav>
</div>

