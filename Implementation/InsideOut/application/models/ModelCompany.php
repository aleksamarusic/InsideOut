<?php

/**
 * Nikola Nedeljković 2015/0058
 * Marija Kostić 2015/0096
 * 
 * ModelCompany - klasa model za rad sa firmama
 * 
 * @version 1.0.0
 */

class ModelCompany extends CI_Model{
    /**
     * Konstruise model
     */    
    public function __construct() {
        parent::__construct();
    }

    /**
     * Dohvata firmu preko registracionog linka
     *
     * @param String $reg_link
     * @return object
     */
    public function getCompany($reg_link){
        $this->db->reset_query();
        $this->db->where("registrationLink", $reg_link);
        $query=$this->db->get('Company');
        $result=$query->row();
        return $result;
    }

    /**
     * Dohvata sve firme u okviru aplikacije
     *
     * @return array
     */
    public function getCompanies(){
        $this->db->reset_query();
        $query=$this->db->get('Company');
        $result=$query->result();
        return $result;
    }

    /**
     * Brise firmu po imenu
     *
     * @param String $company
     * @return void
     */
    public function deleteCompany($company){
        $this->db->where("companyName", $company);
        $this->db->delete("Company");
    }

    /**
     * Dohvata firmu po imenu
     *
     * @param String $company
     * @return object
     */
    public function getCompanyByName($company){
        $this->db->where("companyName", $company);
        $query=$this->db->get('Company');
        $result=$query->row();
        return $result;
    }

    /**
     * Postavlja registracioni link firmi $company
     *
     * @param String $company
     * @param String $reg_link
     * @return void
     */
    public function setGeneratedLink($company, $reg_link){
        $this->db->set("registrationLink", $reg_link);
        $this->db->where("companyName", $company);
        $this->db->update("Company");
    }

    /**
     * postavlja broj naloga $numberOfAcconts firmi $company
     *
     * @param String  $company
     * @param int $numberOfAcconts
     * @return void
     */
    public function setNumOfAccounts($company, $numberOfAcconts) {
        $this->db->set("numAccounts", $numberOfAcconts);
        $this->db->where("companyName", $company);
        $this->db->update("Company");
    }
}

