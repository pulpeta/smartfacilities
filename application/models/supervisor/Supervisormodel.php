<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Supervisormodel extends CI_Model{

    function list_plcs(){
        $this->db->select('sf_plcs.*, sf_buildings.id_building, sf_buildings.building, sf_functions_plc.id_function_plc, sf_functions_plc.function_plc');
        $this->db->from('sf_plcs');
        $this->db->join('sf_buildings','sf_buildings.id_building = sf_plcs.building_id');
        $this->db->join('sf_functions_plc','sf_functions_plc.id_function_plc = sf_plcs.function_plc_id');
        $this->db->where('sf_plcs.building_id = sf_buildings.id_building');
        $this->db->where('sf_plcs.function_plc_id = sf_functions_plc.id_function_plc');
        $this->db->order_by('sf_buildings.building', 'ASC');
        $this->db->order_by('sf_plcs.location', 'ASC');
        $this->db->order_by('sf_plcs.name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
        }

    function read_single_plc($id){
        $this->db->select('sf_plcs.id_plc, sf_plcs.name, sf_plcs.temp_min, sf_plcs.temp_max, sf_plcs.hum_min, sf_plcs.hum_max ');
        $this->db->from('sf_plcs');
        $this->db->where('sf_plcs.id_plc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

}