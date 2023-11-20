<?php

require "../model/sqlConnection.php";
$id = $_GET["id"];
$rs = Database::search("SELECT * FROM `employee` WHERE `id`='" . $id . "' ");
$admin_data = $rs->fetch_assoc();

 if ($admin_data["status"] == 0) {
    Database::iud("UPDATE `employee` SET `status` ='1' WHERE `id` = '".$id."'");
   
    } else {
        Database::iud("UPDATE `employee` SET `status` ='0' WHERE `id` = '".$id."'");
    }
   echo("success");

?>