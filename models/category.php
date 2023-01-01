<?php
class Category{
    private $pdo;
    public $elementos;
    private $id_categoria;
    private $nombre;
    private $estado = 0;


    public function __construct(){
        $this->pdo = (new Database)->connect();

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

    public function getCategoryList(){
        try{
            $consulta="select * from categoria";
            $resultado=$this->pdo->query($consulta);
            while ($filas=$resultado->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->elementos[]=$filas;
            }
            return $this->elementos;
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function addCategory(){
        try{
            $query = $this->pdo->prepare("INSERT INTO categoria VALUES (NULL,?,1)");
            $query->execute(array($this->nombre));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

   /* public function deleteCategory(){
        try{
            $query = $this->pdo->prepare("DELETE FROM categoria WHERE id_categoria = ?");
            $query->execute(array($this->id_categoria));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }*/

    public function editCategory(){
        try{
            $query = $this->pdo->prepare("UPDATE categoria SET nombre=? WHERE id_categoria=?");
            $query->execute(array($this->nombre, $this->id_categoria));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function getCategoryById($id){
        try{
            $query = $this->pdo->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function searchCategory(){
        try{
            $query = $this->pdo->prepare("SELECT * FROM categoria WHERE nombre LIKE ?");
            $query->execute(array("%".$this->nombre."%"));
            return $query->fetchAll(PDO::FETCH_OBJ);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editConditionCategory($id, $estado)
    {
        try {
            $query = $this->pdo->prepare("UPDATE categoria SET estado=? WHERE id_categoria=?;");
            $query->execute(array($estado, $id));
            $this->estado = $estado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}