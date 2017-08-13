<?php
	// ob_start();
	// session_start();
	require_once 'dbconnect.php';
	
	// if( !isset($_SESSION['users']) ) {
	// 	header("Location: index.php");
	// 	exit;
	// }
	// select loggedin users detail
	
	if(isset($_GET['download']))
	{
			$id = $_GET['download'];
			$query = "SELECT name, type, size, content FROM upload WHERE id=".$_GET['download'];
			$result = mysqli_query($conn, $query) or die('Error, query failed');
			list($name, $type, $size, $content) =	mysqli_fetch_array($result);
			header("Content-length: $size");
			header("Content-type: $type");
			header("Content-Disposition: attachment; filename=$name.pdf");
			echo $content; 
			echo "<a href=\"download2.php?id=". $id ."\"><?php echo $name; ?></a>";
			exit;
			
	}

	if(isset($_GET['view']))
	{
			$id = $_GET['view'];
			$query = "SELECT name, type, size, content FROM upload WHERE id=".$_GET['view'];
			$result = mysqli_query($conn, $query) or die('Error, query failed');
			list($name, $type, $size, $content) =	mysqli_fetch_array($result);
			header("Content-type: $type");
			echo "<a href=\"$content\"</a>";
			exit;
	}

	if(isset($_GET['delete']))
	{
		$result = mysqli_query($conn, "DELETE FROM upload WHERE id=".$_GET['delete']);
		
		if ($result) {
			$errTyp = "success";
			$errMSG = "You have successfully deleted the file.";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong. Please try again later.";
			}
	}
	
	if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
	{
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
		include 'library/config.php';
		include 'library/opendb.php';

		$query = "INSERT INTO upload (name, size, type, content ) ".
		"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

		$result = mysqli_query($conn, $query); 
		include 'library/closedb.php';

		if ($result) {
			$errTyp = "success";
			$errMSG = "You have successfully uploaded $fileName.";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong. Please try again later.";
			
			
			// edit state:$edit, name: $pokemonName, number: $pokemonNo, nickname: $pokemonNickname, userPokeId: $editNo";	
		}	
	} 
	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="/public/css/style.css" type="text/css" />
<link rel="stylesheet" href="/public/css/style_home.css" type="text/css" />

<style>
table {border: solid 1px #999; margin-left: auto; margin-right: auto;}
td {border: solid 1px #999; padding: 3px 10px 3px 10px; text-align:center; }
}
</style>
</head>
<body>

	<!-- <div id="wrapper">
 -->
 	<div id="page-content" >
	<div class="container">
    
    	<div class="page-header">
    	<h3>My Files</h3>
    	</div>

        
        <div class="row">
        <div style="width:40%; margin-left: auto; margin-right:auto">
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
		</div>
		</div>

		<form method="post" enctype="multipart/form-data">
			<table>
				<tr> 
					<td width="246"style="border: none">
						<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
						<input name="userfile" type="file" id="userfile"> 
					</td>
					<td width="80" style="border: none"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
				</tr>
			</table>
		</form>
		
		<?php
			
					$query = "SELECT * FROM upload";
					$result = mysqli_query($conn, $query);

					echo "<table>
					<tr style=\"font-weight:bold;\">
						<td>ID</td>
						<td>Name</td>
						<td>Type</td>
						<td>Size</td>
						<td>View</td>
						<td>DL</td>
						<td>Del</td>
					</tr>";
					while($row = mysqli_fetch_array($result))
					{  
						echo "
						<tr>
							<td>" . $row['id'] . "</td>
							<td>" . $row['name'] . " </td>
							<td>" . $row['type'] . " </td>
							<td>" . $row['size'] . " </td>
							<td><a href=\"?view=" . $row['id'] . "\" class=\"btn btn-block btn-info btn-s\"><span class=\"glyphicon glyphicon-eye-open\"></span></a></td>
							<td><a href=\"?download=" . $row['id'] . "\" class=\"btn btn-block btn-warning btn-s\"><span class=\"glyphicon glyphicon-arrow-down\"></span></a></td>
							<td><a href=\"?delete=" . $row['id'] . "\" class=\"btn btn-block btn-danger btn-s\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
						</tr>";
					}

		?>
	</table>
	
    </div>
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>