<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pocket Menu - Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>common/css/bootstrap/bootstrap.css">
  
  <!-- <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>common/css/sweetalert.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>common/css/admin/admin_custom.css">

  <link rel="stylesheet" href="<?php echo base_url();?>common/css/admin/admin_lte.css">

  <link rel="stylesheet" href="<?php echo base_url();?>common/css/admin/skin.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>common/css/admin/main.css">

  <script src="<?php echo base_url();?>common/js/jquery-2.1.1.js"></script>

  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

  <script src="<?php echo base_url();?>common/js/bootstrap/bootstrap3-wysihtml5.all.min.js"></script>

  <script src="<?php echo base_url();?>common/js/jquery.slimscroll.min.js"></script>

  <script src="<?php echo base_url();?>common/js/fastclick.js"></script>

  <script src="<?php echo base_url();?>common/js/bootstrap/bootstrap.js"></script>

  <script src="<?php echo base_url();?>common/js/app.js"></script>
  
  <script src="<?php echo base_url();?>common/js/demo.js"></script>

  <script src="<?php echo base_url();?>common/js/custom.js"></script>

  <script src="<?php echo base_url();?>common/js/sweetalert.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class=" skin-blue wysihtml5-supported">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo" id="admin_logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PMenu</b></span>
        <span><b>Pocket Menu</b></span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle admin-toggler" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url();?>images/avatar/3.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo ($user->username);?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url();?>images/avatar/3.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo ($user->username);?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('user/profile')?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('user/signout')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>