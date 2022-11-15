<?php

class product{
    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $foto;
    private $stock;
    private $id_categoria;

public function __construct(){
    $this->pdo = (new Database)->connect();

}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto): void
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    public function getProductList(){
        try{
            $query=$this->pdo->prepare("SELECT * FROM productos;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function addProduct(){
        try{
            $query=$this->pdo->prepare("INSERT INTO productos (nombre, descripcion, precio, foto, stock, id_categoria) VALUES (?,?,?,?,?,?);");
            $query->execute(array($this->nombre, $this->descripcion, $this->precio, $this->foto, $this->stock, $this->id_categoria));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function editProduct(){
        try{
            $query=$this->pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, foto=?, stock=?, id_categoria=? WHERE id=?;");
            $query->execute(array($this->nombre, $this->descripcion, $this->precio, $this->foto, $this->stock, $this->id_categoria, $this->id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}