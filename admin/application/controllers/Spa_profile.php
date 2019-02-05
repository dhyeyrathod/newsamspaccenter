<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Spa_profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) : redirect('account/login') ; endif ;
		$this->load->model('admin');
	}
	public function add_new()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$last_inserted_id = $this->admin->setSpaProfileDetails($this->input->post());
			if ($last_inserted_id && is_numeric($last_inserted_id) && $this->admin->checkSpaIdIsPresent($last_inserted_id)) {
				$this->admin->setSpaProfileLocationDetails($this->input->post(),$last_inserted_id);
				$this->admin->setSpaPaymenntInfo($this->input->post(),$last_inserted_id);
				if ($this->admin->setSpaProfileServicesCategoryDetails($this->input->post(),$last_inserted_id)) {
					for ($i = 0 ; $i < count($_FILES['image_to_upload']['name']) ; $i++ ) {
						$_FILES['file']['name']     	= $_FILES['image_to_upload']['name'][$i];
		                $_FILES['file']['type']     	= $_FILES['image_to_upload']['type'][$i];
		                $_FILES['file']['tmp_name'] 	= $_FILES['image_to_upload']['tmp_name'][$i];
		                $_FILES['file']['error']     	= $_FILES['image_to_upload']['error'][$i];
		                $_FILES['file']['size']     	= $_FILES['image_to_upload']['size'][$i];
		                $this->load->library('upload', $this->friend->profileImageUploadConfig());
		                if ($this->upload->do_upload('file')) {
		                	$this->admin->setSpaProfileImages($this->upload->data('file_name'),$last_inserted_id);	
		                } 
					}
					$this->session->set_flashdata('success_profile','profile create successfully...!');
		            redirect('spa_profile/add_new');
				} else {
					$this->session->set_flashdata('error_profile','Profile Is not created plese fill propar informaton');
		            redirect('spa_profile/add_new');
				}
			} else {
				$this->session->set_flashdata('error_profile','Profile Is not created plese fill propar informaton');
		        redirect('spa_profile/add_new');
			}
		}
		$data['all_country_key'] = $this->admin->getAllCountry();
		$data['all_category_key'] = $this->admin->getAllCategory();
		$data['all_services_key'] = $this->admin->getAllservices();
		$this->load->view('spa_profile_add_new_view',$data);
	}
	public function get_city()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$country_id = $this->security->xss_clean($this->input->post('country_id'));
			if ($country_id && is_numeric($country_id) && $this->admin->checkCityPresent($country_id)) {
				$respons = array('status' => 'success','message'=>'fetch data successfully','data'=>$this->admin->getAllCityByCountryId($country_id));
			} else {
				$respons = array('status'=>'failure','message'=>'City is not present');
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($respons));
		}
	}
	public function get_area()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$city_id = $this->security->xss_clean($this->input->post('city_id'));
			if ($city_id && is_numeric($city_id) && $this->admin->checkAreaPresent($city_id)) {
				$respons = array('status' => 'success','message'=>'fetch data successfully','data'=>$this->admin->getAllAreasByCityId($city_id));
			} else {
				$respons = array('status'=>'failure','message'=>'Area is not present');	
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($respons));
		}
	}
	public function profile_list()
	{
		$data['spa_list'] = $this->admin->getAllSpalist();
		$this->load->view('profile_list',$data);
	}
	public function edit_profile()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			for ($i = 0 ; $i < count($_FILES['image_to_upload']['name']) ; $i++ ) {
				$_FILES['file']['name']     	= $_FILES['image_to_upload']['name'][$i];
                $_FILES['file']['type']     	= $_FILES['image_to_upload']['type'][$i];
                $_FILES['file']['tmp_name'] 	= $_FILES['image_to_upload']['tmp_name'][$i];
                $_FILES['file']['error']     	= $_FILES['image_to_upload']['error'][$i];
                $_FILES['file']['size']     	= $_FILES['image_to_upload']['size'][$i];
                $this->load->library('upload', $this->friend->profileImageUploadConfig());
                if ($this->upload->do_upload('file')) {
                	$this->admin->setSpaProfileImages($this->upload->data('file_name'),$this->input->post('profile_id'));
                } 
			}
			$this->session->set_flashdata('success','Profile Image Update successfully');
            $url = base_url('spa_profile/edit_profile')."/".$this->input->post('profile_id');
                	redirect($url);
		}
		$profile_id = $this->uri->segment(3);
		$data['profile_data'] = $this->admin->getProfileInfoByID($profile_id);
		$data['profile_images'] = $this->admin->getProfileImageByID($profile_id);
		$this->load->view('edit_profile',$data);
	}
}