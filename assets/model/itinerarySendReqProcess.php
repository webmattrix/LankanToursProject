<?php

session_start();

$user_data = $_SESSION["lt_tourist"];

$user_id = $user_data["id"];

require "./sqlConnection.php";

$tid = $_POST["t_id"];
$members = $_POST["members"];
$st_Level = $_POST["stLevel"];
$cont_Method = $_POST["conMeth"];
$msg_Ov = $_POST["msgView"];

$date = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$date->setTimezone($tz);
$formatDate = $date->format("Y-m-d H:i:s");



if (empty($members)) {
    echo ("Please enter your member count.!!");
} else if ($st_Level == "0") {
    echo ("Please select star level of tour.!!");
} else if ($cont_Method == "0") {
    echo ("Please select contact method.!!");
} else if (empty($msg_Ov)) {
    echo ("Type your idea or anythings for prepare your order.!");
} else {

    if(true){
      $requestOrder = Database::iud("INSERT INTO `order`(`user_id`,`tour_id`,`order_status_id`,`date_time`,`members`,`star`,`request_message`,`contact_method_id`) 
                                     VALUES('".$user_id."','".$tid."','2','".$formatDate."','".$members."','".$st_Level."','".$msg_Ov."','".$cont_Method."')");
    echo("Success");

    }else{

      echo("Something went wrong..!");

    }
}
