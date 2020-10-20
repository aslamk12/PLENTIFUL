<?php
include "../../connection.php";
$k=$_GET['id'];
$sq=mysqli_query($con,"delete from product where p_id='$k'");
if($sq)
{
    echo "<script>alert('DELETED')</script>";
    echo "<script>window.location.href='view_product.php'</script>";
}
else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='view_product.php'</script>";
}
?>
