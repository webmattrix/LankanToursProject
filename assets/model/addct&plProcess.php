
<?php

require "./sqlConnection.php";

$city_id = $_POST["cityId"];
$place_id = $_POST["placeId"];

$check_city_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."'");
$check_city_data = $check_city_rs->fetch_assoc();

$check_place_rs = Database::search("SELECT * FROM `place` WHERE `id`='".$place_id."'");
$check_place_data = $check_place_rs->fetch_assoc();

$packOfDetails = new stdClass();

$packOfDetails->cityName = $check_city_data["name"];
$packOfDetails->placeName = $check_place_data["name"];

echo(json_encode($packOfDetails));