<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

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

	private function load_view($name, $data=[]){
		$this->load->view("templates/css_guest.php", $data);
        $this->load->view($name, $data);
        $this->load->view("templates/js_guest.php");
	}

    public function index()
	{
		$this->load_view('index');
	}
}
