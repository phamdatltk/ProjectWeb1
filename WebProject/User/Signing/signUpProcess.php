<?php
$errorSignUp = 0;
$regexPassword =  "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
$regexDob = "/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/i";
if(isset($_POST['Email'])){
    $Email= $_POST["Email"];
}
if(isset($_POST['Password']) && preg_match($regexPassword, $_POST['Password'])){
    $Password= $_POST["Password"];
}
else{
    $errorSignUp = 1;
}
$Password= $_POST["Password"];
if(isset($_POST['Repeat_password']) && strcmp($_POST['Repeat_password'],$Password) != 0){
    $errorSignUp  = 2;
}
if(isset($_POST['Full_name'])){
    $Full_name= $_POST['Full_name'];
}
if(isset($_POST['Gender']) && ( strcmp($_POST['Gender'],"Male") == 0  || strcmp($_POST['Gender'],"Female") == 0) ){
    $Gender = $_POST['Gender'];
}else{
    $errorSignUp = 3;
}
if(isset($_POST['Phone'])){
    $Phone= $_POST['Phone'];
}
if(isset($_POST['date_of_birth']) && preg_match($regexDob, $_POST['date_of_birth'])){
    $Date_of_birth= $_POST['date_of_birth'];
}else{
    $errorSignUp = 4;
}

var_dump($Gender, $Email, $Phone, $Date_of_birth, $Phone_number, $Full_name);

if($errorSignUp == 0){

    $sqlInsert = "Insert into Users(Gender, Email, Password, Date_of_birth, Phone_number, Full_name) values ('{$Gender}', '{$Email}', '{$Password}', '{$Date_of_birth}','{$Phone}','{$Full_name}' )";
    $sqlSelect = "SELECT * FROM Users";

    require("../../connect.php");

    $records = mysqli_query($conn, $sqlSelect);


    foreach ($records as $record) {
        if(strcmp($record['Email'], $Email) == 0){
            $errorSignUp = 5;
            break;
        }
    }
    if($errorSignUp == 0){
        mysqli_query($conn, $sqlInsert);
        header("Location:./loginPage.php?errorSignUp=$errorSignUp");
    }
    else{
        header("Location:./signUpPage.php?errorSignUp=$errorSignUp");
    }
}else{
    header("Location:./signUpPage.php?errorSignUp=$errorSignUp");
}