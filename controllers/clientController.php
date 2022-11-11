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
        header('Location: index.php?controller=Client&action=registerClient')
    }

}