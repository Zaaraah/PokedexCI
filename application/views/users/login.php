<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Pokédex | The Official Pokémon Website</title>
  <link rel='shortcut icon' href='/public/ico/favicon.ico' type='image/x-icon'/ >
    <link rel="stylesheet" type="text/css" href="/public/css/style_login.css" >
  </head>
<body>
    <div id="main">
      <div id="login">
        <h2>Log In</h2>
        <hr/>
        <?php echo form_open('verifylogin'); ?>
        <?php
          echo "<div class='error_msg'>";
          echo validation_errors();
          echo "</div>";
        ?>
        <?php
        if (isset($message_display)) {
          if($message_display=='Registration successful')
          {
            echo "<div class='success_msg'>";
            echo $message_display;
            echo "</div>";
          }
          else
          {
            echo "<div class='error_msg'>";
            echo $message_display;
            echo "</div>";
          }
        }
        ?>
        <br>
        <label>Username:</label>
        <input type="text" name="username" id="name" placeholder="Username"/><br /><br/>
        <label>Password:</label>
        <input type="password" name="password" id="password" placeholder="********"/><br/><br/>
        <input type="submit" value=" Log In " name="submit"/><br />
        <a href="<?php echo site_url('register')?>">Not a Pokémon trainer yet? Sign up here.</a>
        <?php echo form_close(); ?>
      </div>
    </div>
  </body>
</html>