<?php
	session_start();
	unset($_SESSION['username']);
	session_destroy();
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>WhatsApp Broadcaster</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
	</head>
	<body>
		<div class="container">
			<h1>WhatsApp Broadcaster - Authentifizierung</h1>			
			<form action="formular.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" />
				</div>
				<div class="form-group">
					<label for="password">Passwort</label>
					<input type="password" class="form-control" id="password" name="password" />
				</div>
				<input type="submit" class="btn btn-default"/>
			</form>
		</div>
	</body>
</html>
