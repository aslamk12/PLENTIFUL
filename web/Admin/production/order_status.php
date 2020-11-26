<?php
include "header.php";
include "header_top.php";
include "../../connection.php";
$eml=$_SESSION['eml'];
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
                            <h2>VIEW DELIVERY STATUS</h2>
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
                                                <th class="column-title">Employee Name</th>
                                                <th class="column-title">Total Amount</th>
                                                <th class="column-title">Status</th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $sq1=mysqli_query($con,"select *from delivery inner join assigned_delivery on delivery.d_id=assigned_delivery.d_id where delivery.sts='assigned' or delivery.sts='completed'");
                                            while ($rw5 = mysqli_fetch_array($sq1)) {
                                                $d_id = $rw5['d_id'];
                                                $product_name = $rw5['product_name'];
                                                $s_id = $rw5['s_id'];
                                                $o_id = $rw5['o_id'];
                                                $total = $rw5['total'];
                                                $sts = $rw5['sts'];
                                                $emp_id= $rw5['emp_id'];
//                                            }
                                                $sq2=mysqli_query($con,"select  * from employee where e_id='$emp_id'");
                                                while ($rw6 = mysqli_fetch_array($sq2)) {
                                                    $ename = $rw6['emp_name'];

                                                }
                                                $sq3=mysqli_query($con,"select  * from del_address where o_id='$o_id'");
                                                while ($rw7 = mysqli_fetch_array($sq3)) {
                                                    $b_name = $rw7['buy_name'];
                                                    $b_mobile = $rw7['mobile'];
                                                    $b_address = $rw7['address'];
                                                    $b_city = $rw7['city'];
                                                }
                                                if(($sts=='assigned') || ($sts=='completed'))
                                                {

                                                    ?>
                                                    <tr class="odd pointer">
                                                        <td><?php echo $product_name; ?></td>
                                                        <td><?php echo $b_name; ?></td>
                                                        <td><?php echo $b_address.','.$b_city; ?></td>
                                                        <td><?php echo $ename; ?></td>
                                                        <td><?php echo $total; ?></td>
                                                        <td><?php echo $sts ?></td>
                                                        </td>

                                                    </tr>
                                                <?php }} ?>


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
                            <h2>VIEW CANCELED DELIVERY</h2>
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
                                            <tr class="headings">
                                                <th class="column-title">Product Name</th>
                                                <th class="column-title">Buyer Name</th>
                                                <th class="column-title">Buyer Loaction</th>
                                                <th class="column-title">Employee Name</th>
                                                <th class="column-title">Total Amount</th>
                                                <th class="column-title">Status</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $sq1=mysqli_query($con,"select *from delivery inner join assigned_delivery on delivery.d_id=assigned_delivery.d_id where delivery.sts='canceled'");
                                            while ($rw5 = mysqli_fetch_array($sq1)) {
                                                $d_id = $rw5['d_id'];
                                                $product_name = $rw5['product_name'];
                                                $s_id = $rw5['s_id'];
                                                $o_id = $rw5['o_id'];
                                                $total = $rw5['total'];
                                                $sts = $rw5['sts'];
                                                $emp_id= $rw5['emp_id'];
//                                            }
                                                $sq2=mysqli_query($con,"select  * from employee where e_id='$emp_id'");
                                                while ($rw6 = mysqli_fetch_array($sq2)) {
                                                    $ename = $rw6['emp_name'];

                                                }
                                                $sq3=mysqli_query($con,"select  * from del_address where o_id='$o_id'");
                                                while ($rw7 = mysqli_fetch_array($sq3)) {
                                                    $b_name = $rw7['buy_name'];
                                                    $b_mobile = $rw7['mobile'];
                                                    $b_address = $rw7['address'];
                                                    $b_city = $rw7['city'];
                                                }
                                                if($sts=='canceled')
                                                {

                                                    ?>
                                                    <tr class="odd pointer">
                                                        <td><?php echo $product_name; ?></td>
                                                        <td><?php echo $b_name; ?></td>
                                                        <td><?php echo $b_address.','.$b_city; ?></td>
                                                        <td><?php echo $ename; ?></td>
                                                        <td><?php echo $total; ?></td>
                                                        <td><?php echo $sts; ?></td>
                                                        <td><a href="re_assign_delivery.php?id=<?php echo $d_id ?>">Re-Delivery</a>
                                                        </td>

                                                    </tr>
                                                <?php }} ?>

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


