<?php

session_start();
require "sqlConnection.php";

if (isset($_GET["id"])) {
    if (isset($_SESSION["lt_tourist"])) {

        $tour_id = $_GET["id"];
        $user_data = $_SESSION["lt_tourist"];

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE tour_id='" . $tour_id . "' AND user_id='" . $user_data["id"] . "'");
        if ($watchlist_rs->num_rows > 0) {
            echo ("3");
        } else {
            Database::iud("INSERT INTO `watchlist` (`user_id`,`tour_id`) VALUES('" . $user_data["id"] . "','" . $tour_id . "')");
            echo ("4");
        }
    } else {
        echo ("1");
    }
} else {
    echo ("2");
}


// 1 => Login Error
// 2 => Invalid Access! Try again later
// 3 => Tour is already added to the watchlist
// 4 => Success