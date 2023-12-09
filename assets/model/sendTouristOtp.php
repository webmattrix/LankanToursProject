<?php

session_start();

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";
require "sqlConnection.php";

use PHPMailer\PHPMailer\PHPMailer;

$verification_code = generatePassword(6);

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
$mail->addAddress($_SESSION["lt_tourist"]["email"]);
$mail->isHTML(true);
$mail->Subject = 'Account Verification Code';
$bodyContent = 'Your Verification Code: ' . $verification_code;
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo ("1");
} else {
    echo ("2");
    Database::iud("UPDATE `user` SET `user`.`verification_code`='" . $verification_code . "' WHERE `user`.`email`='" . $_SESSION["lt_tourist"]["email"] . "'");
}
