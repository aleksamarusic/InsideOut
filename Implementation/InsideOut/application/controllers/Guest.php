<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nikola Nedeljkovic 2015/0058
 * Stefan Milanovic 2015/0361
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
		$this->load->model("ModelDirector");
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


	/**
	 * Ucitava stranicu sa formom za registraciju direktora
	 * @param Array $signupData
	 * @return void
	 */
	public function signup($signupData = []) {
		$this->load_view('sign-up.php', $signupData);
	}

	/**
	 * Vrsi proveru podataka iz registracione forme i ili redirektuje nazad na signup stranicu,
	 * u slucaju greske, ili vrsi logovanje direktora i redirekciju
	 * 
	 * @return void
	 */
	public function attempt_signup() {
		
		if ($this->input->post('name') == NULL) {
			$signupData['nameInvalid'] = 1;
			$signupData['name'] = NULL;		// in case someone previously had a correct name, and then deleted it
			
		}
		else {
            if ($this->input->post('name') == "") {
				$signupData['nameInvalid'] = 1;
				$signupData['name'] = NULL;		
			}
			else {
				$signupData['nameInvalid'] = 0;
				$signupData['name'] = $this->input->post('name');
			}
		}
		
		if ($this->input->post('surname') == NULL) {
			$signupData['surnameInvalid'] = 1;
			$signupData['surname'] = NULL;		// in case someone previously had a correct surname, and then deleted it
			
		}
		else {
                    
                    if ($this->input->post('surname') == "") {
                        $signupData['surnameInvalid'] = 1;
			$signupData['surname'] = NULL;   
                    }
                    else {
			$signupData['surnameInvalid'] = 0;
			$signupData['surname'] = $this->input->post('surname');
                    }
		}
		
		if ($this->input->post('email') == NULL) {
			$signupData['emailInvalid'] = 1;
			$signupData['email'] = NULL;		
			
		}
		else {
			$emailPattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
			
			if (preg_match($emailPattern, $this->input->post('email'))) {
				$signupData['emailInvalid'] = 0;
				$signupData['email']= $this->input->post('email');
			}
			else {
				$signupData['emailInvalid'] = 1;
				$signupData['email'] = NULL;
			}
		}
		
		if ($this->input->post('pass') == NULL) {
			$signupData['passInvalid'] = 1;
		}
		else {
			if ($this->input->post('pass') == "") {
				$signupData['passInvalid'] = 1;
			}
			else {
				$signupData['passInvalid'] = 0;
				// conf-pass is checked only if the password field is valid
				
				if ($this->input->post('conf-pass') == NULL) {
					$signupData['confPassInvalid'] = 1;
				}
				else {
					if ($this->input->post('conf-pass') == "" || $this->input->post('conf-pass') != $this->input->post('pass')) {
                        $signupData['confPassInvalid'] = 1;
                    }
                    else {
						$signupData['confPassInvalid'] = 0;
                    }
				}
				
			}
		}
		
		if ($this->input->post('company') == NULL) {
			$signupData['companyInvalid'] = 1;
			$signupData['company'] = NULL;	
		}
		else {
                    if ($this->input->post('company') == NULL) {
                        $signupData['companyInvalid'] = 1;
			$signupData['company'] = NULL;	
                    }
                    else {
			$signupData['companyInvalid'] = 0;
			$signupData['company'] = $this->input->post('company');
                    }
		}
		
		if ($this->input->post('accountNumber') == NULL) {
			$signupData['accountNumberInvalid'] = 1;
			$signupData['accountNumber'] = 1;		
		}
		else {
			if ($this->input->post('accountNumber') < 1) {
				$signupData['accountNumberInvalid'] = 1;
				$signupData['accountNumber'] = 1;
			}
			else {
				$signupData['accountNumberInvalid'] = 0;
				$signupData['accountNumber'] = $this->input->post('accountNumber');
			}
		}
		
		
		if ($signupData['nameInvalid'] == 1 || $signupData['surnameInvalid'] == 1 || $signupData['emailInvalid'] == 1 || $signupData['passInvalid'] == 1 || $signupData['confPassInvalid'] == 1 ||
				$signupData['companyInvalid'] == 1 || $signupData['accountNumberInvalid'] == 1) 
		{
			$this->signup($signupData);
		}
		else {
			
			// check if this email is in use
			if ($this->ModelEmployee->getAccount($this->input->post('email'), 'Account') != NULL) {
				$signupData['emailInvalid'] = 2;
				$this->signup($signupData);
			}
			
			// check if this company exists
			if ($this->ModelCompany->getCompanyByName($this->input->post('company')) != NULL) {
				$signupData['companyInvalid'] = 2;
				$this->signup($signupData);
			}
			
			// create company
			$this->ModelCompany->createCompany($this->input->post('company'), $this->input->post('accountNumber'));
			
			// create director
			$this->ModelDirector->createDirector($this->input->post('name'), $this->input->post('surname'), $this->input->post('email'), $this->input->post('pass'), $this->input->post('company'));
			
			// perform login and redirection
			$this->session->set_userdata('director', 1);
			$this->session->set_userdata('employee', $this->ModelDirector->getAccount($this->input->post('email'), 'director'));
			$this->session->set_userdata('account', $this->ModelDirector->getAccount($this->input->post('email'), 'Account'));
			redirect('Director');
			
		}
	}

	private function bad_email(){
		$data = array();
		$data['bad_email'] = 1;
		$this->load_view('index', $data);
	}

	public function checkEmail(){
		if ($this->input->post('reset_email') == NULL)
			return $this->bad_email();
		$user = $this->ModelEmployee->getAccount($this->input->post('reset_email'), 'Account');
		if ($user == NULL)
			return $this->bad_email();
		else{
            /*
            $this->load->library('email');

            $this->email->from('your@example.com', 'Your Name');
            $this->email->to('someone@example.com');
            $this->email->cc('another@another-example.com');
            $this->email->bcc('them@their-example.com');

            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            $this->email->send();
            */
			$data = array();
			$data['email'] = $this->input->post('reset_email');
            $this->load_view('Guest/pass-reset', $data);
		}
	}

	private function bad_reset(){
		$data = array();
		$data['bad_reset'] = 1;
		$this->load_view('index', $data);
	}

	public function resetPassword(){
		if (($this->input->post('password') == '') || ($this->input->post('password') != $this->input->post('repeated_password')))
			return $this->bad_reset();
		$this->ModelEmployee->resetPassword($this->input->post('reset_email'), $this->input->post('password'));
		$data = array();
		$data['password_changed'] = 1;
		$this->load_view('index', $data);
	}

	/**
	 * Prihvata registracioni link i upucuje na stranicu sa greskom u slucaju pogresnog linka, ili na sign-up stranicu
	 *
	 * @param String $regLink
	 * @param Array $regData
	 * @return void
	 */
	public function create($regLink = NULL, $regData = []){
		
		$regData['invalidLink'] = 0;
		$regData['noAccountsLeft'] = 0;
		
		if ($regLink == NULL) {
			// flag - link doesn't exist
			$regData['invalidLink'] = 1;
			$this->load_view('reg_expired', $regData);
		}
		else {
			$company = $this->ModelCompany->getCompany($regLink);
			if ($company == NULL) {
				// flag - link doesn't apply to any company
				$regData['invalidLink'] = 1;
				$this->load_view('reg_expired', $regData);
			}
			else if ($company->numAccounts == $company->numAccountsUsed) {
				// flag - all accounts used for current company
				$regData['noAccountsLeft'] = 1;
				$this->load_view('reg_expired', $regData);
			}
			else {
				// successful access
				
				$regData['invalidLink'] = 0;
				$regData['noAccountsLeft'] = 0;
				
				$regData['regLink'] = $regLink;
				$regData['companyName'] = $company->companyName;
				$this->load_view('reg', $regData);
			}
		}
	}

	/**
	 * Vrsi proveru podataka iz registracione forme i ili redirektuje nazad na signup stranicu,
	 * u slucaju greske, ili vrsi logovanje radnika i redirekciju
	 * @param String $regLink
	 * @return void
	 */
	public function attempt_create($regLink) {
		
		if ($this->input->post('name') == NULL) {
			$regData['nameInvalid'] = 1;
			$regData['name'] = NULL;		
			
		}
		else {
            if ($this->input->post('name') == "") {
				$regData['nameInvalid'] = 1;
				$regData['name'] = NULL;		
			}
			else {
				$regData['nameInvalid'] = 0;
				$regData['name'] = $this->input->post('name');
			}
		}
		
		if ($this->input->post('surname') == NULL) {
			$regData['surnameInvalid'] = 1;
			$regData['surname'] = NULL;		
			
		}
		else {
                    
			if ($this->input->post('surname') == "") {
                        $regData['surnameInvalid'] = 1;
			$regData['surname'] = NULL;   
                    }
                    else {
			$regData['surnameInvalid'] = 0;
			$regData['surname'] = $this->input->post('surname');
                    }
		}
		
		if ($this->input->post('email') == NULL) {
			$regData['emailInvalid'] = 1;
			$regData['email'] = NULL;		
			
		}
		else {
			$emailPattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
			
			// && $this->input->post('email') != ""
			if (preg_match($emailPattern, $this->input->post('email'))) {
				$regData['emailInvalid'] = 0;
				$regData['email']= $this->input->post('email');
			}
			else {
				$regData['emailInvalid'] = 1;
				$regData['email'] = NULL;
			}
		}
		
		if ($this->input->post('pass') == NULL) {
			$regData['passInvalid'] = 1;
		}
		else {
			if ($this->input->post('pass') == "") {
				$regData['passInvalid'] = 1;
			}
			else {
				$regData['passInvalid'] = 0;
				// conf-pass is checked only if the password field is valid
				
				if ($this->input->post('conf-pass') == NULL) {
					$regData['confPassInvalid'] = 1;
				}
				else {
					if ($this->input->post('conf-pass') == "" || $this->input->post('conf-pass') != $this->input->post('pass')) {
                        $regData['confPassInvalid'] = 1;
                    }
                    else {
						$regData['confPassInvalid'] = 0;
                    }
				}
				
			}
		}
		
		if ($regData['nameInvalid'] == 1 || $regData['surnameInvalid'] == 1 || $regData['emailInvalid'] == 1 || $regData['passInvalid'] == 1 || $regData['confPassInvalid'] == 1)
		{
			$this->create($regLink, $regData);
		}
		else {
			
			// check if this email is in use
			if ($this->ModelEmployee->getAccount($this->input->post('email'), 'Account') != NULL) {
				$regData['emailInvalid'] = 2;
				$this->create($regLink, $regData);
			}
			
			// create employee (account + worker)
			$this->ModelEmployee->createEmployee($this->input->post('name'), $this->input->post('surname'), $this->input->post('email'), $this->input->post('pass'), $this->input->post('companyName'));
			
			// update account number for the current company
			$this->ModelCompany->increaseNumAccountsUsed($this->input->post('companyName'));
			
			// perform login and redirection
			$this->session->set_userdata('worker', 1);
			$this->session->set_userdata('employee', $this->ModelEmployee->getAccount($this->input->post('email'), 'worker'));
			$this->session->set_userdata('account', $this->ModelEmployee->getAccount($this->input->post('email'), 'Account'));
			redirect('Worker');
			
		}
	}
}
