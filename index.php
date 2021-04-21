<?php
    $active='Home';
    include("includes/header.php");
?> 

  

        
<i class="fa fa-arrow-up"></i>  
        <section class="slide">
            <div  id="slider">
                
                    <div class="carousel slide" id="myCarousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                            <li  data-target="#myCarousel" data-slide-to="1"></li>
                            <li  data-target="#myCarousel" data-slide-to="2"></li>
                            <li  data-target="#myCarousel" data-slide-to="3"></li>

                        </ol>

                        <div class="carousel-inner slide">
                             <?php
                                $get_slide = "select * from slider LIMIT 0,1";

                                $run_slide = mysqli_query($con,$get_slide);

                                while($row_slide=mysqli_fetch_array($run_slide)){
                                    $slide_name =$row_slide['slide_name'];
                                    $slide_image = $row_slide['slide_image'];
                                    $slide_title = $row_slide['slide_title'];
                                    $slide_caption = $row_slide['slide_caption'];
                                    $slide_link = $row_slide['slide_link'];
                                    $slide_url = $row_slide['slide_url'];

                                    echo"
                                    <div class='item active'>
                                        <a href='$slide_url'>
                                            <div class='banner'>
                                                <img src='admin_area/slide_images/$slide_image' alt='Slide Image 1'>
                                            </div>
                                        </a>
                                        <div class='carousel-caption'>
                                            <h1>$slide_title</h1>
                                            <p>$slide_caption</p>
                                            <a href='$slide_url' class=' btn btn-primary'>$slide_link</a>
                                        </div>
                                        
                                       
                                    </div>

                                    ";


                               }
                               $get_slide = "select * from slider LIMIT 1,3 ";

                                $run_slide = mysqli_query($con,$get_slide);

                                while($row_slide=mysqli_fetch_array($run_slide)){

                                    $slide_name =$row_slide['slide_name'];
                                    $slide_image = $row_slide['slide_image'];
                                    $slide_title = $row_slide['slide_title'];
                                    $slide_caption = $row_slide['slide_caption'];
                                    $slide_link = $row_slide['slide_link'];
                                    $slide_url = $row_slide['slide_url'];

                                    echo"
                                    <div class='item'>
                                        <a href='$slide_url'>
                                            <div class='banner'>
                                                <img src='admin_area/slide_images/$slide_image' alt='Slide Image 1'>
                                            </div>
                                        </a>
                                        <div class='carousel-caption'>
                                            <h1>$slide_title</h1>
                                            <p>$slide_caption</p>
                                            <a href='$slide_url' class=' btn btn-primary'>$slide_link</a>
                                        </div>
                                        
                                       
                                    </div>

                                    ";


                               }
                            ?> 
                         


                            <!-- <div class="item">
                                <div class="banner">
                                    <img src="admin_area/slide_images/slide1.jpg" alt="Slide Image 2">
                                </div>
                                <div class='carousel-caption'>
                                    <h1>New JBL Home Theatres</h1>
                                    <p>Discover premium quality speakers by JBL</p>
                                    <a href='shop.php'class="btn btn-primary">Shop Speakers</a>
                                </div>
                            </div>


                            <div class="item">
                                <div class="banner">
                                    <img src="admin_area/slide_images/slide3.jpg" alt="Slide Image 3">
                                </div>
                                <div class='carousel-caption'>
                                    <h1>New JBL Home Theatres</h1>
                                    <p>Discover premium quality speakers by JBL</p>
                                    <a href='shop.php'class="btn btn-primary">Shop Speakers</a>
                                </div>
                            </div>


                            <div class="item">
                                <div class="banner">
                                    <img src="admin_area/slide_images/slide.jpg" alt="Slide Image 4">
                                </div>
                                <div class='carousel-caption'>
                                    <h1>New JBL Home Theatres</h1>
                                    <p>Discover premium quality speakers by JBL</p>
                                    <a href='shop.php'class="btn btn-primary">Shop Speakers</a>
                                </div>
                            </div> -->
                        </div>

                        <a href="#myCarousel" class="left carousel-control" data-slide="prev"> <!----left carousel-indicator--> 
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                        <a href="#myCarousel" class="right carousel-control" data-slide="next"> <!----right carousel-indicator--> 
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                
            </div>
        </section>

        <section class="about">
            <div class="row">
                <?php
                 stmt()
                ?>
               
            </div>
        </section>

        <section class="ads">

                <div class="row animated fadeIn" style="animation-delay:2s;" >
                    <div class="col span-1-of-3 box1">
                        <h3>OLED TVs</h3>
                        <p>Exclusive offers on TVs until Dec 31 <br> 10% off on all purchase</p>
                        <a href="">Shop OLEDs</a>
                        <img class="img" src="images/television.png" alt="">
                    </div>
                    <div class="col span-1-of-3 box2">
                        <h3>Headphones</h3>
                        <p>Discover our new headphones </p>
                        <a href="">Shop Headphones</a>
                        <img class="img" src="images/purepng.com-music-headphonemusicheadphoneearphoneslisteningearssounds-231519334420p9rzv.png" alt="">
                    </div>
                    <div class="col span-1-of-3 box3">
                        <h3>Speakers</h3>
                        <p>Explore our range of quality speakers <br> Up to 25% off</p>
                        <a href="">Shop Speakers</a>
                        <img class="img"  src="images/Black-Bluetooth-Speaker-PNG-Background-Image.png" alt="">
                    </div>
                </div>  
                <div class="row">
            <div class="col span-1-of-2">
                <div class="media">                  
                    <img class="text-image" src="images/ear.png" alt="...">
                    <div class="media-content content1">
                        <h3>Exclusive Offers on JBL Products</h3>
                        <p>We offer you a lot of discount on all JBL products</p>  
                    </div>                             
                </div>
            </div>

            <div class="col span-1-of-2">
                <div class="media">
                    <img class="text-image2" src="images/box.png" alt="...">
                    <div class="media-content content2">
                        <h3>Free Shipping for orders above #2000</h3>
                        <p >We've got you covered! We deliver your goods using UPS expeticted shipping free of charge</p> 
                    </div>
                    
                </div>
            </div>

        </div>
        </section>

        <div class="row">
            <h3 class="feature">Featured Products</h3>
        </div>

        <section class="category">
            <ul id="autoWidth" class="cs-hidden">
                <!------1----->
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/tele.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Televisions</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/iphone.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Phones</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/purepng.com-music-headphonemusicheadphoneearphoneslisteningearssounds-231519334420p9rzv.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Headphones</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/projector.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Projectors</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/tablets.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Tablets</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/laptop.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Laptops</a>
                                
                        </div>
                    </div>
                </li>
                <li class="item-a">
                    <div class="body">
                        <div class="slideimg">
                            <img src="images/purepng.com-music-headphonemusicheadphoneearphoneslisteningearssounds-231519334420p9rzv.png" alt="">  
                        </div>

                        <div class="detail">
                            <a href="shop.php">Headphones</a>
                                
                        </div>
                    </div>
                </li>


                
            </ul>
        </section>

        <section class="deal">
            <div class="row">
                <h3>Deal Zone</h3>
                <div class="clock">
                    <p id ='timer'>
                        <span id ="days"></span>
                        <span id="hours"></span>
                        <span id="minutes"></span>
                        <span id="seconds"></span>
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="row">
                   <?php
                 
                    getProDeal()
                   ?>
                </div>
            </div>
        </section>

        <section class="other-product">
            <?php
                $get_box = "select * from boxes order by 1 DESC  LIMIT 0,3";
                $run_box = mysqli_query($con,$get_box);
               
                while($row_box=mysqli_fetch_array($run_box)){
                    $box_id = $row_box['box_id'];
                    $box_title = $row_box['box_title'];
                    $box_desc = $row_box['box_desc'];
                    $box_url = $row_box['box_url'];
                    $box_image = $row_box['box_image'];
               

            ?>
                <div class="row">
                    <div class="col span-1-of-3" style="margin-left:10px;">
                        <div class="img-body">
                            <div class="speaker"  style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)), url(images/<?php echo $box_image; ?>);">
                                <div class="content-info">
                                    <h3><?php echo $box_title ;?></h3>
                                    <p><?php echo $box_desc ;?></p>
                                    <a href="<?php echo $box_url; ?>" class="btn btn-info">Shop Now</a>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col span-1-of-3">
                        <div class="img-body">
                            <div class="speaker"  style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4)), url(images/headphones-820341_1280.jpg);">
                                <div class="content-info">
                                    <h3>Headphones</h3>
                                    <p>Our selection of premium headphones to select your favorite audio with an incredible sound</p>
                                    <a href="shop.php" class="btn btn-info">Shop Now</a>
                                </div>
                        
                            </div>
                        </div>
                    
                        
                    </div>
                    <div class="col span-1-of-3">
                        <div class="img-body">
                            <div class="speaker"  style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url(images/indoors-1869560_1280.jpg);">
                                <div class="content-info">
                                    <h3>Professional Audio</h3>
                                    <p>Get the best deals for professional audio equipment</p>
                                    <a href="shop.php" class="btn btn-info">Shop Now</a>
                                </div>
                        
                            </div>
                        </div>
                    
                        
                    </div> -->
                    <?php
                }
            ?>
                </div>
           

          
            <?php
                $get_box = "select * from boxes order by 1 DESC  LIMIT 3,5";
                $run_box = mysqli_query($con,$get_box);
                
                while($row_box=mysqli_fetch_array($run_box)){
                    $box_id = $row_box['box_id'];
                    $box_title = $row_box['box_title'];
                    $box_desc = $row_box['box_desc'];
                    $box_url = $row_box['box_url'];
                    $box_image = $row_box['box_image'];
               

            ?>

                <div class="row">
                    <div class="col span-1-of-2" style="margin-left:10px; width:650px;">
                        <div class="img-body">
                            <div class="speaker"  style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)), url(images/<?php echo $box_image; ?>);">
                            <div class="content-info">
                                <h3><?php echo $box_title ;?></h3>
                                <p><?php echo $box_desc ;?></p>
                                <a href="<?php echo $box_url; ?>" class="btn btn-info">Shop Now</a>
                            </div>
                    
                        </div>
                    </div>

                    <!-- <div class="col span-1-of-2">
                        <div class="img-body">
                            <div class="speaker"  style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(images/bag-1853847_1280.jpg);">
                                <div class="content-info">
                                    <h3>Accessories</h3>
                                    <p>Our various accessories have the best experience</p>
                                    <a href="shop.php" class="btn btn-info">Shop Now</a>
                                </div>
                        
                            </div>
                        </div>
                    </div> -->
                </div>
            <?php
                }
            ?>
        </section>


        <section class=" brands">
            <div class="row js--brands">
                <h3>Brands we distribute</h3>
            </div>
            
            <div class="row ">
                <div class="col span-1-of-8">
                    <div class="brand-img">
                        <img src="images/hp.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8">
                    <div class="brand-img brand">
                        <img src="images/jbl.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8 ">
                    <div class="brand-img ">
                        <img src="images/apple.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8">
                    <div class="brand-img brand">
                        <img src="images/xbox.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8">
                <div class="brand-img">
                        <img src="images/samsung.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8">
                    <div class="brand-img brand">
                        <img src="images/lg.png" class="imgbrand" alt="">
                    </div>
                </div>

                <div class="col span-1-of-8">
                    <div class="brand-img">
                        <img src="images/nexus.png" class="imgbrand" alt="">
                    </div>
                </div>
                <div class="col span-1-of-8 imgbox">
                    <div class="brand-img brand">
                        <img src="images/acer.png" class="imgbrand" alt="">
                    </div>
                </div>
                
            </div>
       </section>

       <section class="newtv">
        <div class="row">
            <div class="back">
                <div class="newtv-content">
                    <?php
                    getNewPro();
                    ?>
    
                </div>
    
                <div class="television"> 
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                      
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <ul class="span9">
                                    <?php
                                        getNewPro1();                                    
                                    ?>
    
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="span9">
                                    <?php
                                        getNewPro2();                                    
                                    ?>
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="span9">
                                    <?php
                                        getNewPro3();                                    
                                    ?>

                                </ul>
                            </div>
                        
                        </div>
                      
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    
                  
                 
                </div>
            </div>
           
        </div>
       </section>

       
    <section class="rollover">
        <div class="row">
            <h3>Product of the day</h3>
        </div>
        <div class="row">
           <?php
            getProDay();
           ?>
        </div>
        
    </section> 




    <section class="subscribe">
        <div class="row">
            <h3>Lets keep in touch!</h3>
            <p>Subscribe to our weelky newsletter and receive exclusive offers on products you love!</p>
            <input type="text" name="subscribe" class="form-control" placeholder="Your email" id="">
            <a href="#" class="btn btn-info"> Subscribe</a>
        </div>
    </section>



    <?php

        include("admin_area/includes/footer.php");


    ?>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/zoom.js"></script>
    <script src="js/lightslider.js"></script>  
    <script src="js/app.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    
</body>
</html>