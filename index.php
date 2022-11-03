<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <link rel="stylesheet" href="./css/style.css">
    <title>Main Page</title>
</head>
<body>
<?php 
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
        require_once "views/general/header.html";
        require_once "views/general/menu.php";
    }
}else{

    echo "No existe el controlador";
}
require_once "views/general/footer.html";
?>
</body>
</html>


