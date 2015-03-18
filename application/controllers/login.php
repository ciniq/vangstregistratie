<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('login', $data);
    }

    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = 'Login mislukt,<br/><br/>De account gegevens zijn onjuist of uw account is nog niet geactiveerd';
            $this->index($msg);
        }else{
            // If user did validate,
            // Send them to members area
            redirect('welcome');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}