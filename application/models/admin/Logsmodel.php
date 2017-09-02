<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Logsmodel extends CI_Model{

    function list_logs(){
        $this->db->select('*');
        $this->db->from('sf_logs');

        $query = $this->db->get()->result();

        return $query;
    }
}