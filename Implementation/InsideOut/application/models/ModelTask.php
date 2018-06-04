<?php

/**
 * Stefan Milanovic 2015/0361
 * 
 * ModelTask - klasa model za rad sa zadacima
 * 
 * @version 1.0.0
 */

class ModelTask extends CI_Model{
    /**
     * Konstruise model
     */    
    public function __construct() {
        parent::__construct();
    }
	
	public function createTask($email, $name, $startDate, $endDate, $taskStatus, $description, $comment) {
	
		// status completion:
		// NS - not started
		// S - started
		// D - done
		
		// status privacy:
		// P - private
		// G - given
	
		// status acceptance: 
		// P - pending
		// D - declined
		// A - accepted
		
		if ($taskStatus == 'open') {
			$statusCompletion = 'NS';		// not started
		} 
		else if ($taskStatus == 'inProgress') {
			$statusCompletion = 'S'; 	    // started
		}
		else {
			$statusCompletion = 'D';		// done
		}
		
		if ($startDate == '') {
			$expectedStartDate = NULL;
		}
		else {
			$expectedStartDate = $startDate;
		}
		
		if ($endDate == '') {
			$expectedEndDate = NULL;
		}
		else {
			$expectedEndDate = $endDate;
		}
		
		$taskData = array(
			'email' => $email,
			'statusPrivacy' => 'P',
			'statusCompletion' => $statusCompletion,
			'statusAcceptance' => 'A',
			'taskName' => $name,
			'description' => $description,
			'comment' => $comment,
			'expectedStartDate' => $expectedStartDate,
			'expectedEndDate' => $expectedEndDate
		);
		
		$this->db->insert('task', $taskData);
	}
	
	public function createGivenTask($email, $teamName, $companyName, $name, $startDate, $endDate, $taskStatus, $description, $comment) {
		if ($taskStatus == 'open') {
			$statusCompletion = 'NS';		// not started
		} 
		else if ($taskStatus == 'inProgress') {
			$statusCompletion = 'S'; 	    // started
		}
		else {
			$statusCompletion = 'D';		// done
		}
		
		if ($startDate == '') {
			$expectedStartDate = NULL;
		}
		else {
			$expectedStartDate = $startDate;
		}
		
		if ($endDate == '') {
			$expectedEndDate = NULL;
		}
		else {
			$expectedEndDate = $endDate;
		}
		
		$taskData = array(
			'email' => $email,
			'teamName' => $teamName,
			'companyName' => $companyName,
			'statusPrivacy' => 'G',
			'statusCompletion' => $statusCompletion,
			'statusAcceptance' => 'P',
			'taskName' => $name,
			'description' => $description,
			'comment' => $comment,
			'expectedStartDate' => $expectedStartDate,
			'expectedEndDate' => $expectedEndDate
		);
	}
	
	public function deleteTask($id) {
        $this->db->where("taskId", $id);
        $this->db->delete('task');
	}

	public function getTasksByEmailAndCompany($email, $companyName){
		$this->db->where("email", $email);
        $this->db->where("companyName", $companyName);
        $query = $this->db->get('Task');
		return $query->result();
	}

    public function acceptTask($id) {
        $this->db->where("taskId", $id);
        $this->db->set("statusAcceptance", 'A');
        $this->db->delete('task');
    }

    public function denyTask($id) {
        $this->db->where("taskId", $id);
        $this->db->set("statusAcceptance", 'D');
        $this->db->delete('task');
    }


}

