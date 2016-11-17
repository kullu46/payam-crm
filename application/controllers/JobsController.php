<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobsController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Users_model', 'Jobs_model'));
		authenticateUser();
	}
	public function index(){
		authenticateUser();
		$this->load->view('user/header');
		$this->load->view('user/all-jobs');
		$this->load->view('user/footer');
	}
}
