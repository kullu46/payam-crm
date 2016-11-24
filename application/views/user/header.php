<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?php echo (isset($pageTitle) && !empty($pageTitle)) ? $pageTitle.' - Administration | Payam Data Recovery': 'Administration | Payam Data Recovery'; ?></title>
		<link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/red.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets/css/intlInput.css" rel="stylesheet">
		<link type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css" media="screen" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
	</head>
	<body class="nav-md">
		<input type="hidden" id="base-url" value="<?php echo base_url(); ?>"/>
		<div class="inline-alerts">
			<?php $flashdataError = $this->session->flashdata('error'); ?>
			<?php if(!empty($flashdataError)): ?>
				<div class="alert alert-danger">
					<i class="fa fa-exclamation-triangle">&nbsp;</i>
					<?php echo $flashdataError; ?>
				</div>
			<?php endif; ?>
			<?php $flashdataSuccess = $this->session->flashdata('success'); ?>
			<?php if(!empty($flashdataSuccess)): ?>
				<div class="alert alert-success">
					<i class="fa fa-check">&nbsp;</i>
					<?php echo $flashdataSuccess; ?>
				</div>
			<?php endif; ?>
			<?php $flashdataSuccess = $this->session->flashdata('warning'); ?>
			<?php if(!empty($flashdataSuccess)): ?>
				<div class="alert alert-warning">
					<i class="fa fa-check">&nbsp;</i>
					<?php echo $flashdataSuccess; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="ajax-loader-full">
			<img src="<?php echo site_url('assets/images/ajax-loader.gif'); ?>">
		</div>
		<div class="container body">
			<div class="main_container">
				<?php include('sidebar.php'); ?>
				<div class="top_nav">
					<div class="nav_menu">
						<nav class="" role="navigation">
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>
							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<img src="<?php echo !empty($user->profile_img) ? $user->profile_img : userPlaceholderUrl(); ?>" alt=""><?php echo $user->firstname.' '.$user->lastname; ?>
										<span class=" fa fa-angle-down"></span>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li><a href="javascript:;"> Profile</a></li>
										<li>
											<a href="javascript:;">
											<span class="badge bg-red pull-right">50%</span>
											<span>Settings</span>
											</a>
										</li>
										<li><a href="javascript:;">Help</a></li>
										<li><a href="<?php echo site_url('/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									</ul>
								</li>
								<li role="presentation" class="dropdown">
									<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
										<i class="fa fa-envelope-o"></i>
										<!--span class="badge bg-green">0</span-->
									</a>
									<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<li>
											<a>
											<span class="image"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="Profile Image" /></span>
											<span>
											<span>John Smith</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
											Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
											</a>
										</li>
										<li>
											<a>
											<span class="image"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="Profile Image" /></span>
											<span>
											<span>John Smith</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
											Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
											</a>
										</li>
										<li>
											<a>
											<span class="image"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="Profile Image" /></span>
											<span>
											<span>John Smith</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
											Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
											</a>
										</li>
										<li>
											<a>
											<span class="image"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="Profile Image" /></span>
											<span>
											<span>John Smith</span>
											<span class="time">3 mins ago</span>
											</span>
											<span class="message">
											Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
											</a>
										</li>
										<li>
											<div class="text-center">
												<a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
												</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>