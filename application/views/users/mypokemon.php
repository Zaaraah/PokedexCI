<?php
	// ob_start();
	// session_start();
	require_once 'dbconnect.php';
	
	// if( !isset($_SESSION['users']) ) {
	// 	header("Location: index.php");
	// 	exit;
	// }
	// select loggedin users detail
	
	
	$res=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);

	$edit = 0;
	if (isset($_GET['edit'])) {
	
		$editNo = $_GET['edit'];
	
		$getPokemonE=mysqli_query($conn, "SELECT * FROM user_pokemons WHERE userPokeId=".$_GET['edit']);
		$editPokemon=mysqli_fetch_array($getPokemonE);
		$pokeName = $editPokemon['pokeName'];
		$nickname =  $editPokemon['nickname'];
		$edit = 1;
	}
	
	if (isset($_GET['delete'])) {
	
		$delete = mysqli_query($conn, "DELETE FROM user_pokemons WHERE userPokeId=".$_GET['delete']);
		
		if ($delete) {
			$errTyp = "success";
			$errMSG = "You have successfully deleted a pokemon.";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong. Please try again later.";
			}
	}
	
	
	if(isset($_POST['btn-signup'])) {
		
		$pokemonName = trim($_POST['pokeName']);
		$pokemonNickname = trim($_POST['nickname']);
		$addUserId = $userRow['id']; 
		
		$poke = mysqli_query($conn, "SELECT * FROM pokemon_t WHERE pokemon_name='$pokemonName'");
		$pokeRow = mysqli_fetch_array($poke);
		$pokemonNo = $pokeRow['pokemon_id']; 
		
		if ($edit==1){
			$addUserPokemon = "UPDATE user_pokemons 
			SET 
				nickname='$pokemonNickname', 
				pokeNo='$pokemonNo',
				pokeName='$pokemonName'
			WHERE userPokeId=$editNo";
		} else {
			$addUserPokemon = "INSERT INTO user_pokemons(nickname,userId,pokeNo,pokeName) 
			VALUES('$pokemonNickname','$addUserId','$pokemonNo', '$pokemonName')";
		}
		
		$addResult = mysqli_query($conn, $addUserPokemon);
		
		if ($addResult) {
			$errTyp = "success";
			$errMSG = "You have successfully added a pokemon.";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong. Please try again later.";
			
			
			// edit state:$edit, name: $pokemonName, number: $pokemonNo, nickname: $pokemonNickname, userPokeId: $editNo";	
			// session: ".$_SESSION['user'].", pokemonID: ".$pokemonNo.", userID: ".$addUserId
		}	
			
	} 
	
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
	<link rel="stylesheet" type="text/css" href="/public/css/style_home.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
<style>
table {border: solid 1px #999; margin-left: auto; margin-right: auto;}
td {border: solid 1px #999; padding: 3px 10px 3px 10px; text-align:center; }
#pokemon-list-wrapper{
	width:100%;
	float: right; position: relative; left: -50%; text-align: center;
}
#pokemon-row{
	margin-left: 50px; margin-right: 50px; position: relative; left: 50%;
}
</style>
</head>
<body>

	<!-- <div id="wrapper"> -->
	<div id="page-content" >
	<div class="container">
		<div class="row" id="title_search">
        <div class=".col-xs-6 .col-md-4" id="pagetitle"><h2>My Pokémon</h2></div>
    	</div>
        
        
        <div id="login-form" style="width:40%; margin-left: auto; margin-right:auto">
    <form method="post" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h3 class="">Add Pokemon</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
			
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-plus-sign"></span></span>
			<input type="text" name="pokeName" value="<?php echo htmlentities($pokeName); ?>"class="form-control scrollable" list="pokemon" placeholder="Select Pokemon"/>
			<datalist id="pokemon">
			  <?php
				$getPokemonList = mysqli_query($conn, "SELECT * FROM pokemon_t");
				while($getPokemonListRow = mysqli_fetch_array($getPokemonList)){   
					echo "<option value=".$getPokemonListRow['pokemon_name'].">" . $getPokemonListRow['pokemon_id']. "</option>";
				}
				
			  ?>
			</datalist>
				
				
				</div>
            </div>
            
			
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-font"></span></span>
            	<input type="text" name="nickname" class="form-control" value="<?php echo htmlentities($nickname); ?>" placeholder="Enter Nickname" required />
                </div>
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Add Pokemon</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
		
        </div>
   
    </form>
    </div>	



   
		<div id="pokemon-list-wrapper" >
	        <div class="row" id="pokemon-row">
	            <?php

	                $divcount=0;

					$query = "SELECT * FROM user_pokemons WHERE userId='$userRow[id]'";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)){   
					
							$pokemon = $row['pokeNo'];
							$getPokemon = mysqli_query($conn, "SELECT * FROM pokemon_t WHERE pokemon_id='$pokemon'"); 
							$pokeDetails = mysqli_fetch_array($getPokemon);
	                    
	                        $pokeid = $pokemon;
	                        $pokename = $pokeDetails['nickname'];

	                        echo "<div class='col-md-2' id='pokemon-tile'>";
	                            echo "<div id='pokemon-icon'>";
	                               echo "<a href='" . site_url('pokemon/'. $row['pokeNo']) ."'><img src='/public/sprites/".$pokeid.".png'/></a>";
	                                $divcount++;
	                                echo "<div id='pokemon-name'>";
	                                echo $row['nickname'];
	                            	echo "</div>";
	                            echo "</div>";
	                            

                            
                        echo "</div>";

	                    if ($divcount==6)
	                    {
	                        echo "</div><br>";
	                        echo "<div class='row' id='pokemon-row'>";
	                        $divcount=0;
	                    }   
                	}    
                
        		?>
        	</div>
    	</div>
    <br/>
    <br/>
    <br/>



	
	
	
    <!-- </div> -->
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>