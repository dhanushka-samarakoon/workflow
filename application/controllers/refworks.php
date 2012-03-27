<?php
class Refworks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Refworks_model');
		
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['title'] = 'Refworks Files';
		$data['files'] = $this->Refworks_model->get_files();
		
		$this->load->view('templates/header', $data);
		$this->load->view('refworks/upload_form', array('message' => '', 'message_type' => ''));
		$this->load->view('refworks/file_list', $data);
		$this->load->view('templates/footer');
	}
	
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xml|XML|Xml';
		$config['max_size']	= '1000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			//Upload Fail
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$this->load->view('templates/header', $data);
			$data = array('message' => $this->upload->display_messages(), 'message_type' => 'fail');
			$this->load->view('refworks/upload_form', $data);
			$this->load->view('refworks/file_list', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//Upload Successful
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$this->load->view('templates/header', $data);
			$data = array('message' => 'File Uploaded', 'message_type' => 'success');
			$this->load->view('refworks/upload_form', $data);
			$this->load->view('refworks/file_list', $data);
			$this->load->view('templates/footer');
		}
	}
	
	public function insert()
	{
		$this->load->library('simplexml');
		
		//$this->load->helper('file');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->helper('url');
		
		$this->load->model('Publishers_model');
		$this->load->model('Tasks_model');
		
		$TitleXMLKey		= 't1';
		$PubXMLKey			= 'pb';
		$KSUContactXMLKey	= 'u2';
		$KSUAuthorsXMLKey	= 'u1';
		
		$datestring = "%Y-%m-%d";
		$NEW_UPLOAD_STATUS = 10;
		
		$fileName = $this->input->post('RefworksFile');
		$RefworksXML = $this->Refworks_model->get_file($fileName);
		$RefworksArr = $this->simplexml->xml_parse($RefworksXML);
		$refs = $RefworksArr['reference'];
		
		$UploadStatusArray = array();
		
		foreach( $refs as $ref ){
			$title = element($TitleXMLKey,$ref);
			$publisher = element($PubXMLKey,$ref);
			$KSUContact = element($KSUContactXMLKey,$ref);
			$KSUAuthors = element($KSUAuthorsXMLKey,$ref);
			
			if(trim($publisher)!=''){
				$PubInfo = $this-> Publishers_model-> get_publisher_byname($publisher);
			
				if (empty($PubInfo)){
					//Insert Publisher and get ID
					$PubInfo = array('PubName' => $publisher);
					$newPubID = $this-> Publishers_model-> insert_publisher($PubInfo);
					
				}else{
					//Get PubID
					$PubID = $PubInfo['PubID'];
				}
			}else{
				//Publisher name not provided in the xml file
				$PubID	= 0;
			}
			
			$TaskInfo = array(
				'Title' => $title,
				'Author' => $KSUContact,
				'KSUAuthors' => $KSUAuthors,
				'PubID' => $PubID,
				'StatusID' => $NEW_UPLOAD_STATUS,
				'UserID' => $this->input->post('User'),
				'CreatedDate' => mdate($datestring, now()),
				'LastUpdatedDate' => mdate($datestring, now())
			);
			$newTaskID = $this-> Tasks_model-> insert_task($TaskInfo);
			
			$MetaDataKeys = $this-> Tasks_model-> get_metadatakeys();
			$MetaData = array();
			foreach ($MetaDataKeys->result_array() as $MetaDataKey){
				$MetaDataID = $MetaDataKey['MetaDataID'];
				$XMLKey		= $MetaDataKey['XMLKey'];
				
				$result = element($XMLKey,$ref);
				if(is_array($result)){
					foreach ($result as $CurrentNode){
						$MetaDataInfo = array(
							'TaskID' => $newTaskID,
							'MetaDataID' => $MetaDataID,
							'MetaDataValue' => $CurrentNode
						);
						array_push($MetaData,$MetaDataInfo);
					}
				}else{
					$MetaDataInfo = array(
						'TaskID' => $newTaskID,
						'MetaDataID' => $MetaDataID,
						'MetaDataValue' => $result
					);
					array_push($MetaData,$MetaDataInfo);
				}
			}
			$status = $this-> Tasks_model-> insert_metadata_batch($MetaData);
		}
		
		//$isSuccess = $this-> Tasks_model-> insert_task_batch($Tasks);
		/*if($isSuccess){
			$isMoved = $this->Refworks_model->move_file($fileName);
			
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$this->load->view('templates/header', $data);
			$data = array('message' => 'Tasks created successful', 'message_type' => 'success');
			$this->load->view('refworks/upload_form', $data);
			$this->load->view('refworks/file_list', $data);
			$this->load->view('templates/footer');
		}else{
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$this->load->view('templates/header', $data);
			$data = array('message' => 'Task creation Failed', 'message_type' => 'fail');
			$this->load->view('refworks/upload_form', $data);
			$this->load->view('refworks/file_list', $data);
			$this->load->view('templates/footer');
		}*/
	}
	
}
?>