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
    <script src="<?php echo base_url(); ?>jquery/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>jquery/jquery-ui.min.js"></script>
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
            <?php
            if($user['isadmin'])
            {
                echo '<li><a href="'.base_url().'admin">admin</a></li>';
            }
            ?>
        </ul>
    </div><!-- end .menu -->
    <div class="content">
        <div class="logged">Ingelogt als: <?php echo $user['firstname'] .' '. $user['lastname'] ; ?></div>
        <div id='login_form'>
            <h2>Gebruikers overzicht</h2>
            <table class="users" id="usertable">
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Vispas nummer</th>
                    <th>E-mail</th>
                    <th>Vereniging</th>
                    <th>Actief</th>
                </tr>
                <?php
                foreach($users as $user)
                {
                    echo '<tr>
                            <td>'.$user->firstname.'</td>
                            <td>'.$user->lastname.'</td>
                            <td>'.$user->vispasnr.'</td>
                            <td>'.$user->email.'</td>
                            <td>'.$user->community.'</td>
                            <td><input type="checkbox" class="active" userid="'.$user->id.'" '.($user->active == 1 ? 'checked="checked" ':'').'/></td>
                         </tr>';
                }
                ?>
                <tr>

                    <td colspan="6" style="padding-top: 30px;"><button id="submit" >Wijzigingen opslaan</button></td>
                </tr>
            </table>
        </div>
    </div><!-- end .content -->
    <div class="footer">
        <p>&copy; Stichting Visstand Beheer Commissie Geul &amp; Zijbeken</p>
    </div><!-- end .footer -->
</div><!-- end .container -->

<script>

    // versturen van de data
    $('#submit').click(function(){

        var requestdata = {};

        // vangsten
        $.each($('#usertable tr input'),function(){
           requestdata[$(this).attr('userid')] = {
               userid: $(this).attr('userid'),
               checked:  $(this).prop('checked')
           };
        });

        // versturen
        $.ajax({
            type: "POST",
            url: "admin/processchanges",
            data: requestdata
        })
        .done(function( msg ) {
            // doorsturen naar overzicht
            alert( "De wijziging is doorgevoerd." );
        });
    });
</script>



</body>
</html>