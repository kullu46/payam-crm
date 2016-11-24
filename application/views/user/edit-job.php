<?php 
$user = $this->session->userdata('userdata');
$user = $this->Users_model->get($user->id);
$paymentOptionsHtml = 'Not available.';
$additionalInfoHtml = '';
$customerMeta = $this->Users_model->getUsermeta($customer->id);
switch($job->device_type):
	case 'hdd':
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="660.00" value="$660 inc GST Premium Service (Not Urgent)" required checked/>
						$660 inc GST Premium Service (Not Urgent)
					</h4>
				</div>
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="2500.00" value="$2500 Emergency Service (Urgent)" required/>
						$2500 Emergency Service (Urgent)
					</h4>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	case 'raid':
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="0" value="Free evaluation and quote within 24 hours on average" required checked/>
						Free evaluation and quote within 24 hours on average
					</h4>
				</div>
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="500.00" value="$500 Urgent Quote within 2-3 hours on average" required/>
						$500 Urgent Quote within 2-3 hours on average
					</h4>
				</div>				
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	case 'ssd':
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="660.00" value="$660 inc GST Premium Service" required checked/>
						$660 inc GST Premium Service
					</h4>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	case 'mobile':
		$deviceOwner = $this->Jobs_model->getJobmeta($job->id, 'is_device_owner', true); 
		$deviceOwnerFalse = ($deviceOwner == 0) ? ' checked' : ''; 
		$deviceOwnerTrue = ($deviceOwner == 1) ? ' checked' : ''; 
		$additionalInfoHtml = '<div class="panel-body">
					<div class="row">
						<label>Brand & Model # of Mobile Phone <span class="required">*</span></label>
						<input name="job_meta[device_model]" class="form-control" value="'.$this->Jobs_model->getJobmeta($job->id, 'device_model', true).'" required="required"/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Operating System and Version (if known)</label>
						<input name="job_meta[device_os]" class="form-control" value="'.$this->Jobs_model->getJobmeta($job->id, 'device_os', true).'"/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>PIN/Passcode <span class="required">*</span></label>
						<input name="job_meta[device_pin]" class="form-control" value="'.$this->Jobs_model->getJobmeta($job->id, 'device_pin', true).'" required="required"/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Has Ownership? <span class="required">*</span></label>
						<input type="radio" name="job_meta[is_device_owner]" value="1" required="required"'.$deviceOwnerTrue.'/>&nbsp;Yes
						<input type="radio" name="job_meta[is_device_owner]" value="0" required="required"'.$deviceOwnerFalse.'/>&nbsp;No
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Additional delivery address</label>
						<textarea rows="2" name="job_meta[additional_delivery_address]" class="form-control">'.$this->Jobs_model->getJobmeta($job->id, 'additional_delivery_address', true).'</textarea>
					</div>
				</div>';				
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="500.00" value="$500 inc GST Premium Service" required checked/>
						$500 inc GST Premium Service
					</h4>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	case 'memory-card':
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="0" value="Free evaluation and quote within 24 hours" required checked/>
						Free evaluation and quote within 24 hours
					</h4>
				</div>
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="150.00" value="Urgent evaluation and quote within 1-2 hours (on average)" required/>
						Urgent evaluation and quote within 1-2 hours (on average)
					</h4>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	case 'usb':
		$paymentStatusArray = $this->config->item('payment.status');
		$paymentStatusHtml = '<select name="payment[status]" class="form-control">';
		foreach($paymentStatusArray as $statusKey => $statusLabel):
			$selected = ($statusKey == $payment->status) ? ' selected="selected"' : '';
			$paymentStatusHtml .= '<option value="'.$statusKey.'"'.$selected.'>'.$statusLabel.'</option>';
		endforeach;
		$paymentStatusHtml .= '</select>';
		$paymentOptionsHtml = '<div class="option-payment">
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="0" value="Free evaluation and quote within 24 hours" required checked/>
						Free evaluation and quote within 24 hours
					</h4>
				</div>
				<div class="radio">
					<h4>
						<input type="radio" class="flat" name="payment[service_type]" data-price="150.00" value="Urgent evaluation and quote within 1-2 hours (on average)" required/>
						Urgent evaluation and quote within 1-2 hours (on average)
					</h4>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-3">
						<label>Status:</label>
					</div>
					<div class="col-sm-9">'.$paymentStatusHtml.'</div>
				</div>
				<input type="hidden" name="payment[total]" value="'.$payment->total.'"/>
			</div>';
		break;
	default:
		break;
endswitch;
$knowingOptions = $this->config->item('customer.wayofknowing');
$jobStatusArray = $this->config->item('job.status');
$wayOfKnowing = isset($customerMeta['way_of_knowing']) ? $customerMeta['way_of_knowing'] : array('N/A');
$additionalInfoHtml .= '<div class="panel-body">
			<div class="row">
				<label>Job Status</label>
				<select name="job[status]" class="form-control">';
foreach($jobStatusArray as $jobStatus):
	$selected = ($job->status == $jobStatus) ? ' selected="selected"' : '';
	$additionalInfoHtml .= '<option value="'.$jobStatus.'"'.$selected.'>'.$jobStatus.'</option>';
endforeach;
				
$additionalInfoHtml .= '</select></div>
			<div class="row">
				<label>How did you hear about us?</label>
				<select name="customer_meta[way_of_knowing]" class="form-control">
					<option value="">Select one</option>';
foreach($knowingOptions as $knowingOption):
	$selected = ($wayOfKnowing == $knowingOption) ? ' selected="selected"' : '';
	$additionalInfoHtml .= '<option value="'.$knowingOption.'"'.$selected.'>'.$knowingOption.'</option>';
endforeach;
$additionalInfoHtml .= '</select></div>
			<div class="row">
				<label>Comments/Notes</label>
				<textarea rows="4" name="job[comments]" class="form-control"></textarea>
			</div>
		</div>';
?>
<div class="right_col">
	<?php echo form_open("jobs/edit/{$location}/{$job->id}", array('class' => 'form-horizontal form-label-left input_mask')); ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="to-fixed">
					<div class="x_title">
						<h3 class="pull-left"><?php echo $pageTitle; ?></h3>
						<div class="pull-right">
							<input type="hidden" name="job[device_type]" value="<?php echo $job->device_type; ?>"/>
							<a href="<?php echo site_url("jobs/{$location}"); ?>" class="btn btn-warning">Cancel</a>
							<input type="submit" name="save" class="btn btn-success" value="Submit"/>
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
						<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel">
								<a class="panel-heading" role="tab" id="heading-create-customer" data-toggle="collapse" data-parent="#accordion" href="#content-create-customer" aria-expanded="true" aria-controls="content-create-customer">
									<h4 class="panel-title">
										Existing Customer
									</h4>
								</a>
								<div id="content-create-customer" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-create-customer">
									<div class="edit-customer-form panel-body">
										<input type="hidden" name="job-existing-customer-id" value="<?php echo $customer->id; ?>">
										<table class="table table-responsive">
											<tbody>
												<tr>
													<td class="col-xs-12 text-right" colspan="2" style="border-top: none;">
														<a class="bt btn-sm btn-red" href="<?php echo site_url("users/edit/{$customer->id}"); ?>">
															<i class="fa fa-pencil">&nbsp;</i>Edit User
														</a>
													</td>
												</tr>
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
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading collapsed" role="tab" id="heading-existing-customer" data-toggle="collapse" data-parent="#accordion" href="#content-existing-customer" aria-expanded="false" aria-controls="content-existing-customer">
									<h4 class="panel-title">Assign new customer</h4>
								</a>
								<div id="content-existing-customer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-existing-customer">
									<div class="panel-body">
										<input type="text" class="form-control pull-left autocomplete-customers" placeholder="Type customer name, username or email address...">
										<div class="response-customers"></div>								
									</div>
								</div>
							</div>
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
								<label>Problem description *</label>
								<textarea rows="5" name="job[problem_description]" class="form-control" required="required"><?php echo $job->problem_description; ?></textarea>
							</div>
							<div class="row">
								<label>Critical files *</label>
								<textarea rows="5" name="job[important_files]" class="form-control" required="required"><?php echo $job->important_files; ?></textarea>
							</div>
							<div class="row">
								<label>Attempts made *</label>
								<textarea rows="5" name="job[attempts_made]" class="form-control" required="required"><?php echo $job->attempts_made; ?></textarea>
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
						<?php echo $additionalInfoHtml; ?>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-xs-12 payment-details">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-red fa-credit-card">&nbsp;</i>Payment details</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?php echo $paymentOptionsHtml; ?>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>