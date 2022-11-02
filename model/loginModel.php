<?php
class Login{
    private $_db;
    public function _construct(){
        $this->_db = new Conexion();
    }
public function login($usuario, $password){
    $this ->_db->conectar();
    $r = $this ->_db->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password");
    $r -> execute();
    $this ->_db->desconectar();
    if($r->rowCount() == 1){
        return true;
        else{
            return false;
        }
}
}