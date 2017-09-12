<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller{

    public function index(){
        //mostra tutti gli utenti del sistema
        $users['users'] = $this->adminmodel->read_users();
        $this->load->view('admin/indexadmin', $users);
    }

    function edit_user(){
        $id = $this->uri->segment(4);
        $users['users'] = $this->adminmodel->read_single_user($id);
        $roles['roles'] = $this->adminmodel->read_roles();
        $this->load->view('admin/edit_user', array_merge($users, $roles));
    }

    function update_user(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }
        //verifica eventuali cambi della password
        //recupera quella vecchia dal db
        $id = $this->input->post('id_user');
        $old_pw= $this->adminmodel->read_password($id);
        $pw = $this->input->post('confirmpassword');
        if ($old_pw != $pw) {
            //se non coincidono la considera come cambiata e applica ash
            $pw2save = sha1($pw);
            $date = date('Y-m-d H:i:s');
            $newdate = strtotime ( '+3 month' , strtotime ( $date ) );
            $newdate = date ( 'Y-m-d H:i:s' , $newdate );
            $data=array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $pw2save,
                'role_id' => $this->input->post('role_id'),
                'pwexpireAt' => $newdate
            );

            //TO DO
            //funzione per aggiornamento scadenza password

        }else{
            $data=array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role_id'),
            );
        }
        $this->adminmodel->update_user($id, $data);

        redirect('admin/admincontroller');
    }

    function new_user(){
        $roles['roles'] = $this->adminmodel->read_roles();
        $this->load->view('admin/create_user', $roles);
    }

    function create_user(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
            }else{
                $pw = $this->input->post('confirmpassword');
                $cpw = sha1($pw);
                //TO DO funzione scadenza password
                $data=array(
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => $cpw,
                    'role_id' => $this->input->post('role_id'),
                    'enabled' => 0,
                    'createdAt' => date('Y-m-d H:i:s')
                    //TO DO password expire
                );
                $this->adminmodel->create_user($data);
            }
        redirect('admin/admincontroller');
    }

    function delete_user(){
        $id = $this->uri->segment(4);
        if ($id != 1){
            //se non è il default admin cancella l'utente
            $this->adminmodel->delete_user($id);
        }
        redirect('admin/admincontroller');
    }

    function enable_user(){
        $id = $this->uri->segment(4);
        $data = array(
            'enabled' => 1
        );
        $this->adminmodel->update_user($id, $data);

        redirect('admin/admincontroller');
    }

    function disable_user(){
        $id = $this->uri->segment(4);
        $data = array(
            'enabled' => 0
        );
        $this->adminmodel->update_user($id, $data);

        redirect('admin/admincontroller');
    }

    function logout(){
        //distrugge sessione

        // reindirizza alla home page
        $this->load->view('welcome_message');
    }
}