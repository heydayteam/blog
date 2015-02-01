<?php
/**
 * User: Nova
 * Date: 01.02.2015
 */
class DatabaseHelper
{
    static function connect()
    {
        $host = 'sql3.freesqldatabase.com';
        $database = 'sql365418';
        $user = 'sql365418';
        $password = 'lP7*bF5*';
        $mysqli = new mysqli($host, $user, $password, $database);
        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit();
        }
        return $mysqli;
    }
}