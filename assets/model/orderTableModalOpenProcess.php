<?php

require "./sqlConnection.php";
require "./timeZoneConverter.php";

$tid = $_GET["tid"];
$tab_name = $_GET["tabnm"];

$tab_rs;

if ($tab_name == "Custom_T") {
    $tab_rs = Database::search("SELECT *,`user`.`name` AS `tourist_name`,`employee`.`name` AS `guide_name` FROM `custom_tour` 
    INNER JOIN `user` ON `custom_tour`.`user_id`=`user`.`id`
    INNER JOIN `guide` ON `custom_tour`.`guide_id`=`guide`.`id`
    INNER JOIN `employee` ON `guide`.`employee_id`=`employee`.`id` 
    WHERE `custom_tour`.`id`='" . $tid . "'");
} else {
    $tab_rs = Database::search("SELECT *,`user`.`name` AS `tourist_name`,`tour`.`name` AS `tour_name`,`employee`.`name` AS `guide_name` FROM `order` 
    INNER JOIN `user` ON `order`.`user_id`=`user`.`id` 
    INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` 
    INNER JOIN `guide` ON `order`.`guide_id`=`guide`.`id`
    INNER JOIN `employee` ON `guide`.`employee_id`=`employee`.`id`
    WHERE `order`.`id`='" . $tid . "'");
}

$tab_data = $tab_rs->fetch_assoc();

$tab_Ov_name;

if($tab_name == "Custom_T"){
   $tab_Ov_name = "Custom Tour";
}else{
    $tab_Ov_name = $tab_data['tour_name'];
}

$tourist_name = $tab_data["tourist_name"];
$start_date = date("Y-m-d",strtotime($tab_data["start_date"]));
$end_date = date("Y-m-d",strtotime($tab_data["end_date"]));
$tour_timeline = date_diff(new DateTime($start_date),new DateTime($end_date))->d;
$guide_name = $tab_data["guide_name"];
$members = $tab_data["members"];
$tourist_message = $tab_data["message"];


$responseObj = new stdClass();

$responseObj->tcli_name = $tourist_name;
$responseObj->t_name = $tab_Ov_name;
$responseObj->t_durat = $tour_timeline;
$responseObj->t_stDate = $start_date;
$responseObj->t_enDate = $end_date;
$responseObj->t_guideN = $guide_name;
$responseObj->t_members = $members;
$responseObj->t_idNo = $tid;
$responseObj->tcli_msg = $tourist_message;

echo(json_encode($responseObj));





