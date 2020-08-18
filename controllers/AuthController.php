<?php

namespace task\Controllers;

use task\Components\PassVerify;
use task\Models\Auth;
use task\Components\Redirect;

class AuthController
{
    private $auth;
    private $passVerify;
    private $redirect;

    public function __construct(Auth $auth, PassVerify $passVerify, Redirect $redirect)
    {
        $this->auth = $auth;
        $this->passVerify = $passVerify;
        $this->redirect = $redirect;
    }

    public function auth()
    {
        $_SESSION['auth'] = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $pass = $_POST['password'];
            $verifyPass = $this->passVerify->verify($name, $pass);
            if ($verifyPass === true) {
                $this->auth->auth($name);
            } else {
                $_SESSION['auth'] = 'пароль не верный';
                return require_once (ROOT.'/view/auth/auth.php');
            }
            header("Location: ".$this->redirect->main());
        }
        return require_once (ROOT.'/view/auth/auth.php');
    }

    public function logout()
    {
        if (isset($_SESSION['name'])){
            session_destroy();
            header("Location: ".$this->redirect->referer());
        }
    }
}