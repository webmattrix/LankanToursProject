<?php

session_start();
require "sqlConnection.php";

$psw1 = $_POST["touristPassword1"];
$psw2 = $_POST["touristPassword2"];
$verification_code = $_POST["touristVerificationCode"];

if (empty($psw1)) {
    echo ("Please enter your new password");
} else if (empty($psw2)) {
    echo ("Please enter your confirm password");
} else if ($psw1 != $psw2) {
    echo ("Password doesn't match");
} else if ((strlen($psw1) > 20) || (strlen($psw2) > 20)) {
    echo ("Password must be less than 20 characters");
} else if ((strlen($psw1) < 8) || (strlen($psw2) < 8)) {
    echo ("Password must be at least 8 characters long");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE email='" . $_SESSION["lt_tourist"]["email"] . "' AND verification_code='" . $verification_code . "'");
    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();

        if ($data["verification_code"] == $verification_code) {

            Database::iud("UPDATE user SET password='" . $psw1 . "',verification_code=NULL WHERE email='" . $_SESSION["lt_tourist"]["email"] . "'");
            echo ("success");
        } else {
            echo ("Invalid Verification Code. Check your email");
        }
    } else {
        echo ("Somethign went wrong. Please try again later");
    }
}
