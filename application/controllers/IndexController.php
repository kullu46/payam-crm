<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Users_model'));
		authenticateUser();
	}
	public function index(){
		authenticateUser();
		$this->load->view('user/header');
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}
	public function dashboard(){
		$this->load->view('user/header');
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}
	public function login(){
		$login = $this->input->post('login');
		if(isset($login)):
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			$email = $this->input->post('admin-email');
			$password = $this->input->post('admin-password');
			$domains = array('payam.com.au', 'payam.co.nz', 'gmail.com');
			$emailDomain = explode('@', $email);
			$emailDomain = $emailDomain[1];
			if(empty($email)):
				$this->session->set_flashdata('error', 'Please input your email address.');
				redirect('login?next='.urlencode(base_url()));
			elseif(empty($password)):
				$this->session->set_flashdata('error', 'Please input your password.');
				redirect('login?next='.urlencode(base_url()));
			elseif(!preg_match($regex, $email) || !in_array($emailDomain, $domains)):
				$this->session->set_flashdata('error', 'Please enter a valid email address.');
				redirect('login?next='.urlencode(base_url()));
			else:
				$userdata = array(
						'email' => $email,
						'password' => $password,
					);
				$loggedIn = $this->Users_model->login($userdata);
				if($loggedIn > 0){
					$userdata = $this->Users_model->get($loggedIn);
					$this->session->set_userdata('userdata', $userdata);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', 'Email/password didn\'t matched.');
					redirect('login?next='.urlencode(base_url()));
				}
			endif;
		else:
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		endif;
	}
	
	public function logout(){
		$this->session->unset_userdata('userdata');
		if(isset($_SERVER['SERVER_SOFTWARE']) && (strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false || strpos($_SERVER['SERVER_SOFTWARE'],'Development') !== false)) {
			$redirectUrl = urlencode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		} else {
			$redirectUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		}
		redirect("login?next={$redirectUrl}");
	}
	
	public function displayPHPinfo(){
		phpinfo();
	}
}
