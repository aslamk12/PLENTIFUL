<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('product_id','Buyer_id','price','qty'))) {
    $pro_id = $_POST['product_id'];
    $buy_id = $_POST['Buyer_id'];
    $pro_price=$_POST['price'];
    $qty=$_POST['qty'];
    $status=0;
    $total=$pro_price*$qty;


    $stmt = $conn->prepare("INSERT INTO cart (p_id,b_id,qty,total,status) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$pro_id,$buy_id,$qty,$total,$status);
    if ($stmt->execute() )
    {
        $stmt1 = $conn->prepare("SELECT cart_id from cart where b_id=? and status=?" );
        $stmt1->bind_param("ss",$buy_id,$status);
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

