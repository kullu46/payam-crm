<?php 
$tax = $this->config->item("tax.{$location}");
$wayOfKnowing = $this->Jobs_model->getJobmeta($job->id, 'way_of_knowing', true);
$wayOfKnowing = !empty($wayOfKnowing) ? $wayOfKnowing : 'N/A';
$gstAmount = $payment->total * $tax/100;
$deviceTypeLabel = 'N/A';
$jobMetaHtml = '<div class="row"><table class="table table-responsive">';

switch($job->device_type):
	case 'hdd':
		$deviceTypeLabel = 'Hard Disk Drive';
		
		break;
	case 'raid':
		$deviceTypeLabel = 'RAID/NAS Array';
		break;
	case 'ssd':
		$deviceTypeLabel = 'Solid State Drive';
		break;
	case 'mobile':
		$deviceTypeLabel = 'Mobile/Tablet';
		$additionalDeliveryAddress = $this->Jobs_model->getJobmeta($job->id, 'additional_delivery_address', true);
		$additionalDeliveryAddress = !empty($additionalDeliveryAddress) ? $additionalDeliveryAddress : 'N/A';
		$isOwner = $this->Jobs_model->getJobmeta($job->id, 'is_device_owner', true);
		$isOwner = !empty($isOwner) ? $isOwner : 'N/A';
		$deviceOs = $this->Jobs_model->getJobmeta($job->id, 'device_os', true);
		$deviceOs = !empty($deviceOs) ? $deviceOs : 'N/A';
		
		$jobMetaHtml .= '<tr>
				<th class="text-right">Brand & Model # of Mobile Phone:</th>
				<td>'.$this->Jobs_model->getJobmeta($job->id, 'device_model', true).'</td>
			</tr>
			<tr>
				<th class="text-right">Operating System and Version (if known):</th>
				<td>'.$deviceOs.'</td>
			</tr>
			<tr>
				<th class="text-right">PIN/Passcode:</th>
				<td>'.$this->Jobs_model->getJobmeta($job->id, 'device_pin', true).'</td>
			</tr>
			<tr>
				<th class="text-right">Has Ownership?:</th>
				<td>'.$isOwner.'</td>
			</tr>
			<tr>
				<th class="text-right">Additional delivery address:</th>
				<td>'.$additionalDeliveryAddress.'</td>
			</tr>';
		break;
	case 'memory-card':
		$deviceTypeLabel = 'Memory Card';
		break;
	case 'usb':
		$deviceTypeLabel = 'USB Flash Drive';
		break;
	default:
		break;
endswitch;
$jobMetaHtml .= '<tr>
				<th class="text-right">Way of knowing:</th>
				<td>'.$wayOfKnowing.'</td>
			</tr>
			<tr>
				<th class="text-right">Comments:</th>
				<td>'.$job->comments.'</td>
			</tr>';

$jobMetaHtml .= '</table></div>';
$jobNumberPrefix = 'N';
if($location == 'auckland'):
	$jobNumberPrefix = 'A';
endif;
?>
<div class="right_col">
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<div class="to-fixed">
				<div class="x_title">
					<h3 class="pull-left">Job# <?php echo $jobNumberPrefix.$job->job_number; ?></h3>
					<div class="pull-right">
						<a href="<?php echo site_url("jobs/edit/{$location}/{$job->id}"); ?>" class="btn btn-warning">Edit</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-xs-12 customer-details">
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-red fa-user">&nbsp;</i>Customer details</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-responsive">
						<tr>
							<td class="col-xs-4 text-right">
								<img src="<?php echo !empty($customer->profile_img) ? $customer->profile_img : userPlaceholderUrl(); ?>" class="img-circle profile_img" style="max-width: 80px;">
							</td>
							<td class="col-xs-8" style="vertical-align: middle;">
								<h2><?php echo $customer->firstname.' '.$customer->lastname; ?></h2>
								&nbsp;<?php echo $customer->company; ?>
							</td>
						</tr>
						<tr>
							<td class="col-xs-4 text-right">
								<strong>Email:</strong>
							</td>
							<td class="col-xs-8"><?php echo $customer->email; ?></td>
						</tr>
						<tr>
							<td class="col-xs-4 text-right">
								<strong>Phone:</strong>
							</td>
							<td class="col-xs-8"><?php echo $customer->phone; ?></td>
						</tr>
						<tr>
							<td class="col-xs-4 text-right">
								<strong>Address:</strong>
							</td>
							<td class="col-xs-8"><?php echo $this->Users_model->getUsermeta($customer->id, 'formatted_address', true); ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-red fa-credit-card">&nbsp;</i>Payment details</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="option-payment">
						<table class="table table-responsive">
							<tr>
								<th class="text-right">Service Type:</th>
								<td><?php echo $job->service_type; ?></td>
							</tr>
							<?php if($payment->total > 0): ?>
								<tr>
									<th class="text-right">GST Paid:</th>
									<td><?php echo getCurrencySymbol().number_format($gstAmount, 2, '.', ','); ?></td>
								</tr>
								<tr>
									<th class="text-right">Excl. Tax:</th>
									<td><?php echo getCurrencySymbol().number_format($payment->excl_tax, 2, '.', ','); ?></td>
								</tr>
							<?php endif; ?>
							<tr>
								<th class="text-right">Total Amount Paid:</th>
								<td><?php echo getCurrencySymbol().number_format($payment->total, 2, '.', ','); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-xs-12 data-recovery-details">
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-red fa-floppy-o">&nbsp;</i>Data recovery details</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="panel-body">
						<div class="row">
							<label>Device Type</label>
							<p><?php echo $deviceTypeLabel; ?></p>
						</div>
						<div class="row">
							<label>Problem description</label>
							<p><?php echo stripslashes($job->problem_description); ?></p>
						</div>
						<div class="row">
							<label>Critical files</label>
							<p><?php echo stripslashes($job->important_files); ?></p>
						</div>
						<div class="row">
							<label>Attempts made</label>
							<p><?php echo stripslashes($job->attempts_made); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="col-sm-6 col-xs-12 additional-information">
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-red fa-pencil-square-o">&nbsp;</i>Additional Information</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php echo $jobMetaHtml; ?>
				</div>
			</div>
		</div>
	</div>
</div>