<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Worker extends Employee {

	public function __construct() {
        parent::__construct();
        
		$this->load->model("ModelTask");
				
        if ($this->session->userdata('worker') == NULL){
            if ($this->session->userdata('manager') == 1)
			    redirect("Manager");
            else if ($this->session->userdata('director') == 1)
                redirect("Director");
            else if ($this->session->userdata('admin') == 1)
                redirect("Admin");
            else
                redirect("Guest");
        }
    }

	public function getTasks(){
		$tasks = $this->ModelTask->getTasksByEmailAndCompany($this->session->userdata('employee')->email, $this->session->userdata('employee')->companyName);
		$data['tasks'] = $tasks;
		return $data;

	}

    public function index(){
	    $data = $this->getTasks();
		$this->dashboard($data);
	}
	
	public function dashboard($taskCreationData = []) {
		$this->load_view('worker/dashboard.php', $taskCreationData);
	}
	
	public function createTask() {
		
		$taskCreationData['createTaskModal'] = NULL;
		
		if ($this->input->post('name') == NULL) {
			$taskCreationData['nameInvalid'] = 1;
			$taskCreationData['name'] = NULL;		
			
		}
		else {
            if ($this->input->post('name') == "") {
				$taskCreationData['nameInvalid'] = 1;
				$taskCreationData['name'] = NULL;		
			}
			else {
				$taskCreationData['nameInvalid'] = 0;
				$taskCreationData['name'] = $this->input->post('name');
			}
		}
		
		if ($this->input->post('startDate') != NULL) {
			$datePattern = '/(1|2)[0-9]{3}-(0|1)[0-9]-(0|1|2|3)[0-9] (0|1|2)[0-9]:(0|1|2|3|4|5)[0-9]:(0|1|2|3|4|5)[0-9]/';
			if (preg_match($datePattern, $this->input->post('startDate'))) {
				$taskCreationData['startDateInvalid'] = 0;
				$taskCreationData['startDate'] = $this->input->post('startDate');
			}
			else {
				$taskCreationData['startDateInvalid'] = 1;
				$taskCreationData['startDate'] = NULL;
			}
		}
		
		if ($this->input->post('endDate') != NULL) {
			$datePattern = '/(1|2)[0-9]{3}-(0|1)[0-9]-(0|1|2|3)[0-9] (0|1|2)[0-9]:(0|1|2|3|4|5)[0-9]:(0|1|2|3|4|5)[0-9]/';
			if (preg_match($datePattern, $this->input->post('endDate'))) {
				$taskCreationData['endDateInvalid'] = 0;
				$taskCreationData['endDate'] = $this->input->post('endDate');
			}
			else {
				$taskCreationData['endDateInvalid'] = 1;
				$taskCreationData['endDate'] = NULL;
			}
		}
		
		$taskCreationData['descriptionData'] = $this->input->post('description');
		$taskCreationData['commentData'] = $this->input->post('comment');
		
		if ($taskCreationData['nameInvalid'] == 1 || $taskCreationData['startDateInvalid'] == 1 || $taskCreationData['endDateInvalid'] == 1)
		{
			$taskCreationData['createTaskModal'] = 1;
			$this->dashboard($taskCreationData);
		}
		else {
			
			
			// create the task
			$this->ModelTask->createTask($this->session->userdata('account')->email, $this->input->post('name'), 
			$this->input->post('startDate'), $this->input->post('endDate'), $this->input->post('taskStatusRadio'), $this->input->post('description'), $this->input->post('comment'));
			
			redirect('Worker');
			
		}
	}

    public function updateTask() {

        $taskCreationData['createTaskModal'] = NULL;

        if ($this->input->post('name') == NULL) {
            $taskCreationData['nameInvalid'] = 1;
            $taskCreationData['name'] = NULL;

        }
        else {
            if ($this->input->post('name') == "") {
                $taskCreationData['nameInvalid'] = 1;
                $taskCreationData['name'] = NULL;
            }
            else {
                $taskCreationData['nameInvalid'] = 0;
                $taskCreationData['name'] = $this->input->post('name');
            }
        }

        if ($this->input->post('startDate') != NULL) {
            $datePattern = '/(1|2)[0-9]{3}-(0|1)[0-9]-(0|1|2|3)[0-9] (0|1|2)[0-9]:(0|1|2|3|4|5)[0-9]:(0|1|2|3|4|5)[0-9]/';
            if (preg_match($datePattern, $this->input->post('startDate'))) {
                $taskCreationData['startDateInvalid'] = 0;
                $taskCreationData['startDate'] = $this->input->post('startDate');
            }
            else {
                $taskCreationData['startDateInvalid'] = 1;
                $taskCreationData['startDate'] = NULL;
            }
        }

        if ($this->input->post('endDate') != NULL) {
            $datePattern = '/(1|2)[0-9]{3}-(0|1)[0-9]-(0|1|2|3)[0-9] (0|1|2)[0-9]:(0|1|2|3|4|5)[0-9]:(0|1|2|3|4|5)[0-9]/';
            if (preg_match($datePattern, $this->input->post('endDate'))) {
                $taskCreationData['endDateInvalid'] = 0;
                $taskCreationData['endDate'] = $this->input->post('endDate');
            }
            else {
                $taskCreationData['endDateInvalid'] = 1;
                $taskCreationData['endDate'] = NULL;
            }
        }

        $taskCreationData['descriptionData'] = $this->input->post('description');
        $taskCreationData['commentData'] = $this->input->post('comment');

        if ($taskCreationData['nameInvalid'] == 1 || $taskCreationData['startDateInvalid'] == 1 || $taskCreationData['endDateInvalid'] == 1)
        {
            $taskCreationData['createTaskModal'] = 1;
            $this->dashboard($taskCreationData);
        }
        else {


            // create the task
            $this->ModelTask->createTask($this->session->userdata('account')->email, $this->input->post('name'),
                $this->input->post('startDate'), $this->input->post('endDate'), $this->input->post('taskStatusRadio'), $this->input->post('description'), $this->input->post('comment'));

            redirect('Worker');

        }
    }

	public function deleteTask($taskId){
		$this->ModelTask->deleteTask($taskId);
		redirect('Worker');
	}

	public function acceptTask($taskId){
        $this->ModelTask->acceptTask($taskId);
        redirect('Worker');
    }

    public function denyTask($taskId){
        $this->ModelTask->denyTask($taskId);
        redirect('Worker');
    }
	
}
