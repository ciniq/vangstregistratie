<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overview_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getOverview()
    {
        $userid = $this->session->all_userdata();
        if ($userid)
        {
            $userid = $userid['userid'];

            $this->db->select('
                cm.displayname as community,
                fs.date as date,
                fs.start as start,
                fs.stop as stop,
                c.amount as amount,
                s.size as size,
                sp.name as species
            ');
            $this->db->from('fishsession fs');
            $this->db->join('catch c', 'c.refto_fishsession_id = fs.id');
            $this->db->join('community cm', 'fs.refto_community_id = cm.id');
            $this->db->join('size s', 'c.refto_size_id = s.id');
            $this->db->join('species sp', 'c.refto_species_id = sp.id');
            $this->db->where('fs.refto_user_id = '.$userid);

            $data = $this->db->get();
            return $data->result();
        }
    }
}