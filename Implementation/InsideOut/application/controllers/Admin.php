<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nikola Nedeljkovic 2015/0058
 * Admin Controller - klasa za metode specificne ulozi admina
 * 
 * @version 1.0.0
 */

class Admin extends CI_Controller {
    /**
     * Kreiranje kontrolera
     * 
     * @return void
     */
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

    /**
     * Ucitava pocetnu stranicu admina
     *
     * @return void
     */
	public function index()
	{
        $companies = $this->ModelCompany->getCompanies();
		$this->load->view('admin', array('companies' => $companies));
	}

    /**
     * Brise firmu iz sistema sa zadatim imenom
     *
     * @param String $company
     * @return void
     */
    public function removeCompany($company){
        $company = urldecode($company);
        $this->ModelCompany->deleteCompany($company);
        redirect("Admin");
    }

    /**
     * Logout admina
     *
     * @return void
     */
    public function signout(){
        $this->session->sess_destroy();
        redirect("Guest");
    }
}
