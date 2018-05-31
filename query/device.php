<?php
class Device{
 
    private $conn;
    private $table_name = "device";
 
    // object properties
    public $id;
    public $name;
    public $os_id;
    public $brand_id;
    public $fotolink;
    public $year;
    public $price;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



function read() {
 
    $query = "SELECT d.name, d.id, d.name, d.os_id, d.fotolink, d.year, d.price, b.name as brand
              FROM device d
              LEFT JOIN brand b ON d.brand_id = b.id
              LEFT JOIN operative_system o ON d.os_id = o.id
              ORDER BY brand ";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();



    return $stmt;
}

}

?>