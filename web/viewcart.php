<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('buyer_id'))) {
    //$cart_id = $_POST['cart_id'];
    $buyer_id = $_POST['buyer_id'];
    $status=0;

    $stmt = $conn->prepare("SELECT cart_id,qty,total,product_name,image,price FROM cart inner join product on cart.p_id=product.p_id where b_id=? and cart.status=?");
    $stmt->bind_param("ss",$buyer_id,$status);
    $stmt->execute();
    //$tot = 0;
    $stmt->bind_result( $cart_id,$qty,$tot_p,$pname,$image,$price);
    $cart_details = array();
    while ($stmt->fetch()) {
        $temp = array();
        //$temp['pid'] = $p_id;
        $temp['cart_id'] = $cart_id;
        
        $temp['price'] = $price;
        $temp['qty'] = $qty;
        $temp['total'] = $tot_p;
        $temp['p_name'] = $pname;
        $temp['p_image'] = "http://192.168.42.146/plentiful/Seller/production/images/" . $image;

        array_push($cart_details, $temp);
    }

    echo json_encode($cart_details);
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

