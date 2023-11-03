<?php
require "sqlConnection.php";

$email = $_POST["email"];
$otp = $_POST["otp"];

$resultset = Database::search("SELECT * FROM 
`employee` INNER JOIN `employe_type` ON employee.employe_type_id=employe_type.id 
WHERE `employee`.`email`='" . $email . "' AND `employe_type`.`name`='guide' AND `verification_code`='" . $otp . "'");
$n = $resultset->num_rows;

if ($n == 1) {
    Database::iud("UPDATE `employee` SET `status`='1' WHERE `email`='" . $email . "'");
    echo "success";
} else {
    echo "invalid OTP code";
}
