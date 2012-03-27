<?php
class Refworks_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
		$this->load->helper('file');
	}
	
	public function get_file($fileName)
	{
		return read_file('./uploads/'.$fileName);
	}
	
	public function get_files()
	{
		return get_dir_file_info('./uploads/', TRUE);
	}
	
	public function move_file($fileName)
	{
		$fileString = read_file('./uploads/'.$fileName);
		if (!write_file('./uploads/processed/'.$fileName, $fileString)){
			return false;
		}else{
			//FILES NOT BEEN DELETED. CHECK PERMISSIONS
			delete_files('./uploads/'.$fileName);
			return true;
		}
	}
}

?>