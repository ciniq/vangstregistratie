<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fishsession extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index($msg = NULL){


        $this->load->model('fishsession_model');
        // Validate the user can login
        $result = $this->fishsession_model->getLayoutData();

        // Load our view to be displayed
        // to the user
        $this->load->view('fishsession', $result);
    }

    public function registercatch()
    {
        var_dump($_POST);
    }
}