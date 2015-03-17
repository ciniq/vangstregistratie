<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fishsession extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index($msg = NULL){


        $this->load->model('fishsession_model');
        // Validate the user can login
        $result = $this->fishsession_model->getLayoutData();
        $result['user'] = $this->session->all_userdata();
        // Load our view to be displayed
        // to the user
        $this->load->view('fishsession', $result);
    }

    public function registercatch()
    {
        $this->load->model('fishsession_model');
        $result = $this->fishsession_model->insertCatch();

        if (!$result)
        {
            $this->load->view('fishsession', array('msg' => 'Er is iets fout gegaan met opslaan'));
        }
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}