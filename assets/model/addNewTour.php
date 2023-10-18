<?php
require "sqlConnection.php";

$name = $_POST["name"];
$duration = $_POST["duration"];
$description = $_POST["description"];
$places = $_POST["places"];

// echo ($places . $name . $description . $duration);

if (empty($name)) {
    echo "Name is empty";
} else if (empty($duration)) {
    echo "duration is empty";
} else if (empty($description)) {
    echo "description is empty";
} else if (empty($places)) {
    echo "places is empty";
} else {


    Database::iud("INSERT INTO `tour`(`name`,`duration`,`view`,`description`) 
            VALUES('" . $name . "','" . $duration . "','1','" . $description . "')");

    $lastId = Database::$connection->insert_id;

    $splitArray = explode(',', $places);
    foreach ($splitArray as $element) {
        Database::iud("INSERT INTO `tour_has_place`(`tour_id`,`place_id`) VALUES('" . $lastId . "','" . $element . "')");
    }

    echo "success";
}
