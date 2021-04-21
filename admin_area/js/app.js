//coupon generator
function getCouponCode(){
    var length = 10; //length of coupon code
    $.ajax({
        url:"coupon_generate.php",
        method:"post",
        data: {type:'coupon_action', length: length}, //post coupon_action in coupon.php
        dataType: 'html',
        success: function(response){
            response=response.replace(/(\r\n|\n|\r)/gm,""); //get the response from coupon.php
            $('#c_code').val(response); //add response to input with id c-code
        }
    });
}

//alerts
//success

function Invalid(){
    Swal.fire({
        title: 'Oops...',
        icon: 'error',
        text: 'Invalid email and password'
    })
}