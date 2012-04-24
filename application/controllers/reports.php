<?php
class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tasks_model');
		$this->load->model('Users_model');
	}

	public function index()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		$data['form_tasks']             = $this->Tasks_model->get_tasks_by_month('Form');
                $data['refworks_tasks']         = $this->Tasks_model->get_tasks_by_month('Refworks');
                
                $form_tasks_closed = $this->Tasks_model->get_tasks_closed_by_month('Form');
                $TableArr = array();
                foreach ($form_tasks_closed->result_array() as $task){ 
                    $Year   = $task['Year'];
                    $Month  = $task['Month'];
                    $ID     = $task['ID'];
                    $Total  = $task['Total'];

                    $TableArr[$Year.' - '.$Month]['Name'] = $Year.' - '.$Month;
                    $TableArr[$Year.' - '.$Month][$ID] = $Total;
                }
		$data['form_tasks_closed'] = $TableArr;
                
                $refworks_tasks_closed = $this->Tasks_model->get_tasks_closed_by_month('Refworks');
                $TableArr = array();
                foreach ($refworks_tasks_closed->result_array() as $task){ 
                    $Year   = $task['Year'];
                    $Month  = $task['Month'];
                    $ID     = $task['ID'];
                    $Total  = $task['Total'];

                    $TableArr[$Year.' - '.$Month]['Name'] = $Year.' - '.$Month;
                    $TableArr[$Year.' - '.$Month][$ID] = $Total;
                }
                $data['refworks_tasks_closed']  = $TableArr;
                
		$data['title'] = 'Task Report';
		
		$feedbackArray = array();
		array_push($feedbackArray,array('message' => 'Report for all the Tasks ', 'message_type' => 'info'));
		$data['feedback'] = $feedbackArray;
		
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function byDates()
	{
		//Redirect to login page, if NOT logged in
		$this->Users_model->is_logged();
		
		if(empty($_POST)){
			$this->load->helper('url');
			redirect('reports');
		}
		
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		
                $data['form_tasks']     = $this->Tasks_model->get_tasks_by_month('Form',$startDate, $endDate);
                $data['refworks_tasks'] = $this->Tasks_model->get_tasks_by_month('Refworks',$startDate, $endDate);
		
                $form_tasks_closed      = $this->Tasks_model->get_tasks_closed_by_month('Form',$startDate, $endDate);
                $TableArr = array();
                foreach ($form_tasks_closed->result_array() as $task){ 
                    $Year   = $task['Year'];
                    $Month  = $task['Month'];
                    $ID     = $task['ID'];
                    $Total  = $task['Total'];

                    $TableArr[$Year.' - '.$Month]['Name'] = $Year.' - '.$Month;
                    $TableArr[$Year.' - '.$Month][$ID] = $Total;
                }
		$data['form_tasks_closed'] = $TableArr;
                
                $refworks_tasks_closed  = $this->Tasks_model->get_tasks_closed_by_month('Refworks',$startDate, $endDate);
                $TableArr = array();
                foreach ($refworks_tasks_closed->result_array() as $task){ 
                    $Year   = $task['Year'];
                    $Month  = $task['Month'];
                    $ID     = $task['ID'];
                    $Total  = $task['Total'];

                    $TableArr[$Year.' - '.$Month]['Name'] = $Year.' - '.$Month;
                    $TableArr[$Year.' - '.$Month][$ID] = $Total;
                }
                $data['refworks_tasks_closed']  = $TableArr;
                
		$data['title'] = 'Task Report';
		
		$feedbackArray = array();
		array_push($feedbackArray,array('message' => 'Report from '.$startDate.' to '.$endDate, 'message_type' => 'info'));
		$data['feedback'] = $feedbackArray;
			
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index', $data);
		$this->load->view('templates/footer');
	}

}

?>