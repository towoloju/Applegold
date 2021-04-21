<?php
 $active='Contact';
    include("includes/header.php");
?>


    <div id="content"> <!----content begins-->

        <div class="container" > <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Contact</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->


            <div class="row contact">
                <div class="col span-1-of-2">
                    <div class="form-header">
                        <h3>Contact Form</h3>
                    </div>
                    <div class="form-body">
                        <form class="" method="post" action="">

                    

                            <div class="row ">

                                <div class="col-sm-12">
                                    <div class="form-group has-placeholder">
                                        <label for="name">Full Name
                                            
                                        </label>
                                        <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group has-placeholder">
                                        <label for="phone">Phone
                                            
                                        </label>
                                        <input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group has-placeholder">
                                        <label for="email">Email address
                                            
                                        </label>
                                        <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group has-placeholder">
                                        <label for="message">Message</label>
                                        <textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control text" placeholder="Your Message"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group has-placeholder">
                                    <button type="submit" id="contact_form_submit" name="contact_submit" class="btn btn-primary btn-block">Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>


                <div class="col span-1-of-2">
                    <div class="contact-info">
                        <h3>Contact Info</h3>
            

                        <div class="media-info">
                            
                            <div class="color-main fs-16">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div class="media-body">
                                <p>
                                    2231 Sycamore, Green Bay, WI 54304
                                </p>
                            </div>
                        </div>

                        <div class="media-info">
                            
                            <div class="color-main fs-16">
                                <i class="fa fa-phone"></i>
                            </div>
    
                            <div class="media-body">
                                <p>
                                    070-0000-2248
                                </p>
                            </div>
                        </div>

                        <div class="media-info">
                            
                            <div class="color-main fs-16">
                                <i class="fa fa-pencil"></i>
                            </div>
    
                            <div class="media-body">
                                <p>
                                    applegoldconsults@gmail.com
                                </p>
                            </div>
                        </div>

                    

                        <h3 class="time">Open Hours</h3>

                        <table class="table-responsive open-hours">
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fa fa-clock-o color-main"></i>   Weekdays
                                    </td>
                                    <td class="right">9:00-17:00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-clock-o color-main"></i>   Saturdays
                                    </td>
                                    <td class="right">10:00-16:00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-clock-o color-main"></i>   Sundays
                                    </td>
                                    <td class="right">11:00-14:00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-clock-o color-main"></i>   Holidays
                                    </td>
                                    <td class="right">9:00-21:00</td>
                                </tr>
                        
                            </tbody>
                        </table>


                    
                    </div>
                

                </div>
            </div>
           


        </div>


        <div class="row">

            <div class="map-container">
              <div class="map-image">

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.909451725044!2d3.8633864143194496!3d7.36404631486488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13
                .1!3m3!1m2!1s0x10398d36898b05b3%3A0xa42adcec2b9cc705!2sThe%20Palms%20Shopping%20Mall%2C%20Ibadan!5e0!3m2!1sen!2sng!4v1600801634824!5m2!1sen!2sng" width="1200" height="465" frameborder="0" 
                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
                
            
            </div>

        </div>

    
    </div>


    <?php
    include("admin_area/includes/footer.php");
    ?>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>

</body>
</html>