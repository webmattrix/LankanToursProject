<?php

session_start();

require "sqlConnection.php";
require "timeZoneConverter.php";

$message_table = Database::search("SELECT * FROM `request_message` WHERE id='" . $_GET["id"] . "'");
$message_table_data = $message_table->fetch_assoc();

$user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $message_table_data["email"] . "'");
$user_table_rows = $user_table->num_rows;

if ($user_table_rows == 1) {
    $user_table_data = $user_table->fetch_assoc();
}

?>

<div class="d-flex gap-2">
    <span>Name:</span>
    <span><?php
            if ($user_table_rows == 1) {
                echo ($user_table_data["f_name"] . " " . $user_table_data["l_name"]);
            } else {
                echo ($message_table_data["email"]);
            }
            ?></span>
</div>
<div class="d-flex gap-2">
    <span>Date:</span>
    <span><?php
            $date_time = timeConverter::convert($message_table_data["date_time"]);
            echo (date("d M, Y", strtotime($date_time)));
            ?></span>
</div>
<div class="d-flex gap-2 flex-column">
    <span>Message:</span>
    <textarea style="max-height: 250px; overflow-y: auto;" class="p-1 rounded" name="" id="" cols="30" rows="10"><?php echo ($message_table_data["message"]); ?></textarea>
</div>
<div class="d-flex gap-2 mt-1">
    <select class="border-1 border-secondary rounded" id="req_and_com_status">
        <option value="0">Select</option>
        <option value="1">Responded</option>
        <option value="2">Not Responded</option>
    </select>
    <button class="btn btn-secondary bg-opacity-75" onclick="updateRequestMessage('<?php echo($_GET['id']) ?>');">Update</button>
</div>