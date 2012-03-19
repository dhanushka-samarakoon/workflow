<?php
class Publishers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Publishers_model');
	}

	public function index()
	{
		$data['publishers'] = $this->Publishers_model->get_publishers();
		$data['title'] = 'Publishers List';
	
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($PubID)
	{
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
		$this->load->helper('form');
		
		$data['title'] = 'Add a Publisher';
		
		$this->load->view('templates/header', $data);
		$this->load->view('publishers/add', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		$PubInfo = $this->input->post();
		$newPubID = $this-> Publishers_model-> insert_publisher($PubInfo);
		
		$this->load->helper('url');
		redirect('publishers/view/'.$newPubID);
	}
	
	public function edit($PubID)
	{
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
		$PubInfo = $this->input->post();
		$PubID = $this-> Publishers_model-> update_publisher($PubInfo);
		
		$this->load->helper('url');
		redirect('publishers/view/'.$PubID);
	}
	
	public function remove($PubID)
	{
		$data['publisher'] = $this-> Publishers_model-> get_publishers($PubID);
		
		if (empty($data['publisher']))
		{
			show_404();
		}
		
		$PubID = $this-> Publishers_model-> delete_publisher($PubID);
		
		$this->load->helper('url');
		redirect('publishers');
	}

}