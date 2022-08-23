<?php    
    if(isset($_COOKIE['TokenID'])){
        $TokenID = $_COOKIE['TokenID'];
    }

    $sqlSelect = "SELECT * FROM Users WHERE Token = '$TokenID'";
    $sqlSelectNumberProductsFromCart = "SELECT COUNT(*) FROM Carts WHERE User_id = (SELECT ID FROM Users WHERE Token = '$TokenID')";
    
    $servername = "localhost";
    $username = "root";
    $password = "Phamdat280102@@";
    $database = "Project1";

    $conn =  mysqli_connect($servername, $username, $password, $database) ;

    mysqli_set_charset($conn, 'UTF8');

    $records = mysqli_query($conn, $sqlSelect);
    $record = mysqli_fetch_array($records);
    $Avatar = $record['Avatar'];
    $Full_name= $record['Full_name'];
    $Email = $record['Email'];

    $recordNPFCObject = mysqli_query($conn, $sqlSelectNumberProductsFromCart);
    $recordNPFC = mysqli_fetch_array($recordNPFCObject);
    $numberOfProducts = $recordNPFC[0];
    function select($query){
        $result = array();
        $object_records = mysqli_query($GLOBALS['conn'], $query);
        while(sizeof($result) < $object_records->num_rows){
            $result[] = mysqli_fetch_array($object_records);
        }
        return $result;
    }