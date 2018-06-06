<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Worker extends Employee {

	public function __construct() {
        parent::__construct();
        
		


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

	

	

	public function getTeams(){
        $teams = $this->ModelTeam->getTeamsByEmailWorker($this->session->userdata('employee')->email);
        $data['teams'] = $teams;
        return $data;
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
