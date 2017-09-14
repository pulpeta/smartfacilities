<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenancecontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in', 'role');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    public function index(){
        $this->load->view('admin/maintenance');

    }
}