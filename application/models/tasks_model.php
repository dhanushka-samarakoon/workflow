<?php
class Tasks_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_tasks($TaskID = FALSE)
	{
		if ($TaskID === FALSE)
		{
			$query = $this->db->query('SELECT * FROM Tasks WHERE StatusID!=-1 ORDER BY TaskID ASC');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Tasks WHERE TaskID='.$TaskID);
		return $query->row_array();
	}
	
	public function update_task($TaskInfo = FALSE)
	{
		$data = array(
			'Title' => $this->input->post('Title'),
			'Author' => $this->input->post('Author'),
			'KSUAuthors' => $this->input->post('KSUAuthors'),
			'PubID' => $this->input->post('PubID'),
			'StatusID' => $this->input->post('StatusID'),
			'UserID' => $this->input->post('UserID'),
			'Notes' => $this->input->post('Notes'),
			'FileNames' => $this->input->post('FileNames'),
			'CreatedDate' => $this->input->post('CreatedDate'),
			'LastUpdatedDate' => $this->input->post('LastUpdatedDate')
		);
		
		$this->db->where('TaskID', $TaskInfo['TaskID']);
		$this->db->update('Tasks', $data);
		return $TaskInfo['TaskID'];
	}
}