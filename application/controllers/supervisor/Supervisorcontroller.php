<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisorcontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
        if ($role != 2){
            if ($role == 1){
                redirect('admin/admincontroller');
            }
            if ($role == 3){
                redirect('user/usercontroller');
            }
        }
    }

    public function index(){
        //mostra tutti gli utenti del sistema
        $plcs['plcs'] = $this->supervisormodel->list_plcs();
        $this->load->view('supervisor/indexsupervisor', $plcs);
    }

    function edit_profile(){
        $id = $this->uri->segment(4);
        $users['users'] = $this->adminmodel->read_single_user($id);
        $roles['roles'] = $this->adminmodel->read_roles();
        $this->load->view('supervisor/edit_profile', array_merge($users, $roles));
    }

    function update_profile(){

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
        $editdate = date('Y-m-d H:i:s');
        $pw = $this->input->post('confirmpassword');
        $old_pws = $this->adminmodel->read_password($id);
        foreach ($old_pws as $old_pw) {
            $p = $old_pw->password;
        }

        if ($p != $pw) {
            //se non coincidono la considera come cambiata e applica ash
            $date = date('Y-m-d H:i:s');
            $newdate = strtotime ( '+3 month' , strtotime ( $date ) );
            $newdate = date ( 'Y-m-d H:i:s' , $newdate );
            $data=array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $pw,
                'role_id' => $this->input->post('role_id'),
                'editedAt' => $editdate,
                'pwexpireAt' => $newdate
            );
        }else{
            $data=array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'editedAt' => $editdate,
                'role_id' => $this->input->post('role_id')
            );
        }

        $this->adminmodel->update_user($id, $data);

        //trace user editing
        $tracelog=array(
            'date' => $editdate,
            'username' => $_SESSION['username'],
            'event_type' => 'User Updated',
            'event' => $this->input->post('name'). ' has been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/admincontroller');
    }

    function plc_settings(){
        $id = $this->uri->segment(4);
        $plcs['plcs'] = $this->supervisormodel->read_single_plc($id);
        $this->load->view('supervisor/plc_settings', $plcs);
    }

    function update_plc(){

    }
}