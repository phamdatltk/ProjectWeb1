<?php
    if(isset($_GET['amount'])){
        $amount = (int)$_GET['amount'];
    }else{
        $amount = 1;
    }


    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }

    if(isset($_COOKIE['TokenID'])){
        $Token = $_COOKIE['TokenID'];
        //Check the existence of the product in the cart
        $sqlSelectCheck = "SELECT * FROM Carts 
                      WHERE Carts.User_id = (SELECT ID FROM Users WHERE Token = '$Token')
                      AND Product_id = '$product_id'";
        
        require("../../connect.php");
        $recordCheck = select($sqlSelectCheck);
    
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
    
        // If in product page click buy, check = 1 then redirect to cart.php;
        if(isset($_GET['check'])){
            header("Location: ./cart.php?checked=$product_id");
        }else{
            header("Location: ../product.php?ID=$product_id");    
        }
    }else{
        // Send checkFromProcess to check login to add to cart
        header("Location: ../Signing/loginPage.php?checkFromProcess=1&ID=$product_id");    
    }




