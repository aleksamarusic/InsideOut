<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model("ModelCompany");

        if ($this->session->userdata('admin') == NULL){
            if ($this->session->userdata('worker') == 1)
			    redirect("Worker");
            else if ($this->session->userdata('manager') == 1)
                redirect("Manager");
            else if ($this->session->userdata('director') == 1)
                redirect("Director");
            else
                redirect("Guest");
        }
    }

	public function index()
	{
        $companies = $this->ModelCompany->getCompanies();
		$this->load->view('admin', array('companies' => $companies));
	}

    public function removeCompany($company){
        $company = urldecode($company);
        $this->ModelCompany->deleteCompany($company);
        redirect("Admin");
    }

    public function signout(){
        $this->session->sess_destroy();
        redirect("Guest");
    }
}
