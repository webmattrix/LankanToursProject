<?php
session_start();
require "sqlConnection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";

use PHPMailer\PHPMailer\PHPMailer;

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
    $resulset = Database::search("SELECT `employee`.`email`,`employee`.`password`,`employe_type`.`name`,`employee`.`status`,`employee`.`id` FROM 
    `employee` INNER JOIN `employe_type` ON employee.employe_type_id=employe_type.id 
    WHERE `employee`.`email`='" . $email . "' AND `employee`.`password`='" . $password . "' AND `employe_type`.`name`='admin'");
    $n = $resulset->num_rows;

    if ($n == 1) {
        $data = $resulset->fetch_assoc();
        $_SESSION["lt_admin"] = $data;


        if ($data['status'] == 0) {
            if ($rememberMe == true) {
                setcookie("lt_admin_email", $email, time() + (86400 * 30), "/");
                setcookie("lt_admin_password", $password, time() + (86400 * 30), "/");
            } else {

                setcookie("lt_admin_email", "", -1);
                setcookie("lt_admin_password", "", -1);
            }

          
            $verificatonCode = generatePassword(6);

            Database::iud("UPDATE `employee`SET `verification_code`='" . $verificatonCode . "' WHERE `email`='" . $email . "'");
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
                echo "success01";
            }

            
        } else {
           
            if ($rememberMe == true) {
                setcookie("lt_admin_email", $email, time() + (86400 * 30), "/");
                setcookie("lt_admin_password", $password, time() + (86400 * 30), "/");
            } else {

                setcookie("lt_admin_email", "", -1);
                setcookie("lt_admin_password", "", -1);
            }
             echo "success02";
        }
    } else {
        echo "Invalid Email or Password";
    }
}
?>
