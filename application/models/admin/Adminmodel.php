<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Adminmodel extends CI_Model
{
    function create_user($data){

    }

    function read_users(){
        //popola la lista degli utenti ordinandola
        $this->db->select('*');
        $this->db->from('sf_users');
        $this->db->join('sf_roles', 'sf_roles.id_role = sf_users.role_id');
        $this->db->where('sf_users.role_id = sf_roles.id_role');
        $this->db->order_by('sf_roles.id_role', 'ASC');
        $this->db->order_by('sf_users.name', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function read_single_user($id){
        $this->db->select('*');
        $this->db->from('sf_users');
        $this->db->where('id_user', $id);
        $query = $this->db->get()->result();

        return $query[0];
    }

    function update_user($id, $data){
        $this->db->where('id_user', $id);
        $this->db->update('sf_users', $data);
    }

    function delete_user($id){
        //prima verifica che l'utente da eliminare non sia il default administrator, id 1
        //per ragioni di sicurezza il default admin può solo essere disabilitato da un altro admin
        if($id!=1){
            $this->db->where('id_user', $id);
            $this->db->delete(sf_users);
        }else{
            //Warning: Default Administrator cannot be deleted
        }
    }

    function enable_user($id, $data){
        if ($data == 1){
            $this->db->where('id_user', $id);
            $this->db->update('sf_users', $data);
        }else{
            $this->db->where('id_user', $id);
            $this->db->update('sf_users', $data);
        }
    }
}