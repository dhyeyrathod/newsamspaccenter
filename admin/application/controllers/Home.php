<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author jay rathod
*/
class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) : redirect('account/login') ; endif ;
		$this->load->model('admin');
	}
	public function index()
	{
		$this->load->view('home_view');
	}
	public function area_sync()
	{
		$all_profile_location_info = $this->admin->getAllprofileLocationDetails();
		foreach ($all_profile_location_info as $key => $profile_location_info) {
			try {
				$pincodeApiRes = json_decode(file_get_contents("http://postalpincode.in/api/pincode/".$profile_location_info->pincode));
				$set_master_area_res = json_decode($this->admin->setaAreaMasterByProfileInfo($pincodeApiRes,$profile_location_info));
				$updateProfileArea = $this->admin->setProfileArea($set_master_area_res , $profile_location_info);	
				echo "<pre>";print_r($set_master_area_res);
			} catch (Exception $e) {
				echo "<pre>";print_r($e);exit();
			}
			
		}
	}
}
