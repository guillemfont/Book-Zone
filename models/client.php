<?php
require_once("database.php");
class Client extends Database {

    private $pdo;
    private $email;
    private $userName;
    private $userLastName;
    private $userDirection;
    private $userNumber;
    private $userDNI;
    private $password;


    //Constructor
    public function __construct($email = null, $name = null, $lastname = null, $direction = null, $number = null, $DNI = null, $password = null)
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
        $conn = new Database();
        $login = $conn->connect()->query($sql);
        if ($login && $login->rowCount() == 1) {
            return $login->fetch()['email'];
        }
        return false;
    }

    public function userSingIn()
    {
        $sql = "INSERT INTO clientes (email, nombre, apellidos, calle, numero, dni, password) VALUES ('{$this->getEmail()}','{$this->getUserName()}','{$this->getUserLastName()}','{$this->getUserDirection()}','{$this->getUserNumber()}','{$this->getUserDNI()}',md5('{$this->getPassword()}'))";
        $conn = new Database();
        $db = $conn->connect();
        if($db->query($sql)){
            echo 'si';
        } else {
            echo 'no';
        }
        
    }

    public function getFullName($email)
    {
        $this->pdo = (new Database)->connect();

        try {
            $query1 = $this->pdo->prepare("SELECT nombre FROM clientes WHERE email = '{$email}';");
            $query2 = $this->pdo->prepare("SELECT apellidos FROM clientes WHERE email = '{$email}';");
            $query1->execute();
            $query2->execute();
            $nombre = $query1->fetch(PDO::FETCH_OBJ);
            $apellidos = $query2->fetch(PDO::FETCH_OBJ);
            return $nombre->nombre . " " . $apellidos->apellidos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllData($email)
    {
        $this->pdo = (new Database)->connect();

        try {
            $query = $this->pdo->prepare("SELECT * FROM clientes WHERE email = '{$email}';");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function modifyUser($id)
    {
        $sql = "UPDATE clientes (email, nombre, apellidos, calle, numero, dni";


        $sql = "UPDATE clientes SET email='{$this->getEmail()}', nombre='{$this->getUserName()}', apellidos='{$this->getUserLastName()}', calle='{$this->getUserDirection()}', numero='{$this->getUserNumber()}', dni='{$this->getUserDNI()}' WHERE id = '{$id}';";
        $conn = new Database();
        $db = $conn->connect();
        if($db->query($sql)){
            echo '<script>window.location.replace("index.php")</script>';
        } else {
            echo 'no';
        }
    }
}




       