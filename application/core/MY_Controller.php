<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class MY_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('friend');
		$this->load->library('pagination');
		$this->friend = new friend ;
		$this->set_current_locaation();
	}
	public function set_current_locaation()
	{
		if (!$this->session->userdata('current_locaation') && $this->session->userdata('current_locaation') == '') {
			// $response = json_decode(file_get_contents("http://api.ipstack.com/".$this->friend->getRemoteUserIpaddress()->ip."?access_key=fa943f19d6d0b6a949dddd0be9c25951&format=1"));
			// $response = json_decode(file_get_contents("http://api.ipstack.com/123.136.175.162?access_key=fa943f19d6d0b6a949dddd0be9c25951&format=1"));
			$this->session->set_userdata(array('current_locaation' => 'Mumbai'));
			$this->session->set_userdata(array('current_locaation_country' => 'India'));
		}
	}
}	