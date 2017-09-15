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

}