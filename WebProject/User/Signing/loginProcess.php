<?php

session_start();

if (isset($_POST['email'])) {
    $Email = $_POST["email"];
}
if (isset($_POST['password'])) {
    $Password = $_POST["password"];
}


$sqlSelect = "SELECT * FROM Users";
$sqlSelectPassword = "SELECT * FROM Users WHERE Email = '$Email'";

require("../../connect.php");

$records = mysqli_query($conn, $sqlSelect);

$checkEmail = 0;

foreach ($records as $record) {
    if (strcmp($record['Email'], $Email) == 0) {
        $checkEmail = 1;
        break;
    }
}


if ($checkEmail == 1) {
    $queryPass = mysqli_query($conn, $sqlSelectPassword);
    $Pass  = mysqli_fetch_array($queryPass);

    if (strcmp($Pass['Password'], $Password) == 0) {
        
        
        $ID = $Pass['ID'];
        $token = md5($ID.$Email.time());
        $sqlInsertToken = "UPDATE Users SET Token = '$token' WHERE ID = '$ID'";
        mysqli_query($conn, $sqlInsertToken);
        
        
        $_SESSION['ID'] = $Pass['ID'];
        setcookie("TokenID", $token, time() + 86400 * 30, "/");
        header("Location: ../home.php");


    } else {
        header('Location: loginPage.php?errorLogin=2');
    }
}

if ($checkEmail == 0) {
    header('Location: loginPage.php?errorLogin=1');
}
