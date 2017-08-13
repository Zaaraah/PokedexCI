<?php
	ob_start();
	//session_start();
	// if( isset($_SESSION['user'])!="" ){
	// 	header("Location: home.php");
	// }
	include_once 'dbconnect.php';

	$user=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($user);
	
	if(isset($_POST['btn-signup'])) {
		
		$pokeNo = trim($_POST['pokeNo']);
		$pokemonNickname = trim($_POST['nickname']);
		$addUserId = $userRow['userId']; 
		
		
		$poke = mysqli_query($conn, "SELECT * FROM pokemons WHERE pokeNo=".$pokeNo);
		$pokeRow = mysqli_fetch_array($poke);
		$pokemonName = $pokeRow['name']; 
		
		$addUserPokemon = "INSERT INTO user_pokemons(nickname,userId,pokeNo,pokeName) 
		VALUES('$pokemonNickname','$addUserId','$pokeNos', '$pokemonName')";
		$addResult = mysqli_query($conn, $addUserPokemon);
		
		if ($addResult) {
			$errTyp = "success";
			$errMSG = "You have successfully added a pokemon.";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong. Please try again later.";	
		}	
			
	} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pokemon DB - Registration</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Add Pokemon</h2>
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="pokeNo" class="form-control" placeholder="Enter Poke Id" required />
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="nickname" class="form-control" placeholder="Enter Nickname" required />
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

</div>

</body>
</html>