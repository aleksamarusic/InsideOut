<?php

/**
 * Nikola Nedeljkovic 2015/0058
 * Marija Kostić 2015/96
 * Stefan Milanovic 2015/0361
 * 
 * ModelEmployee - klasa model za rad sa nalozima uopsteno
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
     * Dohvata sve zaposlene koji rade u timu $team i kompaniji $company
     *
     * @param String $company
     * @param String $team
     * @return array
     */
    public function getEmployeesByTeam($company, $team){
        $this->db->where("companyName", $company);
        $this->db->where("teamName", $team);
        $this->db->from("is_working");
        $this->db->join("Account", "account.email = is_working.email");
        $query = $this->db->get();
        return $query->result();
    }


    /**
     * Dohvata nalog menadzera tima $team iz firme $company
     *
     * @param strnig $company
     * @param string $team
     * @return object
     */
    public function getTeamManager($company, $team) {
        $this->db->where("companyName", $company);
        $this->db->where("teamName", $team);
        $this->db->from("Team");
        $this->db->join("Account", "account.email = team.email");
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * Brise nalog sa email-om $email iz tabela $tip i Account
     *
     * @param string $email
     * @param string $tip
     * @return void
     */
    public function deleteEmployee($email, $tip) {
        $this->db->where("email", $email);
        $this->db->delete($tip);

        $this->db->where("email", $email);
        $this->db->delete("Account");
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

    /**
     * Pravi novog radnika u bazi podataka i vezuje ga za odgovarajucu firmu $companyName
     * 
     * @param String $name
     * @param String $surname
     * @param String $email
     * @param String $password
     * @param String $companyName
     * 
     * @return void
     */
    public function createEmployee($name, $surname, $email, $password, $companyName) {
		$accountData = array(
			'email' => $email,
			'name' => $name,
			'surname' => $surname,
			'password' => $password
		);
		
		$this->db->insert('account', $accountData);
		
		$employeeData = array( 'email' => $email, 'companyName' => $companyName);
		
		$this->db->insert('worker', $employeeData);
	}
	
	public function getCompanyForEmployee($employeeEmail) {
		$this->db->where('email', $employeeEmail);
		$query = $this->db->get('worker');
        $result = $query->row();
		return $result->companyName;
	}
	
	public function getTeamsForEmployee($employeeEmail) {
		$this->db->where('email', $employeeEmail);
		$query = $this->db->get('is_working');
        return $query->result();
	}
}

