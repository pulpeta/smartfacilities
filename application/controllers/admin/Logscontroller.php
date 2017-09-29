<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logscontroller extends CI_Controller{

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

        $users['users'] = $this->logsmodel->list_users();
        $types ['types'] = $this->logsmodel->list_types();
        $type = $this->input->post('s_types');
        $user = $this->input->post('s_users');
        $logs['logs'] = $this->logsmodel->list_logs($user, $type);

        $this->load->view('admin/logs', array_merge($logs, $users, $types));

    }

    function search(){
        /**
        $users['users'] = $this->logsmodel->list_users();
        $types ['types'] = $this->logsmodel->list_types();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('users', 'users', 'trim');
        $this->form_validation->set_rules('types', 'types', 'trim');

        $search = ($this->input->post('s_users'))? $this->input->post('s_users'): "";
        //$search = ($this->input->post('s_types'))? $this->input->post('S_typer'): "";
        //$type = $this->input->post('s_types');
        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;

        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/logscontroller/search/$search";
        $config['total_rows'] = $this->logsmodel->logs_count($this->input->post('s_users'), NULL);
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);
        print_r($config["num_links"]);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $logs['logs'] = $this->logsmodel->list_logs($search, NULL, $config["per_page"], $page);
        $logs['links'] = $this->pagination->create_links();
        print_r($logs['links']);

        $this->load->view('admin/logs_paginated', array_merge($logs, $users, $types));
         **/
    }

    function export_logs(){
        $logs = $this->logsmodel->show_logs();
        $csv='';
        if($logs){
            $tracelog=array(
                'date' => date('Y-m-d H:i:s'),
                'username' => $_SESSION['username'],
                'event_type' => 'Logs exported',
                'event' => 'Logs have been exported'
            );
            $this->logsmodel->trace_log($tracelog);

            $csv="Date;Username;Event Type;Event;\n";
            foreach ($logs as $log){
                $csv .= $log->date;
                $csv .= ";";
                $csv .= $log->username;
                $csv .= ";";
                $csv .= $log->event_type;
                $csv .= ";";
                $csv .= $log->event;
                $csv .= ";\n";
            }
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=sf_logs_".date('d-m-y').".csv");
            echo $csv;
            exit;
        }else {
            $tracelog=array(
                'date' => date('Y-m-d H:i:s'),
                'username' => $_SESSION['username'],
                'event_type' => 'Logs exported failed',
                'event' => 'Failed logs extraction'
            );
            $this->logsmodel->trace_log($tracelog);
                echo "<h2 style='text-align: center; color: red; font-family: Verdana'>Nessun Log trovato, export fallito</h2>";
                echo "<p style='margin-left: 30px'>Nessun record trovato nella tabella dei Logs. In caso di errore contattare l'amministratore del sistema...<br/> ah già sei tu...<br/>beh fai 2 controlli che sembra essere il caso</p>";
            }
    }

    function clear_all_logs(){
        $this->logsmodel->clear_all_logs();
        redirect(site_url('admin/logscontroller'));
    }

    function aging_logs(){
        //pulisce i logs più vecchi di un anno a partire dala data di esecuzione del cmando
        $this->logsmodel->aging_logs();
        redirect('admin/logscontroller');

    }
}