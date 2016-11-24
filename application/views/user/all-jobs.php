<?php $user = $this->session->userdata('userdata'); ?>
<?php $user = $this->Users_model->get($user->id); ?>
<div class="right_col">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>All Jobs <small style="margin: 0px;">(<?php echo ucwords($location); ?>)</small></h2>
					<!--div class="col-sm-2 pull-right">
						<button type="button" class="btn btn-default dropdown-toggle btn-red" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-plus-o">&nbsp;</i>Add new<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/hdd"); ?>">HDD</a>
							</li>
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/raid"); ?>">RAID</a>
							</li>
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/ssd"); ?>">SSD</a>
							</li>
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/mobile"); ?>">Mobile</a>
							</li>
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/memory-card"); ?>">Memory Card</a>
							</li>
							<li>
								<a href="<?php echo site_url("jobs/create/{$location}/usb"); ?>">USB Drive</a>
							</li>
						</ul>
					</div-->
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php if(count($jobs) > 0): ?>
						<table class="table table-striped table-bordered datatable">
							<thead>
								<tr>
									<th><input type="checkbox" id="check-all" class="flat"></th>
									<th>Job number</th>
									<th>Device Type</th>
									<th>Status</th>
									<th>Posted By</th>
									<th>Posted On</th>
									<th style="width: 108px;">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $j=0;foreach($jobs as $job):$j++; ?>
									<tr>
										<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
										<td>
											<?php echo ($job->location == 'auckland') ? 'A'.$job->job_number : 'N'.$job->job_number; ?>
										</td>
										<td>
											<?php 
											$deviceTypeLabel = 'N/A';
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
													$deviceTypeLabel = 'Moble/Tablet';
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
											echo $deviceTypeLabel;
											?>
										</td>
										<td><?php echo $job->status; ?></td>
										<td>
											<?php 
											$customer = $this->Users_model->get($job->user_id);
											echo $customer->firstname.' '.$customer->lastname;
											?>
										</td>
										<td><?php echo date('F j, Y @ h:ia', $job->created); ?></td>
										<td>
											<a href="<?php echo site_url("jobs/view/{$location}/{$job->id}"); ?>" class="btn btn-warning btn-xs fancybox fancybox.ajax"><i class="fa fa-external-link"></i></a>
											<a href="<?php echo site_url("jobs/edit/{$location}/{$job->id}"); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
											<a href="<?php echo site_url("jobs/remove/{$location}/{$job->id}"); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<?php else: ?>
						<div class="col-sm-12">
							<div class="alert alert-warning">
								<i class="fa fa-exclamation-triangle">&nbsp;</i>
								No records found in database for selected location.
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>