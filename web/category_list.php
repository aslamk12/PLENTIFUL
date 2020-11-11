<?php
require_once 'DBconnect.php';

$response = array();
$stmt = $conn->prepare("SELECT * FROM category;");
$stmt->execute();

$stmt->bind_result($id, $catname, $catimage);
$categories = array();
while($stmt->fetch()){
    $temp = array();
    $temp['cid'] = $id;
    $temp['catname'] = $catname;
    $temp['catimage'] = "http://192.168.42.146/plentiful/Admin/production/images/".$catimage;
    array_push($categories, $temp);
}
echo json_encode($categories);
