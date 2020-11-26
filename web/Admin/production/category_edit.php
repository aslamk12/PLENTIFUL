<?php
include "header.php";
$k=$_GET['id'];
$sq=mysqli_query($con,"select *from category  where c_id='$k'");
while($rw=mysqli_fetch_array($sq))
{
    $cnm=$rw['category_name'];
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
                            <h2>EDIT DETAILS</h2>
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
                                        <input id="name" class="form-control col-md-7 col-xs-12" name="name" value=""  data-validate-length-range="6" data-validate-words="2" placeholder="" required="required" type="text">
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
    $cat=$_POST['name'];
    $sq=mysqli_query($con,"update category set category_name='$cat' where c_id='$k'");
    if($sq)
    {
        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='categories.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='category_edit.php'</script>";
    }
}
include "footer.php";
?>