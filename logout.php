<?php
	session_save_path("./session/");
	session_start();
	$arr = array();
	$data = file_get_contents('data.txt');
	$arr = explode(";", $data);
	if ($_SESSION['username'] == $arr[0]) {
		$data = $arr[0].";".$arr[1].";".$_SESSION['coin'].";".$arr[3].";".$arr[4].";".$arr[5].";".$arr[6].";".$arr[7].";".$arr[8].";".$arr[9].";".$arr[10].";".$arr[11].";";
	} else if ($_SESSION['username'] == $arr[3]) {
		$data = $arr[0].";".$arr[1].";".$arr[2].";".$arr[3].";".$arr[4].";".$_SESSION['coin'].";".$arr[6].";".$arr[7].";".$arr[8].";".$arr[9].";".$arr[10].";".$arr[11].";";
	} else if ($_SESSION['username'] == $arr[6]) {
		$data = $arr[0].";".$arr[1].";".$arr[2].";".$arr[3].";".$arr[4].";".$arr[5].";".$arr[6].";".$arr[7].";".$_SESSION['coin'].";".$arr[9].";".$arr[10].";".$arr[11].";";
	} else if ($_SESSION['username'] == $arr[9]) {
		$data = $arr[0].";".$arr[1].";".$arr[2].";".$arr[3].";".$arr[4].";".$arr[5].";".$arr[6].";".$arr[7].";".$arr[8].";".$arr[9].";".$arr[10].";".$_SESSION['coin'].";";
	}
	$file = 'data.txt';
	file_put_contents($file, $data);
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
?>