<div class="content-wrapper" style="min-height: 100%">
    <section class="content-header" style="text-align: center" id="business-area">
        <h1>
            Manage Locations
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php  ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Locations</li>
        </ol>
    </section>

    <div class="content">      
        <div class="row" style="float: left; width: 100%; margin-left: 0px;">
          <a id="add-loc-btn" class="btn btn-primary pull-left" data-toggle="modal" data-target="#createLocModal" href="#">Add Location</a>
        </div>
        <br><br><br>
                          
        <table id="locations" class="table table-striped table-bordered" style="margin-top: 40px;" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Zip Code</th>
              <th>Phone Number</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
          $index = 0;
          foreach($locations as $location) {

          ?>
            <tr id="<?php echo 'loc_' .$location['location_id'];?>">
              <td><?php
                    $index++; 
                    echo $index; 
                  ?>
              </td>
              <td class="location-name" id="<?php echo 'loc_' .$location['location_id'].'_1';?>"><a href="/pocketmenu/location/show/<?php echo $location['location_id']; ?>"><?php echo $location['location_name']; ?></a></td>
              <td class="location-address" id="<?php echo 'loc_' .$location['location_id'].'_2';?>"><?php echo $location['location_address']; ?></td>
              <td class="location-city" id="<?php echo 'loc_' .$location['location_id'].'_3';?>"><?php echo $location['location_city']; ?></td>
              <td class="location-state" id="<?php echo 'loc_' .$location['location_id'].'_4';?>"><?php echo $location['location_state']; ?></td>
              <td class="location-zip" id="<?php echo 'loc_' .$location['location_id'].'_5';?>"><?php echo $location['location_zip']; ?></td>
              <td class="location-phone" id="<?php echo 'loc_' .$location['location_id'].'_6';?>"><?php echo $location['location_phone']; ?></td>
              <td class="location-lat" id="<?php echo 'loc_' .$location['location_id'].'_7';?>"><?php echo $location['location_lat']; ?></td>
              <td class="location-lon" id="<?php echo 'loc_' .$location['location_id'].'_8';?>"><?php echo $location['location_lon']; ?></td>
              <td><a class="edit-loc-button" id="<?php echo($location['location_id']); ?>" data-toggle="modal" data-target="#editLocModal">Edit</a></td>
              <td><a lid="<?php echo($location['location_id']); ?>" class="del-loc-btn">Delete</a></td>
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

        <div id="createLocModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Create Location</h2>
                    </div>
                    <div class="modal-body" style="margin: 40px; height: 230px;">
                        <div class="row">
                            <label for="loc-name" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Name</label>
                            <input type="text" name="loc-name" class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-name"></input>
                        </div>
                        <div class="row">
                            <label for="loc-address" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Address</label>
                            <input type="text" name="loc-address" class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-address"></input>
                        </div>
                        <div class="row">
                            <label for="loc-city" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">City</label>
                            <input type="text" name="loc-city" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-city"></input>
                        </div>
                        <div class="row">
                            <label for="loc-state" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">State</label>
                            <input type="text" name="loc-state" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-state"></input>
                        </div>
                        <div class="row">
                            <label for="loc-zip-code" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Zip Code</label>
                            <input type="number" name="loc-zip-code" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-zip-code"></input>
                        </div>
                        <div class="row">
                            <label for="loc-phone" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Phone Number</label>
                            <input type="text" name="loc-phone" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-lon"></input>
                        </div>
                        <div class="row">
                            <label for="loc-lon" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Latitude</label>
                            <input type="text" name="loc-lon" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-phone"></input>
                        </div>
                        <div class="row">
                            <label for="loc-lat" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Longitude</label>
                            <input type="text" name="loc-lat" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="loc-lat"></input>
                        </div>
                        <div class="row" style="background-color: red">
                          <span id="error-message"></span>
                        </div>
                        <input type="hidden" id="loc-id"></input>
                    </div>
                    <div class="modal-footer" style="background-color: lightblue">
                        <button type="button" id="loc-save-btn" class="btn btn-default">Save  <i id="cat-edit-spinner" class="fa fa-circle-o-notch fa-spin"></i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="editLocModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Edit Location</h2>
                    </div>
                    <div class="modal-body" style="margin: 40px; height: 230px;">
                        <div class="row">
                            <label for="edit-loc-name" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6" >Name</label>
                            <input type="text" name="edit-loc-name" class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-name"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-address" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Address</label>
                            <input type="text" name="edit-loc-address" class="pull-right col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-address"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-city" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">City</label>
                            <input type="text" name="edit-loc-city" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-city"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-state" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">State</label>
                            <input type="text" name="edit-loc-state" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-state"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-zip-code" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Zip Code</label>
                            <input type="number" name="edit-loc-zip-code" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-zip-code"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-phone" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Phone Number</label>
                            <input type="text" name="edit-loc-phone" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-phone"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-lat" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Latitude</label>
                            <input type="text" name="edit-loc-lat" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-lat"></input>
                        </div>
                        <div class="row">
                            <label for="edit-loc-lon" class="pull-left col-lg-6 col-md-6 col-sm-6 col-xs-6">Longitude</label>
                            <input type="text" name="edit-loc-lon" class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="edit-loc-lon"></input>
                        </div>
                        <div class="row" style="background-color: red">
                          <span id="error-message"></span>
                        </div>
                        <input type="hidden" id="loc-id"></input>
                    </div>
                    <div class="modal-footer" style="background-color: lightblue">
                        <button type="button" id="loc-edit-btn" class="btn btn-default">Save<i id="cat-edit-spinner" class="fa fa-circle-o-notch fa-spin"></i></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
