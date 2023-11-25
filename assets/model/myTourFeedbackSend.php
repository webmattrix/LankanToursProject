<?php

require "../model/sqlConnection.php";
$id = $_POST["id"];
$rating = $_POST["rating"];
$feedbackMessage = $_POST["feedbackMessage"];

$d = new DateTime();
$tzone = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tzone);
$date = $d->format("Y-m-d H:i:s");


Database::iud("INSERT INTO `feedback` 
(`feedback`,`date_time`,`rating`,`order_id`) VALUES 
('" . $feedbackMessage . "','" . $date . "','" . $rating . "','" . $id . "')");

echo("success");

?>