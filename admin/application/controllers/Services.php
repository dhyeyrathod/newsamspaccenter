<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Jay Rathod
*/
class services extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
	}
	public function call()
	{
		echo $this->home->test();
	}
	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('services_name','services Name','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('status','Status','required|integer');

			if ($this->form_validation->run() && !$this->admin->checkservicesPresent($this->input->post('services_name'))) {
				$this->admin->setservices($this->input->post());
				$this->session->set_flashdata('success_services','services Added successfully..!!');
				redirect('services');
			} else {
				$this->session->set_flashdata('error_services','services Not Added..!! some field is missing or services is present alrady');
				redirect('services');
			}
		}
		$data['all_services_key'] = $this->admin->getAllservices();
		$this->load->view('services_view',$data);
	}
	public function delete_services()
	{
		$services_id = $this->friend->base64url_decode($this->uri->segment(3));
		if ($services_id && is_numeric($services_id)) {
			if ($this->admin->deleteservices($services_id)) {
				$this->session->set_flashdata('success_services','services Deleted successfully..!!');
				redirect('services');
			} else {
				$this->session->set_flashdata('error_services','services Not has been deleted');
				redirect('services');
			}
		} else {
			$this->session->set_flashdata('error_services','services is not present');
			redirect('services');
		}
	}
	public function getservices_data()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$services_id = $this->input->post('services_id');
			if (is_numeric($services_id) && $this->admin->checkservicesPresentById($services_id)) {
				$respons = array('status'=>'success','message'=>'data fetch successfully','data'=>$this->admin->getservicesById($services_id));
			} else {
				$respons = array('status'=>'failure','message'=>'data is not present');
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($respons));
		}
	}
}