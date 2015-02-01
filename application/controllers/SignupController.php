<?php
/**
 * User: Nova
 * Date: 01.02.2015
 */
class SignupController extends Controller
{
    public $user;
    function __construct()
    {
        include_once 'application/models/UserModel.php';
        $this->user = new UserModel();
        $this->view = new View();
    }

    function show()
    {
        if (!$_POST['submit']) {
            $this->view->generate('SignupView.php', 'template.php');
        } else {
            $login = $_POST['login'];
            $password = $_POST['password'];
            if($this->user->checkLogin($login)) {
                $this->user->createUser($login, $password);
            }
        }
    }
}