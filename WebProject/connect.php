<?php    
    $servername = "localhost";
    $username = "root";
    $password = "Phamdat280102@@";
    $database = "Project1";

    $conn =  mysqli_connect($servername, $username, $password, $database) ;

    mysqli_set_charset($conn, 'UTF8');

    function select($query){
        $result = array();
        $object_records = mysqli_query($GLOBALS['conn'], $query);
        while(sizeof($result) < $object_records->num_rows){
            $result[] = mysqli_fetch_array($object_records);
        }
        return $result;
    }