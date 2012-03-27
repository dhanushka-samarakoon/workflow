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
							Tasks.UserID, UserName, FirstName, LastName, user_email, Notes, FileNames, CreatedDate, LastUpdatedDate 
						FROM Tasks, Status, Users 
						WHERE Tasks.StatusID = Status.StatusID 
						AND Tasks.UserID = Users.UserID 
						AND Tasks.StatusID!=-1 ORDER BY TaskID ASC');
			return $query;
		}
		
		$query = $this->db->query('SELECT TaskID, Title, Author, KSUAuthors, Tasks.PubID, Tasks.StatusID, status_desc, 
							Tasks.UserID, UserName, FirstName, LastName, user_email, Notes, FileNames, CreatedDate, LastUpdatedDate  
						FROM Tasks, Status, Users 
						WHERE Tasks.StatusID = Status.StatusID 
						AND Tasks.UserID = Users.UserID 
						AND TaskID='.$TaskID);
		return $query->row_array();
	}
	
	public function get_metadatakeys()
	{
		$query = $this->db->query('SELECT * FROM MetaDataKey');
		return $query;
	}
	
	public function insert_task($data)
	{
		$this->db->insert('Tasks', $data);
		return $this->db->insert_id();
	}
	
	public function insert_metadata_batch($data)
	{
		return $this->db->insert_batch('MetaDataValues', $data);
	}
	
	public function update_task($data)
	{
		$this->db->where('TaskID', $data['TaskID']);
		$this->db->update('Tasks', $data);
		return $data['TaskID'];
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

?>