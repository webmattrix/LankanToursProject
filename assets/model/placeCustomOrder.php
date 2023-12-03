<?php

if (!isset($_POST["tourist_name"]) && empty($_POST["tourist_name"])) {
    echo ("Please enter your name");
} else if (!isset($_POST["tourLevel"]) && empty($_POST["tourLevel"])) {
    echo ("Select a tour level");
} else if (!isset($_POST["places_list"]) && empty($_POST["places_list"])) {
    echo ("Select places you want to visit");
} else if (!isset($_POST["contact_method"]) && empty($_POST["contact_method"])) {
    echo ("Please select a contact method");
} else if (!isset($_POST["memberCount"]) && empty($_POST["memberCount"])) {
    echo ("Please enter member count");
} else if (!isset($_POST["message"]) && empty($_POST["message"])) {
    echo ("Please enter your request message");
} else {

    require "sqlConnection.php";

    $tourist_name = $_POST["tourist_name"];
    $tourLevel = $_POST["tourLevel"];
    $places_list = json_decode($_POST["places_list"]);
    $contact_method = $_POST["contact_method"];
    $memberCount = $_POST["memberCount"];
    $message = $_POST["message"];

    // Database::iud("INSERT INTO ")
    
}
