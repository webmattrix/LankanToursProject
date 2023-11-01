<?php
session_start();
require "../model/sqlConnection.php";

$code = $_GET["code"];
$email = $_GET["email"];
$rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`= '".$code."' ");
$n = $rs->num_rows;

if($n == 1){
    Database::iud("UPDATE `user` SET `status`= '1' WHERE `email` ='".$email."'");
echo("success");

}else{
    echo("verificationcode is invalid");
}



?>