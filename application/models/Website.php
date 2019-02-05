<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Website extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('friend');
		$this->friend = new friend ;
		$this->db->trans_strict(FALSE);
	}
	public function getRandomCategoryLimitedBySix($limit = 6)
	{
		$sql_str = "SELECT * FROM category ORDER BY RAND() LIMIT ".$this->db->escape($limit);
		return $this->db->query($sql_str)->result();
	}
	public function getRandomAreaLimitedten($current_location,$limit = 10)
	{
		$sql_str = "SELECT * FROM area";
		if ($this->checkAreaPresentByCity($current_location)) {
		 	$sql_str .= " WHERE city_name = ".$this->db->escape($current_location);
		 } 
		$sql_str .= " ORDER BY RAND() LIMIT ".$this->db->escape($limit);
		return $this->db->query($sql_str)->result();
	}
	public function getRandomServicesLimitedten($limit = 10)
	{
		$sql_str = "SELECT * FROM services ORDER BY RAND() LIMIT ".$this->db->escape($limit);
		return $this->db->query($sql_str)->result();
	}
	public function getPaidProfile($current_location,$limit = 6)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image , spa_profile.description as description from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_payment_info.fk_payment_type_id = 1 AND spa_profile_payment_info.fk_payment_type_name = 'Paid'";
		// if ($this->checkProfilePresentInCity($current_location) > 3) {
		// 	$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		// }
		$sql_str .= " ORDER BY RAND() LIMIT $limit";
		return $this->db->query($sql_str)->result();
	}
	public function getProfilePresentInCurrentLocationByCategory($current_location,$category_id)
	{
		$sql_str = "SELECT spa_profile_location.city_name AS city_name FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.city_name = ".$this->db->escape($current_location)." AND spa_profile_services_category.fk_category_id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getFreeProfiles($current_location,$limit = 9)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image , spa_profile.description as description from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_payment_info.fk_payment_type_id = 2 AND spa_profile_payment_info.fk_payment_type_name = 'Free'";
		// if ($this->checkProfilePresentInCity($current_location) > 3) {
		// 	$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		// }
		$sql_str .= " ORDER BY RAND() LIMIT $limit";
		return $this->db->query($sql_str)->result();
	}
	public function setMembers($data)
	{
		$sql_str = "INSERT INTO members SET username = ".$this->db->escape($data['username']).", password = ".$this->db->escape($data['password']).",contact_number = ".$this->db->escape($data['contact']).",email = ".$this->db->escape($data['email']).",created_date = NOW() , status = TRUE";
		return $this->db->query($sql_str);
	}
	public function UserAuthentication($data)
	{
		$sql_str = "SELECT * FROM members WHERE email = ".$this->db->escape($data['email'])." AND password = ".$this->db->escape($data['password']);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getSingleUserDataByEmail($email_id)
	{
		$sql_str = "SELECT * FROM members WHERE email = ".$this->db->escape($email_id);
		return $this->db->query($sql_str)->row();
	}
	public function checkProfilePresentInCity($city_name)
	{
		$sql_str = "SELECT spa_profile_location.city_name AS city_name FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id WHERE city_name = ".$this->db->escape($city_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function checkAreaPresentByCity($city_name)
	{
		$sql_str = "SELECT * FROM area WHERE city_name = ".$this->db->escape($city_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getProfileByCategory($current_location , $category_id , $limit , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_category_name as category_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_services_names as services_name from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_services_category.fk_category_id = ".$this->db->escape($category_id);
		if ($this->getProfilePresentInCurrentLocationByCategory($current_location,$category_id) > 3) {
			$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		}
		$sql_str .= " LIMIT $limit OFFSET $offset";
		return $this->db->query($sql_str)->result();
	}
	public function getProfileByCategoryCount($current_location , $category_id)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_category_name as category_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_services_names as services_name from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_services_category.fk_category_id = ".$this->db->escape($category_id);
		if ($this->getProfilePresentInCurrentLocationByCategory($current_location,$category_id) > 3) {
			$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		}
		return $this->db->query($sql_str)->num_rows();
	}
	public function getServicesProfile($current_location , $services_id , $limit , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_services_category.fk_services_id = ".$this->db->escape($services_id);
		if ($this->getProfilePresentInCurrentLocationByServices($current_location,$services_id) > 3) {
			$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		}
		$sql_str .= " LIMIT $limit OFFSET $offset";
		return $this->db->query($sql_str)->result();
	}
	public function getProfileByServicesCount($current_location , $services_id)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_services_category.fk_services_id = ".$this->db->escape($services_id);
		if ($this->getProfilePresentInCurrentLocationByServices($current_location,$services_id) > 3) {
			$sql_str .= " AND spa_profile_location.city_name = ".$this->db->escape($current_location);
		}
		return $this->db->query($sql_str)->num_rows();
	}
	public function getProfilePresentInCurrentLocationByServices($current_location,$services_id)
	{
		$sql_str = "SELECT spa_profile_location.city_name AS city_name FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.city_name = ".$this->db->escape($current_location)." AND spa_profile_services_category.fk_services_id = ".$this->db->escape($services_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getSingleProfileDataById($profile_id)
	{
		$sql_str = "SELECT spa_profile.id as id , spa_profile.title as title,spa_profile.contact_number as contact_number , spa_profile.description as description , spa_profile.ranking as ranking , spa_profile.email_id as email_id , spa_profile_location.fk_counry_id as counry_id , spa_profile_location.country_name as country_name , spa_profile_location.fk_city_id as city_id , spa_profile_location.city_name as city_name ,spa_profile_location.address as address , spa_profile_location.google_map_url as google_map_url ,spa_profile_location.fk_area_id as area_id , spa_profile_location.area_name as area_name , spa_profile_location.pincode as pincode , spa_profile_services_category.fk_category_id as category_id , spa_profile_services_category.fk_category_name as category_name , spa_profile_services_category.fk_services_id as services_id , spa_profile_services_category.fk_services_names as services_names , spa_profile_payment_info.fk_payment_type_name AS payment_type FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile.id = ".$this->db->escape($profile_id);
		return $this->db->query($sql_str)->row();
	}
	public function getImagesByProfileId($profile_id)
	{
		$sql_str = "SELECT * FROM spa_profile_images WHERE fk_profile_id = ".$this->db->escape($profile_id);
		return $this->db->query($sql_str)->result();
	}
	public function getProfileByAreaId($area_id , $limit , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.fk_area_id = ".$this->db->escape($area_id);
		$sql_str .= " LIMIT $limit OFFSET $offset";
		return $this->db->query($sql_str)->result();
	}
	public function getProfileCountByAreaId($area_id)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.fk_area_id = ".$this->db->escape($area_id)." ORDER BY RAND()";
		return $this->db->query($sql_str)->num_rows();
	}
	public function getCityNameByAreaId($area_id)
	{
		$sql_str = "SELECT * FROM area WHERE id = ".$this->db->escape($area_id);
		return $this->db->query($sql_str)->row();
	}
	public function getReletedAreaByCitiesName($cities_name)
	{
		$sql_str = "SELECT * FROM area WHERE city_name = ".$this->db->escape($cities_name)." ORDER BY RAND() LIMIT 10";
		return $this->db->query($sql_str)->result();
	}
	public function getAllCitiesDataByCountryName($country_name)
	{
		$sql_str = "SELECT * FROM city WHERE country_name = ".$this->db->escape($country_name);
		return $this->db->query($sql_str)->result();
	}
	public function getCityDataBYId($city_id)
	{
		$sql_str = "SELECT * FROM city WHERE id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->row();
	}
	public function getAllprofilesByCitiesId($city_id , $limit , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.fk_city_id = ".$this->db->escape($city_id);
		$sql_str .= " LIMIT $limit OFFSET $offset";
		return $this->db->query($sql_str)->result();
	}
	public function getAllProfileCountByCityId($city_id)
	{
		$sql_str = "SELECT spa_profile.id AS id , spa_profile.title AS title , spa_profile_location.city_name AS city_name , spa_profile.contact_number as contact_number , spa_profile_services_category.fk_services_names as services_name , spa_profile.ranking as ranking , spa_profile_services_category.fk_category_name as category_name , (SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1) as image from spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_location.fk_city_id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getCategoryById($category_id)
	{
		$sql_str = "SELECT * FROM category WHERE id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str)->row();
	}
	public function getServicesInfoById($services_id)
	{
		$sql_str = "SELECT * FROM services WHERE id = ".$this->db->escape($services_id);
		return $this->db->query($sql_str)->row();
	}
	public function getCityInfoById($city_id)
	{
		$sql_str = "SELECT * FROM city WHERE id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->row();
	}
	public function getAllServicesInfoForSearch()
	{
		$sql_str = "SELECT * FROM services ORDER BY RAND()";
		return $this->db->query($sql_str)->result();
	}
	public function getCityByCurrentLocationCountryName($country_name)
	{
		$sql_str = "SELECT * FROM city WHERE country_name = ".$this->db->escape($country_name);
		return $this->db->query($sql_str)->result();
	}
	public function getQuerySearchResult($data , $limit = 0 , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id as id , spa_profile.title as title,spa_profile.contact_number as contact_number , spa_profile.description as description , spa_profile.ranking as ranking , spa_profile.email_id as email_id , spa_profile_location.fk_counry_id as counry_id , spa_profile_location.country_name as country_name , spa_profile_location.fk_city_id as city_id , spa_profile_location.city_name as city_name ,spa_profile_location.address as address , spa_profile_location.google_map_url as google_map_url ,spa_profile_location.fk_area_id as area_id , spa_profile_location.area_name as area_name , spa_profile_location.pincode as pincode , spa_profile_services_category.fk_category_id as category_id , spa_profile_services_category.fk_category_name as category_name , spa_profile_services_category.fk_services_id as services_id , spa_profile_services_category.fk_services_names as services_names FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE  spa_profile_services_category.fk_category_name LIKE '%". $data['search_query'] ."%' AND spa_profile.title LIKE '%".$data['search_query']."%'";
		if ($data['city_id'] != 0) {
			$sql_str .= " AND spa_profile_location.fk_city_id = ".$this->db->escape($data['city_id']);
		}
		if ($data['services_id'] != 0 && $data['services_id'] == '') {
			$sql_str .= " AND spa_profile_services_category.fk_services_id = ".$this->db->escape($data['services_id']);
		}
		if ($limit != 0) {
			$sql_str .= " LIMIT $limit";
		}
		if ($offset != 0) {
			$sql_str .= " OFFSET $offset";
		}
		return $this->db->query($sql_str)->result();
	}
	public function countQuerySearchResult($data , $limit = 0 , $offset = 0)
	{
		$sql_str = "SELECT spa_profile.id as id , spa_profile.title as title,spa_profile.contact_number as contact_number , spa_profile.description as description , spa_profile.ranking as ranking , spa_profile.email_id as email_id , spa_profile_location.fk_counry_id as counry_id , spa_profile_location.country_name as country_name , spa_profile_location.fk_city_id as city_id , spa_profile_location.city_name as city_name ,spa_profile_location.address as address , spa_profile_location.google_map_url as google_map_url ,spa_profile_location.fk_area_id as area_id , spa_profile_location.area_name as area_name , spa_profile_location.pincode as pincode , spa_profile_services_category.fk_category_id as category_id , spa_profile_services_category.fk_category_name as category_name , spa_profile_services_category.fk_services_id as services_id , spa_profile_services_category.fk_services_names as services_names FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile_services_category.fk_category_name LIKE '%". $data['search_query'] ."%' AND spa_profile.title LIKE '%".$data['search_query']."%'";
		if ($data['city_id'] != 0) {
			$sql_str .= " AND spa_profile_location.fk_city_id = ".$this->db->escape($data['city_id']);
		}
		if ($data['services_id'] != 0) {
			$sql_str .= " AND spa_profile_services_category.fk_services_id = ".$this->db->escape($data['services_id']);
		}
		
		return $this->db->query($sql_str)->num_rows();
	}
	public function getCategoryBySearchStr($search_query)
	{
		$sql_str = "SELECT * FROM category WHERE category_name LIKE '%" . $search_query . "%'";
		return $this->db->query($sql_str)->result();
	}
	public function getAllCategory()
	{
		$sql_str = "SELECT * FROM category";
		return $this->db->query($sql_str)->result();
	}
	public function getAllCountry()
	{
		$sql_str = "SELECT * FROM country";
		return $this->db->query($sql_str)->result();
	}
	public function checkCityPresent($country_id)
	{
		$sql_str = "SELECT * FROM city WHERE fk_country_id = ".$this->db->escape($country_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getAllCityByCountryId($country_id)
	{
		$sql_str = "SELECT * FROM city WHERE fk_country_id = ".$this->db->escape($country_id);
		return $this->db->query($sql_str)->result();
	}
	public function setProfile($data,$user_id,$profile_id=false,$isupdate=false)
	{
		if ($isupdate) {
			$sql_str = "UPDATE spa_profile SET title = ".$this->db->escape($data['title']).",contact_number = ".$this->db->escape($data['contact_number']).",email_id = ".$this->db->escape($data['email_id']).",description = ".$this->db->escape($data['description']).",status = TRUE , fk_user_id = ".$this->db->escape($user_id).",updated_date = NOW() , updated_by = ".$this->db->escape($user_id)." WHERE id = ".$this->db->escape($profile_id);
			if ($this->db->query($sql_str)) {
				$respons = json_encode(array('status' => 'success'));
			} else {
				$respons = json_encode(array('status' => 'failure'));
			}
			return $respons ;
		} else {
			$this->db->trans_begin();
			$sql_str = "INSERT INTO spa_profile SET title = ".$this->db->escape($data['title']).",contact_number = ".$this->db->escape($data['contact_number']).",email_id = ".$this->db->escape($data['email_id']).",description = ".$this->db->escape($data['description']).",status = TRUE , fk_user_id = ".$this->db->escape($user_id).",created_date = NOW() , created_by = ".$this->db->escape($user_id);
			if ($this->db->query($sql_str)) {
				$respons = json_encode(array('status' => 'success','last_inserted_id'=>$this->db->insert_id()));
			} else {
				$respons = json_encode(array('status' => 'failure'));
			}
			return $respons ;	
		}
	}
	public function getAllAreasByCityId($city_id)
	{
		$sql_str = "SELECT * FROM area WHERE fk_city_id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->result();
	}
	public function setSpaProfileLocation($data,$user_id,$profile_id=false,$isupdate=false) {
		if ($isupdate) {
			$sql_str = "UPDATE spa_profile_location SET fk_counry_id = ".$this->db->escape($data['country_id']).",fk_city_id = ".$this->db->escape($data['city_id']).",fk_area_id = ".$this->db->escape($data['area_id']).",address = ".$this->db->escape($data['address']).",google_map_url = ".$this->db->escape($data['google_map_url']).",	updated_by = ".$this->db->escape($user_id).",updated_date = NOW() , country_name = ".$this->db->escape($this->getCountryNameById($data['country_id'])).",city_name = ".$this->db->escape($this->getCityNameById($data['city_id'])).",area_name = ".$this->db->escape($this->getAreaNameById($data['area_id'])).",pincode = ".$this->db->escape($data['pincode'])." WHERE fk_profile_id = ".$this->db->escape($profile_id);
			$this->db->query($sql_str);
		} else {
			$sql_str = "INSERT INTO spa_profile_location SET fk_profile_id = ".$this->db->escape($profile_id).",fk_counry_id = ".$this->db->escape($data['country_id']).",fk_city_id = ".$this->db->escape($data['city_id']).",fk_area_id = ".$this->db->escape($data['area_id']).",address = ".$this->db->escape($data['address']).",google_map_url = ".$this->db->escape($data['google_map_url']).",	created_by = ".$this->db->escape($user_id).",created_date = NOW() , country_name = ".$this->db->escape($this->getCountryNameById($data['country_id'])).",city_name = ".$this->db->escape($this->getCityNameById($data['city_id'])).",area_name = ".$this->db->escape($this->getAreaNameById($data['area_id'])).",pincode = ".$this->db->escape($data['pincode']);
			$this->db->query($sql_str);	
		}
	}
	public function setSpaProfileServicesCategory($data,$user_id,$profile_id=false,$isupdate=false)
	{
		if ($isupdate) {
			$sql_str = "UPDATE spa_profile_services_category SET fk_category_id = ".$this->db->escape($data['category_id']).",fk_category_name = ".$this->db->escape($this->getCategoryNameById($data['category_id'])).",fk_services_id = ".$this->db->escape($data['services_id']).",fk_services_names = ".$this->db->escape($this->getServiceNameById($data['services_id'])).",updated_by = ".$this->db->escape($user_id).",updated_date = NOW()";$this->db->query($sql_str)." WHERE fk_profile_id = ".$this->db->escape($profile_id);$this->db->query($sql_str);	
		} else {
			$sql_str = "INSERT INTO spa_profile_services_category SET fk_profile_id = ".$this->db->escape($profile_id).",fk_category_id = ".$this->db->escape($data['category_id']).",fk_category_name = ".$this->db->escape($this->getCategoryNameById($data['category_id'])).",fk_services_id = ".$this->db->escape($data['services_id']).",fk_services_names = ".$this->db->escape($this->getServiceNameById($data['services_id'])).",created_by = ".$this->db->escape($user_id).",created_date = NOW()";$this->db->query($sql_str);	
		}
	}
	public function setProfilePaymentDetails($data,$user_id,$profile_id)
	{
		$sql_str = "INSERT INTO spa_profile_payment_info SET fk_profile_id = ".$this->db->escape($profile_id).",fk_payment_type_id = ".$this->db->escape($data['payment_type_name']).",fk_payment_type_name = ".$this->db->escape($this->getPaymentTypeName($data['payment_type_name']));$this->db->query($sql_str);
		if ($this->db->trans_status()) { $this->db->trans_commit(); 
			return json_encode(array('status' => TRUE , 'message'=>'Profile Created successfully..!!'));
		} else { $this->db->trans_rollback();
			return json_encode(array('status' => FALSE , 'message'=>'error plese insert data proparly'));
		}
	}
	public function setProfileImage($image_name , $profile_id , $user_id)
	{
		$sql_str = "INSERT INTO spa_profile_images SET fk_profile_id = ".$this->db->escape($profile_id).",image_name = ".$this->db->escape($image_name).",created_date = NOW() , created_by = ".$this->db->escape($user_id);
		return $this->db->query($sql_str);
	}
	private function getCountryNameById($country_id)
	{
		$sql_str = "SELECT country_name FROM country WHERE id = ".$this->db->escape($country_id);
		return $this->db->query($sql_str)->row()->country_name;
	}
	private function getCityNameById($city_id)
	{
		$sql_str = "SELECT city_name FROM city WHERE id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->row()->city_name;
	}
	private function getAreaNameById($area_id)
	{
		$sql_str = "SELECT area_name FROM area WHERE id = ".$this->db->escape($area_id);
		return $this->db->query($sql_str)->row()->area_name;
	}
	private function getServiceNameById($service_id)
	{
		$sql_str = "SELECT * FROM services WHERE id = ".$this->db->escape($service_id);
		return $this->db->query($sql_str)->row()->services_name;
	}
	private function getCategoryNameById($category_id)
	{
		$sql_str = "SELECT * FROM category WHERE id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str)->row()->category_name;
	}
	private function getPaymentTypeName($payment_id)
	{
		$sql_str = "SELECT * FROM payment_info WHERE id = ".$this->db->escape($payment_id);
		return $this->db->query($sql_str)->row()->payment_type_name;
	}
	public function getUserProfile($user_id)
	{
		$sql_str = "SELECT spa_profile.id as id , spa_profile.title as title,spa_profile.contact_number as contact_number , spa_profile.description as description , spa_profile.ranking as ranking , spa_profile.email_id as email_id , spa_profile_location.fk_counry_id as counry_id , spa_profile_location.country_name as country_name , spa_profile_location.fk_city_id as city_id , spa_profile_location.city_name as city_name ,spa_profile_location.address as address , spa_profile_location.google_map_url as google_map_url ,spa_profile_location.fk_area_id as area_id , spa_profile_location.area_name as area_name , spa_profile_location.pincode as pincode , spa_profile_services_category.fk_category_id as category_id , spa_profile_services_category.fk_category_name as category_name , spa_profile_services_category.fk_services_id as services_id , spa_profile_services_category.fk_services_names as services_names , ( SELECT image_name FROM spa_profile_images WHERE fk_profile_id = spa_profile.id ORDER BY RAND() LIMIT 1 ) AS image FROM spa_profile JOIN spa_profile_location ON spa_profile.id = spa_profile_location.fk_profile_id JOIN spa_profile_payment_info ON spa_profile.id = spa_profile_payment_info.fk_profile_id JOIN spa_profile_services_category ON spa_profile.id = spa_profile_services_category.fk_profile_id WHERE spa_profile.fk_user_id = ".$this->db->escape($user_id);
		return $this->db->query($sql_str)->result();
	}
	public function getImgesOfProfile($profile_id)
	{
		$sql_str = "SELECT image_name FROM spa_profile_images WHERE fk_profile_id = ".$this->db->escape($profile_id);
		return $this->db->query($sql_str)->result();
	}
	public function deleteProfileByUser($user_id)
	{
		$this->db->trans_begin();
		$this->db->delete('spa_profile', array('id' => $user_id)); 
		$this->db->delete('spa_profile_images', array('fk_profile_id' => $user_id)); 
		$this->db->delete('spa_profile_location', array('fk_profile_id' => $user_id)); 
		$this->db->delete('spa_profile_payment_info', array('fk_profile_id' => $user_id)); 
		$this->db->delete('spa_profile_services_category', array('fk_profile_id' => $user_id)); 
		if ($this->db->trans_status()) { 
			$this->db->trans_commit();return json_encode(array('status' => 'success'));
		} else { 
			$this->db->trans_rollback();return json_encode(array('status' => 'failure'));
		}
	}
	public function getProfileImageInfoByID($profile_id)
	{
		$sql_str = "SELECT * FROM spa_profile_images WHERE fk_profile_id = ".$this->db->escape($profile_id);
		return $this->db->query($sql_str)->result();
	}
	public function deleteImageByID($image_id)
	{
		$sql_str = "DELETE FROM spa_profile_images WHERE id = ".$this->db->escape($image_id);
		return $this->db->query($sql_str);
	}
}