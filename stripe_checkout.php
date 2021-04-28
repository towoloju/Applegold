<?php
    if(empty($_GET['pro_id'])){
        header("location: index.php");
        exit;
    }
    include("includes/db.php");

    $pro_id = $_GET['pro_id'];

    $get_product= "SELECT * FROM cart WHERE p_id=$pro_id";

    $query = mysqli_query($con,$get_product);

    if($query->num_rows > 0){

        $row_p = mysqli_fetch_array($query);
        $product_name = $row_p['name'];
        $product_price = $row_p['price'];
        $currency = $row_p['currency'];
    }else{
        header("location:index.php");
    }

    require "stripe_setup/init.php";

    // \Stripe\Stripe::setVerifySslCerts(false);
    \Stripe\Stripe::setApiKey('sk_test_51IlCQfCiU3yELJopvMZM3Yn1iehciWi3D4x7UYo0BQ3ltpjvJDuTtPlNYEyeJDeP5tdfiQfSJWf6m99issRUWJ5v00CLjx2DWD');

    $session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
        'price_data' => [
          'currency' => $currency,
          'product_data' => [
            'name' => $product_name,
            
            
          ],
          'unit_amount' => $product_price,
        ],
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => 'http://localhost/applegold/success.php',
      'cancel_url' => 'http://localhost/applegold/cancel.php',
    ]);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Gateway</title>
</head>
<body>
    

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
      // Create an instance of the Stripe object with your publishable API key
      var stripe = Stripe('pk_test_51IlCQfCiU3yELJop99CCFP57IDUNhQ0J0mhC7qbnpTgalIsOgOZoTmr9geJIRKraCRLfYlUhNg3ckjJij97yrWA900pMOEjo3N');

    var session = "<?php echo $session['id']; ?>"
      
        stripe.redirectToCheckout({ sessionId: session })
      
        .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
    
    </script>

</body>
</html>