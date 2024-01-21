<?php

session_start();
require "./sqlConnection.php";

if (isset($_SESSION["lt_tourist"])) {
    $tour_id = $_GET["tour_id"];
    $user = $_SESSION["lt_tourist"];
    $watchlist_table = Database::search("SELECT * FROM `watchlist` WHERE `user_id`='" . $user["id"] . "' AND `tour_id`='" . $tour_id . "'");
    $watchlist_table_rows = $watchlist_table->num_rows;
    if ($watchlist_table_rows == 1) {
        $watchlist_table_data = $watchlist_table->fetch_assoc();
        Database::iud("DELETE FROM `watchlist` WHERE `user_id`='" . $user["id"] . "' AND `tour_id`='" . $tour_id . "'");
        echo ("3");
    } else {
        echo ("2");
    }
} else {
    echo ("1");
}


// 1 => login failed
// 2 => Item not found
// 3 => Success