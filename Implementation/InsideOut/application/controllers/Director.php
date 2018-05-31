<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Employee.php');

class Director extends Employee {

	public function __construct() {
        parent::__construct();
        
        $this->load->model("ModelCompany");
        $this->load->model("ModelEmployee");
        $this->load->model("ModelTeam");

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

    public function accounts($message = NULL, $accountId = NULL, $price = null, $calcModal = null, $priceModal = null){

        $data = array();
        $data['company'] = $this->ModelCompany->getCompanyByName($this->session->userdata('employee')->companyName);
        $data['menadzeri'] = $this->ModelEmployee->getEmployeeByCompany($this->session->userdata('employee')->companyName, 'Manager');
        $data['radnici'] = $this->ModelEmployee->getEmployeeByCompany($this->session->userdata('employee')->companyName, 'Worker');
        $data['timovi'] = $this->ModelTeam->getTeamsByCompany($this->session->userdata('employee')->companyName);
        $data['message'] = $message;
        $data['accid'] = $accountId;
        $data['price'] = $price;
        $data['calcModal'] = $calcModal;
        $data['priceModal'] = $priceModal;

        for ($i=0; $i<count($data['menadzeri']); ++$i){
            $data['menadzeri'][$i] = (array)$data['menadzeri'][$i];
            $data['menadzeri'][$i]['teams'] = $this->ModelTeam->getTeamsByEmail($data['menadzeri'][$i]['email']);
        }

        //print("<pre>".print_r($data['menadzeri'], true)."</pre>");
        

        for ($i=0; $i<count($data['radnici']); ++$i){
            $data['radnici'][$i] = (array)$data['radnici'][$i];
            $data['radnici'][$i]['teams'] = $this->ModelTeam->getTeamsByEmailWorker($data['radnici'][$i]['email']);
        }

        //print("<pre>".print_r($data['radnici'], true)."</pre>");

        $this->load_view('director/accounts', $data);
    }

    public function generate(){
        for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 20; $x = rand(0,$z), $s .= $a{$x}, $i++); 
        $this->ModelCompany->setGeneratedLink($this->session->userdata('employee')->companyName, $s);
        redirect("Director");
    }

    public function editAccountManager($accountId){
        $message = NULL;
        $checkbox = $this->input->post("ismngr$accountId");
        $selection = $this->input->post("select$accountId");
        $account = $this->ModelEmployee->getAccountById($accountId);
        $email = $account -> email;

        //var_dump($_POST);
        if($checkbox == NULL){
            //checkbox je odcekiran
            //manager -> worker 
            if ($selection != NULL){
                $message = "error1";
                redirect("Director/accounts/$message/$accountId");
            }
           
            //izbrisi sve veze menadzerstva
            $this->ModelEmployee->delete('Manager', $email);
            //prebaci u radnika
            $this->ModelEmployee->add('Worker', $email, $this->session->userdata('employee')->companyName);
            redirect("Director");
        }

        //ostaje isti tip
        foreach($selection as $team){
            $tim = $this->ModelTeam->getTeam($team, $this->session->userdata('employee')->companyName);
            if ($tim->email != NULL && $tim->email != $email){
                //selektovan tim vec ima menadzera, greska
                $message = $team;
                redirect("Director/accounts/$message/$accountId");
            }
        }

        //izbrisi sve veze menadzerstva
        $this->ModelEmployee->delete('Manager', $email);
        //dodaj nove
        $this->ModelEmployee->add('Manager', $email, $this->session->userdata('employee')->companyName);
        foreach($selection as $team)
            $this->ModelTeam->setTeamManager($team, $this->session->userdata('employee')->companyName, $email);
        redirect("Director");
    }

    public function editAccountWorker($accountId){
        $message = NULL;
        $checkbox = $this->input->post("ismngr$accountId");
        $selection = $this->input->post("select$accountId");
        $account = $this->ModelEmployee->getAccountById($accountId);
        $email = $account -> email;

        //var_dump($_POST);
        if($checkbox != NULL){
            //checkbox je cekiran
            //worker -> manager
            if ($selection != NULL){
                $message = "error1";
                redirect("Director/accounts/$message/$accountId");
            }
            
            //izbrisi veze radnika
            $this->ModelEmployee->delete('Worker', $email);
            //prebaci u menadzera
            $this->ModelEmployee->add('Manager', $email, $this->session->userdata('employee')->companyName);
            redirect("Director");
        }

        //izbrisi sve veze radnika
        $this->ModelEmployee->delete('Worker', $email);
        //dodaj nove
        $this->ModelEmployee->add('Worker', $email, $this->session->userdata('employee')->companyName);
        foreach($selection as $team)
            $this->ModelTeam->addWorkerTeam($team, $this->session->userdata('employee')->companyName, $email);
        redirect("Director");
    }

    public function teams($message = null){
        $data = array();
        $data['teams'] = $this->ModelTeam->getTeamsByCompany($this->session->userdata('employee')->companyName);
        $data['message'] = $message;

        for ($i=0; $i<count($data['teams']); ++$i){
            $data['teams'][$i] = (array)$data['teams'][$i];
            $data['teams'][$i]['manager'] = $this->ModelEmployee->getAccount($data['teams'][$i]['email'], 'Account');
        }

        $this->load_view('director/teams', $data);
    }

    public function tasks(){
        //TO DO
    }

    public function viewEmployee($employeeId){
        //TO DO
    }

    public function viewTeam($teamName) {
        $companyName = $this->session->userdata('employee')->companyName;

        $data = array();
        $data['employees'] = $this->ModelEmployee->getEmployeesByTeam($companyName, $teamName);
        $data['manager'] = $this->ModelEmployee->getTeamManager($companyName, $teamName);

        $this->load_view('director/team', $data);
    }

    public function deleteTeam() {
        
        $companyName = $this->session->userdata('employee')->companyName;
        $teamName = $this->input->post("teamName");
        
        $this->ModelTeam->deleteTeam($teamName, $companyName);

        redirect("Director/teams");
    }

    public function createTeam() {
        $message = null;

        $teamName = $this->input->post("teamName");
        if ($teamName == null) {
            $message = "Team name cannot be empty";
        } else {
            $companyName = $this->session->userdata('employee')->companyName;

            $team = $this->ModelTeam->getTeam($teamName);
            if ($team != null) {
                $message = "Team $teamName already exists. Please choose another name for the new team";
            } else {
                $this->ModelTeam->createTeam($teamName, $companyName);
            }
        }
        $this->teams($message);
    }

    /* smanjiti broj aktivnih naloga u firmi; smanjiti broj radnika u timu i ukupan broj zadataka u timu - triger? */
    public function resetAccount() {
        $id = $this->input->post("id");
        $companyName = $this->session->userdata('employee')->companyName;        

        $this->ModelEmployee->deleteEmployee($id);

        redirect("Director/accounts");
    }

    public function calculatePrice() {
        $numOfAccounts = $this->input->post("numOfAccounts");
        $company = $this->ModelCompany->getCompanyByName($this->session->userdata('employee')->companyName); 

        // echo $numOfAccounts . " " . $case;
        if (isset($numOfAccounts) && is_numeric($numOfAccounts) && $numOfAccounts > 0) {
            if ($numOfAccounts < $company->numAccountsUsed) {
                $this->accounts("Reset accounts before decreasing", null, null, 1, null);  
            } else {
                $this->accounts(null, null, ($numOfAccounts * 20), null, 1);
            }
        } else {
            $this->accounts("Invalid number of Accounts", null, null, 1, null);
        }
    }

    public function changeNumOfAccounts() {
        $price = $this->input->post("price");
        $numOfAccounts = $price / 20;
        $companyName = $this->ModelCompany->getCompanyByName($this->session->userdata('employee')->companyName)->companyName; 

        $this->ModelCompany->setNumOfAccounts($companyName, $numOfAccounts);
        redirect("Director/accounts");
    }
}
