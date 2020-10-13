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
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>ADD EMPLOYEES</h2>
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
                        <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="name">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="email">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" class="form-control" name="mobile">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">DOB</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="date" class="form-control" name="dob">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Address</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="address">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" name="add">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <?php

            if(isset($_POST['add']))
            {
                $nm=$_POST['name'];
                $email=$_POST['email'];
                $mobile=$_POST['mobile'];
                $dob=$_POST['dob'];
                $address=$_POST['address'];
                $pass='qwerty';
                $type='employee';

                    $sel=mysqli_query($con,"select * from employee where emp_name='$nm'");
                    if(mysqli_num_rows($sel)>0)
                    {
                        echo "<script>alert('Already exists')</script>";
                        echo "<script>window.location.href='manage_employee.php'</script>";
                    }
                    else {
                        $cat = mysqli_query($con, "insert into employee(emp_name,emp_email,emp_mobile,emp_dob,emp_address)values('$nm','$email','$mobile','$dob','$address')");
                        $lgn = mysqli_query($con, "insert into login(email,password,type)values('$email','$pass','$type')");
                       if(lgn)
                       {
                           if ($cat)
                           {
                               echo "<script>alert('SUCCESS')</script>";
                               echo "<script>window.location.href='manage_employee.php'</script>";
                           }
                       }
                       else
                           {
                            echo "<script>alert('FAILED')</script>";
                            echo "<script>window.location.href='manage_employee.php'</script>";
                           }
                    }
                }

            ?>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>VIEW EMPLOYEES</h2>
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
                                        $sq=mysqli_query($con,"select *from employee");
                                        while($rw=mysqli_fetch_array($sq))
                                        {
                                            ?>
                                            <tr class="odd pointer">
                                                <td><?php echo $rw['emp_name'] ?></td>
                                                <td><?php echo $rw['emp_email'] ?></td>
                                                <td><?php echo $rw['emp_mobile'] ?></td>
                                                <td><?php echo $rw['emp_dob'] ?></td>
                                                <td><?php echo $rw['emp_address'] ?></td>
                                                <td><a href="employee_edit.php?id=<?php echo $rw['emp_id'] ?>">Edit</a> ||
                                                    <a href="employee_delete.php?id=<?php echo $rw['emp_id'] ?>">Delete</a>

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
        </div>                        </div>
</div>
</div>
<!-- /form color picker -->

</div>
</div>
</div>