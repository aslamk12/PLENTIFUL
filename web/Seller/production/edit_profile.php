<?php
include "header.php";
include "header_top.php";
include "../../connection.php";
$eml=$_SESSION['eml'];
$sq=mysqli_query($con,"select *from seller_registration  where email='$eml'");
while($rw=mysqli_fetch_array($sq))
{
    $s_id=$rw['s_id'];
    $sname=$rw['name'];
    $mobile=$rw['mobile'];
    $dob=$rw['dob'];
    $address=$rw['address'];
    $upi=$rw['upi'];

}
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
                        <h2>EDIT PROFILE</h2>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo $sname ?>"  data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mobile <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="number" class="form-control col-md-7 col-xs-12" name="mobile" value="<?php echo $mobile ?>"  data-validate-length-range="6" data-validate-words="2" name="mobile" placeholder="" required="required" type="number">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">DOB <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="dob" class="form-control col-md-7 col-xs-12" name="dob" value="<?php echo $dob ?>" data-validate-length-range="6" data-validate-words="2" name="dob" placeholder="" required="required" type="date">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="address" class="form-control col-md-7 col-xs-12" name="address" value="<?php echo $address ?>"  data-validate-length-range="6" data-validate-words="2" name="address" placeholder="" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">UPI id<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="upi" class="form-control col-md-7 col-xs-12" name="upi" value="<?php echo $upi ?>"  data-validate-length-range="6" data-validate-words="2" name="upi" placeholder="" required="required" type="text">
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
    $a=$_POST['name'];
    $b=$_POST['mobile'];
    $c=$_POST['dob'];
    $d=$_POST['address'];
    $e=$_POST['upi'];
    $upd=mysqli_query($con,"update seller_registration set name='$a',mobile='$b',dob='$c',address='$d',upi='$e' where s_id='$s_id'");
    if($upd)
    {
        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='edit_profile.php'</script>";
    }
}
?>
