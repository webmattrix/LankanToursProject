<?php

require "./sqlConnection.php";

$tid = $_POST["ord_id"];
$tName = $_POST["t_name"];
$timeline = $_POST["t_durat"];
$sDate = $_POST["t_stDate"];
$eDate = $_POST["t_enDate"];
$ordCost = $_POST["t_cost"];
$svAmount = $_POST["t_svAmount"];

if($tName == "Custom Tour"){
   $ct_ord_rs = Database::iud("UPDATE `custom_order` SET ``"); 
}


