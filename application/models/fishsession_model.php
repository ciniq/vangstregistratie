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

    public function insertCatch()
    {
        $userid = $this->session->all_userdata();
        if ($userid)
        {
            $userid = $userid['userid'];
            $day = $this->security->xss_clean($this->input->post('day'));
            $month = $this->security->xss_clean($this->input->post('month'));
            $from = $this->security->xss_clean($this->input->post('from'));
            $to = $this->security->xss_clean($this->input->post('to'));
            $community = $this->security->xss_clean($this->input->post('community'));
            $catches = $this->security->xss_clean($this->input->post('catches'));

            $data = array(
                'refto_user_id' => $userid,
                'refto_community_id' => $community,
                'start' => $from,
                'stop' => $to,
                'date' => date( 'Y-m-d', mktime(0, 0, 0, $month, $day, date('Y')))
            );

            $this->db->insert('fishsession', $data);
            $fishsessionid = $this->db->insert_id();

            foreach($catches as $catch)
            {
                if($catch['species'] && $catch['size'] && $catch['amount'])
                {
                    $data = array(
                       'refto_fishsession_id' => $fishsessionid,
                       'refto_size_id' => $catch['size'],
                       'refto_species_id' => $catch['species'],
                       'refto_size_id' => $catch['amount']
                    );

                    $this->db->insert('catch', $data);
                }
            }
            return true;
        }
        return false;
    }

}