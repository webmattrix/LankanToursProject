<?php
session_start();
require "../model/sqlConnection.php";

$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Rememberme = $_POST["Remember"];

if (empty($Email)){
    echo ("Please enter your Email !!!");
}else if(strlen($Email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($Password)){
    echo ("Please enter your Password !!!");
}else if(strlen($Password) < 5 || strlen($Password) > 20){
    echo ("Password must be between 5 - 20 charcters");
}else {

   $rs = Database:: search("SELECT * FROM `user` WHERE `email`='".$Email."' AND `password` ='".$Password."' ");
$n = $rs->num_rows;

if($n == 1){
    echo("success");
    $data = $rs->fetch_assoc();
    $_SESSION["LT_User"] =$data;

    if($Rememberme == "true"){
        // one month cookies
        setcookie("LT_email", $Email, time() + (86400 * 30), "/"); 
        setcookie("LT_password", $Password, time() + (86400 * 30), "/"); 
    } else{
        setcookie("email","",-1);
        setcookie("password","",-1);
    }

}else {
    echo("invalid user name or password!!");
}
}
?>