  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" id="left-sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-left: 50px">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>images/avatar/3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right info" style="margin-left: 40px;">
          <p><?php echo ($user->username);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <?php if ($active == 'dashboard') {?>
        <li class="active">
        <?php } else { ?>
        <li>
        <?php } ?>
          <a href="<?php echo base_url('admin/index'); ?>" style="text-align: center">
            <br>
            <i class="fa fa-dashboard"></i> 
            <br>
            <span>Locations</span>
          </a>
        </li>

        <?php if ($active == 'category') {?>
        <li class="active">
        <?php } else { ?>
        <li>
        <?php } ?>
          <a href="<?php echo base_url('category/all'); ?>">
            <br>
            <i class="fa fa-diamond"></i>
            <br>
            <span>Categories</span>
          </a>
        </li>

        <?php if ($active == 'product') {?>
        <li class="active">
        <?php } else { ?>
        <li>
        <?php } ?>
          <a href="<?php echo base_url('product/all'); ?>">
            <br>
            <i class="fa fa-bank"></i> 
            <br>
            <span>Products</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>