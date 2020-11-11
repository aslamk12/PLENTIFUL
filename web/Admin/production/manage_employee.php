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
                        <h2>VIEW EMPLOYEE REQUEST</h2>
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
                                            <th class="column-title">Name </th>
                                            <th class="column-title">Email</th>
                                            <th class="column-title">Mobile</th>
                                            <th class="column-title">DOB</th>
                                            <th class="column-title">Address</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $sq1=mysqli_query($con,"select *from employee inner join login on employee.emp_email=login.email where login.status='pending'");
                                        while($rw=mysqli_fetch_array($sq1))
                                        {
                                            ?>
                                            <tr class="odd pointer">
                                                <td><?php echo $rw['emp_name'] ?></td>
                                                <td><?php echo $rw['emp_email'] ?></td>
                                                <td><?php echo $rw['emp_mobile'] ?></td>
                                                <td><?php echo $rw['emp_dob'] ?></td>
                                                <td><?php echo $rw['emp_address'] ?></td>
                                                <td><a href="employee_edit.php?id=<?php echo $rw['emp_email'] ?>">Approve</a> ||
                                                    <a href="employee_delete.php?id=<?php echo $rw['e_id'] ?>">Delete</a>

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
                            <h2>VIEW APPROVED EMPLOYEES</h2>
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
                                                <th class="column-title">Name </th>
                                                <th class="column-title">Email</th>
                                                <th class="column-title">Mobile</th>
                                                <th class="column-title">DOB</th>
                                                <th class="column-title">Address</th>
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
                                            $sq1=mysqli_query($con,"select *from employee inner join login on employee.emp_email=login.email 
                                                  where login.status<>'pending'");
                                            while($rw=mysqli_fetch_array($sq1))
                                            {
                                                ?>
                                                <tr class="odd pointer">
                                                    <td><?php echo $rw['emp_name'] ?></td>
                                                    <td><?php echo $rw['emp_email'] ?></td>
                                                    <td><?php echo $rw['emp_mobile'] ?></td>
                                                    <td><?php echo $rw['emp_dob'] ?></td>
                                                    <td><?php echo $rw['emp_address'] ?></td>
                                                    <td><?php echo $rw['status'] ?></td>
                                                    <td><a href="employee_disable.php?id=<?php echo $rw['emp_email'] ?>">Disable</a>

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
</div>

</div>
</div>
</div>