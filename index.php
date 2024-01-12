<?php

require '-stuff/-database/dbLoad.php';

?>

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
	<div class="homePage page" id="homePage">
		<a class="toArena" href="https://pokemonshowdown.com/">To the Arena...</a>
		<div class="welcomeSect">
			<div class="welcomeImgCont" id="welcomeImgCont">
				<img class="welcomeImg" id="welcomeImg" src="-stuff/-images/background.png">
			</div>
			<div class="welcomeCont">
				<img class="welcomeTitle" src="-stuff/-images/logotext.png">
				<p class="welcomeSubtitle">Where the sun resides</p>
			</div>
		</div>
		<div class="mainSect">
			<h2 class="mainTitle">Our purpose</h2>
			<p class="mainText">
				"In the heart of Hau'oli,<br>
				there's a place...<br>
				A place to welcome any visitor,<br>
				a place where..."<br>
				<br>
				Sunne Hotel strives to create a welcoming atmosphere for both human and pokémon, whatever may be their origin. With our five stars, like the five islands of Alola, we are confident you'll enjoy your time here.<br>
				<br>
				Alongside rooms, we offer a number of extras. You can order breakfast to be delivered to your room, unlimited access to our regular concerts, and for the adventurous, a guided tour of Verdant Cavern.<br>
				<br>
				We'll be waiting for you across the waves...
			</p>
		</div>
		<div class="roomSect">
			<h2 class="roomTitle">Below is our selection of rooms</h2>
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
		<div class="footer">
			<div class="footerCont">
				<span class="footerText">Our warmest welcome, to Hau'oli City!</span>
				<span class="footerText">Website by Cappe (gen 7 best gen)</span>
			</div>
		</div>
	</div>
	<div class="roomPage page aniRoomPage" id="roomPage">
		<div class="backBtn" id="backBtn">Back</div>
		<div class="roomPageCont">
			<div class="roomPageText">
				<h2 class="roomPageTitle" id="roomPageTitle"></h2>
				<p class="roomPageDesc" id="roomPageDesc"></p>
			</div>
			<img class="roomPageImg" id="roomPageImg" src="">
		</div>
		<h2 class="bookingTitle">Make your selection below</h2>
		<p class="bookingSubtitle">If you manage to defeat the manager in a pokémon battle, you get all extras for free!</p>
		<div class="bookingCont">
			<div class="datesCont">
				<?php for ($i = 1; $i < 32; $i++){ ?>
					<div class="dateSquare" id="dateSquare<?= $i; ?>">
						<p class="dateSquareNum">
							<?= $i; ?>
						</p>
					</div>
				<?php } ?>
			</div>
			<div class="inputCont">
				<div>
					Full Name:
					<input type="text" name="name" id="name">
				</div>
				<div>
					Transfer Code:
					<input type="text" name="tCode" id="tCode">
				</div>
				<div>
					Redeem Code:
					<input type="text" name="redeem" id="redeem">
				</div>
				<div>
					Hotel Breakfast:
					<input type="checkbox" name="extra1" id="extra1">
				</div>
				<div>
					Concerts:
					<input type="checkbox" name="extra2" id="extra2">
				</div>
				<div>
					Guided tour:
					<input type="checkbox" name="extra3" id="extra3">
				</div>
				<button class="clearSelBtn" id="clearSelBtn">Clear Selection</button>
				<button class="bookingBtn" id="bookingBtn">Complete Booking</button>
				<div class="totalCostCont">
					<p class="totalCost" id="totalCost">Total Cost: </p>
					<img class="roomPokedollar" src="-stuff/-images/pokedollar.svg">
					<p class="totalCost translate">(100</p>
					<img class="roomPokedollar" src="-stuff/-images/pokedollar.svg">
					<p class="totalCost translate">= 1$)</p>
				</div>
			</div>
		</div>
	</div>
	<div class="bookingPopupCont" id="bookingPopupCont">
		<div class="bookingPopup" id="bookingPopup">
			<p class="popupText" id="popupText"></p>
			<button class="popupBtn" id="popupBtn">Close</button>
		</div>
	</div>
	<script type="text/javascript" src="index.js"></script>
	<script type="text/javascript" src="-stuff/-js/ani.js"></script>
	<script type="text/javascript" src="-stuff/-js/booking.js"></script>
</body>
</html>