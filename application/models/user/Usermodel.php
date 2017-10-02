<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Usermodel extends CI_Model{

    function read_single_plc($id){
        $this->db->select('sf_plcs.id_plc, sf_plcs.name, sf_plcs.temp_min, sf_plcs.temp_max, sf_plcs.hum_min, sf_plcs.hum_max ');
        $this->db->from('sf_plcs');
        $this->db->where('sf_plcs.id_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function filter_plc($id_building, $id_user){
        $this->db->select('sf_usr_plc.*, sf_plcs.*');
        $this->db->from('sf_usr_plc');
        $this->db->join('sf_plcs', 'sf_usr_plc.plc_id = sf_plcs.id_plc');
        $this->db->where('sf_usr_plc.user_id', $id_user);
        $this->db->order_by('sf_plcs.location', 'ASC');
        $this->db->order_by('sf_plcs.name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_buildings(){
            $this->db->select('id_building, building');
            $this->db->from('sf_buildings');
            $this->db->order_by('sf_buildings.building', 'ASC');
            $query = $this->db->get()->result();

            return $query;
    }

    function get_user ($id){
        $this->db->select('id_user');
        $this->db->from('sf_users');
        $this->db->where('sf_users.username', $id);
        $query = $this->db->get()->result();

        return $query;
    }

}