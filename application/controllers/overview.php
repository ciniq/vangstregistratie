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
        $this->load->model('login_model');

        $msg['data'] = $this->overview_model->getOverview();
        $msg['user'] = $this->session->all_userdata();
        $msg['user']['community'] = $this->login_model->getCommunity($msg['user']['refto_community_id']);
        $this->load->view('overview', $msg);
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}