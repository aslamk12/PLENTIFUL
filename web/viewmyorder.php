<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('buyer_id'))) {

    $buyer_id = $_POST['buyer_id'];
    $status="confirmed";

    $stmt = $conn->prepare("SELECT order_item.oi_id,order_item.item_total,order_item.del_charge,cart.qty,product.product_name,product.image,product.price FROM order_item join cart join product on cart.p_id=product.p_id where order_item.b_id=? and order_item.status=? and order_item.b_id=?");
    $stmt->bind_param("sss",$buyer_id,$status,$buyer_id);
    $stmt->execute();
    $stmt->bind_result( $oi_id,$tprice,$del_charge,$qty,$pname,$image,$price);
    

    $order_details = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['oi_id'] = $oi_id;
        //$temp['pid'] = $pid;
        $temp['price'] = $price;
        $temp['qty'] = $qty;
        $temp['total'] = $tprice + $del_charge;
        $temp['delcharge'] = $del_charge;
        $temp['p_name'] = $pname;
        $temp['p_image'] = "http://192.168.42.146/plentiful/Seller/production/images/" . $image;

        array_push($order_details, $temp);
    }

    echo json_encode($order_details);
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


