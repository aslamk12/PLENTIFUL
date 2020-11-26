<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('oi_id','cart_id'))) {
    $oi_id = $_POST['oi_id'];
    $cart_id = $_POST['cart_id'];
    $status="confirmed";
    $cstatus=1;
    $sstatus="pending";

    $stmt = $conn->prepare("UPDATE  order_item SET status = ? WHERE oi_id = ? ");
    $stmt->bind_param("ss",$status,$oi_id);
    $stmt1 = $conn->prepare("UPDATE  cart SET status = ? WHERE cart_id = ? ");
    $stmt1->bind_param("ss",$cstatus,$cart_id);

    if ($stmt->execute()&&$stmt1->execute())
    {
        $stmt1 = $conn->prepare("SELECT status from order_item where oi_id=?" );
        $stmt1->bind_param("s",$oi_id);
        $stmt1->execute();
        $stmt1->bind_result($status);

//        

        $corder = array();
        while($stmt1->fetch()){
     		$temp=array();       
            $temp['status']=$status;
            array_push($corder,$temp);
        }
        echo json_encode($corder);

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

