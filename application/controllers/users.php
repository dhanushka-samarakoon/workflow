<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		
	}
	
	public function add()
	{
		$this->load->helper('form');
		
		$data['title'] = 'Add a User';
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/add', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		// load the library
		$this->load->library('SimpleLoginSecure');
		// create a new user
		$this->simpleloginsecure->create($this->input->post('UserEmail'), $this->input->post('UserPass'));
	}
	
	public function login()
	{
		$this->load->helper('form');
		
		$data['title'] = 'Login';
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/login', $data);
		$this->load->view('templates/footer');
	}
	
	public function logout()
	{
		//Destroy session
		$this->load->library('session');
		$this->session->sess_destroy();
		
		// Redirect to Login page
		$this->load->helper('url');
		redirect('users/login');
	}
	
	public function validate()
	{
		// load the library
		$this->load->library('session');
		$this->load->library('SimpleLoginSecure');
		
		// check if logged in
		if($this->session->userdata('logged_in')){
			// Redirect to Login page
			$this->load->helper('url');
			redirect(base_url());
		}
		// attempt to login
		if($this->simpleloginsecure->login($this->input->post('UserEmail'), $this->input->post('UserPass'))) {
			// Redirect to Login page
			$this->load->helper('url');
			redirect(base_url());
		}else{
			// Redirect to Login page
			$this->load->helper('url');
			redirect('users/login');
		}
	}
}

?>