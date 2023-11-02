<?php

session_start();

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";
require "sqlConnection.php";

use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$password = $_POST["password"];
$profile_picture = null;
if (isset($_FILES["profileImage"])) {
    $profile_picture = $_FILES["profileImage"];
}

$verification_code = generatePassword(6);

$responseObj = new stdClass(); // Response Json Object

if (empty($name) && empty($mobile) && empty($address) && empty($password) && (empty($profile_picture) || $profile_picture == null)) {
    $responseObj->changeStatus = "failed";
} else {
    $responseObj->changeStatus = "success";

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@lankantravel.com';
    $mail->Password = 'Ltp2023@#';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('contact@lankantravel.com', 'OTP Verification');
    $mail->addReplyTo('contact@lankantravel.com', 'OTP Verification');
    $mail->addAddress('vihangaheshan37@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Account Verification Code';
    $bodyContent = 'Your Verification Code: ' . $verification_code;
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        $responseObj->emailStatus = "failed";
    } else {
        $responseObj->emailStatus = "success";
        Database::iud("UPDATE `employee` SET `employee`.`verification_code`='" . $verification_code . "' WHERE `employee`.`id`='" . $_SESSION["lt_admin"]["employee_id"] . "'");
    }
}
echo (json_encode($responseObj));
