<?php
require "./sqlConnection.php";

$tour_id = $_GET["tp"];

$tp_detail = Database::search("SELECT *, `tour`.`name` AS `tour_name` FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` INNER JOIN `order_status` ON `order`.`order_status_id`=`order_status`.`id` WHERE `tour_id`='" . $tour_id . "'");
$tp_data = $tp_detail->fetch_assoc();

$tour_name = $tp_data["tour_name"];
$cost = $tp_data["cost"];
$paymentStatus = $tp_data["saving_amount"];
$start_Date = $tp_data["start_date"]; 
$end_Date = $tp_data["end_date"]; 
$members = $tp_data["members"];
$customer_Msg = $tp_data["request_message"];

$responseObj = new stdClass();

$responseObj->tp_name = $tour_name;
$responseObj->tp_cost = $cost;
$responseObj->tp_payStatus = $paymentStatus;
$responseObj->tp_stDate = $start_Date;
$responseObj->tp_enDate = $end_Date;
$responseObj->tp_members = $members;
$responseObj->tp_cusMsg = $customer_Msg;
$responseObj->tp_id = $tour_id;

echo(json_encode($responseObj));


// echo ($tour_name);
// echo ($cost);

// if ($paymentStatus == 0) {
//     echo ("Not Complete");
// } else {
//     echo ("Complete");
// }

// echo($start_Date);
// echo($end_Date);
// echo($members);