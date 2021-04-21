<?php
 $active='Shop';
    include("includes/header.php");
    include("includes/db.php");
    
?>
            <div class="loader">
                    <div class="loader_image">
                        <img src="images/preloader.gif" alt="preloader image">
                    </div>
            </div>


    <div id="content"> <!----content begins-->

        <div class="container"> <!----container begins-->

            <div class="col-md-12"> <!----col-md-12 begins-->
            
                <ul class="breadcrumb"> <!----breadcrumb begins-->

                    <li><a href="index.php">Home</a></li>
                    <li>Shop</li>
                    
                </ul> <!----breadcrumb ends-->
            
            </div> <!----col-md-12 ends-->


            <div class="col-md-3"> <!----col-md-3 begins-->           
            <?php
                include("includes/sidebar.php");
            ?>
            
            </div> <!----col-md-3 ends-->

            <div class="col-md-9 shop"> <!----col-md-9 begins-->

          
                <div class='box'> <!----box begins-->
                    <h1>Shop</h1>
                    <p>We offer you the best and original products 
                    We offer you the best and original products We offer you the best and original
                        products Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis obcaecati beatae harum eos temporibus
                        dignissimos odit blanditiis itaque saepe quaerat, rem eligendi, sunt, iure tenetur veniam facilis soluta voluptatum fugit?</p>
                </div> <!----boxends-->
                
               

                

                <div id="products" class="row"> <!----row begins-->
                    <?php
                    
                        getProducts();
                    ?>
                </div> <!----row ends-->

                <center>
                    <ul class="pagination"> <!----pagination begins-->
                      <?php
                        getPaginator();
                      ?>
                    </ul> <!----pagination ends-->
                </center>                  

            </div> <!----col-md-9 ends-->

            <div id="wait" class="wait">

            </div>



        </div> <!----containerends-->
    </div> <!----content ends-->

   
    <?php

    include("admin_area/includes/footer.php");
    ?>




<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/app.js"></script>


<script>

$(document).ready(function(){
    //Hide and Show Nav Bar
    $('.nav-toggle').click(function(){

        $('.panel-collapse,.collapse-data').slideToggle(700,function(){

            if($(this).css('display')=='none'){

                $('.hide-show').html('Show');

            }else{

                $('.hide-show').html('Hide');

            }
        });
    });

    //Search Filter by Letter
    $(function(){

        $.fn.extend({
            filterTable: function(){

                return this.each(function(){

                    $(this).on('keyup', function(){

                        var $this = $(this),
                        search = $this.val().toLowerCase(),
                        target = $this.attr('data-filters'),
                        handle = $(target),
                        rows = handle.find('li a');

                        if(search == ''){
                            rows.show()
                        }else{

                            rows.each(function(){

                                var  $this = $(this);
                                
                                $this.text().toLowerCase().indexOf(search) == -1? $this.hide() : 
                                $this.show();
                            });
                        }
                    });

                }); 

            } 

        });

        $('[data-action="filter"][id="dev-table-filter"]').filterTable();

    });


});
</script>


<script>

    $(document).ready(function(){

        //getProducts function
        function getProducts(){

            //To display products by brands
            var sPath = '';

            var aInputs = $('li').find('.get_producer');

            var aKeys =  Array();

            var aValues =  Array();

            iKey = 0;

            $.each(aInputs, function(key,oInput){
                if(oInput.checked){
                    aKeys[iKey] = oInput.value
                };

                iKey++;


            });

            if(aKeys.length>0){
                var sPath = '';

                for(var i = 0;i < aKeys.length; i++){

                    sPath = sPath + 'brand[]=' + aKeys[i] + '&';

                }

            }


            //To display products by product category

            var aInputs = Array();

            var aInputs = $('li').find('.get_p_cat');

            var aKeys =  Array();

            var aValues =  Array();

            iKey = 0;

            $.each(aInputs, function(key,oInput){
                if(oInput.checked){
                    aKeys[iKey] = oInput.value
                };

                iKey++;


            });

            if(aKeys.length>0){
                var sPath = '';

                for(var i = 0;i < aKeys.length; i++){

                    sPath = sPath + 'p_cat[]=' + aKeys[i] + '&';

                }

            }


            //To display products by category

            var aInputs = Array();

            var aInputs = $('li').find('.get_cat');

            var aKeys =  Array();

            var aValues =  Array();

            iKey = 0;

            $.each(aInputs, function(key,oInput){
                if(oInput.checked){
                    aKeys[iKey] = oInput.value
                };

                iKey++;


            });

            if(aKeys.length>0){
                var sPath = '';

                for(var i = 0;i < aKeys.length; i++){

                    sPath = sPath + 'cat[]=' + aKeys[i] + '&';

                }

            }


            //Preloader image when loading begins
            // $('#wait').html('<img src="images/preloader.gif">')

            $.ajax({
                url : "load.php",
                method : "POST",
                data: sPath+'sAction=getProducts',
                success:function(data){

                    $('#products').html('');
                    $('#products').html(data);
                    //$('#wait').empty();

                }
            });

            $.ajax({
                url : "load.php",
                method : "POST",
                data: sPath+'sAction=getPaginator',
                success:function(data){

                    $('.pagination').html('');
                    $('.pagination').html(data);
                   

                }
            });



        }

        $('.get_producer').click(function(){
            getProducts();

        });
        $('.get_p_cat').click(function(){
            getProducts();

        });
        $('.get_cat').click(function(){
            getProducts();

        });

    });


</script>

</body>
</html>
    