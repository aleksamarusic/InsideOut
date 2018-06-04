<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Manager extends Employee {

	public function __construct() {
        parent::__construct();
        // $this->load->model("X"); ucitaj modele ovde
        if ($this->session->userdata('manager') == NULL){
            if ($this->session->userdata('worker') == 1)
			    redirect("Worker");
            else if ($this->session->userdata('director') == 1)
                redirect("Director");
            else if ($this->session->userdata('admin') == 1)
                redirect("Admin");
            else
                redirect("Guest");
        }
    }

    public function index()
	{
		$this->dashboard();
    }
    
	public function dashboard($taskCreationData = []) {
		$this->load_view('worker/dashboard.php', $taskCreationData);
	}
}
