<?php
    $active="Cart";
    
    include("includes/db.php");
    include("includes/header.php");
?>
    
  

<section class="container-details">


    <div id="content" class="row"> <!----content begins-->

        <div class="col-md-12 bread-details">
             <!----container begins-->

            <div class="row"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Shop</li>
                  
                    <li>
                        <a href="shop.php?p_category=<?php echo $p_category_id;?>"> <?php echo $pro_title;?></a>
                    </li>

                    <li>
                        <?php echo $pro_title;?>
                    </li>
                    
                </ul> <!----breadcrumb ends-->
            
        </div> <!----col-md-12 ends-->

        <div class="detail-body">
     
    

            <div class="col-md-12"> <!----col-md-9 begins--> 
                <div class='zoom-container detail-body'>

                    <div class='zoom'>
                        <img src='./admin_area/product_images/<?php echo $pro_img1;?>' class='xzoom' xoriginal='admin_area/product_images/<?php echo $pro_img1; ?>'>
                        <?php
                            if($pro_label=='sale'){
                                echo"  <span class='detail-sale'> $pro_label</span>";
                            }elseif($pro_discount!='0'){
                                echo"  <span class='detail-discount'>-$pro_discount%</span>";

                            }elseif($pro_label=='new'){
                                echo"<span class='detail-new'>$pro_label</span>";

                            }
                                

                        ?>
                       
                       



                        <div class='xzoom-thumbs'>

                            <a href='./admin_area/product_images/<?php echo $pro_img1; ?>'>
                                <img class='xzoom-gallery' src='./admin_area/product_images/<?php echo $pro_img1?>'  xpreview='./admin_area/product_images/<?php echo $pro_img1; ?>'>
                            </a>

                            <a href='./admin_area/product_images/ <?php echo $pro_img2; ?>'>
                                <img class='xzoom-gallery' src='./admin_area/product_images/<?php echo $pro_img2; ?>'>
                            </a>
                            <a href='./admin_area/product_images/<?php echo $pro_img3; ?>'>
                                <img class='xzoom-gallery'  src='./admin_area/product_images/<?php echo $pro_img3; ?>'>
                            </a>


                        </div>

                    </div>

                    <div class='xzoom-description'>
                        <h3> <?php echo $pro_title?></h3>
                        <p><?php echo $pro_desc?></p>
                        <p><?php echo $pro_model?></p>

                        
                        
                        <div class='icon'>
                            <p>Share this product</p>
                            <div class='icon-list'>
                                <a href='www.facebook.com' target='_blank'><i class='fa fa-facebook'></i></a>
                                <a href='www.pinterest.com' target='_blank'><i class='fa fa-pinterest'></i></a>
                                <a href='www.twitter.com' target='_blank'><i class='fa fa-twitter'></i></a>
                                <a href='www.instagram.com' target='_blank'><i class='fa fa-whatsapp'></i></a>
                            </div>
                            
                        </div>
                        
                        <hr>

                        <div class='price-detail'>
                            
                            <?php
                                if($pro_discount!='0'){
                                    echo"  
                                            <p> 
                                            Price: <span class='old'>&#36; $pro_oldprice </span>
                                                    <span class='new'>&#36; $pro_newprice </span>
                                            </p>

                                        ";
                                }else{
                                    echo "<p>Price : <span class='pull-right' >&#36;$pro_price</span></p>";
                                }
                               
                            ?>
                            
                        </div>

                        <div class='stock-detail'>
                            <p>Stock : <span> In stock (45 units), ready to be shipped</span></p>
                            <div class='progress'>
                                <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 45%; height: 100%;'>
                                    <span class='sr-only'>45% Complete</span>
                                </div>
                            </div>
                            
                        </div>



                        <?php add_cart() ; ?>

                        <form action='details.php?add_cart=<?php echo $product_id; ?>' method="post">
                            <div class='quantity-detail'>
                                <p>Quantity :</p>
                                <div class='col-lg-2 col-md-3 col-sm-6 quantity-bar'>
                                    <div class='input-group'>
                                        <span class='input-group-btn'>
                                            <button type='button' class='quantity-left-minus btn btn-default btn-number'  data-type='minus' data-field=''>
                                                <span class='glyphicon glyphicon-minus'></span>
                                            </button>
                                        </span>

                                        <input type='text' id='quantity' name='p_quantity' class='form-control input-number' value='1' min='1' max='100'>
                                        <span class='input-group-btn'>
                                            <button type='button' class='quantity-right-plus btn btn-default btn-number' data-type='plus' data-field=''>
                                                <span class='glyphicon glyphicon-plus'></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <button class='button btn btn-info cart fa fa-shopping-cart'> Add to Cart </button>       
                            </div>
                        </form>
                        
                    </div>
                </div>

                <div id=""> 
            
                    <h3 class="text-center detail-other">Products You May Like</h3>
                
                    <?php

                        $get_product = "select * from product order by rand() LIMIT 0,6";

                        $run_product = mysqli_query($con,$get_product);

                        while($row_products=mysqli_fetch_array($run_product)){
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price']/100;
                            $pro_img1 = $row_products['product_img1'];
                            $pro_img2 = $row_products['product_img2'];
                            $pro_label = $row_products['product_label'];


                            

                
                            echo "
                            
                            <div class='col-md-2 col-sm-4  col-container detail-col'>
                                <div class='product-grid'>
                                    <div class='product-image'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                            <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                                        </a>
                                        <span class='product-trend-label new sale'>$pro_label</span>
                                        <span class='product-discount-label'></span>
                                        <ul class='social'>
                                            <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                            <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                            <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                
                
                                        </ul>
                                    </div>
                
                                    <div class='product-content'>
                                        <h3 class='title'>$pro_title</h3>
                                        <div class='price'>
                                            <p class=''>  &#36; $pro_price</p>
                                        
                                        </div>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                
                            ";
                            
                        }

                    ?>
                    
                </div> 

            </div> <!----col-md-9 ends--> 
        </div>

        </div> <!----container ends-->
    </div> <!----content ends-->

</section>  
    <?php

    include("admin_area/includes/footer.php");
    ?>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/zoom.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>
