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
	<link rel="icon" href="icon-card.png" type="image/png" sizes="16x16">
    <title> Project 2 - Card </title>
	<link rel="stylesheet" href="card.css" type="text/css">
	<link rel="stylesheet" href="common.css" type="text/css">
</head>

<body>
	<?php navbar3(); ?>
	
	</br></br></br>

	<div id="main">
		<h1>Ace of Heart Guess</h1>
		
		<div id="group">
			<form action="card.php" method="post" enctype="multipart/form-data">
				<label>Coin Bet:</label>
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
				<input type="submit" class="play" value="PLAY" name="submit">	
			
				</br></br>

				<input type="radio" id="radio1" name ="radio" value="1"><label for="radio1">1</label>
				<input type="radio" id="radio2" name ="radio" value="2"><label for="radio2">2</label>
				<input type="radio" id="radio3" name ="radio" value="3"><label for="radio3">3</label>
				<input type="radio" id="radio4" name ="radio" value="4"><label for="radio4">4</label>
			</form>
		</div>
	
		<?php
			$arr = array();
			$coin = $_SESSION['coin'];
			
			if ($coin < 100) {
				$arr["mess"] = '<h2 class="yl">Please recharge to continue the game!</h2>';
			}
			
			$pos1 = rand(0,3);
			$pos2 = rand(0,3);
			$pos3 = rand(0,3);
			$pos4 = rand(0,3);
			$cards = array("card-J.png", "card-Q.png", "card-K.png", "card-A.png");
			$cards[$pos1];
			$cards[$pos2];
			$cards[$pos3];
			$cards[$pos4];

			while ($cards[$pos1] == $cards[$pos2] || $cards[$pos1] == $cards[$pos3] || $cards[$pos1] == $cards[$pos4] ||
			       $cards[$pos2] == $cards[$pos3] || $cards[$pos2] == $cards[$pos4] || $cards[$pos3]==$cards[$pos4]) {
				$pos1 = rand(0,3);
				$pos2 = rand(0,3);
				$pos3 = rand(0,3);
				$pos4 = rand(0,3);
				$cards = array("card-J.png", "card-Q.png", "card-K.png", "card-A.png");
				$cards[$pos1];
				$cards[$pos2];
				$cards[$pos3];
				$cards[$pos4];
			}	

			if ($cards[$pos1] == $cards[3]) {
				$k = 1;
			} else if ($cards[$pos2] == $cards[3]) {
				$k = 2;	
			} else if ($cards[$pos3] == $cards[3]) {
				$k = 3;	
			} else if ($cards[$pos4] == $cards[3]) {
				$k = 4;
			}

			if (isset($_POST["submit"])) {
				if (isset( $_POST["radio"])) {
					$cb = $_POST["coinbet"];
					switch($cb) {	
						case "100": {
							if ($_POST["radio"] == $k) {
								$m = 100;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else {
								$m = -100;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "200": {
							if ($_POST["radio"] == $k) {
								$m = 200;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -200;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "300": {
							if ($_POST["radio"] == $k) {
								$m = 300;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -300;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "400": {
							if ($_POST["radio"] == $k) {
								$m = 400;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -400;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "500": {
							if ($_POST["radio"] == $k) {
								$m = 500;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -500;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "1000": {
							if ($_POST["radio"] == $k) {
								$m = 1000;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -1000;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "2000": {
							if ($_POST["radio"] == $k) {
								$m = 2000;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -2000;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "5000": {
							if ($_POST["radio"] == $k) {
								$m = 5000;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -5000;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
						case "10000": {
							if ($_POST["radio"] == $k) {
								$m = 10000;
								$arr["mess"] = '<h2 class="yw">You Win</h2>';
							} else { 
								$m = -10000;
								$arr["mess"] = '<h2 class="yl">You Lose</h2>';
							}
						} break;
					}	
					$_SESSION['coin'] = $coin + $m;
					
					echo '<div id="p1"><img src="'.$cards[$pos1].'" alt="card 1"></div>';
					echo '<div id="p2"><img src="'.$cards[$pos2].'" alt="card 2"></div>';
					echo '<div id="p3"><img src="'.$cards[$pos3].'" alt="card 3"></div>';
					echo '<div id="p4"><img src="'.$cards[$pos4].'" alt="card 4"></div>';
					header("Refresh: 2;"); 					
				} else {
					echo '<div id="p1"><img src="card-back.png" alt="card 1"></div>';
					echo '<div id="p2"><img src="card-back.png" alt="card 2"></div>';
					echo '<div id="p3"><img src="card-back.png" alt="card 3"></div>';
					echo '<div id="p4"><img src="card-back.png" alt="card 4"></div>';				
					$arr["mess"] = '<h2 class="yl">Please choose position Ace of heart!</h2>'; 
				}
			} else {
				echo '<div id="p1"><img src="card-back.png" alt="card 1"></div>';
				echo '<div id="p2"><img src="card-back.png" alt="card 2"></div>';
				echo '<div id="p3"><img src="card-back.png" alt="card 3"></div>';
				echo '<div id="p4"><img src="card-back.png" alt="card 4"></div>';
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
						echo "Newbie Player";
					} else if($tt > 20000 && $tt <= 100000) {
						echo "Lucky Player";
					} else if ($tt > 100000 && $tt <= 500000) {
						echo "Extremely Lucky Player";
					} else if ($tt > 500000) {	 
						echo "God of Luck";
					}
				?>
			</h3> 
			<?php
				$coin = $_SESSION['coin'] ;
				echo '<div><img id="img-coin" src="coin.png" alt="coin icon"><h3>'.$coin.'</h3></div>';
			?>
		</div>
	</div>

	</br></br>
</body>
</html>