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
    WHERE `employee`.`email`='" . $email . "' AND `employee`.`password`='" . $password . "' AND `employe_type`.`name`='admin'");
    $n = $resulset->num_rows;

    if ($n == 1) {
        $d = $resulset->fetch_assoc();
        $_SESSION["lt_admin"] = $d;

        if ($rememberMe == true) {
            setcookie("lt_admin_email", $email, time() + (86400 * 30), "/");
            setcookie("lt_admin_password", $password, time() + (86400 * 30), "/");
        } else {

            setcookie("lt_admin_email", "", -1);
            setcookie("lt_admin_password", "", -1);
        }

        echo "success";
    } else {
        echo "Invalid Email or Password";
    } 
}
?>
