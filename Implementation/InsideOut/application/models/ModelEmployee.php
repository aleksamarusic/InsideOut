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

    public function getAccountById($idAccount){
        $this->db->where("Id", $idAccount);
        $query = $this->db->get('Account');
        return $query->row();
    }

    public function delete($tip, $email){
        $this->db->where("email", $email);
        $this->db->delete($tip);
    }

    public function add($tip, $email, $company){
        $this->db->set("email", $email);
        $this->db->set("companyName", $company);
        $this->db->insert($tip);
    }
    
}

