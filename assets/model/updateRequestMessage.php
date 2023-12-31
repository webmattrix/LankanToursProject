<?php

require "sqlConnection.php";

session_start();

if (isset($_SESSION["lt_admin"])) {

    $employee_table = Database::search("SELECT * FROM `employee`
                                INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
                                WHERE `employe_type`.`name`='Developer' AND `employee`.`id`='" . $_SESSION["lt_admin"]["employee_id"] . "'");

    if (($employee_table->num_rows) == 1) {
        Database::iud("UPDATE `request_message` SET `request_message`.`status`='" . $_GET["status"] . "' WHERE `id`='" . $_GET["id"] . "'");
        echo ("3");
    } else {
        echo ("2");
    }
} else {
    echo ("1");
}

// 1 => Invalid User
// 2 => Not a developer
// 3 => Process is success