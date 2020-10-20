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
                            <h2>VIEW PRODUCTS</h2>
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
                                                <th class="column-title">Name</th>
                                                <th class="column-title">Category</th>
                                                <th class="column-title">Image</th>
                                                <th class="column-title">Price</th>
                                                <th class="column-title">Stock</th>
                                                <th class="column-title">Time for Production</th>
                                                <th class="column-title">Description</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $sq1=mysqli_query($con,"select *from product where s_id='$s_id'");
                                            while($rw1=mysqli_fetch_array($sq1))
                                            {
                                                ?>
                                                <tr class="odd pointer">
                                                    <td><?php echo $rw1['product_name'] ?></td>
                                                    <td><?php echo $rw1['category'] ?></td>
                                                    <td><img src="images/<?php echo $rw1['image'] ?>" width="65px" height="60px"></td>
                                                    <td><?php echo $rw1['price'] ?></td>
                                                    <td><?php echo $rw1['stock'] ?></td>
                                                    <td><?php echo $rw1['time_for_production'] ?></td>
                                                    <td><?php echo $rw1['discription'] ?></td>
                                                    <td><a href="manage_product.php?id=<?php echo $rw1['p_id'] ?>">Edit</a> ||
                                                        <a href="product_delete.php?id=<?php echo $rw['p_id'] ?>">Delete</a>

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
    </div>
</div>
<!-- /form color picker -->
