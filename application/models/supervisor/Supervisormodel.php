<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Supervisormodel extends CI_Model{

    function read_single_plc($id){
        $this->db->select('sf_plcs.id_plc, sf_plcs.name, sf_plcs.temp_min, sf_plcs.temp_max, sf_plcs.hum_min, sf_plcs.hum_max ');
        $this->db->from('sf_plcs');
        $this->db->where('sf_plcs.id_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function filter_plc($id_building){
        $this->db->select('sf_plcs.*, sf_buildings.id_building, sf_buildings.building, sf_functions_plc.id_function_plc, sf_functions_plc.function_plc');
        $this->db->from('sf_plcs');
        $this->db->join('sf_buildings','sf_buildings.id_building = sf_plcs.building_id');
        $this->db->join('sf_functions_plc','sf_functions_plc.id_function_plc = sf_plcs.function_plc_id');

        if ($id_building != 0) {
            $this->db->where('sf_plcs.building_id', $id_building);
        }else{
            $this->db->where('sf_plcs.building_id = sf_buildings.id_building');
        }
        $this->db->where('sf_plcs.function_plc_id = sf_functions_plc.id_function_plc');
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

    function list_users (){
        $this->db->select('sf_users.id_user, sf_users.full_name');
        $this->db->from('sf_users');
        $this->db->where('sf_users.role_id', 3);
        $this->db->order_by('sf_users.full_name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_plcs(){
        $this->db->select('sf_plcs.id_plc, sf_plcs.name, sf_plcs.location');
        $this->db->from('sf_plcs');
        $this->db->order_by('sf_plcs.name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function check_duplication($user, $plc){
        $this->db->select('*');
        //$this->db->from('sf_usr_plc');
        $this->db->where('user_id', $user);
        $this->db->where('plc_id', $plc);
        $query = $this->db->get('sf_usr_plc');
        $num = $query->num_rows();

        return $num;
    }

    function new_assignement($data){

        $this->db->insert('sf_usr_plc', $data);
    }

    function assigned_plcs($id){
        //check if plc is assigned or not
        $this->db->select('sf_usr_plc.*, sf_users.full_name, sf_plcs.name, sf_plcs.location');
        $this->db->from('sf_usr_plc');
        $this->db->join('sf_plcs', ' sf_plcs.id_plc = sf_usr_plc.plc_id');
        $this->db->join('sf_users', 'sf_users.id_user = sf_usr_plc.user_id');
        if ($id!=0) {
            $this->db->where('sf_usr_plc.user_id', $id);
            }
        $query = $this->db->get()->result();

        return $query;
    }

    function get_assignement_info($id){
        $this->db->select('sf_users.full_name, sf_plcs.name');
        $this->db->from('sf_usr_plc');
        $this->db->join('sf_plcs', ' sf_plcs.id_plc = sf_usr_plc.plc_id');
        $this->db->join('sf_users', 'sf_users.id_user = sf_usr_plc.user_id');
        $this->db->where('id_usr_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function remove_assignement($id){
        $this->db->where('id_usr_plc', $id);
        $this->db->delete('sf_usr_plc');
    }

}