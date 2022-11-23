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
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->viewTableProduct();
    }

    public function addProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->addTableProduct();
    }

    public function postAddProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postFormAddProduct();
    }

    public function editProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->editTableProduct();
    }

    public function searchProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postsearchProduct();
    }

    public function postEditProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postFormEditProduct();
    }

    public function conditionProduct() {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postConditionProduct();
    }

    public function closeAdmin() {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=Admin&action=loginAdmin');
    }

    public function viewTableCategory()
    {
        $this->checkAdmin();
        require_once "models/category.php";
        $productController = new categoryController();
        $productController->viewTableCategory();
    }

    public function addCategory() {
        $this->checkAdmin();
        require_once 'productController.php';
        $categoryController = new categoryController();
        $categoryController->addTableCategory();
    }

    public function postAddCategory() {
        $this->checkAdmin();
        require_once 'productController.php';
        $categoryController = new categoryController();
        $categoryController->postFormAddCategory();
    }

}