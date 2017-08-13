<html>
<head>
<title>Pokédex | The Official Pokémon Website</title>
  <link rel='shortcut icon' href='/public/ico/favicon.ico' type='image/x-icon'/ >
    <link rel="stylesheet" type="text/css" href="/public/css/style_signup.css" >
</head>
<body>
<div id="main">
<div id="login">
<h2>Register</h2>
<hr/>

<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
?>
<?php
    echo "<div class='error_msg'>";
    if (isset($message_display)) {
    echo $message_display;
    }
    echo "</div>";
?>
<?php echo form_open('verifyregister'); ?>
        <br>
        <label>Username:</label>
        <input type="text" name="username" id="name" placeholder="username"/><br /><br />
        <label>Email:</label>
        <input type="email" name="email" id="email" placeholder="e@mail"/><br/><br />
        <label>Password:</label>
        <input type="password" name="password" id="password" placeholder="**********"/><br/><br />
        <input type="submit" value=" Sign Up " name="submit"/><br />

<a href="login">Already a Pokémon trainer? Log in here.</a>
        <?php echo form_close(); ?>

</div>
</div>
</body>
</html>