<?php

    include("db.php");
    $output = '';

    if(isset($_POST['searchVal'])){
        $search = $_POST['searchVal'];

        $search = preg_replace("#[^0-9a-z]#i", "","$search");

        $get_search = "SELECT * FROM product WHERE product_keywords LIKE '%$search%'";

        $query = mysqli_query($con,$get_search) or die("Could not connect to database");

        $count =  mysqli_num_rows($query);

        if($count == 0){
            $output = "Could find product";
        }else{
            while($row = mysqli_fetch_array($query)){

                $product_title = $row['product_title'];

                $product_img = $row['product_img1'];

                $product_model = $row['product_model'];

                $product_desc = $row['product_desc'];

                $product_price = $row['product_price'];

                $output .= " <a href='shop.php' class='search-result'>
                                    <div class='search-result-title'>" .$product_title. "</div>
                                    <p class='search-result-text'>" .$product_model. "</p>
                                    <p class='search-result-text'> &#36; " .$product_price. "</p>
                                </a>";
                               
                                
                                
            }

        }

    }

    echo $output;
   
?>