<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Book Zone</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="assets/script/main.js"></script>
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>
</head>
<body onload="responsiveMenu()">

<?php
session_start();

require_once "autoload.php";
require_once "views/general/header.php";

if (isset($_GET['controller'])){
    $nameController = $_GET['controller']."Controller";

}
else{

    $nameController = "adminController";
}
if (class_exists($nameController)){
    $controller = new $nameController();
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }
    else {
        require_once "views/general/title.php";
        require_once "views/general/menu.php";
    }
}else{
    
    echo "No existe el controlador";
}
require_once "views/general/footer.php";
?>
</body>
</html>