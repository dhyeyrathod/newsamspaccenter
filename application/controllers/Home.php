<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('website');
	}
	public function index()
	{
		$data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$data['all_category_key'] = $this->website->getAllCategory();
		$data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
		$data['services_key'] = $this->website->getRandomServicesLimitedten();
		$data['paid_profile_key'] = $this->website->getPaidProfile($this->session->userdata('current_locaation'));
		$data['free_profile_key'] = $this->website->getFreeProfiles($this->session->userdata('current_locaation'));
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$data['search_services'] = $this->website->getAllServicesInfoForSearch();
		$data['get_city_by_curent_country'] = $this->website->getCityByCurrentLocationCountryName($this->session->userdata('current_locaation_country'));
		// ==================================================
		// 			page meta information start
		// ==================================================
		$meta_info['title'] =  "Spa Center, Beauty Parlour, Salons, Body Meaasge Center Listing";		
		$meta_info['description'] = "ndia’s No 1 free and premium listing sites for Spa Center, Beauty Parlour, Salons, Body Meaasge Center";	
		$meta_info['Keyword'] =  "Spa Center Listing, Beauty Parlour Listing, Salons, Body Meaasge Center Listing, bridal makeup services, spa services"; 		
		$data['meta_info'] = json_decode(json_encode($meta_info));
		// ==================================================
		// 			page meta information End
		// ==================================================

		$this->load->view('home_view',$data);
	}
	public function profile_booking()
	{
		$profile_id = $this->friend->base64url_decode($this->uri->segment(3));
		if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->form_validation->run('booking')) {
			$this->post_input['name'] = $this->security->xss_clean($this->input->post('name'));
			$this->post_input['email'] = $this->security->xss_clean($this->input->post('email'));
			$this->post_input['contact'] = $this->security->xss_clean($this->input->post('contact'));
			$this->post_input['date_to_visite'] = $this->security->xss_clean($this->input->post('date_to_visite'));
			$this->post_input['pincode'] = $this->security->xss_clean($this->input->post('pincode'));
			$this->post_input['descriptions'] = $this->security->xss_clean($this->input->post('descriptions'));
			$this->post_input['fk_profile_id'] = $this->security->xss_clean($this->input->post('profile_id'));
			$store_data_response = json_decode($this->website->setBookingData(json_decode(json_encode($this->post_input))));

			if ($store_data_response->status && $store_data_response->last_booking_id) {
				// mail tregur code
			}

			echo "<pre>";print_r($store_data_response);exit();
		}

		// ======================================================
		// 			common info for page background start
		// ======================================================
		$data['get_city_by_curent_country'] = $this->website->getCityByCurrentLocationCountryName($this->session->userdata('current_locaation_country'));
		$data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$data['all_category_key'] = $this->website->getAllCategory();
		$data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
		$data['services_key'] = $this->website->getRandomServicesLimitedten();
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$data['profile_id'] = $profile_id ;
		// ======================================================
		// 			common info for page background start
		// ======================================================


		// ======================================================
		// 			meta information start
		// ======================================================		
		$meta_info['title'] =  "Spa Center, Beauty Parlour, Salons, Body Meaasge Center Listing";		
		$meta_info['description'] = "ndia’s No 1 free and premium listing sites for Spa Center, Beauty Parlour, Salons, Body Meaasge Center";	
		$meta_info['Keyword'] =  "Spa Center Listing, Beauty Parlour Listing, Salons, Body Meaasge Center Listing, bridal makeup services, spa services"; 		
		$data['meta_info'] = json_decode(json_encode($meta_info));
		// ======================================================
		// 			meta information end
		// ======================================================
		$this->load->view('profile_booking_view',$data);
	}
}