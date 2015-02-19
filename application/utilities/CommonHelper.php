<?php
/**
 * User: Nova
 * Date: 01.02.2015
 */
class CommonHelper
{
    static function cryptPass($input)
    {
        $salt = "";
        $saltChars = array_merge(range('A','Z'), range('a', 'z'), range(0, 9));
        for ($i = 0; $i < 22; $i++) {
            $salt .= $saltChars[array_rand($saltChars)];
        }
        return crypt($input, '$2y$10$'. $salt);
    }

    static function setAuthorizationSession($login, $password)
    {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
    }
}
