<?php

session_start();
require "./sqlConnection.php";


$date = new DateTime();
$today = $date->setTimezone(new DateTimeZone($_SESSION["timeZone"]));
$today = $today->format("Y-m-d");

if (!isset($_GET["year"])) {
    $year = date("Y", strtotime($today));
} else {
    $year = $_GET["year"];
}

$income = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$saving_amount = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
$outcome = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

$query = "SELECT * FROM `order` WHERE `end_date`<'" . $today . "' AND `date_time` LIKE'" . $year . "%'";
$order_rs = Database::search($query);


for ($order_iteration = 0; $order_iteration < $order_rs->num_rows; $order_iteration++) {
    $order_data = $order_rs->fetch_assoc();
    $date_time = $order_data["end_date"];
    $order_month = date("m", strtotime($date_time));
    $income[$order_month - 1] = $income[$order_month - 1] + $order_data['cost'];
    $saving_amount[$order_month - 1] = $saving_amount[$order_month - 1] + $order_data['saving_amount'];
}

for ($outcome_iteration = 0; $outcome_iteration < sizeof($outcome); $outcome_iteration++) {
    $result = $income[$outcome_iteration] - $saving_amount[$outcome_iteration];
    $outcome[$outcome_iteration] = $result;
}

$query = "SELECT * FROM `custom_tour` WHERE `end_date`<'" . $today . "' AND `date_time` LIKE'" . $year . "%'";
$order_rs = Database::search($query);


for ($order_iteration = 0; $order_iteration < $order_rs->num_rows; $order_iteration++) {
    $order_data = $order_rs->fetch_assoc();
    $date_time = $order_data["end_date"];
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
$responseObj->profite = $saving_amount;

echo (json_encode($responseObj));
