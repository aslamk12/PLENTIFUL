<?php
include "../../connection.php";
$k=$_GET['id'];
$sq=mysqli_query($con,"delete from category where c_id='$k'");
if($sq)
{
    echo "<script>alert('DELETED')</script>";
    echo "<script>window.location.href='categories.php'</script>";
}
else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='categories.php'</script>";
}
?>