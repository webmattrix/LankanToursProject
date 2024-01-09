
<?php

require "./sqlConnection.php";

$deletePlaceId = json_decode($_POST["dlt"]);
$newUpdPlaceId = json_decode($_POST["upd"]);
$tourId = $_POST["t_id"];

if (sizeof($deletePlaceId) == 0) {
} else {

       foreach ($deletePlaceId as $delPid) {

              Database::iud("DELETE FROM `tour_has_place` WHERE `tour_id`='" . $tourId . "' AND `place_id`='" . $delPid . "'");
       }
}

if (sizeof($newUpdPlaceId) == 0) {
} else {

       foreach ($newUpdPlaceId as $updid) {

              Database::iud("INSERT INTO `tour_has_place` (`tour_id`,`place_id`) VALUES ('" . $tourId . "','" . $updid . "')");
       }
}
