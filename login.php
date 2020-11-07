<?php
	session_save_path("./session/");
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: home.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="icon-casino.png" type="image/png" sizes="16x16">
    <title> Project 2 - Login </title>
	<link rel="stylesheet" type="text/css" href="general.css">
</head>

<body>
	<?php	
		$arr = array();

		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($username == "" || $password == "") {
				$arr["mess"] = '<p style="color:red">Please enter your username and password</p>';
			} else {
				$data = file_get_contents('data.txt');
				$arr = explode(";", $data);
				for ($i = 0; $i < sizeof($arr); $i+=3) {
					if ($username == $arr[$i] && $password == $arr[$i+1]) {
						$_SESSION['username'] = $username;
						$_SESSION['coin'] = $arr[$i+2];
						$_SESSION['count'] = 0;
						header('Location: home.php');
					} else {
						$arr["mess"] = '<p style="color:red">Username or password is incorrect</p>';
					}
				}
			}
		}		
	?>
	
	<form action="login.php" method="post">
		<fieldset>
			<legend>Login</legend>
		
			<table class="table-login">
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn_submit" name="login" value="Login"></td>
				</tr>                      
			</table>
        
			</br>

			<?php
				if (isset($arr["mess"])) {
					echo $arr["mess"];
				}
			?>
		</fieldset>
	</form>
</body>
</html>