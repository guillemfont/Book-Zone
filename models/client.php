<?php
require_once("database.php");
class Client extends Database {
    private $email;
    private $password;


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $admin
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function loginAuth() {
        $sql = "SELECT * FROM clientes WHERE email = '{$this->getEmail()}' AND password = '{$this->getPassword()}'";
        $login = $this->connect()->query($sql);
        if($login && $login->rowCount() == 1) {
            return $login->fetch()['email'];
        }
        return false;
    }

}
?>






