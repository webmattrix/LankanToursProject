<?php
require "../model/sqlConnection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";

use PHPMailer\PHPMailer\PHPMailer;

if (!empty($_GET["Email"])) {
    

    $email = $_GET["Email"];
    $rs = Database::search("SELECT * FROM `user` WHERE `email` ='" . $email . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        $code = generatePassword(6);
        Database::iud("UPDATE `user`SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");
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
        $mail->addAddress($email);
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
                    <p>Use this verification code to reset your password!</p>
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
            echo 'success';
        }
    } else {
        echo ("invalid email address");
    }
} else {
    echo "Please Enter your Email Address.";
}
?>