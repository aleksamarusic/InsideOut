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
}

