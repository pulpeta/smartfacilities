<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Loginuser extends CI_Model {

    function validate_credentials($username, $password){

        $this->db->select('id_user, username, password, role_id');
        $this->db->from('sf_users');
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $this->db->where('enabled', 1);
            $query = $this->db->get();

        if ($query && $query->num_rows() == 1){
            return $query->result()[0];
        } else {
            return null;
        }
    }

}