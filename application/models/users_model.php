<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
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