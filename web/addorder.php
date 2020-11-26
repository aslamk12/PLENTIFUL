<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('buyer_id','total','cart_id'))) {

    $buyer_id=$_POST['buyer_id'];
    $total=$_POST['total'];
    $cart_id=$_POST['cart_id'];
    $status="pending";
    $pro_status="pending";
    $del_charge=40;
    $del_time='2020-12-20';

    $stmt = $conn->prepare("INSERT INTO order_item (b_id,cart_id,item_total,del_charge,del_time,status,production_status) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$buyer_id,$cart_id,$total,$del_charge,$del_time,$status,$pro_status);
    if ($stmt->execute() )
    {
        $stmt1 = $conn->prepare("SELECT oi_id FROM order_item WHERE b_id=? and cart_id=?" );
        $stmt1->bind_param("ss",$buyer_id,$cart_id);
        $stmt1->execute();
        $stmt1->bind_result($oi_id);

        $order = array();
        while($stmt1->fetch()) {
            $temp=array();
            $temp['oi_id']=$oi_id;
            array_push($order,$temp);
        }
        echo json_encode($order);

    }
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


