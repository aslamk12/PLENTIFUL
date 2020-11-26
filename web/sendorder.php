<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('oi_id'))) {
    $oi_id = $_POST['oi_id'];
    $stat = 'pending';

        $stmt2 =$conn->prepare( "INSERT INTO seller_orders (oi_id,status) VALUES (?,?)");
        $stmt2->bind_param("ss",$oi_id,$stat);
        if($stmt2->execute())
        {
            echo json_encode("success");
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
