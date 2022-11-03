<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Onetti project</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
session_start();
require_once "autoload.php";

if (isset($_GET['controller'])){
    $nameController = $_GET['controller']."Controller";

}
else{

    $nameController = "AdminController";
}
if (class_exists($nameController)){
    $controller = new $nameController();
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }
    else {
        require_once "views/general/titulo.html";
        require_once "views/general/menu.php";
    }
}else{

    echo "No existe el controlador";
}
require_once "views/general/footer.html";
?>
</body>
</html>


