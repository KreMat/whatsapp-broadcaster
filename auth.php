<?php

	require('settings.entw.php');

	if(!isset($_SESSION['username'])){
		if(isset($_POST['username']) and isset($_POST['password']) and auth($_POST['username'], $_POST['password'])){
			$_SESSION['username'] = $_POST['username'];
		}else {
			header("Location: index.php");
			die();
		}
	}
	
	function auth($username, $password){
		
		// Create connection
		$mysqli = new mysqli($servername, $user, $passwd, $database);

		// Check connection
		if ($mysqli->connect_error) {
			die("Connection failed: " . $mysqli->connect_error);
		}
		
		if ($stmt = $mysqli->prepare("SELECT COUNT(*), wa_nickname, wa_number, wa_key FROM config where username = ? and password = ?;")){
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$stmt->bind_result($userCount, $wa_nickname, $wa_number, $wa_key);
			$stmt->fetch();
			if($userCount == 1){
				$_SESSION['wa_nickname'] = $wa_nickname;
				$_SESSION['wa_number'] = $wa_number;
				$_SESSION['wa_key'] = $wa_key;
				$stmt->close();
				$mysqli->close();
				return true;
			}else {
				$stmt->close();
				$mysqli->close();
				return false;
			}
		}
		return false;
		
	}
	
?>