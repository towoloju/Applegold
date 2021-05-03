//SCROLL TO TOP
$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop()>300){
            $('.fa-arrow-up').css({
                "opacity":"1", "pointer-events":"auto"
            });
        }else{
            $('.fa-arrow-up').css({
                "opacity":"0", "pointer-events":"none"
            });
        }
    });
    $('.fa-arrow-up').click(function(){
        $('html').animate({scrollTop:0}, 500);
    });

});




//FEATURED PRODUCTS SLIDER
$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        }
    });  
})



//COUNTDOWN TIMER//
const endDate = new Date ("December 31, 2021 20:00:00").getTime();
const timer = setInterval(function() {
    let timeNow = new Date().getTime();
    let timeRemaining = endDate - timeNow;
        if(timeRemaining>=0) {
            let days = Math.floor(timeRemaining / (1000*60*60*24));
            let hours = Math.floor((timeRemaining % (1000*60*60*24)) / (1000*60*60));
            let minutes = Math.floor ((timeRemaining % (1000*60*60)) / (1000*60));
            let seconds = Math.floor((timeRemaining % (1000*60)) / (1000));

            document.getElementById('days').innerHTML = days + "<span class='label'>DAY(S)</span>";
            document.getElementById('hours').innerHTML= ("0"+ hours).slice(-2) + "<span class='label'>HR(S)</span>";
            document.getElementById('minutes').innerHTML = ("0"+minutes).slice(-2) + "<span class='label'>MIN(S)</span>";
            document.getElementById('seconds').innerHTML = ("0"+seconds).slice(-2) + "<span class='label'>SEC(S)</span>";
        }else{
            document.getElementById('timer').innerHTML = "Sales have ended"
        }

}, 1000)



//SCROLL TO SECTION
$('.js--scroll-brands').click(function(){
    $('html, body').animate({scrollTop:$('.js--brands').offset().top},1000);
});





//IMAGE ROLLOVER
$(function(){
    $(".xzoom, .xzoom-gallery").xzoom({
        zoomWidth: 400,
        tint: "#333",
        Xoffset:15,

    });
});

//PRODUCT QUANTITY INCREMENT//
$(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);
    
              
                // Increment
            
        });
    
         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });


//POPUP MESSAGES
function passWord(){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Passwords do not match!',
        
    })
}

function signUp(){
    Swal.fire({
        icon: 'success',
        title: 'Registration Successful',
        text: 'We sent an activation link to your email, please activate your account',
        
    })
}

function Verify(){
    Swal.fire({
        icon: 'success',
        timer:10000,
        title: 'Registration Successful',
        text: 'Your account has been verified, please Sign in',
        
    })
}
 function failedVerify(){

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong, your account could not be verified, please try again',
        
    })
 }



 function orderSuccess(e){
    e.preventDefault();
    Swal.fire({
        icon: 'success',
        text: 'Your order has been submitted'
        
    })
 }

 $('#update').on('click', function(){
    Swal.fire({
        icon: 'success',
        text: 'Your order has been submitted'
        
    })
})

//PRELOADER ON SHOP
$(document).ready(function(){
    $('#getLoader').on("click", function(){
        $.ajax({
 
            type:"GET",
            url:"http://localhost/ecom_project/shop.php",
            

            beforeSend: function(){
                $('.loader').show();
            },

            complete: function(){
                $(".loader").hide();
            },

            success: function(){
               $("#products").show()

            },

            error: function(){
                $("#products").html("Failed to fetch products")
            }

        });
    });
});