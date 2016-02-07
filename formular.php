<?php 
	session_start();
	require('auth.php');
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
			<h1>WhatsApp Broadcaster</h1>			
			<form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				<div class="form-group">
					<label for="broadcastTargets">Empfänger</label>
					<textarea rows="4" cols="50" class="form-control" id="broadcastTargets" name="broadcastTargets" >436503890133</textarea>
					<input name="hiddenValue" type="hidden" value="555"/>
				</div>
				<div class="form-group">
					<label for="image">Bild upload</label>
					<input type="file" id="image" name="image">
					<p class="help-block">Hier können Bilder hochgeladen und versendet werden.</p>
				</div>
				<div class="form-group">
					<label for="message">Nachricht</label>
					<textarea rows="4" cols="50"  class="form-control" id="message" name="message">Das ist eine Testnachricht \xF0\x9F\x98\x81</textarea>
				</div>
				<input type="submit" class="btn btn-default"/>
			</form>
			<br/>
			<?php require('whatsapp.php'); ?>
		</div>
	</body>
</html>
