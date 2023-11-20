<?php
require "../model/sqlConnection.php";

 $email = $_POST["Email"];
 $nPW = $_POST["nPW"];
$rnPW = $_POST["rnPW"];
$vCode = $_POST["vCode"];

if(empty($email)){
    echo("Missing Email Address");
}else if(empty($nPW)){
    echo("Please Enter Your New Password");
}else if(strlen($nPW)<5 || strlen($nPW)>20){
    echo("Invalid Password");
}else if(empty($rnPW)){
    echo("Please Enter Yur New Password");
}else if($nPW != $rnPW){
    echo("Password Does Not Match");
}else if(empty($vCode)){
    echo("Please Enter Your Verification Code");
}else{
    $rs = Database::search("SELECT * FROM `employee` WHERE `email`='".$email."' AND
    `verification_code`= '".$vCode."' ");
    $n = $rs->num_rows;

    if($n == 1){
         
        Database::iud("UPDATE `employee` SET `password` = '".$nPW."' WHERE `email` = '".$email."'");
        echo("success");
      
    }else{
        echo("Invalid Email Or Veification Code");
    };
}
?>
