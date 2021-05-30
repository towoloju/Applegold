<?php
    $con = mysqli_connect("localhost", "root", "", "ag_store");

    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
?>