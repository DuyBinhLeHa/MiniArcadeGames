<?php
	include("common.php");
	if (!isset($_SESSION['username'])) {
		header('Location: login.php'); 
	} else {
		$user = $_SESSION['username'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="icon-casino.png" type="image/png" sizes="16x16">
    <title> Project 2 - Home </title>
	<link rel="stylesheet" href="home.css" type="text/css">
	<link rel="stylesheet" href="common.css" type="text/css">
</head>

<body>
	<?php navbar0(); ?>

	<div id="main">
		<div id="content">
			<div class="game">
				<div class="frame">
					<a href="vndice.php"><img src="frame-vndice.jpg"></a>
				</div>
				<div class="text">
					<a href="vndice.php">VIETNAM DICE</a>
				</div>
			</div>    
			<div class="game">
				<div class="frame">
					<a href="cndice.php"><img src="frame-cndice.jpg"></a>
				</div>
				<div class="text">
					<a href="cndice.php">CHINESE DICE</a>
				</div>
			</div>
			<div class="game">
				<div class="frame">
					<a href="card.php"><img src="frame-card.jpg"></a>
				</div>
				<div class="text">
					<a href="card.php">CARD</a>
				</div>
			</div>
			<div class="game">
				<div class="frame">
					<a href="math.php"><img src="frame-math.jpg"></a>
				</div>
				<div class="text">
					<a href="math.php">MATH</a>
				</div>
			</div>  
		</div>
	</div> 
	
	</br></br>
</body>
</html>