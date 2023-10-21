<?php

require "timeZoneConverter.php";

session_start();

$date = "2023-02-02 04:04:04";

$responseTime = timeConverter::convert($date);
echo(date("Y-m-d", strtotime($responseTime)));
  