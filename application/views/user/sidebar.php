<?php $user = $this->session->userdata('userdata'); ?>
<?php $user = $this->Users_model->get($user->id); ?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="index.html" class="site_title">
				<img src="<?php echo site_url('assets/images/payam-logo-admin.png'); ?>" style="width: 200px;">
				<span>Payam Data Recovery</span>
			</a>
		</div>
		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile">
			<div class="profile_pic">
				<img src="<?php echo !empty($user->profile_img) ? $user->profile_img : userPlaceholderUrl(); ?>" alt="<?php echo $user->firstname.' '.$user->lastname; ?>" class="img-circle profile_img" height="60">
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
								<a href="javascript:void(0);">Auckland <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li>
										<a href="javascript:void(0);">Add new <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/hdd'); ?>">HDD</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/raid'); ?>">RAID</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/ssd'); ?>">SSD</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/mobile'); ?>">Mobile</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/memory-card'); ?>">Memory Card</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/auckland/usb'); ?>">USB Drive</a>
											</li>
										</ul>
									</li>
									<li><a href="<?php echo site_url('jobs/auckland'); ?>">All jobs</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);">Sydney <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li>
										<a href="javascript:void(0);">Add new <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/hdd'); ?>">HDD</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/raid'); ?>">RAID</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/ssd'); ?>">SSD</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/mobile'); ?>">Mobile</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/memory-card'); ?>">Memory Card</a>
											</li>
											<li>
												<a href="<?php echo site_url('jobs/create/sydney/usb'); ?>">USB Drive</a>
											</li>
										</ul>
									</li>
									<li><a href="<?php echo site_url('jobs/sydney'); ?>">All jobs</a></li>
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
			<div class="menu_section">
				<h3>Extras</h3>
				<ul class="nav side-menu">
					<li>
						<a><i class="fa fa-group"></i> Users<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="javascript:void(0);">Add new</a>
							</li>
							<li>
								<a href="javascript:void(0);">View all</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-clock-o"></i> Activities</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>