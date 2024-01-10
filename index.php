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
				<p class="welcomeSubtitle">texttexttextlotsoftextfortesting</p>
			</div>
		</div>
		<div class="mainSect">
			<h2 class="mainTitle">Title of some purpose</h2>
			<p class="mainText">
				"In the heart of Hau'oli,<br>
				there's a place...<br>
				A place to welcome any visitor,<br>
				a place where..."<br>
				<br>
				hejj
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
					<input type="text" name="code" id="code">
				</div>
				<div>
					Redeem Code:
					<input type="text" name="redeem" id="redeem">
				</div>
				<button class="clearSelBtn" id="clearSelBtn">Clear Selection</button>
				<button class="bookingBtn" id="bookingBtn">Complete Booking</button>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="index.js"></script>
	<script type="text/javascript" src="-stuff/-js/ani.js"></script>
	<script type="text/javascript" src="-stuff/-js/booking.js"></script>
</body>
</html>