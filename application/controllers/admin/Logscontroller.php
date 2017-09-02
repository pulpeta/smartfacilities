<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logscontroller extends CI_Controller{

    function logsindex(){
        $logs['logs'] = $this->logsmodel->list_logs();
        $this->load->view('admin/logs', $logs);
    }
}