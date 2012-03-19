<?php
class Publishers_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_publishers($PubID = FALSE)
	{
		if ($PubID === FALSE)
		{
			$query = $this->db->get('Publishers');
			return $query->result_array();
		}
		
		$query = $this->db->query('SELECT * FROM Publishers WHERE PubID='.$PubID);
		return $query->row_array();
	}
	
	public function insert_publisher($PubInfo = FALSE)
	{
		$sql = "INSERT INTO Publishers (PubName) 
        VALUES (".$this->db->escape($PubInfo['PubName']).")";

		$this->db->query($sql);
		
		//echo $this->db->affected_rows();
	}
}