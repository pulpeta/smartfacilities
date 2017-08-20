<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Adminmodel extends CI_Model
{
    function read_users(){
        //popola la lista degli utenti ordinandola
        $this->db->select('*');
        $this->db->from('sf_roles');
        $this->db->join('sf_users', 'sf_roles.id_role = sf_users.role_id');
        $this->db->order_by('sf_roles.id_role', 'ASC');
        $this->db->order_by('sf_users.name', 'ASC');
        $query = $this->db->get()->result();

        if ($query){
            return $query;
        } else {
            return null;
        }
    }

    function read_single_user(){

    }

    function create_user(){

    }

    function edit_user(){

    }

    function delete_user(){
        //prima verifica che l'utente da eliminare non sia il default administrator, id 1
        //per ragioni di sicurezza il default admin può solo essere disabilitato da un altro admin
    }
}