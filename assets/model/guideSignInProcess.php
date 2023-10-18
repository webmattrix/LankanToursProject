<?php
session_start();
require "sqlConnection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$rememberMe = $_POST["rememberme"];

if (empty($email)) {
    echo "please enter your email address";
} else if (strlen($email) > 100) {
    echo "Email address should contain less than 100 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($password)) {
    echo "please enter your password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Invalid Password";
} else {
    $resulset = Database::search("SELECT employee.email,employee.password,employe_type.name FROM 
    `employee` INNER JOIN `employe_type` ON employee.employe_type_id=employe_type.id 
    WHERE `employee`.`email`='" . $email . "' AND `employee`.`password`='" . $password . "' AND `employe_type`.`name`='guide'");
    $n = $resulset->num_rows;

    if ($n == 1) {
        $d = $resulset->fetch_assoc();
        $_SESSION["guide"] = $d;

        if ($rememberMe == true) {
            setcookie("guide_email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("guide_password", $password, time() + (60 * 60 * 24 * 365));
        } else {

            setcookie("guide_email", "", -1);
            setcookie("guide_password", "", -1);
        }

        echo "success";
    } else {
        echo "Invalid Email or Password";
    } 
}
