<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('product_id'))) {
    $product_id = $_POST['product_id'];

    $stmt = $conn->prepare("SELECT product_name,image,price,stock,discription,name FROM product inner join seller_registration on product.s_id=seller_registration.s_id where p_id=?");
    $stmt->bind_param("s",$product_id);
    $stmt->execute();
    $stmt->bind_result( $p_name, $p_image, $price,$stock,$description,$seller);
    $product_details = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['p_name'] = $p_name;
        $temp['p_image'] = "http://192.168.42.146/plentiful/Seller/production/images/" . $p_image;
        $temp['price'] = $price;
        $temp['stock'] = $stock;
        $temp['description'] = $description;
        $temp['seller'] = $seller;

        array_push($product_details, $temp);
    }

    echo json_encode($product_details);
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
