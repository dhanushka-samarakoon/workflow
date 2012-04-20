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
			$query = $this->db->query('SELECT * FROM Users WHERE UserID!=-1');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Users WHERE UserID='.$UserID);
		return $query->row_array();
	}
	
	public function get_user_byusername($UserName = FALSE)
	{
		if ($UserName === FALSE)
		{
			return false;
		}
		
		$query = $this->db->query('SELECT * FROM Users WHERE UserName="'.$UserName.'"');
		return $query->row_array();
	}
	
	public function insert_user($data)
	{
		$this->db->insert('Users', $data);
		return $this->db->insert_id();
	}
	
	public function update_user($UserInfo)
	{
		$this->db->where('UserID', $UserInfo['UserID']);
		$this->db->update('Users', $UserInfo);
		return $UserInfo['UserID'];
	}
}

?>