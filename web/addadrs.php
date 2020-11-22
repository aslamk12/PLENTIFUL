<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('fullname','mobile','pincode','house','city','landmark','buyer_id','oi_id'))) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobile'];
    $pincode=$_POST['pincode'];
    $house=$_POST['house'];
    $city=$_POST['city'];
    $landmark=$_POST['landmark'];
    $buyer_id=$_POST['buyer_id'];
    $oi_id=$_POST['oi_id'];

    $stmt = $conn->prepare("INSERT INTO del_address (b_id,oi_id,buy_name,mobile,address,city,pincode,landmark) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss",$buyer_id,$oi_id,$fullname,$mobile,$house,$city,$pincode,$landmark);
    if ($stmt->execute() )
    {
        $stmt1 = $conn->prepare("SELECT o_id FROM del_address WHERE oi_id=?" );
        $stmt1->bind_param("s",$oi_id);
        $stmt1->execute();
        $stmt1->bind_result($o_id);

        $adrs = array();
        while($stmt1->fetch()) {
            $temp=array();
            $temp['o_id']=$o_id;
            array_push($adrs,$temp);
        }
        echo json_encode($adrs);

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


