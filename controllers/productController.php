<?php
class ProductController{
    private $model;
    public function __construct(){
        $this->model = new Product();
    }
    public function Menu(){
        require_once "views/products/index.php";

    }
}