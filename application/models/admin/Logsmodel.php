<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Logsmodel extends CI_Model{

    function list_logs(){
        $this->db->select('sf_logs.date, sf_users.username, sf_logs.event_type, sf_logs.event');
        $this->db->from('sf_logs');
        $this->db->join('sf_users','sf_users.id_user = sf_logs.user_id');
        $this->db->where('sf_logs.user_id = sf_users.id_user');
        $this->db->order_by('sf_logs.date', 'DESC');
        $this->db->limit(50);
        $query = $this->db->get()->result();

        return $query;
    }
}