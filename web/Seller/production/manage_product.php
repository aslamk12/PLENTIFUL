<?php
include "header.php";
include "header_top.php";
include "../../connection.php";
$p_id=$_GET['id'];
$sq1=mysqli_query($con,"select *from product  where p_id='$p_id'");
while($rw1=mysqli_fetch_array($sq1))
{
    $pname=$rw1['product_name'];
    $price=$rw1['price'];
    $stock=$rw1['stock'];
    $time_product=$rw1['time_for_production'];
    $descp=$rw1['discription'];
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" name="name" value="<?php echo $pname ?>"  data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="number" class="form-control col-md-7 col-xs-12" name="price" value="<?php echo $price ?>"  data-validate-length-range="6" data-validate-words="2" name="price" placeholder="" required="required" type="number">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Stock <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="stock" class="form-control col-md-7 col-xs-12" name="stock" value="<?php echo $stock ?>"  data-validate-length-range="6" data-validate-words="2" name="stock" placeholder="" required="required" type="number">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Time For Production <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="ptime" class="form-control col-md-7 col-xs-12" name="ptime" value="<?php echo $time_product ?>"  data-validate-length-range="6" data-validate-words="2" name="ptime" placeholder="" required="required" type="time">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="descp" class="form-control col-md-7 col-xs-12" name="descp" value="<?php echo $descp ?>"  data-validate-length-range="6" data-validate-words="2" name="descp" placeholder="" required="required" type="text">
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
    $b=$_POST['price'];
    $c=$_POST['stock'];
    $d=$_POST['ptime'];
    $e=$_POST['descp'];
    $upd=mysqli_query($con,"update product set product_name='$a',price='$b',stock='$c',time_for_production='$d',discription='$e' where p_id='$p_id'");
    if($upd)
    {
        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='view_product.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='view_product.php'</script>";
    }
}
?>