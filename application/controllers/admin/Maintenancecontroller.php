<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenancecontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
        if ($role != 1){
            if ($role == 2){
                redirect('supervisor/supervisorcontroller');
            }
            if ($role == 3){
                redirect('user/usercontroller');
            }
        }
    }

    function index(){
        $this->load->view('admin/maintenance');
    }

    function db_optimization (){
        //ottimizza tutte le tabelle del db
        $DB = new mysqli ('localhost', 'root', 'root');
        $dbname = 'smartfacility';
        $this->maintenancemodel->db_optimization($DB, $dbname);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'DB Maintenance',
            'event' => 'DB Optimization task executed'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/maintenancecontroller');
    }

    function db_backup(){
        $this->maintenancemodel->db_backup();

        //implementare in futuro l'elenco dei file di backup disponibili
        redirect('admin/maintenancecontroller');
    }
}