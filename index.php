<?php
$page ="index";
if(isset($_GET["page"])){
    $page = $_GET["page"];
}
switch($page){
    case 'login':
        require "controller/loginController.php";
        LoginController::index();
        break;
case 'loginauth':
    require "controller/loginController.php";
    LoginController::login();
    break;
case 'logout': break;
case 'admin':  break;
default: echo "<a href='".urlsite."?page=login'>Login</a>"; break;
}