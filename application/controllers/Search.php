<?php 
/**
* @author Jay Rathod
*/
class Search extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('website');
	}
	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->data['category_key'] = $this->website->getRandomCategoryLimitedBySix();
			$this->data['all_category_key'] = $this->website->getAllCategory();
			$this->data['area_key'] = $this->website->getRandomAreaLimitedten($this->session->userdata('current_locaation'));
			$this->data['services_key'] = $this->website->getRandomServicesLimitedten();
			$this->data['all_cities_key'] = $this->website->getAllCitiesDataByCountryName($this->session->userdata('current_locaation_country'));

			$this->filter_search['search_query'] = $this->input->get('query');
			$this->filter_search['services_id'] = $this->input->get('services');
			$this->filter_search['city_id'] = $this->input->get('city');

			$config['base_url'] = site_url('search')."?query=".$this->input->get('query')."&services=".$this->input->get('services')."&city=".explode('/',$this->filter_search['city_id'])[0];
			$config['total_rows'] = $this->website->countQuerySearchResult($this->filter_search);

			$config['per_page'] = 5;

			$offset = $this->filter_search['city_id'] ? explode('/',$this->filter_search['city_id'])[1] : 0 ;

			$this->data['search_result_key'] = $this->website->getQuerySearchResult($this->filter_search,$config['per_page'] , $offset);

			$this->pagination->initialize($config); 

			$this->load->view('search_view',$this->data);
		} 
	}
}