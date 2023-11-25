<?php

require "sqlConnection.php";

session_start();
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$password = $_POST["password"];
$verification_code = $_POST["verification_code"];
$profile_picture = null;
if (isset($_FILES["profileImage"])) {
    $profile_picture = $_FILES["profileImage"];
}

$query = "UPDATE `employee` SET ";
$query_status = false;

$employee_rs = Database::search("SELECT * FROM `employee` WHERE `email`='" . $_SESSION["lt_guide"]["email"] . "' AND verification_code='" . $verification_code . "'");
if ($employee_rs->num_rows == 1) {
    $employee_data = $employee_rs->fetch_assoc();

    if (!empty($name)) {
        if ($query_status == false) {
            $query .= "name='" . $name . "'";
            $query_status = true;
        } else {
            $query .= ", name='" . $name . "'";
        }
    }
    if (!empty($mobile)) {
        if ($query_status == false) {
            $query .= "mobile='" . $mobile . "'";
            $query_status = true;
        } else {
            $query .= ", mobile='" . $mobile . "'";
        }
    }
    if (!empty($password)) {
        if ($query_status == false) {
            $query .= "password='" . $password . "'";
            $query_status = true;
        } else {
            $query .= ", password='" . $password . "'";
        }
    }

    $query .= ",verification_code=NULL WHERE `email`='" . $_SESSION["lt_guide"]["email"] . "' AND verification_code='" . $verification_code . "'";
    Database::iud($query);

    if (!empty($address)) {
        Database::iud("UPDATE `guide` SET `guide`.`address`='" . $address . "' WHERE `guide`.`employee_id`='" . $_SESSION["lt_guide"]["employee_id"] . "'");
    }

    if (!empty($profile_picture)) {

        $img_type = null;
        if ($profile_picture["type"] == "image/jpeg") {
            $img_type = ".jpeg";
        } else if ($profile_picture["type"] == "image/jpg") {
            $img_type = ".jpg";
        } else if ($profile_picture["type"] == "image/png") {
            $img_type = ".png";
        }


        $file_path = "../img/profile/guide/" . $employee_data["email"] . "_profile_img" . $img_type . "";
        move_uploaded_file($profile_picture["tmp_name"], $file_path);

        Database::iud("UPDATE `guide` SET `guide`.`profile_picture`='" . $employee_data["name"] . "_profile_img" . $img_type . "' WHERE `guide`.`employee_id`='" . $_SESSION["lt_guide"]["employee_id"] . "'");
    }

    echo ("success");
} else {
    echo ("failed");
}
