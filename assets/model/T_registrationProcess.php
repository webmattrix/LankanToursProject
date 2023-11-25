<?php

require "../model/sqlConnection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";

use PHPMailer\PHPMailer\PHPMailer;

$F_Name = $_POST["F_Name"];
$L_Name = $_POST["L_Name"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Country = $_POST["Country"];

if (empty($F_Name)) {
    echo ("Please enter your First Name !!!");
} else if (strlen($F_Name) > 100) {
    echo ("First Name must have less than 50 characters");
} else if (empty($L_Name)) {
    echo ("Please enter your Last Name !!!");
} else if (strlen($L_Name) > 100) {
    echo ("Last Name must have less than 50 characters");
} else if (empty($Email)) {
    echo ("Please enter your Email !!!");
} else if (strlen($Email) >= 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
} else if (empty($Password)) {
    echo ("Please enter your Password !!!");
} else if (strlen($Password) < 5 || strlen($Password) > 20) {
    echo ("Password must be between 5 - 20 charcters");
} else if ($Country == 0) {
    echo ("Please select a Country !");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $Email . "' ");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the same Email already exists.");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $verificatonCode = generatePassword(6);

        Database::iud("INSERT INTO `user` (`f_name`,`l_name`,`email`,`password`,`reg_date`,`verification_code`,`country_id`,`status`) VALUES 
    ('" . $F_Name . "','" . $L_Name . "','" . $Email . "','" . $Password . "','" . $date . "','" . $verificatonCode . "','" . $Country . "','0')");

       
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@lankantravel.com';
        $mail->Password = 'Ltp2023@#';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('contact@lankantravel.com', 'Lankan Travel');
        $mail->addReplyTo('contact@lankantravel.com', 'Lankan Travel');
        $mail->addAddress($Email);
        $mail->isHTML(true);
        $mail->Subject = 'Lankan Travel Reset Code';
        $bodyContent = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            /* Reset some default styles */
            body, html {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }
            table {
                border-collapse: collapse;
            }
            /* Set the email content width and center it */
            .email-container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
            }
            /* Header styling */
            .header {
                background-color: #007BFF;
                color: #fff;
                padding: 20px;
                text-align: center;
            }
            .header h1 {
                font-size: 24px;
            }
            /* Content section styling */
            .content {
                padding: 20px;
            }
            /* Button styling */
            .button {
                background-color: #007BFF;
                color: #fff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                display: inline-block;
            }
            /* Footer styling */
            .footer {
                background-color: #007BFF;
                color: #fff;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="header">
                <h1>Lankan Tours</h1>
            </div>
            <div class="content">
                <h2>Verification Code</h2>
                <h1>' .  $verificatonCode . '</h1>
                <p>Use this verification code to verify your Email!</p>
            </div>
            <div class="footer">
                &copy; 2023 Your LankanTours Name
            </div>
        </div>
    </body>
    </html>';

        $mail->Body    = $bodyContent;
        if (!$mail->send()) {
            echo "verification code sending failed";
        } else {
             echo "success";
        }
    }
}

?>