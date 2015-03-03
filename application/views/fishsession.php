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
        </ul>
    </div><!-- end .menu -->
    <div class="content">
        <div id='login_form'>
            <div class='vangst' id="vangst">
                <h2>Vangst toevoegen</h2>
                <br />
                <fieldset name="vangstsessie">
                <legend>Nieuwe registratie</legend>
                <select name="dag" class="vangstdag" id="day">
                    <option value="" required>dag</option>
                    <?php
                        for ($i = 1; $i < 32; $i++)
                        {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>

                <select name="maand" class="vangstmaand" id="month">
                    <option value="" required>maand</option>
                    <?php
                        $months = array('jan','feb','mrt','apr','mei','jun','jul','aug','sep','okt','nov','dec');
                        for ($i = 0; $i < 12; $i++)
                        {
                            echo '<option value="'.($i + 1).'">'.$months[$i].'</option>';
                        }
                    ?>
                </select>

                <select name="van" class="vangsttijd" id="from">
                    <option value="" required>van</option>
                    <?php
                        for ($i = 5; $i < 24; $i++)
                        {
                            echo '<option value="'.$i.'">'.$i.':00</option>';
                        }
                    ?>
                </select>

                <select name="tot" class="vangsttijd" id="to">
                    <option value="" required>tot</option>
                    <?php
                        for ($i = 5; $i < 24; $i++)
                        {
                            echo '<option value="'.$i.'">'.$i.':00</option>';
                        }
                    ?>
                </select>

                <select name="hsv" class="vangsthsv" id="community">
                    <option value="0">eigen vereniging</option>
                    <?php
                        foreach($community as $com)
                        {
                            echo '<option value="'.$com->id.'">'.$com->displayname.'</option>';
                        }
                    ?>
                </select>

                </fieldset>
                <br>
                <fieldset name="vangsten">
                <legend>Gevangen vissen</legend>
                    <table id="vangsttabel">
                        <tr>
                            <td>
                                <select name="vissoort" class="vangstsoort">
                                    <option value="geen">vissoort</option>
                                    <?php
                                    foreach($species as $spec)
                                    {
                                        echo '<option value="'.$spec->id.'">'.$spec->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="formaat" class="vangstformaat">
                                    <option value="0">formaat</option>
                                    <?php
                                    foreach($size as $s)
                                    {
                                        echo '<option value="'.$s->id.'">'.$s->size.'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="aantal" class="vangstaantal">
                                    <option value="0">aantal</option>
                                    <?php
                                    for ($i = 1; $i < 11; $i++)
                                    {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>

                <button type="button" value="Verstuur" id="send">Verstuur</button>
                <button type="button" class="vangstextra" id="addRow">+</button>
            </div>
        </div>
    </div><!-- end .content -->
    <div class="footer">
        <p>&copy; Stichting Visstand Beheer Commissie Geul &amp; Zijbeken</p>
    </div><!-- end .footer -->
</div><!-- end .container -->
<script>

// voeg een extra tabel rij in
$('#addRow').click(function(){
    var row = $('#vangsttabel tr:first').html();
    $('#vangsttabel tr:last').after('<tr>'+row+'</tr>');
});

// versturen van de data
$('#send').click(function(){

    // basisdata
    var catchData = {
        day: $('#day').val(),
        month: $('#month').val(),
        from: $('#from').val(),
        to: $('#to').val(),
        community: $('#community').val(),
        catches: []
    };

    // vangsten
    $.each($('#vangsttabel tr'),function(){
        catchData.catches.push({
            species: $(this).find('.vangstsoort').val(),
            size: $(this).find('.vangstformaat').val(),
            amount: $(this).find('.vangstaantal').val()
        });
    });

    // versturen
    $.ajax({
        type: "POST",
        url: "fishsession/registercatch",
        data: catchData
    })
    .done(function( msg ) {
        // doorsturen naar overzicht
        alert( "De vangst is geregistreerd, u wordt doorgestuurd." );
        document.location = "<?php echo base_url();?>overview";
    });

});


</script>
</body>
</html>