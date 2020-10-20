<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PLENTIFUL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                <input class="input100" type="email" name="email" placeholder="email">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                <input class="input100" type="password" name="password" placeholder="password">
                <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
               <button class="login100-form-btn" name="login" value="Log In">
                    Sign In
                </button>
            </div>


            <div class="text-center">
                <a href="../../Seller/production/seller_registration.php" class="txt2 hov1">
                    CREATE A SELLER ACCOUNT
                </a>
            </div>
            <div class="text-center">
                <a href="../../Employee/production/employee_register.php" class="txt2 hov1">
                    CREATE A EMPLOYEE ACCOUNT
                </a>
            </div>
        </form>


    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
<?php
include "../../connection.php";
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
        $usr = mysqli_query($con, "select *from login where email='$email' AND password='$pass'");
        $count=mysqli_num_rows($usr);
        if ($count>0)
        {

                $_SESSION['eml']=$email;
                while ($r = mysqli_fetch_array($usr))
              {
                if ($r['type'] == 'admin')
                {

                    echo "<script>alert('success')</script>";
                    echo "<script>window.location.href='index.php'</script>";
                }
                if ($r['type'] == 'seller')
                {
                    if ($r['status'] == 'approved')
                    {
                    echo "<script>alert('success')</script>";
                    echo "<script>window.location.href='../../Seller/production/index.php'</script>";
                    }
                    else {
                        echo "<script>alert('Not Approved')</script>";
                        echo "<script>window.location.href='login.php'</script>";
                    }
                }
                if ($r['type'] == 'employee')
                {
                    if ($r['status'] == 'approved')
                    {
                        echo "<script>alert('success')</script>";
                        echo "<script>window.location.href='../../Employee/production/index.php'</script>";
                    }
                    else {
                        echo "<script>alert('Not Approved')</script>";
                        echo "<script>window.location.href='login.php'</script>";
                    }
                }
            }
        }
        else
        {
            echo "<script>alert('Failed')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
}
?>