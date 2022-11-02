<?php
session_start();
require "model/loginModel.php";
class LoginController{
    public function index(){
        if(isset($_SESSION["login"]))
            header('location:' .urlsite);
        else{
            require "view/login.php";
        }
        public function login(){
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            $login = new Login();
            if($login->login($usuario, $password)){
                $_SESSION["login"] = true;
                header('location:' .urlsite);
            }
            else{
                header('location:' .urlsite."?msg=No coinciden los datos");
            }
        }
    }
}
    