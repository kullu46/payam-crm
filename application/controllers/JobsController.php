<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobsController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		authenticateUser();
	}
	
	public function index($location){
		authenticateUser();
		$data['location'] = $location;
		$data['pageTitle'] = 'All jobs in '.ucwords($location);
		$data['jobs'] = $this->Jobs_model->getAll($location);
		$this->load->view('user/header', $data);
		$this->load->view('user/all-jobs');
		$this->load->view('user/footer');
	}
	
	public function create($location, $deviceType){
		authenticateUser();
		$tax = $this->config->item("tax.{$location}");
		$deviceTypeLabel = 'job';
		switch($deviceType):
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
		$data['pageTitle'] = "Submit a {$deviceTypeLabel}";
		$data['location'] = $location;
		$data['deviceType'] = $deviceType;
		$data['deviceTypeLabel'] = $deviceTypeLabel;
		
		if($this->input->post('save')):
			if($this->input->post('existing-customer-id')):
				$customer = $this->Users_model->get($this->input->post('existing-customer-id'));
			else:
				$generatedPassword = rand(112233, 445566);
				$customerData = $this->input->post('customer');
				$formattedAddress = $customerData['street'].', '.$customerData['city'].' - '.$customerData['postcode'].', '.$customerData['country'];
				$customerArgs = array(
						'partner_id' => $customerData['partner_id'],
						'username' => generateUsername('email', $customerData['email']),
						'email' => $customerData['email'],
						'password' => md5($generatedPassword),
						'firstname' => addslashes($customerData['firstname']),
						'lastname' => addslashes($customerData['lastname']),
						'phone' => $customerData['phone'],
						'company' => addslashes($customerData['company']),
						'profile_img' => '',
						'street' => addslashes($customerData['street']),
						'city' => addslashes($customerData['city']),
						'postcode' => $customerData['postcode'],
						'country' => addslashes($customerData['country']),
						'role' => 'customer',
						'status' => 1,
					);
				$customer = $this->Users_model->add($customerArgs);
				$customer = $this->Users_model->get($customer);
				$customerMeta = $this->input->post('customer_meta');
				$customerMeta['formatted_address'] = $formattedAddress;
				if(count($customerMeta) > 0):
					foreach($customerMeta as $key => $value):
						$this->Users_model->updateUsermeta($customer->id, $key, addslashes($value));
					endforeach;
				endif;
			endif;
			$jobData = $this->input->post('job');
			$paymentData = $this->input->post('payment');
			$total = $paymentData['total'];
			$discount = 0;
			$inclTax = $paymentData['total'];
			$exclTax = $total - ($total * $tax/100);
			$jobArgs = array(
					'job_number' => generateJobNumber($location),
					'user_id' => $customer->id,
					'location' => $location,
					'device_type' => $deviceType,
					'problem_description' => addslashes($jobData['problem_description']),
					'important_files' => addslashes($jobData['important_files']),
					'attempts_made' => addslashes($jobData['attempts_made']),
					'service_type' => $paymentData['service_type'],
					'comments' => $jobData['comments'],
					'created' => time(),
					'status' => $jobData['status'],
				);
			$job = $this->Jobs_model->add($jobArgs);
			$job = $this->Jobs_model->get($job);
			$paymentArgs = array(
					'job_id' => $job->id,
					'incl_tax' => number_format($inclTax,2,'.',','),
					'excl_tax' => number_format($exclTax,2,'.',','),
					'discount' => number_format($discount,2,'.',','),
					'gst' => number_format(($total * $tax/100),2,'.',','),
					'total' => number_format($total,2,'.',','),
					'status' => $paymentData['status'],
				);
			$this->Payments_model->add($paymentArgs);
			
			$jobMeta = $this->input->post('job_meta');
			if(count($jobMeta) > 0):
				foreach($jobMeta as $key => $value):
					$this->Jobs_model->updateJobmeta($job->id, $key, addslashes($value));
				endforeach;
			endif;
			$this->session->set_flashdata('success', "New job has been posted successfully.");
			redirect("jobs/{$location}");
		endif;
		$this->load->view('user/header', $data);
		$this->load->view('user/add-new-job');
		$this->load->view('user/footer');
	}
	
	public function view($location = 'sydney', $jobId){
		$job = $this->Jobs_model->get($jobId);
		$customer = $this->Users_model->get($job->user_id);
		$jobNumberPrefix = 'N';
		if($location == 'auckland'):
			$jobNumberPrefix = 'A';
		endif;
		$data['customer'] = $customer;
		$data['location'] = $location;
		$data['payment'] = $this->Payments_model->getBy('job_id', $job->id);
		$data['job'] = $job;
		$data['pageTitle'] = "View Job: {$jobNumberPrefix}{$job->job_number}";
		$this->load->view('user/view-job', $data);
	}
	
	public function edit($location = 'sydney', $jobId){
		$tax = $this->config->item("tax.{$location}");
		$job = $this->Jobs_model->get($jobId);
		$customer = $this->Users_model->get($job->user_id);
		$payment = $this->Payments_model->getBy('job_id', $job->id);
		$jobNumberPrefix = 'N';
		if($location == 'auckland'):
			$jobNumberPrefix = 'A';
		endif;
		$deviceTypeLabel = 'job';
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
		$data['deviceTypeLabel'] = $deviceTypeLabel;
		$data['customer'] = $customer;
		$data['location'] = $location;
		$data['payment'] = $payment;
		$data['job'] = $job;
		$data['pageTitle'] = "Edit Job#: {$jobNumberPrefix}{$job->job_number}";
		
		if($this->input->post('save')):
			echo "<pre>";
			print_r($_POST);
			die;
			if($this->input->post('existing-customer-id')):
				$customer = $this->Users_model->get($this->input->post('existing-customer-id'));
			elseif($this->input->post('job-existing-customer-id')):
				$customer = $this->Users_model->get($this->input->post('job-existing-customer-id'));
				$customerMeta = $this->input->post('customer_meta');
				$customerMeta['formatted_address'] = $formattedAddress;
				if(count($customerMeta) > 0):
					foreach($customerMeta as $key => $value):
						$this->Users_model->updateUsermeta($customer->id, $key, addslashes($value));
					endforeach;
				endif;
			else:
				$this->session->set_flashdata('error', 'Unknown error encountered.');
				reditect("job/edit/{$job->id}");
			endif;
			$jobData = $this->input->post('job');
			$paymentData = $this->input->post('payment');
			$total = $paymentData['total'];
			$discount = $payment->discount;
			$inclTax = $paymentData['total'];
			$exclTax = $total - ($total * $tax/100);
			$jobArgs = array(
					'id' => $job->id,
					'user_id' => $customer->id,
					'problem_description' => addslashes($jobData['problem_description']),
					'important_files' => addslashes($jobData['important_files']),
					'attempts_made' => addslashes($jobData['attempts_made']),
					'service_type' => $paymentData['service_type'],
					'comments' => $jobData['comments'],
					'created' => time(),
					'status' => $jobData['status'],
				);
			$job = $this->Jobs_model->add($jobArgs);
			$job = $this->Jobs_model->get($job);
			$paymentArgs = array(
					'job_id' => $job->id,
					'incl_tax' => number_format($inclTax,2,'.',','),
					'excl_tax' => number_format($exclTax,2,'.',','),
					'discount' => number_format($discount,2,'.',','),
					'gst' => number_format(($total * $tax/100),2,'.',','),
					'total' => number_format($total,2,'.',','),
					'status' => $paymentData['status'],
				);
			$this->Payments_model->add($paymentArgs);
			
			$jobMeta = $this->input->post('job_meta');
			if(count($jobMeta) > 0):
				foreach($jobMeta as $key => $value):
					$this->Jobs_model->updateJobmeta($job->id, $key, addslashes($value));
				endforeach;
			endif;
			$this->session->set_flashdata('success', "New job has been posted successfully.");
			redirect("jobs/{$location}");
		endif;
		
		$this->load->view('user/header', $data);
		$this->load->view('user/edit-job');
		$this->load->view('user/footer');
		
	}
	
	public function remove($location, $jobId){
		if(empty($jobId)){
			$this->session->set_flashdata('error', 'Unknown error ocurred.');
			redirect("jobs/{$location}");
		}
		$this->Jobs_model->remove($jobId);
		$this->session->set_flashdata('warning', 'Job has been removed successfully.');
		redirect("jobs/{$location}");
	}
}
