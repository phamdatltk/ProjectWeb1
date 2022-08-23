<?php
    if(isset($_GET['amount'])){
        $amount = (int)$_GET['amount'];
    }


    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }

    if(isset($_COOKIE['TokenID'])){
        $Token = $_COOKIE['TokenID'];
    }

    $sqlSelectCheck = "SELECT * FROM Carts 
                  WHERE Carts.User_id = (SELECT ID FROM Users WHERE Token = '$Token')
                  AND Product_id = '$product_id'";
    
    require("../../connect.php");

    $recordCheck = select($sqlSelectCheck);

    var_dump($recordCheck);

    if(count($recordCheck) == 0){
        $sqlInsert = "INSERT INTO Carts (User_id, Product_id, Quantity) value
                  ((select ID from Users where Token = '$Token'), '$product_id', '$amount')";
        mysqli_query($conn, $sqlInsert);
    }else{
        $productIdInCart = $recordCheck[0]["ID"];
        $newQuantity = $recordCheck[0]["Quantity"]+$amount;
        $sqlUpdate = "UPDATE Carts SET Quantity = '$newQuantity' WHERE ID = '$productIdInCart'";
        mysqli_query($conn, $sqlUpdate);
    }


    

    header("Location: ../product.php?ID=$product_id");    
