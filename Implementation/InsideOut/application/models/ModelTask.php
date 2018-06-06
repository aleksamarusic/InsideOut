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
        $this->db->insert('task', $taskData);
    }

    public function updateTask($taskId, $name, $startDate, $endDate, $taskStatus, $description, $comment) {

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

        $this->db->where('taskId', $taskId);
        $this->db->set('statusCompletion', $statusCompletion);
        $this->db->set('taskName', $name);
        $this->db->set('comment', $comment);
        $this->db->set('expectedStartDate', $expectedStartDate);
        $this->db->set('expectedEndDate', $expectedEndDate);
        $this->db->update('task');
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
        $this->db->update('task');
    }

    public function denyTask($id) {
        $this->db->where("taskId", $id);
        $this->db->set("statusAcceptance", 'D');
        $this->db->update('task');
    }


}

