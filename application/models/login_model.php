<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('active', true);

        // Run the query
        $query = $this->db->get('user');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();

            if(crypt($password, '%$#') === $row->password)
            {
                $data = array(
                    'userid' => $row->id,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'username' => $row->username,
                    'validated' => true,
                    'isadmin'  => $row->isadmin,
                    'refto_community_id' => $row->refto_community_id
                );

                $this->session->set_userdata($data);
                return true;
            }
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function getCommunity($id)
    {
        $this->db->select('displayname as community');
        $this->db->from('community');
        $this->db->where('id = '. $id);

        $data = $this->db->get()->result();

        return $data[0]->community;
    }
}