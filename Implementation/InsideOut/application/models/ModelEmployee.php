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
}

