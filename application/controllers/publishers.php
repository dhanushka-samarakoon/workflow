<?php
class Publishers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Publishers_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['publishers'] = $this->Publishers_model->get_publishers();
		$data['title'] = 'Publishers List';
	
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($PubID)
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['publisher'] = $this-> Publishers_model-> get_publishers($PubID);
		
		if (empty($data['publisher']))
		{
			show_404();
		}
	
		$data['title'] = $data['publisher']['PubName'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function add()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$this->load->helper('form');
		
		$data['title'] = 'Add a Publisher';
		
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/add', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		$PubInfo = array(
			'PubName' => $this->input->post('PubName'),
			'PolicyLink' => $this->input->post('PolicyLink'),
			'PolicyText' => $this->input->post('PolicyText'),
			'what_we_can_put_up' => $this->input->post('what_we_can_put_up'),
			'what_we_need_to_add' => $this->input->post('what_we_need_to_add'),
			'embargo' => $this->input->post('embargo'),
			'notes' => $this->input->post('notes')
		);
		$newPubID = $this-> Publishers_model-> insert_publisher($PubInfo);
		
		$this->load->helper('url');
		redirect('publishers/view/'.$newPubID);
	}
	
	public function edit($PubID)
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['publisher'] = $this-> Publishers_model-> get_publishers($PubID);
		
		if (empty($data['publisher']))
		{
			show_404();
		}
	
		$data['title'] = $data['publisher']['PubName'];
		
		$this->load->helper('form');
		
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/edit', $data);
		$this->load->view('templates/footer');
	}
	
	public function update()
	{
		$PubInfo = array(
			'PubID' => $this->input->post('PubID'),
			'PubName' => $this->input->post('PubName'),
			'PolicyLink' => $this->input->post('PolicyLink'),
			'PolicyText' => $this->input->post('PolicyText'),
			'what_we_can_put_up' => $this->input->post('what_we_can_put_up'),
			'what_we_need_to_add' => $this->input->post('what_we_need_to_add'),
			'embargo' => $this->input->post('embargo'),
			'notes' => $this->input->post('notes')
		);
		
		$PubID = $this-> Publishers_model-> update_publisher($PubInfo);
		
		$this->load->helper('url');
		redirect('publishers/view/'.$PubID);
	}
	
	public function remove($PubID)
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['publisher'] = $this-> Publishers_model-> get_publishers($PubID);
		
		if (empty($data['publisher']))
		{
			show_404();
		}
		
		$isDeleted = $this-> Publishers_model-> delete_publisher($PubID);
		
		$this->load->helper('url');
		redirect('publishers');
	}
}

?>