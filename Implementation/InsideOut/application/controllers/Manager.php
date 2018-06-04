<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Manager extends Employee {

	public function __construct() {
        parent::__construct();
		$this->load->model("ModelEmployee");
		$this->load->model("ModelTask");
		
        if ($this->session->userdata('manager') == NULL){
            if ($this->session->userdata('worker') == 1)
			    redirect("Worker");
            else if ($this->session->userdata('director') == 1)
                redirect("Director");
            else if ($this->session->userdata('admin') == 1)
                redirect("Admin");
            else
                redirect("Guest");
        }
    }

    public function index()
	{
		$this->dashboard();
    }
    
	public function dashboard($taskCreationData = []) {
		$this->load_view('manager/dashboard.php', $taskCreationData);
	}
	
	public function viewEmployee($idEmployee, $giveTaskData = []) {
		
		// provera?
		$employeeAccount = $this->ModelEmployee->getAccountById($idEmployee);
		$employeeCompany = $this->ModelEmployee->getCompanyForEmployee($employeeAccount->email);
		$employeeTeamsRaw = $this->ModelEmployee->getTeamsForEmployee($employeeAccount->email);
		$employeeTeams = '';
		foreach ($employeeTeamsRaw as $employeeTeam) {
			$employeeTeams = $employeeTeams . $employeeTeam->teamName . ', ';
		}
		
		$employeeTeams = substr($employeeTeams, 0, -2);
		$employeeData = array(
			'employeeId' => $idEmployee,
			'employeeName' => $employeeAccount->name,
			'employeeSurname' => $employeeAccount->surname,
			'employeeTeams' => $employeeTeams,
			'employeeCompany' => $employeeCompany
		);
		
		$this->load_view('manager/viewEmployee.php', $employeeData);
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
		else {
			$taskCreationData['startDate'] = $this->input->post('startDate');
			$taskCreationData['startDateInvalid'] = 0;
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
		else {
			$taskCreationData['endDateInvalid'] = 0;
			$taskCreationData['endDate'] = $this->input->post('endDate');
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
			
			redirect('Manager');
			
		}
	}
	
	public function giveTask() {
		
		$taskCreationData['giveTaskModal'] = NULL;
		
		// save data from previous array 
		$taskCreationData['employeeName'] = $employeeData['employeeName'];
		$taskCreationData['employeeSurname'] = $employeeData['employeeSurname'];
		$taskCreationData['employeeTeams'] = $employeeData['employeeTeams'];
		$taskCreationData['employeeCompany'] = $employeeData['employeeCompany'];
		
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
		else {
			$taskCreationData['startDate'] = $this->input->post('startDate');
			$taskCreationData['startDateInvalid'] = 0;
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
		else {
			$taskCreationData['endDateInvalid'] = 0;
			$taskCreationData['endDate'] = $this->input->post('endDate');
		}
		
		$taskCreationData['descriptionData'] = $this->input->post('description');
		$taskCreationData['commentData'] = $this->input->post('comment');
		
		if ($taskCreationData['nameInvalid'] == 1 || $taskCreationData['startDateInvalid'] == 1 || $taskCreationData['endDateInvalid'] == 1)
		{
			$taskCreationData['giveTaskModal'] = 1;
			$this->dashboard($taskCreationData);
		}
		else {
			
			// get employee email (from employeeid)
			$employeeEmail = $this->ModelEmployee->getAccountById($this->input->post('employeeId'))->email;
			
			$managerEmail = $this->session->userdata('account')->email;
			
			// get team and company (from manager)
			
			$team = NULL; // ??
			
			$company = $this->session->userdata('employee')->companyName;
			
			// give the task
			$this->ModelTask->createGivenTask($employeeEmail, NULL, $company, $this->input->post('name'), 
			$this->input->post('startDate'), $this->input->post('endDate'), $this->input->post('taskStatusRadio'), $this->input->post('description'), $this->input->post('comment'));
			
			redirect('Manager');
			
		}
		
	}
	
	public function deleteTask($taskId) {
		$this->ModelTask->deleteTask($taskId);
		redirect('Manager');
	}
	
}
