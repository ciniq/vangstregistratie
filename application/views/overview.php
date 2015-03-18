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
        <div class="logged">Ingelogd als: <?php echo $user['firstname'] .' '. $user['lastname'] ; ?></div>
        <div id='vangsten'>

            <h2>Vangst overzicht</h2>
            <br />
            <?php if(isset($data['msg'])) echo $data['msg'];?>
            <div id="accordion">


            <?php
           // var_dump($data);
            foreach($data as $date => $catchday)
            {
                echo '<h3 class="overviewdatum">'.$date.'</h3>';
                echo '<div>';
                foreach($catchday as $key => $catch)
                {
                    echo  '<h4>'.$key.'</h4>';
                    echo '<table class="overview">
                            <tr>
                                <th>Soort</th>
                                <th>Lengte</th>
                                <th>Aantal</th>
                            </tr>';

                    foreach($catch as $c)
                    {
                        echo '<tr><td>'.$c['species'].'</td><td>'.$c['size'].'</td><td>'.$c['amount'].'</td></tr>';
                    }

                    echo '</table>';



                }
                echo '</div>';
            }
            ?>


            </div>
        </div>
    </div><!-- end .content -->
    <div class="footer">
        <p>&copy; Stichting Visstand Beheer Commissie Geul &amp; Zijbeken</p>
    </div><!-- end .footer -->
</div><!-- end .container -->

<script>
    $(function() {
        $( "#accordion" ).accordion({heightStyle: "content"});
    });

</script>
</body>
</html>