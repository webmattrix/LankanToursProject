<?php
session_start();
require "../model/sqlConnection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

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
    $rs2 = Database::search("SELECT * FROM `user` WHERE `email`='" . $Email . "' AND `password` ='" . $Password . "' AND `status` ='0' ");
    $n1 = $rs1->num_rows;
    $n2 = $rs2->num_rows;

    if ($n1 == 1) {
        echo ("success01");
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
    } else if ($n2 == 1) {
        echo ("success02");
        $code = uniqid();
        Database::iud("UPDATE `user`SET `verification_code`='" . $code . "' WHERE `email`='" . $Email . "'");
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
                    <h1>' . $code . '</h1>
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
           
        }

        // $data = $rs2->fetch_assoc();
        // $_SESSION["lt_tourist"] = $data;

        // if ($Rememberme == "true") {
        //     // one month cookies
        //     setcookie("lt_tourist_email", $Email, time() + (86400 * 30), "/");
        //     setcookie("lt_tourist_password", $Password, time() + (86400 * 30), "/");
        // } else {
        //     setcookie("lt_tourist_email", "", -1);
        //     setcookie("lt_tourist_password", "", -1);
        // }


    } else {
        echo ("invalid user name or password!!");
    }
}
?>