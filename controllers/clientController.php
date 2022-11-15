<?php
require_once "models/client.php";

class ClientController
{
    private function checkClient(): void
    {
        if (!isset($_SESSION['client'])) {
            header('Location: index.php?log=true&controller=Client&action=loginClient');
        }
    }

    public function loginClient()
    {
        require_once 'views/client/loginClient.php';
    }

    public function loginAuth() {
        if(!isset($_POST['client']) || !isset($_POST['password'])) {
            header('Location: index.php?log=true&controller=Client&action=loginClient');
        }

        $client = new Client();
        $client->setEmail($_POST['client']);
        $client->setPassword($_POST['password']);
        $login = $client->loginAuth();

        if($login) {
            $_SESSION['client'] = $login;
            header('Location: index.php?controller=Client&action=menuClient');
        } else {
            header('Location: index.php?log=false&controller=Client&action=loginClient');
        }
    }

    public function menuClient() {
        $this->checkClient();
        require_once 'views/client/menuClient.php';
    }

    public function closeClient() {
        unset($_SESSION['clinet']);
        header('Location: index.php?controller=Client&action=loginClient');
    }

    public function registerClient(){
        require_once 'views/client/registerClient.php';
    }

    public function singInClient(){
        if(isset($_POST['userDNI'])){
            $email = $_POST['userMail'];
            $userName = $_POST['userName'];
            $lastName = $_POST['userLastName'];
            $userDiretion = $_POST['userDiretion'];
            $userNumber = $_POST['formNumber'];
            $userDNI = $_POST['userDNI'];
            $password = $_POST['userPass'];

            $client = new Client($email, $userName, $lastName, $userDiretion, $userNumber, $userDNI, $password);
            $singIn = $client->userSingIn();
            
        }
        else {
            header('Location: index.php?log=true&controller=Client&action=loginClient');
        }
    }

}