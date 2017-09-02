<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Model extends CI_Model {

    //CRUD
    //CREATE
    //READ
    function read_logon(){

        $this->db->select('sf_users.username');
        $this->db->from('sf_users');
        $this->db->join('sf_logs', 'sf_logs.user_id = sf_users.id_user');
        $this->db->where('event_type_id', 1);
        $this->db->order_by('id_log', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get()->result();

        if ($query){
            return $query[0];
        } else {
            return null;
        }

    }

    function read_trend(){
        $this->db->select('temp, humid, date');
        $this->db->from('sf_records');
        $this->db->join('sf_plcs', 'sf_records.plc_id = sf_plcs.id_plc');
        $this->db->where('plc_id', 1);
        $this->db->order_by('date', 'ASC');
        $this->db->limit(48);
        $querytrend = $this->db->get()->result();

        if ($querytrend){
            return $querytrend;
        } else {
            return null;
        }
    }

    function readall_trend(){
        $this->db->select('temp, humid, date');
        $this->db->from('sf_records');
        $this->db->join('sf_plcs', 'sf_records.plc_id = sf_plcs.id_plc');
        $this->db->where('plc_id', 1);
        $this->db->order_by('date', 'ASC');
        $querytrend = $this->db->get()->result();

        if ($querytrend){
            return $querytrend;
        } else {
            return null;
        }
    }

    function read_limits(){
        $this->db->select('*');
        $this->db->from('sf_limits');
        $this->db->join('sf_plcs', 'sf_limits.plc_id = sf_plcs.id_plc');
        $this->db->where('plc_id', 1);
        $querylimits = $this->db->get()->result();

        if ($querylimits){
            return $querylimits;
        } else {
            return null;
        }
    }

    //UPDATE
    //DELETE

}