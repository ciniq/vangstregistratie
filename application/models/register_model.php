<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getBaseData()
    {
        $communities = $this->db->get('community')->result();

        return array('communities' => $communities);
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
        $email = $this->security->xss_clean($this->input->post('email'));
        $community  = $this->security->xss_clean($this->input->post('community'));
        $msg = '';

        $this->db->where('username', $username);
        $query = $this->db->get('user');
        // Let's check if there are any results
        if (0 < $query->num_rows)
        {
            $msg .= " - De gebruikersnaam is reeds in gebruik!</br>";
        }

        $this->db->where('email', $email);
        $query = $this->db->get('user');
        // Let's check if there are any results
        if (0 < $query->num_rows)
        {
            $msg .= " - Dit email adres is reeds in gebruik!</br>";
        }

        $this->db->where('vispasnr', $vispasnr);
        $query = $this->db->get('user');
        // Let's check if there are any results
        if (0 < $query->num_rows)
        {
            $msg .= " - Dit vispasnummer is reeds in gebruik!</br>";
        }

        if ('' !== $vispasnr && !is_numeric($vispasnr))
        {
            $msg .= " - Het vispasnummer mag alleen uit cijfers bestaan!";
        }

        if ('' == $username)
        {
            $msg .= " - Gebruikersnaam niet ingevuld!</br>";
        }

        if ('' == $password)
        {
            $msg .= " - Wachtwoord niet ingevuld!</br>";
        }

        if ('' == $passwordcontroll)
        {
            $msg .= " - Controle wachtwoord niet ingevuld!</br>";
        }

        if ($passwordcontroll !== $password)
        {
            $msg .= ' - Wachtwoorden zijn niet gelijk!</br>';
        }

        if ('' == $firstname)
        {
            $msg .= " - Voornaam niet ingevuld!</br>";
        }

        if ('' == $lastname)
        {
            $msg .= " - Achtersnaam niet ingevuld!</br>";
        }

        if ('' == $email)
        {
            $msg .= " - Email niet ingevuld!</br>";
        }

        if (!valid_email($email))
        {
            $msg .= " - Email niet geldig!</br>";
        }

        if ('' == $msg)
        {
            $data = array(
                'username' => $username,
                'password' => crypt($password, '%$#'),
                'firstname' => $firstname,
                'lastname' => $lastname,
                'vispasnr' => $vispasnr,
                'refto_community_id' => $community,
                'email' => $email
            );

           $this->mailToUser($email, $firstname, $lastname, $username, $password);
           $this->mailToAdmin($firstname, $lastname);

            $this->db->insert('user', $data);

            return array( 'save_success' => true,
                'msg' => "U bent geregistreerd, een administrator zal u spoedig toegang verlenen.");
        }


        return  array(
            'save_success' => false,
            'msg' => $msg,
            'userdata' =>  array(
                'username' => $username,
                'password' => $password,
                'passwordcontroll' => $passwordcontroll,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'vispasnr' => $vispasnr,
                'community' => $community,
                'email' => $email
            )
        );
    }

    private function mailToUser($email, $firstname, $lastname, $username, $password)
    {
        $to      = $email;
        $subject = 'Registratie vr-geul.nl';
        $message =  'Beste, '.$firstname.' '.$lastname."\r\n\r\n".
            "Bedankt voor uw registratie bij 'vangstregistratie geul'\r\n".
            'Uw account wordt spoedig geactiveerd door een administrator.'."\r\n\r\n".
            'Gebruikersnaam: '.$username."\r\n".
            'Wachtwoord: '.$password."\r\n\r\n".
            'Met vriendelijke groet,'."\r\n\r\n".
            'Het vr-geul team';

        $headers = $this->getHeaders();

        @mail($to, $subject, $message, $headers);
    }

    private function mailToAdmin($firstname, $lastname)
    {
        $to      = 'info@vr-geul.nl';
        $subject = 'Nieuwe registratie vr-geul.nl';
        $message =  'Beste, '."\r\n\r\n".
            "Er is een nieuwe registratie bij 'vangstregistratie geul'\r\n".
            'Dit account graag even activeren.'."\r\n\r\n".
            'Met vriendelijke groet,'."\r\n\r\n".
            'Het vr-geul team';

        $headers = $this->getHeaders();

        @mail($to, $subject, $message, $headers);
    }

    private function getHeaders()
    {
        $headers = "From: no-reply <no-reply@vr-geul.nl>\r\n";
        $headers .= "Reply-To: no-reply@vr-geul.nl\r\n";

        $headers .= "Content-Type: text/plain\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        return $headers;
    }
}