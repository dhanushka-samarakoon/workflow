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

}