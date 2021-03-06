<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }

    public function index(){
        redirect('overview');
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */