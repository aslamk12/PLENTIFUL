<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('category_name'))) {
    $cat_name = $_POST['category_name'];

    $stmt = $conn->prepare("SELECT p_id,product_name,image,price FROM product where category=?");
    $stmt->bind_param("s",$cat_name);
    $stmt->execute();
    $stmt->bind_result($id, $p_name, $p_image, $price);
    $cat_products = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['pid'] = $id;
        $temp['p_name'] = $p_name;
        $temp['p_image'] = "http://192.168.42.146/plentiful/Seller/production/images/" . $p_image;
        $temp['price'] = $price;
        array_push($cat_products, $temp);
    }
    
    echo json_encode($cat_products);
}
else
{
   echo json_encode("Error");
}


function isTheseParametersAvailable($params)
{
    foreach($params as $param)
    {
        if (!isset($_POST[$param]))
        {
            return false;
        }
    }

    return true;
}
