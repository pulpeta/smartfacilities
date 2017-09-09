<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontroller extends CI_Controller{

    public function index(){
        //mostra tutti gli utenti del sistema
        $users['users'] = $this->adminmodel->read_users();
        $this->load->view('admin/indexadmin', $users);
    }



    function edit_user(){

    }

    function new_user(){
        $roles['roles'] = $this->adminmodel->read_roles();
        $this->load->view('admin/create_user', $roles);
    }

    function create_user(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if ($this->form_validation->run() == FALSE){
            //if failed
                echo 'no no no';
            }else{
                $data=array(
                    'name' => $this->input->post('name'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('confirmpassword'),
                    'role_id' => $this->input->post('role_id'),
                    'enabled' => 0,
                    'createdAt' => date('Y-m-d H:i:s')
                );
                $this->adminmodel->create_user($data);
            }
        //redirect('admin/admincontroller');
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