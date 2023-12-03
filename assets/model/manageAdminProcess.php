<?php

require "../model/sqlConnection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";
require "passwordGenerator.php";

use PHPMailer\PHPMailer\PHPMailer;

$Name = $_POST["A_Name"];
$Email = $_POST["A_Email"];
$NIC = $_POST["A_NIC"];
$Mobile = $_POST["A_Mobile"];
$Address = $_POST["A_Address"];

if(empty($Name)){
    echo ("Please enter Admin Name !!!");
}else if(strlen($Name) > 100){
    echo ("Name must have less than 50 characters");
}else if (empty($Email)){
    echo ("Please enter Admin Email !!!");
}else if(strlen($Email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($NIC)){
    echo ("Please enter Admin NIC Number !!!");
}else if(empty($Mobile)){
    echo ("Please enter Admin Mobile Number !!!");
}else if(empty($Address)){
    echo ("Please enter Admin Address !!!");
}else {

$rs = Database::search("SELECT * FROM `employee` WHERE `email`='".$Email."' ");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email already exists.");
}else{
    $d = new DateTime();
    $tzone = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tzone);
    $date = $d->format("Y-m-d H:i:s");
 
    $password = generatePassword(6);

    Database::iud("INSERT INTO `employee` 
    (`name`,`email`,`reg_date`,`status`,`mobile`,`employe_type_id`,`password`,`nic`) VALUES 
    ('".$Name."','".$Email."','".$date."','0','".$Mobile."','2','".$password."','".$NIC."')");

    $emp_rs=Database::search("SELECT * FROM  `employee`WHERE `name`='".$Name."'");
    $emp_data = $emp_rs->fetch_assoc();

    Database::iud("INSERT INTO `admin` 
    (`address`,`employee_id`) VALUES  ('".$Address."','".$emp_data["id"]."') ");

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
                <h2>UserName</h2>
                <h3>' . $Email . '</h3>
                <h2>Password</h2>
                <h3>' . $password . '</h3>
                <p>Use this User name & Password for your Logins!</p>
                
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
}
    
}
?>
