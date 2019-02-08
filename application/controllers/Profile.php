<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('website');
	}
	public function details()
	{
		$profile_id = $this->friend->base64url_decode($this->uri->segment(3));
		$this->data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$this->data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
		$this->data['services_key'] = $this->website->getRandomServicesLimitedten();
		$this->data['profile_data'] = $this->website->getSingleProfileDataById($profile_id);
		$this->data['profile_images'] = $this->website->getImagesByProfileId($profile_id);
		$this->data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$this->load->view('profile_details_view',$this->data);
	}
	public function category()
	{
		$category_id = $this->friend->base64url_decode($this->uri->segment(3));
		$category_info = $this->website->getCategoryById($category_id);
		$data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
		$data['services_key'] = $this->website->getRandomServicesLimitedten();
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$config['base_url'] = base_url().str_replace(' ','-',$this->website->getCategoryById($category_id)->category_name)."-in-".$this->session->userdata('current_locaation')."/category/".$this->friend->base64url_encode($category_id)."/page/" ;
		$config['total_rows'] = $this->website->getProfileByCategoryCount($this->session->userdata('current_locaation'),$category_id);
		$config['per_page'] = 50;
		$data['get_category_profile'] = $this->website->getProfileByCategory($this->session->userdata('current_locaation'),$category_id,$config['per_page'],$this->uri->segment(5)?$this->uri->segment(5):0);
		$this->pagination->initialize($config);

		// ==================================================
		// 			page meta information start
		// ==================================================
		$meta_info['title'] =  str_replace("Mumbai",$this->session->userdata('current_locaation'),$category_info->meta_title);		
		$meta_info['description'] = str_replace("Mumbai",$this->session->userdata('current_locaation'),$category_info->meta_description);	
		$meta_info['Keyword'] =  str_replace("Mumbai",$this->session->userdata('current_locaation'),$category_info->meta_keywords); 		
		$data['meta_info'] = json_decode(json_encode($meta_info));
		// ==================================================
		// 			page meta information End
		// ==================================================
		$this->load->view('category_view',$data);
	}
	public function services()
	{
		$services_id = $this->friend->base64url_decode($this->uri->segment(3));
		$service_info = $this->website->getServicesInfoById($services_id);
		$data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
		$data['services_key'] = $this->website->getRandomServicesLimitedten();
		$config['base_url'] = base_url().str_replace(' ','-',$this->website->getServicesInfoById($services_id)->services_name)."-services-in-".$this->session->userdata('current_locaation')."/services/".$this->friend->base64url_encode($services_id)."/page/";
		$config['total_rows'] = $this->website->getProfileByServicesCount($this->session->userdata('current_locaation'),$services_id);
		$config['per_page'] = 50; 
		$data['get_services_profile'] = $this->website->getServicesProfile($this->session->userdata('current_locaation'),$services_id , $config['per_page'] , $this->uri->segment(5)?$this->uri->segment(5):0);
		$data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$this->pagination->initialize($config); 
		// ==================================================
		// 			page meta information start
		// ==================================================
		$meta_info['title'] = str_replace("Mumbai",$this->session->userdata('current_locaation'),$service_info->meta_title);		
		$meta_info['description'] = str_replace("Mumbai",$this->session->userdata('current_locaation'),$service_info->meta_descriptions);	
		$meta_info['Keyword'] = str_replace("Mumbai",$this->session->userdata('current_locaation'),$service_info->meta_keywords);	
		$data['meta_info'] = json_decode(json_encode($meta_info));
		// ==================================================
		// 			page meta information End
		// ==================================================
		$this->load->view('services_view',$data);
	}
	public function area()
	{
		$area_id = $this->friend->base64url_decode($this->uri->segment(5));
		$this->session->set_userdata(array('current_locaation' => $this->website->getCityNameByAreaId($area_id)->city_name));
		$area_name = $this->website->getAreaNameById($area_id);
		$this->data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$this->data['area_key'] = $this->website->getReletedAreaByCitiesName($this->website->getCityNameByAreaId($area_id)->city_name);
		$this->data['services_key'] = $this->website->getRandomServicesLimitedten();
		$this->data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$config['base_url'] = base_url().str_replace(' ','-',$this->website->getCityNameByAreaId($area_id)->country_name)."/".str_replace(' ','-',$this->website->getCityNameByAreaId($area_id)->city_name)."/".str_replace(' ','-',$this->website->getCityNameByAreaId($area_id)->area_name)."/area-location/".$this->friend->base64url_encode($area_id)."/page/";
		$config['total_rows'] = $this->website->getProfileCountByAreaId($area_id);
		$config['per_page'] = 50; 
		$this->data['get_area_profile'] = $this->website->getProfileByAreaId($area_id , $config['per_page'] , $this->uri->segment(7) ? $this->uri->segment(7) : 0);
		$this->pagination->initialize($config); 
		// ==================================================
		// 			page meta information start
		// ==================================================
		$meta_info['title'] = "Top Luxury Spa Center in ".$area_name." |Nail| Body Massage| Foot Massage| AromaTherapy";
		$meta_info['description'] = "Feel like heaven find the best luxury beauty Spa Center for Nail, Body massage, foot massage, aroma therapy full complete relaxation in ".$area_name." your nearby spa center information and their affordable service details";
		$meta_info['Keyword'] = "spa center in ".$area_name.", spa center near me, spa in ".$area_name.", massage centre".$area_name.", body spa in ".$area_name.", luxury spa ".$area_name.", foot spa ".$area_name.", nail spa in ".$area_name.", aroma spa in ".$area_name.", body massage center in ".$area_name.", spa center in ".$area_name.", luxury spa in ".$area_name.", spa in ".$area_name." with extra service, thai spa in ".$area_name.", couple spa in ".$area_name.", spa in ".$area_name." with price, spa center in ".$area_name.",body massage in ".$area_name." near me";
		$this->data['meta_info'] = json_decode(json_encode($meta_info));
		// ==================================================
		// 			page meta information end
		// ==================================================
		$this->load->view('area_view',$this->data);
	}
	public function cities()
	{
		$city_id = $this->friend->base64url_decode($this->uri->segment(4));
		$city_name = $this->website->getCityDataBYId($city_id)->city_name;
		$this->session->set_userdata(array('current_locaation' => $city_name));
		$this->data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
		$this->data['area_key'] = $this->website->getReletedAreaByCitiesName($city_name);
		$this->data['services_key'] = $this->website->getRandomServicesLimitedten();
		$this->data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));
		$config['base_url'] = base_url().str_replace('','',$this->website->getCityInfoById($city_id)->country_name)."/".str_replace(' ','-', $this->website->getCityInfoById($city_id)->city_name)."/city-location/".$this->friend->base64url_encode($city_id)."/page/";
		$config['total_rows'] = $this->website->getAllProfileCountByCityId($city_id);
		$config['per_page'] = 50; 
		$this->data['get_cities_profiles'] = $this->website->getAllprofilesByCitiesId($city_id , $config['per_page'] , $this->uri->segment(6) ? $this->uri->segment(6) : 0);
		$this->pagination->initialize($config);
		// ==================================================
		// 			page meta information start
		// ==================================================
		$meta_info['title'] = "Top Luxury Spa Center in ".$city_name." |Nail| Body Massage| Foot Massage| AromaTherapy";
		$meta_info['description'] = "Feel like heaven find the best luxury beauty Spa Center for Nail, Body massage, foot massage, aroma therapy full complete relaxation in ".$city_name." your nearby spa center information and their affordable service details";
		$meta_info['Keyword'] = "spa center in ".$city_name.", spa center near me, spa in ".$city_name.", massage centre".$city_name.", body spa in ".$city_name.", luxury spa ".$city_name.", foot spa ".$city_name.", nail spa in ".$city_name.", aroma spa in ".$city_name.", body massage center in ".$city_name.", spa center in ".$city_name.", luxury spa in ".$city_name.", spa in ".$city_name." with extra service, thai spa in ".$city_name.", couple spa in ".$city_name.", spa in ".$city_name." with price, spa center in ".$city_name.",body massage in ".$city_name." near me";
		$this->data['meta_info'] = json_decode(json_encode($meta_info));
		// ==================================================
		// 			page meta information end
		// ==================================================
		$this->load->view('cities_view',$this->data);
	}
}