<div class="content-wrapper" style="min-height: 100%">
    <section class="content-header" style="text-align: center" id="business-area">
        <h1>
            Manage Categories
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php  ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <div class="content">      
        <div class="row" style="float: left; width: 100%; margin-left: 0px;">
            <a id="add-cat-btn" class="btn btn-primary" href="#">Add Category</a>    
        </div>

        
        <br><br><br>
                          
        <table id="example" class="table table-striped table-bordered" style="margin-top: 40px;" cellspacing="0" width="100%">
          
          <thead>
            <tr>
              <th>No</th>
              <th>Category Name</th>
              <th>Publish</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
          $index = 0;
          foreach($categories as $category) {

          ?>
            <tr id="<?php echo 'cat_' .$category['category_id'];?>">
              <td><?php
                    $index++; 
                    echo $index; 
                  ?>
              </td>
              <td class="category-name"><a href="/pocketmenu/category/show/<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></a></td>
              <td class="published"><?php echo ($category['ispublish'] ? "published":"unpublished"); ?></td>
              <td><a class="edit-cat-button" data-toggle="modal" data-target="#editCatModal" href="#">Edit</a></td>
              <td><a class="delete-button" id="<?php echo $category['category_id'];?>"  href="#">Delete</a></td>
            </tr>
          <?php 
          }
          ?>
          </tbody>
          <input type="hidden" id="selected-cat-id"></input>
        </table>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>
        <h1>&nbsp;</h1>

        <div id="editCatModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Edit Category</h2>
                    </div>
                    <div class="modal-body" style="margin: 40px">
                        <div class="form-field">
                            <label for="cat-name" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Category Name</label>
                            <input type="text" name="name" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="cat-name"></input>
                        </div>
                        <br><br>
                        <div class="form-field">
                            <label for="cat-published" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Publish</label>
                            <input type="checkbox" name="published" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="cat-published"></input>
                        </div>
                        <input type="hidden" id="cat-id"></input>
                    </div>
                    <div class="modal-footer" style="background-color: lightblue">
                        <button type="button" id="cat-save-btn" class="btn btn-default">Save  <i id="cat-edit-spinner" class="fa fa-circle-o-notch fa-spin"></i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>