<?php

require "./sqlConnection.php";

 $input1 = $_GET["inpS"];

$table_details_rs = Database::search("SELECT *,`tour`.`name` AS `t_name`,`employee`.`name` AS `guide_name`,`order_status`.`name` AS `status` FROM `order` 
INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
INNER JOIN `guide` ON `order`.`guide_id`=`guide`.`id`
INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id`
INNER JOIN `employee` ON `guide`.`employee_id`=`employee`.`id`
WHERE ``"); 
