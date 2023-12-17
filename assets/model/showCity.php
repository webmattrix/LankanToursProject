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


echo (json_encode($responseObj));
?>