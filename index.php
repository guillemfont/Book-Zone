<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Zone</title>
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style/style.css">
    <script src="assets/script/main.js"></script>
</head>
<body>
    


<?php
session_start();

require_once "autoload.php";

if (isset($_GET['controller'])) {
    $nameController = $_GET['controller'] . "Controller";

} else {

    $nameController = "AdminController";
}
if (class_exists($nameController)) {
    $controller = new $nameController();
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    } else {
        require_once "views/general/title.html";
        require_once "views/general/menu.php";
    }
} else {

    echo "No existe el controlador";
}
require_once "views/general/footer.html";
?>
</body>
</html>


