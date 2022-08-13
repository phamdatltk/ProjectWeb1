<?php    
    $servername = "localhost";
    $username = "root";
    $password = "Phamdat280102@@";
    $database = "Project1";

    $conn =  mysqli_connect($servername, $username, $password, $database) ;

    mysqli_set_charset($conn, 'UTF8');

    function select(string $query): array {
        global $mysqli;
        $result = [];

        $data = $mysqli->query($query);
        if($data->length > 0) {
            while($row = $data->fetch_assoc()){
                array_push($result, $row);
            }
        }
        return $result;
    }