<?php 
require "sqlConnection.php";
 
$id = $_GET['id'];

$cityRs = Database::search("SELECT `city`.`name` as `name`,`city_image`.`path` as `path`, `city`.`id` AS `city_id` 
                            FROM `city` 
                            INNER JOIN `city_image` ON `city`.`id` = `city_image`.`city_id` 
                            WHERE `city`.`id` = '".$id."'");

$city = $cityRs->fetch_assoc();

$responseObj = new stdClass();
$responseObj->city = $city["name"];
$responseObj->img = $city["path"];

$placesRs = Database::search("SELECT `place`.`name` AS `place_name`, MIN(`place_image`.`path`) AS `image_path` 
                              FROM `place` 
                              INNER JOIN `place_image` ON `place`.`id` = `place_image`.`place_id`
                              WHERE `place`.`city_id` = '".$id."' 
                              GROUP BY `place`.`id`");

$places = array();
while ($row = $placesRs->fetch_assoc()) {
    $placeDetails = new stdClass();
    $placeDetails->place_name = $row['place_name'];
    $placeDetails->image_path = $row['image_path'];
    
    $places[] = $placeDetails;
}

$responseObj->places = $places;

echo (json_encode($responseObj));

?>