<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function index()
	{
	    //attivare per home page
	    //$last['names'] = $this->model->read_logon();
	    //$trends['trends'] = $this->model->read_trend();
        //$limits['limits'] = $this->model->read_limits();
	    //$this->load->view('welcome_message', array_merge($trends, $last, $limits));

        //attivare per users management
        $users['users'] = $this->adminmodel->read_users();
        $this->load->view('admin/indexadmin', $users);
    }

	function login()
    {
        $this->load->view('login');
    }

    function trends(){
        $trends['trends'] = $this->model->readall_trend();
	    $this->load->view('general_trends', $trends);
    }
}
