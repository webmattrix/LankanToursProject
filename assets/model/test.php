<?php

require "sqlConnection.php";

$order_rs = Database::search("SELECT * FROM `order` ORDER BY `start_date` ASC");
$ct_order_rs = Database::search("SELECT * FROM `custom_tour` ORDER BY `start_date` ASC");

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

while ($loop) {

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
    } else {
        $ct_order_previouse = $ct_order_data;
        $order_previouse = null;
        $main_data = $order_data;
    }


    if ($order_iteration == $order_num && $ct_order_iteration == $ct_order_num) {
        $loop = false;
    }

    echo (json_encode($main_data) . "<br>");
}
session_start();

$rs = Database::search("SELECT *,`employe_type`.`name` AS `employee_type`,`employee`.`name` AS `guide_name`,`employee`.`id` AS `guide_id`
FROM `employee`
INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
INNER JOIN `guide` ON `guide`.`employee_id`=`employee`.`id`
WHERE `employe_type`.`name`='guide' AND `employee`.`email`='vihangaheshan@gmail.com' AND `employee`.`password`='asd321asd'");

$_SESSION["lt_guide"] = $rs->fetch_assoc();
