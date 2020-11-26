<?php
include "header.php";
include "header_top.php";
//session_start();
include "../../connection.php";
$eml=$_SESSION['eml'];

$sq=mysqli_query($con,"select * from employee  where emp_email='$eml'");
while($rw=mysqli_fetch_array($sq))
{
    $emp_id=$rw['e_id'];
}
?>
<div class="right_col" role="main"
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
                            <h2>VIEW ASSIGNED DELIVERY</h2>
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
                                                <th class="column-title">Seller Address</th>
                                                <th class="column-title">Seller Mobile</th>
                                                <th class="column-title">Buyer Name</th>
                                                <th class="column-title">Buyer Address</th>
                                                <th class="column-title">Buyer Mobile</th>
                                                <th class="column-title">Price</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $sq4=mysqli_query($con,"select *from assigned_delivery inner join delivery on assigned_delivery.d_id=delivery.d_id where assigned_delivery.emp_id='$emp_id'");
                                            while ($rw4 = mysqli_fetch_array($sq4)) {
                                                $product_name = $rw4['product_name'];
                                                $s_id = $rw4['s_id'];
                                                $o_id = $rw4['o_id'];
                                                $total = $rw4['total'];
                                                $sts = $rw4['sts'];
                                                $d_id=$rw4['d_id'];

                                                $sq2=mysqli_query($con,"select  * from seller_registration where s_id='$s_id'");
                                                while ($rw6 = mysqli_fetch_array($sq2)) {
                                                    $sname = $rw6['name'];
                                                    $smobile = $rw6['mobile'];
                                                    $saddress = $rw6['address'];
                                                }
                                                $sq3=mysqli_query($con,"select  * from del_address where o_id='$o_id'");
                                                while ($rw7 = mysqli_fetch_array($sq3)) {
                                                    $b_name = $rw7['buy_name'];
                                                    $b_mobile = $rw7['mobile'];
                                                    $b_address = $rw7['address'];
                                                    $b_city = $rw7['city'];
                                                }
                                                if($sts=='assigned')
                                                {

                                                    ?>
                                                    <tr class="odd pointer">
                                                        <td><?php echo $product_name; ?></td>
                                                        <td><?php echo $sname; ?></td>
                                                        <td><?php echo $saddress; ?></td>
                                                        <td><?php echo $smobile; ?></td>
                                                        <td><?php echo $b_name; ?></td>
                                                        <td><?php echo $b_address.','.$b_city; ?></td>
                                                        <td><?php echo $b_mobile; ?></td>
                                                        <td><?php echo $total ?></td>

                                                        <td><a href="complete_delivery.php?id=<?php echo $emp_id ?>">completed </a>||
                                                            <a href="canceled_delivery.php?id=<?php echo $emp_id ?>">canceled</a>
                                                        </td>

                                                    </tr>
                                                <?php
                                            } }?>

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

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    </div>

</div>

</div>
</div>
</section>
</div>