<?php

require_once 'DBconnect.php';

$response = array();

if (isset($_GET['apicall']))
{
    switch ($_GET['apicall'])
    {
        case 'signup':

            if (isTheseParametersAvailable(array('fullname','mobile','email','dob','password')))
            {
                $full_name = $_POST['fullname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $password = $_POST['password'];
                $type="buyer";
                $status="approved";

                $stmt = $conn->prepare("SELECT * from buyer_registration where email = ?");
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0)
                {
                    $response['error'] = true;
                    $response['message'] = 'User Already Registered';
                    $stmt->close();
                }
                else
                {
                    $stmt = $conn->prepare("INSERT INTO buyer_registration (b_name,mobile,email,dob) VALUES (?,?,?,?)");
                    $stmt->bind_param("ssss",$full_name,$mobile,$email,$dob);
                    $stmt1 = $conn->prepare("INSERT INTO login (email,password,type,status) VALUES (?,?,?,?)");
                    $stmt1->bind_param("ssss",$email,$password,$type,$status);


                    if ($stmt->execute() && $stmt1->execute() )
                    {
                        $stmt = $conn->prepare("SELECT b_id, b_name, mobile, email, dob from buyer_registration where email=?" );
                        $stmt->bind_param("s",$email);
                        $stmt->execute();
                        $stmt->bind_result($b_id,$full_name, $mobile, $email,  $dob);
                        $stmt->fetch();

                        $user = array
                        (
                            'buyer_id'=>$b_id,
                            'buyer_name'=>$full_name,
                            'buyer_mobile'=>$mobile,
                            'buyer_email'=>$email,
                            'buyer_dob'=>$dob,
                        );

                        $stmt->close();

                        $response['error']= false;
                        $response['message'] = 'Buyer registered Successfully';
                        $response['user'] = $user;
                    }
                }
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';

            }
            break;
        case "login":
            if (isTheseParametersAvailable(array('email','password')))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $stmt = $conn->prepare("SELECT * from login where email = ? and password=?");
                $stmt->bind_param("ss",$email,$password);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0)
                {
                    $stmt1 = $conn->prepare("SELECT b_id, b_name, mobile, email, dob from buyer_registration where email=?" );
                    $stmt1->bind_param("s",$email);
                    $stmt1->execute();
                    $stmt1->bind_result($b_id,$full_name, $mobile, $email,  $dob);
                    $stmt1->fetch();

                    $user = array
                    (
                        'buyer_id'=>$b_id,
                        'buyer_name'=>$full_name,
                        'buyer_mobile'=>$mobile,
                        'buyer_email'=>$email,
                        'buyer_dob'=>$dob,
                    );

                    $response['error'] = false;
                    $response['message'] = 'Succesfully logged in';
                    $response['user'] = $user;
                    $stmt1->close();
                    $stmt->close();
                }
                else{
                    $response['error'] = true;
                    $response['message'] = 'No user found';
                    $stmt->close();
                }

            }
            break;
        default:
            $response['error'] = true;
            $response['message'] = 'Invalid operation Called';
    }

}
else
{
    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
}

echo json_encode($response);

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
