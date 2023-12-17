
<?php

require "./sqlConnection.php";

$search_data = $_GET["sf"];

$wtcFilter_rs = Database::search("SELECT *, `tour`.`name` AS `t_name` FROM `watchlist` 
                                  INNER JOIN `tour` ON `watchlist`.`tour_id`=`tour`.`id` 
                                  WHERE `tour`.`name` LIKE '%".$search_data."%'");

$wtcFilter_data = $wtcFilter_rs->fetch_assoc();

$resValue = $wtcFilter_data["t_name"];

echo($resValue);

