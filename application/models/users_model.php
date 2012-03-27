<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function is_logged()
	{
		// check if logged in
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')) {
			$this->load->helper('url');
			redirect('users/login');
		}
		return true;
	}
	
	public function get_users($UserID = FALSE)
	{
		if ($UserID === FALSE)
		{
			$query = $this->db->query('SELECT * FROM Users WHERE UserID!=0');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Publishers WHERE PubID='.$UserID);
		return $query->row_array();
	}
	
}

?>