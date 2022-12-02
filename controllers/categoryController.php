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
        require_once "models/category.php";
        if (!isset($_GET['id_categoria'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            print("<pre>");
            var_dump($_GET);
            print("</pre>");
            //header('Location: index.php?controller=Admin&action=tableCategory');
        }
        $category = (new Category())->getCategoryById($_GET['id_categoria']);
        require_once "views/admin/editCategory.php";
    }

    public function postConditionCategory()
    {
        require_once "models/category.php";
        $category = new Category();
        $categoryid = $category->getCategoryById($_GET['id_categoria']);
        if ($categoryid->estado == '0') {
            $category->editConditionCategory($categoryid->id_categoria, 1);
        } else {
            $category->editConditionCategory($categoryid->id_categoria, 0);
        }

        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }

    public function postFormEditCategory()
    {
        $condition = $this->isCondition();
        if ($condition) {
            echo "<script>alert('Faltan campos por rellenar');</script>";
            header("Location: index.php?controller=Admin&action=editCategory&id_categoria=1");
        }
        require_once "models/category.php";
        $category = new Category();
        $category->setIdCategoria($_POST['id_categoria']);
        $category->setNombre($_POST['nombre']);
        $category->editCategory();
        header('Location: index.php?controller=Admin&action=viewTableCategory');
    }
    public function isCondition(): bool
    {
        return (!isset($_POST['nombre'])  || !isset($_POST['id_categoria']));
    }


    public function postFormSearchCategory(){
        require_once "models/category.php";
        $category = new Category();
        $category->setNombre($_POST['busqueda']);
        $categoryList = $category->searchCategory();
        require_once "views/admin/tableCategory.php";
    }

}