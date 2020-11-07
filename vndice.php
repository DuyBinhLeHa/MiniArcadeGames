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
	<link rel="icon" href="icon-dice.png" type="image/png" sizes="16x16">
    <title> Project 2 - Vietnamese Dice </title>
	<link rel="stylesheet" href="dice.css" type="text/css">
	<link rel="stylesheet" href="common.css" type="text/css">
</head>

<body>
	<?php navbar1(); ?>
	
	</br></br></br>
	
	<div id="main">
		<h1>Gourd - Crab - Shrimp - Fish</h1>
		
		<?php
			$dice1 = rand(0,5);
			$dice2 = rand(0,5);
			$dice3 = rand(0,5);
			$dices = array("vndice-deer.png", "vndice-gourd.png", "vndice-chicken.png", "vndice-fish.png", "vndice-crab.png", "vndice-shrimp.png");
			switch ($dice1) {
				case 0: $r1 = 'deer'; break;
				case 1: $r1 = 'gourd'; break;
				case 2: $r1 = 'chicken'; break;
				case 3: $r1 = 'fish'; break;
				case 4: $r1 = 'crab'; break;
				case 5: $r1 = 'shrimp'; break;
				default: echo "Error";		
			}
			switch ($dice2) {
				case 0: $r2 = 'deer'; break;
				case 1: $r2 = 'gourd'; break;
				case 2: $r2 = 'chicken'; break;
				case 3: $r2 = 'fish'; break;
				case 4: $r2 = 'crab'; break;
				case 5: $r2 = 'shrimp'; break;
				default:  echo "Error";	
			}
			switch($dice3) {
				case 0: $r3 = 'deer'; break;
				case 1: $r3 = 'gourd'; break;
				case 2: $r3 = 'chicken'; break;
				case 3: $r3 = 'fish'; break;
				case 4: $r3 = 'crab'; break;
				case 5: $r3 = 'shrimp'; break;
				default:  echo "Error";		
			}
			
			$duplicate = 1;
			if ($r1 == $r2 && $r1 == $r3 && $r2 == $r3) {
				$duplicate = 3;
			}
			if ($r1 == $r2 || $r1 == $r3 || $r2 == $r3) {
				$duplicate = 2;
			}
			$r4 = [$r1, $r2, $r3];
		?>
		
		<div id="group">
			<form action="vndice.php" method="post" enctype="multipart/form-data">
				<label>Choose:</label>
				<input type="radio" id="rdr" name="radio" value="deer"><label for="rdr">Deer</label>
				<input type="radio" id="rgd" name="radio" value="gourd"><label for="rgd">Gourd</label>
				<input type="radio" id="rck" name="radio" value="chicken"><label for="rck">Chicken</label>
				<input type="radio" id="rfs" name="radio" value="fish"><label for="rfs">Fish</label>			
				<input type="radio" id="rcb" name="radio" value="crab"><label for="rcb">Crab</label>				
				<input type="radio" id="rsp" name="radio" value="shrimp"><label for="rsp">Shrimp</label>
		
				</br></br>
		
				<label for="coinbet">Coin Bet:</label>
				<select name="coinbet" id="coinbets">
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="300">300</option>
					<option value="400">400</option>
					<option value="500">500</option>
					<option value="1000">1000</option>
					<option value="2000">2000</option>
					<option value="5000">5000</option>
					<option value="10000">10000</option>
				</select>
				<input type="submit" class="play" name="submit" value="PLAY">
			</form>
		</div>
		
		</br></br>

		<?php
			$arr = array();
			$coin = $_SESSION['coin'];
			
			if ($coin < 100) {
				$arr["mess"] = '<h2 class="yl">Please recharge to continue the game!</h2>';
			}

			if (isset($_POST["submit"])) {						
				$ad["t1"] = $dices[$dice1];
				$ad["t2"] = $dices[$dice2];
				$ad["t3"] = $dices[$dice3];
			
				echo '<div id="d1"><img src="'.$ad["t1"].'" alt="dice 1"></div>';
				echo '<div id="d2"><img src="'.$ad["t2"].'" alt="dice 2"></div>';
				echo '<div id="d3"><img src="'.$ad["t3"].'" alt="dice 3"></div>';

				if (isset( $_POST["radio"])) { 
					$cb = $_POST["coinbet"];	
					switch($cb) {
						case "100": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 100 * $duplicate;				
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {	
								$m = -100;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
							} break;	
						case "200": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 200 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {	
								$m = -200;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "300": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 300 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 	
								$m = -300;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "400": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 400 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';	
							} else {		
								$m = -400;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "500": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 500 * $duplicate;				
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {		
								$m = -500;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "1000": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 1000 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {		
								$m = -1000;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "2000": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 2000 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';	
							} else {		
								$m = -2000;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							} 
						} break;
						case "5000": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 5000 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {		
								$m = -5000;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "10000": {	
							if ($_POST["radio"] == $r4[0] || $_POST["radio"] == $r4[1] || $_POST["radio"] == $r4[2]) {		
								$m = 10000 * $duplicate;		
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {		
								$m = -10000;		
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;				
					}			
					$_SESSION['coin'] = $coin + $m;	
				} else {
					$arr["mess"] = '<h2 class="yl">Please choose deer or gourd or chicken or fish or crab or shrimp!</h2>'; 
				}
			} else {
				$ad["t1"] = $dices[$dice1];
				$ad["t2"] = $dices[$dice2];
				$ad["t3"] = $dices[$dice3];
			
				echo '<div id="d1"><img src="'.$ad["t1"].'" alt="dice 1"></div>';
				echo '<div id="d2"><img src="'.$ad["t2"].'" alt="dice 2"></div>';
				echo '<div id="d3"><img src="'.$ad["t3"].'" alt="dice 3"></div>';
			}
		?>
	
		</br></br></br></br></br></br></br></br></br>
		
		<?php
			if (isset($arr["mess"])) {
				echo $arr["mess"];
			}
		?>
		
		</br>

		<div id="info">
			<h3>Name: <?php echo $_SESSION['username']; ?></h3>
			<h3>Title: 
				<?php 
					$tt = $_SESSION['coin'];
					if ($tt <= 20000) {
						echo "Newbie Gambler";
					} else if ($tt > 20000 && $tt <= 100000) {
						echo "Intermediate Gambler";
					} else if ($tt > 100000 && $tt <= 500000) {
						echo "Professional  Gambler";
					} else if ($tt > 500000) {	 
						echo "God of Gambler";
					}
				?>
			</h3>
			<?php
				$coin = $_SESSION['coin'];
				echo '<div><img id="img-coin" src="coin.png" alt="coin icon"><h3>'.$coin.'</h3></div>';
			?>
		</div>
	</div>
	
	</br></br>
</body>
</html>