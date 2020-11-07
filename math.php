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
	<link rel="icon" href="icon-math.png" type="image/png" sizes="16x16">
    <title> Project 2 - Math </title>
	<link rel="stylesheet" href="math.css" type="text/css">
	<link rel="stylesheet" href="common.css" type="text/css">
</head>

<body>
	<?php navbar4(); ?>

	</br></br></br>
	
	<?php
		$arr = array();
		$coin = $_SESSION['coin'];
	
		if ($coin < 100) {
			$arr["mess"] = '<h2 class="yl">Please recharge to continue the game!</h2>';
		}
		
		$number1 = rand(2,3);  
		$number2 = rand(1,2);
		$number3 = rand(1,2);
		$bracket1 = rand(0,1);
		$bracket2 = rand(0,3);
		$str1 = array("+", "-");
		$str2 = array("+", "-", "*", "/");
		$legend = array('0' => 'math-legend.png');
		$arr["a1"] = $number1;
		$arr["a2"] = $number2;
		$arr["a3"] = $number3;
		$arr["a4"] = $str1[$bracket1];
		$arr["a5"] = $str2[$bracket2];
 
		switch ($bracket1) {
			case 0: 
				$r2 = $number1 + $number2;
				break;
			case 1:
				$r2 = $number1 - $number2;
				break;
			default:
				echo "Error";
		}
		switch ($bracket2) {
			case 0:
				$r4 = $r2 + $number3;
				break;
			case 1:
				$r4 = $r2 - $number3;
				break;
			case 2:
				$r4 = $r2 * $number3;
				break;
			case 3:
				$r4 = $r2 / $number3;
				break;
			default:
				echo "Error";
		}

		if (isset($_POST["calc"])) {
			if (isset($_POST["result"])) {
				if ($_POST["result"] == $_POST["r4"]) {
					$arr["true"] = '<div id="exactly">EXACTLY</div>';
					$_SESSION['count'] = $_SESSION['count'] + 1;		
					if ($_SESSION['count'] == 5) {
						$_SESSION['coin'] = $coin + 100;
						$_SESSION['count'] = 0;
					}		
				}
				if($_POST["result"] != $_POST["r4"]) {
					$arr["false"] = '<div id="wrong">WRONG</div>';
					$_SESSION['count'] = 0;
				}				
			}
		}
	?>

	<div id="main">
		<fieldset>
			<legend><?php echo '<img src="'.$legend[0].'" alt="image math-legend">'; ?></legend>
			<form action="math.php" method="POST">
				<input type="text" name="result">
				<input type="text" name="r4" hidden="" value="<?php echo "$r4"; ?>">
				<input type="submit" name="calc" value="Answer">
				
				</br></br>
				
				<div>
					<div class="number">
						</br>
						<?php echo "("; ?>
					</div>
					<div class="number">
						</br>
						<?php echo $arr["a1"]; ?>
					</div>
					<div class="number">
						</br>
						<?php echo $arr["a4"]; ?>
					</div>
					<div class="number">
						</br>
						<?php echo $arr["a2"]; ?>
					</div>
					<div class="number">
						</br>
						<?php echo ")";?>
					</div>
					<div class="number">
						</br>
						<?php echo $arr["a5"]; ?>
					</div>
					<div class="number">
						</br>
						<?php echo $arr["a3"]; ?>
					</div>
					<div class="number">
						</br>
						<?php echo "="; ?>
					</div>
					<div class="number">
						</br>
						?
					</div>
				</div>
			</form>
		</fieldset>
		
		<div id="note">
			*** If division, round to 1 decimal place *** </br>
			*** If you answer 5 questions in a row correctly, you will get 100 coins *** </br>
		</div>
		
		</br></br></br></br>
		 
		<?php if (isset($arr["true"])) echo $arr["true"]; ?>
		<?php if (isset($arr["false"])) echo $arr["false"]; ?>
		
		</br>
		
		<div id="info">
			<h3>Name: <?php echo $_SESSION['username']; ?></h3>
			<?php
				$coin = $_SESSION['coin'];
				echo '<div><img id="img-coin" src="coin.png" alt="coin icon"><h3>'.$coin.'</h3></div>';
			?>
			<h3>Answer in a row correctly: <?php $win = $_SESSION['count']; echo $win; ?></h3> 
		</div>
	</div>
	
	</br></br>
</body>
</html>