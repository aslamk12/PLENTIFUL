<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('product_id','Buyer_id','price'))) {
    $pro_id = $_POST['product_id'];
    $buy_id = $_POST['Buyer_id'];
    $pro_price=$_POST['price'];
    $qty=1;
    $status="pending";


    $stmt = $conn->prepare("INSERT INTO cart (p_id,b_id,qty,total,status) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$pro_id,$buy_id,$pro_price,$qty,$status);
    if ($stmt->execute() )
    {
        $stmt1 = $conn->prepare("SELECT LAST_INSERT_ID()" );
        //$stmt1->bind_param("s",$buy_id);
        $stmt1->execute();
        $stmt1->bind_result($cart_id);

        $cart = array();
        while($stmt1->fetch()) {
            $temp=array();
            $temp['cart_id']=$cart_id;
            array_push($cart,$temp);
        }
        echo json_encode($cart);

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

