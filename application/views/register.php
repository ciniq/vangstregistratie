<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
    'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>
    <title>Vangstenregistratie login</title>
</head>
<body>
<div id='login_form'>
    <form action='<?php echo base_url();?>register/process' method='post' name='register'>
        <h2>Registratie gebruiker</h2>
        <br />
        <?php if(isset($data['msg'])) echo $data['msg'];?>
        <?php if(isset($data['userdata'])) var_dump($data['userdata']); ?>
        <label for='username'>Gebruikersnaam</label>
        <input type='text' name='username' id='username' size='25' value="<?php if(isset($data['userdata']['username'])) echo $data['userdata']['username'];?>" /><br />

        <label for='password'>Wachtwoord</label>
        <input type='password' name='password' id='password' size='25' /><br />

        <label for='passwordcontroll'>Herhaal wachtwoord</label>
        <input type='password' name='passwordcontroll' id='passwordcontroll' size='25' /><br />

        <label for='firstname'>Voornaam</label>
        <input type='text' name='firstname' id='firstname' size='25' value="<?php if(isset($data['userdata']['firstname'])) echo $data['userdata']['firstname'];?>" /><br />

        <label for='lastname'>Achternaam</label>
        <input type='text' name='lastname' id='lastname' size='25' value="<?php if(isset($data['userdata']['lastname'])) echo $data['userdata']['lastname'];?>" /><br />

        <label for='vispasnr'>Vispas nummer</label>
        <input type='text' name='vispasnr' id='vispasnr' size='25' value="<?php if(isset($data['userdata']['vispasnr'])) echo $data['userdata']['vispasnr'];?>" /><br />

        <label for='email'>Email</label>
        <input type='email' name='email' id='email' size='25' value="<?php if(isset($data['userdata']['email'])) echo $data['userdata']['email'];?>" /><br />

        <input type='Submit' value='Registreer' />
    </form>
</div>
</body>
</html>