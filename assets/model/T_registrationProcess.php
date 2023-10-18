<?php

require "../model/sqlConnection.php";

$F_Name = $_POST["F_Name"];
$L_Name = $_POST["L_Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Country = $_POST["Country"];

if(empty($F_Name)){
    echo ("Please enter your First Name !!!");
}else if(strlen($F_Name) > 100){
    echo ("First Name must have less than 50 characters");
}else if(empty($L_Name)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($L_Name) > 100){
    echo ("Last Name must have less than 50 characters");
}else if (empty($Email)){
    echo ("Please enter your Email !!!");
}else if(strlen($Email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($Password)){
    echo ("Please enter your Password !!!");
}else if(strlen($Password) < 5 || strlen($Password) > 20){
    echo ("Password must be between 5 - 20 charcters");
}else if($Country == 0){
    echo ("Please select a Country !");
}else {

$rs = Database::search("SELECT * FROM `user` WHERE `email`='".$Email."' ");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email already exists.");
}else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `user` 
    (`name`,`email`,`password`,`reg_date`,`country_id`) VALUES 
    ('".$F_Name."','".$Email."','".$Password."','".$date."','".$Country."')");

    echo "success";
}
    
}
?>
