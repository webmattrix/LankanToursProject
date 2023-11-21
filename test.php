<?php

require "assets/model/getOrdersList.php";

$today = "2023-11-21";

$order_query = "SELECT *,`tour`.`name` AS `tour_name`,`order_status`.`name` AS `Orderstatus`,`order`.`id` AS `Orderid` FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `order_status` ON `order_status`.`id`=`order`.`order_status_id` 
WHERE `order`.`user_id` = '1' AND `order`.`start_date` <= '2023-11-21' AND `order`.`end_date` >= '2023-11-21'
ORDER BY `start_date` ASC";

$ct_order_query = "SELECT *,`order_status`.`name` AS `Orderstatus`,`custom_tour`.`id` AS `Orderid` FROM `custom_tour` 
INNER JOIN `order_status` ON `order_status`.`id`=`custom_tour`.`order_status_id` 
WHERE `custom_tour`.`user_id` = '1' AND `custom_tour`.`start_date` <= '2023-11-21' AND `custom_tour`.`end_date` >= '2023-11-21' 
ORDER BY `start_date` ASC";

$ongoingTourList = getOrders::getOrderList($order_query, $ct_order_query);
echo (sizeof($ongoingTourList));
for ($x = 0; $x < sizeof($ongoingTourList); $x++) {
    echo (json_encode($ongoingTourList[$x]) . "\n");
}
