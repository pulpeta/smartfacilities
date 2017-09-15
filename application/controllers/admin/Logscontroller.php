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

    function export_logs(){
        $logs = $this->logsmodel->show_logs();
        $csv='';
        if($logs){
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

            //exit;
        }else {
                echo "<h2 style='text-align: center; color: red; font-family: Verdana'>Nessun Log trovato, export fallito</h2>";
                echo "<p style='margin-left: 30px'>Nessun record trovato nella tabella dei Logs. In caso di errore contattare l'amministratore del sistema...<br/> ah già sei tu...<br/>beh fai 2 controlli che sembra essere il caso</p>";
            }
    }
}