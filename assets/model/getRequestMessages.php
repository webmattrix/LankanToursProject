<?php

require "sqlConnection.php";

$message_table = Database::search("SELECT * FROM `request_message` ORDER BY `date_time` DESC");
