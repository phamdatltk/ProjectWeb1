<?php
    if(isset($_GET['edit'])){
        $edit = $_GET['edit'];
    }
    if (isset($_POST['name'])){
        $name = $_POST['name'];
        if($name == ""){
            header("Location: editProfilePage.php?error=1&edit=".$edit);
        }
    }
    require("../../connect.php");
    if($edit == 1){
        $s = "Full_name";
    }
    if($edit == 2){
        $s = "Password";
    }
    if($edit == 3){
        $s = "Gender";
    }
    if($edit == 4){
        $s = "Date_of_birth";
    }
    if($edit == 5){
        $s = "Phone_number";
    }

    $sqlEdit = "UPDATE Users SET $s = '$name' WHERE Token = '".$_COOKIE["TokenID"]."'";
    mysqli_query($conn, $sqlEdit);
    header("Location: profilePage.php");