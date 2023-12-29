<?php

require "./sqlConnection.php";

$tid = $_POST["ord_id"];
$tName = $_POST["t_name"];
$timeline = $_POST["t_durat"];
$sDate = $_POST["t_stDate"];
$eDate = $_POST["t_enDate"];
$guideDet = $_POST["t_guideId"];
$ordCost = $_POST["t_cost"];
$svAmount = $_POST["t_svAmount"];
$toGuideMsg = $_POST["t_guideMsg"];

// if($tName == "Custom Tour"){
//    $ct_orderUpd_rs = Database::iud("UPDATE `custom_tour` SET ");
// }

echo($guideDet);


