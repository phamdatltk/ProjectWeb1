<?php
    session_start();
    if(isset($_SESSION["ID"])){
        unset($_SESSION["ID"]);
    }
    if(isset($_COOKIE['TokenID'])){
        $TokenID = $_COOKIE['TokenID'];
    }
    
    
    require("../../connect.php");
    $sqlDeleteToken = "UPDATE Users SET Token = null WHERE Token = '$TokenID'"; 

    mysqli_query($conn, $sqlDeleteToken);
    
    setcookie("TokenID", null, -1,  "/");
    header("Location: ./loginPage.php");

