<?php
/**
 * User: Nova
 * Date: 03.02.2015
 */

class SigninController extends Controller
{
    public $usrer;

    function __construct()
    {
        include_once 'application/models/UserModel.php';
        $this->user = new UserModel();
        $this->view = new View();
    }

    function show()
    {
        if($_POST['submit']) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->user->authorization($email, $password)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            $this->view->generate('SigninView.php', 'template.php');
        }
    }
}