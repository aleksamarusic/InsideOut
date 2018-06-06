<?php
/**
 * Nikola Nedeljković 2015/0058
 * Marija Kostić 2015/0096
 * 
 * ModelTeam - klasa model za rad sa timovima
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

    public function getTeamsByEmailManager($email){
        $this->db->where("email", $email);
        $query = $this->db->get('team');
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
     * Brise tim $team firme $companyName
     *
     * @param String $team
     * @param String $companyName
     * @return void
     */
    public function deleteTeam($team, $companyName){
        $this->db->where("teamName", $team);
        $this->db->where("companyName", $companyName);
        $this->db->delete('Team');
    }

    /**
     * Kreira novi tim imena $teamName u firmi $companyName
     *
     * @param String $teamName
     * @param String $companyName
     * @return void
     */
    public function createTeam($teamName, $companyName) {
        $team = array(
            'teamName' => $teamName,
            'companyName' => $companyName,
        );
        $this->db->insert('Team', $team);
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

