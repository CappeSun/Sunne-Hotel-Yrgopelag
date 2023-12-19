<?php



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
	<div class="welcomeSect">
		<div class="welcomeCont">
			<h1 class="welcomeTitle">Welcome to &lthotel&gt</h1>
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
			<div class="roomCard">
				<img src="-stuff/-images/room1.jpg" class="roomImg">
				<h4 class="roomCardTitle">Room 1</h4>
				<p class="roomCardText">nice room yes</p>
				<p class="roomCardRent">800<img class="pokedollar" src="-stuff/-images/pokedollar.svg"></p>
			</div>
			<div class="roomCard">
				<img src="-stuff/-images/room2.jpg" class="roomImg">
				<h4 class="roomCardTitle">Room 2</h4>
				<p class="roomCardText">nice room yes</p>
				<p class="roomCardRent">2300<img class="pokedollar" src="-stuff/-images/pokedollar.svg"></p>
			</div>
			<div class="roomCard">
				<img src="-stuff/-images/room3.jpg" class="roomImg">
				<h4 class="roomCardTitle">Room 3</h4>
				<p class="roomCardText">nice room yes</p>
				<p class="roomCardRent">5000<img class="pokedollar" src="-stuff/-images/pokedollar.svg"></p>
			</div>
		</div>
	</div>
</body>
</html>