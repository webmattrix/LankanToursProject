<?php
require "sqlConnection.php";

$name = $_POST["name"];
$duration = $_POST["duration"];
$description = $_POST["description"];
$places = $_POST["places"];

// echo ($places . $name . $description . $duration);
if (isset($_FILES["image"])) {

    $image = $_FILES["image"];

    if (empty($name)) {
        echo "Name is empty";
    } else if (empty($duration)) {
        echo "duration is empty";
    } else if (empty($description)) {
        echo "description is empty";
    } else if (empty($places)) {
        echo "places is empty";
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

            $file_name = "../../assets/uploads/tours/" . $unique_id;
            $db_file_name =  "assets/uploads/tours/" . $unique_id;

            move_uploaded_file($image["tmp_name"], $file_name);

            Database::iud("INSERT INTO `tour`(`name`,`duration`,`view`,`description`,`image_path`) 
            VALUES('" . $name . "','" . $duration . "','1','" . $description . "','" . $db_file_name . "')");

            $lastId = Database::$connection->insert_id;

            $splitArray = explode(',', $places);
            foreach ($splitArray as $element) {
                Database::iud("INSERT INTO `tour_has_place`(`tour_id`,`place_id`) VALUES('" . $lastId . "','" . $element . "')");
            }

            echo "success";
        }
    }
}
