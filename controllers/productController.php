<?php
require_once "models/product.php";
require_once 'models/category.php';

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
        $productList = (new Product())->getProductList();
        require_once "views/admin/menuAdmin.php";
    }

    public function addTableProduct()
    {
        require_once "models/product.php";
        $categoryList = (new Category())->getCategoryList();
        require_once "views/admin/addProduct.php";
    }

    public function editTableProduct()
    {
        if (!isset($_GET['id'])) {
            echo "<script>alert('No se ha pasado la ID correctamente');</script>";
            header('Location: index.php?controller=Admin&action=menuAdmin');
        }

        $product = (new Product())->getProductById($_GET['id']);
        
        require_once 'models/category.php';
        $categoryList = (new Category())->getCategoryList();
        require_once "views/admin/editProduct.php";
    }

    public function postFormAddProduct()
    {
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setPrecio($_POST['precio']);
        $product->setAutor($_POST['autor']);
        try {
            $tmp_nom=$_FILES ["fotoP"]['tmp_name'];
        } catch (Throwable $th) {
            echo "<script>alert('Error al subir el archivo');</script>";
        }
        $product->setFoto(file_get_contents($tmp_nom));
        $product->setStock($_POST['stock']);
        $product->setIdCategoria(intval($_POST['categorias']));
        $product->addProduct();
        header('Location: index.php?controller=Admin&action=menuAdmin');

    }

    public function postFormEditProduct()
    {
        $product = new Product();
        $product->setNombre($_POST['nombre']);
        $product->setDescripcion($_POST['descripcion']);
        $product->setAutor($_POST['autor']);
        $product->setPrecio($_POST['precio']);
        $product->setStock($_POST['stock']);
        $product->setIdCategoria($_POST['categorias']);
        $product->setId($_POST['id']);
        try {
            $tmp_nom=$_FILES ["fotoP"]['tmp_name'];
            $product->setFoto(file_get_contents($tmp_nom));
            $aux=True;
        } catch (Throwable $th) {
            $aux=False;
        }
        if($aux){
            $product->editProduct();
        }else{
            $product->editProductNoFoto();
        }
        header('Location: index.php?controller=Admin&action=menuAdmin');
    }

    public function isCondition(): bool
    {
        return (!isset($_POST['nombre']) || !isset($_POST['descripcion']) || !isset($_POST['precio']) || !isset($_POST['stock']) || !isset($_POST['id_categoria']));
    }

    public function postConditionProduct()
    {
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
        $product = new Product();
        $product->setNombre($_POST['busqueda']);
        $productList = $product->searchProduct();
        require_once "views/admin/menuAdmin.php";
    }

}


