<?php

class ModelTeam extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }    
    public function getTeamsByEmail($email){
        $this->db->where("email", $email);
        $query = $this->db->get('Team');
        return $query->result();
    }

    public function getTeamsByEmailWorker($email){
        $this->db->where("email", $email);
        $query = $this->db->get('IS_WORKING');
        return $query->result();
    }

    public function getTeamsByCompany($company){
        $this->db->where("companyName", $company);
        $query = $this->db->get('Team');
        return $query->result();
    }

    public function deleteTeam($team, $companyName){
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $companyName);
        $this->db->delete('Team');
    }

    public function createTeam($teamName, $companyName) {
        $team = array(
            'teamName' => $teamName,
            'companyName' => $companyName,
        );
        $this->db->insert('Team', $team);
    }

    /*public function decrementNumOfWorkers($team, $company) {
        $this->db->set('numWorkers', 'numWorkers+1', FALSE);
        $this->db->where('teamName', $teamName);
        $this->db->where('companyName', $companyName);
        $this->db->update('Team');
    }*/
    
    public function getTeam($team, $company){
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $company);
        $query = $this->db->get('Team');
        return $query->row();
    }

    public function setTeamManager($team, $company, $email){
        $this->db->set("email", $email);
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $company);
        $this->db->update('Team');
    }

    public function addWorkerTeam($team, $company, $email){
        $this->db->set("email", $email);
        $this->db->set("companyName", $company);
        $this->db->set("teamName", $team);
        $this->db->insert('IS_WORKING');
    }
}

