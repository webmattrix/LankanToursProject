<?php

require "../model/sqlConnection.php";

$Name = $_POST["A_Name"];
$Email = $_POST["A_Email"];
$NIC = $_POST["A_NIC"];
$Mobile = $_POST["A_Mobile"];
$Address = $_POST["A_Address"];

if(empty($Name)){
    echo ("Please enter Admin Name !!!");
}else if(strlen($Name) > 100){
    echo ("Name must have less than 50 characters");
}else if (empty($Email)){
    echo ("Please enter Admin Email !!!");
}else if(strlen($Email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($NIC)){
    echo ("Please enter Admin NIC Number !!!");
}else if(empty($Mobile)){
    echo ("Please enter Admin Mobile Number !!!");
}else if(empty($Address)){
    echo ("Please enter Admin Address !!!");
}else {

// $rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$Email."' ");
// $n = $rs->num_rows;

// if($n > 0){
//     echo ("User with the same Email already exists.");
// }
if(10 > 200){
    echo ("User with the same Email already exists.");
}else{
    $d = new DateTime();
    $tzone = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tzone);
    $date = $d->format("Y-m-d H:i:s");

    // Database::iud("INSERT INTO `user` 
    // (`name`,`email`,`password`,`reg_date`,`country_id`) VALUES 
    // ('".$F_Name."','".$Email."','".$Password."','".$date."','".$Country."')");

    Database::iud("INSERT INTO `admin` 
    (`profile_picture`,`address`,`city_id`,`employee_id`) VALUES 
    ('".$Name."','".$Address."','2','1')");

    echo "success";
}
    
}
?>
