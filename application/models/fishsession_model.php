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
        $retval = array('status' => false, 'msg' => '');
        $user = $this->session->all_userdata();
        if ($user)
        {
            $userid = $user['userid'];
            $day = $this->security->xss_clean($this->input->post('day'));
            $month = $this->security->xss_clean($this->input->post('month'));
            $from = $this->security->xss_clean($this->input->post('from'));
            $to = $this->security->xss_clean($this->input->post('to'));
            $community = $this->security->xss_clean($this->input->post('community'));
            $catches = $this->security->xss_clean($this->input->post('catches'));

            if(0 == (int)$community)
            {
                $community = $user['refto_community_id'];
            }

            $retval['status'] = $this->checkInput($day, $month, $from, $to);

            if($retval['status'])
            {
                $data = array(
                    'refto_user_id' => $userid,
                    'refto_community_id' => $community,
                    'start' => $from,
                    'stop' => $to,
                    'date' => date( 'Y-m-d', mktime(0, 0, 0, $month, $day, date('Y'))),
                );

                $this->db->insert('fishsession', $data);
                $fishsessionid = $this->db->insert_id();

                foreach($catches as $catch)
                {
                    if($catch['species'] && $catch['size'] && $catch['amount'])
                    {
                        $retval['status'] = $this->checkCatch($catch['species'], $catch['size'], $catch['amount']);

                        if ($retval['status'])
                        {
                            $data = array(
                                'refto_fishsession_id' => $fishsessionid,
                                'refto_size_id' => $catch['size'],
                                'refto_species_id' => $catch['species'],
                                'amount' => $catch['amount']
                            );

                            $this->db->insert('catch', $data);
                        }
                        else if ($catch['species'] !== 'geen' || $catch['size'] !== '0' || $catch['amount'] !== '0')
                        {
                             $retval['msg'] = 'Er is een fout opgetreden, controlleer de vangsgegevens';
                        }
                    }
                }
            }
            else
            {
                $retval['msg'] = 'Er is een fout opgetreden, controlleer de datum';
            }
        }
        return $retval;
    }

    private function checkInput($day, $month, $from, $to)
    {
        if(!is_numeric($day)){return false;}
        if(!is_numeric($month)){return false;}

        $from = explode(':', $from);
        if(!is_numeric($from[0])){return false;}

        $to = explode(':', $to);
        if(!is_numeric($to[0])){return false;}

        if((int)$to[0] <= (int)$from[0]){return false;}

        return true;
    }

    private function checkCatch($species, $size, $amount)
    {
        if(!is_numeric($species)){return false;}
        if(!is_numeric($size)){return false;}
        if(!is_numeric($amount)){return false;}

        return true;
    }
}