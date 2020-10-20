<?php
include "../../connection.php";
$k=$_GET['id'];
$sel=mysqli_query($con,"select * from login where email='$k'");
while ($rw=mysqli_fetch_array($sel))
{
    $l_id=$rw['login_id'];
}
$upt=mysqli_query($con,"update login set status='approved' where login_id='$l_id'");
if($upt)
{
    echo "<script>alert('Approved')</script>";
    echo "<script>window.location.href='manage_seller.php'</script>";
}
else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='manage_seller.php'</script>";
}
?>