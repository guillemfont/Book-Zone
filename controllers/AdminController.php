<?php
require_once "models/admin.php";

class AdminController
{
    private function checkAdmin(): void
    {
        if (!isset($_SESSION['admin'])) {
            var_dump($_SESSION['admin']);
            print "<script>alert(\"Acceso incorrecto.\");window.location='index.php?controller=Admin&action=loginAdmin';</script>";
        }
    }

    public function loginAdmin()
    {
        require_once 'views/administrator/loginviewAdmin.php';
    }

    public function loginAuth() {
        if(!isset($_POST['admin']) || !isset($_POST['password'])) {
            header('location=index.php?log=true&controller=Admin&action=loginAdmin?');
        }

        $admin = new Admin();
        $admin->setAdmin($_POST['admin']);
        $admin->setPassword($_POST['password']);
        $login = $admin->loginAuth();

        if($login) {
            $_SESSION['admin'] = $login;
            // Cuando se loguea correctamente, se redirige a la página de inicio y no continua la ejecución del php
            header('Location: index.php?controller=Admin&action=menuAdmin');
        } else {
            header('Location: index.php?log=false&controller=Admin&action=loginAdmin');
        }
    }

    public function menuAdmin() {
        $this->checkAdmin();
        require_once 'views/administrator/menuAdmin.php';
    }

    public function closeAdmin() {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=Admin&action=loginAdmin');
    }

}