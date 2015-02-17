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
        <div class="menu">
            <ul class="nav">
            <li><a href="#">log uit</a></li>
            <li><a href="#">overzicht</a></li>
            <li><a href="#">nieuwe vangst</a></li>
            </ul>
        </div><!-- end .menu -->
        <div class="content">
            <div id='login_form'>
                <form action='<?php echo base_url();?>login/process' method='post' name='process'>
                    <h2>User Login</h2>
                    <br />
                     <?php if(! is_null($msg)) echo $msg;?>
                    <label for='username'>Username</label>
                    <input type='text' name='username' id='username' size='25' /><br />

                    <label for='password'>Password</label>
                    <input type='password' name='password' id='password' size='25' /><br />

                    <input type='Submit' value='Login' />
                    <input type='Button' value='Registreer' onclick="document.location='<?php echo base_url();?>register'"/>

                </form>
            </div>
        </div><!-- end .content -->
        <div class="footer">
            <p>&copy; Stichting Visstand Beheer Commissie Geul &amp; Zijbeken</p>
        </div><!-- end .footer -->
    </div><!-- end .container -->
</body>
</html>