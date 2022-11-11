<?php
require_once "models/admin.php";

class AdminController
{
    private function checkAdmin(): void
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=Admin&action=loginAdmin');
        }
    }

    public function loginAdmin()
    {
        require_once 'views/admin/loginAdmin.php';
    }

    public function loginAuth() {
        if(!isset($_POST['admin']) || !isset($_POST['password'])) {
            header('Location: index.php?log=true&controller=Admin&action=loginAdmin?');
        }

        $admin = new Admin();
        $admin->setAdmin($_POST['admin']);
        $admin->setPassword($_POST['password']);
        $login = $admin->loginAuth();

        if($login) {
            $_SESSION['admin'] = $login;
            header('Location: index.php?controller=Admin&action=menuAdmin');
        } else {
            header('Location: index.php?log=false&controller=Admin&action=loginAdmin');
        }
    }

    public function menuAdmin() {
        $this->checkAdmin();
        require_once 'views/admin/menuAdmin.php';
    }

    public function closeAdmin() {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=Admin&action=loginAdmin');
    }

}