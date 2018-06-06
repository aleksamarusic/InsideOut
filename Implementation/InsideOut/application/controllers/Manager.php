<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Manager extends Employee {

	public function __construct() {
        parent::__construct();
		
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

    
	
	public function getTeams(){
        $teams = $this->ModelTeam->getTeamsByEmailManager($this->session->userdata('employee')->email);
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
