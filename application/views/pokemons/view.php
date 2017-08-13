<head>
   <title>Pokédex | The Official Pokémon Website</title>
  <link rel='shortcut icon' href='/public/ico/favicon.ico' type='image/x-icon'/ >

  <script src="/public/js/jquery.min.js"></script>
  <script src="/public/js/bootstrap.js"></script>

  <link href="/public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
  <link href="/public/css/style_view.css" rel="stylesheet" type="text/css" />
  <link href="/public/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="page-content">
	<div class="container">
		<a href="./"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
		<div id="apokemon">
			
			<?php
					echo "<h1>".ucfirst($a_pokemon['pokemon_name'])."</h1>";
					echo "<img src='/public/sprites/".$a_pokemon['pokemon_id'].".png'/><br>";
					echo "Height: ".$a_pokemon['pokemon_height'];
					echo "<br>";
					echo "Weight: ".$a_pokemon['pokemon_weight'];
			?>
		</div>
    </div>