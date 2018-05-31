<?php

/**
 * Nikola Nedeljkovic 15/0058
 * ModelCompany - klasa model za rad sa nalozima uopsteno
 * 
 * @version 1.0.0
 */

class ModelEmployee extends CI_Model{
    /**
     * Konstruise model
     */    
    public function __construct() {
        parent::__construct();
    }

    /**
     * Dohvata nalog preko $email mejla, i $tip tipa(Menadzer, Radnik)
     *
     * @param String $email
     * @param String $tip
     * @return object
     */
    public function getAccount($email, $tip){
        $this->db->reset_query();
        $this->db->where("email", $email);
        $query=$this->db->get($tip);
        $result=$query->row();
        return $result;
    }

    /**
     * Dohvata zaposlene u kompaniji $company po tipu $tip
     *
     * @param String $company
     * @param String $tip
     * @return array
     */
    public function getEmployeeByCompany($company, $tip){
        $this->db->where("$tip.companyName", $company);
        $this->db->from($tip);
        $this->db->join("Account", "account.email = $tip.email");
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Dohvata nalog prema id-ju naloga $idAccount
     *
     * @param int $idAccount
     * @return object
     */
    public function getAccountById($idAccount){
        $this->db->where("Id", $idAccount);
        $query = $this->db->get('Account');
        return $query->row();
    }

    /**
     * Brise nalog tipa $tip preko mejla $email
     *
     * @param String $tip
     * @param String $email
     * @return void
     */
    public function delete($tip, $email){
        $this->db->where("email", $email);
        $this->db->delete($tip);
    }
    
    /**
     * Dodaje nalog tipa $tip preko mejla $email za firmu $company
     *
     * @param String $tip
     * @param String $email
     * @param String $company
     * @return void
     */
    public function add($tip, $email, $company){
        $this->db->set("email", $email);
        $this->db->set("companyName", $company);
        $this->db->insert($tip);
    }
}

