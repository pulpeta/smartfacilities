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

    function create_user(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|min_lengh[8]|matches[passconf]');
        $this->form_validation->set_rules('passconf','Password Confirmation','trim|required');

        if ($this->form_validation->run() == FALSE){
            //if failed
            //$message = "Not valid data";
            //$this->load->view('admin/new_user', $message);
        }else{
            $data=array(
              'name' => $this->input->post(),
              'role_id' => $this->input->post(),
              'username' => $this->input->post(),
              'password' => $this->input->post(),
              'enabled' => 0,
              'createdAt' => date('Y-m-d H:i:s')
            );
            $this->admin->adminmodel->$this->create_user('', $data);
        }
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