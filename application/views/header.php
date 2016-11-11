<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login to administration panel | Payam Data Recovery</title>
		<link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
	</head>
	<body class="login">
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
		</div>