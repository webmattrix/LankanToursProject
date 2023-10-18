<?php

class timeConverter
{
    public static function convert($db_time)
    {
        $primary_time = new DateTime($db_time, new DateTimeZone("Asia/Colombo"));

        $clientTimeZone = new DateTimeZone($_SESSION["timeZone"]);

        $primary_time->setTimezone($clientTimeZone);

        $responseTime = $primary_time->format("Y-m-d H:i:s a");

        return ($responseTime);
    }
}
