<?php

require '-stuff/-database/dbLoad.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>"some kinda hotel"</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="https://sputnik.zone/-stuff/-fonts/fonts.css">
</head>
<body>
	<div class="homePage page" id="homePage">
		<a class="toArena" href="https://pokemonshowdown.com/">To the Arena...</a>
		<div class="welcomeSect">
			<div class="welcomeCont">
				<img class="welcomeTitle" src="-stuff/-images/logotext.svg">
				<p class="welcomeSubtitle">texttexttextlotsoftextfortesting</p>
			</div>
		</div>
		<div class="mainSect">
			<h2 class="mainTitle">Title of some purpose</h2>
			<p class="mainText">
				blablabla
				<?php for ($i=0; $i < 10; $i++)
					echo "<br>";
				?>
			</p>
		</div>
		<div class="roomSect">
			<h2 class="roomTitle">Here is our selection of rooms</h2>
			<div class="roomCardCont">
				<?php for ($i=0; $i < 3; $i++){ ?>
					<div class="roomCard" id="room<?= $i; ?>">
						<img class="cardBox" src="-stuff/-images/card.png">
						<img class="roomImg" src="-stuff/-images/room<?= $i; ?>.png">
						<h4 class="roomCardTitle"><?= $fetchData[$i]['name']; ?></h4>
						<p class="roomCardText"><?= $fetchData[$i]['desc']; ?></p>
						<p class="roomCardRent"><?= $fetchData[$i]['rent']; ?></p>
						<img class="pokedollar" src="-stuff/-images/pokedollar.svg">
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="roomPage page" id="roomPage">
		<div class="backBtn" id="backBtn">Back</div>
		<h1 class="roomPageTitle" id="roomPageTitle"></h1>
		<p class="roomPageText" id="roomPageText"></p>
		<img class="roomPageImg" id="roomPageImg" src="">
	</div>
	<script type="text/javascript" src="index.js"></script>
</body>
</html>