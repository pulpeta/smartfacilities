<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in', 'role');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function index()
	{
	    //attivare per home page
	    $last['names'] = $this->model->read_logon();
	    $trends['trends'] = $this->model->read_trend();
        $limits['limits'] = $this->model->read_limits();
	    $this->load->view('homepage', array_merge($trends, $last, $limits));

        //attivare per users management
        //$users['users'] = $this->adminmodel->read_users();
        //$this->load->view('admin/indexadmin', $users);
    }

	function login()
    {
        $this->load->view('Loginuser');
    }

    function trends(){
        $trends['trends'] = $this->model->readall_trend();
	    $this->load->view('general_trends', $trends);
    }
}
