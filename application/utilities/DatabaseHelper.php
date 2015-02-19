<?php
/**
 * User: Nova
 * Date: 01.02.2015
 */
class DatabaseHelper
{
    static function connect()
    {
        $host = 'db4free.net';
        $database = 'heydayteamblog';
        $user = 'heydayteam';
        $password = 'bm7JmHxK';
        $mysqli = new mysqli($host, $user, $password, $database);
        if ($mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit();
        }
        return $mysqli;
    }
}