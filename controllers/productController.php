<?php

class ProductController
{
//    private $model;
//    public function __construct(){
//        $this->model = new Product();
//    }
//    public function Menu(){
//        require_once "views/products/index.php";
//
//    }
    public function viewTableProduct()
    {
        require_once "models/product.php";
        $productList = (new Product())->getProductList();
        require_once "views/admin/menuAdmin.php";
    }

    public function addTableProduct()
    {
        require_once "views/admin/addProduct.php";
    }

    public function postFormAddProduct()
    {
        $condition = $this->isCondition();
        if ($condition) {
            echo "<script>alert('Faltan campos por rellenar');</script>";
            header('Location: index.php?controller=Admin&action=addProduct');
        }
        require_once "models/product.php";
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setPrecio($_POST['precio']);
        $product->setAutor($_POST['autor']);
        
        if (!$product->setFoto(file_get_contents($_FILES['img']['tmp_name']))) {
            echo "<script>alert('Error al subir la imagen');</script>";
            header('Location: index.php?controller=Admin&action=editProduct');
        }
        
        $product->setStock($_POST['stock']);
        $product->setIdCategoria($_POST['id_categoria']);
        $product->addProduct();
        header('Location: index.php?controller=Admin&action=menuAdmin');

    }

    public function editTableProduct()
    {
        require_once "models/product.php";
        if (!isset($_GET['id'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            header('Location: index.php?controller=Admin&action=menuAdmin');
        }

        $product = (new Product())->getProductById($_GET['id']);
        require_once "views/admin/editProduct.php";
    }

    public function postFormEditProduct()
    {

        $condition = $this->isCondition();
        if ($condition) {
            echo "<script>alert('Faltan campos por rellenar');</script>";
            header("Location: index.php?controller=Admin&action=editProduct&id=1");
        }

        require_once "models/product.php";
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setAutor($_POST['autor']);
        $product->setPrecio($_POST['precio']);
        if (!$product->setFoto(file_get_contents($_FILES['img']['tmp_name']))) {
            echo "<script>alert('Error al subir la imagen');</script>";
            header('Location: index.php?controller=Admin&action=editProduct');
        }
        $product->setStock($_POST['stock']);
        $product->setIdCategoria($_POST['id_categoria']);
        $product->setId($_POST['id']);
        $product->editProduct();
        header('Location: index.php?controller=Admin&action=menuAdmin');
    }

    public function isCondition(): bool
    {
        return (!isset($_POST['nombre']) || !isset($_POST['descripcion']) || !isset($_POST['precio']) || !isset($_POST['stock']) || !isset($_POST['id_categoria']));
    }

    public function postConditionProduct()
    {
        require_once "models/product.php";
        $product = new Product();
        $productid = $product->getProductById($_GET['id']);
        if ($productid->estado == '0') {
            $product->editConditionProduct($productid->id, 1);
        } else {
            $product->editConditionProduct($productid->id, 0);
        }

        header('Location: index.php?controller=Admin&action=menuAdmin');
    }

    public function postFormSearchProduct(){
        require_once "models/product.php";
        $product = new Product();
        $product->setNombre($_POST['busqueda']);
        $productList = $product->searchProduct();
        require_once "views/admin/menuAdmin.php";
    }

}


