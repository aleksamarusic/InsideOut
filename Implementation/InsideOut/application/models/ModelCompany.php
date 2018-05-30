<?php

class ModelCompany extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function getCompany($reg_link){
        $this->db->reset_query();
        $this->db->where("registrationLink", $reg_link);
        $query=$this->db->get('Company');
        $result=$query->row();
        return $result;
    }

    public function getCompanies(){
        $this->db->reset_query();
        $query=$this->db->get('Company');
        $result=$query->result();
        return $result;
    }

    public function deleteCompany($company){
        $this->db->where("companyName", $company);
        $this->db->delete("Company");
    }

    public function getCompanyByName($company){
        $this->db->where("companyName", $company);
        $query=$this->db->get('Company');
        $result=$query->row();
        return $result;
    }

    public function setGeneratedLink($company, $reg_link){
        $this->db->set("registrationLink", $reg_link);
        $this->db->where("companyName", $company);
        $this->db->update("Company");
    }

    public function setNumOfAccounts($company, $numberOfAcconts) {
        $this->db->set("numAccounts", $numberOfAcconts);
        $this->db->where("companyName", $company);
        $this->db->update("Company");
    }
}

