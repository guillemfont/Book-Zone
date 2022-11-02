<?php
session_start();
require "model/loginModel.php";
$page = "index";
$base_url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER["REQUEST_URI"] . '?') . '/';

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
switch ($page) {
    case 'login':
        require "controller/loginController.php";
        LoginController::index();
        break;
    case 'loginauth':
        require "controller/loginController.php";
        LoginController::login();
        break;
    case 'logout':
        break;
    case 'admin':
        echo "logueado";
        break;
    default:
        // TODO Requiere que se haga un controlador para la página principal
        require "views/defaultView.php";
        break;
}