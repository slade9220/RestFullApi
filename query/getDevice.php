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
 
   /* $devices=array();
    $devices["records"]=array();
 
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 

        extract($row);
        $device_item=array(
            "d.id" => $id,
            "d.name" => $name,
            "d.os_id" => $os_id,
            "d.rand_id" => $brand_id,
            "d.fotolink" => $fotolink,
            "d.year" => $year,
            "d.price" => $price
        );
 
        array_push($devices["records"], $device_item);
    }
 */
    //echo json_encode($device_arr);
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $post[] =  $result;
    }

    echo json_encode($post,JSON_UNESCAPED_UNICODE);

}
 
else{
    echo json_encode(
        array("message" => "No device found.")
    );
}
?>