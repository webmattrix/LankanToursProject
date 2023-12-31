
<?php

session_start();

if (!isset($_SESSION["lt_tourist"])) {

    echo ("1");
    
} else {

    require "./sqlConnection.php";

    $tour_id = $_GET["tid"];

    $tableView_rs = Database::search("SELECT * FROM `tour` WHERE `id`='" . $tour_id . "'");
    $tableView_Data = $tableView_rs->fetch_assoc();

    $tour_name = $tableView_Data["name"];

    $responseObj = new stdClass();

    $responseObj->t_name = $tour_name;

    echo (json_encode($responseObj));
}
