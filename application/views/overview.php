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
                <li><a href="<?php echo base_url();?>login/logout">log uit</a></li>
                <li><a href="<?php echo base_url();?>overview">overzicht</a></li>
                <li><a href="<?php echo base_url();?>fishsession">nieuwe vangst</a></li>
            </ul>
        </div><!-- end .menu -->
    <div class="content">
        <div id='login_form'>
            <form action='<?php echo base_url();?>register/process' method='post' name='register'>
                <h2>Vangst overzicht</h2>
                <br />
                <?php if(isset($data['msg'])) echo $data['msg'];?>

                <table class="catches">
                    <tr>
                        <th>Datum</th>
                        <th>Soort</th>
                        <th>Aantal</th>
                        <th>Lengte</th>
                    </tr>
                <?php
                    foreach($data as $fish)
                    {
                        echo '<tr><td>'.$fish->date.'</td><td>'.$fish->species.'</td><td>'.$fish->amount.'</td><td>'.$fish->size.'</td></tr>';
                    }
                ?>
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