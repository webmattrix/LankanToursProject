<?php

require "./sqlConnection.php";

$query = "SELECT * FROM `order`";
$order_rs = Database::search($query);

$income = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$saving_amount = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$outcome = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

for ($order_iteration = 0; $order_iteration < $order_rs->num_rows; $order_iteration++) {
    $order_data = $order_rs->fetch_assoc();
    $date_time = $order_data["date_time"];
    $order_month = date("m", strtotime($date_time));
    $income[$order_month - 1] = $income[$order_month - 1] + $order_data['cost'];
    $saving_amount[$order_month - 1] = $saving_amount[$order_month - 1] + $order_data['saving_amount'];
}

for ($outcome_iteration = 0; $outcome_iteration < sizeof($outcome); $outcome_iteration++) {
    $result = $income[$outcome_iteration] - $saving_amount[$outcome_iteration];
    $outcome[$outcome_iteration] = $result;
}

$responseObj = new stdClass();
$responseObj->income = $income;
$responseObj->outcome = $outcome;

echo (json_encode($responseObj));
