<?php

class Database{
 
    private $host = "89.46.111.67";
    private $db_name = "Sql1221369_1";
    private $username = "Sql1221369";
    private $password = "83uiy52o20";
    public $conn;
 

    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}

?>