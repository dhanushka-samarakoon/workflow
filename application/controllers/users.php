<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->library('session');
		$this->load->helper('security');
	}

	public function index()
	{
		
	}
	
	public function add()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$this->load->helper('form');
		
		$data['title'] = 'Add a User';
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/add', $data);
		$this->load->view('templates/footer');
	}
	
	public function insert()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		if(empty($_POST)){
			$this->load->helper('url');
			redirect('users/add');
		}
		//Insert User to DB
		$UserInfo = array(
			'UserName' => $this->input->post('UserName'),
			'user_email' => $this->input->post('UserEmail'),
			'user_pass' => do_hash($this->input->post('UserPass'),'md5')
		);
		$newUserID = $this-> Users_model-> insert_user($UserInfo);
		
		$this->load->helper('url');
		redirect(base_url());
	}
	
	public function edit()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$this->load->helper('form');
		
		$data['title'] = 'Edit User';
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/edit', $data);
		$this->load->view('templates/footer');
	}
	
	public function update()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		if(empty($_POST)){
			$this->load->helper('url');
			redirect('users/edit');
		}
		
		//Update password
		$UserID = $this->session->userdata('UserID');
		
		$UserInfo = array(
			'UserID' => $UserID,
			'user_pass' => do_hash($this->input->post('UserPass'),'md5')
		);
		$UserID = $this-> Users_model-> update_user($UserInfo);
		
		// Redirect to Home page
		$this->load->helper('url');
		redirect(base_url());
	}
	
	public function login()
	{
		$this->load->helper('form');
		
		$data['title'] = 'Login';
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/login', $data);
		$this->load->view('templates/footer');
	}
	
	public function validate()
	{
		// load the library
		$this->load->library('session');
		
		// check if logged in
		if($this->session->userdata('logged_in')){
			// Redirect to Home page
			$this->load->helper('url');
			redirect(base_url());
		}
		
		$user = $this->Users_model->get_user_byusername($this->input->post('UserName'));
		if ($user==null){
			$this->load->helper('url');
			redirect('users/login');
		}
		if (strcmp(do_hash($this->input->post('UserPass'),'md5'),$user['user_pass'])==0){
				$sessionInfo = array(
					'logged_in' => TRUE,
					'UserID'  	=> $user['UserID'],
					'UserName'  => $user['UserName'],
					'FirstName' => $user['FirstName'],
					'LastName'  => $user['LastName'],
					'user_email'=> $user['user_email']
               );
			$this->session->set_userdata($sessionInfo);
			
			$this->load->helper('url');
			redirect(base_url());
		}else{
			$this->load->helper('url');
			redirect('users/login');
		}
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
}

?>