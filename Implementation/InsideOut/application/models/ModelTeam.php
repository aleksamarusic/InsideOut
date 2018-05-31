<?php
/**
 * Nikola Nedeljkovic 15/0058
 * ModelCompany - klasa model za rad sa timovima
 * 
 * @version 1.0.0
 */

class ModelTeam extends CI_Model{
    /**
     * Konstruise model
     */ 
    public function __construct() {
        parent::__construct();
    }

    /**
     * Dohvata timove preko $email mejla menadzera
     *
     * @param String $email
     * @return array
     */
    public function getTeamsByEmail($email){
        $this->db->where("email", $email);
        $query = $this->db->get('Team');
        return $query->result();
    }

    /**
     * Dohvata timove u kojima radi radnik sa mejlom $email
     *
     * @param String $email
     * @return array
     */
    public function getTeamsByEmailWorker($email){
        $this->db->where("email", $email);
        $query = $this->db->get('IS_WORKING');
        return $query->result();
    }

    /**
     * Dohvata timove u okviru kompanije sa imenom $company
     *
     * @param String $company
     * @return array
     */
    public function getTeamsByCompany($company){
        $this->db->where("companyName", $company);
        $query = $this->db->get('Team');
        return $query->result();
    }

    /**
     * Dohvata tim prema imenu $team i imenom firme $company
     *
     * @param String $team
     * @param String $company
     * @return object
     */
    public function getTeam($team, $company){
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $company);
        $query = $this->db->get('Team');
        return $query->row();
    }

    /**
     * Postavlja menadzera sa mejlom $email timu $team u okviru firme $company
     *
     * @param String $team
     * @param String $company
     * @param String $email
     * @return void
     */
    public function setTeamManager($team, $company, $email){
        $this->db->set("email", $email);
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $company);
        $this->db->update('Team');
    }

    /**
     * Postavlja radnika sa mejlom $email u tim $team u okviru firme $company
     *
     * @param String $team
     * @param String $company
     * @param String $email
     * @return void
     */
    public function addWorkerTeam($team, $company, $email){
        $this->db->set("email", $email);
        $this->db->set("companyName", $company);
        $this->db->set("teamName", $team);
        $this->db->insert('IS_WORKING');
    }
}

