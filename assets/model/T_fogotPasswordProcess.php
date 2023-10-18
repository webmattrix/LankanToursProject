<?php
require "../model/sqlConnection.php";

require  "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

//  $email = $_GET["e"];
//  echo($email);

if (isset($_GET["E"])) {

    $email = $_GET["Email"];
    $rs = Database::search("SELECT * FROM `user` WHERE `email` ='" . $email . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        $code = uniqid();
        Database::iud("UPDATE `user`SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        // $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravishkaindrajith9.9@gmail.com';
        $mail->Password = 'syvfuwgxkloyngeh';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ravishkaindrajith9.9@gmail.com', 'Reset Password');
        $mail->addReplyTo('ravishkaindrajith9.9@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'eShop Forgot password Verification Code';
        $bodyContent = '<h1 style ="color:green">Your verification Code is ' . $code . '</h1>';

        $mail->Body    = $bodyContent;
        if (!$mail->send()) {
            echo "verification code sending failed";
        } else {
            echo 'success';
        }
    } else {
        echo ("invalid email address");
    }
}
?>