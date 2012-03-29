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
			$query = $this->db->query('SELECT * FROM Publishers WHERE PubID!=0 ORDER BY PubName ASC');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Publishers WHERE PubID='.$PubID);
		return $query->row_array();
	}
	
	public function get_publisher_byname($PubName)
	{
		$query = $this->db->query('SELECT * FROM Publishers WHERE PubName="'.$PubName.'"');
		return $query->row_array();
	}
	
	public function insert_publisher($data)
	{
		$this->db->insert('Publishers', $data);
		return $this->db->insert_id();
	}
	
	public function update_publisher($PubInfo)
	{
		$this->db->where('PubID', $PubInfo['PubID']);
		$this->db->update('Publishers', $PubInfo);
		return $PubInfo['PubID'];
	}
	
	public function delete_publisher($PubID = FALSE)
	{
		$query = $this->db->get_where('Tasks', array('PubID' => $PubID ));
		$results = $query->row_array();
		if (count($results)<=0){
			$this->db->where('PubID', $PubID);
			$this->db->delete('Publishers');
			return true;
		}
		return false;
	}
}

?>