<?php

class ModelEmployee extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function getAccount($email, $tip){
        $this->db->reset_query();
        $this->db->where("email", $email);
        $query=$this->db->get($tip);
        $result=$query->row();
        return $result;
    }

    public function getEmployeeByCompany($company, $tip){
        $this->db->where("$tip.companyName", $company);
        $this->db->from($tip);
        $this->db->join("Account", "account.email = $tip.email");
        $query = $this->db->get();
        return $query->result();
    }
}

