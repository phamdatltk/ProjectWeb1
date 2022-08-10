<?php

    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
    }

    $sqlSelect = "SELECT * FROM Users WHERE ID = '$ID'";
    $servername = "localhost";
    $username = "root";
    $password = "Duyanh230802@@";
    $database = "Project1";
    $sqlSelectPassword = "SELECT * FROM Users WHERE Email = '$Email'";

    $conn =  mysqli_connect($servername, $username, $password, $database) ;
    mysqli_set_charset($conn, 'UTF8');

    $records = mysqli_query($conn, $sqlSelect);
    $record = mysqli_fetch_array($records);
    var_dump($record);
?>