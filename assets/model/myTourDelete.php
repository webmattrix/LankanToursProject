<?php
require "../model/sqlConnection.php";

$orderID = $_POST["order_Id"];
$orderName = $_POST["Order_name"];

if ($orderName == "Custom Tour") {

    $rs01 = Database::search("SELECT * FROM `custom_tour` WHERE `id` = '" . $orderID . "'");
    $message_num = $rs01->num_rows;
    if ($message_num == 1) {
        Database::search("DELETE  FROM `custom_order_response` WHERE `custom_tour_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `custom_tour_feedback` WHERE `custom_tour_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `custom_tour_has_event` WHERE `custom_tour_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `custom_tour_has_event` WHERE `custom_tour_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `custom_tour_has_place` WHERE `custom_tour_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `custom_tour` WHERE `id` = '" . $orderID . "'");
        echo("Success");
    } else {
        echo("Error");
    }
} else {
    $rs01 = Database::search("SELECT * FROM `order` WHERE `id` = '" . $orderID . "'");
    $message_num = $rs01->num_rows;
    if ($message_num == 1) {
        Database::search("DELETE  FROM `order_response` WHERE `order_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `feedback` WHERE `order_id` = '" . $orderID . "'");
        Database::search("DELETE  FROM `order` WHERE `id` = '" . $orderID . "'");
        echo("Success");
    } else {
        echo("Error");

    }
}

?>