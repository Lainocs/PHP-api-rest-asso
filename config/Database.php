<?php

class Database {
    private $host = "localhost";
    private $db_name = "api_asso";
    private $username = "root";
    private $password = "root";
    public $connexion;


    public function getConnection()
    {

        $this->connexion = null;

        try {
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connexion->exec("set names utf8");
        } catch(PDOException $exeption) {
            echo "Erreur de connexion : " . $exeption->getMessage();
        }
        
        return $this->connexion;
    }

}

    