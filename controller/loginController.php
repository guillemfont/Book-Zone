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
        if (isset($_POST["admin"]) && isset($_POST["password"])) {
            $admin = $_POST["admin"];
            $password = $_POST["password"];
            if ($login->login($admin, $password)) {

                $_SESSION["login"] = true;
                var_dump($_SESSION);
            }
        } else {
            echo "Datos incorrectos";
        }
    }
}
