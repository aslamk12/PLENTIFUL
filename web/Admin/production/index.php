<?php
include "header.php";
include "header_top.php";

?>
<div class="right_col" role="main" style="height: 590px">
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

            <span class="count_top"><i class="fa fa-user"></i> Categories</span>
            <?php
            $sq1=mysqli_query($con,"select * from category");
            $c1=mysqli_num_rows($sq1);
            ?>
            <div class="count"><?php echo $c1 ?></div>

        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>Employees</span>
            <?php
            $sq2=mysqli_query($con,"select * from employee");
            $c2=mysqli_num_rows($sq2);
            ?>
            <div class="count"><?php echo $c2 ?></div>

        </div>


        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>Seller</span>
            <?php
            $sq4=mysqli_query($con,"select * from seller_registration");
            $c4=mysqli_num_rows($sq4);
            ?>
            <div class="count"><?php echo $c4 ?></div>

        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Buyers</span>
            <?php
            $sq5=mysqli_query($con,"select * from buyer_registration");
            $c5=mysqli_num_rows($sq5);
            ?>
            <div class="count"><?php echo $c5 ?></div>

        </div>



        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Products</span>
            <?php
            $sq6=mysqli_query($con,"select * from product");
            $c6=mysqli_num_rows($sq6);
            ?>
            <div class="count green"><?php echo $c6 ?></div>

        </div>

    </div>
    <!-- /top tiles -->
</div>
