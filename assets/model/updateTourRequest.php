<?php

require "./sqlConnection.php";

$start_date = $_POST["start_date"];
$guide = $_POST["guide"];
$end_date = $_POST["end_date"];
$cost = $_POST["cost"];
$savingAmount = $_POST["savingAmount"];
$guide_message = $_POST["guide_message"];
$table = $_POST["table"];
$id = $_POST["id"];

if (!isset($guide) || $guide == 0) {
    echo ("Select a valid tour guide");
} else if (!isset($start_date) || $start_date == '0000-00-00' || empty($start_date)) {
    echo ("Select a valid start date");
} else if (!isset($end_date) || $end_date == '0000-00-00' || empty($end_date)) {
    echo ("Select a valid end date");
} else if (!isset($cost) || $cost == 0 || empty($cost)) {
    echo ("Enter the tour price");
} else {
    $guide_table = Database::search("SELECT * FROM `guide` WHERE `employee_id`='" . $guide . "'");
    $guide_data = $guide_table->fetch_assoc();

    if ($table == 'custom_order') {
        if (isset($savingAmount) || $savingAmount != 0 || !empty($savingAmount)) {
            $query = "UPDATE `custom_tour` SET `start_date`='" . $start_date . "',`guide_id`='" . $guide_data["id"] . "',`end_date`='" . $end_date . "',`cost`='" . $cost . "',`guide_message`='" . $guide_message . "',`order_status_id`='1',saving_amount='" . $savingAmount . "' WHERE `id`='" . $id . "'";
        } else {
            $query = "UPDATE `custom_tour` SET `start_date`='" . $start_date . "',`guide_id`='" . $guide_data["id"] . "',`end_date`='" . $end_date . "',`cost`='" . $cost . "',`guide_message`='" . $guide_message . "',`order_status_id`='1' WHERE `id`='" . $id . "'";
        }
    } else {
        if (isset($savingAmount) || $savingAmount != 0 || !empty($savingAmount)) {
            $query = "UPDATE `order` SET `start_date`='" . $start_date . "',`guide_id`='" . $guide_data["id"] . "',`end_date`='" . $end_date . "',`cost`='" . $cost . "',`guide_message`='" . $guide_message . "',`order_status_id`='1',`saving_amount`='" . $savingAmount . "' WHERE `id`='" . $id . "'";
        } else {
            $query = "UPDATE `order` SET `start_date`='" . $start_date . "',`guide_id`='" . $guide_data["id"] . "',`end_date`='" . $end_date . "',`cost`='" . $cost . "',`guide_message`='" . $guide_message . "',`order_status_id`='1' WHERE `id`='" . $id . "'";
        }
    }

    Database::iud($query);

    echo ("1");
}
