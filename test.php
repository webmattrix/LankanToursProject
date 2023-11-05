<?php

require "assets/model/getOrdersList.php";

$date = new DateTime();
$today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $today->format("Y-m-d");

$order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
WHERE `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
ORDER BY `start_date` ASC";
$ct_order_query = "SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
WHERE `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "' ORDER BY `start_date` ASC";

$ongoingTourList = getOrders::getOrderList($order_query, $ct_order_query);

for ($ongoing_iteration = 0; $ongoing_iteration < sizeof($ongoingTourList); $ongoing_iteration++) {
    $main_data = $ongoingTourList[$ongoing_iteration]; 
?>
    <!-- HTML Content -->
<?php

}

?>