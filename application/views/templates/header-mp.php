<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pokédex | The Official Pokémon Website</title>
  <link rel='shortcut icon' href='/public/ico/favicon.ico' type='image/x-icon'/ >

  <script src="/public/js/jquery.min.js"></script>
  <script src="/public/js/bootstrap.js"></script>

  <link href="/public/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../">Pokédex</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li ><a class="nav-hover" href="../">Home<span class="sr-only">(current)</span></a></li>
        <?php if($this->session->userdata('logged_in'))
        {
        echo "<li><a class='nav-hover' href='./mypokemon'>My Pokemon</a></li>
              <li><a class='nav-hover' href='./myfiles'>Files</a></li>
               </ul>
               <ul class='nav navbar-nav navbar-right'>
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                  <span class='glyphicon glyphicon-user'></span>&nbsp;Hi, ".$username."&nbsp;<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                    <li><a href='./logout'><span class='glyphicon glyphicon-log-out'></span>&nbsp;Sign Out</a></li>
                  </ul>
                </li>";
        }
        else
        {
            echo "</ul>
               <ul class='nav navbar-nav navbar-right'>
                <li class='dropdown'>
                  <a href='/index.php' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                  <span class='glyphicon glyphicon-user'></span>&nbsp;No User&nbsp;<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                    <li><a href='/index.php/login'>&nbsp;Log In</a></li>
                    <li><a href='/index.php/register'>&nbsp;Sign Up</a></li>
                  </ul>
                </li>";
        }?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
