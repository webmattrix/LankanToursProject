<?php

require "./sqlConnection.php";
require "./visitor.php";

$query = "SELECT * FROM user";
$user_rs = Database::search($query);

$data = [$user_rs->num_rows, Visiter::getVisiter('line2')];

echo (json_encode($data));
