<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
        if ($role != 3){
            if ($role == 1){
                redirect('admin/admincontroller');
            }
            if ($role == 2){
                redirect('supervisor/supervisorcontroller');
            }
        }
    }

    public function index(){
        //mostra tutti gli utenti del sistema
        $this->load->view('user/indexuser');
    }
}