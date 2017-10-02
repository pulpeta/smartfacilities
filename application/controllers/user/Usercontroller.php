<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
        if ($role != 3){
            if ($role == 1){
                redirect('admin/admincontroller');
            }
            if ($role == 2){
                redirect('supervisor/supervisorcontroller');
            }
        }
    }

    public function index(){
        //mostra tutti gli utenti del sistema
        $this->load->library('form_validation');
        $this->form_validation->set_rules('buildings', 'ID_Building', 'trim|integer');

        //recupera id user
        $user = $this->usermodel->get_user($_SESSION['username']);
        foreach ($user as $row) {
            $id_user = $row->id_user;
        }
        //legge l'elenco degli edifici per la combobox
        $buildings['buildings'] = $this->usermodel->list_buildings();
        //ricava il codice da filtrare
        $filter = $this->input->post('buildings');
        //legge i dati filtrati

        $plcs['plcs'] = $this->usermodel->filter_plc($filter, $id_user);

        //manda tutto alla view
        $this->load->view('user/indexuser', array_merge($plcs, $buildings));
    }

    function plc_management(){

    }

    public function edit_profile(){
        $id = $this->uri->segment(4);
        $users['users'] = $this->adminmodel->read_single_user($id);
        $this->load->view('user/edit_profile', $users);
    }

    public function update_profile(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('full_name', 'Full_Name', 'trim|required');
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
                'full_name' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'password' => $pw,
                'editedAt' => $editdate,
                'pwexpireAt' => $newdate
            );
        }else{
            $data=array(
                'full_name' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'editedAt' => $editdate
            );
        }

        $this->adminmodel->update_user($id, $data);

        //trace user editing
        $tracelog=array(
            'date' => $editdate,
            'username' => $_SESSION['username'],
            'event_type' => 'User Updated',
            'event' => $this->input->post('full_name'). ' has been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('user/usercontroller');
    }

}