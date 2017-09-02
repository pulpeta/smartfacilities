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

    }

    function enable_user(){
        //select info stato utente
        //se abilitato aggiorna come disabilitato
        //se disabilitato aggiorna come abilitato

        $this->load->view('admin/indexadmin');
    }

    function logout(){
        //distrugge sessione e reindirizza

        $this->load->view('welcome_message');
    }
}