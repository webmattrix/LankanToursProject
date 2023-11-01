<?php

class timeConverter
{
    public static function convert($db_time)
    {

        $primary_time = new DateTime($db_time, new DateTimeZone("Asia/Colombo"));

        $clientTimeZone = new DateTimeZone($_SESSION["timeZone"]);

        $primary_time->setTimezone($clientTimeZone);

        $explodeTime = explode(" ", $db_time);

        if (sizeof($explodeTime) == 2) {
            $responseTime = $primary_time->format("Y-m-d H:i:s a");
            return ($responseTime);
        } else {
            $responseTime = $primary_time->format("Y-m-d");
            return ($responseTime);
        }

    }
}
