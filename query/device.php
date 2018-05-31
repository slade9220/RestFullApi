<?php
class Device{
 
/*CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `os_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `fotolink` varchar(256) NOT NULL,
  `year` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=101 ;*/

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



function read(){
 
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.os_id, p.brand_id, p.fotolink, p.year. p.price
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    brand b
                        ON p.brand_id = c.id
                LEFT JOIN
                    operative system o
                      ON p.os_id = o.id
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}

?>