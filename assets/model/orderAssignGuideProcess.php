<?php

require "sqlConnection.php";

// Assign for Tour
$tour_id = $_POST["tour_id"];

$tour_name = $_POST["tpName"];
$tour_cost = $_POST["tpCost"];
$pay_status = $_POST["tpOverall"];
$tour_sDate = $_POST["tpStartD"];
$tour_enDate = $_POST["tpEndD"];
$members = $_POST["tpMemberC"];
$tour_guide = $_POST["guideSelect"];
$forMSg_guide = $_POST["guideMsg"];
$cus_message = $_POST["cusMsg"];

$asg_check_rs = Database::search("SELECT * FROM `order` WHERE `tour_id`='".$tour_id."'");
$asg_check_data = $asg_check_rs->fetch_assoc();

if($asg_check_data["tour_id"] == $tour_id){
    
    $assign_to_rs = Database::iud("UPDATE `order` SET ``");

}else{
    echo("Error");
}

// Assign for Tour