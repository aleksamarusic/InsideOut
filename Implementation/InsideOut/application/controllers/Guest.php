<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nikola Nedeljkovic 2015/0058
 * Guest Controller - klasa za metode specificne ulozi gosta
 * 
 * @version 1.0.0
 */

class Guest extends CI_Controller {
	/**
     * Kreiranje kontrolera
     * 
     * @return void
     */
	public function __construct() {
        parent::__construct();
        $this->load->model("ModelEmployee");
		$this->load->model("ModelCompany");

        if ($this->session->userdata('admin') == 1)
            redirect("Admin");
		else if ($this->session->userdata('worker') == 1)
			redirect("Worker");
		else if ($this->session->userdata('manager') == 1)
			redirect("Manager");
		else if ($this->session->userdata('director') == 1)
			redirect("Director");
    }
	/**
	 * Ucitava css i js fajlove
	 *
	 * @param String $name
	 * @param array $data
	 * @return void
	 */
	private function load_view($name, $data=[]){
		$this->load->view("templates/css_guest.php", $data);
        $this->load->view($name, $data);
        $this->load->view("templates/js_guest.php");
	}

	/**
	 * Prikazuje gresku pri logovanju
	 *
	 * @return void
	 */
	private function bad_login(){
		$data = array();
		$data['bad_login'] = 1;
		$this->load_view('index', $data);
	}

	/**
	 * Provera postojeceg naloga sa $email i $password
	 *
	 * @param String $email
	 * @param String $password
	 * @return String
	 */
	private function check($email, $password){
		$controllers = array('Admin', 'Director', 'Manager', 'Worker');
		if ($this->ModelEmployee->getAccount($email, 'Account') != NULL){
			if ($password == $this->ModelEmployee->getAccount($email, 'Account')->password){
				foreach($controllers as $controller)
					if ($this->ModelEmployee->getAccount($email, $controller) != NULL)
						return $controller;
			} else return NULL;
		}
	}

	/**
	 * Ucitava pocetnu stranicu aplikacije
	 *
	 * @return void
	 */
	public function index()
	{
		$this->load_view('index');
	}

	/**
	 * Loguje korisnika odgovarajuce, ili vraca na pocetnu stranicu sa greskom
	 *
	 * @return void
	 */
	public function login(){
		if ($this->input->post('email') == NULL || $this->input->post('password') == NULL)
			return $this->bad_login();
		$user = $this->check($this->input->post('email'), $this->input->post('password'));
		if ($user == NULL)
			$this->bad_login();
		else{
			$this->session->set_userdata(lcfirst($user), 1);
			$this->session->set_userdata('employee', $this->ModelEmployee->getAccount($this->input->post('email'), $user));
			$this->session->set_userdata('account', $this->ModelEmployee->getAccount($this->input->post('email'), 'Account'));
			redirect($user);
		}
	}


	public function signup(){
		//TO DO	
	}

	public function reset_password(){
		//TO DO
	}

	/**
	 * Prihvata registracioni link i upucuje na stranicu sa greskom u slucaju pogresnog linka, ili na sign-up stranicu
	 *
	 * @param String $reg_link
	 * @return void
	 */
	public function create($reg_link = NULL){
		//TO DO
		if ($reg_link == NULL)
			$this->load_view('reg_expired');
		else if ($this->ModelCompany->getCompany($reg_link) == NULL)
			$this->load_view('reg_expired');
		else
			$this->load_view('reg');
	}
}
