<?php
include "../../connection.php";
$k=$_GET['id'];
$status='pending';

$sq4=mysqli_query($con,"select *from assigned_delivery inner join delivery on assigned_delivery.d_id=delivery.d_id where assigned_delivery.emp_id='$k'");
while ($rw4 = mysqli_fetch_array($sq4)) {

    $d_id=$rw4['d_id'];
}

$ins =mysqli_query($con,"insert into payment(d_id,status)values('$d_id','$status')");
if($ins)
   {
     $upt = mysqli_query($con, "update delivery set sts='completed' where d_id='$d_id'");

     echo "<script>alert('SUCCESS')</script>";
     echo "<script>window.location.href='index.php'</script>";
   }

else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

?>
