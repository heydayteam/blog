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
                return true;
            } else {
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
}