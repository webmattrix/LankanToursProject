<?php

require "sqlConnection.php";

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $date->format("Y-m-d");

$query = "SELECT * FROM `order` WHERE `end_date`>='" . $today . "' AND ";
$order_rs = Database::search($query);
echo ($order_rs->num_rows);
