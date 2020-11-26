<?php
include "header.php";
include "header_top.php";
include "../../connection.php";
$eml=$_SESSION['eml'];
$sq=mysqli_query($con,"select *from seller_registration  where email='$eml'");
while($rw=mysqli_fetch_array($sq))
{
    $s_id=$rw['s_id'];
}
?>
<div class="right_col" role="main" style="height: 765px">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12">


                <div class="col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>VIEW PENDING ORDER</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <div class="col-md-12 col-sm-12 col-xs-12">


                                <div class="x_content">

                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">Product Name</th>
                                                <th class="column-title">Buyer Name</th>
                                                <th class="column-title">Buyer Loaction</th>
                                                <th class="column-title">Qty</th>
                                                <th class="column-title">Total Amount</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                                $sq5 = mysqli_query($con, "select product_name,b_id,qty,total from product inner join cart on product.p_id=cart.p_id where s_id='$s_id'");
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


                                            ?>
                                            <?php if($status=="pending"){

                                            ?>
                                                <tr class="odd pointer">
                                                    <td><?php echo $pname ?></td>
                                                    <td><?php echo $buy_name ?></td>
                                                    <td><?php echo $city ?></td>
                                                    <td><?php echo $qty ?></td>
                                                    <td><?php echo $total ?></td>
                                                    <td><a href="order_edit.php?id=<?php echo $s_id ?>">Approve</a>
                                                    </td>

                                                </tr>

                                               <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12">


                <div class="col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>VIEW COMPLETED ORDER</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />

                            <div class="col-md-12 col-sm-12 col-xs-12">


                                <div class="x_content">

                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table bulk_action">
                                            <thead>
                                            <tr class="headings">
                                                <th class="column-title">Product Name</th>
                                                <th class="column-title">Buyer Name</th>
                                                <th class="column-title">Buyer Loaction</th>
                                                <th class="column-title">Qty</th>
                                                <th class="column-title">Payment Status</th>
<!--                                                <th class="column-title no-link last"><span class="nobr">Action</span>-->
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php

                                            $sq5 = mysqli_query($con, "select product_name,b_id,qty from product inner join cart on product.p_id=cart.p_id where s_id=8");
                                            while ($rw5 = mysqli_fetch_array($sq5)) {
                                                $pname = $rw5['product_name'];
                                                $b_id = $rw5['b_id'];
                                                $qty = $rw5['qty'];
                                            }
                                            $sq7 = mysqli_query($con, "select o_id,buy_name,city,sl_id,status from del_address inner join seller_orders on del_address.oi_id=seller_orders.oi_id where del_address.b_id='$b_id'");
                                            while ($rw7 = mysqli_fetch_array($sq7)) {
                                                $o_id = $rw7['o_id'];
                                                $buy_name = $rw7['buy_name'];
                                                $city = $rw7['city'];
                                                $sl_id = $rw7['sl_id'];
                                                $status = $rw7['status'];
                                            }
                                            if($status!='pending'){

                                            ?>
                                                <tr class="odd pointer">
                                                    <td><?php echo $pname ?></td>
                                                    <td><?php echo $buy_name ?></td>
                                                    <td><?php echo $city ?></td>
                                                    <td><?php echo $qty ?></td>
                                                    <td><?php echo "pending" ?></td>
<!--                                                    <td><a href="employee_disable.php?id=--><?php //echo $rw['emp_email'] ?><!--">Disable</a>-->

                                                    </td>
                                                    <?php }?>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>

