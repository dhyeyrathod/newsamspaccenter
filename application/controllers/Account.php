<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay rathod/
*/
class Account extends MY_Controller
{
	public function __construct()
	{	
		parent::__construct();
		$this->load->model('website');
	}
	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('email', 'Email Id', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()) {
				if ($this->website->UserAuthentication($this->input->post()) == 1) {
					$getUserData = $this->website->getSingleUserDataByEmail($this->input->post('email'));
					$setSessionData['username']=$getUserData->username;$setSessionData['email']=$getUserData->email ;
					$setSessionData['contact_number']=$getUserData->contact_number;$setSessionData['user_id']=$getUserData->id;
					$this->session->set_userdata($setSessionData);
					$this->session->set_flashdata('success','Login Successfully..!!');redirect('members/dashboard');
				} else {
					$this->session->set_flashdata('error','Email and password is invalid');
					redirect('account/login');
				}
			} 
		}
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$this->load->view('login_view',$data);
	}
	public function registration()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			if ($this->form_validation->run('signup')) {
				if ($this->website->setMembers($this->input->post())) {
					$this->session->set_flashdata('success','Registration Successfully...!! Plese login.');
					redirect('account/login');
				} else {
					$this->session->set_flashdata('error','Registration Successfully...!! Plese login.');
					redirect('account/registration');
				}
			}
		}
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$this->load->view('registration_view',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');$this->session->unset_userdata('email');
		$this->session->unset_userdata('contact_number');$this->session->unset_userdata('user_id');
		$this->session->set_flashdata('success','Thank You for visit. if you have any query plese contact us.');redirect('account/login');
	}
}