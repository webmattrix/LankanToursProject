<?php

require "sqlConnection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$password = $_POST["password"];
$NIC = $_POST["NIC"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$city = $_POST["city"];
$date = $_POST["R_date"];

// echo($name);
// echo($dob);
// echo($email);
// echo($password);
// echo($NIC);
// echo($mobile);
// echo($address);
// echo($city);
// echo($date);


if (empty($name)) {
    echo ("Please enter Guide Name !!!");
} else if (strlen($name) > 100) {
    echo ("First Name must have less than 50 characters");
} else if (empty($dob)) {
    echo ("Please enter Guide Birth Day  !!!");
}  else if (empty($mobile)) {
    echo ("Please enter Guide mobile number !!!");
}else if (empty($NIC)) {
    echo ("Please enter Guide NIC number !!!");
}  else if (empty($email)) {
    echo ("Please enter Guide Email !!!");
} else if (strlen($email) >= 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
} else if (empty($password)) {
    echo ("Please enter Guide Password !!!");
} else if ($city == 0) {
    echo ("Please select a city !");
} else if (empty($address)) {
    echo ("Please enter address !");
} else {

    $rs = Database::search("SELECT * FROM `employee` WHERE `email`='".$email."' ");
    $n = $rs->num_rows;
    
    if($n > 0){
        echo ("User with the same Email already exists.");
    }else{
       

        Database::iud("INSERT INTO `employee` 
        (`name`,`email`,`reg_date`,`status`,`mobile`,`employe_type_id`,`password`,`nic`,`dob`) VALUES 
        ('".$name."','".$email."','".$date."','0','".$mobile."','3','".$password."','".$NIC."','".$dob."')");
    
        $emp_rs=Database::search("SELECT * FROM  `employee`WHERE `name`='".$name."'");
        $emp_data = $emp_rs->fetch_assoc();
    
        Database::iud("INSERT INTO `guide` 
        (`address`,`employee_id`,`city_id`) VALUES  ('".$address."','".$emp_data["id"]."','".$city."') ");
    
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
        $mail->Subject = 'Lankan Travel Logins';
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
                    <h3>' . $email . '</h3>
                    <h2>Password</h2>
                    <h3>' . $password . '</h3>
                    <p>Use this email & Password for your Logins!</p>
                    
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