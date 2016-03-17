<div class="content-wrapper" style="max-height: 100%; min-height: 200px;">
    <section class="content-header" style="text-align: center" id="business-area">
        <h1>
            Manage Products
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php  ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
  
    <div class="content">
        <div class="row">
            <a id="add-prod-btn" class="btn btn-primary" data-toggle="modal" data-target="#addProdModal"  style="margin-left: 20px;" href="#">Add Product</a>
        </div>

        <div id="addProdModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Add Product</h2>
                    </div>
                    <div class="modal-body" style="margin: 40px">
                      <form action="/pocketmenu/product/xls_upload" method="post" enctype="multipart/form-data">
                        <input type="file" name="file"></input>
                        <input type="submit" name="add" value="Upload" style="margin-left: 200px; margin-top: 80px"></input>
                      </form>
                    </div>
                    <!-- <div class="modal-footer" style="background-color: lightblue">
                        <button type="button" id="cat-save-btn" class="btn btn-default">Save  <i id="cat-edit-spinner" class="fa fa-circle-o-notch fa-spin"></i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>

        <br><br>
        <table id="productTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $index = 0;
                    foreach ($products as $product) {
                        $index++;
                ?>
                <tr id="<?php echo 'prod_' .$product['product_id'];?>">
                    <td><?php echo $index; ?></td>
                    <td id="<?php echo 'prod_' .$product['product_id'].'_1';?>"><?php echo $product['product_name']; ?></td>
                    <td id="<?php echo 'prod_' .$product['product_id'].'_2';?>"><?php echo $product['product_price']; ?></td>
                    <td id="<?php echo 'prod_' .$product['product_id'].'_3';?>"><?php echo $product['location_name']; ?></td>
                    <td id="<?php echo 'prod_' .$product['product_id'].'_4';?>"><?php echo $product['product_description']; ?></td>
                    <td><a id="<?php echo $product['product_id'];?>" class="edit-prod-button" data-toggle="modal" data-target="#editProdModal" href="#">Edit</a></td>
                    <td><a pid="<?php echo $product['product_id'];?>" class="delete-prod-button" href="#">Delete</a></td>
                </tr>
                <?php
                    } 
                ?>
            </tbody>
        </table>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>

        <div id="editProdModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Edit Product</h2>
                    </div>
                    <div class="modal-body" style="margin: 40px">
                        <div class="form-field">
                          <label for="prod-name" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Product Name</label>
                          <input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="prod-name"></input>
                        </div>
                        <br><br>
                        <div class="form-field">
                          <label for="prod-price" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Product Price</label>
                          <input type="text" name="price" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="prod-price"></input>
                        </div>
                        <br><br>
                        <div class="form-field">
                          <label for="prod-description" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Product Description</label>
                          <textarea type="text" name="description" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="prod-description"></textarea>
                        </div>

                        <input type="hidden" id="prod-id"></input>
                    </div>
                    <div class="modal-footer" style="background-color: lightblue">
                        <button type="button" id="prod-save-btn" class="btn btn-default">Save  <i id="prod-edit-spinner" class="fa fa-circle-o-notch fa-spin"></i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>