<?php
class Refworks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Refworks_model');
		$this->load->model('Users_model');
		
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['title'] = 'Refworks Files';
		$data['files'] = $this->Refworks_model->get_files();
		
		$feedbackArray = array();
		$data['feedback'] = $feedbackArray;
		
		$this->load->view('templates/header', $data);
		$this->load->view('refworks/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function do_upload()
	{
		if(empty($_POST)){
			$this->load->helper('url');
			redirect('refworks');
		}
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xml|XML|Xml';
		$config['max_size']	= '10000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			//Upload Fail
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$feedbackArray = array();
			array_push($feedbackArray,array('message' => $this->upload->display_errors(), 'message_type' => 'error'));
			$data['feedback'] = $feedbackArray;
		
			$this->load->view('templates/header', $data);
			$this->load->view('refworks/index', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//Upload Successful
			$data['title'] = 'Refworks Files';
			$data['files'] = $this->Refworks_model->get_files();
			
			$feedbackArray = array();
			array_push($feedbackArray,array('message' => 'File Uploaded', 'message_type' => 'success'));
			$data['feedback'] = $feedbackArray;
			
			$this->load->view('templates/header', $data);
			$this->load->view('refworks/index', $data);
			$this->load->view('templates/footer');
		}
	}
	
	public function insert()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
                if(empty($_POST)){
                    $this->load->helper('url');
                    redirect('refworks');
		}
                
		$this->load->library('simplexml');
		
		//$this->load->helper('file');
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->helper('url');
		
		$this->load->model('Publishers_model');
		$this->load->model('Tasks_model');
		
		$TitleXMLKey		= 't1';
		$PubXMLKey		= 'pb';
		$KSUContactXMLKey	= 'u2';
		$KSUAuthorsXMLKey	= 'u1';
		
		$datestring = "%Y-%m-%d";
		$NEW_STATUS = 1;
		$isSuccess = true;
                
		$fileName = $this->input->post('RefworksFile');
		$RefworksXML = $this->Refworks_model->get_file($fileName);
		$RefworksArr = $this->simplexml->xml_parse($RefworksXML);
		$refs = $RefworksArr['reference'];
		
		//$UploadStatusArray = array();
                $feedbackArray = array();
		
		foreach( $refs as $ref ){
			$title = element($TitleXMLKey,$ref);
			$publisher = element($PubXMLKey,$ref);
			$KSUContact = element($KSUContactXMLKey,$ref);
			$KSUAuthors = element($KSUAuthorsXMLKey,$ref);
			$PubID = 0;
                        
			if(trim($publisher)!=''){
				$PubInfo = $this-> Publishers_model-> get_publisher_byname($publisher);
			
				if (empty($PubInfo)){
					//Insert Publisher and get ID
					$PubInfo = array('PubName' => $publisher);
					$newPubID = $this-> Publishers_model-> insert_publisher($PubInfo);
                                        if($newPubID>0){
                                            $isSuccess = false;
                                            array_push($feedbackArray,array('message' => 'Insert Publisher '.$PubInfo['PubName'].' failed', 'message_type' => 'error'));
                                         }
					
				}else{
					//Get PubID
					$PubID = $PubInfo['PubID'];
				}
			}
			
			$TaskInfo = array(
				'Title' => $title,
				'Author' => $KSUContact,
				'KSUAuthors' => $KSUAuthors,
				'PubID' => $PubID,
				'StatusID' => $NEW_STATUS,
				'UserID' => $this->input->post('User'),
                                'InsertedVia' => 'Refworks',
				'CreatedDate' => mdate($datestring, now()),
				'LastUpdatedDate' => mdate($datestring, now())
			);
			$newTaskID = $this-> Tasks_model-> insert_task($TaskInfo);
			if($newTaskID>0){
                            $isSuccess = false;
                            array_push($feedbackArray,array('message' => 'Insert '.$TaskInfo['Title'].' failed', 'message_type' => 'error'));
                        }
                        
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
                        if(!$status){
                            $isSuccess = false;
                            array_push($feedbackArray,array('message' => 'Insert Metadata for '.$TaskInfo['Title'].' failed', 'message_type' => 'error'));
                        }
		}
		
                $data['title'] = 'Refworks Files';
                $data['files'] = $this->Refworks_model->get_files();
                
                if($isSuccess){
                    array_push($feedbackArray,array('message' => 'Tasks created successful', 'message_type' => 'success'));
                    $this->Refworks_model->move_file($fileName);
                }
                $data['feedback'] = $feedbackArray;

                $this->load->view('templates/header', $data);
                $this->load->view('refworks/index', $data);
                $this->load->view('templates/footer');
	}
	
}
?>