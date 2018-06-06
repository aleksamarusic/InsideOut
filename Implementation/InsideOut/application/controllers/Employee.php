<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nikola Nedeljkovic 2015/0058
 * Employee Controller - klasa za metode zajednicka za uloge Menadzera, Direktora i Radnika ili nekih ponaosob
 * 
 * @version 1.0.0
 */

class Employee extends CI_Controller{
    /**
     * Konstruktor
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelTask");
        $this->load->model("ModelTeam");
        $this->load->model("ModelEmployee");
    }

    /**
     * Ucitava odgovarajuce fiksne header/footer delove stranica za Menadzera, Radnika i Direktora
     *
     * @param String $name
     * @param array $data
     * @return void
     */
    protected function load_view($name, $data=[]){
        $controller = $this->router->fetch_class();
        $data['name'] = $this->session->userdata('account')->name;
        $data['controller'] = $controller;

		$this->load->view("templates/$controller"."_header.php", $data);
        $this->load->view($name, $data);
        $this->load->view("templates/$controller"."_footer.php", $data);
	}

    public function dashboard($taskCreationData = []) {
        $controller = $this->router->fetch_class();
        $data = $this->getTasks() + $this->getTeams();
        $data += $taskCreationData;
		$this->load_view($controller."/dashboard.php", $data);
	}


    public function index(){
		$this->dashboard();
    }

    public function tasks(){
        $this->index();
    }


    public function getTasks(){
		$tasks = $this->ModelTask->getTasksByEmailAndCompany($this->session->userdata('employee')->email, $this->session->userdata('employee')->companyName);
		$data['tasks'] = $tasks;
		return $data;
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
			$controller = $this->router->fetch_class();
			redirect($controller);
			
		}
	}

    public function updateTask() {

        $taskCreationData['updateTaskModal'] = NULL;

        if ($this->input->post('taskName') == NULL) {
            $taskCreationData['nameInvalid'] = 1;
            $taskCreationData['name'] = NULL;

        }
        else {
            if ($this->input->post('taksName') == "") {
                $taskCreationData['nameInvalid'] = 1;
                $taskCreationData['name'] = NULL;
            }
            else {
                $taskCreationData['nameInvalid'] = 0;
                $taskCreationData['name'] = $this->input->post('taskName');
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
            $taskCreationData['updateTaskModal'] = 1;
            $this->dashboard($taskCreationData);
        }
        else {


            // create the task
            $this->ModelTask->updateTask($this->input->post('taskId'), $this->input->post('taskName'),
                $this->input->post('startDate'), $this->input->post('endDate'), $this->input->post('taskStatusRadio'), $this->input->post('description'), $this->input->post('comment'));
            $controller = $this->router->fetch_class();
            redirect($controller);

        }
    }

    public function viewTeam($teamName) {
        $companyName = $this->session->userdata('employee')->companyName;

        $data = array();
        $data['employees'] = $this->ModelEmployee->getEmployeesByTeam($companyName, $teamName);
        $data['manager'] = $this->ModelEmployee->getTeamManager($companyName, $teamName);
        $data = $data + $this->getTeams();

        $this->load_view('templates/viewTeam.php', $data);
    }

    public function viewEmployee($idEmployee, $giveTaskData = []) {
		
		// provera?
		$employeeAccount = $this->ModelEmployee->getAccountById($idEmployee);
		$employeeCompany = $this->ModelEmployee->getCompanyForEmployee($employeeAccount->email);
		$employeeTeamsRaw = $this->ModelEmployee->getTeamsForEmployee($employeeAccount->email);
        $employeeTeams = '';
        $controller = $this->router->fetch_class();
        $canGiveTask = (($controller == "Director") || (($controller == "Manager") && !empty($employeeTeamsRaw)));
        if (empty($employeeTeamsRaw))
            $employeeTeamsRaw = $this->ModelTeam->getTeamsByEmailManager($employeeAccount->email);
        $tasks = $this->ModelTask->getTasksByEmailAndCompany($employeeAccount->email, $employeeCompany);
		foreach ($employeeTeamsRaw as $employeeTeam) {
			$employeeTeams = $employeeTeams . $employeeTeam->teamName . ', ';
		}
        $teams = $this->getTeams();
       
		$employeeTeams = substr($employeeTeams, 0, -2);
		$employeeData = array(
			'employeeId' => $idEmployee,
			'employeeName' => $employeeAccount->name,
			'employeeSurname' => $employeeAccount->surname,
			'employeeTeams' => $employeeTeams,
            'employeeCompany' => $employeeCompany,
            'employeeTasks' => $tasks,
            'canGiveTask' => $canGiveTask

        );
        $employeeData += $teams;
		
		$this->load_view("templates/viewEmployee.php", $employeeData);
	}

    public function deleteTask(){
        $taskId = $this->input->post('taskId');
		$this->ModelTask->deleteTask($taskId);
		$controller = $this->router->fetch_class();
		redirect($controller);
	}

    /**
     * Logout za Menadzera, Radnika i Direktora
     *
     * @return void
     */
    public function signout(){
        $this->session->sess_destroy();
        redirect("Guest");
    }
}