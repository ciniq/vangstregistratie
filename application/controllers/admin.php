<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index($msg = NULL){


        $this->load->model('admin_model');
        $this->load->model('login_model');

        // Get the data
        $result = $this->admin_model->getLayoutData();
        $result['user'] = $this->session->all_userdata();
        $result['user']['community'] = $this->login_model->getCommunity($result['user']['refto_community_id']);

        // Load our view to be displayed
        // to the user
        $this->load->view('admin', $result);
    }

    public function processchanges()
    {
        $post = $_POST;
        $this->load->model('admin_model');
        foreach( $post as $p )
        {
            $pass = array('true', 'false');
            if( is_numeric($p['userid']) && in_array($p['checked'], $pass))
            {
                $this->admin_model->updateUserActive($p['userid'], $p['checked']);
            }
        }
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
        $user = $this->session->all_userdata();
        if(!$user['isadmin'])
        {
            redirect('login');
        }
    }
}