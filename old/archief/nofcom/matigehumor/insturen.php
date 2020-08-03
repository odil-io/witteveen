<?php 
require_once 'class.main.php';

$main = new Main();

$naam = $_POST["naam"];
$email = $_POST["email"];
$grap = $_POST["grap"];

if(isset($naam) && isset($grap) && isset($email)){
	$main->grapToevoegen($naam, $email, $grap);
	header("location: index.php");
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>MatigeHumor.nl - Grap insturen</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="logo">
					<a href="index.php"><img alt="MatigeHumor.nl" src="img/logo.png" height="100"/></a>
				</div>
				<a class="insturen" href="insturen.php"><img alt="Stuur een grap" src="img/insturen.png"></a>
			</div>
			<div class="formulier">
				<form action="insturen.php" method="post">
					<label for="naam">Naam:</label>
					<input type="text" name="naam"/>
					<label for="email">Email:</label>
					<input type="email" name="email"/>
					<label for="grap">De grap:</label><br>
					<textarea rows="10" cols="60" name="grap"></textarea>
					<input type="submit" value="Versturen">
				</form>
			
			</div>
		
		</div>
	</body>
</html>