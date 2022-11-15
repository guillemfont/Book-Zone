<?php
require_once("database.php");
class Client extends Database
{
    private $email;
    private $userName;
    private $userLastName;
    private $userDirection;
    private $userNumber;
    private $userDNI;
    private $password;


    //Constructor
    public function ___constructor($email, $name, $lastname, $direction, $number, $DNI, $password)
    {
        $this->email = $email;
        $this->userName = $name;
        $this->userLastName = $lastname;
        $this->userDirection = $direction;
        $this->userNumber = $number;
        $this->userDNI = $DNI;
        $this->password = $password;
    }


    // Getters and Setters
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    public function setUserLastName($userLastName): void
    {
        $this->userLastName = $userLastName;
    }
    public function getUserDirection()
    {
        return $this->userDirection;
    }

    public function setUserDirection($userDirection): void
    {
        $this->userDirection = $userDirection;
    }
    public function getUserDNI()
    {
        return $this->userDNI;
    }

    public function setUserDNI($userDNI): void
    {
        $this->userDNI = $userDNI;
    }
    public function getUserNumber()
    {
        return $this->userNumber;
    }

    public function setUserNumber($userNumber): void
    {
        $this->userNumber = $userNumber;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }


    // Methods
    public function loginAuth()
    {
        $sql = "SELECT * FROM clientes WHERE email = '{$this->getEmail()}' AND password = md5('{$this->getPassword()}')";
        $login = $this->connect()->query($sql);
        if ($login && $login->rowCount() == 1) {
            return $login->fetch()['email'];
        }
        return false;
    }

    public function userSingIn()
    {
        $sql = "INSERT INTO clientes (email, nombre, apellidos, calle, numero, dni, password) VALUES ('{$this->getEmail()}','{$this->getUserName()}','{$this->getUserLastName()}','{$this->getUserDirection()}','{$this->getUserNumber()}','{$this->getUserDNI()}',md5('{$this->getPassword()}'))";
        $signIn = $this->connect()->query($sql);
        if($signIn){
            echo 'insertado';
        } else {
            echo 'error, no se ha insertado';
        }
    }
}
