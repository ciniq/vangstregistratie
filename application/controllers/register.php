<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index($data = array()){

        // Load our view to be displayed
        $msg['data'] = $data;
        $this->load->view('register', $msg);
    }

    public function process(){
        // Load the model
        $this->load->model('register_model');
        // Validate the user can login
        $result = $this->register_model->register();
        // Now we verify the result

        if(! $result['save_success']){
            // If user did not validate, then show them login page again
            $this->index($result);
        }else{
            // If user did validate,
            // Send them to members area
            redirect('welcome');
        }
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}