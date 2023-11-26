<?php


require "sqlConnection.php";

$place_rs = Database::search("SELECT DISTINCT(`place`.`id`) FROM `place` INNER JOIN `place_image` ON `place`.`id`=`place_image`.`place_id`");
$place_num = $place_rs->num_rows;
$responseObj = new stdClass();
for ($x = 0; $x < $place_num; $x++) {
    $place_data = $place_rs->fetch_assoc();
    $place_image_rs = Database::search("SELECT `place`.`name`,`place_image`.`path` FROM `place` INNER JOIN `place_image` ON `place`.`id`=`place_image`.`place_id` WHERE `place`.`id`='" . $place_data["id"] . "' LIMIT 1");
    $place_image_data = $place_image_rs->fetch_assoc();
    $place_obj = new stdClass();
    $place_obj->name = $place_image_data["name"];
    $place_obj->path = $place_image_data["path"];

    $responseObj->{$place_data["id"]} = $place_obj;
}

echo (json_encode($responseObj));