<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nikola Nedeljkovic 15/0058
 * Employee Controller - klasa za metode zajednicka za uloge Menadzera, Direktora i Radnika ili nekih ponaosob
 * 
 * @version 1.0.0
 */

class Employee extends CI_Controller{
    /**
     * Konstruktor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Ucitava odgovarajuce fiksne header/footer delove stranica za Menadzera, Radnika i Direktora
     *
     * @param String $name
     * @param array $data
     * @return void
     */
    protected function load_view($name, $data=[]){
        $controller = $this->router->fetch_class();
        $data['name'] = $this->session->userdata('account')->name;
        $data['controller'] = $controller;

		$this->load->view("templates/$controller"."_header.php", $data);
        $this->load->view($name, $data);
        $this->load->view("templates/$controller"."_footer.php");
	}

    /**
     * Logout za Menadzera, Radnika i Direktora
     *
     * @return void
     */
    public function signout(){
        $this->session->sess_destroy();
        redirect("Guest");
    }
}