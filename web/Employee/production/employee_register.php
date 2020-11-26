<?php
include "../../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PLENTIFUL</title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=" Marvel Sign In Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates,
      Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"/>
    <script>
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
</head>
<body>
<div class="back-image bg bg1">
    <h1 class="header-w3ls ">
        Employee Registration
    </h1>
    <div class="main ">
        <div class="headder-icon">
            <div class="top-icon ">
                <span class="fa fa-angle-double-down" aria-hidden="true"></span>
            </div>
        </div>
        <div class="its-sign-in">
            <h2 class="">apply here</h2>
        </div>
        <form  method="post" enctype="multipart/form-data">


            <div class="form-left-w3l ">
                <input type="text" name="name" placeholder="Full Name" required="" style="width: 100%;
color: #fff;
text-transform: capitalize;
outline: none;
font-size: 14px;
padding: .8em 0em;
margin: 10px 0px 9px;
border: none;
border-bottom: 1px solid #fff;
-webkit-appearance: none;
display: inline-block;
background: transparent;
box-sizing: border-box;">
            </div>

            <div class="form-left-w3l ">
                <input type="email" name="email" placeholder="Email" required="" style="width: 100%;
color: #fff;
outline: none;
font-size: 14px;
padding: .8em 0em;
margin: 10px 0px 9px;
border: none;
border-bottom: 1px solid #fff;
-webkit-appearance: none;
display: inline-block;
background: transparent;
box-sizing: border-box;">
            </div>

            <div class="form-left-w3l ">
                <input type="number" name="mobile" placeholder="Mobile" required="" style="width: 100%;
color: #fff;
outline: none;
font-size: 14px;
padding: .8em 0em;
margin: 10px 0px 9px;
border: none;
border-bottom: 1px solid #fff;
-webkit-appearance: none;
display: inline-block;
background: transparent;
box-sizing: border-box;">
            </div>

            <div class="form-left-w3l ">
                <input type="date" name="dob" placeholder="" required="" style="width: 100%;
color: #fff;
outline: none;
font-size: 14px;
padding: .8em 0em;
margin: 10px 0px 9px;
border: none;
border-bottom: 1px solid #fff;
-webkit-appearance: none;
display: inline-block;
background: transparent;
box-sizing: border-box;">
            </div>


            <div class="form-left-w3l ">
                <input type="text" name="address" placeholder="Address" required="" style="width: 100%;
color: #fff;
text-transform: capitalize;
outline: none;
font-size: 14px;
padding: .8em 0em;
margin: 10px 0px 9px;
border: none;
border-bottom: 1px solid #fff;
-webkit-appearance: none;
display: inline-block;
background: transparent;
box-sizing: border-box;">
            </div>

            <div class="form-left-w3l ">
                <input type="password" placeholder="Password" name="password" required="">
            </div>
            <div class="form-left-w3l ">
                <input type="password" placeholder="Confirm Password" name="conpassword" required="">
            </div>

            <div class="btnn">
                <button type="submit" name="reg" class="btn">Register</button><br>
                <div class="clear"></div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $cpass = $_POST['conpassword'];
    $type='employee';
    $status='pending';
    if (strlen($mobile)!= 10)
    {
        echo "<script>alert('Contact number must be 10')</script>";
        echo "<script>window.location.href='employee_register.php'</script>";
    }
    elseif(strlen($pass)<6)
    {
        echo "<script>alert('Password must be more than 6')</script>";
        echo "<script>window.location.href='employee_register.php'</script>";
    }
    elseif($pass!=$cpass)
    {
        echo "<script>alert('Please check your password')</script>";
        echo "<script>window.location.href='employee_register.php'</script>";
    }
    else
    {
        $cat = mysqli_query($con, "insert into employee(emp_name,emp_email,emp_mobile,emp_dob,emp_address)values('$name','$email','$mobile','$dob','$address')");
        $lgn = mysqli_query($con, "insert into login(email,password,type,status)values('$email','$pass','$type','$status')");
        if($lgn) {
            if ($cat) {
                echo "<script>alert('Registered successfully, waiting for approval')</script>";
                echo "<script>window.location.href='../../Admin/production/login.php'</script>";
            }
        }

    }

}
?>
