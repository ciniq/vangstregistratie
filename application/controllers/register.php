<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;

        $this->load->view('register', $data);
    }

    public function process(){
        // Load the model
        $this->load->model('register_model');
        // Validate the user can login
        $result = $this->register_model->register();
        // Now we verify the result

        if(! $result['save_success']){
            // If user did not validate, then show them login page again
            $this->index($result['msg']);
        }else{
            // If user did validate,
            // Send them to members area
            redirect('welcome');
        }
    }
}