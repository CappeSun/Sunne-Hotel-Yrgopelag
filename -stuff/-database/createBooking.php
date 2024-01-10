<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_GET['key']) || $_GET['key'] !== '64266932-01e9-4ef5-b151-dbcf9feb830d')
	echo json_encode('invalid key');

if ($_GET['key'] === '64266932-01e9-4ef5-b151-dbcf9feb830d'){
	if (isset($_GET['room0Rent']) && $_GET['room0Rent'] != '')
		updateDb($_GET['room0Rent'], 1);
	if (isset($_GET['room1Rent']) && $_GET['room1Rent'] != '')
		updateDb($_GET['room1Rent'], 2);
	if (isset($_GET['room2Rent']) && $_GET['room2Rent'] != '')
		updateDb($_GET['room2Rent'], 3);
	echo json_encode('update complete');
}

function updateDb($rent, $id){
	$database = new PDO('sqlite:database.db');

	$statement = $database->prepare("
	    UPDATE roomsInfo
	    SET rent = :rent
	    WHERE id == :id
	");
	
	$statement->bindParam(':rent', $rent);
	$statement->bindParam(':id', $id);
	
	$statement->execute();
}