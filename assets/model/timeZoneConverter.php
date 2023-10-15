<?php

class timeConverter
{
    public static function convert($db_time, $clientZone)
    {
        $primary_time = new DateTime($db_time, new DateTimeZone("Asia/Colombo"));

        $clientTimeZone = new DateTimeZone($clientZone);

        $primary_time->setTimezone($clientTimeZone);

        $responseTime = $primary_time->format("Y-m-d H:i:s a");

        return ($responseTime);
    }
}
