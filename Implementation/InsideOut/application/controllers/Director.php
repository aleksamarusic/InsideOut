<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Director extends Employee {

	public function __construct() {
        parent::__construct();
        
        $this->load->model("ModelCompany");

        if ($this->session->userdata('director') == NULL){
            if ($this->session->userdata('worker') == 1)
			    redirect("Worker");
            else if ($this->session->userdata('manager') == 1)
                redirect("Manager");
            else if ($this->session->userdata('admin') == 1)
                redirect("Admin");
            else
                redirect("Guest");
        }
    }

    public function index()
	{
		$this->accounts();
	}

    public function accounts(){
        //TO DO
        $data = array();
        $data['reg_link'] = $this->ModelCompany->getCompanyByName($this->session->userdata('employee')->companyName);
        //print_r($data['reg_link']);
        $this->load_view('director/accounts', $data);
    }

    public function generate(){
        for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 20; $x = rand(0,$z), $s .= $a{$x}, $i++); 
        $this->ModelCompany->setGeneratedLink($this->session->userdata('employee')->companyName, $s);
        redirect("Director");
    }

    public function teams(){
        //TO DO
    }

    public function tasks(){
        //TO DO
    }
}
