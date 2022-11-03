<?php
require_once("database.php");
class Admin extends Database {
    private $admin;
    private $password;


    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin): void
    {
        $this->admin = $admin;
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
        $sql = "SELECT * FROM administrador WHERE admin = '{$this->getAdmin()}' AND password = '{$this->getPassword()}'";
        $login = $this->connect()->query($sql);
        if($login && $login->rowCount() == 1) {
            return $login->fetch()['admin'];
        }
        return false;
    }

}
?>