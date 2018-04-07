<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(isset($loggedin) || $loggedin = TRUE){

            if ($role == 1){
                redirect('admin/admincontroller');
                }
            if ($role == 2){
                redirect('supervisor/supervisorcontroller');
                }
            if ($role == 3){
                redirect('user/usercontroller');
                }
            }
    }

    function index(){

	    //attivare per home page
	    //$last['names'] = $this->model->read_logon();
	    //$trends['trends'] = $this->model->read_trend();
        //$limits['limits'] = $this->model->read_limits();
	    $this->load->view('welcome_message'/*, array_merge($trends, $last, $limits)*/);

        //attivare per users management
        //$users['users'] = $this->adminmodel->read_users();
        //$this->load->view('admin/indexadmin', $users);
    }

	function login(){

        $this->load->view('login');
    }

    function trends(){
        $trends['trends'] = $this->model->readall_trend();
	    $this->load->view('general_trends', $trends);
    }

    function wiki(){
        $this->load->view('wiki/index');
    }
}
