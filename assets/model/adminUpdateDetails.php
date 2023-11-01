<?php
require "sqlConnection.php";
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
// $NIC = $_POST["NIC"];
$address = $_POST["address"];
$id = $_POST["id"];

Database::iud("UPDATE `employee` SET `name` ='".$name."', `email` ='".$email."',`mobile` ='".$mobile."' WHERE `id` = '".$id."' ");

Database::iud("UPDATE `admin` SET `address` ='".$address."' WHERE `employee_id` = '".$id."'");
echo("success");

?>
