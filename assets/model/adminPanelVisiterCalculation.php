<?php

require "./sqlConnection.php";

$query = "SELECT * FROM user";
$user_rs = Database::search($query);
