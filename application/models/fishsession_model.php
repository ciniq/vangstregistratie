<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fishsession_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getLayoutData()
    {
        $communities = $this->db->get('community')->result();
        $sizes = $this->db->get('size')->result();
        $species = $this->db->get('species')->result();

        return array(
            'community' => $communities,
            'size' => $sizes,
            'species' => $species
        );
    }

}