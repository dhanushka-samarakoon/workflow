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
			'PubName' => $this->input->post('PubName'),
			'PolicyLink' => $this->input->post('PolicyLink'),
			'PolicyText' => $this->input->post('PolicyText'),
			'what_we_can_put_up' => $this->input->post('what_we_can_put_up'),
			'what_we_need_to_add' => $this->input->post('what_we_need_to_add'),
			'embargo' => $this->input->post('embargo'),
			'notes' => $this->input->post('notes')
		);
		
		$this->db->insert('Publishers', $data);
		return $this->db->insert_id();
	}
	
	public function update_publisher($PubInfo = FALSE)
	{
		$data = array(
			'PubName' => $this->input->post('PubName'),
			'PolicyLink' => $this->input->post('PolicyLink'),
			'PolicyText' => $this->input->post('PolicyText'),
			'what_we_can_put_up' => $this->input->post('what_we_can_put_up'),
			'what_we_need_to_add' => $this->input->post('what_we_need_to_add'),
			'embargo' => $this->input->post('embargo'),
			'notes' => $this->input->post('notes')
		);
		
		$this->db->where('PubID', $PubInfo['PubID']);
		$this->db->update('Publishers', $data);
		return $PubInfo['PubID'];
	}
	
	public function delete_publisher($PubID = FALSE)
	{
		$this->db->where('PubID', $PubID);
		$this->db->delete('Publishers');
	}
}