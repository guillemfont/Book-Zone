<?php

class CategoryController
{
    public function viewTableCategory()
    {
        require_once 'models/category.php';
        $categoryList = (new Category())->getCategoryList();

        require_once 'views/admin/tableCategory.php';

    }

    public function addTableCategory()
    {
        require_once 'views/admin/addCategory.php';

    }

    public function postFormAddCategory()
    {
        require_once 'models/category.php';
        $category = new Category();
        $category->setIdCategoria($_POST['id_categoria']);
        $category->setNombre($_POST['nombre']);
        $category->addCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }

    public function postAddCategory() {
        $this->checkAdmin();
        require_once 'categoryController.php';
        $productController = new ProductController();
        $productController->postFormAddCategory();
    }

    public function editTableCategory()
    {
        require_once 'models/category.php';
        if (!isset($_GET['id'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            header('Location: index.php?controller=Admin&action=viewTableCategory');
        }
    }

    public function postFormEditCategory()
    {
        require_once 'models/category.php';
        $category = new Category();
        $category->setNombre($_POST['nombre']);
        $category->setIdCategoria($_POST['id_categoria']);
        $category->editCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');

    }

}