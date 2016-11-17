<?php $user = $this->session->userdata('userdata'); ?>
<?php $user = $this->Users_model->get($user->id); ?>
<div class="right_col">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>All Jobs <small>Users</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a>
								</li>
								<li><a href="#">Settings 2</a>
								</li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-fixed-header" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><input type="checkbox" id="check-all" class="flat"></th>
								<th>Job number</th>
								<th>Device Type</th>
								<th>Status</th>
								<th>Posted By</th>
								<th>Posted On</th>
								<th style="width: 115px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1051</td>
								<td>NAS Array</td>
								<td>Waiting to arrive at Auckland office.</td>
								<td>Syndy Summerfield</td>
								<td>15th Nov, 2016 @ 5:00pm</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1050</td>
								<td>Hard Disk Drive</td>
								<td>Working on the recovery process.</td>
								<td>Jessica</td>
								<td>15th Nov, 2016 @ 4:44pm</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1049</td>
								<td>Hard Disk Drive</td>
								<td>Completed</td>
								<td>Mike Williams</td>
								<td>14th Nov, 2016 @ 12:35pm</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1048</td>
								<td>Mobile/Tablet</td>
								<td>Completed</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1047</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1046</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1045</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1044</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1043</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1042</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1041</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1040</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1039</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td class="a-center"><input type="checkbox" class="flat" name="table_records"></td>
								<td>A1038</td>
								<td>Hard Disk Drive</td>
								<td>Submitted job. Waiting to arrive at Auckland office.</td>
								<td>Dan Williams</td>
								<td>16th Nov, 2016</td>
								<td>
									<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-external-link"></i></a>
									<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>