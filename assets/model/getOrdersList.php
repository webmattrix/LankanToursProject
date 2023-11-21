<?php

require "sqlConnection.php";

class getOrders
{

    public static function getOrderList($order_query, $custom_order_query)
    {

        $order_rs = Database::search($order_query);
        $ct_order_rs = Database::search($custom_order_query);

        $order_num = $order_rs->num_rows;
        $ct_order_num = $ct_order_rs->num_rows;

        $order_iteration = 0;
        $ct_order_iteration = 0;

        $loop = true;

        $order_previouse = null;
        $ct_order_previouse = null;

        $order_data = null;
        $ct_order_data = null;

        $order_start = null;
        $ct_order_start = null;

        $responseArray = [];

        $round_one = true;

        while ($loop) {


            // if ($order_iteration == $order_num && $ct_order_iteration == $ct_order_num) {
            //     $loop = false;
            //     break;
            // }

            if ($order_previouse == null) {
                if ($order_iteration < $order_num) {
                    $order_data = $order_rs->fetch_assoc();
                    $order_start = strtotime($order_data["start_date"]);
                    $order_iteration = $order_iteration + 1;
                } else {
                    $order_start = "9999-99-99";
                }
            } else {
            }

            if ($ct_order_previouse == null) {
                if ($ct_order_iteration < $ct_order_num) {
                    $ct_order_data = $ct_order_rs->fetch_assoc();
                    $ct_order_start = strtotime($ct_order_data["start_date"]);
                    $ct_order_iteration = $ct_order_iteration + 1;
                } else {
                    $ct_order_start = "9999-99-99";
                }
            } else {
            }

            if ($order_start > $ct_order_start) {
                $order_previouse = $order_data;
                $ct_order_previouse = null;
                $main_data = $ct_order_data;
                $tour_name = "Custom Tour";
                $main_data["tour_name"] = $tour_name;
            } else {
                $ct_order_previouse = $ct_order_data;
                $order_previouse = null;
                $main_data = $order_data;
                $tour_name = $main_data["tour_name"];
                $main_data["tour_name"] = $tour_name;
            }


            if ($order_iteration == $order_num && $ct_order_iteration == $ct_order_num) {
                if ($round_one == false) {
                    $loop = false;
                }
            } else {
                if ($round_one == true) {
                    $round_one = false;
                }
            }

            array_push($responseArray, $main_data);
        }
        return ($responseArray);
    }
}

$date = new DateTime();
$today = $date->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $today->format("Y-m-d");

$order_query = "SELECT *,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
INNER JOIN `tour` ON `tour`.`id`=`order`.`tour_id` 
INNER JOIN `guide` ON `guide`.`id`=`order`.`guide_id` 
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id` 
WHERE `order`.`start_date` <= '" . $today . "' AND `order`.`end_date` >= '" . $today . "' 
ORDER BY `start_date` ASC";

$custom_order_query = "SELECT *,`employee`.`name` AS `guide_name` FROM `custom_tour`
INNER JOIN `guide` ON `guide`.`id`=`custom_tour`.`guide_id`
INNER JOIN `employee` ON `employee`.`id`=`guide`.`employee_id`
WHERE `custom_tour`.`start_date` <= '" . $today . "' AND `custom_tour`.`end_date` >= '" . $today . "' ORDER BY `start_date` ASC";

$data = getOrders::getOrderList($order_query, $custom_order_query);

for ($x = 0; $x < sizeof($data); $x++) {
    echo ($data[$x]["tour_name"] . "\n");
}
