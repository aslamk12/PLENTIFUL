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
                            <h2>ADD CATEGORIES</h2>
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

                    $Image=$_FILES['image']['name'];
                    $images = explode('.',$Image);
                    $extensionImage=end($images);
                    $allowedExtsImage = array("jpeg", "jpg", "png");
                    $time = Time();
                    $productImage=$time.'.'.$extensionImage;
                    //End Image Processing
                    if(in_array($extensionImage, $allowedExtsImage))
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$productImage);
                        $sel=mysqli_query($con,"select * from category where category_name='$nm'");
                        if(mysqli_num_rows($sel)>0)
                        {
                            echo "<script>alert('Already exists')</script>";
                            echo "<script>window.location.href='categories.php'</script>";
                        }
                        else {
                            $cat = mysqli_query($con, "insert into category(category_name,image)values('$nm','$productImage')");
                            if ($cat) {
                                echo "<script>alert('SUCCESS')</script>";
                                echo "<script>window.location.href='categories.php'</script>";
                            } else {
                                echo "<script>alert('FAILED')</script>";
                                echo "<script>window.location.href='categories.php'</script>";
                            }
                        }
                    }
                    else
                    {
                        echo "<script>alert('Only jpg/ jpeg format allowed')</script>";
                        echo "<script>window.location.href='categories.php'</script>";
                    }
                }

                ?>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>VIEW CATEGORIES</h2>
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
                            <th class="column-title">Image</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
<?php
$sq=mysqli_query($con,"select *from category");
while($rw=mysqli_fetch_array($sq))
{
    ?>
                          <tr class="odd pointer">
    <td><?php echo $rw['category_name'] ?></td>
    <td><img src="images/<?php echo $rw['image'] ?>" width="65px" height="60px"></td>
    <td><a href="category_edit.php?id=<?php echo $rw['c_id'] ?>">Edit</a> ||
        <a href="category_delete.php?id=<?php echo $rw['c_id'] ?>">Delete</a>

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
