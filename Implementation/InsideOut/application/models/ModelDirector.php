<?php

class ModelDirector extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    public function getAccount($email, $tip) {
        $this->db->reset_query();
        $this->db->where("email", $email);
        $query=$this->db->get($tip);
        $result=$query->row();
        return $result;
    }

    public function getAccountById($idAccount){
        $this->db->where("Id", $idAccount);
        $query = $this->db->get('Account');
        return $query->row();
    }
    
	public function createDirector($name, $surname, $email, $password, $companyName) {
		$accountData = array(
			'email' => $email,
			'name' => $name,
			'surname' => $surname,
			'password' => $password
		);
		
		$this->db->insert('account', $accountData);
		
		$directorData = array('companyName' => $companyName, 'email' => $email);
		
		$this->db->insert('director', $directorData);
	}
}

