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

            $logondate = date ( 'Y-m-d H:i:s');

            if ($user){
                //crea dati sessione
                $data = array(
                    'id_username' => $user->id_user,
                    'username' => $user->username,
                    'role_id' => $user->role_id,
                    'logged-in' => true
                    );
                $this->session->set_userdata($data);

                //trace logon in logs
                $tracelog=array(
                    'date' => $logondate,
                    'username' => $user->username,
                    'event_type' => 'User Logon',
                    'event' => 'user logon successfully'
                );
                $this->logsmodel->trace_log($tracelog);

                //save last logon in sf_users table
                $tr_user = array(
                    'lastlogonAt' => $logondate
                );
                $this->adminmodel->update_user($user->id_user, $tr_user);

                //redirect user after logon
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
                $tracelog=array(
                    'date' => $logondate,
                    'username' => $this->input->post('username'),
                    'event_type' => 'Failed Logon',
                    'event' => 'user '.$user->username. ' failed authentication'
                );
                $this->logsmodel->trace_log($tracelog);
                redirect('welcome/login');
            }
        }
    }
}
