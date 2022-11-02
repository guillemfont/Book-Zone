<?php
class LoginModel
{
    private $_dbLogin;
    public function _construct()
    {
        $this->_dbLogin = new Connection(
            "localhost",
            "admin",
            "password",
            "book_zone"
        );
    }
    public function login($admin, $password)
    {
        $this->_dbLogin->connect();

        $queryLogin = $this->_dbLogin->conexion->prepare("SELECT * FROM administrador WHERE admin = :admin AND password = :password");
        $queryLogin->execute();
        $this->_dbLogin->close();
        if ($queryLogin->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
