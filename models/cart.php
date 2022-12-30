<?php
require_once("database.php");
class Cart extends Database
{
    private $emailCliente;
    private $idProducto;
    private $unidades;

    // constructor
    public function __construct($email = null, $product = null, $unity = null)
    {
        $this->emailCliente = $email;
        $this->idProducto = $product;
        $this->unidades = $unity;
    }

    // Getters & Setters
    // ...
    public function getEmailCliente(){
        return $this->emailCliente;
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function getUnidades(){
        return $this->unidades;
    }


    // Métodos
    public function saveToCart(){
        $sql = "INSERT INTO `carrito` (`id_carrito`, `email_cliente`, `id_producto`, `unidades`) VALUES (NULL, '{$this->getEmailCliente()}', '{$this->getIdProducto()}', '{$this->getUnidades()}');";
        $conn = new Database();
        $db = $conn->connect();
        if($db->query($sql)){
            echo 'si';
        } else {
            echo 'no';
        }
    }

}





?>