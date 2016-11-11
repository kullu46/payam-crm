<?php $user = $this->session->userdata('userdata'); ?>
<?php $user = $this->Users_model->get($user->id); ?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="index.html" class="site_title"><i class="fa fa-floppy-o"></i> <span>Payam Data Recovery</span></a>
		</div>
		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="<?php echo !empty($user->profile_img) ? $user->profile_img : base_url().'assets/images/img.jpg'; ?>" alt="<?php echo $user->firstname.' '.$user->lastname; ?>" class="img-circle profile_img" height="60">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php echo $user->firstname.' '.$user->lastname; ?></h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
		<br />
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>&nbsp;</h3>
				<ul class="nav side-menu">
					<li>
						<a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Dashboard</a>
					</li>
					<li>
						<a><i class="fa fa-tasks"></i> Jobs Tracking <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="javascript:void(0);">Auckland</a>
								<ul class="nav child_menu">
									<li><a href="#">Add new</a></li>
									<li><a href="#">All jobs</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);">Sydney</a>
								<ul class="nav child_menu">
									<li><a href="#">Add new</a></li>
									<li><a href="#">All jobs</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-hdd-o"></i> Hard Drive Inventory<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="javascript:void(0);">New Zealand Office</a>
								<ul class="nav child_menu">
									<li><a href="#">Add new</a></li>
									<li><a href="#">View inventory</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);">Sydney Office</a>
								<ul class="nav child_menu">
									<li><a href="#">Add new</a></li>
									<li><a href="#">View inventory</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-shield"></i> Partnership Program<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="javascript:void(0);">Add new partner</a>
							</li>
							<li>
								<a href="javascript:void(0);">View all partners</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>