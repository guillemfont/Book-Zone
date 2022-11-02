<?php

class LoginController
{
    public static function index()
    {
        if (isset($_SESSION["login"]))
            header('location:');
        else
            require "views/loginView.php";
    }

    public static function login()
    {
        $login = new LoginModel();
        print("Start");
        $admin = $_POST["admin"];
        var_dump($_POST);
        $password = $_POST["password"];
        print("Check1");
        if ($login->login($admin, $password)) {
            $_SESSION["login"] = true;
            var_dump($_SESSION);
        } else {
            echo "no funciona";
            var_dump($_SESSION);
        }
        print("End");
    }
}
