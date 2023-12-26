<?php

session_start();

if (isset($_SESSION["lt_tourist"])) {

    if (!isset($_POST["tourLevel"]) || empty($_POST["tourLevel"])) {
        echo ("Select a tour level");
    } else if (!isset($_POST["places_list"]) || empty($_POST["places_list"])) {
        echo ("Select places you want to visit");
    } else if (!isset($_POST["contact_method"]) || empty($_POST["contact_method"])) {
        echo ("Please select a contact method");
    } else if (!isset($_POST["memberCount"]) || empty($_POST["memberCount"])) {
        echo ("Please enter member count");
    } else if (!isset($_POST["message"]) || empty($_POST["message"])) {
        echo ("Please enter your request message");
    } else {

        require "sqlConnection.php";

        // $tourist_name = $_POST["tourist_name"];
        $tourLevel = $_POST["tourLevel"];
        $places_list = json_decode($_POST["places_list"]);
        $contact_method = $_POST["contact_method"];
        $memberCount = $_POST["memberCount"];
        $message = $_POST["message"];

        $date_time = new DateTime();
        $date_time->setTimezone(new DateTimeZone("Asia/Colombo"));
        $date_time = $date_time->format("Y-m-d H:i:s");

        $query = "INSERT INTO `custom_tour` (`user_id`,`order_status_id`,`star`,`members`,`date_time`,`request_message`,`contact_method_id`) VALUES ('" . $_SESSION["lt_tourist"]["id"] . "','2','" . $tourLevel . "','" . $memberCount . "','" . $date_time . "','" . $message . "','" . $contact_method . "');";

        // Database::iud($query);

        // $insert_id = Database::$connection->insert_id;

        // for ($place_iteration = 0; $place_iteration < sizeof($places_list); $place_iteration++) {
        //     $query = "INSERT INTO `custom_tour_has_place` (`custom_tour_id`,`place_id`) VALUES ('" . $insert_id . "','" . $places_list[$place_iteration] . "')";
        //     Database::iud($query);
        // }

        echo ("2");
    }
} else {
    echo ("1");
}

// 1=>Login Failed
// 2=>Succesfuly Completed