<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overview extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index($data = array())
    {
        // Load our view to be displayed
        $this->load->model('overview_model');

        $msg['data'] = $this->overview_model->getOverview();
        $this->load->view('overview', $msg);
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}