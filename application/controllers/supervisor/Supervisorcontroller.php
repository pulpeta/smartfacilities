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

        $this->load->library('form_validation');
        $this->form_validation->set_rules('buildings', 'ID_Building', 'trim|integer');
        //legge l'elenco degli edifici per la combobox
        $buildings['buildings'] = $this->supervisormodel->list_buildings();
        //ricava il codice da filtrare
        $filter = $this->input->post('buildings');
        //legge i dati filtrati
        $plcs['plcs'] = $this->supervisormodel->filter_plc($filter);
        //manda tutto alla view
        $this->load->view('supervisor/indexsupervisor', array_merge($plcs, $buildings));
        }

    function edit_profile(){
        $id = $this->uri->segment(4);
        $users['users'] = $this->adminmodel->read_single_user($id);
        $this->load->view('supervisor/edit_profile', $users);
    }

    function update_profile(){

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

        redirect('supervisor/supervisorcontroller');
    }

    function plc_settings(){
        $id = $this->uri->segment(4);
        $plcs['plcs'] = $this->supervisormodel->read_single_plc($id);
        $this->load->view('supervisor/plc_settings', $plcs);
    }

    function update_plc(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('temp_min', 'Temp_Min', 'trim|decimal');
        $this->form_validation->set_rules('temp_max', 'Temp_Max', 'trim|decimal');
        $this->form_validation->set_rules('hum_min', 'Hum_Min', 'trim|decimal');
        $this->form_validation->set_rules('hum_max', 'Hum_Max', 'trim|decimal');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }
        $id = $this->input->post('id_plc');

        if ($this->input->post('temp_mim') != null){
            $a = array('temp_min' => $this->input->post('temp_min'));
        }else{
            $a = array('temp_min' => null);
        }

        if ($this->input->post('temp_max') != null){
            $b = array('temp_max' => $this->input->post('temp_max'));
        }else{
            $b = array('temp_max' => null);
        }

        if ($this->input->post('hum_min') != null){
            $c = array('hum_min' => $this->input->post('hum_min'));
        }else{
            $c = array('hum_min' => null);
        }

        if ($this->input->post('hum_max') != null){
            $d = array('hum_max' => $this->input->post('hum_max'));
        }else{
            $d = array('hum_max' => null);
        }

        $data = $a + $b + $c + $d;
        $this->plcmodel->update_object('sf_plcs', 'id_plc', $id, $data);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'PLC settings updated',
            'event' => 'PLC '.$this->input->post('name'). ' settings have been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        //redirect('supervisor/supervisorcontroller/index');
    }

    function manage_plc_assignement(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('users', 'users', 'trim');
        $this->form_validation->set_rules('plcs', 'plcs', 'trim');

        $users['users'] = $this->supervisormodel->list_users();

        $user = $this->input->post('full_name');

        $plcs['plcs'] = $this->supervisormodel->assigned_plcs($user);

        $this->load->view('supervisor/assignplc', array_merge($plcs, $users));
    }

    function new_assignement(){
        $plcs['plcs'] = $this->supervisormodel->list_plcs();
        $users['users'] = $this->supervisormodel->list_users();
        $this->load->view('supervisor/create_assignement', array_merge($plcs, $users));
    }

    function create_assignement(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'user', 'trim|required');
        $this->form_validation->set_rules('plc', 'plc', 'trim|required');



        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{

            $check = $this->supervisormodel->check_duplication($this->input->post('user'), $this->input->post('plc'));

            if ($check == 0){
                $creationdate = date('Y-m-d H:i:s');

                $data=array(
                    'user_id' => $this->input->post('user'),
                    'plc_id' => $this->input->post('plc')
                );
                $this->supervisormodel->new_assignement($data);

                $users = $this->adminmodel->read_single_user($this->input->post('user'));
                foreach ($users as $row){
                    $user = $row->full_name;
                }
                $plcs = $this->supervisormodel->read_single_plc($this->input->post('plc'));
                foreach ($plcs as $row){
                    $plc = $row->name;
                }

                //trace user creation
                $tracelog=array(
                    'date' => $creationdate,
                    'username' => $_SESSION['username'],
                    'event_type' => 'PLC Assignement created',
                    'event' => 'User '.$user.' can manage PLC: '.$plc
                );
                $this->logsmodel->trace_log($tracelog);

                redirect('supervisor/supervisorcontroller/manage_plc_assignement');
            }else{
                redirect('supervisor/supervisorcontroller/manage_plc_assignement');
            }
        }
    }

    function remove_plc_assignement(){

        $id = $this->uri->segment(4);

        $infos = $this->supervisormodel->get_assignement_info($id);
        foreach ($infos as $info){
            $user = $info->full_name;
            $plc = $info->name;
        }

        $this->supervisormodel->remove_assignement($id);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'PLC Assignement removed',
            'event' => 'User '.$user.' has no access to PLC: '.$plc
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('supervisor/supervisorcontroller/manage_plc_assignement');
    }

    function remote_management(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('buildings', 'ID_Building', 'trim|integer');
        //legge l'elenco degli edifici per la combobox
        $buildings['buildings'] = $this->supervisormodel->list_buildings();
        //ricava il codice da filtrare
        $filter = $this->input->post('buildings');
        //legge i dati filtrati
        $plcs['plcs'] = $this->supervisormodel->filter_plc($filter);

        //manda tutto alla view
        $this->load->view('supervisor/remotemanagement', array_merge($plcs, $buildings));
    }

    function reports_charts(){
        $this->load->view('supervisor/charts');
    }

    function wiki(){
        $this->load->view('wiki/index');
    }
}