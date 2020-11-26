<?php
include "../../connection.php";
$k=$_GET['id'];

$upt = mysqli_query($con, "update delivery set sts='assigned' where d_id='$k'");
if($upt)
{
    echo "<script>alert('SUCCESS')</script>";
    echo "<script>window.location.href='order_status.php'</script>";
}

else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='order_status.php'</script>";
}
?>
