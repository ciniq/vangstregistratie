<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width'>
    <!--[if($.mobile.media("screen and (max-device-width: 600px)")) {$('meta[name=viewport]').attr('content','width=360');}<![endif]-->
    <meta name='robots' content='noindex, nofollow'>
    <title>VBC Geul &amp; Zijbeken | vangstregistratie</title>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic' rel='stylesheet' type='text/css' media='all'>
    <link href='<?php echo base_url(); ?>css/main.css' rel='stylesheet' type='text/css'>
    <link href='http://www.vr-geul.nl' rel='canonical'>
</head>

<body>
<div class="container">
    <div class="header"><a href="http://www.vbc-geul.nl"><img src="<?php echo base_url(); ?>img/VBC-logo.png" alt="VBC Geul &amp; Zijbeken" class="logo"></a>
        <ul class="title">
            <li>vangstregistratie</li>
            <li>VBC Geul &amp; Zijbeken</li>
        </ul>
    </div><!-- end .header -->
    <div class="content">
        <div id='login_form'>
            <form action='<?php echo base_url();?>register/process' method='post' name='register'>
                <h2>Registreren</h2>
                <br />

                <?php
                    if(isset($data['msg']))
                    {
                        echo '<fieldset class="error"><legend>Er is iets fout gegaan</legend>';
                        echo $data['msg'];
                        echo '</fieldset>';
                    }
                ?>

                <table class="registration">
                    <tr>
                        <td><label for='username'>Gebruikersnaam</label></td>
                        <td><input type='text' name='username' id='username' size='25' value="<?php if(isset($data['userdata']['username'])) echo $data['userdata']['username'];?>" /></td>
                    </tr>
                    <tr>
                        <td><label for='password'>Wachtwoord</label></td>
                        <td><input type='password' name='password' id='password' size='25' /></td>
                    </tr>
                    <tr>
                        <td><label for='passwordcontroll'>Herhaal wachtwoord</label></td>
                        <td><input type='password' name='passwordcontroll' id='passwordcontroll' size='25' /></td>
                    </tr>
                    <tr>
                        <td><label for='firstname'>Voornaam</label></td>
                        <td><input type='text' name='firstname' id='firstname' size='25' value="<?php if(isset($data['userdata']['firstname'])) echo $data['userdata']['firstname'];?>" /></td>
                    </tr>
                    <tr>
                        <td><label for='lastname'>Achternaam</label></td>
                        <td><input type='text' name='lastname' id='lastname' size='25' value="<?php if(isset($data['userdata']['lastname'])) echo $data['userdata']['lastname'];?>" /></td>
                    </tr>
                    <tr>
                        <td><label for='community'>Vispas nummer</label></td>
                        <td><input type='text' name='vispasnr' id='vispasnr' size='25' value="<?php if(isset($data['userdata']['vispasnr'])) echo $data['userdata']['vispasnr'];?>" /></td>
                    </tr><tr>
                        <td><label for='vispasnr'>Vereniging</label></td>
                        <td><input type='text' name='community' id='community' size='25' value="<?php if(isset($data['userdata']['community'])) echo $data['userdata']['community'];?>" /></td>
                    </tr>
                    <tr>
                        <td><label for='email'>Email</label></td>
                        <td><input type='email' name='email' id='email' size='25' value="<?php if(isset($data['userdata']['email'])) echo $data['userdata']['email'];?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='Submit' value='Registreer' /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div><!-- end .content -->
    <div class="footer">
        <p>&copy; Stichting Visstand Beheer Commissie Geul &amp; Zijbeken</p>
    </div><!-- end .footer -->
</div><!-- end .container -->
</body>
</html>