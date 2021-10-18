<?php
class Connection
{
    private $host = NULL;
    private $dbname = NULL;
    private $userName = NULL;
    private $password = NULL;
    private $pdo = NULL;

    function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'smithrentacar';
        $this->userName = 'root';
        $this->host = '';
    }

    function getConnection(){
        $dsn = ("mysql:host=".$this->host . ";dbname=" .$this->dbname . ";charset=utf8");
        try {
            $this->pdo = new PDO($dsn, $this->userName, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $this->pdo;
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}
