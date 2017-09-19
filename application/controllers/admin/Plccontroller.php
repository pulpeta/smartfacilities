<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plccontroller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');
        $role = $this->session->userdata('role_id');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
        if ($role != 1){
            if ($role == 2){
                redirect('supervisor/supervisorcontroller');
            }
            if ($role == 3){
                redirect('user/usercontroller');
            }
            }
    }

    function index(){

        $this->load->view('admin/infrastructure');
    }

    function indexplc(){
        $plcs['plcs'] = $this->plcmodel->list_plcs();
        $this->load->view('admin/indexplc', $plcs);
    }

    function indexbuilding(){
        $buildings['buildings'] = $this->plcmodel->list_buildings();
        $this->load->view('admin/indexbuilding', $buildings);
    }

    function indexfunctionplc(){
        $functions['functions'] = $this->plcmodel->list_functions();
        $this->load->view('admin/indexfunctionplc', $functions);
    }

    function new_plc(){
        $buildings['buildings'] = $this->plcmodel->list_buildings();
        $functions['functions'] = $this->plcmodel->list_functions();
        $this->load->view('admin/create_plc', array_merge($buildings, $functions));
    }

    function create_plc(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('ipaddress', 'IP_Address', 'trim|required');
        $this->form_validation->set_rules('note', 'Note', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{

            $data=array(
                'name' => $this->input->post('name'),
                'location' => $this->input->post('location'),
                'ip_address' => $this->input->post('ipaddress'),
                'note' => $this->input->post('note'),
                'building_id' => $this->input->post('building_id'),
                'function_plc_id' => $this->input->post('function_plc_id'),
            );
            $this->plcmodel->create_object('sf_plcs', $data);
        }

        //trace user creation
        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'PLC Creation',
            'event' => 'PLC '.$this->input->post('name'). ' has been created'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexplc');
    }

    function delete_plc(){
        $id = $this->uri->segment(4);
        $plc_name = $this->plcmodel->read_plc_name($id);
        foreach ($plc_name as $un){
            $name = $un->name;
        }

        $this->plcmodel->delete_object('sf_plcs','id_plc', $id);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'PLC Removed',
            'event' => 'PLC '.$name .' has been deleted'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexplc');
    }

    function edit_plc(){
        $id = $this->uri->segment(4);
        $plcs['plcs'] = $this->plcmodel->read_plc($id);
        $buildings['buildings'] = $this->plcmodel->list_buildings();
        $functions['functions'] = $this->plcmodel->list_functions();
        $this->load->view('admin/edit_plc', array_merge($plcs, $buildings, $functions));
    }

    function update_plc(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('ipaddress', 'IP_Address', 'trim|required');
        $this->form_validation->set_rules('note', 'Note', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else {
            $id = $this->input->post('id_plc');
            $data = array(
                'name' => $this->input->post('name'),
                'location' => $this->input->post('location'),
                'ip_address' => $this->input->post('ipaddress'),
                'note' => $this->input->post('note'),
                'building_id' => $this->input->post('building_id'),
                'function_plc_id' => $this->input->post('function_plc_id'),
            );
            $this->plcmodel->update_object('sf_plcs', 'id_plc', $id, $data);

            $tracelog=array(
                'date' => date('Y-m-d H:i:s'),
                'username' => $_SESSION['username'],
                'event_type' => 'PLC Updated',
                'event' => 'PLC '.$this->input->post('name'). ' has been updated'
            );
            $this->logsmodel->trace_log($tracelog);

            redirect('admin/plccontroller/indexplc');
        }
    }

    function new_building(){
        $this->load->view('admin/create_building');
    }

    function create_building(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('building', 'Building', 'trim|required');
        $this->form_validation->set_rules('buildingcode', 'Building_code', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{
            $data=array(
                'building' => $this->input->post('building'),
                'building_code' => $this->input->post('buildingcode'),
                );
            $this->plcmodel->create_object('sf_buildings', $data);
        }

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Building Creation',
            'event' => 'Building '.$this->input->post('building'). ' has been created'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexbuilding');
    }

    function delete_building(){
        $id = $this->uri->segment(4);
        $building_name = $this->plcmodel->read_building_name($id);
        foreach ($building_name as $un){
            $name = $un->building;
        }

        $this->plcmodel->delete_object('sf_buildings','id_building', $id);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Building Removed',
            'event' => 'Building '.$name .' has been deleted'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexbuilding');
    }

    function edit_building(){
        $id = $this->uri->segment(4);
        $buildings['buildings'] = $this->plcmodel->read_building($id);
        $this->load->view('admin/edit_building', $buildings);
    }

    function update_building(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('building', 'Building', 'trim|required');
        $this->form_validation->set_rules('building_code', 'Building_code', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }
        $id = $this->input->post('id_building');
        $data=array(
                'building' => $this->input->post('building'),
                'building_code' => $this->input->post('buildingcode')
            );
        $this->plcmodel->update_object('sf_buildings', 'id_building', $id, $data);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Building Updated',
            'event' => 'Building '.$this->input->post('building'). ' has been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexbuilding');
    }

    function new_function_plc(){
        $this->load->view('admin/create_function_plc');
    }

    function create_function_plc(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('function_plc', 'Function_plc', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{
            $data=array(
                'function_plc' => $this->input->post('function_plc'),
                'description' => $this->input->post('description'),
            );
            $this->plcmodel->create_object('sf_functions_plc', $data);
        }

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Function PLC Creation',
            'event' => 'Function PLC '.$this->input->post('function_plc'). ' has been created'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexfunctionplc');
    }

    function delete_function_plc(){
        $id = $this->uri->segment(4);
        $function_name = $this->plcmodel->read_function_plc_name($id);
        foreach ($function_name as $un){
            $name = $un->function_plc;
        }

        $this->plcmodel->delete_object('sf_functions_plc','id_function_plc', $id);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Function PLC Removed',
            'event' => 'Function PLC '.$name .' has been deleted'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexfunctionplc');
    }

    function edit_function_plc(){
        $id = $this->uri->segment(4);
        $functions['functions'] = $this->plcmodel->read_function($id);
        $this->load->view('admin/edit_function_plc', $functions);
    }

    function update_function_plc(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('function_plc', 'Function', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }
        $id = $this->input->post('id_function_plc');
        $data=array(
            'function_plc' => $this->input->post('function_plc'),
            'description' => $this->input->post('description')
        );
        $this->plcmodel->update_object('sf_functions_plc', 'id_function_plc', $id, $data);

        $tracelog=array(
            'date' => date('Y-m-d H:i:s'),
            'username' => $_SESSION['username'],
            'event_type' => 'Function PLC Updated',
            'event' => 'Function PLC '.$this->input->post('function_plc'). ' has been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/plccontroller/indexfunctionplc');
    }

}