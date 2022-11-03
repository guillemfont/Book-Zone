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
            print "<script>alert(\"Acceso incorrecto.\");window.location='index.php?controller=Admin&action=loginAdmin';</script>";
        }

        $admin = new Admin();
        $admin->setAdmin($_POST['admin']);
        $admin->setPassword($_POST['password']);
        $login = $admin->loginAuth();

        if($login) {
            $_SESSION['admin'] = $login;
            // Cuando se loguea correctamente, se redirige a la página de inicio y no continua la ejecución del php
            print "<script>alert(\"Bienvenido.\");window.location='index.php?controller=Admin&action=menuAdmin';</script>";
        } else {
            print "<script>alert(\"Acceso incorrecto.\");window.location='index.php?controller=Admin&action=loginAdmin';</script>";
        }
    }

    public function menuAdmin() {
        $this->checkAdmin();
        require_once 'views/administrator/menuAdmin.php';
    }

    public function closeAdmin() {
        unset($_SESSION['admin']);
        print "<script>alert(\"Sesion cerrada.\");window.location='index.php?controller=Admin&action=loginAdmin';</script>";
    }

}