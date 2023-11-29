
<?php

require "./sqlConnection.php";

$tour_id = $_GET["tId"];
  
$tourUpdate_rs = Database::search("SELECT * FROM `tour` WHERE `id`='".$tour_id."'");
$tourUpdate_data = $tourUpdate_rs->fetch_assoc();

$tour_name = $tourUpdate_data["name"];
$duration = $tourUpdate_data["date_count"];

$responseObj = new stdClass();

$responseObj->t_name = $tour_name;
$responseObj->d_gap = $duration;

echo(json_encode($responseObj));
