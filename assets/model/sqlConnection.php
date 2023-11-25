<?php

class Database
{

    public static $connection;

    public static function setUpConnection()
    {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("193.203.166.18", "u527896535_wm_p01_lt_db", "Wm2023@#", "u527896535_lankantravel", "3306");
        }
    }

    public static function iud($q)
    {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setUpConnection();
        $resultSet = Database::$connection->query($q);
        return $resultSet;
        
    }
}

?>