<?php

require "sqlConnection.php";

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $date->format("Y-m-d");
$end = '2023-10-28';

echo ((date_diff(new DateTime($today), new DateTime($end)))->d);

// $query = "SELECT *, `tour`.`name` AS `tour_name` FROM `order` INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id` INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` WHERE `order`.`end_date`>='" . $today . "' AND `order_status`.`name`='Assigned'";
// $order_rs = Database::search($query);
// echo (($order_rs->fetch_assoc())["tour_name"]);
