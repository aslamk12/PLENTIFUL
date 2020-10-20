<?php
include "header.php";
include "header_top.php";
include "../../connection.php";
$eml=$_SESSION['eml'];
?>
<!DOCTYPE html>
<html lang="en">
    <!-- page content -->
    <div class="right_col" role="main" style="height: 590px">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        </div>
        <div class="row">
            <!-- form input mask -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>UPLOAD PRODUCTS</h2>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Category</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <select name="category" required="" style="display: block;box-shadow: 0 1px 0 #fff,0 -2px 5px rgba(0,0,0,.08) inset;border: 1px solid #c8c8c8;margin: 0 0 20px;
width: 100%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;">
                                        <option>Select Category</option>
                                        <option value="Gents fashion">Gents fashion</option>
                                        <option value="Ladies fashion">Ladies fashion</option>
                                        <option value="Cake">Cake</option>
                                        <option value="Food">Food</option>
                                        <option value="Toys">Toys</option>
                                        <option value="Craft and Decoration">Craft and Decoration</option>
                                    </select>
                                </div></div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Product Name</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="text" class="form-control" name="name">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Image</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="file" class="form-control" name="image">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                           <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Price</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" class="form-control" name="price">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">stock</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" class="form-control" name="stock">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Time for production</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="time" class="form-control" name="ptime">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div></div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Discription</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="discription">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" name="upld">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>
    <!-- /top tiles -->
        </section></div></html>
<?php
if(isset($_POST['upld'])) {
    $sq=mysqli_query($con,"select *from seller_registration  where email='$eml'");
    while($rw=mysqli_fetch_array($sq))
    {
        $s_id=$rw['s_id'];
    }
    $cat = $_POST['category'];
    $pname = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $p_time = $_POST['ptime'];
    $descp = $_POST['discription'];
    $Image = $_FILES['image']['name'];
    $images = explode('.', $Image);
    $extensionImage = end($images);
    $allowedExtsImage = array("jpeg", "jpg", "png");
    $time = Time();
    echo $stock;
    $productImage = $time . '.' . $extensionImage;
    //End Image Processing
    if (in_array($extensionImage, $allowedExtsImage)) {
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $productImage);
        $ins ="insert into product(s_id,product_name,category,image,price,stock,time_for_production,discription)values('$s_id','$pname','$cat','$productImage','$price','$stock','$p_time','$descp')";
        $res=mysqli_query($con,$ins);
       // echo $ins;
       if ($res) {
           echo "<script>alert('SUCCESS')</script>";
           echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('FAILED')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }

    }
    else
    {
        echo "<script>alert('Only jpg/ jpeg format allowed')</script>";
        echo "<script>window.location.href='categories.php'</script>";
    }
}


?>