<?php

class Connection
{

    private $host;
    private $admin;
    private $password;
    private $db;

    private $connection;

    function __construct($host, $admin, $password, $db)
    {
        $this->host = $host;
        $this->admin = $admin;
        $this->password = $password;
        $this->db = $db;
    }

    function connect()
    {

        $this->connection = mysqli_connect(
            $this->host,
            $this->admin,
            $this->password,
            $this->db

        );
        $this->connection->set_charset("utf8");

        if (mysqli_connect_errno()) {
            print("error al conectarse");
        }
    }

    function close()
    {
        mysqli_close($this->connection);
    }
}
