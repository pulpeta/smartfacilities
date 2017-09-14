<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function user_login(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            //if failed
            redirect('welcome/login');
            echo validation_errors();
        }else{
            $user = $this->loginuser->validate_credentials($this->input->post('username'), $this->input->post('password'));
            if ($user){
                //crea dati sessione
                $data = array(
                    'id_username' => $user->id_user,
                    'username' => $user->username,
                    'role_id' => $user->role_id,
                    'logged-in' => true
                    );
                $this->session->set_userdata($data);

                //TODO:
                //salvataggio login utente in sf_logs
                //salvataggio lastlogon dentro a tabella sf_user

                if ($data['role_id'] == 1){
                    //administrator
                    redirect('admin/admincontroller');

                }

                if ($data['role_id'] == 2){
                    //supervisor
                    redirect('supervisor/supervisorcontroller');

                }

                if ($data['role_id'] == 3){
                    //user
                    redirect('user/usercontroller');

                }

            }else{
                redirect('welcome/login');
            }
        }
    }
}
