<?php
    // $con = mysqli_connect("localhost", "root", "", "ag_store");

    // if(!$con){
    //     die("Connection failed: " . mysqli_connect_error());

        
    // }

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $con = new mysqli($server, $username, $password, $db);
?>