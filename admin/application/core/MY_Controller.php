<?php 
/**
* @author Jay Rathod
*/
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('friend');
		$this->friend = new friend ;
	}	
}