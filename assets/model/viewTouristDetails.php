<?php
require "sqlConnection.php";

$userId = $_GET['id'];

$result = Database::search("SELECT * FROM `user` WHERE `id`='" . $userId . "'");
$user = $result->fetch_assoc();

$responseObj = new stdClass();
$responseObj->name = $user["f_name"]." ".$user["l_name"];
$responseObj->mobile = $user["mobile"];
$responseObj->email = $user["email"];

$countryrs = Database::search("SELECT * FROM `country` WHERE `id`='" . $user['country_id'] . "'");
if ($countryrs->num_rows == 1) {
    $country = $countryrs->fetch_assoc();
}

$responseObj->country = $country['name'];

$genderrs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $user['gender_id'] . "'");
if ($genderrs->num_rows == 1) {
    $gender = $genderrs->fetch_assoc();
}

$responseObj->gender = $gender["name"];

$responseObj->dob = $user['dob'];
$responseObj->user_id = $user['id'];
$responseObj->created_at = $user['reg_date']; 



echo (json_encode($responseObj));
