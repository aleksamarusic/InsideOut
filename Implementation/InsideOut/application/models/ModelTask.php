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
    
    /**
     * Kreiranje privatnog zadatka Radnika, Menadzera ili Direktora u bazi
     *
     * @param String $email
     * @param String $name
     * @param String $startDate
     * @param String $endDate
     * @param String $taskStatus
     * @param String $description
     * @param String $comment
     * 
     */
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
            $expectedStartDate = substr($startDate, 0, 10);
        }

        if ($endDate == '') {
            $expectedEndDate = NULL;
        }
        else {
            $expectedEndDate = substr($endDate, 0, 10);
        }
		
		$taskData = array(
			'email' => $email,
			'companyName' => $this->session->userdata('employee')->companyName,
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


    /**
     * Kreiranje zadatog zadatka (Menadzer Radniku ili Direktor Menadzeru ili Radniku) u bazi
     *
     * @param String $email
     * @param String $name
     * @param String $startDate
     * @param String $endDate
     * @param String $taskStatus
     * @param String $description
     * @param String $comment
     * 
     */
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
            $expectedStartDate = substr($startDate, 0, 10);
        }

        if ($endDate == '') {
            $expectedEndDate = NULL;
        }
        else {
            $expectedEndDate = substr($endDate, 0, 10);
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


    /**
     * Menjanje zadatka u bazi
     *
     * @param String $email
     * @param String $name
     * @param String $startDate
     * @param String $endDate
     * @param String $taskStatus
     * @param String $description
     * @param String $comment
     * 
     */
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
            $expectedStartDate = substr($startDate, 0, 10);
        }

        if ($endDate == '') {
            $expectedEndDate = NULL;
        }
        else {
            $expectedEndDate = substr($endDate, 0, 10);
        }

        $this->db->where('taskId', $taskId);
        $this->db->set('statusCompletion', $statusCompletion);
        $this->db->set('taskName', $name);
        $this->db->set('expectedStartDate', $expectedStartDate);
        $this->db->set('expectedEndDate', $expectedEndDate);
        $this->db->set('description', $description);
        $this->db->set('comment', $comment);
        $this->db->update('task');
    }


    /**
     * Brise odredjeni zadatak iz baze podataka
     *
     * @param int $taskId
     * 
     */
	public function deleteTask($taskId) {
        $this->db->where("taskId", $taskId);
        $this->db->delete("task");
	}

    /**
     * Dovlaci zadatke za odredjenog zaposlenog iz baze podataka
     *
     * @param string $email
     * @param string $companyName
     * @return object
     * 
     */
	public function getTasksByEmailAndCompany($email, $companyName){
		$this->db->where("email", $email);
        $this->db->where("companyName", $companyName);
        $query = $this->db->get('Task');
		return $query->result();
	}

    /**
     * Prihvata zadatak od nekog nadredjenog u firmi
     *
     * @param int $id
     * 
     */
    public function acceptTask($id) {
        $this->db->where("taskId", $id);
        $this->db->set("statusAcceptance", 'A');
        $this->db->update('task');
    }
    
    /**
     * Odbija zadatak od nekog nadredjenog u firmi
     *
     * @param int $id
     * 
     */
    public function denyTask($id) {
        $this->db->where("taskId", $id);
        $this->db->set("statusAcceptance", 'D');
        $this->db->update('task');
    }


}

