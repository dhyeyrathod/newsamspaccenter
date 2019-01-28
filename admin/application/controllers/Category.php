<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class Category extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) : redirect('account/login') ; endif ;
		$this->load->model('admin');
	}
	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('category_name','Category Name','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('status','Status','required|integer');

			if ($this->form_validation->run() && !$this->admin->checkCategoryPresent($this->input->post('category_name'))) {
				$this->admin->setCategory($this->input->post());
				$this->session->set_flashdata('success_category','Category Added successfully..!!');
				redirect('category');
			} else {
				$this->session->set_flashdata('error_category','Category Not Added..!! some field is missing or category is present alrady');
				redirect('category');
			}
		}
		$data['all_category_key'] = $this->admin->getAllCategory();
		$this->load->view('category_view',$data);
	}
	public function delete_Category()
	{
		$category_id = $this->friend->base64url_decode($this->uri->segment(3));
		if ($category_id && is_numeric($category_id)) {
			if ($this->admin->deleteCategory($category_id)) {
				$this->session->set_flashdata('success_category','Category Deleted successfully..!!');
				redirect('category');
			} else {
				$this->session->set_flashdata('error_category','category Not has been deleted');
				redirect('category');
			}
		} else {
			$this->session->set_flashdata('error_category','Category is not present');
			redirect('category');
		}
	}
	public function getcategory_data()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$category_id = $this->input->post('category_id');
			if (is_numeric($category_id) && $this->admin->checkCategoryPresentById($category_id)) {
				$respons = array('status'=>'success','message'=>'data fetch successfully','data'=>$this->admin->getCategoryById($category_id));
			} else {
				$respons = array('status'=>'failure','message'=>'data is not present');
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($respons));
		}
	}
}