<?php

	if(!isset($_SESSION['username']) || !isset($_SESSION['wa_nickname']) 
		|| !isset($_SESSION['wa_number']) || !isset($_SESSION['wa_key'])){
		header("Location: index.php");
		die();
	}
	
	$nickname = $_SESSION['wa_nickname'];
	$username = $_SESSION['wa_number'];
	$password = $_SESSION['wa_key'];

	//https://github.com/mgp25/Chat-API/wiki/WhatsAPI-Documentation
	require __DIR__ . '/vendor/autoload.php';

	if(isset($_POST['broadcastTargets']) && isset($_POST['message']) ){
		
		$targets = $_POST['broadcastTargets'];
		$message = $_POST['message'];
		//Ziele und Nachricht wurde eingegeben
		$targetArray = explode(";", $targets);
		
		//echo 'Ziel: '.var_dump($targetArray).'<br>';
		//echo 'Nachricht: '.$message.'<br>';
		
		// Create a instance of WhatsProt class.
		$w = new WhatsProt($username, $nickname, false, true);
		$w->connect(); // Connect to WhatsApp network
		$w->loginWithPassword($password); // logging in with the password we got!
		
		if (isset($_FILES['image']) and !$_FILES['image']['error']){
			$dir = 'images'; //script muss schreibrechte haben (chmod 0777)
			$filename = $_FILES['image']['name'];
			$filename = strtolower($filename);
			move_uploaded_file($_FILES['image']['tmp_name'], $dir."/".$filename);
			
			$result = $w->sendBroadcastImage($targetArray, $dir.'/'.$filename, false, 0, "", $message);
			if(isset($result)){
				echo "Bild wurde erfolgreich versendet!<br>";
			}else{
				echo "Bild konnte nicht versendet werden!<br>";
			}
		}else{
			$result = $w->sendBroadcastMessage($targetArray, $message);
			if(isset($result)){
				echo "Nachricht wurde erfolgreich versendet!<br>";
			}else{
				echo "Nachricht konnte nicht versendet werden!<br>";
			}
		}
	}
?>