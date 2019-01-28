<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay rathod
*/
class Location extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) : redirect('account/login') ; endif ;
		$this->load->model('admin');
	}
	public function country()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('new_country','Country','required|is_unique[country.country_name]');
			if ($this->form_validation->run()) {
				if ($this->input->post('country_id') == 0) {
					$this->admin->setCountryData($this->input->post('new_country'));
					$this->session->set_flashdata('success_country','Country Added successfully..!!');
				} else {
					$this->admin->setCountryData($this->input->post('new_country'),$this->input->post('country_id'));
					$this->session->set_flashdata('success_country','Country Updated successfully..!!');
				}
				redirect('location/country');
			} 
		}
		$data['all_country_key'] = $this->admin->getAllCountry();
		$this->load->view('country_view',$data);
	}
	public function delete_country()
	{
		$country_id = $this->friend->base64url_decode($this->uri->segment(3));

		if ($this->admin->checkCityPresent($country_id)) {
			$this->session->set_flashdata('error_country','Country Has Not Been deleted , Some City is present in this country first you have To delete all city releted to this country');
				redirect('location/country');
		} else {
			if ($this->admin->deleteCountry($country_id)) {
				$this->session->set_flashdata('success_country','Delete Country successfully..!!');
				redirect('location/country');
			} else {
				$this->session->set_flashdata('error_country','Country Has Not Been deleted');
				redirect('location/country');
			}	
		}
	}
	public function city()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('country','Country','required|integer');
			$this->form_validation->set_rules('new_city','City','required|is_unique[city.city_name]');
			if ($this->form_validation->run()) {
				$this->admin->setCity($this->input->post());
				$this->session->set_flashdata('success_city','Create City successfully..!!');
				redirect('location/city');
			} else {
				$this->session->set_flashdata('error_city','City Has Not Been Created..!!');
				redirect('location/city');
			}
		}
		$data['all_city_key'] = $this->admin->getAllCity();
		$data['all_country_key'] = $this->admin->getAllCountry();
		$this->load->view('city_view',$data);
	}
	public function delete_city($city_id)
	{
		$city_id = $this->friend->base64url_decode($this->uri->segment(3));
		if ($this->admin->deleteCity($city_id)) {
			$this->session->set_flashdata('success_city','City Deleted successfully..!!');
			redirect('location/city');
		} else {
			$this->session->set_flashdata('error_city','City Has Not Been Deleted..!!');
			redirect('location/city');
		}
	}
	public function area()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('country','Country','required|integer');
			$this->form_validation->set_rules('city','City','required|integer');
			$this->form_validation->set_rules('area_name','Area','required|is_unique[area.area_name]');
			if ($this->form_validation->run()) {
				$this->admin->setArea($this->input->post());
				$this->session->set_flashdata('success_area','Area Added successfully..!!');
				redirect('location/area');
			} else {
				$this->session->set_flashdata('error_area','Area has Not been Added..!!');
				redirect('location/area');
			}
		}
		$data['all_area_key'] = $this->admin->getAllArea();
		$data['all_country_key'] = $this->admin->getAllCountry();
		$this->load->view('aera_view',$data);
	}
	public function getCity()
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
	public function delete_area()
	{
		$area_id = $this->friend->base64url_decode($this->uri->segment(3));
		if ($this->admin->deleteArea($area_id)) {
			$this->session->set_flashdata('success_area','Area Deleted successfully..!!');
			redirect('location/area');
		} else {
			$this->session->set_flashdata('error_area','Area has Not been Deleted..!!');
			redirect('location/area');
		}
	}
}