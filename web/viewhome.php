<?php
require_once 'DBconnect.php';

$response = array();
$stmt = $conn->prepare("SELECT p_id,product_name,image FROM product;");
$stmt->execute();

$stmt->bind_result($id, $pname, $pimage);
$view = array();
while($stmt->fetch()){
    $temp = array();
    $temp['pid'] = $id;
    $temp['pname'] = $pname;
    $temp['pimage'] = "http://192.168.42.146/plentiful/Seller/production/images/".$pimage;
    array_push($view, $temp);
}
echo json_encode($view);
