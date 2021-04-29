

<?php
    $db = mysqli_connect("localhost","root","","ag_store");

//Function to get real IP of user
function getRealIpUser(){
    switch(true){

        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR']; 
    }
}



//Add to Cart Function
function add_cart(){
    global $db;

    if(isset($_GET['add_cart'])){

        $ip_add = getRealIpUser();

        $p_id = $_GET['add_cart'];

        $p_quantity = $_POST['p_quantity'];

        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        $run_check = mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)>0){
                //already added to cart
            echo" <script>window.open('details.php?pro_id=$p_id', '_self')</script> ";

        }else{

            $get_price = "select * from product where product_id='$p_id'";

            $run_price = mysqli_query($db,$get_price);

            $row_price= mysqli_fetch_array($run_price);

            $pro_price = $row_price['product_price'];

            $currency = $row_price['currency'];

            $pro_name = $row_price['product_title'];

            $pro_model = $row_price['product_model'];

            $pro_newp = $row_price['new_price']; 

            $pro_discount = $row_price['discount'];

                if($pro_discount !='0'){

                    $price = $pro_newp;
                }else{  

                    $price = $pro_price;
                }

            $insert = "insert into cart (p_id,ip_add,quantity,price,currency,model,name) values ('$p_id','$ip_add','$p_quantity','$price','$currency','$pro_model','$pro_name')";

            $run_query = mysqli_query($db,$insert);

            if($run_query){
              
                echo" <script>window.open('details.php?pro_id=$p_id', '_self')</script> ";
            }else{
               

            }
       
        }


        

    }
}

//Begin displaying Product Deals functions//
function getProDeal(){
    global $db;
                                                 
    $get_product = "select * from product where discount!='0' order by rand() LIMIT 0,8";
    $run_product = mysqli_query($db,$get_product);
    while($row_products=mysqli_fetch_array($run_product)){
            
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price']/100;
        $pro_img1 = $row_products['product_img1'];
        $pro_img2 = $row_products['product_img2'];
        $pro_oldprice = $row_products['old_price']/100;
        $pro_newprice = $row_products['new_price']/100;
        $pro_discount = $row_products['discount'];

            echo"
            <div class='col-md-2 col-sm-4 center-responsive'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive pic-1' src='admin_area/product_images/$pro_img1' alt=''>
                            <img class='img-responsive pic-2' src='admin_area/product_images/$pro_img2' alt=''>
                            
                        </a>
                        <span class='product-trend-label'></span>
                        <span class='product-discount-label'>-$pro_discount%</span>
                    </div>
                    
                    <ul class='social'>
                        <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                        <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                        <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                    </ul>
                </div>
                <div class='product-content'>
                    <h3 class='title'>$pro_title</h3>
                    <div class='price'>
                        <p class='old'>&#36; $pro_oldprice</p>
                        <p class='new'>&#36; $pro_newprice</p>
                    </div>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                </div>
            </div>   
        ";
        
       
    }
}
//GET NEW PRODUCTS 
function getNewPro(){
    global $db;                             
        $get_product = "select * from product_category order by 1 DESC LIMIT 1";
        $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
                
            $p_category_id = $row_products['p_category_id'];
            $p_title = $row_products['p_category_title'];
            

            echo"
               <div class='tv-details'>
                    <h3>$p_title</h3>
                    <p> Get our latest high quality products at an affordable price. Hurry and shop now! </p>
                    <a href='shop.php?p_category=$p_category_id' class='btn'>Shop All</a>
                </div>
                <div class='tv-image'>
                    <img class='tv-1' src='images/unnamed.png'>
                </div>
            ";
    }
}
//Get New Products function SLIDE 1/
function getNewPro1(){
    global $db;                             
        $get_product = "select * from product where product_label='new' order by 1 DESC LIMIT 0,3";
        $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
                
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_url = $row_products['product_url'];
            $pro_img1 = $row_products['product_img1'];
            $pro_img2 = $row_products['product_img2'];
            $pro_price = $row_products['product_price']/100;
            $pro_label = $row_products['product_label'];

        
                echo"
                    <li class='span3'>
                        <div class='product-box'>
                            <div class='product-boximage'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                    <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2' >
                                </a>
                                <span class='product-trend-label new'>$pro_label</span>
                            
                                <ul class='social'>
                                    <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                    <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                    <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                                </ul>
                            </div>
                            <div class='product-boxcontent'>
                                <h3 class='title'>$pro_title</h3>
                                <div class='price'>
                                    <p class='fixed'> &#36; $pro_price</p>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                </div>
                            </div>
                            
                        </div>
                    </li>
                ";
          
          
        }
}
//Get New Products function SLIDE 2/
function getNewPro2(){
    global $db;                             
    $get_product = "select * from product where product_label='new' order by rand() LIMIT 0,3";
    $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
                
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_url = $row_products['product_url'];
            $pro_price = $row_products['product_price']/100;
            $pro_img1 = $row_products['product_img1'];
            $pro_img2 = $row_products['product_img2'];
            $pro_label = $row_products['product_label'];
                echo"
                    <li class='span3'>
                        <div class='product-box'>
                            <div class='product-boximage'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                    <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2' >
                                </a>
                                <span class='product-trend-label new'>$pro_label</span>
                            
                                <ul class='social'>
                                    <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                    <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                    <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                                </ul>
                            </div>
                            <div class='product-boxcontent'>
                                <h3 class='title'>$pro_title</h3>
                                <div class='price'>
                                    <p class='fixed'> &#36; $pro_price</p>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                </div>
                            </div>
                            
                        </div>
                    </li>
                ";
            
    }
}
//Get New Products function SLIDE 3/
function getNewPro3(){
    global $db;                             
    $get_product = "select * from product where product_label='new' order by rand() LIMIT 0,3";
        $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
                
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_url = $row_products['product_url'];
            $pro_price = $row_products['product_price']/100;
            $pro_img1 = $row_products['product_img1'];
            $pro_img2 = $row_products['product_img2'];
            $pro_label = $row_products['product_label'];

                echo"
                    <li class='span3'>
                        <div class='product-box'>
                            <div class='product-boximage'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                    <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2' >
                                </a>
                                <span class='product-trend-label new'>$pro_label</span>
                            
                                <ul class='social'>
                                    <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                                    <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                                    <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                                </ul>
                            </div>
                            <div class='product-boxcontent'>
                                <h3 class='title'>$pro_title</h3>
                                <div class='price'>
                                    <p class='fixed'> &#36; $pro_price</p>
                                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                </div>
                            </div>
                            
                        </div>
                    </li>
                ";
            
    }
}

//PRODUCT OF THE DAY
function getProDay(){
    global $db;
        $get_product = "select * from product order by 1 DESC LIMIT 1";
        $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_url = $row_products['product_url'];
            $pro_price = $row_products['product_price']/100;
            $pro_img1 = $row_products['product_img1'];
            $pro_img2 = $row_products['product_img2'];
            $pro_img3 = $row_products['product_img3'];
            $pro_desc = $row_products['product_desc'];
            

        echo"
            <div class='zoom-container'>

                <div class='zoom'>
                    <img src='./admin_area/product_images/$pro_img1' class='xzoom' xoriginal='admin_area/product_images/$pro_img1'>
                
                    <div class='xzoom-thumbs'>

                        <a href='./admin_area/product_images/$pro_img1'>
                            <img class='xzoom-gallery' src='./admin_area/product_images/$pro_img1'  xpreview='./admin_area/product_images/$pro_img1'>
                        </a>

                        <a href='./admin_area/product_images/$pro_img2'>
                            <img class='xzoom-gallery' src='./admin_area/product_images/$pro_img2'>
                        </a>
                        <a href='./admin_area/product_images/$pro_img3'>
                            <img class='xzoom-gallery'  src='./admin_area/product_images/$pro_img3'>
                        </a>
                     

                    </div>

                </div>

                <div class='xzoom-description'>
                    <h3>$pro_title</h3>
                    <p> $pro_desc</p>
                    
                    <div class='icon'>
                        <p>Share this product</p>
                        <div class='icon-list'>
                            <a href='https://www.facebook.com' target='_blank'><i class='fa fa-facebook'></i></a>
                            <a href='https://www.pinterest.com' target='_blank'><i class='fa fa-pinterest'></i></a>
                            <a href='https://www.twitter.com' target='_blank'><i class='fa fa-twitter'></i></a>
                            <a href='https://www.instagram.com' target='_blank'><i class='fa fa-whatsapp'></i></a>
                        </div>
                        
                    </div>
                    
                    <hr>

                    <div class='price-detail'>
                        <p>Price : <span class=''>&#36; $pro_price</span></p>
                    </div>

                    <div class='stock-detail'>
                        <p>Stock : <span> In stock (45 units), ready to be shipped</span></p>
                        <div class='progress'>
                            <div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100' style='width: 45%; height: 100%;'>
                                <span class='sr-only'>45% Complete</span>
                            </div>
                        </div>
                        
                    </div>


                    <div class='quantity-detail'>
                        <p>Quantity :</p>
                        <div class='col-lg-2 col-md-3 col-sm-6 quantity-bar'>
                            <div class='input-group'>
                                <span class='input-group-btn'>
                                    <button type='button' class='quantity-left-minus btn btn-default btn-number'  data-type='minus' data-field=''>
                                        <span class='glyphicon glyphicon-minus'></span>
                                    </button>
                                </span>

                                <input type='text' id='quantity' name='quantity' class='form-control input-number' value='1' min='1' max='100'>
                                <span class='input-group-btn'>
                                    <button type='button' class='quantity-right-plus btn btn-default btn-number' data-type='plus' data-field=''>
                                        <span class='glyphicon glyphicon-plus'></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class='button'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-info cart'><i class='fa fa-shopping-cart'></i>        Add to Cart</a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary buynow'><i class='fa fa-money'></i>      Buy Now</a>

                    </div>
                    
                </div>
            </div>
        ";
    }
}

//OTHER PRODUCTS
function getPro(){
    global $db;
    $get_product = "select * from product order by rand() LIMIT 0,12";
    $run_product = mysqli_query($db,$get_product);
    while($row_products=mysqli_fetch_array($run_product)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_url = $row_products['product_url'];
        $pro_price = $row_products['product_price']/100;
        $pro_img1 = $row_products['product_img1'];
        $pro_img2 = $row_products['product_img2'];
        $pro_label = $row_products['product_label'];

        if($pro_label=='sale'){
            
            echo"
                <div class='col-md-2 col-sm-4  col-container'>
                    <div class='product-grid'>
                        <div class='product-image'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                            </a>
                            <span class='product-trend-label sale'>$pro_label</span>
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
    
        }elseif($pro_label=='new'){
            
            echo"
                <div class='col-md-2 col-sm-4  col-container'>
                    <div class='product-grid'>
                        <div class='product-image'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                                <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                            </a>
                            <span class='product-trend-label new'>$pro_label</span>
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
        }else{
            echo"
            <div class='col-md-2 col-sm-4  col-container'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='pic-1 img-responsive' src='admin_area/product_images/$pro_img1'>
                            <img class='pic-2 img-responsive' src='admin_area/product_images/$pro_img2'>
                        </a>
                        <span class='product-trend-label'>$pro_label</span>
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

       
    }
    
}
//Get Product category function begins//
function getPCats(){

   global $db;

    $get_p_category = "select * from product_category";
    $run_p_category = mysqli_query($db,$get_p_category);

    while($row_p_category=mysqli_fetch_array($run_p_category)){
        $p_category_id = $row_p_category['p_category_id'];
        $p_category_title = $row_p_category['p_category_title'];

        echo "
                <li>
                    <a href ='shop.php?p_category=$p_category_id'>
                        $p_category_title
                    </a>
                </li>
            ";

    }


}

//Get  Category begins//
function getCats(){


    global $db;
 
     $get_category = "select * from categories";
     $run_category = mysqli_query($db,$get_category);
 
     while($row_category=mysqli_fetch_array($run_category)){
         $category_id = $row_category['category_id'];
         $category_title = $row_category['category_title'];
 
         echo "
                 <li>
                     <a href ='shop.php?category=$category_id'>
                         $category_title
                     </a>
                 </li>
             ";
 
     }
 
 
}

//Display product categories//
 function getPCatItems(){
     global $db;
     if(isset($_GET['p_category'])){
         $p_category_id =$_GET['p_category'];

         $get_p_category = "select * from product_category where p_category_id = '$p_category_id '";

         $run_p_category = mysqli_query($db,$get_p_category);

         $row_p_category = mysqli_fetch_array($run_p_category);

         $p_category_title = $row_p_category['p_category_title'];

         



         $get_product = "select * from product where p_category_id = '$p_category_id '";

         $run_product = mysqli_query($db,$get_product);

         $count = mysqli_num_rows($run_product);

         if($count==0){
            echo"
                <div class='box'>
                    <h3 class='text-center'> Oops! We couldn't find what you're looking for in this product category</h3>
                </div>
            ";
         }else{  
            echo"
            <div class='box'>
                <h1 class='text-center'>  $p_category_title</h1>
                
            </div>
        "; 
         }

        
         while($row_products=mysqli_fetch_array($run_product)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_url = $row_products['product_url'];
            $pro_price = $row_products['product_price']/100;
            $pro_img1 = $row_products['product_img1'];
            $pro_img2 = $row_products['product_img2'];

            echo "
            <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='pic-1' src='admin_area/product_images/$pro_img1'>
                            <img class='pic-2' src='admin_area/product_images/$pro_img2'>
                        </a>
                        <span class='product-trend-label'></span>
                        <span class='product-discount-label'></span>
                        <ul class='social'>
                            <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                            <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                            <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>


                        </ul>
                    </div>

                    <div class='product-content'>
                        <h3 class='title text-center'>$pro_title</h3>
                        <div class='price'>
                            <p class='text-center'>  &#36; $pro_price</p>
                        
                        </div>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-info buy' style='width:120px;'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                    </div>
                </div>
            </div>

            ";
            
         }


     }
}

 //Display  categories//
function getCatItems(){
    global $db;

    if(isset($_GET['category'])){
        $category_id = $_GET['category'];

        $get_category = "select * from categories where category_id = '$category_id'";

        $run_category = mysqli_query($db,$get_category);

        $row_category = mysqli_fetch_array($run_category);

        $category_title = $row_category['category_title'];

        $category_desc = $row_category['category_desc'];

        $get_category = "select * from product where category_id = '$category_id' LIMIT 0,6";

        $run_product = mysqli_query($db,$get_category);

        $count = mysqli_num_rows($run_product);

        if($count==0){
           echo"
               <div class='box'>
                   <h3 class='text-center'> Oops! We couldn't find what you're looking for in this  category</h3>
               </div>
           ";
        }else{  
           echo"
           <div class='box'>
               <h1 class='text-center'>  $category_title</h1>

               <p class='text-center'> $category_desc</p>
           </div>
       "; 
        }

       
        while($row_products=mysqli_fetch_array($run_product)){
           $pro_id = $row_products['product_id'];
           $pro_title = $row_products['product_title'];
           $pro_url = $row_products['product_url'];
           $pro_price = $row_products['product_price']/100;
           $pro_desc = $row_products['product_desc'];
           $pro_img1 = $row_products['product_img1'];
           $pro_img2 = $row_products['product_img2'];


           echo "
           <div class='col-md-4 col-sm-6 center-responsive'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='pic-1' src='admin_area/product_images/$pro_img1'>
                            <img class='pic-2' src='admin_area/product_images/$pro_img2'>
                        </a>
                        <span class='product-trend-label'></span>
                        <span class='product-discount-label'></span>
                        <ul class='social'>
                            <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                            <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                            <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>


                        </ul>
                    </div>

                    <div class='product-content'>
                        <h3 class='title text-center'>$pro_title</h3>
                        <div class='price'>
                            <p class='text-center'>  &#36; $pro_price</p>
                        
                        </div>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-info buy' style='width:120px;'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                    </div>
                </div>
            </div>
              
           ";
           
        }


    }
}

//FUNCTION ITEMS IN CART//
function items(){
    global $db;

    $ip_add = getRealIpUser();

    $get_items = "select * from cart where ip_add='$ip_add'";

    $run_items = mysqli_query($db,$get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}

//FUNCTION GET TOTAL PRICE
function total_price(){
    global $db;

    $ip_add = getRealIpUser();

    $total = 0;

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($db,$select_cart);

    while($record=mysqli_fetch_array($run_cart)){
        $pro_id = $record['p_id'];

        $pro_quantity = $record['quantity'];
   
        $sub_total = $record['price'] * $pro_quantity;

        $total  += $sub_total;

        
    }

    echo    "&#36;  .$total";
}

//FUNCTION ABOUT STORE
function stmt(){
    global $db;                                                  
        $get_product = "select * from about order by 1 DESC LIMIT 1";
        $run_product = mysqli_query($db,$get_product);
        while($row_products=mysqli_fetch_array($run_product)){
                
            $stmt_id = $row_products['stmt_id'];
            $title = $row_products['title'];
            $stmt = $row_products['stmt'];

            echo"
                <div class='about-us'>
                    <h2>$title</h2>
                    <p>$stmt</p>
                    
                </div>
            
            ";
        }
}



//DISPLAY ALL PRODUCTS on SHOP
function getProducts(){
    global $db;
    $aWhere = array();

    //DISPLAY Product Brands
    if(isset($_REQUEST['brand'])&&is_array($_REQUEST['brand'])){

        foreach($_REQUEST['brand'] as $sKey=>$sVal){
            if((int)$sVal !=0){
                $aWhere[] = 'producer_id='.(int)$sVal;
            }
        }

    } 

    //DISPLAY PRODUCT CATEGORIES
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
            if((int)$sVal !=0){
                $aWhere[] = 'p_category_id='.(int)$sVal;
            }
        }

    }


    //DISPLAY CATEGORIES
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'category_id='.(int)$sVal;
            }
        }

    }

    $per_page = 9;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page = 1;

    }

    $start_from = ($page-1) * $per_page;

    $sLimit = " order by rand() LIMIT $start_from,$per_page";

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;

    $get_products = "select * from product ".$sWhere;

    $run_p = mysqli_query($db,$get_products);

    while($row_p=mysqli_fetch_array($run_p)){

        $pro_id = $row_p['product_id'];
        $pro_title = $row_p['product_title'];
        $pro_url = $row_p['product_url'];
        $pro_price = $row_p['product_price']/100;
        $pro_img1 = $row_p['product_img1'];
        $pro_img2 = $row_p['product_img2'];
        $pro_label = $row_p['product_label'];
        $pro_discount = $row_p['discount'];
        $pro_oldprice = $row_p['old_price']/100;
        $pro_newprice = $row_p['new_price']/100;

        if($pro_label=='sale'){

            echo"
                <div class='col-md-4 col-sm-6 center-responsive' style='margin-top:20px;'>
                    <div class='product-grid'>
                        <div class='product-image'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='img-responsive pic-1' src='admin_area/product_images/$pro_img1' alt=''>
                                <img class='img-responsive pic-2' src='admin_area/product_images/$pro_img2' alt=''>
                                
                            </a>
                            <span class='product-trend-label sale'>$pro_label</span>
                            <span class='product-discount-label'></span>
                        </div>
                        
                        <ul class='social'>
                            <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                            <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                            <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                        </ul>
                    </div>
                    <div class='product-content'>
                        <h3 class='title'>$pro_title</h3>
                        <div class='price'>
                        <p class='text-center'>  &#36; $pro_price</p>
                        </div>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                    </div>
                </div>   
             ";

        }elseif($pro_label=='new'){
                
        echo"
            <div class='col-md-4 col-sm-6 center-responsive' style='margin-top:20px;'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive pic-1' src='admin_area/product_images/$pro_img1' alt=''>
                            <img class='img-responsive pic-2' src='admin_area/product_images/$pro_img2' alt=''>
                            
                        </a>
                        <span class='product-trend-label new'>$pro_label</span>
                        <span class='product-discount-label'></span>
                    </div>
                    
                    <ul class='social'>
                        <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                        <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                        <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                    </ul>
                </div>
                <div class='product-content'>
                    <h3 class='title'>$pro_title</h3>
                    <div class='price'>
                    <p class='text-center'>  &#36; $pro_price</p>
                    </div>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                </div>
            </div>   
        ";

        }elseif($pro_discount!=0){
            echo"
                <div class='col-md-4 col-sm-6 center-responsive' style='margin-top:20px;'>
                    <div class='product-grid'>
                        <div class='product-image'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='img-responsive pic-1' src='admin_area/product_images/$pro_img1' alt=''>
                                <img class='img-responsive pic-2' src='admin_area/product_images/$pro_img2' alt=''>
                                
                            </a>
                            <span class='product-trend-label'></span>
                            <span class='product-discount-label'>-$pro_discount%</span>
                        </div>
                        
                        <ul class='social'>
                            <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                            <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                            <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                        </ul>
                    </div>
                    <div class='product-content'>
                        <h3 class='title'>$pro_title</h3>
                        <div class='price'>
                        <p class='old'>&#36; $pro_oldprice</p>
                        <p class='new'>&#36; $pro_newprice</p>
                        </div>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                    </div>
                </div>   
            ";
        }else{
            echo"
            <div class='col-md-4 col-sm-6 center-responsive' style='margin-top:20px;'>
                <div class='product-grid'>
                    <div class='product-image'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive pic-1' src='admin_area/product_images/$pro_img1' alt=''>
                            <img class='img-responsive pic-2' src='admin_area/product_images/$pro_img2' alt=''>
                            
                        </a>
                        <span class='product-trend-label'></span>
                        <span class='product-discount-label'></span>
                    </div>
                    
                    <ul class='social'>
                        <li><a href='details.php?pro_id=$pro_id' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                        <li><a href='' data-tip='Wishlist'><i class='fa fa-heart'></i></a></li>
                        <li><a href='' data-tip='Quick View'><i class='fa fa-search'></i></a></li>
                    </ul>
                </div>
                <div class='product-content'>
                    <h3 class='title'>$pro_title</h3>
                    <div class='price'>
                    <p class='text-center'>  &#36; $pro_price</p>
                    </div>
                    <a href='details.php?pro_id=$pro_id' class='btn btn-info buy'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
                </div>
            </div>   
        ";
        }
    }






}


//DISPLAY PAGINATION
function getPaginator(){
    global $db;

    $per_page = 9;
    $aWhere =  array();
    $aPath = '';

     //DISPLAY Product Brands
     if(isset($_REQUEST['brand'])&&is_array($_REQUEST['brand'])){

        foreach($_REQUEST['brand'] as $sKey=>$sVal){

            if((int)$sVal !=0){

                $aWhere[] = 'producer_id='.(int)$sVal;
                $aPath .= 'brand[]='.(int)$sVal.'&';


            }
        }

    }

    //DISPLAY PRODUCT CATEGORIES
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_category_id='.(int)$sVal;
                $aPath .= 'p_cat[]='.(int)$sVal.'&';
            }
        }

    }


    //DISPLAY CATEGORIES
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal !=0){
                $aWhere[] = 'category_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';
            }
        }


    }

    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from product".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);


    echo "
  
            <li class='page-item'><a class='page-link' aria-label='Previous' href='shop.php?page=1"; 
                if(!empty($aPath)){
                    echo "&".$aPath;
                }
        
            echo "'>";

            
                echo "
                
                <span aria-hidden='true'>«</span> 
                
                <span class='sr-only'>Previous</span>  
                
                ";
                
                
            echo " </a></li>";

              

            for($i=1;$i<=$total_pages;$i++){

                echo"<li class='page-item'  ><a class='page-link' href='shop.php?page=".$i.(!empty($aPath)? '&'.$aPath:'')."'>".$i."</a></li>"; 

            };

            echo "<li class='page-item'><a class='page-link' aria-label='Next' href='shop.php?page=$total_pages";
                if(!empty($aPath)){

                    echo "&".$aPath;
                }


                echo "'>";
                
                
                echo "
                
                <span aria-hidden='true'>»</span> 
                
                <span class='sr-only'>Next</span>  
                
                ";
            
                
                
                " </a></li>
        
    
       ";
        


     
}


?>

