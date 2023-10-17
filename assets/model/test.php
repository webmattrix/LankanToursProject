<?php

require "sqlConnection.php";

$query = "SELECT * FROM `order` ";
$order_rs = Database::search($query);
echo ($order_rs);
