<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "login_system";
    $con = mysqli_connect($server, $user, $password, $db);
    if(!$con){
        die("Not Connected");
    }
    else{
        //echo "Connected";
    }
?>