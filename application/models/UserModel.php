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

    function checkEmail($email)
    {
        $mysqli = DatabaseHelper::connect();
        $query = "SELECT email FROM user WHERE email = '$email'";
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

    function createUser($email, $password)
    {
        $mysqli = DatabaseHelper::connect();
        $hashPass = CommonHelper::cryptPass($password);
        $query = "INSERT INTO user(email, password) VALUES ('$email', '$hashPass')";
        $mysqli->query($query);
    }

    function authorization($email, $password)
    {
        $mysqli = DatabaseHelper::connect();
        $query = "SELECT email, password FROM user WHERE email = '$email'";
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