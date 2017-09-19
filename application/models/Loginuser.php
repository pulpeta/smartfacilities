<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Loginuser extends CI_Model {

    function validate_credentials($username, $password){

        $this->db->select('id_user, username, password, role_id, failed_logon');
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

    function find_user($username){
        $this->db->select('id_user, username, failed_logon');
        $this->db->from('sf_users');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query && $query->num_rows() == 1){
            return $query->result()[0];
        } else {
            return null;
        }
    }


    function increment_counter($id_user, $failed_logon){

        $editdate=date('Y-m-d H:i:s');
        $failed = $failed_logon + 1;

        $data = array(
            'failed_logon' => $failed
            );
        $this->db->where('id_user', $id_user);
        $this->db->update('sf_users', $data);
    }

    function disable_user($id_user){

        $editdate=date('Y-m-d H:i:s');

        $data = array(
            'enabled' => 0,
            'editedAt' => $editdate,
            'failed_logon' => 0
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('sf_users', $data);
    }

}