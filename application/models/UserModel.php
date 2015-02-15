<?php
/**
 * User: Nova
 * Date: 01.02.2015
 */
class UserModel extends Model
{
    function __construct()
    {
        include_once 'application/utilities/DatabaseHelper.php';
        include_once 'application/utilities/CommonHelper.php';
    }

    function checkLogin($login)
    {
        $mysqli = DatabaseHelper::connect();
        $query = "SELECT login FROM user WHERE login = '$login'";
        if($res = $mysqli->query($query)) {
            if ($res->num_rows == 0) {
                $res->free();
                return true;
            } else {
                $res->free();
                return false;
            }
        } else {
            echo "Ошибка запроса.";
            return false;
        }
    }

    function createUser($login, $password)
    {
        $mysqli = DatabaseHelper::connect();
        $hashPass = CommonHelper::cryptPass($password);
        $query = "INSERT INTO user(login, password) VALUES ('$login', '$hashPass')";
        $mysqli->query($query);
    }

    function authorization($login, $password)
    {
        $mysqli = DatabaseHelper::connect();
        $query = "SELECT login, password FROM user WHERE login = '$login'";
        if ($result = $mysqli->query($query)) {
            $row = $result->fetch_assoc();
            if ($row['password'] == crypt($password, $row['password'])) {
                $result->free();
                return true;
            } else {
                $result->free();
                return false;
            }
        } else {
            return false;
        }
    }
}