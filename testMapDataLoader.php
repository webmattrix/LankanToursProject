<?php
require "assets/model/sqlConnection.php";

$place_table = Database::search("SELECT *,`place`.`name` AS `place_name` FROM `place`");

$place_table_rows = $place_table->num_rows;

$response_array = [];

if ($place_table_rows > 0) {
    $place_table_data = $place_table->fetch_all(MYSQLI_ASSOC);

    foreach ($place_table_data as $place_data) {
        $data_obj = new stdClass();
        $data_obj->lat = $place_data["latitude"];
        $data_obj->lng = $place_data["longitude"];
        $data_obj->title = $place_data["place_name"];

        array_push($response_array, $data_obj);
    }
} else {
    // If there are no places, add a dummy entry to make it a JSON array
    $response_array = [['lat' => 0, 'lng' => 0, 'title' => 'No places']];
}

// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response_array);
