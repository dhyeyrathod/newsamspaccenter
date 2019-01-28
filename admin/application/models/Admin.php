<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Admin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function loginAuthentication($email,$password)
	{
		$sql_str = "SELECT * FROM admin WHERE email_id = ".$this->db->escape($email)." AND password = ".$this->db->escape($password);
		return $this->db->query($sql_str)->num_rows();
	}
	public function adminSessionDataGet($email,$password)
	{
		$sql_str = "SELECT * FROM admin WHERE email_id = ".$this->db->escape($email)." AND password = ".$this->db->escape($password);
		return $this->db->query($sql_str)->row();
	}
	public function setCountryData($country_name,$country_id=0)
	{
		if ($country_id == 0) {
			$sql_str = "INSERT INTO country SET country_name = ".$this->db->escape($country_name).",created_date=NOW()";
			return $this->db->query($sql_str);
		} else {
			$sql_str = "UPDATE country SET country_name = ".$this->db->escape($country_name).",updated_date=NOW(),meta_title = NULL , meta_desscription = NULL , meta_keyword = NULL WHERE id = ".$this->db->escape($country_id);
			return $this->db->query($sql_str);
		}
	}
	public function getAllCountry()
	{
		$sql_str = "SELECT * FROM country";
		return $this->db->query($sql_str)->result();
	}
	public function deleteCountry($country_id)
	{
		$sql_str = "DELETE FROM country WHERE id = ".$this->db->escape($country_id);
		return $this->db->query($sql_str);
	}
	public function setCity($data , $city_id = 0)
	{
		$sql_str = "INSERT INTO city SET city_name = ".$this->db->escape($data['new_city']).", fk_country_id = ".$this->db->escape($data['country'])." , created_date = NOW() , status = true";
		return $this->db->query($sql_str);
	}
	public function getAllCity()
	{
		$sql_str = "SELECT city.id as id ,country.id as country_id, city.created_date AS created_date , country.country_name AS country_name , city.city_name AS city_name FROM city INNER JOIN country ON city.fk_country_id = country.id";
		return $this->db->query($sql_str)->result();
	}
	public function deleteCity($city_id)
	{
		$sql_str = "DELETE FROM city WHERE id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str);
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
	public function setArea($data,$area_id = 0)
	{
		$sql_str = "INSERT INTO area SET area_name = ".$this->db->escape($data['area_name']).",fk_city_id = ".$this->db->escape($data['city']).",fk_country_id = ".$this->db->escape($data['country']).",created_date = NOW() , status = true";
		return $this->db->query($sql_str);
	}
	public function getAllArea()
	{
		$sql_str = "SELECT area.id as id , area.area_name as area_name , area.created_date as created_date , city.city_name as city_name , country.country_name as country_name , CASE WHEN area.status = TRUE THEN 'active' ELSE 'deactive' END AS status FROM area JOIN city ON area.fk_city_id = city.id JOIN country ON area.fk_country_id = country.id";
		return $this->db->query($sql_str)->result();
	}
	public function deleteArea($area_id)
	{
		$sql_str = "DELETE FROM area WHERE id = ".$this->db->escape($area_id);
		return $this->db->query($sql_str);
	}
	public function setCategory($data)
	{
		$sql_str = "INSERT INTO category SET category_name = ".$this->db->escape($data['category_name']).",description = ".$this->db->escape($data['description']).",status = ".$this->db->escape($data['status']).",created_date = NOW()";
		return $this->db->query($sql_str);
	}
	public function checkCategoryPresent($category_name)
	{
		$sql_str = "SELECT * FROM category WHERE category_name = ".$this->db->escape($category_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getAllCategory()
	{
		$sql_str = "SELECT id , category_name , description , created_date ,  CASE WHEN category.status = TRUE THEN 'active' ELSE 'deactive' END AS status  FROM category";
		return $this->db->query($sql_str)->result();
	}
	public function deleteCategory($category_id)
	{
		$sql_str = "DELETE FROM category WHERE id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str);
	}
	public function checkCategoryPresentById($category_id)
	{
		$sql_str = "SELECT * FROM category WHERE id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getCategoryById($category_id)
	{
		$sql_str = "SELECT id , category_name , description , created_date , CASE WHEN category.status = TRUE THEN 'active' ELSE 'deactive' END AS status FROM category WHERE id = ".$this->db->escape($category_id);
		return $this->db->query($sql_str)->row();
	}
	public function checkservicesPresent($services_name)
	{
		$sql_str = "SELECT * FROM services WHERE services_name = ".$this->db->escape($services_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getAllservices()
	{
		$sql_str = "SELECT id , services_name , description , created_date ,  CASE WHEN services.status = TRUE THEN 'active' ELSE 'deactive' END AS status  FROM services";
		return $this->db->query($sql_str)->result();
	}
	public function deleteservices($services_id)
	{
		$sql_str = "DELETE FROM services WHERE id = ".$this->db->escape($services_id);
		return $this->db->query($sql_str);
	}
	public function checkservicesPresentById($services_id)
	{
		$sql_str = "SELECT * FROM services WHERE id = ".$this->db->escape($services_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getservicesById($services_id)
	{
		$sql_str = "SELECT id , services_name , description , created_date , CASE WHEN services.status = TRUE THEN 'active' ELSE 'deactive' END AS status FROM services WHERE id = ".$this->db->escape($services_id);
		return $this->db->query($sql_str)->row();
	}
	public function setservices($data)
	{
		$sql_str = "INSERT INTO services SET services_name = ".$this->db->escape($data['services_name']).",description = ".$this->db->escape($data['description']).",status = ".$this->db->escape($data['status']).",created_date = NOW()";
		return $this->db->query($sql_str);
	}
	public function checkAreaPresent($city_id)
	{
		$sql_str = "SELECT * FROM area WHERE fk_city_id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getAllAreasByCityId($city_id)
	{
		$sql_str = "SELECT * FROM area WHERE fk_city_id = ".$this->db->escape($city_id);
		return $this->db->query($sql_str)->result();
	}
	public function setSpaProfileDetails($data)
	{
		if ($data['spa_id'] == 0) {
			$sql_str = "INSERT INTO spa_profile SET title = ".$this->db->escape($data['title']).",contact_number = ".$this->db->escape($data['contact_number']).",email_id = ".$this->db->escape($data['email_id'])." ,fk_user_id = 0 , created_date = NOW() , created_by = 0 , status = true , description = ".$this->db->escape($data['description']);
			return $this->db->query($sql_str) ? $this->db->insert_id() : false ;
		} else {
			
			
		}
	}
	public function setSpaPaymenntInfo($data,$last_spa_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_payment_info SET fk_profile_id = ".$this->db->escape($last_spa_inserted_id).",fk_payment_type_id = ".$this->db->escape($data['payment_method']).",fk_payment_type_name = ".$this->db->escape($this->getPaymentTypeById($data['payment_method'])->payment_type_name);
		return $this->db->query($sql_str);
	}
	public function getPaymentTypeById($payment_id)
	{
		$sql_str = "SELECT * FROM payment_info WHERE id = ".$this->db->escape($payment_id);
		return $this->db->query($sql_str)->row();
	}
	public function checkSpaIdIsPresent($spa_id)
	{
		$sql_str = "SELECT * FROM spa_profile WHERE id = ".$this->db->escape($spa_id);
		return $this->db->query($sql_str)->num_rows();
	}
	public function setSpaProfileLocationDetails($data,$last_spa_inserted_id)
	{
		$this->db->trans_start();
		$sql_str = "INSERT INTO spa_profile_location SET fk_profile_id = ".$this->db->escape($last_spa_inserted_id).",fk_counry_id = ".$this->db->escape($data['fk_counry_id']).",fk_city_id = ".$this->db->escape($data['fk_city_id']).",fk_area_id = ".$this->db->escape($data['fk_area_id']).",address = ".$this->db->escape($data['address']).",google_map_url = ".$this->db->escape($data['map_url']).",created_by = 0 , created_date = NOW() , country_name = ".$this->db->escape($this->getCountryNameById($data['fk_counry_id'])).",city_name = ".$this->db->escape($this->getCityNameById($data['fk_city_id'])).",area_name = ".$this->db->escape($this->getAreaNameById($data['fk_area_id'])).",pincode = ".$this->db->escape($data['pincode']);
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
	public function setSpaProfileServicesCategoryDetails($data,$last_spa_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_services_category SET fk_category_id = ".$this->db->escape($data['fk_category_id']).",fk_services_id = ".$this->db->escape($data['fk_services_id']).",fk_services_names = ".$this->db->escape($this->getservicesById($data['fk_services_id'])->services_name).",fk_category_name = ".$this->db->escape($this->getCategoryById($data['fk_category_id'])->category_name).",created_by = 0,created_date = NOW() , fk_profile_id = ".$this->db->escape($last_spa_inserted_id);$this->db->query($sql_str);$this->db->trans_complete(); 
		return $this->db->trans_status();
	}
	public function setSpaProfileImages($file_name , $last_spa_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_images SET fk_profile_id = ".$this->db->escape($last_spa_inserted_id).",image_name = ".$this->db->escape($file_name).", created_date = NOW() , created_by = 0";
		return $this->db->query($sql_str);
	}
	public function getCountryTableField()
	{
		$sql_str = "DESCRIBE country";
		$country_fields = array();
		foreach ($this->db->query($sql_str)->result_array() as $row) {
			$country_fields[] = $row['Field'];
		}
		return $country_fields ;
	}
	public function checkCountryPrsentByName($country_name)
	{
		$sql_str = "SELECT * FROM country WHERE country_name = ".$this->db->escape($country_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function getCityTableField($value='')
	{
		$sql_str = "DESCRIBE city";
		$city_fields = array();
		foreach ($this->db->query($sql_str)->result_array() as $row) {
			$city_fields[] = $row['Field'];
		}
		return $city_fields ;
	}
	public function checkCityPresentByName($city_name)
	{
		$sql_str = "SELECT * FROM city WHERE city_name = ".$this->db->escape($city_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function setCityByExcel($city_data)
	{
		$sql_str = "INSERT INTO city SET city_name = ".$this->db->escape($city_data['city_name']).", country_name = ".$this->db->escape($city_data['country_name']).",fk_country_id = ".$this->db->escape($this->getCountryidByName($city_data['country_name'])->id).",created_date = NOW() , status = TRUE";
		return $this->db->query($sql_str);
	}
	public function getCountryidByName($country_name)
	{
		$sql_str = "SELECT * FROM country WHERE country_name = ".$this->db->escape($country_name);
		return $this->db->query($sql_str)->row();
	}
	public function checkAreaPresentByname($area_name)
	{
		$sql_str = "SELECT * FROM area WHERE area_name = ".$this->db->escape($area_name);
		return $this->db->query($sql_str)->num_rows();
	}
	public function setAreaByExcel($data)
	{
		$sql_str = "INSERT INTO area SET area_name = ".$this->db->escape($data['area_name']).",fk_city_id = ".$this->db->escape($this->getCityIdByCityName($data['city_name'])->id).",fk_country_id = ".$this->db->escape($this->getCountryidByName($data['country_name'])->id).",created_date = NOW() , status = ".$this->db->escape($data['status']).",city_name = ".$this->db->escape($data['city_name']).",country_name = ".$this->db->escape($data['country_name']).",excel_code = ".$this->db->escape($data['excel_code']);
		return $this->db->query($sql_str);
	}
	public function getCityIdByCityName($city_name)
	{
		$sql_str = "SELECT * FROM city WHERE city_name = ".$this->db->escape($city_name);
		return $this->db->query($sql_str)->row();
	}
	public function setExcelSpaProfile($data,$excel_code)
	{
		$this->db->trans_begin();
		$sql_str = "INSERT INTO spa_profile SET title = ".$this->db->escape($data['title']).",contact_number = ".$this->db->escape($data['contact_number']).",email_id = ".$this->db->escape($data['email_id']).",fk_user_id = ".$this->db->escape($data['user_id']).",created_date = NOW() , created_by = 0 , status = ".$this->db->escape($data['status']).",description = ".$this->db->escape($data['description']);
		if ($this->db->query($sql_str)) {
			$respons = json_encode(array('status' => 'success','last_inserted_id'=>$this->db->insert_id()));
		} else {
			$respons = json_encode(array('status' => 'failure'));
		}
		return $respons ;
	}
	public function setExcelSpaProfileLocation($data , $excel_code , $last_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_location SET fk_profile_id = ".$this->db->escape($last_inserted_id).",fk_counry_id = ".$this->db->escape($this->getCountryidByName($data['country_name'])->id).",fk_city_id = ".$this->db->escape($this->getCityIdByCityName($data['city_name'])->id);if ($data['area_name']) : $sql_str .= ",fk_area_id = ".$this->db->escape($this->getAreaIdByName($data['area_name'])->id ? $this->getAreaIdByName($data['area_name'])->id : "Not Available").",area_name = ".$this->db->escape($data['area_name']); endif ; $sql_str .= ",address = ".$this->db->escape($data['address']).",google_map_url = ".$this->db->escape($data['google_map_url']).",created_by = 0 , created_date = NOW() ,country_name = ".$this->db->escape($data['country_name']).", city_name = ".$this->db->escape($data['city_name']).",pincode = ".$this->db->escape($data['pincode']).",excel_code = ".$this->db->escape($excel_code);
		return $this->db->query($sql_str);
	}
	public function getAreaIdByName($area_name)
	{
		$sql_str = "SELECT * FROM area WHERE area_name = ".$this->db->escape($area_name);
		return $this->db->query($sql_str)->row();
	}
	public function setExcelProfilePaymentInfo($data , $excel_code , $last_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_payment_info SET fk_profile_id = ".$this->db->escape($last_inserted_id).",fk_payment_type_id = ".$this->db->escape($this->getPAymentTypeIdByPaymentType($data['payment_type'])->id).",fk_payment_type_name = ".$this->db->escape($data['payment_type']).",excel_code = ".$this->db->escape($excel_code);
		return $this->db->query($sql_str);
	}
	public function getPAymentTypeIdByPaymentType($payment_type)
	{
		$sql_str = "SELECT * FROM payment_info WHERE payment_type_name = ".$this->db->escape($payment_type);
		return $this->db->query($sql_str)->row();
	}
	public function setExcelSpaservicesCategory($data , $excel_code , $last_inserted_id)
	{
		$sql_str = "INSERT INTO spa_profile_services_category SET fk_category_id = ".$this->db->escape($this->getCategoryidByName($data['category_name'])->id).",fk_services_names = ".$this->db->escape($data['services_names']).",fk_services_id = ".$this->db->escape($this->getServicesIdByName($data['services_names'])->id).",fk_category_name = ".$this->db->escape($data['category_name']).",created_by = 0 , created_date = NOW() , fk_profile_id = ".$this->db->escape($last_inserted_id).",excel_code = ".$this->db->escape($excel_code);
		$this->db->query($sql_str);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();return true;
		} else {
			$this->db->trans_rollback();return fasle ;
		}
	}
	public function getCategoryidByName($category_name)
	{
		$sql_str = "SELECT * FROM category WHERE category_name = ".$this->db->escape($category_name);
		return $this->db->query($sql_str)->row();
	}
	public function getServicesIdByName($services_name)
	{
		$sql_str = "SELECT * FROM services WHERE services_name = ".$this->db->escape($services_name);
		return $this->db->query($sql_str)->row();
	}
	public function getAllSpalist()
	{
		$sql_str = "SELECT id , title , created_date FROM spa_profile";
		return $this->db->query($sql_str)->result();
	}
}