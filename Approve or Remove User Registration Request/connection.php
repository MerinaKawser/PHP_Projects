<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "approve_reject_reg";
    $con = mysqli_connect($server, $user, $password, $db);
    if(!$con){
        die("Not Connected");
    }
    else{
        //echo "Connected";
    }
?>