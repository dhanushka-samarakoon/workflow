<?php
class Tasks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tasks_model');
		$this->load->model('Publishers_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		$data['tasks'] = $this->Tasks_model->get_tasks();
		$data['title'] = 'Task List';
	
		$this->load->view('templates/header', $data);
		$this->load->view('tasks/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function add()
	{
		//Get a List of Publishers
		$publishers = $this->Publishers_model->get_publishers();
		$PublishersArray = array();
		foreach($publishers->result_array() as $publisher){
			$PublishersArray[$publisher['PubID']] = $publisher['PubName'];
		}
		$data['Publishers'] = $PublishersArray;
		
		//Get a List of Status
		$StatusList = $this->Tasks_model->get_status();
		$StatusArray = array();
		foreach($StatusList->result_array() as $Status){
			$StatusArray[$Status['StatusID']] = $Status['status_desc'];
		}
		$data['Status'] = $StatusArray;
		
		//Get a List of Users
		$users = $this->Users_model->get_users();
		$UsersArray = array();
		foreach($users->result_array() as $user){
			$UsersArray[$user['UserID']] = $user['FirstName'].' '.$user['LastName'];
		}
		$data['Users'] = $UsersArray;
		
		$this->load->helper('form');
		
		$data['title'] = 'Add a Task';
		
		$this->load->view('templates/header', $data);
		$this->load->view('tasks/add', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		$TaskInfo = $this->input->post();
		$newTaskID = $this-> Tasks_model-> insert_task($TaskInfo);
		
		$this->load->helper('url');
		redirect('tasks/edit/'.$newTaskID);
	}
	
	public function edit($TaskID)
	{
		//Get a List of Publishers
		$publishers = $this->Publishers_model->get_publishers();
		$PublishersArray = array();
		foreach($publishers->result_array() as $publisher){
			$PublishersArray[$publisher['PubID']] = $publisher['PubName'];
		}
		$data['publishers'] = $PublishersArray;
		
		//Get a List of Status
		$StatusList = $this->Tasks_model->get_status();
		$StatusArray = array();
		foreach($StatusList->result_array() as $Status){
			$StatusArray[$Status['StatusID']] = $Status['status_desc'];
		}
		$data['Status'] = $StatusArray;
		
		//Get a List of Users
		$users = $this->Users_model->get_users();
		$UsersArray = array();
		foreach($users->result_array() as $user){
			$UsersArray[$user['UserID']] = $user['FirstName'].' '.$user['LastName'];
		}
		$data['Users'] = $UsersArray;
		
		$data['task'] = $this-> Tasks_model-> get_tasks($TaskID);
		
		if (empty($data['task']))
		{
			show_404();
		}
	
		$data['title'] = 'Edit Task';
		
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