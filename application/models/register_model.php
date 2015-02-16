<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /**
     * register a new user
     */
    public function register(){
        //user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $passwordcontroll = $this->security->xss_clean($this->input->post('passwordcontroll'));
        $firstname = $this->security->xss_clean($this->input->post('firstname'));
        $lastname = $this->security->xss_clean($this->input->post('lastname'));
        $vispasnr = $this->security->xss_clean($this->input->post('vispasnr'));
        $email = valid_email($this->security->xss_clean($this->input->post('email')));

        $msg = '';
        if ('' == $username)
        {
            $msg .= "Gebruikersnaam niet ingevuld!</br>";
        }

        if ('' == $password)
        {
            $msg .= "Wachtwoord niet ingevuld!</br>";
        }

        if ('' == $passwordcontroll)
        {
            $msg .= "Controle wachtwoord niet ingevuld!</br>";
        }

        if ($passwordcontroll !== $password)
        {
            $msg .= 'Wachtwoorden zijn niet gelijk</br>';
        }

        if ('' == $firstname)
        {
            $msg .= "Voornaam niet ingevuld!</br>";
        }

        if ('' == $lastname)
        {
            $msg .= "Achtersnaam niet ingevuld!</br>";
        }

        if ('' == $email)
        {
            $msg .= "email niet ingevuld!</br>";
        }

        if ('' == $msg)
        {
            $data = array(
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'firstname' => $firstname,
                'lastname' => $lastname,
                'vispasnr' => $vispasnr,
                'email' => $email
            );

            $this->db->insert('user', $data);

            return array( 'save_success' => true,
                'msg' => "U bent geregistreerd, een administrator zal u spoedig toegang verlenen.");
        }

        return  array(
        'save_success' => false,
                'msg' => "Er is iets fout gegaan:</br>". $msg
                );
    }
}