<?php

require "sqlConnection.php";

$email = $_POST["email"];
$message = $_POST["message"];

$today = new DateTime();
$today = $today->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $today->format("Y-m-d H:i:s");

if (empty($email)) {
    echo ("Please enter your email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
} else if (empty($message) || $email == "Message") {
    echo ("Please enter your message");
} else {
    Database::iud("INSERT INTO `request_message` (`email`,`message`,`date_time`) VALUES ('" . $email . "','" . $message . "','" . $today . "')");
    echo ("Success");
}
