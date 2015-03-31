<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fishsession extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index($msg = NULL){


        $this->load->model('fishsession_model');
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->fishsession_model->getLayoutData();

        $result['user'] = $this->session->all_userdata();
        $result['user']['community'] = $this->login_model->getCommunity($result['user']['refto_community_id']);
        // Load our view to be displayed
        // to the user
        $this->load->view('fishsession', $result);
    }

    public function registercatch()
    {
        $this->load->model('fishsession_model');
        $result = $this->fishsession_model->insertCatch();

        echo json_encode($result);
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}