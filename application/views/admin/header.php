<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/custom.css?=kljk">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">

			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span>
			</a>

			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../../../assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->userdata['logged_in']['user_login']?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo site_url('admin/user/change_password/').$this->session->userdata['logged_in']['id']?>" class="btn btn-default btn-flat">Change Password</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo site_url('login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>

			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			
				
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file-text-o"></i> <span>Post</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo site_url('admin/post/all_post')?>"><i class="fa fa-circle-o"></i> All Post</a></li>
							<li><a href="<?php echo site_url('admin/post')?>"><i class="fa fa-circle-o"></i> New Post</a></li>

						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file-image-o"></i> <span>Slider</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo site_url('admin/slider')?>"><i class="fa fa-circle-o"></i> All Slider</a></li>
							<li><a href="<?php echo site_url('admin/slider/new_slider')?>"><i class="fa fa-circle-o"></i> New Slider</a></li>

						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-user"></i> <span>Users</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo site_url('admin/user/all_user')?>"><i class="fa fa-circle-o"></i> All User</a></li>
							<li><a href="<?php echo site_url('admin/user/new_user')?>"><i class="fa fa-circle-o"></i> New User</a></li>

						</ul>
					</li>
				
					<li >
						<a href="<?php echo site_url('admin/settings')?>">
							<i class="fa  fa-gears "></i> <span>Settings</span>
							<span class="pull-right-container">
							
							</span>
						</a>
												
						
					</li>				
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
