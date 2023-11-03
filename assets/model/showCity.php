<?php 
require "sqlConnection.php";

$id = $_GET['id'];

$cityRs  = Database::search("SELECT *,`city`.`id` AS `city_id` FROM `city` INNER JOIN `city_image` ON `city`.`id`=`city_image`.`city_id` WHERE `city`.`id`='".$id."'");
$city = $cityRs->fetch_assoc();

$responseObj = new stdClass();
$responseObj->city = $city["name"];
$responseObj->img = $city["path"];

// $imageData = array();

// foreach ($cityRs as $k) {
//     $imageData[] = array(
//         "id" => $k["city_id"],
//         "path" => $k["path"]
//     );
// }


// $responseObj->images = $imageData;

echo (json_encode($responseObj));
?>