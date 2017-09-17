<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Logsmodel extends CI_Model{

    function list_logs(){
        $this->db->select('*');
        $this->db->from('sf_logs');
        $this->db->order_by('sf_logs.date', 'DESC');
        $this->db->limit('50');
        $query = $this->db->get()->result();

        return $query;
    }

    function show_logs(){
        $this->db->select('*');
        $this->db->from('sf_logs');
        $this->db->order_by('sf_logs.date', 'DESC');
        $query = $this->db->get()->result();

        return $query;
    }

    function trace_log($data){
        $this->db->insert('sf_logs', $data);
    }

    function clear_all_logs(){
        //delete all logs
        $this->db->empty_table('sf_logs');
        $date = date('Y-m-d H:i:s');
        //trace who did it
        $user_name = $this->adminmodel->read_user_name($_SESSION['id_user']);
        foreach ($user_name as $un){
            $name = $un->name;
        }
        $trace=array(
            'date' => $date,
            'username' => $_SESSION['username'],
            'event_type' => 'Logs deleted',
            'event' => $name.' deleted all system logs'
        );
        $this->db->insert('sf_logs', $trace);
    }

    function aging_logs(){
        //ricava la data attuale e quella per il confronto eliminazione
        $date = date('Y-m-d H:i:s');
        $old_date = strtotime ( '-1 year' , strtotime ( $date ) );
        $old_date = date ( 'Y-m-d H:i:s' , $old_date );

        //esegue aging
        $this->db->where('date <', $old_date);
        $this->db->delete('sf_logs');

        //recupera i dati per il tracelog
        $user_name = $this->adminmodel->read_user_name($_SESSION['id_user']);
        foreach ($user_name as $un){
            $name = $un->name;
        }

        $trace=array(
            'date' => $date,
            'username' => $_SESSION['username'],
            'event_type' => 'Logs aging',
            'event' => 'Aging logs procedure executed by '.$name
        );
        $this->db->insert('sf_logs', $trace);
    }
}