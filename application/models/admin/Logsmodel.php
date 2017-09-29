<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Logsmodel extends CI_Model{

    function logs_count($user, $type){
        $this->db->select('id_log');
        $this->db->from('sf_logs');
        if ($user != null ) {
            $this->db->where('sf_logs.username', $user);
        }
        if ($type != null) {
            $this->db->where('sf_logs.event_type', $type);
        }
        $query = $this->db->get();
        $count =  $query->result();
        return count($count);
        //per paginazione risulati
    }

    public function fetch_logs($limit, $start, $user, $type) {

        $this->db->select('*');
        $this->db->from('sf_logs');
        $this->db->limit($limit, $start);
        if ($user != null ) {
            $this->db->where('sf_logs.username', $user);
        }
        if ($type != null) {
            $this->db->where('sf_logs.event_type', $type);
        }
        $query = $this->db->get();

        //$query = $this->db->get("sf_logs");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        //per paginazione risultati
    }

    function list_logs($user, $type){
        $this->db->select('*');
        $this->db->from('sf_logs');
        if ($user != null ) {
            $this->db->where('sf_logs.username', $user);
            }
        if ($type != null) {
            $this->db->where('sf_logs.event_type', $type);
            }
        $this->db->order_by('sf_logs.date', 'DESC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_users(){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->from('sf_logs');
        $this->db->order_by('username', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_types(){
        $this->db->distinct();
        $this->db->select('event_type');
        $this->db->from('sf_logs');
        $this->db->order_by('event_type', 'ASC');
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
            $name = $un->full_name;
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
            $name = $un->full_name;
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