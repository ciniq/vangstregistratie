<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getLayoutData()
    {
       $this->db->select('
            cm.displayname as community,
            u.id,
            u.firstname,
            u.lastname,
            u.username,
            u.vispasnr,
            u.email,
            u.active
        ');
        $this->db->from('user u');
        $this->db->join('community cm', 'u.refto_community_id = cm.id');

        $data = $this->db->get();
        return array( 'users' => $data->result());

    }

    public function updateUserActive($id, $value)
    {
        $value = ('true' === $value ? 1 : 0);

        $this->db->where('id', (int)$id);

        $this->db->update('user',  array('active' => $value));

        echo ($this->db->last_query());
    }
}