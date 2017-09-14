<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logscontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in', 'role');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function logsindex(){
        $logs['logs'] = $this->logsmodel->list_logs();
        $this->load->view('admin/logs', $logs);
    }
}