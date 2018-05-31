<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

include_once '../database/controller.php';
include_once '../query/device.php';
 

$database = new Database();
$db = $database->getConnection();
 

$device = new Device($db);
 

$stmt = $device->read();
$num = $stmt->rowCount();
 

if($num>0){
 
    $devices=array();
    $devices["records"]=array();
 
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 

        extract($row);
        $device_item=array(
            "id" => $id,
            "name" => $name,
            "os_id" => $os_id,
            "brand_id" => $brand_id,
            "fotolink" => $fotolink,
            "year" => $year,
            "price" => $price
        );
 
        array_push($devices["records"], $device_item);
    }
 
    echo json_encode($device_arr);
}
 
else{
    echo json_encode(
        array("message" => "No device found.")
    );
}
?>