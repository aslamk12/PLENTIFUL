<?php
include "header.php";
include "header_top.php";

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
                                    <input type="number" class="form-control" name="mobile">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Stock</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="number" class="form-control" name="dob">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Time for production</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <input type="time" class="form-control" name="name">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div></div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Discrption</label>
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
    </div>
    <!-- /top tiles -->
        </section></div></html>