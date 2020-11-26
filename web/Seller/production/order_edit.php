<?php
include "../../connection.php";
$k=$_GET['id'];
$sts='pending';
$sq5 = mysqli_query($con, "select product_name,b_id,qty,total from product inner join cart on product.p_id=cart.p_id where s_id='$k'");
while ($rw5 = mysqli_fetch_array($sq5)) {
    $pname = $rw5['product_name'];
    $b_id = $rw5['b_id'];
    $qty = $rw5['qty'];
    $total = $rw5['total'];
}
$sq7 = mysqli_query($con, "select o_id,buy_name,city,sl_id,status from del_address inner join seller_orders on del_address.oi_id=seller_orders.oi_id where del_address.b_id='$b_id'");
while ($rw7 = mysqli_fetch_array($sq7)) {
    $o_id = $rw7['o_id'];
    $buy_name = $rw7['buy_name'];
    $city = $rw7['city'];
    $sl_id = $rw7['sl_id'];
    $status = $rw7['status'];
}
$ins =mysqli_query($con,"insert into delivery(product_name,s_id,o_id,total,sts)values('$pname','$k','$o_id','$total','$sts')");
if($ins) {
    $upt=mysqli_query($con,"update seller_orders set status='completed' where sl_id='$sl_id'");
    if($upt)
    {
        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='view_order.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='view_order.php'</script>";
    }

}
?>