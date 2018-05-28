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

    public function accounts($message = NULL, $accountId = NULL){
        $data = array();
        $data['reg_link'] = $this->ModelCompany->getCompanyByName($this->session->userdata('employee')->companyName);
        $data['menadzeri'] = $this->ModelEmployee->getEmployeeByCompany($this->session->userdata('employee')->companyName, 'Manager');
        $data['radnici'] = $this->ModelEmployee->getEmployeeByCompany($this->session->userdata('employee')->companyName, 'Worker');
        $data['timovi'] = $this->ModelTeam->getTeamsByCompany($this->session->userdata('employee')->companyName);
        $data['message'] = $message;
        $data['accid'] = $accountId;

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
        var_dump($_POST);
        if($checkbox == NULL){
            //checkbox je odcekiran
            //manager -> worker
            
        }

        //redirect("Director/$message/$accountId");
    }

    public function editAccountWorker($accountId){
        $message = NULL;
        $checkbox = $this->input->post("ismngr$accountId");
        var_dump($_POST);
        if($checkbox != NULL){
            //checkbox je cekiran
            //worker -> manager

        }

        //redirect("Director/$message/$accountId");
    }

    public function teams(){
        //TO DO
    }

    public function tasks(){
        //TO DO
    }

    public function viewEmployee($employeeId){
        //TO DO
    }
}
