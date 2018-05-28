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
}

