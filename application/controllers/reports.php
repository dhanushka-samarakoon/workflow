<?php
class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tasks_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['tasks'] = $this->Tasks_model->get_tasks_by_month();
		$data['tasks_closed'] = $this->Tasks_model->get_tasks_closed_by_month();
		$data['title'] = 'Task Report';
		
		$feedbackArray = array();
		array_push($feedbackArray,array('message' => 'Report for all the Tasks ', 'message_type' => 'info'));
		$data['feedback'] = $feedbackArray;
		
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function byDates()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		
		$data['tasks'] = $this->Tasks_model->get_tasks_by_month($startDate, $endDate);
		$data['tasks_closed'] = $this->Tasks_model->get_tasks_closed_by_month($startDate, $endDate);
		$data['title'] = 'Task Report';
		
		$feedbackArray = array();
		array_push($feedbackArray,array('message' => 'Report from '.$startDate.' to '.$endDate, 'message_type' => 'info'));
		$data['feedback'] = $feedbackArray;
			
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index', $data);
		$this->load->view('templates/footer');
	}

}

?>