<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//klasa za zajednicke metode radnika/menadzera/direktora?

class Employee extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }

    protected function load_view($name, $data=[]){
        $controller = $this->router->fetch_class();
        $data['name'] = $this->session->userdata('account')->name;
        $data['controller'] = $controller;

		$this->load->view("templates/$controller"."_header.php", $data);
        $this->load->view($name, $data);
        $this->load->view("templates/$controller"."_footer.php");
	}

    public function signout(){
        $this->session->sess_destroy();
        redirect("Guest");
    }
}