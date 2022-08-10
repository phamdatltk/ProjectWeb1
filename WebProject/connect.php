<?php    
    $servername = "localhost";
    $username = "root";
    $password = "Phamdat280102@@";
    $database = "Project1";

    $conn =  mysqli_connect($servername, $username, $password, $database) ;

    mysqli_set_charset($conn, 'UTF8');
