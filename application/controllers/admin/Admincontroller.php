<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller{

    public function index(){

        $users = $this->adminmodel->read_users();
        $this->load->view('admin/indexadmin', $users);
    }
}