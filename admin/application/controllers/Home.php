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
	}
	public function index()
	{
		
		$this->load->view('home_view');
	}
}
