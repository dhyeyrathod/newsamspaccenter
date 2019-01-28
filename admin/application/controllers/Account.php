<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Account extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
	}
	public function login()
	{
		if ($this->session->userdata('admin_id')) : redirect('home') ; endif ;
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));
			if ($this->form_validation->run('login') && $this->admin->loginAuthentication($email,$password)) {
				$response = $this->admin->adminSessionDataGet($email,$password);
				$userdata['admin_id'] = $response->id ; $userdata['admin_name'] = $response->username ;
				$userdata['admin_email'] = $response->email_id ;$userdata['contact_number'] = $response->contact_number ;
				$this->session->set_userdata($userdata);redirect('home');
			} else {
				$data['login_erro'] = "username and password is incorrect";
			}
		}
		$data['test'] = "";
		$this->load->view('login_view',$data);
	}
	public function sign_out()
	{
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_email');
		$this->session->unset_userdata('contact_number');
		redirect('account/login');
	}

}