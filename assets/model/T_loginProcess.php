<?php
session_start();
require "../model/sqlConnection.php";


$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Rememberme = $_POST["Remember"];

if (empty($Email)) {
    echo ("Please enter your Email !!!");
} else if (strlen($Email) >= 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
} else if (empty($Password)) {
    echo ("Please enter your Password !!!");
} else if (strlen($Password) < 5 || strlen($Password) > 20) {
    echo ("Password must be between 5 - 20 charcters");
} else {

    $rs1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $Email . "' AND `password` ='" . $Password . "' AND `status` ='1' ");
    $n1 = $rs1->num_rows;

    if ($n1 == 1) {
        
        $data = $rs1->fetch_assoc();
        $_SESSION["lt_tourist"] = $data;

        if ($Rememberme == "true") {
            // one month cookies
            setcookie("lt_tourist_email", $Email, time() + (86400 * 30), "/");
            setcookie("lt_tourist_password", $Password, time() + (86400 * 30), "/");
        } else {
            setcookie("lt_tourist_email", "", -1);
            setcookie("lt_tourist_password", "", -1);
        }
        echo ("success");
    } else {
        echo ("invalid user name or password!!");
    }
}
?>