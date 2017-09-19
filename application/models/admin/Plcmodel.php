<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Plcmodel extends CI_Model{

    function list_plcs(){

        $this->db->select('sf_plcs.*, sf_buildings.id_building, sf_buildings.building, sf_functions_plc.id_function_plc, sf_functions_plc.function_plc ');
        $this->db->from('sf_plcs');
        $this->db->join('sf_buildings','sf_buildings.id_building = sf_plcs.building_id');
        $this->db->join('sf_functions_plc','sf_functions_plc.id_function_plc = sf_plcs.function_plc_id');
        $this->db->where('sf_plcs.building_id = sf_buildings.id_building');
        $this->db->where('sf_plcs.function_plc_id = sf_functions_plc.id_function_plc');
        $this->db->order_by('sf_buildings.building', 'ASC');
        $this->db->order_by('sf_plcs.name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_buildings(){

        $this->db->select('*');
        $this->db->from('sf_buildings');
        $this->db->order_by('building', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function list_functions(){

        $this->db->select('*');
        $this->db->from('sf_functions_plc');
        $this->db->order_by('function_plc', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function create_object($table, $data){
        $this->db->insert($table, $data);
    }

    function delete_object($table, $field, $id){
        $this->db->where($field, $id);
        $this->db->delete($table);
    }

    function update_object($table, $field, $id, $data){
        $this->db->where($field, $id);
        $this->db->update($table, $data);
    }

    function read_plc($id){
        $this->db->select('*');
        $this->db->from('sf_plcs');
        $this->db->join('sf_buildings', 'sf_buildings.id_building = sf_plcs.building_id');
        $this->db->join('sf_functions_plc', 'sf_functions_plc.id_function_plc = sf_plcs.function_plc_id');
        $this->db->where('sf_plcs.id_plc', $id);
        $this->db->where('sf_plcs.function_plc_id = sf_functions_plc.id_function_plc');
        $this->db->where('sf_plcs.building_id = sf_buildings.id_building');
        $query = $this->db->get()->result();

        return $query;
    }

    function read_building($id){
        $this->db->select('*');
        $this->db->from('sf_buildings');
        $this->db->where('id_building', $id);
        $this->db->order_by('sf_buildings.building', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function read_function($id){
        $this->db->select('*');
        $this->db->from('sf_functions_plc');
        $this->db->where('id_function_plc', $id);
        $this->db->order_by('sf_functions_plc.function_plc', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function read_plc_name($id){
        $this->db->select('name');
        $this->db->from('sf_plcs');
        $this->db->where('sf_plcs.id_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function read_building_name($id){
        $this->db->select('building');
        $this->db->from('sf_buildings');
        $this->db->where('sf_buildings.id_building', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function read_function_plc_name($id){
        $this->db->select('function_plc');
        $this->db->from('sf_functions_plc');
        $this->db->where('sf_functions_plc.id_function_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }
}