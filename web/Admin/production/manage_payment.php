<?php
include "header.php";

include "../../connection.php";
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
                            <h2>MANAGE PAYMENT</h2>
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
                                                <th class="column-title">Product Name </th>
                                                <th class="column-title">Seller Name</th>
                                                <th class="column-title">Seller Mobile</th>
                                                <th class="column-title">Price</th>
                                                <th class="column-title">Seller UPI</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $sq1=mysqli_query($con,"select *from payment inner join delivery on payment.d_id=delivery.d_id where payment.status='pending'");
                                            while ($rw5 = mysqli_fetch_array($sq1)) {
                                                $d_id = $rw5['d_id'];
                                                $product_name = $rw5['product_name'];
                                                $s_id = $rw5['s_id'];
                                                $o_id = $rw5['o_id'];
                                                $total = $rw5['total'];
                                                $sts = $rw5['sts'];
                                                $pay_id=$rw5['pay_id'];
                                                $status=$rw5['status'];
//                                            }
                                                $sq2=mysqli_query($con,"select  * from seller_registration where s_id='$s_id'");
                                                while ($rw6 = mysqli_fetch_array($sq2)) {
                                                    $sname = $rw6['name'];
                                                    $smobile = $rw6['mobile'];
                                                    $supi = $rw6['upi'];

                                                }

                                                if($status=='pending')
                                                {

                                                    ?>
                                                    <tr class="odd pointer">
                                                        <td><?php echo $product_name; ?></td>
                                                        <td><?php echo $sname; ?></td>
                                                        <td><?php echo $smobile; ?></td>
                                                        <td><?php echo $total+40; ?></td>
                                                        <td><?php echo $supi; ?></td>

                                                        <td><a href=?id=<?php echo $pay_id ?>">Make Payment</a>
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
