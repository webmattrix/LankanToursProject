<?php

require "assets/model/getOrdersList.php";

$today = '2023-11-07';

$order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
ORDER BY `start_date` ASC";

$ct_order_query = "SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
ORDER BY `start_date` ASC";

$ongoingTourList = getOrders::getOrderList($order_query, $ct_order_query);

for ($x = 0; $x < sizeof($ongoingTourList); $x++) {
    echo ($ongoingTourList[$x]["tour_name"] . "  " . $ongoingTourList[$x]["start_date"]);
    echo ("<br>");
    echo ("<br>");
}
