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
		$this->load->view('home_view',$data);
	}
}