<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('oi_id','order_id'))) {
    $oi_id = $_POST['oi_id'];
    $order_id=$_POST['order_id'];

    $stmt = $conn->prepare("SELECT item_total,del_charge,buy_name,address,city,pincode FROM order_item inner join del_address on order_item.oi_id=del_address.oi_id where o_id=?");
    $stmt->bind_param("s",$order_id);
    $stmt->execute();
    $stmt->bind_result( $item_price, $del_charge, $buy_name,$adrs,$city,$pincode);
    $orderlist = array();
    while ($stmt->fetch()) {
        $temp = array();
        $temp['item_price'] = $item_price;
        $temp['del_charge'] = $del_charge;
        $temp['adrs_name'] = $buy_name;
        $temp['adrs'] = $adrs;
        $temp['pincode'] = $pincode;
        $temp['city'] = $city;

        array_push($orderlist, $temp);
    }

    echo json_encode($orderlist);
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

