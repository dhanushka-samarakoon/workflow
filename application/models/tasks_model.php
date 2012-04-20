<?php
class Tasks_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_tasks($TaskID = FALSE, $Closed = FALSE)
	{
		if ($TaskID === FALSE && $Closed === FALSE)
		{
			$query = $this->db->query('SELECT TaskID, Title, Author, KSUAuthors, Tasks.PubID, Tasks.StatusID, status_desc, 
							Tasks.UserID, UserName, FirstName, LastName, user_email, Notes, FileNames, CreatedDate, LastUpdatedDate 
						FROM Tasks, Status, Users 
						WHERE Tasks.StatusID = Status.StatusID 
						AND Tasks.UserID = Users.UserID 
						AND Tasks.StatusID>=0 ORDER BY TaskID ASC');
			return $query;
		}
                
                if ($TaskID === FALSE && $Closed === TRUE)
		{
			$query = $this->db->query('SELECT TaskID, Title, Author, KSUAuthors, Tasks.PubID, Tasks.StatusID, status_desc, 
							Tasks.UserID, UserName, FirstName, LastName, user_email, Notes, FileNames, CreatedDate, LastUpdatedDate 
						FROM Tasks, Status, Users 
						WHERE Tasks.StatusID = Status.StatusID 
						AND Tasks.UserID = Users.UserID 
						AND Tasks.StatusID<0 ORDER BY TaskID ASC');
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
	
	public function get_tasks_by_month($InsertedVia, $StartDate = FALSE, $EndDate = FALSE)
	{
		if ($StartDate === FALSE OR $EndDate == FALSE)
		{
			$query = $this->db->query('SELECT MONTHNAME(Tasks.CreatedDate) AS Month , YEAR(Tasks.CreatedDate) AS Year, COUNT( * ) Total 
							FROM Tasks 
                                                        WHERE InsertedVia="'.$InsertedVia.'" 
							GROUP BY YEAR( Tasks.CreatedDate) DESC, MONTH(Tasks.CreatedDate) DESC');
			return $query;
		}
		$query = $this->db->query('SELECT MONTHNAME(Tasks.CreatedDate) AS Month , YEAR(Tasks.CreatedDate) AS Year, COUNT( * ) Total 
							FROM Tasks 
							WHERE InsertedVia="'.$InsertedVia.'"
                                                            AND CreatedDate >= "'.$StartDate.'" 
                                                            AND CreatedDate <= "'.$EndDate.'" 
							GROUP BY YEAR( Tasks.CreatedDate) DESC, MONTH(Tasks.CreatedDate) DESC');
		return $query;
	}
	
	public function get_tasks_closed_by_month($InsertedVia, $StartDate = FALSE, $EndDate = FALSE)
	{
		if ($StartDate === FALSE OR $EndDate == FALSE)
		{
			$query = $this->db->query('SELECT MONTHNAME(Tasks.CreatedDate) AS Month , YEAR(Tasks.CreatedDate) AS Year, Status.StatusID AS ID, Status.status_desc, COUNT( * ) Total 
                                                        FROM Tasks, Status 
                                                        WHERE InsertedVia="'.$InsertedVia.'" 
                                                            AND Tasks.StatusID<0 
                                                            AND Tasks.StatusID=Status.StatusID
                                                        GROUP BY YEAR( Tasks.CreatedDate) DESC, MONTH(Tasks.CreatedDate) DESC, Tasks.StatusID');
			return $query;
		}
		$query = $this->db->query('SELECT MONTHNAME(Tasks.CreatedDate) AS Month , YEAR(Tasks.CreatedDate) AS Year, Status.StatusID AS ID, Status.status_desc, COUNT( * ) Total 
							FROM Tasks, Status 
							WHERE InsertedVia="'.$InsertedVia.'" 
                                                            AND Tasks.StatusID<0 
                                                            AND Tasks.StatusID=Status.StatusID 
                                                            AND CreatedDate >= "'.$StartDate.'" 
                                                            AND CreatedDate <= "'.$EndDate.'" 
							GROUP BY YEAR( Tasks.CreatedDate) DESC, MONTH(Tasks.CreatedDate) DESC');
		return $query;
	}
	
	public function get_task_metadata($TaskID)
	{
		$query = $this->db->query('SELECT MetaDataValues.TaskID, MetaDataKey.MetaDataName, MetaDataValues.MetaDataValue
						FROM MetaDataValues, MetaDataKey
						WHERE MetaDataValues.MetaDataID=MetaDataKey.MetaDataID
						AND MetaDataValues.TaskID='.$TaskID.' ORDER BY MetaDataOrder');
		return $query;
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