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
			$query = $this->db->query('SELECT TaskID, Title, Author, KSUAuthors, Tasks.PubID, Tasks.StatusID, status_desc, 
							Tasks.UserID, UserName, FirstName, LastName, email, Notes, FileNames, CreatedDate, LastUpdatedDate 
						FROM Tasks, Status, Users 
						WHERE Tasks.StatusID = Status.StatusID 
						AND Tasks.UserID = Users.UserID 
						AND Tasks.StatusID!=-1 ORDER BY TaskID ASC');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Tasks WHERE TaskID='.$TaskID);
		return $query->row_array();
	}
	
	public function insert_task()
	{
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		
		$data = array(
			'Title' => $this->input->post('Title'),
			'Author' => $this->input->post('Author'),
			'KSUAuthors' => $this->input->post('KSUAuthors'),
			'PubID' => $this->input->post('Publishers'),
			'StatusID' => $this->input->post('Status'),
			'UserID' => $this->input->post('User'),
			'Notes' => $this->input->post('Notes'),
			'FileNames' => $this->input->post('FileNames'),
			'CreatedDate' => mdate($datestring, now()),
			'LastUpdatedDate' => mdate($datestring, now())
		);
		
		$this->db->insert('Tasks', $data);
		return $this->db->insert_id();
	}
	
	public function update_task($TaskInfo = FALSE)
	{
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		
		$data = array(
			'Title' => $this->input->post('Title'),
			'Author' => $this->input->post('Author'),
			'KSUAuthors' => $this->input->post('KSUAuthors'),
			'PubID' => $this->input->post('Publishers'),
			'StatusID' => $this->input->post('Status'),
			'UserID' => $this->input->post('Users'),
			'Notes' => $this->input->post('Notes'),
			'FileNames' => $this->input->post('FileNames'),
			'LastUpdatedDate' => mdate($datestring, now())
		);
		
		$this->db->where('TaskID', $TaskInfo['TaskID']);
		$this->db->update('Tasks', $data);
		return $TaskInfo['TaskID'];
	}
	
	public function get_status($StatusID = FALSE)
	{
		if ($StatusID === FALSE)
		{
			$query = $this->db->query('SELECT * FROM Status ORDER BY StatusOrder ASC');
			return $query;
		}
		
		$query = $this->db->query('SELECT * FROM Status WHERE StatusID='.$StatusID);
		return $query->row_array();
	}
}