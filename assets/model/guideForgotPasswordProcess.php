<?php

require "sqlConnection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {
    $email = $_GET["e"];

    $resultset = Database::search("SELECT * FROM 
    `employee` INNER JOIN `employe_type` ON employee.employe_type_id=employe_type.id 
    WHERE `employee`.`email`='" . $email . "' AND `employe_type`.`name`='guide'");

    $n = $resultset->num_rows;

    if ($n == 1) {

        $uniqueID = '';
        $uniqueID .= mt_rand(1000, 999999999);
        $uniqueID = substr($uniqueID, 0, 6);

        Database::iud("UPDATE `employee` SET `verification_code`='" . $uniqueID . "' 
    WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'madsachintha1234@gmail.com';
        $mail->Password = 'tbbojqkskrdmvaee';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('lankanTours@gmail.com', 'Lankan Tours');
        $mail->addReplyTo('lankanTours@gmail.com', 'Lankan Tours');
        $mail->addAddress('madsachintha1234@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Lankan Tours Reset Code';
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
                    <h1>' . $uniqueID . '</h1>
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
            echo 'Verification code sending failed';
        } else {
            echo 'success';
        }
    } else {
        echo "Email Address Not Found.";
    }
} else {
    echo "Please Enter your Email Address.";
}
