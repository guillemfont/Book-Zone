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
    public function loginAuth()
    {
        if (!isset($_POST['admin']) || !isset($_POST['password'])) {
            header('Location: index.php?log=true&controller=Admin&action=loginAdmin?');
        }
        $admin = new Admin();
        $admin->setAdmin($_POST['admin']);
        $admin->setPassword($_POST['password']);
        $login = $admin->loginAuth();
        if ($login) {
            $_SESSION['admin'] = $login;
            header('Location: index.php?controller=Admin&action=menuAdmin');
        } else {
            header('Location: index.php?log=false&controller=Admin&action=loginAdmin');
        }
    }
    public function menuAdmin()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->viewTableProduct();
    }
    public function addProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->addTableProduct();
    }
    public function postAddProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postFormAddProduct();
    }
    public function editProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->editTableProduct();
    }
    public function deleteProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->deleteTableProduct();
    }
    public function deleteCategory()
    {
        $this->checkAdmin();
        require_once 'categoryController.php';
        $productController = new categoryController();
        $productController->deleteTableCategory();
    }
    public function postSearchProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postFormSearchProduct();
    }
    public function postSearchCategory()
    {
        $this->checkAdmin();
        require_once 'categoryController.php';
        $productController = new categoryController();
        $productController->postFormSearchCategory();
    }
    public function postEditProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $productController = new ProductController();
        $productController->postFormEditProduct();
    }
    public function conditionProduct()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        (new ProductController())->postConditionProduct();
    }
    public function conditionCategory()
    {
        $this->checkAdmin();
        require_once 'categoryController.php';
        (new CategoryController())->postConditionCategory();
    }
    public function closeAdmin()
    {
        unset($_SESSION['admin']);
        header('Location: index.php?controller=Admin&action=loginAdmin');
    }
    public function viewTableCategory()
    {
        $this->checkAdmin();
        require_once "models/category.php";
        $productController = new CategoryController();
        $productController->viewTableCategory();
    }
    public function viewTableOrders()
    {
        $this->checkAdmin();
        require_once "orderController.php";
        $productController = new OrderController();
        $productController->viewTableOrders();
    }
    public function addCategory()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $categoryController = new CategoryController();
        $categoryController->addTableCategory();
    }
    public function postAddCategory()
    {
        $this->checkAdmin();
        require_once 'productController.php';
        $categoryController = new CategoryController();
        $categoryController->postFormAddCategory();
    }
    public function editCategory()
    {
        $this->checkAdmin();
        require_once 'categoryController.php';
        $categoryController = new categoryController();
        $categoryController->editTableCategory();
    }
    public function postEditCategory()
    {
        $this->checkAdmin();
        require_once 'categoryController.php';
        $categoryController = new CategoryController();
        $categoryController->postFormEditCategory();
    }
}