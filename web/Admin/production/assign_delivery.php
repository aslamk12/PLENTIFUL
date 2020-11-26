<?php
include "header.php";
$k=$_GET['id'];
$emp=mysqli_query($con,"select * from employee inner join login on employee.emp_email=login.email where login.status='approved'");

?>

<div class="right_col" role="main" style="height: 835px">
    <div class="">
        <div class="page-title">
            <div class="title_left">

            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>ASSIGN EMPLOYEE</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="height: 260px">

                        <form class="form-horizontal form-label-left" novalidate method="post">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Assign Delivery <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="employee" style="text-transform: capitalize" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2">
                                        <option value="" disabled selected>~select~</option>
                                        <?php while ($rw_emp=mysqli_fetch_array($emp)){ ?>
                                            <option value="<?php echo $rw_emp[0]?>"><?php echo $rw_emp[1] ?></option>
                                        <?php } ?></select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">

                                    <button id="send" type="submit" name="upt" class="btn btn-success">UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['upt']))
{
    $employee=$_POST['employee'];
    $sq=mysqli_query($con,"insert into assigned_delivery (d_id,emp_id) values('$k','$employee')");
    if($sq)
    {
        $upt=mysqli_query($con,"update delivery set sts='assigned' where d_id='$k'");

        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='manage_delivery.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='manage_delivery.php'</script>";
    }
} ?>
