<?php
    if(isset($_GET['cartID'])){
        $cartID = $_GET['cartID'];
    }
                                   
    $sqlDelete = "DELETE FROM Carts WHERE ID='$cartID'";

    require("../../connect.php");
    mysqli_query($conn, $sqlDelete);

    header("Location: ./cart.php");    
