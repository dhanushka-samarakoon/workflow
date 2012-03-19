<?php
class Tasks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tasks_model');
		$this->load->model('Publishers_model');
	}

	public function index()
	{
		$data['tasks'] = $this->Tasks_model->get_tasks();
		$data['title'] = 'Task List';
	
		$this->load->view('templates/header', $data);
		$this->load->view('tasks/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function edit($TaskID)
	{
		$publishers = $this->Publishers_model->get_publishers();
		$PublishersArray = array();
		foreach($publishers->result_array() as $publisher){
			$PublishersArray[$publisher['PubID']] = $publisher['PubName'];
		}
		$data['publishers'] = $PublishersArray;
		
		$data['task'] = $this-> Tasks_model-> get_tasks($TaskID);
		
		if (empty($data['task']))
		{
			show_404();
		}
	
		$data['title'] = $data['task']['Title'];
		
		$this->load->helper('form');
		
		$this->load->view('templates/header', $data);
		$this->load->view('tasks/edit', $data);
		$this->load->view('templates/footer');
	}
	
	public function update()
	{
		$TaskInfo = $this->input->post();
		$TaskID = $this-> Tasks_model-> update_task($TaskInfo);
		
		$this->load->helper('url');
		redirect('tasks/');
	}

}