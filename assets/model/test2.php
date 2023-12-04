<?php

$today = new DateTime();
$today->setTimezone(new DateTimeZone("Asia/Colombo"));
$today = $today->format("Y-m-d H:i:s");

echo ($today);
