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
	
	public function insert_publisher()
	{
		$data = array(
		'PubName' => $this->input->post('PubName')
		);
		
		$this->db->insert('Publishers', $data);
		return $this->db->insert_id();
	}
}