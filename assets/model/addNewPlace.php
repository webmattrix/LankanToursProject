<?php
require "sqlConnection.php";

$name = $_POST["name"];

if (isset($_FILES["image"])) {
    $image = $_FILES["image"];

    if (empty($name)) {
        echo "Name is empty";
    } else {
        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {

            echo "Please Select a valid image";
        } else {
            $new_image_extention;

            if ($file_ex == "image/jpg") {
                $new_image_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_image_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_image_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_image_extention = ".svg";
            }

            $unique_id = uniqid() . $new_image_extention;

            $file_name = "../../assets/uploads/places/" . $unique_id;
            $db_file_name =  "assets/uploads/places/" . $unique_id;

            move_uploaded_file($image["tmp_name"], $file_name);

            Database::iud("INSERT INTO `place`(`name`) VALUES('" . $name . "')");

            $lastId = Database::$connection->insert_id;

            Database::iud("INSERT INTO `place_image`(`path`,`place_id`) VALUES('" . $db_file_name . "','" . $lastId . "')");

            echo "success";
        }
    }
}
