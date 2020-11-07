<?php
	session_save_path("./session/");
	session_start();
?>

<?php function navbar0() { ?>	
	<ul>
		<li class="left"><a href="vndice.php">VIETNAMESE DICE</a></li> 
		<li class="left"><a href="cndice.php">CHINESE DICE</a></li>
		<li class="left"><a href="card.php">CARD</a></li>	
		<li class="left"><a href="math.php">MATH</a></li>
		<li class="right"><a href="logout.php"><img src="logout.png" alt="logout icon"></a></li>
		<li class="right" style="margin: 15px; color: white;">Welcome, <?php echo $_SESSION['username']; ?></li>
	</ul>
<?php } ?>

<?php function navbar1() { ?>	
	<ul>
		<li class="left"><a href="home.php"><img src="home.png" alt="home icon"></a></li>
		<li class="left"><a href="cndice.php">CHINESE DICE</a></li> 
		<li class="left"><a href="card.php">CARD</a></li>
		<li class="left"><a href="math.php">MATH</a></li>
		<li class="right"><a href="logout.php"><img src="logout.png" alt="logout icon"></a></li>
		<li class="right" style="margin: 15px; color: white;">Welcome, <?php echo $_SESSION['username']; ?></li>		
	</ul>
<?php } ?>

<?php function navbar2() { ?>	
	<ul>
		<li class="left"><a href="home.php"><img src="home.png" alt="home icon"></a></li>
		<li class="left"><a href="vndice.php">VIETNAMESE DICE</a></li>  
		<li class="left"><a href="card.php">CARD</a></li>
		<li class="left"><a href="math.php">MATH</a></li>
		<li class="right"><a href="logout.php"><img src="logout.png" alt="logout icon"></a></li>
		<li class="right" style="margin: 15px; color: white;">Welcome, <?php echo $_SESSION['username']; ?></li>		
	</ul>
<?php } ?>

<?php function navbar3() { ?>	
	<ul>
		<li class="left"><a href="home.php"><img src="home.png" alt="home icon"></a></li>
		<li class="left"><a href="vndice.php">VIETNAMESE DICE</a></li> 
		<li class="left"><a href="cndice.php">CHINESE DICE</a></li>
		<li class="left"><a href="math.php">MATH</a></li>
		<li class="right"><a href="logout.php"><img src="logout.png" alt="logout icon"></a></li>
		<li class="right" style="margin: 15px; color: white;">Welcome, <?php echo $_SESSION['username']; ?></li>		
	</ul>
<?php } ?>

<?php function navbar4() { ?>	
	<ul>
		<li class="left"><a href="home.php"><img src="home.png" alt="home icon"></a></li>
		<li class="left"><a href="vndice.php">VIETNAMESE DICE</a></li> 
		<li class="left"><a href="cndice.php">CHINESE DICE</a></li>
		<li class="left"><a href="card.php">CARD</a></li>	
		<li class="right"><a href="logout.php"><img src="logout.png" alt="logout icon"></a></li>
		<li class="right" style="margin: 15px; color: white;">Welcome, <?php echo $_SESSION['username']; ?></li>
	</ul>
<?php } ?>