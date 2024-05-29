<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sunne Hotel</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="https://sputnik.zone/-stuff/-fonts/fonts.css">
</head>
<body>
	<img src="../-stuff/-images/sussybaka.webp" class="sus" id="sus">
	<div class="inputCont">
		<div class="rentCont">
			<?php for ($i=0; $i < 3; $i++){ ?>
				<div>
					Room<?= $i+1; ?> Rent:
					<input type="text" name="room<?= $i; ?>Rent" id="room<?= $i; ?>Rent">
				</div>
			<?php } ?>
			<div>
				Key: 
				<input type="password" name="key" id="key" placeholder="key">
			</div>
			<button class="updateBtn" id="updateBtn">Update</button>
			<p class="updateResponse" id="updateResponse">waiting for update</p>
		</div>
	</div>
</body>
<script src="index.js"></script>
</html>