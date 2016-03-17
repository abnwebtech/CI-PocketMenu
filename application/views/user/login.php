<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
<title><?php echo $this->config->item('site_title'); if(isset($title))echo " ".$this->config->item('site_title_delimiter')." ".$title;?></title>
    <link type='text/css' href="<?php echo base_url();?>common/css/main.css" rel='Stylesheet' />
    
    <link type="text/css" href="<?php echo base_url();?>common/css/bootstrap/bootstrap.css" rel='stylesheet'>
    <link type="text/css" href="<?php echo base_url();?>common/css/landing-page.css" rel='stylesheet'>

    <link href="<?php echo base_url();?>common/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <link type="text/css" href="<?php echo base_url();?>common/css/custom.css" rel='stylesheet'>

    <script src="<?php echo base_url();?>common/js/jquery-2.1.1.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>common/js/bootstrap/bootstrap.min.js"></script>
</head>
<body <?php if(isset($onload)){echo "onload=$onload";}?>>

	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
	        <div class="container topnav">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand topnav" href="<?php echo base_url('welcome/index');?>">
	                	Pocket Menu
	                </a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
	                    <li>
	                        <a href="<?php echo base_url('welcome/index');?>">Home</a>
	                    </li>
	                    <li class="active">
	                        <a href="<?php echo base_url('user/login');?>">Login</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
    </div>

	<div class="intro-header"  style="padding-top: 100px">			
        <div class="form">
            <form role="form" id="signin-form" accept-charset="utf-8" method="post" action="<?php echo base_url('/user/login') ?>">
                <h1>Login</h1>
                <!--div class="form-group clearfix ">
                	<input id="email" class="form-control" type="email" placeholder="Email" value="" name="email">
                </div-->
                
                <div class="form-group clearfix ">
                    <input id="name" class="form-control" type="text" placeholder="Username" value="" name="name">
                </div>

                <div class="form-group clearfix ">
                    <!-- <label class="sr-only" for="password">Password</label> -->
                    <input id="password" class="form-control" type="password" placeholder="Password" value="" name="password">
                </div>

                <div class="forgot">
                    <a class="forgot" href="<?php echo base_url('/user/forgot') ?>">Forgot password?</a>
                </div>

                <div class="form-group clearfix">
                    <div class="col-lg-12">
                        <button class="btn btn-success" type="submit">Sign In</button>
                    </div>
                </div>
            </form>
            <!--p class="already">Don't have an account?<a href="<?php echo base_url('/user/signup') ?>"><strog>Sign up</strog></a></p-->
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>