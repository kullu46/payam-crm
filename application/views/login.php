<div class="login">
	<a class="hiddenanchor" id="signup"></a>
	<a class="hiddenanchor" id="signin"></a>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<?php echo form_open('login'); ?>
					<img src="<?php echo base_url(); ?>assets/images/logo.jpg">
					<div class="clear">&nbsp;</div>
					<div class="clear">&nbsp;</div>
					<div>
						<input name="admin-email" type="email" class="form-control" placeholder="Email address" autocomplete="off" value="<?php echo $this->input->post('admin-email'); ?>" required/>
					</div>
					<div>
						<input name="admin-password" type="password" class="form-control" placeholder="Password" autocomplete="off" required/>
					</div>
					<div class="pull-left">
						<a class="reset_pass" href="#">Lost your password?</a>
					</div>
					<div class="pull-right">
						<input type="submit" name="login" class="btn btn-red submit" value="Log in"/>
					</div>
					<div class="clearfix"></div>
					<div class="separator">
						<!--p class="change_link">
							<a href="#signup" class="to_register"> Create Account </a>
						</p-->
						<div class="clearfix"></div>
						<br />
						<div>
							<p>Payam Data Recovery | © <?php echo date('Y'); ?> All Rights Reserved.</p>
						</div>
					</div>
				<?php echo form_close(); ?>
			</section>
		</div>
	</div>
</div>