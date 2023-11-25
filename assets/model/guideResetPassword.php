<?php
require "sqlConnection.php";
$email = $_POST["email"];
$vc = $_POST["vc"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];

if (empty($np)) {
    echo "please enter your password";
} else if (strlen($np) < 5 || strlen($np) > 20) {
    echo "Invalid Password";
} else if (empty($vc)) {
    echo "enter verification code";
} else if ($np == $rnp) {
    $resultset = Database::search("SELECT * FROM 
`employee` INNER JOIN `employe_type` ON employee.employe_type_id=employe_type.id 
WHERE `employee`.`email`='" . $email . "' AND `employe_type`.`name`='guide' AND `verification_code`='" . $vc . "'");
    $n = $resultset->num_rows;
    if ($n == 1) {
        Database::iud("UPDATE `employee` SET `password`='" . $np . "' WHERE `email`='" . $email . "'");
        echo "success";
    }
} else {
    echo "passwords not matching";
}
