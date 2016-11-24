<?php 
$user = $this->session->userdata('userdata');
$user = $this->Users_model->get($user->id);
$paymentOptionsHtml = 'Not available.';
$additionalInfoHtml = '<div class="panel-body">
			<div class="row">
				<label>How did you hear about us?</label>
				<select name="customer_meta[way_of_knowing]" class="form-control">
					<option value="">Select one</option>
					<option value="Apple">Apple</option>
					<option value="Banner ad online">Banner ad online</option>
					<option value="Bing search engine">Bing search engine</option>
					<option value="Computer magazine ad">Computer magazine ad</option>
					<option value="Email marketing">Email marketing</option>
					<option value="Facebook">Facebook</option>
					<option value="Flyer in the mail">Flyer in the mail</option>
					<option value="Google Search">Google Search</option>
					<option value="I\'m a previous customer">I\'m a previous customer</option>
					<option value="LinkedIn">LinkedIn</option>
					<option value="Radio Ad">Radio Ad</option>
					<option value="Referred by a friend">Referred by a friend</option>
					<option value="Referred by a computer shop">Referred by a computer shop</option>
					<option value="Referred by an IT Professional">Referred by an IT Professional</option>
					<option value="Seagate">Seagate</option>
					<option value="Toshiba">Toshiba</option>
					<option value="Trade Me">Trade Me</option>
					<option value="Twitter">Twitter</option>
					<option value="Western Digital">Western Digital</option>
				</select>
			</div>
			<div class="row">
				<label>Comments/Notes</label>
				<textarea rows="4" name="job[comments]" class="form-control"></textarea>
			</div>
		</div>';
switch($deviceType):
	case 'hdd':
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="660.00"/>
			</div>';
		break;
	case 'raid':
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="0"/>
			</div>';
		break;
	case 'ssd':
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="660.00"/>
			</div>';
		break;
	case 'mobile':
		$additionalInfoHtml = '<div class="panel-body">
					<div class="row">
						<label>Brand & Model # of Mobile Phone <span class="required">*</span></label>
						<input name="job_meta[device_model]" class="form-control" value="" required="required"/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Operating System and Version (if known)</label>
						<input name="job_meta[device_os]" class="form-control" value=""/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>PIN/Passcode <span class="required">*</span></label>
						<input name="job_meta[device_pin]" class="form-control" value="" required="required"/>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Has Ownership? <span class="required">*</span></label>
						<input type="radio" name="job_meta[is_device_owner]" value="1" required="required"/>&nbsp;Yes
						<input type="radio" name="job_meta[is_device_owner]" value="0" required="required"/>&nbsp;No
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Additional delivery address</label>
						<textarea rows="2" name="job_meta[additional_delivery_address]" class="form-control"></textarea>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>How did you hear about us?</label>
						<select name="customer_meta[way_of_knowing]" class="form-control">
							<option value="">Select one</option>
							<option value="Apple">Apple</option>
							<option value="Banner ad online">Banner ad online</option>
							<option value="Bing search engine">Bing search engine</option>
							<option value="Computer magazine ad">Computer magazine ad</option>
							<option value="Email marketing">Email marketing</option>
							<option value="Facebook">Facebook</option>
							<option value="Flyer in the mail">Flyer in the mail</option>
							<option value="Google Search">Google Search</option>
							<option value="I\'m a previous customer">I\'m a previous customer</option>
							<option value="LinkedIn">LinkedIn</option>
							<option value="Radio Ad">Radio Ad</option>
							<option value="Referred by a friend">Referred by a friend</option>
							<option value="Referred by a computer shop">Referred by a computer shop</option>
							<option value="Referred by an IT Professional">Referred by an IT Professional</option>
							<option value="Seagate">Seagate</option>
							<option value="Toshiba">Toshiba</option>
							<option value="Trade Me">Trade Me</option>
							<option value="Twitter">Twitter</option>
							<option value="Western Digital">Western Digital</option>
						</select>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<label>Comments/Notes</label>
						<textarea rows="4" name="job[comments]" class="form-control"></textarea>
					</div>
				</div>';
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="500.00"/>
			</div>';
		break;
	case 'memory-card':
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="0"/>
			</div>';
		break;
	case 'usb':
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
					<div class="col-sm-9">
						<select name="payment[status]" class="form-control">
							<option value="pending">Pending</option>
							<option value="partially_paid">Partially Paid</option>
							<option value="completed">Completed</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="payment[total]" value="0"/>
			</div>';
		break;
	default:
		break;
endswitch;
?>
<div class="right_col">
	<?php echo form_open("jobs/create/{$location}/{$deviceType}", array('class' => 'form-horizontal form-label-left input_mask')); ?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="to-fixed">
					<div class="x_title">
						<h3 class="pull-left">Submit a <?php echo $deviceTypeLabel; ?> to <?php echo ucwords($location); ?> database</h3>
						<div class="pull-right">
							<input type="hidden" name="job[device_type]" value="<?php echo $deviceType; ?>"/>
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
									<h4 class="panel-title">Create New</h4>
								</a>
								<div id="content-create-customer" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-create-customer">
									<div class="new-customer-form panel-body">
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[firstname]" class="form-control has-feedback-left" placeholder="First Name *" required="required">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[lastname]" class="form-control has-feedback-left" placeholder="Last Name *" required="required">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[company]" class="form-control has-feedback-left" placeholder="Company Name *" required="required">
											<span class="fa fa-briefcase form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[phone]" class="intl-num-input form-control has-feedback-left" placeholder="Phone number (mobile # preferred) *" required="required">
											<input type="hidden" name="customer[country]">
											<input type="hidden" name="customer_meta[country_code]">
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[email]" class="form-control has-feedback-left" placeholder="Email address *" required="required">
											<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[street]" class="form-control has-feedback-left" placeholder="Street address *" required="required">
											<span class="fa fa-street-view form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[city]" class="form-control has-feedback-left" placeholder="City *" required="required">
											<span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group has-feedback">
											<input type="text" name="customer[postcode]" class="form-control has-feedback-left" placeholder="Postcode *" required="required">
											<span class="fa fa-search form-control-feedback left" aria-hidden="true"></span>
										</div>
										<div class="col-xs-12 form-group">
											<input type="text" name="customer[partner_id]" class="form-control has-feedback-left" placeholder="Enter Partner ID if available">
											<span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="panel">
								<a class="panel-heading collapsed" role="tab" id="heading-existing-customer" data-toggle="collapse" data-parent="#accordion" href="#content-existing-customer" aria-expanded="false" aria-controls="content-existing-customer">
									<h4 class="panel-title">Existing customer</h4>
								</a>
								<div id="content-existing-customer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-existing-customer">
									<div class="panel-body">
										<input type="text" class="form-control pull-left autocomplete-customers in-edit" placeholder="Type customer name, username or email address...">
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
								<textarea rows="5" name="job[problem_description]" class="form-control" required="required"></textarea>
							</div>
							<div class="row">
								<label>Critical files *</label>
								<textarea rows="5" name="job[important_files]" class="form-control" required="required"></textarea>
							</div>
							<div class="row">
								<label>Attempts made *</label>
								<textarea rows="5" name="job[attempts_made]" class="form-control" required="required"></textarea>
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